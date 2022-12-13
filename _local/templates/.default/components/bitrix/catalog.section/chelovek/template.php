<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<?//print_r($arResult['ITEMS']);?>
<div class="two-columns two-columns_script-container">
	<div class="two-columns__cell">

		<div class="two-columns_script-container__chel">
			<?foreach ($arResult['ITEMS'] as $k=>$arItem) {
			?>
				<div class="script-container__point" style="top:<?=$arItem['PROPERTIES']['COORDINATES1']['VALUE']?>px; margin-left: <?=$arItem['PROPERTIES']['COORDINATES2']['VALUE']?>px;" data-text="<?=$arItem['ID']?>" data-system="<?=strtolower($arItem['PROPERTIES']['SYSTEM']['VALUE_XML_ID']);?>"></div>
			<?}?>
		</div>
		<?foreach ($arResult['ITEMS'] as $k=>$arItem) {?>
			<div class="two-columns_script-container__pain" data-result="<?=$arItem['ID']?>"><?=$arItem['NAME']?></div>
		<?}?>


	</div>
	<div class="two-columns__cell">
			<div class="script-container-result two-columns_script-container__result _active" data-result="<?=$arItem['ID']?>">
				<div class="script-container-result__title">Нажмите на место Вашей боли</div>
				<a href="#zapisat" class="btn _rounded _modal_link" data-filename="zapis-modal-form">Записаться к врачу</a>
			</div>
			<?foreach ($arResult['ITEMS'] as $k=>$arItem) {?>
			<div class="script-container-result two-columns_script-container__result" data-result="<?=$arItem['ID']?>">
			<div class="script-container-result__title">Возможные причины боли:</div>
			<ul class="script-container-result__list"  data-list="<?=$arItem['ID']?>">
				<?if (is_array($arItem['DISPLAY_PROPERTIES']['ARTICLES']['DISPLAY_VALUE'])) { ?>
					<? foreach ($arItem['DISPLAY_PROPERTIES']['ARTICLES']['DISPLAY_VALUE'] as $articles) { ?>
						<li class="fa fa-circle-thin script-container-result__item"><?= $articles ?></li>
					<?
					}
				} else if ($arItem['DISPLAY_PROPERTIES']['ARTICLES']['DISPLAY_VALUE']!=''){?><li class="fa fa-circle-thin script-container-result__item"><?= $arItem['DISPLAY_PROPERTIES']['ARTICLES']['DISPLAY_VALUE'] ?></li><?}?>
			</ul>
			<div class="script-container-result__title">Ваш доктор:</div><?//print_r($arItem['DISPLAY_PROPERTIES']['CHEL_SPEC']);?>
			<ul class="script-container-result__list _doxtur">
				<?if (is_array($arItem['DISPLAY_PROPERTIES']['CHEL_SPEC']['DISPLAY_VALUE'])) { ?>
					<? foreach ($arItem['DISPLAY_PROPERTIES']['CHEL_SPEC']['DISPLAY_VALUE'] as $k => $spec) { ?>
						<li class="script-container-result__item"><a class="script-container-result__link"
																	 href="/doctors/?specialization=<?= $arItem['DISPLAY_PROPERTIES']['CHEL_SPEC']['VALUE'][$k] ?>"><?= $spec ?></a>
						</li>
					<?
					}
				} else {?><li class="script-container-result__item"><a class="script-container-result__link"  href="/doctors/?specialization=<?= $arItem['DISPLAY_PROPERTIES']['CHEL_SPEC']['VALUE'][0] ?>"><?= $arItem['DISPLAY_PROPERTIES']['CHEL_SPEC']['DISPLAY_VALUE']?></a></li><?}?>
			</ul>
			<a href="#zapisat" class="btn _rounded _modal_link" data-filename="zapis-modal-form">Записаться к врачу</a>
			</div>
			<?}?>

	</div>
</div>