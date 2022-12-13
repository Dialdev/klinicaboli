<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<?foreach ($arResult['ITEMS'] as $arItem):
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_EDIT'));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_DELETE'));
?>
	<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="services-item">
		<img class="services-item__img" src="<?if($arItem['PREVIEW_PICTURE']['SRC']!='') {?><?=$arItem['PREVIEW_PICTURE']['SRC']?><?}else {?>/local/templates/.default/images/no_photo.png<?}?>" alt="<?=$arItem['NAME']?>" title="<?=$arItem['NAME']?>">
		<span class="services-item__link">
                        <span class="services-item-link__title" ><?=$arItem['NAME']?></span>
        </span>
	</a>
<?endforeach?>
<?=$arResult['NAV_STRING']?>