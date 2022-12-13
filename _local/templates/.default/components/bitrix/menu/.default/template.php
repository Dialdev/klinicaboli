<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<nav>
<ul class="main-menu">
	<li class="main-menu__item">
		<a href="/" class="main-menu__link">Главная</a>
	</li>
<?
$previousLevel = 0;
foreach ($arResult as $arItem):
	if ($previousLevel > $arItem["DEPTH_LEVEL"])
		echo str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));
	$previousLevel = $arItem["DEPTH_LEVEL"];
?>
	<?if ($arItem["DEPTH_LEVEL"] == 1):?>
		<?if ($arItem["IS_PARENT"]):?>
			<li class="main-menu__item<?if ($arItem["SELECTED"]):?> _active<?endif?> <?if(strpos($arItem["LINK"],'/uslugi/') !== false){?>_uslugi<?}?>"><a href="<?=$arItem["LINK"]?>" class="main-menu__link"><?=$arItem["TEXT"]?></a>
				<ul class="main-menu__submenu">
		<?else:?>
			<li class="main-menu__item<?if ($arItem["SELECTED"]):?> _active<?endif?>"><a href="<?=$arItem["LINK"]?>" class="main-menu__link"><?=$arItem["TEXT"]?></a></li>
		<?endif?>
	<?else:?>
		<li class="main-menu__item main-menu__item_submenu<?if ($arItem["SELECTED"]):?> _active<?endif?>"><a href="<?=$arItem["LINK"]?>" class="main-menu__link main-menu__link_submenu"><?=$arItem["TEXT"]?></a></li>
	<?endif?>
<?
endforeach;
if ($previousLevel > 1)
	echo str_repeat("</ul></li>", ($previousLevel - 1));
?>
					<a href="/blagotvoritelnost/" class="btn _charity">Благотворительность</a>
</ul>
</nav>