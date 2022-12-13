<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(false);?>
<div id="popup-noajax" class="modal-container" <? if (empty($arResult["ERRORS"]) && strlen($arResult["MESSAGE"]) == 0) echo 'style="display:none;"';?>>
	<div id="vopros" class="modal">
		<div class="modal-window">
			<a class="modal-window__close"></a>
			<h2 class="modal-window__title">Задать вопрос</h2>
			<?

			if (!empty($arResult["ERRORS"])):?>
				<?ShowError(implode("<br />", $arResult["ERRORS"]))?>
			<?endif;
			if (strlen($arResult["MESSAGE"]) > 0):?>
				<p class="success-message">Ваш вопрос успешно добавлен</p>
				<script>
					history.pushState(null, "", location.href.split("?")[0]);
				</script>
			<?endif?>
			<form name="iblock_add" action="" method="post" enctype="multipart/form-data">
				<?=bitrix_sessid_post()?>
				<div class="modal-wrap">
				<div class="modal-window__wd50">
					<input type="text" class="input _modal" name="PROPERTY[NAME][0]" value="<?=$arResult["ELEMENT_PROPERTIES"]['NAME'][0]["VALUE"];?>" placeholder="Имя*" >
				</div>
				<div class="modal-window__wd50 _no_margin">
					<input type="text" name="PROPERTY[IBLOCK_SECTION][0]" value="<?=$arResult["ELEMENT_PROPERTIES"]['IBLOCK_SECTION'][0]["VALUE"];?>" style="display:none;">
					<div class="alaselect _services" data-input="PROPERTY[IBLOCK_SECTION][0]">
						<div class="alaselect__choosed">Направление</div>
						<div class="alaselect__options">
							<?	//$array_missed_selects = array("96", "99", "101", "102", "103", "104", "106", "105", "107", "114", "116", "119", "121");	
							$arSectionFilter = array(
								'IBLOCK_ID' => 23,
								'DEPTH_LEVEL' => 1,
								'ACTIVE'=>'Y'
								//'!ID' =>  $array_missed_selects,
							);
							$bs = new CIBlockSection();
							$sectionObj = $bs->GetList(array("SORT"=>"ASC","NAME"=>"ASC"), $arSectionFilter, false, array("IBLOCK_ID","ID","DEPTH_LEVEL","NAME"));


							while ($section = $sectionObj->GetNext()) {
								?>
									<div class="alaselect__option" data-id="<?=$section['NAME']?>"><?=$section['NAME']?></div>
								<?
							} ?>
						</div>
					</div>
				</div>

				<div class="modal-window__wd100">
					<textarea class="input _modal _textarea" name="PROPERTY[PREVIEW_TEXT][0]" placeholder="Вопрос*"><?=$arResult["ELEMENT_PROPERTIES"]['PREVIEW_TEXT'][0]["VALUE"];?></textarea>
				</div>
					<label for="agree" class="agree"><input type="checkbox" id="agree" checked value="" required>Согласен с правилами обработки персональных данных установленными в <a href="/upload/polit-klinika.docx" target="_blank">политике конфидециальности</a></label>
				<input type="submit" name="iblock_submit" value="Сохранить" class="submit">

				</div>
			</form>

		</div>
	</div>
</div>
<script>$('.antibot_q').each(function(){ $(this).html('<input type="text" style="display:none;" name="PROPERTY['+$(this).data('id')+'][0]" value="1">'); });</script>