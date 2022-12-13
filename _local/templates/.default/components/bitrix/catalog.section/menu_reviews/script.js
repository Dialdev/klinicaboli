$(function(){
	$('.section-item__buy').click(function(){
		var item = $(this).parents('.section-item');
		BX.ajax.loadJSON(location.href, {"action": "ADD2BASKET", "ajax_basket": "Y", "id": $(this).attr('data-id'), "quantity": $('.section-item__quantity', item).val()}, function(result) {
			$('.popup._buy .popup__message').text(result.MESSAGE);
			$('.popup._buy,.popup-overlay').fadeIn();
		});
	});
});