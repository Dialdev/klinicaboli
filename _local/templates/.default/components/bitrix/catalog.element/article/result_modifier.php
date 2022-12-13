<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

//print_r($arResult['SECTION']['ID']);

$arFilter = Array('IBLOCK_ID'=>$arResult['IBLOCK_ID'],'ID'=>$arResult['SECTION']['ID'], 'GLOBAL_ACTIVE'=>'Y');
$db_list = CIBlockSection::GetList(Array(), $arFilter, false, Array("UF_SERVICESFORACTION"));
if($uf_value = $db_list->GetNext()) {
    //$arResult['LINKED_SERVICES'] = implode(',',$uf_value['UF_SERVICESFORACTION']);
    $arResult['LINKED_SERVICES'] = $uf_value['UF_SERVICESFORACTION'];
}

$arResult['MENU_SERVICES'] = array();
$arFilter = Array('IBLOCK_ID'=>14,'ID'=> $arResult['LINKED_SERVICES'], 'GLOBAL_ACTIVE'=>'Y');
$db_list = CIBlockSection::GetList(Array(), $arFilter, false, Array("UF_SERVICESFORACTION"));
while($service = $db_list->GetNext()) {
    $arResult['MENU_SERVICES'][] = $service;
}

foreach ($arResult['MENU_SERVICES'] as &$arSection) {
    $arSection['ELEMENTS'] = array();
    $arSelect = Array("ID","IBLOCK_ID", "SECTION_ID","ACTIVE", "NAME","DETAIL_PAGE_URL");
    $arFilter = Array("IBLOCK_ID" => IntVal($arSection["IBLOCK_ID"]), "SECTION_ID" => $arSection['ID'],"ACTIVE_DATE" => "Y", "ACTIVE" => "Y");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 50), $arSelect);
    while ($ob = $res->GetNext()) {
        $arSection['ELEMENTS'][] = $ob;
    }
}

?>