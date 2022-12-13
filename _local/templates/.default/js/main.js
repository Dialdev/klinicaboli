var Popup = {
	//id: false,
	//reload: false,

	ShowWindow: function(link,filename,params) {
		var id = $(link).attr('href');
		

		
		var path = '/local/templates/.default/include/'+filename+'.php';
		if (params["param"]>0) path += '?PARAM='+params["param"];
		//console.log(path);
		
		if (typeof(filename) != "undefined") 
		{
		$.get(path, function(data){

			if(!document.getElementById('popups'))
			{
				$(document.body).append('<div id="popups" class="modal-container" style="display:none;"></div>');
				$('#popups').fadeIn( "slow", "linear" );
			}
			else {
				$('#popups').detach();
			}

			if(!document.getElementById(id.slice(1)))
			{
				$('#popups').append(data);
			}
			else
			{
				$(id).replaceWith(data);
			}

			this.id = id;
		});
		} else {
			
			if(document.getElementById('popups'))
			{
				$('#popups').detach();
			}	
				$(document.body).append('<div id="popups" class="modal-container _not_ajax" style="display:none;" data-div="'+id+'"></div>');
				$('#popups').append($(id));
				$(id).show();
				

				$('#popups').fadeIn( "slow", "linear" );
				//$('#popups').show();
				//console.log($("#popups"));
			
		}
	},

	CloseWindow: function() {

		$('#popups').fadeOut( "slow", "linear",function() {
			if (!$('#popups').hasClass("_not_ajax")) {
				$('#popups').detach();
			} else {
			
				var div = $('#popups').data("div");
				//console.log(div);
				$(div).hide();
				$(document.body).append($(div));
				$('#popups').detach();
			}
		});

	},

	SendReview: function(link)
	{
		var form = $(link).closest('form')[0];
			$.post('/local/templates/.default/include/add-review.php', $(form).serialize(), function(data){
				$('#review').replaceWith(data);
			});

	},



}


function setTime(link) {
	var form = $(link).closest('form')[0];
	console.log(form);
	$(form).find('input[name="'+$(link).data("input")+'"]').val($(link).find("option:selected").text());
	$(form).find('input[name="'+$(link).data("inputrasp")+'"]').val($(link).val());
}

function getTime(type, id) {
	$('.alaselect._time').find('.alaselect__options').empty();
	$.ajax({
		type: "POST",
		url: "/local/templates/.default/include/get-time.php",
		data: ""+type+"="+id+"",
		success: function(data){
			if (data.length>2) {
				$('.alaselect._time').find('.alaselect__options').html(data);
			}//$('.select-container._time').html(data);
		}
	});
}

function windowResize() {
    var cur_width = $(window).width();
	
	if (cur_width > 1060 && $(".main-menu__hidden-part").length) {
	  $('.main-menu__hidden-part > .main-menu__item').each(function () {
			$(this).removeClass('_to-sub');
			$(this).appendTo('.main-menu');
	  });
	  $('.btn._charity').appendTo('.main-menu');
	  $('.header__search').appendTo('.header');
	 
	  //$(".main-menu__hidden-part").remove();
	}
	
	if (cur_width <= 1060 && cur_width > 770) {
		//if ($(".mobile").length) $(".mobile").remove();
		 $('.header__btn').appendTo('.header');
		menu = $('.main-menu');
		block_width = $('.main-menu').width();
		visible_width = block_width - 285;
		num_li = $('.main-menu').children('li').length;

		real_width = 0;
		if ($(".main-menu__hidden-part").length==0) $('<ul class="main-menu__hidden-part"></ul>').appendTo('.left-column');

		$('.main-menu > .main-menu__item').each(function () {
			real_width += $(this).width();
			if (visible_width < real_width) {
				$(this).addClass('_to-sub');
				$(this).appendTo('.main-menu__hidden-part');
			}
		});
	}
	if (cur_width <= 770 && $(".mobile").length==0) {
		$('<div class="mobile"></div>').appendTo('.left-column');
		$('.main-menu').appendTo('.mobile');
		$('.header__btn').appendTo('.mobile').css({'display':'inline-block'});
		$('.header__search').appendTo('.mobile').css({'display':'block'});
	}
} 


$(document).on('ready', function() {
/************************************************************************/
	windowResize();
	$(window).resize(function() {
        windowResize();
    });
/************************************************************************/
	$("._modal_link").on("click", function (e) {
		e.preventDefault();
		var params={};
				if ($(this).attr('doctor')!='') params = {"param": $(this).data('param')};
		Popup.ShowWindow($(this), $(this).data('filename'),params);
	});

	$('body').click(function (e) {
	console.log($('._modal_link').has(e.target).length);
		if ($('.modal').has(e.target).length === 0 && $('.top-buttons').has(e.target).length === 0) {
		Popup.CloseWindow();
		}
		//if ($('.alaselect__choosed').has(e.target).length === 0) {console.log("123");}

	});

	/************************************************************************/

	$(".accordeon-item").not('._services').on("click", function () {
		var param = 70;
		var block_height = $(this).children(".accordeon-item__text").height() + param;

		if ($(this).height() == param) {
			$(this).animate({height: block_height}, 500);
			$(this).addClass('_opened');
		}
		else {
			$(this).animate({height: param}, 500);
			$(this).removeClass('_opened');
		}
		return false;
	});
	$(".accordeon-item-menu__link").on("click", function () {location.href=$(this).attr("href");});

	/************************************************************************/
	$(".doctor-detail__more").on("click", function () {
		var param = 174;
		var height = $(this).siblings(".doctor-detail__text").height();

		if (height == param) {
			$(this).siblings(".doctor-detail__text").animate({height: $(this).siblings(".doctor-detail__text").children(".doctor-detail__announce").height()+10}, 200);
			$(this).html("Свернуть");
		}
		else {
			$(this).siblings(".doctor-detail__text").animate({height: param}, 200);
			$(this).html("Читать подробнее");
		}
		/*return false;*/
	});
	/************************************************************************/
	$('.doctor-info__button').click(function (e) {
		$dataTab = $(this).data('tab');

		e.preventDefault();

		$('.doctor-info__button').removeClass('_active');
		$(this).addClass('_active');

		$('.doctor-info__content').each(function () {
			if ($dataTab == $(this).data('tab')) {
				$('.doctor-info__content').removeClass('_active');
				$(this).addClass('_active');
				return;
			}
		});
	});
	/************************************************************************/


	$('.photogallery-slider__items').slick({
		arrows: false,
		dots: false,
		respondTo: 'window',
		infinite: true,
		adaptiveHeight: true,
		speed: 300,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 3000,
		responsive: [{
			breakpoint: 1024,
			settings: {
				arrows: false
			}
		}]
	});


//adaptive
	

		$('.services-mainpage-slider').slick({
			arrows: false,
			infinite: true,
			slidesToShow: 5,
			slidesToScroll: 5,
			responsive: [{
				breakpoint: 1060,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
			}},
				{
				breakpoint: 770,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				}
			}]
			
		});
		
		$('._mainpage-actions').slick({
			autoplay: true,
			arrows: false,
			dots: false,
			slidesToShow: 1,
			centerPadding: "0px",
			draggable: false,
			infinite: true,
			pauseOnHover: true,
			swipe: false,
			touchMove: false,
			vertical: true,
			speed: 1000,
			autoplaySpeed: 2000,
			useTransform: true,
			cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1.000)',
			adaptiveHeight: true,
			responsive: [{
				breakpoint: 1060,
				settings: {
					
			}},
				{
				breakpoint: 770,
				settings: {
					
				}
			}]
		});
		
		$('._mainpage-fag-list').slick({
			autoplay: true,
			arrows: false,
			dots: false,
			slidesToShow: 1,
			centerPadding: "0px",
			draggable: false,
			infinite: true,
			pauseOnHover: true,
			swipe: false,
			touchMove: false,
			vertical: true,
			speed: 1000,
			autoplaySpeed: 2000,
			useTransform: true,
			cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1.000)',
			adaptiveHeight: true,
			responsive: [{
				breakpoint: 1060,
				settings: {
					
			}},
				{
				breakpoint: 770,
				settings: {
					
				}
			}]
		});
		
		$('.small-vertical-slider').slick({
			autoplay: true,
			arrows: false,
			dots: false,
			slidesToShow: 1,
			centerPadding: "0px",
			draggable: false,
			infinite: true,
			pauseOnHover: false,
			swipe: true,
			touchMove: false,
			vertical: true,
			speed: 1000,
			autoplaySpeed: 2000,
			useTransform: true,
			cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1.000)',
			adaptiveHeight: true,
			responsive: [{
				breakpoint: 1060,
				settings: {
					slidesToShow: 3,
			}},
				{
				breakpoint: 770,
				settings: {
					
				}
			}]
		});
		
		$('.our-doctors-slider').slick({
			autoplay: true,
			arrows: false,
			dots: false,
			slidesToShow: 2,
			centerPadding: "0px",
			draggable: false,
			infinite: true,
			pauseOnHover: false,
			swipe: true,
			touchMove: false,
			vertical: true,
			speed: 1000,
			autoplaySpeed: 2000,
			useTransform: true,
			cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1.000)',
			adaptiveHeight: true,
			responsive: [{
				breakpoint: 1060,
				settings: {
					slidesToShow: 2,
					vertical: false,
			}},
				{
				breakpoint: 770,
				settings: {
					slidesToShow: 1,
				}
			}]
		});
		
		$('.two-columns_news-slider').slick({
			arrows: false,
			infinite: true,
			slidesToShow: 2,
			slidesToScroll: 2,
			responsive: [{
				breakpoint: 1060,
				settings: {
					slidesToShow: 1,
				slidesToScroll: 1
			}},
				{
				breakpoint: 770,
				settings: {
					slidesToShow: 1,
				slidesToScroll: 1
				}
			}]
			
		});
		
	$('.bottom-doctor-slider__items').slick({
		autoplay: true,
		arrows: false,
		dots: false,
		slidesToShow: 1,
		centerPadding: "0px",
		draggable: false,
		infinite: true,
		pauseOnHover: true,
		swipe: true,
		touchMove: false,
		vertical: true,
		speed: 1000,
		autoplaySpeed: 2000,
		useTransform: true,
		cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1.000)',
		adaptiveHeight: true,
	});


	$('.services-slider__arrow._prev').click(function () {
		$('.services-mainpage-slider').slick('slickPrev');
	})

	$('.services-slider__arrow._next').click(function () {
		$('.services-mainpage-slider').slick('slickNext');
	})

	$('.news-slider__arrow._prev').click(function () {
		$('.two-columns_news-slider').slick('slickPrev');
	})

	$('.news-slider__arrow._next').click(function () {
		$('.two-columns_news-slider').slick('slickNext');
	})

	$('.photogallery-slider__arrow._prev').click(function () {
		$('.photogallery-slider__items').slick('slickPrev');
	})

	$('.photogallery-slider__arrow._next').click(function () {
		$('.photogallery-slider__items').slick('slickNext');
	})

	$('._preim__arrow._prev').click(function () {
		$('.small-vertical-slider').slick('slickPrev');
	})

	$('._preim__arrow._next').click(function () {
		$('.small-vertical-slider').slick('slickNext');
	})

	$('.our-doctors__arrow._prev').click(function () {
		$('.our-doctors-slider').slick('slickPrev');
	})

	$('.our-doctors__arrow._next').click(function () {
		$('.our-doctors-slider').slick('slickNext');
	})

	$('.bottom-doctor-slider__arrow._prev').click(function () {
		$('.bottom-doctor-slider__items').slick('slickPrev');
	})

	$('.bottom-doctor-slider__arrow._next').click(function () {
		$('.bottom-doctor-slider__items').slick('slickNext');
	})

	/************************************************************************/

	$('.modal-menu__item._parent').click(function (e) {
		e.preventDefault();
		console.log();
		

		var $link = $(this).find("._submenu .modal-menu__link");
		if (e.target === $link[0]) {
			location.href=$($link[0]).attr("href");
			return false;
		}
		
		if (!$(e.target).hasClass('_child')) {
		$(this).find('.modal-menu._submenu').slideToggle();
		$(this).toggleClass('_opened');
		}
		else {
			location.href=$(e.target).attr("href");
		}
	});

	/************************************************************************/

	$('.script-container__point').click(function (e) {
		$datanumber = $(this).data('text');
		var system = $(this).data('system');
		$('.two-columns_script-container__chel').removeClass('_n _s _g _p _d _k');
		$('.two-columns_script-container__chel').addClass(system);
		$('.script-container-result').each(function () {
			if ($datanumber == $(this).data('result')) {
				$('.script-container-result').removeClass('_active');
				$(this).addClass('_active');
				if ($(window).width() <= 360) {
					var destination = $(this).offset().top - 100;
					console.log(destination);
					$('body').animate({scrollTop: destination}, 1100);
				}
				return;
			}
		});
		$('.two-columns_script-container__pain').each(function () {
			if ($datanumber == $(this).data('result')) {
				$('.two-columns_script-container__pain').removeClass('_active');
				$(this).addClass('_active');
				return;
			}
		});


	});

	/************************************************************************/
	$('.hidden-link').click(function (e) {
		e.preventDefault();
		$('.main-menu__hidden-part').slideToggle();
	});

	$('.mobile-menu').click(function (e) {
		e.preventDefault();
		if ($(this).hasClass("_opened")) {
			$(".mobile").animate({left: "-100%"}, 500);
			$(this).removeClass("_opened");
		} else {
			$(".mobile").animate({left: "0%"}, 500);
			$(this).addClass("_opened");
		}
	});
	/************************************************************************/

	$("._phone").mask("+7 (999) 999-99-99");

	$('input._name').on('keypress', function () {
		var that = this;
		setTimeout(function () {
			var res = /[^а-яА-ЯёЁa-zA-Z ]/g.exec(that.value);
			that.value = that.value.replace(res, '');
		}, 0);
	});

	if ($('a').is('.fancy')) $(".fancy").fancybox();



	

	$(".doctor-video, .reviews-item, .reviews-item__vidos, .detail-video").not('._mp4').click(function() {
		$.fancybox({
			'padding'		: 0,
			'autoScale'		: false,
			'transitionIn'	: 'none',
			'transitionOut'	: 'none',
			'title'			: this.title,
			'width'		: 1000,
			'height'		: 695,
			'href'			: this.href.replace(new RegExp("watch\\?v=", "i"), 'v/')+'&autoplay=1',
			'type'			: 'swf',
			'swf'			: {
				'wmode'		: 'transparent',
				'allowfullscreen'	: 'true'
			},

			'helpers': {
				overlay: {
					locked: false
				}
			}
		});

		return false;
	});
	
	$(".reviews-item._mp4").click(function() {
		/*$(".reviews-item._mp4").find('video').get(0).pause();*/
		$(".reviews-item._mp4").find('.play').fadeIn();
		$('.reviews-item._mp4 video').each(function () { 
			this.pause();
		});
		/*$(this).find('source').attr('src', $(this).find('source').attr('src') + '&autoplay=1');*/
		//$(this).find('video').play();
		$(this).find('video').get(0).play();
		$(this).find('.play').fadeOut();
		$(this).find('video').attr('controls', 'controls' );
		return false;
	});
	
	$(function () {
            /*$('video').fancybox({
                width: 640,
                height: 400,
                type: 'iframe'
            });*/
			$('.service-video-item__link').fancybox({
				afterShow: function() {
					this.content.find('video').trigger('play');
					this.content.find('video').on('ended', function() {
						$.fancybox.next();
					});
				}
			});
        });

	$('.alaselect').click(function (e) {
		//console.log("123");
		var val = e.target;
		$('.alaselect__options').not($(this).find('.alaselect__options')).hide();//закрыть все селекты кроме текущего
		$(this).find('.alaselect__options').slideToggle();

		if ($(val).hasClass('alaselect__option')) {
			$(this).find('.alaselect__choosed').text($(val).text());
			var form = $(this).closest('form')[0];
			//console.log($(val).text());
			$(form).find('input[name="' + $(this).data("input") + '"]').val($(val).text());
			//$(form).find('input[name="' + $(this).data("input") + '"]').val($(val).data('id'));
			console.log($(form).find('input[name="' + $(this).data("input") + '"]').val());

			if ($(this).hasClass('_services')) { getTime('service',$(val).data("id")); }
			if ($(this).hasClass('_doctors')) { getTime('doctor',$(val).data("id")); }
		}


	});




	$("select._services").change(function(){
		if($(this).val() == 0) return false;
		$("select._doctors").val($("select._services option:first").val());

		var idserv =  $(this).val();
		var form = $(this).closest('form')[0];
		$(form).find('input[name="'+$(this).data("input")+'"]').val($(this).find("option:selected").text());

		$.ajax({
			type: "POST",
			url: "/local/templates/.default/include/get-time.php",
			data: "service="+idserv+"",
			success: function(data){
				if (data.length>2) $('.select-container._time').html(data);
			}
		});

	});

	$("select._doctors").change(function(){
		if($(this).val() == 0) return false;
		$("select._services").val($("select._services option:first").val());

		var iddoctor =  $(this).val();
		var form = $(this).closest('form')[0];
		$(form).find('input[name="'+$(this).data("input")+'"]').val($(this).find("option:selected").text());

		$.ajax({
			type: "POST",
			url: "/local/templates/.default/include/get-time.php",
			data: "doctor="+iddoctor+"",
			success: function(data){
				if (data.length>2) $('.select-container._time').html(data);
			}
		});
	});


	$('._faq, ._add-review, ._services-for-articles').click(function(){
		$('#popup-noajax').fadeIn();
	});

	$('#popup-noajax .modal-window__close').click(function(){
		$('#popup-noajax').fadeOut();
	})
	
	
	var item_height = 0;
    var item_height_price = 0;
    $('.action-text').each(function(){

        var this_height = $(this).height();
        if(this_height > item_height){
            item_height = this_height;
           
        }


    });
    $('.action-text').height(item_height);    

});