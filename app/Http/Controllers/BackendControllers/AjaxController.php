<?php

namespace App\Http\Controllers\BackendControllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    //

    //获取所有的表名
    public function getTableAjax()
    {
        $tables = DB::table('table_field')
            ->select('table')
            ->distinct()
            ->get();
        $count = count($tables);
        if($count){
            echo returnJson('200',$tables);
        }else{
            echo returnJson('0','暂无表单');
        }
    }

    //获取所有表，字段的备注信息
    public function getTableDescribe()
    {
        $describes = DB::table('table_field')
            ->get();
        $count = count($describes);
        if($count){
            echo returnJson('200',$describes);
        }else{
            echo returnJson('0','暂无表单记录');
        }
    }
    //封装一个方法，通过公司名称获取公司吓得素有产品
    public function getAllProductByCompany()
    {
        $input = Request::all();
        $company_id = $input['company_id'];
        $product_list = Product::where('company_id',$company_id)
            ->get();
        if(!count($product_list)){
            echo returnJson('0','该公司无产品');
        }else{
            echo returnJson('200',$product_list);
        }
    }
}
