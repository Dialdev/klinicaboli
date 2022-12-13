<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="accordeon _divorce">
		<div class="accordeon-item _services">
			<div class="accordeon-item__title"><h3><? $APPLICATION->ShowTitle(false); ?></h3></div>
			<div class="accordeon-item__text">
				<ul class="accordeon-item-menu">
<?foreach ($arResult as $arItem):?>
	<li class="accordeon-item-menu__item"><a href="<?=$arItem["LINK"]?>" class="accordeon-item-menu__link"><?=$arItem["TEXT"]?></a></li>
<?endforeach;?>
				</ul>
			</div>
		</div>
</div>