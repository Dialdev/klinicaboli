<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

?>

<? if (count($arResult['ITEMS']) == 0) :?>
	<p class="info-message">Нет опубликованных отзывов</p>
<?endif;?>

<?foreach ($arResult['ITEMS'] as $arItem):
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_EDIT'));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_DELETE'));
?>
	<?if ($arItem['PROPERTIES']['VIDEO_HREF']['VALUE']!='') {?>
	<?$yt_video = substr(trim($arItem['PROPERTIES']['VIDEO_HREF']['VALUE']),-11);?>
	<a href="https://www.youtube.com/watch?v=<?=$yt_video?>" class="reviews-item _ytb" style="">
	<?
	// $image_src = "//img.youtube.com/vi/".$yt_video."/sddefault.jpg";
    // $tmp_image = $_SERVER['DOCUMENT_ROOT'] . '/upload/'.$yt_video.'_sddefault.jpg';
   
   // CFile::ResizeImageFile(
       // $image_src, 
       // $tmp_image, 
       // array('width'=>163, 'height'=>134), 
       // BX_RESIZE_IMAGE_PROPORTIONAL
    // );
	?>
		<img src="//img.youtube.com/vi/<?=$yt_video?>/maxresdefault.jpg">
		<div class="play"></div>
	</a>
	<?} else {?>
	<a class="reviews-item _mp4">
		<video loop="loop" class="reviews-item__video">
			<source src="<?=CFile::GetPath($arItem['PROPERTIES']['MP4_VIDIO']['VALUE'])?>" type="video/mp4; codecs=&quot;avc1.42E01E, mp4a.40.2&quot;">
		</video>
		<div class="play"></div>
	</a>
	<?}?>


<?endforeach?>
<div class="clb"></div>
<?=$arResult['NAV_STRING']?>
