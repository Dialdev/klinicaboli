<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
$APPLICATION->IncludeComponent("bitrix:news.detail", "", array(
	"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
	"IBLOCK_ID" => $arParams["IBLOCK_ID"],
	"ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
	"PROPERTY_CODE" => array(),
	"ADD_ELEMENT_CHAIN" => "Y",
	"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
	"SET_CANONICAL_URL" => "Y",
	"SET_STATUS_404" => "Y",
	"SHOW_404" => "Y",
));