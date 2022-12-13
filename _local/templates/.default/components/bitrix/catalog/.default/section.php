<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
/*$APPLICATION->IncludeComponent("bitrix:catalog.smart.filter", "", array(
	"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
	"IBLOCK_ID" => $arParams["IBLOCK_ID"],
	"PRICE_CODE" => $arParams["PRICE_CODE"],
	"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
	"FILTER_NAME" => "arrFilter",
	"SEF_MODE" => "Y",
	"SEF_RULE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["smart_filter"],
	"SMART_FILTER_PATH" => $arResult["VARIABLES"]["SMART_FILTER_PATH"],
	"XML_EXPORT" => "Y"
));*/
/*$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "", array(
    "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
    "IBLOCK_ID" => $arParams["IBLOCK_ID"],
    "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
    "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
    "CACHE_TYPE" => $arParams["CACHE_TYPE"],
    "CACHE_TIME" => $arParams["CACHE_TIME"],
    "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
    "COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
    "TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
    "SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
    "VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
    "SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
    "HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
    //"ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : '')
    "ADD_SECTIONS_CHAIN" => "N",
));*/
$APPLICATION->IncludeComponent("bitrix:catalog.section", "services", array(
	"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
	"IBLOCK_ID" => $arParams["IBLOCK_ID"],
	"PRICE_CODE" => $arParams["PRICE_CODE"],
	"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
	"FILTER_NAME" => "arrFilter",
	"PAGE_ELEMENT_COUNT" => 30,
	"PROPERTY_CODE" => array(),
	"ADD_SECTIONS_CHAIN" => "Y",
	"USE_PRODUCT_QUANTITY" => "Y",
	"SET_STATUS_404" => "Y",
	"SHOW_404" => "Y",
    "ELEMENT_SORT_FIELD" => "sort",
    "ELEMENT_SORT_FIELD2" => "name",
    "ELEMENT_SORT_ORDER" => "asc",
    "ELEMENT_SORT_ORDER2" => "asc",
));