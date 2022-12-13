<div class="litsenzii-page">
<?foreach($arResult['ITEMS'] as $arItem):?>

	<div class="litsenzii-page__item">
		<a href="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" class="fancy">
			<img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" class="litsenzii-page__img" alt="" title=""/>
		</a>
	</div>
<?endforeach;?>
</div>