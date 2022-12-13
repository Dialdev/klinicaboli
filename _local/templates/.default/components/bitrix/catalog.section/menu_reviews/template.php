<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
//print_r($arResult);
?>
<ul class="modal-menu">
	<?foreach ($arResult['SERVICES'] as $k=>$arSection):?>
	<li class="modal-menu__item">
		<a href="/otzyvy/?serv=<?=$arSection['ID']?>" class="modal-menu__link _faq"><?=$arSection['NAME']?></a>
	</li>
	<?if($k%10 == 0 && $k>0) {?></ul><ul class="modal-menu"><?}?>
	<?endforeach?>
</ul>
