<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
		<div id="zapisat" class="modal">
			<div class="modal-window">
				<a class="modal-window__close" onclick="Popup.CloseWindow();"></a>
				<h2 class="modal-window__title">Записаться к врачу</h2>
				<?$APPLICATION->IncludeComponent("bitrix:form.result.new", "zapis-modal", array(
									"WEB_FORM_ID" => "4",
										"LIST_URL" => "",
					"AJAX_MODE" => "Y",
					"AJAX_OPTION_JUMP" => "N",
					"DOCTOR" => $_GET["PARAM"],
				));?>

			</div>
		</div>

