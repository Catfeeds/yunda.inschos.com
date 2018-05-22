<?php
/**
 * Created by PhpStorm.
 * User: dell01
 * Date: 2017/5/2
 * Time: 18:12
 */
namespace App\Http\Controllers\BackendControllers;
use App\Http\Controllers\BackendControllers;
use App\Models\Agent;
use App\Models\Clause;
use App\Models\CodeType;
use App\Models\Company;
use App\Models\Order;
use App\Models\Product;
use App\Models\Warranty;
use App\Models\CompanyBrokerage;
use App\Models\WarrantyPolicy;
use App\Models\WarrantyRecognizee;
use App\Models\WarrantyRelation;
use App\Models\WarrantyRule;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use League\Flysystem\Exception;
use Illuminate\Support\Facades\DB;
use Excel;

class PolicyController extends BaseController{

    //个人保单
    public function index()
    {
        $status_id = $this->request->id ??  "";//保单状态:全部保单-1，保障中1，失效2，待生效0，退保3
        $deal_type = $this->request->type ?? "";//成交方式：线上0，线下1，全部-2
        $agent = $this->request->agent ?? "";//代理人 全部-2
        $data_agent = Agent::where('work_status',1)
            ->with('user')
            ->get();
        //全部保单
        if($status_id == -1 || $status_id == ""){
            $warranty_res = WarrantyRule::with([
                'warranty_rule_product',//产品信息
				'warranty_product',
                'warranty',//保单信息
                'policy',//投保人信息
                'beneficiary',//受益人信息
                'warranty_rule_order'=>function($a){
                    $a->where('status','1');
                },//订单信息
                'warranty_rule_order.order_agent',//代理人信息
                // 'warranty_rule_order.warranty_recognizee',//被保人信息
                'warranty_rule_order.order_brokerage',//渠道佣金
                'warranty_rule_order.order_user',//订单关联佣金
            ])
                // ->whereHas('warranty',function($a) use ($deal_type){
                    // if($deal_type!='-2'){
                        // $a->where('deal_type',$deal_type);
                    // }
                // })
				->where('warranty_id','<>','')
				->orderBy('created_at','desc')
                ->paginate(config('list_num.backend.agent'));
        }else {
            //全部保单（成交方式）
            if($deal_type == -2 || $deal_type == ""){
                $warranty_res = WarrantyRule::with([
                    'warranty_product',//产品信息
                    'warranty',//保单信息
                    'policy',//投保人信息
                    'beneficiary',//受益人信息
                    'warranty_rule_order'=>function($a){
                        $a->where('status','1');
                    },//订单信息
                    'warranty_rule_order.order_agent',//代理人信息
                    // 'warranty_rule_order.warranty_recognizee',//被保人信息
                    'warranty_rule_order.order_brokerage',//渠道佣金
                    'warranty_rule_order.order_user',//订单关联佣金
                ])
                    ->where('status',$status_id)
					->orderBy('created_at','desc')
                    ->paginate(config('list_num.backend.agent'));
            }elseif($agent == "" || $agent == -2){
                $warranty_res = WarrantyRule::with([
                    'warranty_product',//产品信息
                    'warranty',//保单信息
                    'policy',//投保人信息
                    'beneficiary',//受益人信息
                    'warranty_rule_order'=>function($a){
                        $a->where('status','1');
                    },//订单信息
                    'warranty_rule_order.order_agent',//代理人信息
                    // 'warranty_rule_order.warranty_recognizee',//被保人信息
                    'warranty_rule_order.order_brokerage',//渠道佣金
                    'warranty_rule_order.order_user',//订单关联佣金
                ])
                    ->where('status',$status_id)
					->orderBy('created_at','desc')
                    ->paginate(config('list_num.backend.agent'));
            }else{
                $warranty_res = WarrantyRule::with([
                    'warranty_product',//产品信息
                    'warranty',//保单信息
                    'policy',//投保人信息
                    'beneficiary',//受益人信息
                    'warranty_rule_order'=>function($a){
                        $a->where('status','1');
                    },//订单信息
                    'warranty_rule_order.order_agent',//代理人信息
                    // 'warranty_rule_order.warranty_recognizee',//被保人信息
                    'warranty_rule_order.order_brokerage',//渠道佣金
                    'warranty_rule_order.order_user',//订单关联佣金
                ])
                    ->where('status',$status_id)
                    ->whereHas('agent',function($q) use ($agent){
                        $q->where('id',$agent);
                    })
                    ->whereHas('warranty',function($a) use ($deal_type){
                        $a->where('deal_type',$deal_type);
                    })
					->orderBy('created_at','desc')
                    ->paginate(config('list_num.backend.agent'));
            }
        }
        $list = $warranty_res;
		$count = $warranty_res->total();
        return view('backend_v2.policy.index',compact("count","list","status_id","deal_type","data_agent","agent"));
    }
    //个人保单详情
    public function policy_details()
    {
        $id = $this->request->id;
        $warranty_res = WarrantyRule::with([
            'warranty_rule_product',//产品信息
            'warranty',//保单信息
            'policy',//投保人信息
            'beneficiary',//受益人信息
            'warranty_rule_order'=>function($a){
                $a->where('status','1');
            },//订单信息
            'warranty_rule_order.order_agent',//代理人信息
            'warranty_rule_order.warranty_recognizee',//被保人信息
            'warranty_rule_order.order_brokerage',//渠道佣金
            'warranty_rule_order.order_user',//订单关联客户
        ])
            ->whereHas('warranty',function($a) use ($id){
                $a->where('id',$id);
            })
            ->first();
        $product_res = $warranty_res['warranty_rule_product'] ?? "";
        if(!empty($product_res)){
            $json = json_decode($product_res['json'],true);
        }else{
            $json = [];
        }
        $warranty =  $warranty_res['warranty'] ?? "";
        $policy =  $warranty_res['policy'] ?? "";
        $beneficiary =  $warranty_res['beneficiary'] ?? "";
        $order =  $warranty_res['warranty_rule_order'] ?? "";
        if(!empty($order)){
            $order_agent = $order['order_agent'];
            $warranty_recognizee = $order['warranty_recognizee'];
            $order_brokerage = $order['order_brokerage'];
            $order_user = $order['order_user'];
        }
        return view('backend_v2.policy.policy_details')
            ->with('product_res',$product_res)
            ->with('json',$json)
            ->with('warranty',$warranty)
            ->with('policy',$policy)
            ->with('beneficiary',$beneficiary)
            ->with('order',$order)
            ->with('order_agent',$order_agent)
            ->with('warranty_recognizees',$warranty_recognizee)
            ->with('order_brokerage',$order_brokerage)
            ->with('order_user',$order_user);

    }

    //下载个人保单
    public function exportPolicyPerson(Request $request)
    {
        $input = $request->all();
        $get = json_decode($input['get'],true);
        unset($input['_token']);
        unset($input['get']);
        $title = [
            'warranty_code'=>'保单号',
            'agent'=>'代理人(空代表没有代理人)',
            'start_time'=>'起保时间',
            'brokerage'=>'代理人佣金(空代表没有佣金,以分为单位)',
            'end_time'=>'截止时间',
            'policy_type'=>'保单来源(0代表线上，1代表线下)',
            'product_name'=>'保单产品',
            'phone'=>'投保人联系电话',
            'premium'=>'保费(以分为单位)',
            'created_at'=>'订单时间',
            'policy_status'=>'保单状态(待生效0,保障中1,失效2,退保3)'
        ];
        $conditions = [
            'warranty_code'=>'warranty.warranty_code',
            'agent'=>'users.name',
            'start_time'=>'warranty.start_time',
            'brokerage'=>'order_brokerage.user_earnings',
            'end_time'=>'warranty.end_time',
            'policy_type'=>'warranty.deal_type',
            'product_name'=>'product.product_name',
            'phone'=>'warranty_policy.phone',
            'premium'=>'warranty.premium',
            'created_at'=>'order.created_at',
            'policy_status'=>'warranty.status'
        ];
        foreach($input as $k=>$v){
            if(!$v){
                unset($title[$k]);
                unset($conditions[$k]);
            }
        }
        $final_data = [];
        $final_data[] = $title;
        $data = DB::table('warranty_rule')
            ->join('warranty','warranty.id','warranty_rule.warranty_id')
            ->join('warranty_policy','warranty_policy.id','warranty_rule.policy_id')
            ->join('product','product.ty_product_id','warranty_rule.ty_product_id')
            ->join('order','order.id','warranty_rule.order_id')
            ->leftJoin('agents','warranty_rule.agent_id','agents.id')
            ->leftJoin('users','users.id','agents.user_id')
            ->leftJoin('order_brokerage','order_brokerage.order_id','warranty_rule.order_id')->where('product.insure_type',1);
        if(isset($get['type']) && $get['type'] != -2){
            $data->where('warranty.deal_type',$get['type']);
        }
        if(isset($get['id']) && $get['id'] != -1){
            $data->where('warranty.status',$get['id']);
        }
        if(isset($get['agent']) && $get['agent'] != -2){
            $data->where('agents.id',$get['agent']);
        }
        $data = $data->select($conditions)->get();
        foreach($data as $k=>$v){
            $final_data[] = json_decode(json_encode($v),true);
        }
        $name = '保单数据'.date('YmdHis',time());
        $res = Excel::create(iconv('UTF-8', 'GBK', $name),function($excel) use ($final_data){
            $excel->sheet('score', function($sheet) use ($final_data){
                $sheet->rows($final_data);
            });
        })->store('xls',public_path('download/warranty'))->export('xls');
        if($res){
            return redirect(url('/download/warranty'.$name).'xls');
        }
    }

    public function download($file)
    {
        return response()->download($file,'保单数据'.'.xls');
    }

    //企业保单
    public function policy_company()
    {
        $status_id = $this->request->id ?? "";
        $select = [
            'warranty.id',
            'warranty.warranty_code',
            'warranty.status',
            'warranty.premium',
            'warranty.created_at',
            'product.product_name',
            'users.name',
            'users.phone',
            'users.code',
            'company_brokerage.brokerage',
            'user.name as agent_name',
        ];
        if($status_id == -1 || $status_id ==""){
            $policy_company = WarrantyRule::join('product','warranty_rule.ty_product_id','product.ty_product_id');
            $policy_company->join('warranty','warranty_rule.warranty_id','warranty.id');
            $policy_company->join('order','warranty_rule.order_id','order.id');
            $policy_company->join('users','order.user_id','users.id');
            $policy_company->leftjoin('company_brokerage','warranty_rule.warranty_id','company_brokerage.warranty_id');
            $policy_company->leftjoin('agents','warranty_rule.agent_id','agents.id');
            $policy_company->leftjoin('users as user','agents.user_id','user.id');
            $policy_company->where('users.type','company');
            $policy_company->select($select);
            $list = $policy_company->paginate(config('list_num.backend.agent'));
        }else{
            $policy_company = WarrantyRule::join('product','warranty_rule.ty_product_id','product.ty_product_id');
            $policy_company->join('warranty','warranty_rule.warranty_id','warranty.id');
            $policy_company->join('order','warranty_rule.order_id','order.id');
            $policy_company->join('users','order.user_id','users.id');
            $policy_company->leftjoin('company_brokerage','warranty_rule.warranty_id','company_brokerage.warranty_id');
            $policy_company->leftjoin('agents','warranty_rule.agent_id','agents.id');
            $policy_company->leftjoin('users as user','agents.user_id','user.id');
            $policy_company->where('users.type','company');
            $policy_company->where('warranty.status',$status_id);
            $policy_company->select($select);
            $list = $policy_company->paginate(config('list_num.backend.agent'));
        }
        return view('backend_v2.policy.policy_company',compact("list","status_id"));
    }


    //企业保单详情
    public function policy_company_details()
    {
        $id = $this->request->id;
        $product = Warranty::where('warranty_id',$id)
            ->join('warranty_rule','warranty_rule.warranty_id','warranty.id')
            ->join('product','warranty_rule.ty_product_id','product.ty_product_id')
            ->join('order','warranty_rule.order_id','order.id')
            ->first();
        $item = json_decode($product->json, true);

        $brokerage = CompanyBrokerage::where('warranty_id',$id)->select('brokerage')->first();//佣金
        $ditches = WarrantyRule::where('warranty_id',$id)
            ->join('ditches','warranty_rule.ditch_id','ditches.id')
            ->select('name')->first(); //渠道

        //        渠道佣金
        $order_brokerage =  WarrantyRule::where('warranty_id',$id)
            ->join('order_brokerage','warranty_rule.order_id','order_brokerage.order_id')
            ->select("user_earnings")->first();

        //代理人
        $agent_name = WarrantyRule::where('warranty_id',$id)
            ->leftjoin('agents','warranty_rule.agent_id','agents.id')
            ->leftjoin('users as user','agents.user_id','user.id')
            ->select('real_name')->first();
        //受益人
        $warranty_beneficiary = WarrantyRule::where('warranty_id', $id)->with("beneficiary")->first();

        //被保人
        $warranty_recognizee = WarrantyRule::where('warranty_id', $id)
            ->join('warranty_recognizee','warranty_rule.order_id','warranty_recognizee.order_id')
            ->paginate(config('list_num.backend.ditches'));


        return view('backend_v2.policy.policy_company_details',compact('product','item','warranty_beneficiary','brokerage','ditches','order_brokerage','agent_name','warranty_recognizee'));
    }

}
