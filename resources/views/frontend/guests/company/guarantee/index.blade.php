@extends('frontend.guests.company_home.base')
@section('content')
    <div class="main-wrapper">
        <div class="table-nav">
            <span <?php if($order_type =='all'){?> class="active" <?php } ?> ><a href="{{url('/order/index/all')}}">所有订单</a></span>
        </div>
        @include('frontend.guests.layout.alert_info')
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
                                            <a class="btn" href="{{ url('/ins/pay_again/'.$value->warranty_rule->union_order_code) }}">立即支付</a>
                                        @else
                                            <a class="btn" href="/">操作失败</a>
                                        @endif
                                    @else
                                        <a class="btn" href="/">继续购买</a>
                                    @endif
                                        <a class="btn" href="/order/company_guarantee_detail/{{$value['id']}}">保单详情</a>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach

            </ul>
        </div>
        {{--分页--}}
        <div style="text-align: center;">
            {{ $order_list->links() }}
        </div>
    </div>


    </div>




@stop