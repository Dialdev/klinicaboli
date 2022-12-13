<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
		<div id="zapisat" class="modal">
			<div class="modal-window">
				<a class="modal-window__close" onclick="Popup.CloseWindow();"></a>
				<h2 class="modal-window__title">Статьи</h2>
					<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "menu_articles", array(
						"IBLOCK_TYPE" => 'content',
						"IBLOCK_ID" => 19,
						"TOP_DEPTH" => 1,
						"COUNT_ELEMENTS" => "N",
						
					));?>
			</div>
		</div>


<script>
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
</script>