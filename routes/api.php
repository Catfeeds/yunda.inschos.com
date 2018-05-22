<?php

//use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['prefix' => '/test', 'namespace'=>'FrontendControllers'],function (){
//    Route::get('test', 'TestController@index'); //唯家测试 DSB
    Route::get('quote', 'WkTestController@quote');    //算费
    Route::get('buy_ins', 'WkTestController@buyIns');   //投保
    Route::get('check_ins', 'WkTestController@checkIns');   //核保
    Route::get('pay_ins', 'WkTestController@payIns');   //支付
    Route::get('issue', 'WkTestController@issue');   //出单
});



Route::group(['prefix'=>'sms','namespace'=>'FrontendControllers'],function() {
    Route::post('email','SmsController@sendEmail'); //发送邮件
});

//车险测试路由 todo delete
Route::group(['prefix'=>'car_ins'],function(){
    Route::get('car_info', 'TestCarInsController@carInfo');    //车辆信息
    Route::get('clause_info', 'TestCarInsController@clauseInfo');    //条款信息
    Route::get('provinces', 'TestCarInsController@provinces');    //身份查询
    Route::get('cities', 'TestCarInsController@cities');    //城市查询
    Route::get('next_ins_time', 'TestCarInsController@nextInsTime');    //下次投保日期
    Route::get('quote', 'TestCarInsController@quote');    //算费
    Route::get('buy_ins', 'TestCarInsController@buyIns');    //投保
    Route::get('buy_ins', 'TestCarInsController@buyIns');    //投保
    Route::get('insurers', 'TestCarInsController@insurers');    //投保
});



