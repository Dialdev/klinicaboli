<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<ul class="menu-bottom">
    <li class="menu-bottom__item"><a href="/" class="menu-bottom__link<?if ($APPLICATION->GetCurPage(false) === '/'):?> _active<?endif?>">Главная</a></li>
<?
foreach ($arResult as $arItem):
?>
<li class="menu-bottom__item"><a href="<?=$arItem["LINK"]?>" class="menu-bottom__link<?if ($arItem["SELECTED"]):?> _active<?endif?>"><?=$arItem["TEXT"]?></a></li>
<?
endforeach;
?>
</ul>