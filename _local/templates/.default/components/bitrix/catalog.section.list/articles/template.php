<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<div class="accordeon _divorce">
<?foreach ($arResult['SECTIONS'] as $arSection):?>
    <?if ( !empty($arSection['ELEMENTS'])) {?>
    <div class="accordeon-item">
        <div class="accordeon-item__title"><h3><?=$arSection['NAME']?></h3></div>
        <div class="accordeon-item__arrow"></div>
        <div class="accordeon-item__text">
            <ul class="accordeon-item-menu">
                <?foreach ($arSection['ELEMENTS'] as $arItem) {?>
                <li class="accordeon-item-menu__item"><a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="accordeon-item-menu__link"><?=$arItem['NAME']?></a></li>
                <?}?>
            </ul>
        </div>
    </div>
    <?}?>
<?endforeach?>
</div>