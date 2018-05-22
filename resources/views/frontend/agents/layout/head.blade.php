<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>天眼互联-科技让保险无限可能</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="/r_backend/css/bootstrap/bootstrap.min.css"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="/r_backend/js/demo-rtl.js"></script>

    <link rel="stylesheet" type="text/css" href="/r_backend/css/libs/font-awesome.css"/>
    <link rel="stylesheet" type="text/css" href="/r_backend/css/libs/nanoscroller.css"/>

    <link rel="stylesheet" type="text/css" href="/r_backend/css/compiled/theme_styles.css"/>

    <link rel="stylesheet" href="/r_backend/css/libs/fullcalendar.css" type="text/css"/>

    <link rel="stylesheet" href="/r_backend/css/compiled/calendar.css" type="text/css" media="screen"/>
    <link rel="stylesheet" href="/r_backend/css/libs/morris.css" type="text/css"/>
    <link rel="stylesheet" href="/r_backend/css/libs/daterangepicker.css" type="text/css"/>

    <link rel="stylesheet" href="{{url('r_frontend/product/redio/css/jquery-labelauty.css')}}">
    <script src="{{url('r_frontend/product/redio/js/jquery-1.8.3.min.js')}}"></script>
    <script src="{{url('r_frontend/product/redio/js/jquery-labelauty.js')}}"></script>



    <!--[if lt IE 9]>
    <script src="/r_backend/js/html5shiv.js"></script>
    <script src="/r_backend/js/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        /* <![CDATA[ */
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-49262924-2']);
        _gaq.push(['_trackPageview']);

        (function(b){(function(a){"__CF"in b&&"DJS"in b.__CF?b.__CF.DJS.push(a):"addEventListener"in b?b.addEventListener("load",a,!1):b.attachEvent("onload",a)})(function(){"FB"in b&&"Event"in FB&&"subscribe"in FB.Event&&(FB.Event.subscribe("edge.create",function(a){_gaq.push(["_trackSocial","facebook","like",a])}),FB.Event.subscribe("edge.remove",function(a){_gaq.push(["_trackSocial","facebook","unlike",a])}),FB.Event.subscribe("message.send",function(a){_gaq.push(["_trackSocial","facebook","send",a])}));"twttr"in b&&"events"in twttr&&"bind"in twttr.events&&twttr.events.bind("tweet",function(a){if(a){var b;if(a.target&&a.target.nodeName=="IFRAME")a:{if(a=a.target.src){a=a.split("#")[0].match(/[^?=&]+=([^&]*)?/g);b=0;for(var c;c=a[b];++b)if(c.indexOf("url")===0){b=unescape(c.split("=")[1]);break a}}b=void 0}_gaq.push(["_trackSocial","twitter","tweet",b])}})})})(window);
        /* ]]> */
    </script>
    @yield('css')
</head>
