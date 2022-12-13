<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<div class="photogallery-page">

<?foreach($arResult["ITEMS"] as $arItem):
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"));
?>
	<?$thumb = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array("width" => 350, "height" => 350), BX_RESIZE_IMAGE_EXACT);?>
	<a class="photogallery-page__item fancy" href="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" rel="gallery">
		<img class="photogallery-page__img" src="<?=$thumb['src']?>" alt="" title="">
		<span class="photogallery-page__title"><?=$arItem["NAME"]?></span>
		<span class="photogallery-page__zoom"></span>
	</a>
<?endforeach?>

</div>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif?>