<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

?>
<ul class="modal-menu">
<?foreach ($arResult['SECTIONS'] as $k=>$arSection):?>
	<li class="modal-menu__item">
		<a href="<?=$arSection['SECTION_PAGE_URL']?>" class="modal-menu__link _faq"><?=$arSection['NAME']?></a>
	</li>
	<?if($k%10 == 0 && $k>0) {?></ul><ul class="modal-menu"><?}?>
<?endforeach?>
</ul>
