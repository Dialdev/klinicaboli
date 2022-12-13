        <div class="hfooter">
    <footer class="footer">

        <?$APPLICATION->IncludeComponent(
            "bitrix:menu",
            "bottom",
            array(
                "ROOT_MENU_TYPE" => "top",
                "CHILD_MENU_TYPE" => "left",
                "MAX_LEVEL" => "1",
                "USE_EXT" => "N",
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

        <div class="copyright">
            <div class="copyright__column">
                © <?=date("Y")?> Клиника боли <a href="/upload/polit-klinika.pdf" target="_blank">Политика конфидециальности</a>
            </div>
            <div class="copyright__column">
                <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array("AREA_FILE_SHOW" => "file","AREA_FILE_SUFFIX" => "inc","EDIT_TEMPLATE" => "","PATH" => "/local/templates/.default/include/phones_bottom.php"));?><?$APPLICATION->IncludeComponent("bitrix:main.include","",Array("AREA_FILE_SHOW" => "file","AREA_FILE_SUFFIX" => "inc","EDIT_TEMPLATE" => "","PATH" => "/local/templates/.default/include/email.php"));?>
            </div>
            <div class="copyright__column">
                <a href="https://dialweb.ru/" target="_blank" class="copyright__dial">Создание сайта - <span>Digital Agency DIAL</span></a>
            </div>
        </div>

    </footer>
</div>


<?$APPLICATION->AddHeadScript("/local/templates/.default/js/jquery-2.1.4.min.js");?>
<?$APPLICATION->AddHeadScript("/local/templates/.default/js/jquery.fancybox.pack.js");?>
<?$APPLICATION->AddHeadScript("/local/templates/.default/js/slick/slick.min.js");?>
<?$APPLICATION->AddHeadScript("/local/templates/.default/js/jquery.maskedinput.min.js");?>
<?$APPLICATION->AddHeadScript("/local/templates/.default/js/main.js");?>
