@extends('frontend.guests.layout.bases')
<link rel="stylesheet" type="text/css" href="{{asset('r_backend/css/libs/nifty-component.css')}}"/>
@section('content')
    <meta name="_token" content="{{ csrf_token() }}"/>
    <style>
        th,td{
            text-align: center;
        }
    </style>
    <div id="content-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li><a href="/">主页</a></li>
                            <li class="active"><span>个人订单管理</span></li>
                        </ol>
                        <h1>个人订单</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-box clearfix" style="min-height: 1100px;">
                            <div class="tabs-wrapper tabs-no-header">
                                <ul class="nav nav-tabs">
                                    <li><a href="{{ url('order/index') }}">订单列表</a></li>
                                    <li class="active"><a href="#">保单详情</a></li>
                                </ul>

                                <div class="tab-content">
                                    @include('frontend.guests.layout.alert_info')
                                    <div class="tab-pane fade in active" id="tab-accounts">
                                        <h3><p>保单信息</p></h3>
                                        <div class="panel-group accordion" id="account">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#account-message">
                                                            保单基本信息
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="account-message" class="panel-collapse ">
                                                    <table id="basic" class="table table-hover" style="clear: both">
                                                        <tbody>
                                                        <tr>
                                                            <td width="35%">订单编号</td>
                                                            <td>{{ $order_detail->order_code }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="35%">保障开始时间</td>
                                                            <td>{{ $order_detail->start_time }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="35%">保障结束时间</td>
                                                            <td>{{ $order_detail->end_time }}</td>
                                                        </tr>
                                                        <tr>
                                                            {{--<td width="35%">保额数量</td>--}}
                                                            {{--<td>{{  }}</td>--}}
                                                        </tr>
                                                        <tr>
                                                            <td>产品名称</td>
{{--                                                            <td>{{ $warranty_detail->warranty_rule->warranty_product->product_name }}</td>--}}
                                                        </tr>
                                                        <tr>
                                                            <td>保额</td>
                                                            <td>{{ $order_detail->premium }}</td>
                                                        </tr>
                                                        <td colspan="2" style="text-align: center;">
                                                            <button id="change-recognizee-btn" index="add" style="text-align: center;" class="btn btn-success">
                                                                <a href="{{ url('/order/change_premium/'.$order_detail->id) }}" style="color:white;">修改保额</a></button>
                                                            <?php $time = date('Y-m-d',time());
                                                                if($order_detail->end_time>$time){
                                                                    echo '<button id="change-recognizee-btn" index="add" style="text-align: center;" class="btn btn-success"><a style="color: white;" href="/order/cancel_order/'.$order_detail->id.'">申请退保</a></button>';

                                                                }
                                                            ?>

                                                        </td>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <h3><p>投保人信息</p></h3>
                                        <div class="panel-group accordion" id="bill">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle collapsed md-trigger "  index="0" style="cursor: pointer;"  data-modal="modal-8">
                                                            投保人信息
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="bill-block" class="panel-collapse ">
                                                    <div class="panel-body" style="padding-bottom: 0">
                                                            <table id="product" class="table table-hover" style="clear: both">
                                                                <tr>
                                                                    <td width="35%">投保人姓名</td>
                                                                    <td>{{ $policy->name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>投保人证件类型</td>
                                                                    <td>{{ config('card_type.'.$policy->card_type) }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>投保人证件号码</td>
                                                                    <td>{{ $policy->code }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>投保人电话</td>
                                                                    <td>{{ $policy->phone }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>投保人邮箱</td>
                                                                    <td>{{ $policy->email }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <form action="{{ url('/order/change_policy') }}" method="post" id="change-policy-form">
                                                                        {{ csrf_field() }}
                                                                        <input type="text" name="policy_id" value="{{$policy->id}}" id="" hidden>
                                                                    </form>
                                                                    <td colspan="2" style="text-align: center;">
                                                                        <button id="change-policy-btn" index="add" style="text-align: center;" class="btn btn-success">修改投保人信息</button>
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h3><p>被保人信息111</p></h3>


                                        <div class="panel-group accordion" id="bill">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle collapsed md-trigger "  index="0" style="cursor: pointer;"  data-modal="modal-8">
                                                            被保人信息
                                                        </a>
                                                    </h4>
                                                </div>
                                                @foreach($recognizee as $value)
                                                     <div id="bill-block" class="panel-collapse ">
                                                        <div class="panel-body" style="padding-bottom: 0">
                                                            <table id="product" class="table table-hover" style="clear: both">
                                                                <tr>
                                                                    <td width="35%">被保人姓名</td>
                                                                    <td>{{ $value->name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>被保人证件类型</td>
                                                                    <td>{{ config('card_type.'.$value->card_type) }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>被保人证件号码</td>
                                                                    <td>{{ $value->code }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>被保人电话</td>
                                                                    <td>{{ $value->phone }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>被保人邮箱</td>
                                                                    <td>{{ $value->email }}</td>
                                                                </tr>
                                                                <td colspan="2" style="text-align: center;">
{{--                                                                    <button id="change-recognizee-btn" index="add" style="text-align: center;" class="btn btn-success"><a href="{{ url('/order/change_recognizee/'.$value->id) }}" style="color: white;">修改被保人信息</a></button>--}}
                                                                    @if(Auth::user()->type == 'company')
                                                                        <button id="change-recognizee-btn" index="add" style="text-align: center;" class="btn btn-success">
                                                                            <a href="{{ url('/warranty/del_recognizee/'.$value->id) }}" style="color:white;">删除</a></button>
                                                                    @endif
                                                                </td>
                                                                <tr>
                                                                    <td><button   style="text-align: center;" class="btn btn-success">
                                                                            <a href="{{ url('/order/del_recognizee/'.$order_detail->id.'/'.$value->id) }}" style="color:white;">删除被保人</a></button></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                @if($order_detail->warranty_rule->type)
                                                    <button id="change-recognizee-btn" index="add" style="text-align: center;" class="btn btn-success">
                                                        <a href="{{ url('/order/add_recognizee/'.$order_detail->id) }}" style="color:white;">增加被保人</a></button>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="md-overlay" id="add-condition-wrap"></div>

    <script src="/js/jquery-3.1.1.min.js"></script>
    <script charset="utf-8" src="/r_backend/js/modernizr.custom.js"></script>
    <script charset="utf-8" src="/r_backend/js/classie.js"></script>
    <script charset="utf-8" src="/r_backend/js/modalEffects.js"></script>
    <script>
        $(function(){
            var change_policy_btn = $('#change-policy-btn');
            var change_policy_form = $('#change-policy-form');
            change_policy_btn.click(function(){
                change_policy_form.submit();
            })
        })
    </script>
@stop

