<?php
namespace App\Http\Controllers\FrontendControllers\GuestControllers;
use App\Helper\UploadFileHelper;
use App\Http\Controllers\FrontendControllers\BaseController;
use App\Models\AddRecoginzee;
use App\Models\EditRecoginzee;
use App\Models\Order;
use App\Models\WarrantyRecognizee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Excel;

class StaffController extends BaseController{

    public function index($type)
    {
//        dd($type);
        $option_type = 'staff';
        //人员数据
        if($type == 'done'){
            $data = DB::table('order')
                ->join('warranty_recognizee','order.id','warranty_recognizee.order_id')
                ->join('product','order.ty_product_id','product.ty_product_id')
                ->where('order.user_id',Auth::user()->id)
                ->groupBy('warranty_recognizee.code')
                ->select('warranty_recognizee.*','product.product_name','order.start_time')
                ->simplePaginate(14);
        }elseif($type == 'add'){
            $data = DB::table('add_recognizee')
                ->join('product','ty_product_id','ty_product_id')
                ->where('add_recognizee.user_id',$this->getId())
                ->select('add_recognizee.*','product.product_name')
                ->simplePaginate(14);
//            dd($data);
        }else{
            $data = WarrantyRecognizee::where('status',4)->simplePaginate(14);
//            dd($data);
        }

        //购买的产品数据
        $products = DB::table('order')
            ->join('product','order.ty_product_id','product.ty_product_id')
            ->where('order.user_id',Auth::user()->id)
            ->groupBy('product.ty_product_id')
            ->select('product.product_name','product.ty_product_id')
            ->get();
//        dd($products);
//        dd($data);
        return view('frontend.guests.company.staff.index',compact('option_type','data','products','type'));
    }

    //编辑员工
    public function editStaff(Request $request)
    {
        $input = $request->all();
        $editStaff = new EditRecoginzee();
        $editStaff->user_id = $this->getId();
        $editStaff->name = $input['name'];
        $editStaff->id_type = $input['id_type'];
        $editStaff->date = $input['date'];
        $editStaff->project = $input['product'];
        $editStaff->id_code = $input['id_code'];
        $editStaff->email = $input['email'];
        $editStaff->status = 1;
        $res = $editStaff->save();
        if($res){
            return "<script>alert('人员编辑成功');location.href='/staff/index/done';</script>";
        }else{
            return "<script>alert('人员编辑失败,请稍后重试');location.href='/staff/index/done';</script>";
        }
    }
    
    //删除员工
    public function passStaff($id)
    {
        //删除已经在保的人员
        $res = WarrantyRecognizee::where('id',$id)->update(['status'=>4]);
        if($res){
            return "<script>history.back();alert('人员删除成功，请等待工作人员处理');</script>";
        }
    }
    //刚添加的员工删除
    public function delStaff($id)
    {
        $res = AddRecoginzee::where('id',$id)->update(['status'=>4]);
        if($res){
            return "<script>history.back();alert('人员删除成功，请等待工作人员处理');</script>";
        }
    }
    
    //新增员工
    public function newlyStaff(Request $request)
    {
        $file_data=[];
        $input = $request->all();
//        dd($input);
        if(isset($input['upFile'])){
            $b_path = UploadFileHelper::uploadFile($input['upFile'],'upload/frontend/newly_people/');
            Excel::load($b_path, function($reader) use (&$file_data) {
                $file_data []= $reader->all(); //$data[]就是所要的数据
            });
            $file_data = $file_data[0][0];
//            dd($file_data);
            foreach($file_data as $k=>$v){
                if($k >= 1){
                    DB::beginTransaction();
                    try{
                        $addRecognizee = new AddRecoginzee();
                        $addRecognizee->user_id = $this->getId();
                        $addRecognizee->name = $v->name;
                        $addRecognizee->sex = $v->sex;
                        $addRecognizee->id_type = $v->id_type;
                        $addRecognizee->date = $input['date'];
                        $addRecognizee->project = $input['product_name'];
                        $addRecognizee->id_code = $v->id_code;
                        $addRecognizee->occupation = $v->occupation;
                        $addRecognizee->phone = $v->phone;
                        $addRecognizee->status = 1;
                        $res = $addRecognizee->save();
                        if($res){
                            DB::commit();
                        }
                    }catch (Exception $e){
                        DB::rollBack();
                        return "<script>alert('人员录入失败，请稍后再试');history.back();</script>";
                    }
                }
            }
            return "<script>alert('人员录入成功');location.href='/staff/index/done';</script>";

        }else{
            return "<script>alert('请上传人员添加表');history.back();</script>";
        }
    }
}