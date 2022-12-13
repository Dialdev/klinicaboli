<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif?>
<?if (($_GET["WEB_FORM_ID"] == $arResult["arForm"]["ID"]) && ($_GET["formresult"] == "addok")) {ShowNote("Ваша заявка отправлена."); echo "<script>$('.block-zapisi__form .submit').hide();</script>"; }?>
<?=$arResult["FORM_HEADER"]?>
<?foreach ($arResult["QUESTIONS"] as $arQuestion):
	$fieldname = "form_".$arQuestion["STRUCTURE"][0]["FIELD_TYPE"]."_".$arQuestion["STRUCTURE"][0]["ID"];
?>
	<?if ($arQuestion["STRUCTURE"][0]["FIELD_TYPE"]=='text'):?>
		<?if($arQuestion["STRUCTURE"][0]["ID"]==30) {?></div><?}?>
		<input type="text" class="input _mainpage <?if($arQuestion["STRUCTURE"][0]["ID"]==33) {?>_name<?}?><?if($arQuestion["STRUCTURE"][0]["ID"]==34) {?>_phone<?}?>" name="<?=$fieldname?>" value="<?=$arResult["arrVALUES"][$fieldname]?>" placeholder="<?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?> *<?endif?>" <?if ($arQuestion["REQUIRED"] == "Y"):?>required<?endif?> <?if($arQuestion["STRUCTURE"][0]["ID"]==35 || $arQuestion["STRUCTURE"][0]["ID"]==36 || $arQuestion["STRUCTURE"][0]["ID"]==37 || $arQuestion["STRUCTURE"][0]["ID"]==39 ) {?>style="display:none;"<?}?>>


<?if($arQuestion["STRUCTURE"][0]["ID"]==35) {//услуги ?>
		<div class="alaselect _services" data-input="<?=$fieldname?>">
			<div class="alaselect__choosed">Направление</div>
			<div class="alaselect__options">
			<?		$arSectionFilter = array(
				'IBLOCK_ID' => 14,
				'DEPTH_LEVEL' => 1,
				'ID' => array(102,103,98)
			);
			$bs = new CIBlockSection();
			$sectionObj = $bs->GetList(array(), $arSectionFilter, false, array("IBLOCK_ID","ID","DEPTH_LEVEL","NAME"));

			while ($section = $sectionObj->GetNext()) {?>
				<div class="alaselect__option" data-id="<?=$section['ID']?>"><?=$section['NAME']?></div>
				<?} ?>
			</div>
		</div>

	<?}?>

	<?if($arQuestion["STRUCTURE"][0]["ID"]==36) {//врачи ?>
		<div class="alaselect _doctors" data-input="<?=$fieldname?>">
			<div class="alaselect__choosed">Врач</div>
			<div class="alaselect__options">

				<?$arSelect = Array("ID", "IBLOCK_ID","NAME","PROPERTY_PROFESSION");
				$arFilter = Array("IBLOCK_ID"=>20, "ACTIVE"=>"Y","PROPERTY_PROFESSION_VALUE"=>"Врач");
				$res = CIBlockElement::GetList(Array("NAME"=>"ASC"), $arFilter, false, Array("nPageSize"=>50), $arSelect);
				while($ob = $res->GetNextElement()) {
					//print_r($ob);
					$arWD = $ob->GetProperties(false, Array("CODE" => "WORK_DAYS"));
					//if ($USER->IsAdmin()) print_r($arWD['WORK_DAYS']);
					if (empty($arWD['WORK_DAYS']['VALUE_XML_ID']) || in_array(date("w"), $arWD['WORK_DAYS']['VALUE_XML_ID'])) {

					?>
						<div class="alaselect__option" data-id="<?= $ob->fields['ID'] ?>"><?= $ob->fields['NAME'] ?></div>
					<?
					}
				}
				?>
			</div>
		</div>

	<?}?>

	<?if($arQuestion["STRUCTURE"][0]["ID"]==37) {//время приёма?>

				<div class="alaselect _time" data-input="<?=$fieldname?>" data-inputrasp="form_text_39">
					<div class="alaselect__choosed _hide_icon">Время приёма</div>
					<div class="alaselect__options">
					</div>
				</div>

	<?}?>


	<?elseif ($arQuestion["STRUCTURE"][0]["FIELD_TYPE"] == "url"):?>
		<noscript>Для отправки сообщения включите JavaScript.</noscript>
		<div class="antibot" data-id="<?=$arQuestion["STRUCTURE"][0]["ID"]?>"></div>
	<?endif?>
<?endforeach?>
<label for="agree" class="agree _mainpage"><input type="checkbox" id="agree" checked value="" required>Согласен с правилами обработки персональных данных установленными в <a href="/upload/polit-klinika.docx" target="_blank">политике конфидециальности</a></label>
<input type="submit" class="submit _blue" name="web_form_submit" value="Записаться">

<?=$arResult["FORM_FOOTER"]?>
<script>$('.antibot').each(function(){ $(this).html('<input type="hidden" name="form_url_'+$(this).data('id')+'" value="http://ok.ok">'); });


</script>