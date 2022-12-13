<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif?>
<?if (($_GET["WEB_FORM_ID"] == $arResult["arForm"]["ID"]) && ($_GET["formresult"] == "addok")) ShowNote("Ваша заявка отправлена.");?>
<?=$arResult["FORM_HEADER"]?>
<div class="modal-window__wd50">
<?if (!CModule::IncludeModule("iblock")) {} ?>
<?foreach ($arResult["QUESTIONS"] as $arQuestion):
	$fieldname = "form_".$arQuestion["STRUCTURE"][0]["FIELD_TYPE"]."_".$arQuestion["STRUCTURE"][0]["ID"];
?>
	<?if ($arQuestion["STRUCTURE"][0]["FIELD_TYPE"]=='text'):?>
		<?if($arQuestion["STRUCTURE"][0]["ID"]==35) {?></div><div class="modal-window__wd50 _no_margin"><?}?>
		
		<input type="text" class="input _modal <?if($arQuestion["STRUCTURE"][0]["ID"]==33) {?>_name<?}?><?if($arQuestion["STRUCTURE"][0]["ID"]==34) {?>_phone<?}?>" 
		name="<?=$fieldname?>" 
		value="<?if($arQuestion["STRUCTURE"][0]["ID"]==36) {?><?=$arParams["DOCTOR"]?><?} else {?><?=$arResult["arrVALUES"][$fieldname]?><?}?>" 
		placeholder="<?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?> *<?endif?>" <?if ($arQuestion["REQUIRED"] == "Y"):?>required<?endif?> <?if($arQuestion["STRUCTURE"][0]["ID"]==35 || $arQuestion["STRUCTURE"][0]["ID"]==36 || $arQuestion["STRUCTURE"][0]["ID"]==37 || $arQuestion["STRUCTURE"][0]["ID"]==39 ) {?>style="display:none;"<?}?>>
		
		
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
		<?if ($arParams["DOCTOR"]=='') {?>
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
		<?} else {?>
			<div class="alaselect _doctors" data-input="<?=$fieldname?>">
			<?
			$arSelect = Array("ID", "IBLOCK_ID","NAME");
			$arFilter = Array("IBLOCK_ID"=>20, "ID"=>(int)$arParams["DOCTOR"],"ACTIVE"=>"Y");
			$res = CIBlockElement::GetList(Array("NAME"=>"ASC"), $arFilter, false, Array("nPageSize"=>50), $arSelect);
			if($ob = $res->GetNext()) {
				?><div class="alaselect__choosed _hide_icon"><?=$ob['NAME']?></div><?
			}
			?>
			
		</div>
		<script> $('input[name="<?=$fieldname?>"]').val($('.alaselect._doctors .alaselect__choosed').text());
		console.log($('input[name="<?=$fieldname?>"]').val());</script>
		<?}?>
	<?}?>

	<?if($arQuestion["STRUCTURE"][0]["ID"]==37 ) {//время приёма?>
		<div class="alaselect _time" data-input="<?=$fieldname?>" data-inputrasp="form_text_39">
			<div class="alaselect__choosed">Время приёма</div>
			<div class="alaselect__options">
			</div>
		</div>
	<?}?>
	
	
	
	
	<?elseif ($arQuestion["STRUCTURE"][0]["FIELD_TYPE"] == "textarea"):?>
		</div>
		<textarea class="input _modal _textarea" name="<?=$fieldname?>" placeholder="<?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?> *<?endif?>" <?if ($arQuestion["REQUIRED"] == "Y"):?>required<?endif?>><?=$arResult["arrVALUES"][$fieldname]?></textarea>
	
	<?elseif ($arQuestion["STRUCTURE"][0]["FIELD_TYPE"] == "url"):?>
		<noscript>Для отправки сообщения включите JavaScript.</noscript>
		<div class="antibot" data-id="<?=$arQuestion["STRUCTURE"][0]["ID"]?>"></div>
	<?endif?>
<?endforeach?>

<label for="agree" class="agree"><input type="checkbox" id="agree" checked value="" required>Согласен с правилами обработки персональных данных установленными в <a href="/upload/polit-klinika.docx" target="_blank">политике конфидециальности</a></label>
<input type="submit" class="submit" name="web_form_submit" value="Записаться">

<?=$arResult["FORM_FOOTER"]?>
<script>$('.antibot').each(function(){ $(this).html('<input type="hidden" name="form_url_'+$(this).data('id')+'" value="http://ok.ok">'); });
	$('input._name').on('keypress', function () {
		var that = this;
		setTimeout(function () {
			var res = /[^а-яА-ЯёЁa-zA-Z ]/g.exec(that.value);
			that.value = that.value.replace(res, '');
		}, 0);
	});
	$("._phone").mask("+7 (999) 999-99-99");

	/**************************************************/

	function setTime(link) {
		var form = $(link).closest('form')[0];
		console.log(form);
		$(form).find('input[name="'+$(link).data("input")+'"]').val($(link).find("option:selected").text());
		$(form).find('input[name="'+$(link).data("inputrasp")+'"]').val($(link).val());
	}

	function getTime(type, id) {
		$('.alaselect._time').find('.alaselect__options').empty();
		$.ajax({
			type: "POST",
			url: "/local/templates/.default/include/get-time.php",
			data: ""+type+"="+id+"",
			success: function(data){
				if (data.length>2) {
					$('.alaselect._time').find('.alaselect__options').html(data);
				}//$('.select-container._time').html(data);
			}
		});
	}

	$('.alaselect').click(function (e) {
		//console.log("123");
		var val = e.target;
		$('.alaselect__options').not($(this).find('.alaselect__options')).hide();//закрыть все селекты кроме текущего
		$(this).find('.alaselect__options').slideToggle();

		if ($(val).hasClass('alaselect__option')) {
			$(this).find('.alaselect__choosed').text($(val).text());
			var form = $(this).closest('form')[0];
			$(form).find('input[name="' + $(this).data("input") + '"]').val($(val).text());
			console.log($(form).find('input[name="' + $(this).data("input") + '"]').val());
			if ($(this).hasClass('_services')) { getTime('service',$(val).data("id")); }
			if ($(this).hasClass('_doctors')) { getTime('doctor',$(val).data("id")); }
		}


	});
	/**************************************************/

</script>