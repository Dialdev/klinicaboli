<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<div class="accordeon">
<?foreach ($arResult['SECTIONS'] as $arSection):?>
    <?if ( !empty($arSection['ELEMENTS'])) {?>
    <div class="accordeon-item">
        <div class="accordeon-item__title"><h3><?=$arSection['NAME']?></h3></div>
        <div class="accordeon-item__arrow"></div>
        <div class="accordeon-item__text">
            <?foreach ($arSection['ELEMENTS'] as $arItem) {?>
                <div class="accordeon-item__cell _bigger"><span><?=$arItem['NAME']?></span></div>
                <div class="accordeon-item__cell _smaller"><span><?=$arItem['PROPERTY_PRICE_VALUE']?> руб.</span></div>
                <div class="divider"></div>
            <?}?>
        </div>
    </div>
    <?}?>
<?endforeach?>
</div>