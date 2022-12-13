$(function(){
	$('.product-images__item').click(function(){
		$('.product-images__item._active').removeClass('_active');
		var src = $(this).addClass('_active').data('src');
		$('.product-images__main').attr('src', src);
	});

	$('.product__buy').click(function(){
		BX.ajax.loadJSON(location.href, {"action": "ADD2BASKET", "ajax_basket": "Y", "id": $(this).attr('data-id'), "quantity": $('.product__quantity').val()}, function(result) {
			$('.popup._buy .popup__message').text(result.MESSAGE);
			$('.popup._buy,.popup-overlay').fadeIn();
		});
	});

	// нужно для работы компонента "Просмотренные товары" (catalog.viewed.products)
	//$.post("/bitrix/components/bitrix/catalog.element/ajax.php", {"AJAX": "Y", "SITE_ID": "s1", "PRODUCT_ID": $('.product__buy').attr('data-id')});
});