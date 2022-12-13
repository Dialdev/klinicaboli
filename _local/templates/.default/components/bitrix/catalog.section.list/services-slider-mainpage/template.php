<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="services-mainpage">
    <div class="title">
        <a href="/uslugi/" class="title__h2">Услуги</a>
    </div>

    <div class="slider__arrows">
        <div class="fa fa-angle-right slider__arrow services-slider__arrow _next"></div>
        <div class="fa fa-angle-left slider__arrow services-slider__arrow _prev"></div>
    </div>

    <div class="services-mainpage-slider">
<?foreach ($arResult['SECTIONS'] as $arSection):?>
    <?
    $icon = CFile::GetPath($arSection["UF_ICON"]);
	$thumbS = CFile::ResizeImageGet($arSection["UF_ICON"], array("width" => 100, "height" => 100), BX_RESIZE_IMAGE_PROPORTIONAL_ALT );
    ?>
    <a href="<?=$arSection['SECTION_PAGE_URL']?>" class="services-mainpage__item">
        <div  class="services-mainpage__img-container ">
            <img class="services-mainpage__img hvr-grow" src="<?=$thumbS["src"]?>" alt="" title="">
        </div>
        <span class="services-mainpage__text"><?=$arSection['NAME']?></span>
    </a>
<?endforeach?>
    </div>
</div>