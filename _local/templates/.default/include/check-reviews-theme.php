<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>

<?
/*CModule::IncludeModule('iblock');

$arELFilter = array(
	'IBLOCK_ID' => 24,
	'ACTIVE' => 'Y',
	'!PROPERTY_SERVICE_REF'=>false
);
$el_bs = new CIBlockElement();
$elObj = $el_bs->GetList(array(), $arELFilter, false, array("IBLOCK_ID","ID","ACTIVE","NAME","PROPERTY_SERVICE_REF"));

$arServices = array();

while ($element = $elObj->GetNext()) {
	print_r($element);
	$db_props= $element->GetProperty($element['ID'], 14, array("sort" => "asc"), Array("CODE"=>"SERVICE_REF"));
	if($ar_props = $db_props->Fetch())
		print_r($ar_props);
	//if (!in_array())$arServices
}
*/
?>

<div id="reviews-theme" class="modal">
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


<script>
	$('.modal-menu__item._parent').click(function (e) {
		e.preventDefault();
		$(this).find('.modal-menu._submenu').slideToggle();
		$(this).toggleClass('_opened');
	});
</script>