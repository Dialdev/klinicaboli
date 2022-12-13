<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<div class="two-columns__cell photogallery-slider">
	<div class="title">
		<a href="/o-klinike/fotogalereya/" class="title__h2">Фотогалерея клиники</a>
	</div>
	<div class="slider__arrows">
		<div class="fa fa-angle-right slider__arrow photogallery-slider__arrow _next"></div>
		<div class="fa fa-angle-left slider__arrow photogallery-slider__arrow _prev"></div>
	</div>
	<div class="photogallery-slider__items">
<?foreach($arResult["ITEMS"] as $arItem):
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"));
?>
<?$thumbF = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array("width" => 805, "height" => 400), BX_RESIZE_IMAGE_PROPORTIONAL, false, 65 );?>
	<div class="photogallery-slider__item">
		<img class="photogallery-slider__img" src="<?=$thumbF["src"]?>" alt="" title="">
	</div>
<?endforeach?>
	</div>
</div>