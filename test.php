<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");
?>
<?
define('ROOT_PATH', implode('/', array_slice(explode('/', str_replace('\\', '/', __FILE__)), 0, -2)).'/');
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/import/translit_class.php");
// $_SERVER['DOCUMENT_ROOT'] = dirname(__FILE__).'/..';


$item_name = 'Тонкоигольная аспирационная биопсия (ТАБ) под контролем';
// $item_name = trim(preg_replace('/\s+/S', " ", $item_name));
$item_xmlid = CUtilEx::translit($item_name, "ru", array("replace_space"=>"","replace_other"=>""));
$item_xmlid = preg_replace('/ts/', 'c', $item_xmlid);
$i = translit($item_name);


$itemObj = new CIBlockElement();
$arElement = $itemObj->GetList(
	array('ID'),
	array(
		'IBLOCK_ID' => 26,
		'?EXTERNAL_ID' => $item_xmlid,
		// 'PROPERTY_ID_MIS_VALUE' => '1283',
		// 'ACTIVE' => 'N'
	)
)->Fetch();


if (function_exists(p))
{
	p($arElement);
}
?>
<?
/*$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"index-faq_adaptive",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("",""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "23",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("",""),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	)
);
*/
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
