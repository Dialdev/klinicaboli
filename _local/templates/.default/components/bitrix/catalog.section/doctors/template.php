<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
//echo '<pre>';
//print_r($arResult);
//echo '</pre>';
?>


	<div class="doctors">
<?foreach ($arResult['ITEMS'] as $arItem):
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_EDIT'));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_DELETE'));
?>
	<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="doctors-item">
		<?$img = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array("width" => 463, "height" => 308), BX_RESIZE_IMAGE_PROPORTIONAL);?>
		<span class="doctors-item__img" style="background-image: url('<?=$img['src']?>')"></span>
		<span class="doctors-item__link">
                        <span class="doctors-item__name" ><?=$arItem['NAME']?>
                             <span class="doctors-item__prof"><?=implode(', ',$arItem['SPECNAME'])?></span>
                        </span>
                    </span>
		<span class="doctors-item__link _citata">
                        <span class="doctors-item__name" >
							<span class="doctors-item__quotes"><?=$arItem["PROPERTIES"]["CITATA"]["VALUE"]?></span>
                        </span>
						<span class="doctors-item__citata-author"><?=$arItem["PROPERTIES"]["CITATA_AUTHOR"]["VALUE"]?></span>
                    </span>
					
	</a>
<?endforeach?>
	</div>
<?=$arResult['NAV_STRING']?>