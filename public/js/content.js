
$(document).ready(function(){

	$('.loc1_in_cat ul').bxSlider({
	  minSlides: 12,
	  maxSlides: 12,
	  slideWidth: 100,
	  slideMargin: 0,
	  default: true
	});
	
	$('.loc1_in_search ul').bxSlider({
	  minSlides: 12,
	  maxSlides: 12,
	  slideWidth: 100,
	  slideMargin: 0,
	});
	

	
	/* Totop icon */
	$(".scroll-top").click(function(e){
		e.preventDefault();$("html, body").animate({scrollTop:0},"slow");return false;}
	);
	$(window).scroll(function(){if($(this).scrollTop()>300){$('.scroll-top').removeClass('off').addClass('on');}
	else{$('.scroll-top').removeClass('on').addClass('off');}});
	/* Totop icon */
	
	$(window).scroll(function() {
		 "use strict";
			if ($("#TopDetect").offset().top >= 106){
				if( $("header").hasClass('fixedmenu') == false ){
					$(".lineheader").css('margin-bottom','40px');
					$("header").addClass('fixedmenu');
					$(".topmenu").append('<li class="headnumber_cartonmenu"><a href="/giohang" rel="nofollow">Giỏ hàng: '+ $(".headnumber_cart").html() + '</a></li>');
				}
			}else{
				if( $("header").hasClass('fixedmenu') == true ){
					$(".lineheader").css('margin-bottom','0px');
					$("header").removeClass('fixedmenu');
					$(".headnumber_cartonmenu").remove();
				}
			}
	});
	

	
	

	/* cart */
	$(document).on('click', '.quick-buy', function(){
		var id = $(this).attr('data-id');
		var num = '1';
		$('.quick-buy[data-id='+id+']').text('Đang xử lý ...');
		$.post( '/cart/add', { id:id , num:num }, function( data ) {
			var obj = jQuery.parseJSON(data);
			$(".menunav .total_item span.cart-label").html(obj.sizecart);
			$(".menunav .total_price span").html(obj.total);
			$('.quick-buy[data-id='+id+']').text('Đã thêm vào giỏ');
			$('.quick-buy[data-id='+id+']').removeClass('quick-buy');
		});
	});  
	
	$('.dathang-btn').click(function(){
		var id = $(this).attr('data-id');
		var num = '1';
		$('.dathang-btn[data-id='+id+']').text('Đang xử lý ...');
		$.post( '/cart/add', { id:id , num:num }, function( data ) {
			window.location.href = '/cart/checkout';
		});
	});  
	
	$('.input_num_cart').change(function(){
		var id = $(this).attr('data-id');
		var num = $(this).val();
		$('.cart_tong[data-id='+id+']').text('Đang xử lý ...');
		$.post( '/cart/update', { id:id , num:num }, function( data ) {
			var obj = jQuery.parseJSON(data);
			$(".menunav .total_item span.cart-label").html(obj.sizecart);
			$(".menunav .total_price span").html(obj.total);
			$(".cart_tongdonhang span").html(obj.total+' VND');
			$('.cart_tong[data-id='+id+']').html(obj.this_total);
			var sizecart = obj.sizecart;
			if(sizecart == '0'){
				location.reload();
			}
		});
	});  
	
	$('.cart_remove').click(function(){
		var id = $(this).attr('data-id');
		$('.cart_tong[data-id='+id+']').text('Đang xử lý ...');
		$.post( '/cart/remove', { id:id }, function( data ) {
			var obj = jQuery.parseJSON(data);
			$(".menunav .total_item span.cart-label").html(obj.sizecart);
			$(".menunav .total_price span").html(obj.total);
			$(".cart_tongdonhang span").html(obj.total);
			$('tr.cart_line[data-id='+id+']').remove();
			var sizecart = obj.sizecart;
			if(sizecart == '0'){
				location.reload();
			}
		});
	});
	
	$('#kh_name').keyup(function(){
		var text = $(this).val();
		$('#nh_name').val(text);
	});
	$('#kh_phone').keyup(function(){
		var text = $(this).val();
		$('#nh_phone').val(text);
	});
	$('#kh_address').keyup(function(){
		var text = $(this).val();
		$('#nh_address').val(text);
	});
	
	/* so sanh */
	
	$('.add-sosanh input').click(function(){
		var id = $(this).attr('data-id');
		
		if($(this).is(":checked")) {
			$.post( '/compare/add', { id:id }, function( data ) {
				var obj = jQuery.parseJSON(data);
				var status = obj.status;
				var size = obj.size;
				if(status == 'full'){
					$('.popupcontent').load('/compare/index/?status=full');
					$('input[data-id='+id+']').prop('checked',false);
				}else{
					$('.popupcontent').load('/compare/');
				}
				if(size > 0){
					$('.popupbg').fadeIn();
					$('.popupcontent').fadeIn();
				}
			});
		}else{
			$.post( '/compare/remove', { id:id }, function( data ) {
				
			});
		}
	});
	$('.popupbg').click(function(){
		$('.popupbg').fadeOut();
		$('.popupcontent').fadeOut();
	});
	
	$(document).on('click', '.remove-compare', function(){
		var id = $(this).attr('data-id');
		$.post( '/compare/remove', { id:id }, function( data ) {
			var obj = jQuery.parseJSON(data);
			var size = obj.size;
			$('.compare_wapper td[data-id='+id+']').remove();
			if(size < 1){
				$('.popupbg').fadeOut();
				$('.popupcontent').fadeOut();
			}
			$('input[data-id='+id+']').prop('checked',false);
		});
	});	
	
	
	/* xây dựng cấu hình */

	$(document).on('click', '.addbuilder', function(){
		var id = $(this).attr('data-id');
		var step = $(this).attr('data-step');
		var img = $('img[data-id='+id+']').attr('src');
		$.post( '/buildpc/additem', { id:id,step:step }, function( data ) {
			var obj = jQuery.parseJSON(data);
			$(".bulider-price span").html(obj.total);
			$('.instep .step_thumb').html('<img src="'+img+'"/>');
		});	
	});
	
	$('.buidertocart').click(function(){
		$.post( '/ajax/buidertocart', { type:'builder' }, function( data ) {
			window.location.href = '/cart/checkout';
		});
	});
	
	$('.buidertoprint').click(function(){
		window.location.href = '/buildpc/buidertoprint';
	});
	
	$('.buildpc_remove_item').click(function(){
		var step = $(this).attr('data-step');
		$.post( '/ajax/buildpcremoveitem', { step:step }, function( data ) {
			location.reload();
		});
	});
	
	/* support 
	if ( readCookie("open_support") == 'close' ){
		
		$('.hotrotructuyen_box').removeClass('close');
		$('.hotrotructuyen_box').addClass('open');
		
	}else{
		
		$('.hotrotructuyen_box').removeClass('open');
		$('.hotrotructuyen_box').addClass('close');
		
	}
	
	$( ".hotrotop" ).click(function() {
		
		$( ".hotrotructuyen_box" ).toggle();
		
		if ( readCookie("open_support") == 'close' ){
			
			createCookie("open_support","open",10);
			$('.hotrotructuyen_box').removeClass('close');
			$('.hotrotructuyen_box').addClass('open');
			
		}else{
			
			createCookie("open_support","close",10);
			$('.hotrotructuyen_box').removeClass('open');
			$('.hotrotructuyen_box').addClass('close');
			
		}
		
	});
	*/
	
	//cmt
	var cid = $('#txtContentID').val();
	$('#listComments').load("/cmt/load/"+cid);
	
	$('#btnSendComment').click(function(){
		var cid = $('#txtContentID').val();
		var name = $('#txtName').val();
		var email = $('#txtEmail').val();
		var content = $('#txtContent').val();
		$.post( "/cmt/add/"+cid,{name:name,email:email,content:content},function( data ) {
			$('#listComments').load("/cmt/load/"+cid+"/1/");
			var name = $('#txtName').val('');
			var name = $('#txtEmail').val('');
			var content = $('#txtContent').val('');
		});	
	});
	
	/* brand */

	
});


function createCookie(name, value, days) {
    var expires;

    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    } else {
        expires = "";
    }
    document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
}

function readCookie(name) {
    var nameEQ = escape(name) + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0) return unescape(c.substring(nameEQ.length, c.length));
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name, "", -1);
}

//TOOLTIP
$(document).ready(function(e) {
	var w_tooltip = $(".tooltip").width();;
	var h_tooltip = 0;
	var pad = 10; 
	var x_mouse = 0; var y_mouse = 0;
	var wrap_left = 0;
	var wrap_right = 0;
	var wrap_top = 0;
	var wrap_bottom = 0;

	$(".pro-item .pro-img").mousemove(function(e){
		wrap_left = $(this).parent().parent().offset().left;
		wrap_top = $(this).parent().parent().offset().top;
		wrap_bottom = $(this).parent().parent().offset().top + $(this).parent().parent().parents(".product_list").height();
		x_mouse = e.pageX - $(this).offset().left;
		y_mouse = e.pageY - $(this).offset().top;
		h_tooltip = $(this).parent().children(".tooltip").height();
		$(".tooltip").hide();
		
	   
		//Move Horizontal
		if($(this).offset().left - pad - w_tooltip > wrap_left){
			$(this).parent().children(".tooltip").css("left", 0-(w_tooltip + pad) + x_mouse);
		}else{
			$(this).parent().children(".tooltip").css("left", pad + x_mouse + 20);
		}
		
		//Move Vertical		
		if(e.pageY + h_tooltip >= $(window).height() + $(window).scrollTop()){
			$(this).parent().children(".tooltip").css("top", y_mouse - h_tooltip - pad)
		}else{
			$(this).parent().children(".tooltip").css("top", pad+ y_mouse + 20);
			}
		//Show tooltip	
		$(this).parent().children(".tooltip").show();
	});
		
	$(".pro-item .pro-img").mouseout(function(){
		$(".tooltip").hide();
	});
	
	
	$('.menunav .input_search').keyup(function(){
		var name = $(this).val();
		$.post( '/suggest/',{name:name},function( data ) {
			$('.auto_suggest').html(data);
		});	
	});
	
	
	var vesioncafex = 1.0;
	var domainsso = "http://web60s.vn/";
	var domainstatic = "http://mho.vn/Scripts/";
	function appendCss(url) {
		var head = document.getElementsByTagName('head')[0];
		var link = document.createElement('link');
		link.rel = 'stylesheet';
		link.type = 'text/css';
		link.href = domainstatic + url + "?v=" + vesioncafex;
		head.appendChild(link);
	}
	appendCss("jsAdvs/StyleAdvs.css");
	(function (a) {
		a.fn.VisibleScrolMh = function (c) {
			var d = { speed: 800 }; c && a.extend(d, { speed: c });
			return this.each(function () {
				var b = a(this);
				a(window).scroll(function () { 50 < a(this).scrollTop() ? b.fadeIn() : b.fadeOut() });
				b.click(function (b) {
					b.preventDefault();
					a("body, html").animate({ scrollTop: 0 }, d.speed)
				})
			})
		}
	})(jQuery);

	/* CUSTOM */
	/*$('.topmenu_show > .wrapper > ul > li > a').click(function(e) {
		e.preventDefault();
		var parent_li = $(this).parent();
		$($(parent_li).find('.sub-menu')[0]).toggle( );
		return false;
	});*/
});

$(document).ready(function(e){
    $('.input_number_cart').change(function(){
        var current = $(this);
        var row = $(this).attr('rowId');
        var qty = $(this).val();
        $.ajax({
            url : '/mua-hang/'+ row + "/" + qty,
            success : function(data){
                current.parent().parent().find('.cart_tong').text(data[0]);
                $('.tongdonhang').text(data[1]);
                $('.cart_count').text(data[2]);
            }
        });
    });
});

  