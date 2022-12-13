<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
$APPLICATION->IncludeComponent("bitrix:catalog.compare.result", "", array(
	"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
	"IBLOCK_ID" => $arParams["IBLOCK_ID"],
	"PRICE_CODE" => $arParams["PRICE_CODE"],
	"PROPERTY_CODE" => array(),
));
$APPLICATION->SetTitle("Сравнение товаров");
$APPLICATION->AddChainItem("Сравнение товаров", $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["compare"]);