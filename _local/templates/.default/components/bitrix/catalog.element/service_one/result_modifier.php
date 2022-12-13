<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

/*

$arResult['MENU_ARTICLES'] = array();
$arFilter = Array('IBLOCK_ID'=>19, 'GLOBAL_ACTIVE'=>'Y');
$db_list = CIBlockSection::GetList(Array(), $arFilter, false, Array("ID","IBLOCK_ID","NAME","SECTION_PAGE_URL","UF_SERVICESFORACTION"));

while($article = $db_list->GetNext()) {
    if (!empty($article['UF_SERVICESFORACTION'])) $arResult['MENU_ARTICLES'][] = $article;
	
}


foreach ($arResult['MENU_ARTICLES'] as &$arSection) {
    $arSection['ELEMENTS'] = array();
    $arSelect = Array("ID","IBLOCK_ID", "SECTION_ID","ACTIVE", "NAME","DETAIL_PAGE_URL");
    $arFilter = Array("IBLOCK_ID" => IntVal($arSection["IBLOCK_ID"]), "SECTION_ID" => $arSection['ID'],"ACTIVE_DATE" => "Y", "ACTIVE" => "Y");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 50), $arSelect);
    while ($ob = $res->GetNext()) {
        $arSection['ELEMENTS'][] = $ob;
    }
}

*/?>