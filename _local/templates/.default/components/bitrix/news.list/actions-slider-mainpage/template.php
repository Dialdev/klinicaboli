<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

?>




<?foreach($arResult["ITEMS"] as $arItem):
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"));

?>

<div class="minislider-actions-item <? if($arItem['DETAIL_PAGE_URL']!='') {?>_for-action<?}?>">
	<a href="<? if($arItem['DETAIL_PAGE_URL']!='') {?><?=$arItem['DETAIL_PAGE_URL']?><?} else {?>/vopros-otvet/<?}?>" class="mainpage-info__text">
		<?if ($arItem['PROPERTIES']['SLIDER_TEXT']['~VALUE']['TEXT']!='') {?><?=$arItem['PROPERTIES']['SLIDER_TEXT']['~VALUE']['TEXT']?> <?}
		else {?><?=$arItem['NAME']?><?}?>
	</a>
	<?if ($arItem["DETAIL_PAGE_URL"]["SRC"]!='') {?><img src="<?if ($arItem["PREVIEW_PICTURE"]["SRC"]!='') {?><?=$arItem["PREVIEW_PICTURE"]["SRC"]?><?}else {echo "/local/templates/.default/images/mainpage-info1.jpg";}?>" alt="" class="mainpage-info__image" title="" align="right"/><?}?>
</div>

<?endforeach?>
