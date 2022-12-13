<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
	<div class="accordeon-item__text _medprep">
<?foreach ($arResult['ITEMS'] as $arItem):
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_EDIT'));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_DELETE'));
?>
	<div class="accordeon-item__cell _bigger"><span><?=$arItem['NAME']?></span></div>
	<div class="accordeon-item__cell _smaller"><span><?=$arItem['PROPERTIES']['PRICE']['VALUE']?> руб.</span></div>
	<div class="divider"></div>
<?endforeach?>
	</div>
<?=$arResult['NAV_STRING']?>