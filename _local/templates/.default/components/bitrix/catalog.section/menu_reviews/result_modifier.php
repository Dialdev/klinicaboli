<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arServices = array();
$arResult['SERVICES'] = array();
foreach ($arResult['ITEMS'] as &$arItem) {

    if (!in_array($arItem['PROPERTIES']['SERVICE_REF']['VALUE'])) $arServices[]=$arItem['PROPERTIES']['SERVICE_REF']['VALUE'];


    /*if (!in_array ($arItem['']))
    $arItem['ELEMENTS'] = array();
    $arSelect = Array("ID","IBLOCK_ID", "SECTION_ID","ACTIVE", "NAME","DETAIL_PAGE_URL");
    $arFilter = Array("IBLOCK_ID" => IntVal($arSection["IBLOCK_ID"]), "SECTION_ID" => $arSection['ID'],"ACTIVE_DATE" => "Y", "ACTIVE" => "Y");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 50), $arSelect);
    while ($ob = $res->GetNext()) {
        $arSection['ELEMENTS'][] = $ob;
    }*/
}

$arSectionFilter = array(
    'IBLOCK_ID' => 14,
    'DEPTH_LEVEL' => 1,
    'ID'=>$arServices
);
$bs = new CIBlockSection();
$sectionObj = $bs->GetList(array(), $arSectionFilter, false, array("IBLOCK_ID","ID","DEPTH_LEVEL","NAME"));

while ($section = $sectionObj->GetNext()) {
    $arResult['SERVICES'][]= array("ID"=>$section['ID'],"NAME"=>$section['NAME']);

}




?>