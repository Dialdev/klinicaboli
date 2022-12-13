<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if(!empty($arResult["CATEGORIES"])):?>
	<table class="title-search-result">
		<?foreach($arResult["CATEGORIES"] as $category_id => $arCategory):?>
			<tr>
				<th class="title-search-separator">&nbsp;</th>
				<td class="title-search-separator">&nbsp;</td>
			</tr>
			<?foreach($arCategory["ITEMS"] as $i => $arItem):?>
			<tr>
				<?if($i == 0):?>
					<th><?=$arCategory["TITLE"]?></th>
				<?else:?>
					<th>&nbsp;</th>
				<?endif?>
				<?if($category_id === "all"):?>
					<td class="title-search-all"><a href="<?=$arItem["URL"]?>"><?=$arItem["NAME"]?></td>
				<?elseif(isset($arItem["MODULE_ID"])):?>
					<td class="title-search-item"><a href="<?=$arItem["URL"]?>"><img src="<?=$this->GetFolder()?>/images/arrow.png"><?=$arItem["NAME"]?></td>
				<?else:?>
					<td class="title-search-more"><a href="<?=$arItem["URL"]?>"><?=$arItem["NAME"]?></td>
				<?endif?>
			</tr>
			<?endforeach?>
		<?endforeach?>
		<tr>
			<th class="title-search-separator">&nbsp;</th>
			<td class="title-search-separator">&nbsp;</td>
		</tr>
	</table>
	<div class="title-search-fader"></div>
<?endif?>