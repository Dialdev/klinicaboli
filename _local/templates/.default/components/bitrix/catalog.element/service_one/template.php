<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

			<div class="top-buttons">
                <a href="/articles/" class="top-buttons__item _articles">Посмотреть статьи >></a>
                <a href="#services" class="top-buttons__item _services _modal_link" data-filename="menu-services">Посмотреть все услуги >></a>
            </div>
<?if ($arResult['PREVIEW_TEXT'] !='' || $arResult['DETAIL_TEXT']!='') {?>
<div class="article-detail">
<div class="content-text">
		<div class="content-text__text<?if($arResult['PREVIEW_PICTURE'] == '') {?> _full-width<?}?>">
		
			<?if($arResult['PREVIEW_PICTURE'] != '') { $imgpre = CFile::ResizeImageGet($arResult['PREVIEW_PICTURE'], array("width" => 500, "height" => 500), BX_RESIZE_IMAGE_EXACT);?><img src="<?=$imgpre['src']?>" alt="" class="content-text__right" title=""><?}?>
			<?=$arResult['PREVIEW_TEXT']?>
			<?=$arResult['DETAIL_TEXT']?>
		</div>
</div>
</div>
<?}?>
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

<?if(!empty($arResult['PROPERTIES']['VIDEO_YTB']['VALUE'])) {?>
	<?foreach ($arResult['PROPERTIES']['VIDEO_YTB']['VALUE'] as $video_ytb) { ?>
		<div class="service-video-item">
			<iframe width="100%" height="480" src="https://www.youtube.com/embed/<?=substr(trim($video_ytb), -11);?>" frameborder="0" allowfullscreen></iframe>
		</div>
	<?}?>
<?}?>
</div>



<?
global $doctorFilter; $doctorFilter = Array( 'PROPERTY_PROFESSION_VALUE' => "Врач" );
$APPLICATION->IncludeComponent("bitrix:catalog.section", "doctors-slider", array(
	"IBLOCK_TYPE" => "content",
	"IBLOCK_ID" => 20,
	"PRICE_CODE" => '',
	"SECTION_CODE" => '',
	"FILTER_NAME" => "doctorFilter",
	"PAGE_ELEMENT_COUNT" => 30,
	"PROPERTY_CODE" => array(),
	"ADD_SECTIONS_CHAIN" => "N",
	"USE_PRODUCT_QUANTITY" => "N",
	"SET_STATUS_404" => "N",
	"SHOW_404" => "N",
	"PROPERTY_CODE" => array("SPEC","EDUCATION","DOP_EDUCATION","PROFESSION"),
));?>


<div class="reviews-header">
	<div class="h1 _left">Отзывы пациентов</div>
	<div class="sorting _right"><a class="sorting__link _active" href="">Все</a><a class="sorting__link" href="">Оставленные на сайте</a><a class="sorting__link" href="">Видеоотзывы</a></div>
</div>

<div class="reviews">

	<?
	$GLOBALS['arrFilterR'] = Array( 'PROPERTY_SERVICE_REF' => $arResult['SECTION']['ID']);
	$APPLICATION->IncludeComponent("bitrix:catalog.section", "reviews", array(
		"IBLOCK_TYPE" => "content",
		"IBLOCK_ID" => 24,
		"PRICE_CODE" => '',
		"SECTION_CODE" => '',
		"FILTER_NAME" => "arrFilterR",
		"PAGE_ELEMENT_COUNT" => 30,
		"PROPERTY_CODE" => array(),
		"ADD_SECTIONS_CHAIN" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"PROPERTY_CODE" => array("PROPERTY_SERVICE_REF",""),
	));?>

	<a href="/otzyvy/" class="reviews__show-all link _non_decor">Показать все отзывы</a>

</div>

<div style="display:none;"><?print_r($arResult);?></div>

<?/*<div id="popup-noajax" class="modal-container" style="display:none;">
	<div id="articles" class="modal">
		<div class="modal-window">
			<a class="modal-window__close"></a>
			<h2 class="modal-window__title">Статьи</h2>
			<?if(!empty($arResult['MENU_ARTICLES'])) {?>
				<ul class="modal-menu">
				<?foreach ($arResult['MENU_ARTICLES'] as $k=>$arSection):?>
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
				<p class="_modalp">Нет статей, связанных с услугой <?=$arResult['NAME']?></p>
			<?}?>
		</div>
	</div>
</div>
*/?>