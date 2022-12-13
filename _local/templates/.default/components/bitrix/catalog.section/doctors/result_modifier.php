<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if (!CModule::IncludeModule("highloadblock"))
{
    ShowError(GetMessage("Модуль highloadblock не установлен."));
    return;
}

use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;

$hlblock_id = 1;

$hlblock = HL\HighloadBlockTable::getById($hlblock_id)->fetch();

if (empty($hlblock))
{
    ShowError('404');
    return;
}


$entity = HL\HighloadBlockTable::compileEntity($hlblock);
$entity_data_class = $entity->getDataClass();



foreach($arResult['ITEMS'] as &$arItem){
    $arspec = array();
    foreach ($arItem['PROPERTIES']['SPEC']['VALUE'] as $spec) {
        $arspec[] = $spec;
    }

    $rsData = $entity_data_class::getList(array(
        "select" => array("UF_NAME"),
        "order" => array("ID" => "ASC"),
        "filter" => array('ID' => $arspec)
    ));

    while($arData = $rsData->Fetch())
    {
        $arItem['SPECNAME'][] = mb_strtolower($arData['UF_NAME']);
    }
}
?>