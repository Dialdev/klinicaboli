<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

			<div class="top-buttons">
                <a href="#articles" class="top-buttons__item _articles _modal_link" data-filename="menu-articles">Посмотреть все статьи >></a>
                <a href="#services" class="top-buttons__item _services _services-for-articles" >Посмотреть услуги >></a>
            </div>

<?//print_r($arResult);?>

<div class="article-detail">
	<div class="content-text">
		

		<div class="content-text__text<?if($arResult['PREVIEW_PICTURE'] == '') {?> _full-width<?}?>">
			<?if($arResult['PREVIEW_PICTURE'] != '') {$imgpre = CFile::ResizeImageGet($arResult['PREVIEW_PICTURE'], array("width" => 500, "height" => 500), BX_RESIZE_IMAGE_EXACT);?><img src="<?=$imgpre['src']?>" alt="" class="content-text__right" title=""><?}?>
			<?=$arResult['PREVIEW_TEXT']?>
			<?=$arResult['DETAIL_TEXT']?>
		</div>

	</div>
	<div class="content-text _detail-text"></div>
</div>
<div class="service-videos">
<?
	foreach ($arResult['PROPERTIES']['VIDIO_FILE']['VALUE'] as $vidio_id):
		$vidio_file = CFile::GetFileArray($vidio_id);
?>
		<div class="service-video-item">
			<a href="#service-video-item__video_<?=$vidio_id?>" class="service-video-item__link">
				<video><source src="<?=$vidio_file['SRC']?>" type="video/mp4; codecs=&quot;avc1.42E01E, mp4a.40.2&quot;"></video>
				<div class="play"></div>
			</a>
			<div class="service-video-item__video" id="service-video-item__video_<?=$vidio_id?>"><video><source src="<?=$vidio_file['SRC']?>" type="video/mp4; codecs=&quot;avc1.42E01E, mp4a.40.2&quot;"></video></div>
		</div>
<?endforeach;?>
</div>


<div id="popup-noajax" class="modal-container" style="display:none;">
	<div id="serives" class="modal">
		<div class="modal-window">
			<a class="modal-window__close"></a>
			<h2 class="modal-window__title">Услуги</h2>
			<?if(!empty($arResult['MENU_SERVICES'])) {?>
			<ul class="modal-menu">
				<?foreach ($arResult['MENU_SERVICES'] as $k=>$arSection):?>
				<?if($k%10 == 0) {?></ul><ul class="modal-menu"><?}?>
				<li class="modal-menu__item _parent"><a href="" class="modal-menu__link"><?=$arSection['NAME']?></a>
					<?if (!empty($arSection['ELEMENTS'])) {?>
						<ul class="modal-menu _submenu">
							<?foreach ($arSection['ELEMENTS'] as $arItem) {?>
								<li class="modal-menu__item"><a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="modal-menu__link _child"><?=$arItem['NAME']?></a></li>
							<?}?>
						</ul>
					<?}?>
				</li>
				<?endforeach?>
			</ul>
			<?} else {?>
				<p class="_modalp">Нет услуг, связанных со статьей <?=$arResult['NAME']?></p>
			<?}?>
		</div>
	</div>
</div>