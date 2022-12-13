<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="search" id="<?=$arParams["CONTAINER_ID"]?>">
	<form action="<?=$arResult["FORM_ACTION"]?>">
		<input type="text" name="q" autocomplete="off" placeholder="Поиск по сайту" class="input _modal" id="<?=$arParams["INPUT_ID"]?>">
		<input type="submit" class="submit" value="Найти">
	</form>
</div>
<script>
	BX.ready(function(){
		new JCTitleSearch({
			'AJAX_PAGE' : '<?=CUtil::JSEscape(POST_FORM_ACTION_URI)?>',
			'CONTAINER_ID': '<?=CUtil::JSEscape($arParams["CONTAINER_ID"])?>',
			'INPUT_ID': '<?=CUtil::JSEscape($arParams["INPUT_ID"])?>',
			'MIN_QUERY_LEN': 2
		});
	});
</script>