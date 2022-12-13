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
$this->setFrameMode(false);
?>
<div id="popup-noajax" class="modal-container" <? if (empty($arResult["ERRORS"]) && strlen($arResult["MESSAGE"]) == 0) echo 'style="display:none;"';?>>
<div id="review" class="modal">
	<div class="modal-window">
		<a class="modal-window__close" onclick="Popup.CloseWindow();"></a>
		<h2 class="modal-window__title">Оставить отзыв</h2>
<?
if (!empty($arResult["ERRORS"])):?>
	<?ShowError(implode("<br />", $arResult["ERRORS"]))?>
<?endif;
if (strlen($arResult["MESSAGE"]) > 0):?>
	<p class="success-message">Ваш отзыв успешно добавлен</p>
	<script>
		history.pushState(null, "", location.href.split("?")[0]);
	</script>
<?endif?>
<form name="iblock_add" action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data">
	<?=bitrix_sessid_post()?>
	<?if ($arParams["MAX_FILE_SIZE"] > 0):?><input type="hidden" name="MAX_FILE_SIZE" value="<?=$arParams["MAX_FILE_SIZE"]?>" /><?endif?>
	<div class="modal-window__wd50">
		<input type="text" class="input _modal _name" name="PROPERTY[NAME][0]" value="<?=$arResult["ELEMENT_PROPERTIES"]['NAME'][0]["VALUE"];?>" placeholder="Имя*" required >
		<input type="text" class="input _modal _phone" name="PROPERTY[109][0]" value="<?=$arResult["ELEMENT_PROPERTIES"]['109'][0]["VALUE"];?>" placeholder="Контактный телефон" >
	</div>
	<div class="modal-window__wd50 _no_margin">
		<input type="text" name="PROPERTY[108][0]" value="<?=$arResult["ELEMENT_PROPERTIES"]['108'][0]["VALUE"];?>" style="display:none;">
		<div class="alaselect _services" data-input="PROPERTY[108][0]">
				<div class="alaselect__choosed">Направление</div>
				<div class="alaselect__options">
					<?		$arSectionFilter = array(
						'IBLOCK_ID' => 14,
						'DEPTH_LEVEL' => 1,
					);
					$bs = new CIBlockSection();
					$sectionObj = $bs->GetList(array("SORT"=>"ASC","NAME"=>"ASC"), $arSectionFilter, false, array("IBLOCK_ID","ID","DEPTH_LEVEL","NAME"));

					while ($section = $sectionObj->GetNext()) {?>
						<div class="alaselect__option" data-id="<?=$section['ID']?>"><?=$section['NAME']?></div>
					<?} ?>
				</div>
		</div>
		<input type="text" name="PROPERTY[107][0]" value="<?=$arResult["ELEMENT_PROPERTIES"]['107'][0]["VALUE"];?>" style="display:none;">
		<div class="alaselect _doctors" data-input="PROPERTY[107][0]">
			<div class="alaselect__choosed">Врач</div>
			<div class="alaselect__options">

				<?$arSelect = Array("ID", "IBLOCK_ID","NAME","PROPERTY_PROFESSION");
				$arFilter = Array("IBLOCK_ID"=>20, "ACTIVE"=>"Y","PROPERTY_PROFESSION_VALUE"=>"Врач");
				$res = CIBlockElement::GetList(Array("NAME"=>"ASC"), $arFilter, false, Array("nPageSize"=>50), $arSelect);
				while($ob = $res->GetNextElement()) {?>
						<div class="alaselect__option" data-id="<?= $ob->fields['ID'] ?>"><?= $ob->fields['NAME'] ?></div>
						<?

				}
				?>
			</div>
		</div>
	</div>
	<div class="modal-window__wd100">
		<input type="text" class="input _modal" name="PROPERTY[106][0]" value="<?=$arResult["ELEMENT_PROPERTIES"][106][0]["VALUE"];?>" placeholder="Ссылка на видео" >
		<textarea required class="input _modal _textarea" name="PROPERTY[PREVIEW_TEXT][0]" placeholder="Ваш отзыв*"><?=$arResult["ELEMENT_PROPERTIES"]['PREVIEW_TEXT'][0]["VALUE"];?></textarea>
	</div>
	<label for="agree" class="agree"><input type="checkbox" id="agree" checked value="" required>Согласен с правилами обработки персональных данных установленными в <a href="/upload/polit-klinika.docx" target="_blank">политике конфидециальности</a></label>
	<input type="submit" class="submit" name="iblock_submit"  value="Отправить" />
</form>

	</div>
</div>

</div>
