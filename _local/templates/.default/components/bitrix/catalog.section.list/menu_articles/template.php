<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<ul class="modal-menu">
<?foreach ($arResult['SECTIONS'] as $k=>$arSection):?>


	<li class="modal-menu__item _parent"><a href="" class="modal-menu__link"><?=$arSection['NAME']?></a>
		<?if (!empty($arSection['ELEMENTS'])) {?>
            <ul class="modal-menu _submenu">
                <?foreach ($arSection['ELEMENTS'] as $arItem) {?>
				<li class="modal-menu__item"><a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="modal-menu__link _child"><?=$arItem['NAME']?></a></li>
                <?}?>
            </ul>
		<?}?>
	</li>
	<?if($k%11 == 0 && $k>0) {?></ul><ul class="modal-menu"><?}?>
<?endforeach?>
</ul>
