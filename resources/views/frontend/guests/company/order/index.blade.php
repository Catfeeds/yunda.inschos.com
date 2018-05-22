@extends('frontend.guests.company_home.base')
@section('content')
    <div class="main-wrapper">
        <div class="table-nav">
            <span <?php if($order_type =='all'){?> class="active" <?php } ?> ><a href="{{url('/order/index/all')}}">所有订单</a></span>
        </div>

        <div class="table-wrapper">
            <div class="table-head clearfix">
                <span class="col1">产品名称</span>
                <span class="col2">保障权益</span>
                <span class="col3">保费</span>
                <span class="col4">被保人</span>
                <span class="col5">保障时间</span>
                <span class="col6">订单状态</span>
                <span class="col7">操作</span>
            </div>
            <ul class="table-body">
                @foreach($order_list as $value)
                    <li class="table-tr">
                        <span class="tips">自助投保&nbsp;&nbsp;&nbsp;暂未分配</span>
                        <div class="table-tr-bottom">
                            <span>发起时间{{ $value->start_time }}</span>
                            <span>订单号  {{ $value->order_code }}</span>
                        </div>
                        <div class="table-tr-top clearfix">
                            <div class="col1">

                                <h4 class="order-name">{{ $value->product->product_name }}</h4>

                            </div>
                            <div class="col2">
                                <ul>
                                    保障权益 详情
                                </ul>
                                <i class="iconfont icon-jiantou2">
                                    <div class="order-rights">
                                        <ul>
                                            @if(isset($value['order_parameter']))
                                                @foreach($value['order_parameter'] as $it => $item)
                                                    @php $items = json_decode($item['parameter'], true); @endphp
                                                    @php $protect_item = json_decode($items['protect_item'], true); @endphp
                                                    @foreach($protect_item as $key => $val)
                                                        <li class="clearfix"><span class="fl">{{$val['name']}}</span><span class="fr">{{$val['defaultValue']}}</span></li>
                                                    @endforeach
                                                @endforeach
                                            @else
                                                暂无数据
                                            @endif
                                        </ul>
                                    </div>
                                </i>
                            </div>
                            <div class="col3">
                                ￥{{ $value->premium/100 }}
                            </div>
                            <div class="col4">
                                @foreach($value['warranty_recognizee'] as $v)
                                    {{ $v->name }}
                                @endforeach
                            </div>
                            <div class="col5">
                                @php $date = substr($value->start_time,'0','10');@endphp
                                <div>{{$date}}</div>
                            </div>
                            @if($value->status == 2)
                                <div class="col6">
                                    待支付
                                </div>
                            @else
                                <div class="col6">
                                    已支付
                                </div>
                            @endif

                            <div class="col7">
                                <div class="btn-wrapper">
                                    @if($value->status == 2)
                                        @if(isset($value->warranty_rule->union_order_code))
                                            <a class="btn btn-ffae00" href="{{ url('/product/pay_settlement/'.$value->warranty_rule->union_order_code) }}">立即支付</a>
                                        @else
                                            <a href="/">操作失败</a>
                                        @endif
                                    @else
                                        <a href="/">继续购买</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>


        {{--<tr>--}}
        {{--<td>{{$value['order_code']}}</td>--}}
        {{--<td>{{$value->product->product_name }}</td>--}}
        {{--@if($value->status == 1)--}}
        {{--<td>已支付</td>--}}
        {{--@elseif($value->status == 2)--}}
        {{--<td>未支付</td>--}}
        {{--@else--}}
        {{--<td>支付失败</td>--}}
        {{--@endif--}}
        {{--<td>{{ $value->created_at }}</td>--}}
        {{--@if($order_type == 'unpayed')--}}
        {{--<td><a href="{{ url('/product/pay_settlement/'.$value->warranty_rule->union_order_code) }}">支付</a></td>--}}
        {{--@endif--}}


        {{--@if($order_type == 'insuring')--}}
        {{--<td><a href="{{ url('/claim/claim/'.$value->id) }}">申请理赔</a></td>--}}
        {{--@endif--}}
        {{--@if($value->status == 1)--}}
        {{--<td><a href="{{ url('/order/detail/'.$value->id) }}">查看详情</a></td>--}}
        {{--@else--}}
        {{--<td style="color: #CCCCCC">查看详情</td>--}}
        {{--@endif--}}
        {{--</tr>--}}

        {{--</ul>--}}
        </div>
        {{--分页--}}
        <div style="text-align: center;">
            {{ $order_list->links() }}
        </div>
    </div>



















    {{--<style>--}}
    {{--th,td{--}}
    {{--text-align: center;--}}
    {{--}--}}
    {{--</style>--}}
    {{--<div id="content-wrapper">--}}
    {{--<div class="row">--}}
    {{--<div class="col-lg-12">--}}
    {{--<div class="row">--}}
    {{--<div class="col-lg-12">--}}
    {{--<ol class="breadcrumb">--}}
    {{--<li><a href="#">前台</a></li>--}}
    {{--<li class="active"><span>订单列表</span></li>--}}
    {{--</ol>--}}
    {{--<h1>订单列表</h1>--}}
    {{--<ul class="nav nav-tabs">--}}
    {{--@if($order_type == 'all')--}}
    {{--<li class="active"><a href="#">全部订单</a></li>--}}
    {{--@elseif($order_type == 'unpayed')--}}
    {{--<li class="active"><a href="#">待支付</a></li>--}}
    {{--@elseif($order_type == 'payed')--}}
    {{--<li class="active"><a href="#">已支付</a></li>--}}
    {{--<script>--}}
    {{--window.onload = function(){--}}
    {{--if(location.search.indexOf("?")==-1){--}}
    {{--location.href += "?channel_login";--}}
    {{--}else{--}}
    {{--if(location.search.indexOf("channel_login")==-1) location.href += "&channel_login";--}}
    {{--}--}}
    {{--}--}}
    {{--</script>--}}
    {{--@elseif($order_type == 'insuring')--}}
    {{--<li class="active"><a href="#">保障中</a></li>--}}
    {{--@elseif($order_type == 'renewal')--}}
    {{--<li class="active"><a href="#">待续保</a></li>--}}
    {{--@endif--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row">--}}
    {{--<div class="col-lg-12">--}}
    {{--<div class="main-box clearfix">--}}
    {{--<header class="main-box-header clearfix">--}}
    {{--<h2></h2>--}}
    {{--@include('frontend.guests.layout.alert_info')--}}
    {{--</header>--}}
    {{--<div class="main-box-body clearfix">--}}
    {{--<div class="table-responsive">--}}
    {{--<table id="user" class="table table-hover" style="clear: both">--}}
    {{--<thead>--}}
    {{--<tr>--}}
    {{--<th><span>订单编号</span></th>--}}
    {{--<th><span>产品名称</span></th>--}}
    {{--<th><span>状态</span></th>--}}
    {{--<th><span>创建时间</span></th>--}}
    {{--@if($order_type == 'unpayed')--}}
    {{--<th><span>去支付</span></th>--}}
    {{--@endif--}}
    {{--<th><span>订单时间</span></th>--}}
    {{--@if($order_type == 'insuring')--}}
    {{--<th><span>申请理赔</span></th>--}}
    {{--@endif--}}
    {{--<th><span>查看详情</span></th>--}}
    {{--</tr>--}}
    {{--</thead>--}}
    {{--<tbody>--}}
    {{--@if($count == 0)--}}
    {{--<tr>--}}
    {{--<td colspan="8">暂无订单记录</td>--}}
    {{--</tr>--}}
    {{--@else--}}

    {{--@endif--}}
    {{--</tbody>--}}
    {{--</table>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
@stop