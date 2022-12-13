<div class="left-column">
    <a href="" class="hidden-link"></a>
    <a href="" class="mobile-menu"></a>
    <a class="logo" <?if($APPLICATION->GetCurPage(false) !== '/'){?>href="/"<?}?>></a>

<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	".default", 
	array(
		"ROOT_MENU_TYPE" => "top",
		"CHILD_MENU_TYPE" => "left",
		"MAX_LEVEL" => "2",
		"USE_EXT" => "Y",
		"COMPONENT_TEMPLATE" => ".default",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?>


</div>

<div class="right-column">
    <div class="wrap">

        <header class="header">
            <div class="header__sitename">Калужская клиника боли</div>
            <div class="header__deviz"><?$APPLICATION->IncludeComponent("bitrix:main.include","",Array("AREA_FILE_SHOW" => "file","AREA_FILE_SUFFIX" => "inc","EDIT_TEMPLATE" => "","PATH" => "/local/templates/.default/include/deviz.php"));?></div>
            <div class="header__phones phone-block">
                <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array("AREA_FILE_SHOW" => "file","AREA_FILE_SUFFIX" => "inc","EDIT_TEMPLATE" => "","PATH" => "/local/templates/.default/include/phone.php"));?>
            </div>
            <a href="#callback" class="header__btn btn _rounded _modal_link" data-filename="callback-form" >Заказать звонок</a>
            <a href="#search" class="header__search _modal_link" data-filename="search-title"></a>
        </header>

