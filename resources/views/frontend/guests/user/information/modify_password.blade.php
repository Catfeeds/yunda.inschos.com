<!DOCTYPE html>
<html>
@extends('frontend.guests.person_home.account.base')
@section('content')
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta charset="UTF-8">
        <title>天眼互联-科技让保险无限可能</title>
        <link rel="stylesheet" href="{{config('view_url.person_url').'css/lib/iconfont.css'}}" />
        <link rel="stylesheet" href="{{config('view_url.person_url').'css/common.css'}}" />
        <style>
            .main-wrapper {height: 656px;}
            .main-content{padding: 78px 30px;}
            .safety-content-left>.iconfont{margin-right: 10px;}
            .icon-information{color: #f5a623;}
            .icon-success{color: #00a2ff;}
            .icon-wrong{color: #f00;}
        </style>
    </head>

    <body>
    <div class="content">
        <div class="content-inside">
            <div class="main-wrapper">
                <div class="main-content">
                    <div>
                        <span>账户安全：</span>
                        <span class="safety-wrapper"></span>
                    </div>
                    <ul class="safety-content">
                        <li class="clearfix">
                            <div class="safety-content-left"><i class="iconfont icon-information"></i>密码验证</div>
                            <div class="safety-content-right">
                                您可以提高密码的复杂程度来提高账户的安全性
                                <a class="fr" href="/information/change_password">修改</a>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="safety-content-left"><i class="iconfont icon-success"></i>手机验证</div>
                            <div class="safety-content-right">
                                您验证的手机：170*****000&nbsp;&nbsp;如若有变请及时更换，以避免账户损失
                                <a class="fr" href="/information/index">修改</a>
                            </div>
                        </li>

                        <li class="clearfix">
                            <div class="safety-content-left"><i class="iconfont icon-wrong"></i>实名验证</div>
                            <div class="safety-content-right">
                                您认证的实名信息：*小眼&nbsp;&nbsp;65************7640
                                <a class="fr" href="/information/approvePerson">立即认证</a>
                            </div>
                        </li>
                        {{--<li class="clearfix">--}}
                            {{--<div class="safety-content-left"><i class="iconfont icon-success"></i>手机验证</div>--}}
                            {{--<div class="safety-content-right">--}}
                                {{--您验证的手机：170*****000&nbsp;&nbsp;如若有变请及时更换，以避免账户损失--}}
                                {{--<a class="fr" href="/information/index">修改</a>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="clearfix">--}}
                        {{--<div class="safety-content-left"><i class="iconfont icon-wrong"></i>邮箱验证</div>--}}
                        {{--<div class="safety-content-right">--}}
                        {{--验证后,将能及时收到电子保单等重要信息--}}
                        {{--<a class="fr" href="">立即验证</a>--}}
                        {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="clearfix">--}}
                            {{--<div class="safety-content-left"><i class="iconfont icon-wrong"></i>实名验证</div>--}}
                            {{--<div class="safety-content-right">--}}
                                {{--您认证的实名信息：*小眼&nbsp;&nbsp;65************7640--}}
                                {{--<a class="fr" href="/information/approvePerson">立即认证</a>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
    </body>
@stop

<script src="js/lib/jquery-1.11.3.min.js"></script>
<script src="js/common.js"></script>
<script>
    $(function() {
        $('.btn-select').click(function() {
            $(this).addClass('active').siblings().removeClass('active');
        })
    });
</script>

