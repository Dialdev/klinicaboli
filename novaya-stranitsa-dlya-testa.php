<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новая страница для теста");
?>Text here....

<?/**/

$APPLICATION->IncludeComponent("bitrix:form.result.new", "doctor", $arParams, $component);
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:form",
	"",
	Array(
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"EDIT_ADDITIONAL" => "N",
		"EDIT_STATUS" => "Y",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"NOT_SHOW_FILTER" => "",
		"NOT_SHOW_TABLE" => "",
		"RESULT_ID" => $_REQUEST[RESULT_ID],
		"SEF_MODE" => "N",
		"SHOW_ADDITIONAL" => "N",
		"SHOW_ANSWER_VALUE" => "N",
		"SHOW_EDIT_PAGE" => "Y",
		"SHOW_LIST_PAGE" => "Y",
		"SHOW_STATUS" => "Y",
		"SHOW_VIEW_PAGE" => "Y",
		"START_PAGE" => "new",
		"SUCCESS_URL" => "Отправлено! =)",
		"USE_EXTENDED_ERRORS" => "N",
		"VARIABLE_ALIASES" => Array("action"=>"action"),
		"WEB_FORM_ID" => $_REQUEST[WEB_FORM_ID]
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>