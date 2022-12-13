<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
		<div id="zapisat" class="modal">
			<div class="modal-window">
				<a class="modal-window__close" onclick="Popup.CloseWindow();"></a>
				<h2 class="modal-window__title">Вопрос-ответ</h2>
					<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "menu_faq", array(
						"ADD_SECTIONS_CHAIN" => "Y",
						"CACHE_GROUPS" => "Y",
						"CACHE_TIME" => "36000000",
						"CACHE_TYPE" => "A",
						"COUNT_ELEMENTS" => "Y",
						"IBLOCK_ID" => "23",
						"IBLOCK_TYPE" => "content",
						"SECTION_CODE" => "",
						"SECTION_FIELDS" => array("", ""),
						"SECTION_ID" => $_REQUEST["SECTION_ID"],
						"SECTION_URL" => "",
						"SECTION_USER_FIELDS" => array("", ""),
						"TOP_DEPTH" => "2"
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