<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<div class="two-columns__cell _smaller our-doctors">
        <div class="our-doctors__arrows">
            <a href="javascript:void(0)" class="fa fa-angle-down vertical-slider__arrow our-doctors__arrow _prev"></a>
            <a href="javascript:void(0)" class="fa fa-angle-up vertical-slider__arrow our-doctors__arrow  _next"></a>
        </div>
        <div class="title">
            <a href="/doctors/" class="title__h2">Наши врачи</a>
        </div>
        <div class="our-doctors-slider">
		
		<?foreach($arResult["ITEMS"] as $arItem):
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"));
		?>		
           <?if($arItem["PREVIEW_PICTURE"]["SRC"] !='') {
			   $thumbD = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array("width" => 481, "height" => 297), BX_RESIZE_IMAGE_EXACT);
			   ?>
            <div class="our-doctors-item">
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="our-doctors-item__imgcontainer"><img class="our-doctors-item__img" src="<?=$thumbD["src"]?>" alt="" title=""></a>
                <div class="our-doctors-item__text">
                    <a class="our-doctors-item__name" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
					<?if (is_array($arItem['DISPLAY_PROPERTIES']['SPEC']['DISPLAY_VALUE'])){?>
                   <?foreach($arItem['DISPLAY_PROPERTIES']['SPEC']['DISPLAY_VALUE'] as $sp){?>
                       <span class="our-doctors-item__prof"><?=$sp?></span>
                    <?}?>
					<?} else {?>
						<span class="our-doctors-item__prof"><?=$arItem['DISPLAY_PROPERTIES']['SPEC']['DISPLAY_VALUE']?></span>
					<?}?>
                    <!--a href="" class="our-doctors-item__review">Отзывы пациентов(46)</a-->
                </div>
            </div>
            <?}?>
			<?endforeach?>
        </div>
    </div>