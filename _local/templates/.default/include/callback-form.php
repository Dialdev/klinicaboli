<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
		<div id="callback" class="modal">
			<div class="modal-window">
				<a class="modal-window__close" onclick="Popup.CloseWindow();"></a>
				<h2 class="modal-window__title">Заказать звонок</h2>
				<?$APPLICATION->IncludeComponent("bitrix:form.result.new", "callback", array(
									"WEB_FORM_ID" => "3",
										"LIST_URL" => "",
					"AJAX_MODE" => "Y",
					"AJAX_OPTION_JUMP" => "N"
				));?>

			</div>
		</div>

