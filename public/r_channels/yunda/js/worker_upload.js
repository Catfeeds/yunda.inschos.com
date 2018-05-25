onmessage = function (evt){
    var d = evt.data;
    ajax({
        url: d.url,  // 请求地址
        type: 'POST',  // 请求类型，默认"GET"，还可以是"POST"
        data: {"base64": d.base64,"fileKey":d.file_name,"fileName":"yunda.png"},  // 传输数据
        success: function(data){  // 请求成功的回调函数
            postMessage(JSON.parse(data));
        },
        error: function(error) {
            postMessage(error);
        }
    });

}


function ajax(params) {
    params = params || {};
    params.data = params.data || {};
    // 判断是ajax请求还是jsonp请求
    var json = params.jsonp ? jsonp(params) : json(params);
    // ajax请求 
    function json(params) {
        // 请求方式，默认是GET
        params.type = (params.type || 'GET').toUpperCase();
        // 避免有特殊字符，必须格式化传输数据
        //params.data = formatParams(params.data);
        var xhr = null;
        // 实例化XMLHttpRequest对象 

        xhr = new XMLHttpRequest();

        // 监听事件，只要 readyState 的值变化，就会调用 readystatechange 事件
        xhr.onreadystatechange = function() {
            // readyState属性表示请求/响应过程的当前活动阶段，4为完成，已经接收到全部响应数据
            if(xhr.readyState == 4) {
                var status = xhr.status;
                var readyState = xhr.readyState ;
                // status：响应的HTTP状态码，以2开头的都是成功
                if(status >= 200 && status < 300) {
                    var response = '';
                    // 判断接受数据的内容类型
                    var type = xhr.getResponseHeader('Content-type');
                    if(type.indexOf('xml') !== -1 && xhr.responseXML) {
                        response = xhr.responseXML; //Document对象响应 
                    } else if(type === 'application/json') {
                        response = JSON.parse(xhr.responseText); //JSON响应 
                    } else {
                        response = xhr.responseText; //字符串响应 
                    };
                    // 成功回调函数
                    params.success && params.success(response);
                } else {
                    var error = JSON.stringify({'status':status,'readyState':readyState,'Text':xhr.responseText});
                    params.error && params.error(error);
                }
            };
        };
        // 连接和传输数据 
        if(params.type == 'GET') {
            // 三个参数：请求方式、请求地址(get方式时，传输数据是加在地址后的)、是否异步请求(同步请求的情况极少)；
            xhr.open(params.type, params.url + '?' + formatParams(params.data), false);
            xhr.send(null);
        } else {
            xhr.open(params.type, params.url, false);
            //必须，设置提交时的内容类型 
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
            // 传输数据
            xhr.send(JSON.stringify(params.data));
        }
    }

    //格式化参数
    function formatParams(data) {
        var arr = [];
        for(var name in data) {
            //  encodeURIComponent() ：用于对 URI 中的某一部分进行编码
            arr.push(encodeURIComponent(name) + '=' + encodeURIComponent(data[name]));
        };
        // 添加一个随机数参数，防止缓存
        arr.push('v=' + random());
        return arr.join('&');
    }

}

