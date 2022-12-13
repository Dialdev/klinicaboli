<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
$ElementID = $APPLICATION->IncludeComponent("bitrix:catalog.element", "article", array(
	"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
	"IBLOCK_ID" => $arParams["IBLOCK_ID"],
	"PRICE_CODE" => $arParams["PRICE_CODE"],
	"ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
	"PROPERTY_CODE" => array(),
	"ADD_ELEMENT_CHAIN" => "Y",
	"USE_PRODUCT_QUANTITY" => "Y",
	"SET_CANONICAL_URL" => "Y",
	"SET_STATUS_404" => "Y",
	"SHOW_404" => "Y",
));
/*
Рекомендуемые товары:
$APPLICATION->IncludeComponent("bitrix:catalog.recommended.products", "", array(
	"IBLOCK_ID" => $arParams["IBLOCK_ID"],
	"ID" => $ElementID,
	"PROPERTY_LINK" => "RECOMMEND",
	"PAGE_ELEMENT_COUNT" => 4,
	"PRICE_CODE" => $arParams["PRICE_CODE"],
	"SHOW_PRODUCTS_".$arParams["IBLOCK_ID"] => "Y",
	"PROPERTY_CODE_".$arParams["IBLOCK_ID"] => array(""),
	"USE_PRODUCT_QUANTITY" => "Y"
));

С этим товаром покупают:
$APPLICATION->IncludeComponent("bitrix:sale.recommended.products", "", array(
	"IBLOCK_ID" => $arParams["IBLOCK_ID"],
	"ID" => $ElementID,
	"MIN_BUYES" => 1,
	"PAGE_ELEMENT_COUNT" => 4,
	"PRICE_CODE" => $arParams["PRICE_CODE"],
	"SHOW_PRODUCTS_".$arParams["IBLOCK_ID"] => "Y",
	"PROPERTY_CODE_".$arParams["IBLOCK_ID"] => array(""),
	"USE_PRODUCT_QUANTITY" => "Y"
));
*/