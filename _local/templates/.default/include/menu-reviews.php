<div class="top-buttons">
                <a href="/otzyvy/" class="top-buttons__item _all_reviews">Все отзывы</a>
                <a href="#reviews-theme" class="top-buttons__item _type_reviews _modal_link">Отзывы по видам услуг</a>
				<a href="/otzyvy/?videootzyv=1" class="top-buttons__item">Видеоотзывы</a>
                <a href="#review" class="write-us _add-review">Оставить свой отзыв</a>
            </div>
			
<div id="reviews-theme" class="modal" style="display:none;">
	<div class="modal-window">
		<a class="modal-window__close" onclick="Popup.CloseWindow();"></a>
		<h2 class="modal-window__title">Выбрать тематику</h2>
		<?
		$GLOBALS['arrFilterSection'] = Array( '!PROPERTY_SERVICE_REF' => false);
		$APPLICATION->IncludeComponent("bitrix:catalog.section", "menu_reviews", array(
			"IBLOCK_TYPE" => "content",
			"IBLOCK_ID" => 24,
			"PRICE_CODE" => '',
			"SECTION_CODE" => '',
			"FILTER_NAME" => "arrFilterSection",
			"PAGE_ELEMENT_COUNT" => 30,
			"PROPERTY_CODE" => array(),
			"ADD_SECTIONS_CHAIN" => "N",
			"USE_PRODUCT_QUANTITY" => "N",
			"SET_STATUS_404" => "N",
			"SHOW_404" => "N",
			"PROPERTY_CODE" => array("SERVICE_REF",""),
		));?>
	</div>
</div>