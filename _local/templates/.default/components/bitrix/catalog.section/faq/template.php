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
	<div class="faq-item _questtion">
		<span class="faq-item__name"><?=$arItem['NAME']?></span><br>
		<div class="faq-item__text"><?=$arItem['PREVIEW_TEXT']?></div>
		<div class="faq-item__signature"><span class="faq-item__date"><?=date("d.m.Y",strtotime($arItem['DATE_CREATE']));?></span></div>
	</div>


	<?if (strlen($arItem['DETAIL_TEXT']) > 0) :?>
		<div class="faq-item _answer">
			<?$user =  CUser::GetByID($arItem['MODIFIED_BY'])->Fetch();?>
			<span class="faq-item__otvetil">Ответил:  </span><span class="faq-item__name"><?=$user['LAST_NAME'].' '.$user['NAME'].' '.$user['SECOND_NAME'];?></span>
			<div class="faq-item__text">
				<?=$arItem['DETAIL_TEXT'];?>
			</div>
			<div class="faq-item__signature">С Уважением, <?=$user['LAST_NAME'].' '.$user['NAME'].' '.$user['SECOND_NAME'];?>.
				<span class="faq-item__date"><?=date("d.m.Y",strtotime($arItem['TIMESTAMP_X']));?></span>
			</div>
		</div>
	<? endif;?>

<?endforeach?>
<?=$arResult['NAV_STRING']?>