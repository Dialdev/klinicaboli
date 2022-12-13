<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<p class="action__date"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></p>
<?if(is_array($arResult["DETAIL_PICTURE"])):?>
<?$imgdet = CFile::ResizeImageGet($arResult['DETAIL_PICTURE'], array("width" => 707, "height" => 385), BX_RESIZE_IMAGE_EXACT);?>
	<p><img src="<?=$imgdet['src']?>" alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>" title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>" style="float:left;margin-right: 30px;"></p>
<?endif?>
<?=$arResult["DETAIL_TEXT"]?>
<?if ($arResult["DETAIL_TEXT"]=="") {?><?=$arResult["NAME"]?><?}?>