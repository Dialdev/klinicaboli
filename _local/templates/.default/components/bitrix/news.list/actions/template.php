<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

//echo '<pre>';
//print_r($arResult["ITEMS"]);
//echo '</pre>';

?><div class="action-page">
		<div class="two-columns _transparent _action-page">
<?foreach($arResult["ITEMS"] as $arItem):

?>
	<?if ($arItem["DETAIL_PICTURE"]!='') {?>

			<div class="two-columns__cell">
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="action-item"><img src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>" alt="" class="blago-page__img" title=""/></a>
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="action-text">
					<div class="_sale ">
						<?=$arItem['PROPERTIES']['SLIDER_TEXT']['~VALUE']['TEXT']?>
					</div>
				</a>
			</div>
	<?}?>
<?endforeach?>
		</div>
	</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif?>