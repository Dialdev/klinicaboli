<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<div class="article-detail">
	<div class="content-text">
		<?if($arResult['PREVIEW_PICTURE'] != '') {?><img src="<?=CFile::ResizeImageGet($arResult['PREVIEW_PICTURE'], array("width" => 300, "height" => 300), BX_RESIZE_IMAGE_EXACT)['src']?>" alt="" class="content-text__right" title=""><?}?>
		<?if($arResult['DETAIL_TEXT']!='') {?>
		<div class="content-text__text">
			<p><?=$arResult['DETAIL_TEXT']?></p>
		</div>
		<?}?>
	</div>
</div>
