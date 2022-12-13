<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="top-buttons">
<?
foreach ($arResult as $arItem):
?>
    <a href="<?=$arItem["LINK"]?>" class="top-buttons__item <?if ($arItem["SELECTED"]):?> _active<?endif?>"><?=$arItem["TEXT"]?></a>
<?
endforeach;
?>
</div>