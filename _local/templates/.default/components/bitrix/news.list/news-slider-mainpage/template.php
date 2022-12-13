<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

	<div class="news-slider">
		<div class="title">
			<a href="/novosti/" class="title__h2">Новости</a>
		</div>
		<div class="slider__arrows">
			<div class="fa fa-angle-right slider__arrow news-slider__arrow _next"></div>
			<div class="fa fa-angle-left slider__arrow news-slider__arrow _prev"></div>
		</div>
		<div class="two-columns two-columns_news-slider">
<?foreach($arResult["ITEMS"] as $arItem):
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"));
?>
	<?
	$day = FormatDate("j", MakeTimeStamp($arItem["DISPLAY_ACTIVE_FROM"]));
	$mounth = FormatDate("F", MakeTimeStamp($arItem['DISPLAY_ACTIVE_FROM']));
	?>
	<div class="two-columns__cell _news-slider-item">
		<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="news-slider-item__imgcontainer">
		<?$thumbN = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array("width" => 288, "height" => 285), BX_RESIZE_IMAGE_EXACT);?>
			<img class="news-slider-item__img" src="<?=$thumbN["src"]?>" alt="<?=$thumbN["src"]?>" title="<?=$arItem["NAME"]?>">
		</a>
		<div class="news-slider-item__text">
			<h3><?=$arItem["NAME"]?></h3>
			<?=$arItem["PREVIEW_TEXT"]?>
		</div>
		<a class="news-slider-item__link" href="<?=$arItem["DETAIL_PAGE_URL"]?>">Читать подробнее</a>
		<div class="news-slider-item__date">
			<span class="news-slider-item__day"><?=$day?></span><?=strtolower($mounth);?>
		</div>
	</div>

<?endforeach?>

		</div>
	</div>



<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif?>