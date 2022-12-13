<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="news-list">
<?foreach($arResult["ITEMS"] as $k=>$arItem):
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"));
?>
<div class="news-item <?if (($k+1)%2==0) {?>_right<?}else{?>_left<?}?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
	<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="news-item__imgcontainer"><span class="news-item__date"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></span><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>" title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>" class="news-item__image"></a>
		<div class="news-item__text">
	<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="news-item__title"><?=$arItem["NAME"]?></a>
	<p><?=$arItem["PREVIEW_TEXT"]?></p>
	<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" >Подробнее</a>
		</div>
</div>
<?endforeach?>
	<div class="clb"></div>
</div>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif?>