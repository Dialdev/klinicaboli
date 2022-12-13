<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<div class="h1">Врачи</div>
<div class="bottom-doctor-slider">
	<div class="bottom-doctor-slider__items">
<?foreach ($arResult['ITEMS'] as $arItem):
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_EDIT'));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_DELETE'));
?>
	<div class="bottom-doctor-slider-item">
		<?$imgpre = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array("width" => 350, "height" => 375), BX_RESIZE_IMAGE_EXACT);?>
		<img class="bottom-doctor-slider-item__image" src="<?=$imgpre['src']?>">
		<div class="bottom-doctor-slider-item__info">
			<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="bottom-doctor-slider-item__name"><?=$arItem['NAME']?></a>
			<div class="bottom-doctor-slider-item__prof"><?if (is_array($arItem['DISPLAY_PROPERTIES']['SPEC']['DISPLAY_VALUE'])){?><?=implode('. ', $arItem['DISPLAY_PROPERTIES']['SPEC']['DISPLAY_VALUE'])?>
															<?} else {?><?=$arItem['DISPLAY_PROPERTIES']['SPEC']['DISPLAY_VALUE']?><?}?></div>
			<div class="bottom-doctor-slider-item__obr"><?=$arItem['PROPERTIES']['EDUCATION']['~VALUE']['TEXT']?></div>
			<?if ($arItem['PROPERTIES']['DOP_EDUCATION']['~VALUE']['TEXT']!='') {?><div class="bottom-doctor-slider-item__dop-obr"><b>Дополнительное образование:</b><br>
				<?=$arItem['PROPERTIES']['DOP_EDUCATION']['~VALUE']['TEXT']?></div>
			<?}?>
		</div>
	</div>
<?endforeach?>
	</div>

	<div class="bottom-doctor-slider__arrows">
		<a href="javascript:void(0)" class="fa fa-angle-down vertical-slider__arrow bottom-doctor-slider__arrow _prev"></a>
		<a href="javascript:void(0)" class="fa fa-angle-up vertical-slider__arrow bottom-doctor-slider__arrow _next"></a>
	</div>

	<a href="/doctors/" class="link _non_decor">Показать всех врачей >></a>
</div>