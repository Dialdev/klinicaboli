<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

?>

<? if (count($arResult['ITEMS']) == 0) :?>
	<p class="info-message">Нет опубликованных отзывов</p>
<?endif;?>
<?foreach ($arResult['ITEMS'] as $arItem):
	//$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_EDIT'));
	//$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_DELETE'));
?>
	<?if($arItem['PROPERTIES']['VIDEO_HREF']['VALUE']!='' || $arItem['PROPERTIES']['MP4_VIDIO']['VALUE']!='') {?>
	
		<?if($arItem['PROPERTIES']['VIDEO_HREF']['VALUE']!='') {?>
		<div class="reviews-item _videootzyv">
			<div class="reviews-item__name"><?=$arItem['NAME']?></div>
			<div class="reviews-item__text"></div>
			<div class="reviews-item__date"><?=date("d.m.Y",strtotime($arItem['ACTIVE_FROM']));?></div>
			<?$yt_video = substr(trim($arItem['PROPERTIES']['VIDEO_HREF']['VALUE']),-11);?>
			<a href="<?=$yt_video?>" class="reviews-item__vidos">
				<??>
				<img src="//img.youtube.com/vi/<?=$yt_video?>/maxresdefault.jpg" alt="" title="">
				<div class="play"></div>
			</a>
		</div>
		<?} else {?>
			<a class="reviews-item _mp4">
				<div class="reviews-item__date"><?=date("d.m.Y",strtotime($arItem['ACTIVE_FROM']))?></div>
				<video loop="loop" class="reviews-item__video">
					<source src="<?=CFile::GetPath($arItem['PROPERTIES']['MP4_VIDIO']['VALUE'])?>" type="video/mp4; codecs=&quot;avc1.42E01E, mp4a.40.2&quot;">
				</video>
				<div class="play"></div>
			</a>
		<?}?>
<?} else {?>

	<div class="reviews-item">
		<div class="reviews-item__name"><?=$arItem['NAME']?></div>
		<div class="reviews-item__text"><?=$arItem['PREVIEW_TEXT']?></div>
		<div class="reviews-item__date"><?=date("d.m.Y",strtotime($arItem['ACTIVE_FROM']));?></div>
		<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="reviews-item__more">Полностью отзыв</a>
	</div>
	<?}?>


<?endforeach?>
<div class="clb"></div>
<?=$arResult['NAV_STRING']?>

<?if ( strpos($APPLICATION->GetCurPage(),'/otzyvy/') === false && count($arResult['ITEMS']) > 0) {?><a href="/otzyvy/" class="reviews__show-all link _non_decor">Показать все отзывы</a><?}?>