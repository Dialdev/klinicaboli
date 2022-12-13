<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="services">
<?foreach ($arResult['SECTIONS'] as $arSection):?>
	<a href="<?=$arSection['SECTION_PAGE_URL']?>" class="services-item">
		<img class="services-item__img" src="<?if($arSection['PICTURE']['SRC']!='') {?><?=$arSection['PICTURE']['SRC']?><?}else {?>/local/templates/.default/images/no_photo.png<?}?>" alt="<?=$arSection['NAME']?>" title="<?=$arSection['NAME']?>">
		<span class="services-item__link">
                        <span class="services-item-link__title" ><?=$arSection['NAME']?>
                             <span class="services-item__linkmore">Посмотреть услуги ></span>
                        </span>
        </span>
	</a>
<?endforeach?>
</div>