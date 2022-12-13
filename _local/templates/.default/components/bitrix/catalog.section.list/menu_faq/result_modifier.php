<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
//echo '<pre>';
//print_r($arResult);
//echo '</pre>';

foreach ($arResult['SECTIONS'] as &$arSection) {
    $arSection['ELEMENTS'] = array();
    $arSelect = Array("ID","IBLOCK_ID", "SECTION_ID","ACTIVE", "NAME","DETAIL_PAGE_URL");
    $arFilter = Array("IBLOCK_ID" => IntVal($arSection["IBLOCK_ID"]), "SECTION_ID" => $arSection['ID'],"ACTIVE_DATE" => "Y", "ACTIVE" => "Y");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 50), $arSelect);
    while ($ob = $res->GetNext()) {
        $arSection['ELEMENTS'][] = $ob;
    }
}

/*$array_missed_selects = array("98", "99", "101", "102", "103", "104", "106", "105", "107", "114", "116", "119", "121");	
$arSectionFilter = array(
	'IBLOCK_ID' => 14,
	'DEPTH_LEVEL' => 1,
	'!ID' =>  $array_missed_selects,
);

$sectionObj = CIBlockSection::GetList(array("SORT"=>"ASC","NAME"=>"ASC"), $arSectionFilter, false, array("IBLOCK_ID","ID","DEPTH_LEVEL","NAME"));

while ($section = $sectionObj->GetNext()) {
	$arResult['SECTIONS'][] = $section;
}*/



?>