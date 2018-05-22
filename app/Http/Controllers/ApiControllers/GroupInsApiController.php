<?php
/**
 * Created by PhpStorm.
 * User: cyt
 * Date: 2017/11/29
 * Time: 10:56
 */
namespace App\Http\Controllers\ApiControllers;
use App\Helper\IsPhone;
use App\Helper\LogHelper;
use App\Helper\RsaSignHelp;
use App\Models\ApiInfo;
use App\Models\PlanLists;
use App\Models\Product;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

class GroupInsApiController{
    protected $_request;
    protected $_signHelp;
    protected $is_phone;

    public function __construct(Request $request)
    {
        $this->_request = $request;
        $this->_signHelp = new RsaSignHelp();
        $this->is_phone = isset($_SERVER['HTTP_USER_AGENT']) ? IsPhone::isPhone() : null;
    }

    //获取产品详情
    public function insInfo($id)
    {
        $input = $this->_request->all();
        $biz_content = [
            'ty_product_id' => $id,    //投保产品ID
        ];
        //天眼接口参数封装
        $data = $this->_signHelp->tySign($biz_content);
        //发送请求
        $response = Curl::to(env('TY_API_SERVICE_URL') . '/ins_curl/getapioption')
            ->returnResponseObject()
            ->withData($data)
            ->withTimeout(120)
            ->post();
        if($response->status != 200){
            LogHelper::logError($biz_content, $response->content, 'ty', 'ins_api_info');
            return "<script>alert('获取产品详情失败');location.href='/';</script>";
        }
        $return_data = json_decode($response->content, true);
        $ins = $this->insApiInfo($return_data);
        $restrict_genes = $return_data['option']['restrict_genes'];     //算费因子
        $selected_options = $return_data['option']['selected_options']; //默认算费选中项
        $protect_items = isset($return_data['option']['protect_items']) ? $return_data['option']['protect_items'] : ''; //保障内容
        $price = (int)$return_data['option']['price']; //默认费率
        if(!$ins)
            return "<script>alert('获取产品详情失败！');location.href='/'</script>";
        $product_info = Product::where('ty_product_id',$id)->with('label.labels')->first();//产品详情
        $company = json_decode($product_info->json,true)['company'];
        $clauses = json_decode($product_info->clauses,true);
        $duty = [];
        foreach ($clauses as $value){
            if(isset($value['duties'])){
                $duty[] = $value['duties'];
            }
        }
        $option_html = $this->optionHtml($restrict_genes, $selected_options, $price);
        $protects = [];
        $item_html = $protect_items ? $this->itemHtml($protect_items) : '';
        $object = Product::where('ty_product_id', $id)->first();
        $product_claes = json_decode($object['json'],true)['content'];
        $json = $object->json;
        $json = json_decode($json, true);
        if(!is_null($object['cover'])){
            $json['cover']= $object['cover'];
        }
        if(isset($input['agent_id']) && isset($input['ditch_id']) && isset($input['plan_id']))
            PlanLists::where(['id'=> $input['plan_id'], 'status'=> 1])->update(['status'=> 2, 'read_time'=> date("Y-m-d H:i:s")]);
        return view('frontend.guests.groupIns.detail',compact('duty','company','json','clauses','product_info','option_html','item_html','ins_type','id','ins','product_claes'));
    }

    //团险算费
    public function quote()
    {
        $biz_content = $this->_request->all();
        //天眼接口参数封装
        $data = $this->_signHelp->tySign($biz_content);
        //发送请求
        $response = Curl::to(env('TY_API_SERVICE_URL') . '/ins_curl/quote')
            ->returnResponseObject()
            ->withData($data)
            ->withTimeout(60)
            ->post();
//        print_r($response->content);exit;
//        dd(json_decode($response->content));exit;
        if($response->status !== 200)
            return response($response->content, $response->status);
        $data = json_decode($response->content, true);
        //如果返回值中存在 其他受影响参数的选项 就覆盖原来选项
        $options = json_decode($this->_request->get('old_option'), true);
        if(isset($data['new_genes'])){
            foreach($data['new_genes'] as $return_k => $return_v){
                foreach($options as $k => $v){
                    if($return_v['name'] == $v['name']){
                        $options[$k] = $return_v;
                    }
                }
            }
        }

        //如果返回值中存在 保障内容有变化
        $old_protect_item = isset($this->_request->old_protect_item) ? json_decode($this->_request->get('old_protect_item'), true) : array();
        if(isset($data['protect_items']) && $data['protect_items']){
            //保障项目不是走接口返回的，不存在protectItemId，且数据为此次算费的所有保障内容
            if(!isset($data[0]['protectItemId'])){
                $old_protect_item = $data['protect_items'];
            } else {
                //接口返回的存在protectItemId，数据为此次被变更的保障内容
                foreach($data['protect_items'] as $it => $new_item){
                    foreach($old_protect_item as $old_k => $old_item){
                        if($new_item['protectItemId'] == $old_item['protectItemId']){
                            $old_protect_item[$old_k] = $new_item;
                        }
                    }
                }
            }
        }
        //生成HTML
        $option_html = $this->optionHtml($options, $data['selected_options'], $data['price']);
        $item_html = $old_protect_item ? $this->itemHtml($old_protect_item) : '';
        $return = ['option_html'=> $option_html, 'item_html'=> $item_html];
        return response($return, 200);
    }

    /**
     * 同步产品来源接口信息
     * @param $data
     * @return ApiInfo
     */
    protected function insApiInfo($data)
    {
        //        dd($data);
        $model = new ApiInfo();
        $api_info = $model->where([
            'ty_product_id'=> $data['ty_product_id'],
            'bind_id'=> $data['bind_id']
        ])->first();

        $json = json_encode($data['option']);
        $sign = md5($data['private_p_code'] . $json);
        //record
        if($api_info){
            if($api_info->sign == $sign)
                return $api_info;
            $model = $api_info;
        }
        //save and return record
        $model->private_p_code = $data['private_p_code'];
        $model->ty_product_id = $data['ty_product_id'];
        $model->bind_id = $data['bind_id'];
        $model->json = $json;
        $model->sign = $sign;
        $model->save();
        return $model;
    }

    protected function optionHtml($restrict_genes, $selected_options, $price)
    {
        if($this->is_phone){
            return view('frontend.show_ins.mobile_options', compact('restrict_genes', 'selected_options', 'price'))->render();
        }
        return view('frontend.show_ins.group_ins_option', compact('restrict_genes', 'selected_options', 'price'))->render();
    }

    protected function itemHtml($protect_items)
    {
        return view('frontend.show_ins.items', compact('protect_items'))->render();
    }
}
