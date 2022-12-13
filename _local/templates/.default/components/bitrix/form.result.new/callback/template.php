<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif?>
<?if (($_GET["WEB_FORM_ID"] == $arResult["arForm"]["ID"]) && ($_GET["formresult"] == "addok")) ShowNote("Ваша заявка отправлена.");?>
<?=$arResult["FORM_HEADER"]?>
<?foreach ($arResult["QUESTIONS"] as $arQuestion):
	$fieldname = "form_".$arQuestion["STRUCTURE"][0]["FIELD_TYPE"]."_".$arQuestion["STRUCTURE"][0]["ID"];
?>
	<?if ($arQuestion["STRUCTURE"][0]["FIELD_TYPE"]=='text'):?>
		<?if($arQuestion["STRUCTURE"][0]["ID"]==30) {?></div><?}?>
		<div class="modal-window__wd50 <?if($arQuestion["STRUCTURE"][0]["ID"]==30) {?>_no_margin<?}?>">
		<input type="text" class="input _modal <?if($arQuestion["STRUCTURE"][0]["ID"]==32) {?>_name<?}?><?if($arQuestion["STRUCTURE"][0]["ID"]==30) {?>_phone<?}?>" name="<?=$fieldname?>" value="<?=$arResult["arrVALUES"][$fieldname]?>" placeholder="<?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?> *<?endif?>" <?if ($arQuestion["REQUIRED"] == "Y"):?>required<?endif?>>
	<?elseif ($arQuestion["STRUCTURE"][0]["FIELD_TYPE"] == "textarea"):?>
		<textarea class="form__textarea" name="<?=$fieldname?>" placeholder="<?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?> *<?endif?>" <?if ($arQuestion["REQUIRED"] == "Y"):?>required<?endif?>><?=$arResult["arrVALUES"][$fieldname]?></textarea>
	<?elseif ($arQuestion["STRUCTURE"][0]["FIELD_TYPE"] == "url"):?>
		<noscript>Для отправки сообщения включите JavaScript.</noscript>
		<div class="antibot" data-id="<?=$arQuestion["STRUCTURE"][0]["ID"]?>"></div>
	<?endif?>
<?endforeach?>
<label for="agree" class="agree"><input type="checkbox" id="agree" checked value="" required>Согласен с правилами обработки персональных данных установленными в <a href="/upload/polit-klinika.docx" target="_blank">политике конфидециальности</a></label>
<input type="submit" class="submit" name="web_form_submit" value="Отправить">

</div>
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
</script>