$(function(){
	//当页面加载时，部分元素需要先隐藏
	$('.img1,.img2,.img3,.img4,.img6,.img7,.img8,.img9,.img21,.img22,.img23,.img24,.img25,.img26,.img27,#pai1,#pai2,#pai3,#pai4,.tishi').hide();


	//各元素逐个滑入
	setInterval(function(){ $(".img8").fadeIn(1000).fadeOut(1000); },1000); //太阳光闪烁
	setInterval(function(){ $(".img9").fadeIn(1000).fadeOut(1000); },1000); //点光闪烁
	setTimeout(show_guang1,6000); //到指定时间，旋转光开始旋转
	setTimeout(show_logo,1000);   //到指定时间，logo滑入
	setTimeout(show_div1,2000); //到指定时间，滑入第一张牌的盒子
	setTimeout(show_div2,2500); //到指定时间，滑入第二张牌的盒子
	setTimeout(show_div3,3000); //到指定时间，滑入第三张牌的盒子
	setTimeout(show_div4,3500); //到指定时间，滑入第四张牌的盒子
	setTimeout(show_pai1,4500); //到指定时间，翻转第一张牌
	setTimeout(show_pai2,4900); //到指定时间，翻转第二张牌
	setTimeout(show_pai3,5200); //到指定时间，翻转第三张牌
	setTimeout(show_pai4,5500); //到指定时间，翻转第四张牌

	//执行各牌滑入的函数
	function show_guang1() {
		$('.img7').show().addClass("animated rotateOut");
	}

	function show_logo() {
		$('.img6').show().addClass("animated slideInLeft");
	}

	function show_div1() {
		$('.img1').show().addClass("animated slideInLeft");
	}

	function show_div2() {
		$('.img2').show().addClass("animated slideInLeft");
	}

	function show_div3() {
		$('.img3').show().addClass("animated slideInLeft");
	}

	function show_div4() {
		$('.img4').show().addClass("animated slideInLeft");
	}

	//执行翻牌的函数
	function show_pai1() {
		$('#pai_back').addClass('flip out');
		$('#pai1').show().addClass('flip in');
	}
	function show_pai2() {
		$('#pai_back').addClass('flip out');
		$('#pai2').show().addClass('flip in');
	}
	function show_pai3() {
		$('#pai_back').addClass('flip out');
		$('#pai3').show().addClass('flip in');
	}
	function show_pai4() {
		$('#pai_back').addClass('flip out');
		$('#pai4').show().addClass('flip in');
	}


	//当第一波效果图展示完后，点击桌面则执行将四张牌弹出，然后加载其他图片元素
	setTimeout(click_two,6000);
	function click_two() {

		tishi1 = setInterval(function(){
		 $(".tishi").fadeIn(500).fadeOut(500);
		  },1000);
		$(document).on('click',function(){
			//清除定时器，并删除提示元素
			clearInterval(tishi1);
			$('.tishi').remove(); 

			$('.img1').removeClass("animated slideInLeft").addClass("animated slideOutLeft").hide();
			$('.img2').removeClass("animated slideInLeft").addClass("animated slideOutLeft").hide();
			$('.img3').removeClass("animated slideInLeft").addClass("animated slideOutLeft").hide();
			$('.img4').removeClass("animated slideInLeft").addClass("animated slideOutLeft").hide();
			//待四张牌滑走后，才将其他元素滑入
			setTimeout(show_img21,300);
		});	
	}

	function show_img21() {
		$('.img21').show().addClass("animated slideInLeft");
		$('.img22').show().addClass("animated slideInLeft");
		$('.img23').show().addClass("animated slideInLeft");
		$('.img24').show().addClass("animated slideInLeft");
		$('.img25').show().addClass("animated slideInLeft");
		$('.img26').show().addClass("animated slideInLeft");
		$('.img27').show().addClass("animated slideInLeft");
	}

});