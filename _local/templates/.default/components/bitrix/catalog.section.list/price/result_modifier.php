<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

foreach ($arResult['SECTIONS'] as &$arSection) {
    $arSection['ELEMENTS'] = array();
    $arSelect = Array("ID","IBLOCK_ID", "SECTION_ID","ACTIVE", "NAME","PROPERTY_PRICE");
    $arFilter = Array("IBLOCK_ID" => IntVal($arSection["IBLOCK_ID"]), "SECTION_ID" => $arSection['ID'],"ACTIVE_DATE" => "Y", "ACTIVE" => "Y", ">PROPERTY_PRICE" => 0);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 50), $arSelect);
    while ($ob = $res->GetNext()) {
        $arSection['ELEMENTS'][] = $ob;
    }
}





?>