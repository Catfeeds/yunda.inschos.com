$(function() {
    $('.btn-select').on('tap', function() {
        $(this).addClass('label-active').siblings().removeClass('label-active');
    });
	var Ele = {
		contentwrapperli: $('.content-wrapper li'),
		scrollwrapper: mui('.mui-scroll-wrapper'),
		iconjianhao:$('.icon-jianhao'),
		btnselectnum:$('.btn-select-num')
	}
	// 初始化
	Ele.scrollwrapper.scroll({
		deceleration: 0.0005
	});
	
	$('.content-wrapper li:gt(4)').hide();
	Ele.contentwrapperli.eq(4).css('border-bottom', 'none');
	

	var userPicker = new mui.PopPicker();
	//$('.btn-dropdown,.btn-select').on('tap', function() {
		// var _this = $(this);
		// var data = $(this).attr('data-options');
		// if(data) {
		// 	userPicker.setData(JSON.parse(data));
        //
		// 	userPicker.show(function(items) {
		// 		var value = items[0].value;
		// 		var text = items[0].text;
		// 		_this.text(text)
		// 		console.log(value, text)
		// 	});
		// }
	//});
	var clientWidth = document.documentElement.clientWidth || document.body.clientWidth;
	var height = (4.15 - 0.9) * 100 * (clientWidth / 750);
	var num = 0.6 / height;
	var beforeY, nowY, opacity = 0.6;

	$('.mui-scroll-wrapper').on('dragstart', function() {
		beforeY = Ele.scrollwrapper.scroll().y;
	});

	$('.mui-scroll-wrapper').on('drag', function() {
		nowY = Ele.scrollwrapper.scroll().y;
		var increase = beforeY - nowY;
		if(increase > 0) {
			if(opacity == 1) return;
			opacity = opacity + num;
		} else {
			if(opacity == 0.6) return;
			opacity = opacity - num;
		}
		$('.mui-bar-nav').css({
			'background': 'rgba(2,90,141,' + opacity + ')'
		});
	});

	// $('.btn-select').on('tap', function() {
	// 	$(this).addClass('label-active').siblings().removeClass('label-active');
	// });
    $('.pickerfour').on('tap', function() {
        var _this = $(this);
        var picker = new mui.DtPicker({
            "type": "date"
        });
        picker.show(function(rs) {
            _this.find('input').val(rs.text);
            guaranteeTime = rs.text;
        });
    });
	$('.btn-open').click(function() {
		var _this = $(this);
		_this.toggleClass('unfold');
		if(_this.hasClass('unfold')) {
			_this.html('收起<i class="iconfont icon-xiala1"></i>')
			Ele.contentwrapperli.show();
			Ele.contentwrapperli.eq(4).css('border-bottom', '1px solid #dcdcdc');
		} else {
			_this.html('展开<i class="iconfont icon-xiala"></i>')
			$('.content-wrapper li:gt(4)').hide();
			Ele.contentwrapperli.eq(4).css('border-bottom', 'none');
		}
	});

	$('.mui-numbox-btn-plus').on('tap', function() {
		console.log(parseInt($('.mui-numbox-input').val()) + 1)
	});
	

	$('.btn-have').on('tap', function() {
		mui('#noticePopover').popover('hide');
	});
	$('.btn-agree').on('tap', function() {
		$(this).parents('.notice-wrapper').hide().next().show();
	});
	
	$('.icon-add').on('tap', function() {
		var num = parseInt(Ele.btnselectnum.text());
		num++;
		Ele.iconjianhao.css({'color':'#00a2ff'})
		Ele.btnselectnum.text(num);
	});

	Ele.iconjianhao.on('tap', function() {
		var num = parseInt(Ele.btnselectnum.text());
		if(num == 1)return;
		if(num == 2){
			Ele.iconjianhao.css({'color':'#333'});
		};
		num--;
		Ele.btnselectnum.text(num);
	});

	// 判断是否登录
	var isLogin = false;
	$('.btn-insured').on('tap', function() {
		if(isLogin) {
			mui('#noticePopover').popover('show');
		}else{
			mui('#loginPopover').popover('show');
		}
	});
// 滑动解锁
    var oBtn = document.getElementById('btn');
    var oW, oLeft;
    var oSlider = document.getElementById('slider');
    var oTrack = document.getElementById('track');
    var oIcon = document.getElementById('icon');
    var oSpinner = document.getElementById('spinner');
    var flag = 1;

    oBtn.addEventListener('touchstart', function(e) {
        if (flag == 1) {
            var touches = e.touches[0];
            oW = touches.clientX - oBtn.offsetLeft;
        }
    }, false);

    oBtn.addEventListener("touchmove", function(e) {
        var maxLength = oSlider.clientWidth - oBtn.offsetWidth;
        if (flag == 1) {
            var touches = e.touches[0];
            oLeft = touches.clientX - oW;
            console.log(oLeft)
            if (oLeft < 0) {
                oLeft = 0;
            } else if (oLeft > maxLength) {
                oLeft = maxLength;
            }
            oBtn.style.left = oLeft + "px";
            oTrack.style.width = oLeft + 'px';
        }
    }, false);

    oBtn.addEventListener("touchend", function() {
        var maxLength = oSlider.clientWidth - oBtn.offsetWidth;
        if (oLeft >= maxLength) {
            oIcon.style.display = 'none';
            oSpinner.style.display = 'block';
            flag = 0;
            $('.bg-green').text('完成验证');
            $('#move_check').val(2);
        } else {
            oBtn.style.left = 0;
            oTrack.style.width = 0;
        }
    }, false);

});