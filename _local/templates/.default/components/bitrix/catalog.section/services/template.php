<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
	<div class="accordeon _divorce">
		<div class="accordeon-item _services">
			<div class="accordeon-item__title"><h3><?=$arResult['NAME']?></h3></div>
			<div class="accordeon-item__text">
				<ul class="accordeon-item-menu">
					<?foreach ($arResult['ITEMS'] as $arItem):
						$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_EDIT'));
						$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_DELETE'));
						?>
						<li class="accordeon-item-menu__item"><a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="accordeon-item-menu__link"><?=$arItem['NAME']?></a></li>
					<?endforeach?>
				</ul>
			</div>
		</div>
	</div>
<?=$arResult['NAV_STRING']?>