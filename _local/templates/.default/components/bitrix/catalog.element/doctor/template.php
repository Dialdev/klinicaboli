<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<?//print_r($arResult['DISPLAY_PROPERTIES']);?>
<?//print_r($arResult['PROPERTIES']['VIDEO']);?>

<div class="doctor-detail">
	<div class="doctor-detail-column _left">

		<div class="doctor-detail__post"><?if (is_array($arResult['DISPLAY_PROPERTIES']['SPEC']['DISPLAY_VALUE'])){?>			<?=strtolower(implode(', ', $arResult['DISPLAY_PROPERTIES']['SPEC']['DISPLAY_VALUE']))?>
															<?} else {?><?=$arResult['DISPLAY_PROPERTIES']['SPEC']['DISPLAY_VALUE']?><?}?></div>
		<div class="doctor-detail__text">
			<div class="doctor-detail__announce"><?=$arResult['~PREVIEW_TEXT']?></div>
		</div>
		<div class="doctor-detail__more link _non_decor">Читать подробнее</div>

		<div class="doctor-info">
			<div class="doctor-info__header">
				<button class="doctor-info__button _active" data-tab="1">Образование</button>
				<button class="doctor-info__button" data-tab="2">Дополнительное<br>образование</button>
				<button class="doctor-info__button" data-tab="3">Сертификаты</button>
			</div>
			<div class="doctor-info__body">
				<div class="doctor-info__content _active" data-tab="1">
					<p><?=$arResult['PROPERTIES']['EDUCATION']['~VALUE']['TEXT']?></p>
				</div>
				<div class="doctor-info__content" data-tab="2">
					<p><?=$arResult['PROPERTIES']['DOP_EDUCATION']['~VALUE']['TEXT']?></p>
				</div>
				<div class="doctor-info__content " data-tab="3">
					<div class="sertificates">
					<? foreach($arResult['PROPERTIES']['SERTIFICATES']['VALUE'] as $sert) {?>
					<?$sertbig = CFile::ResizeImageGet($sert, array("width" => 1200, "height" => 1200), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);?>
					<?$sertmin = CFile::ResizeImageGet($sert, array("width" => 250, "height" => 250), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);?>
					<a class="sertificates__item fancy" href="<?=$sertbig['src']?>" rel="gallery">
						<img class="sertificates__img" src="<?=$sertmin['src']?>" alt="" title="">
						<span class="photogallery-page__zoom"></span>
					</a>
					<?}?>
						</div>

				</div>
			</div>
		</div>

		<?if($arResult['PROPERTIES']['VIDEO']['VALUE']!=='') {?>
		<a href="<?=$arResult['PROPERTIES']['VIDEO']['VALUE']?>" class="doctor-video">
			<?$prew = CFile::ResizeImageGet($arResult['PREVIEW_PICTURE'], array("width" => 620, "height" => 413), BX_RESIZE_IMAGE_EXACT);?>
			<img src="<?=$prew['src']?>" alt="" title="">

			<div class="play"></div>
		</a>
		<?}?>

		<div class="doctor-detail-reviews">

			<div class="h1">Отзывы пациентов</div>

			<div class="reviews _doctor-reviews">

				<?
				$GLOBALS['arrFilterR'] = Array( 'PROPERTY_DOCTOR_REF' => $arResult['ID']);
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
					"PROPERTY_CODE" => array("DOCTOR_REF",""),
				));?>

			</div>


			

		</div>

	</div>
	<div class="doctor-detail-column _right">
		<?$docphoto = CFile::ResizeImageGet($arResult['PREVIEW_PICTURE'], array("width" => 580, "height" => 386), BX_RESIZE_IMAGE_EXACT);?>
		<div class="doctor-detail__img" style="background-image: url('<?=$docphoto['src']?>');"></div>
		<div class="doctor-work">
			<?if (!empty($arResult['DISPLAY_PROPERTIES']['SERVICES']['DISPLAY_VALUE'])) {?>
			<div class="doctor-work__title">Основные направления деятельности:</div>
			<ul class="doctor-work__list">
				<?foreach($arResult['DISPLAY_PROPERTIES']['SERVICES']['DISPLAY_VALUE'] as $napr) {?>
					<li><?=$napr?></li>
				<?}?>
			</ul>
			<?}?>
			<? if (!in_array('Медицинский персонал',$arResult['PROPERTIES']['PROFESSION']['VALUE']) && $arResult['ID']!=547 && $arResult['ID']!=548 && $arResult['ID']!=549 && $arResult['ID']!=545 && $arResult['ID']!=546) {?>
			<a href="#zapisat" class="doctor-work__btn btn _rounded _modal_link" data-filename="zapis-modal-form" data-param="<?=$arResult['ID']?>">Записаться к врачу</a>
			<?}?>
		</div>
	</div>
</div>

