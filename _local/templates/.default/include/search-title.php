<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
            <div id="search" class="modal">
                <div class="modal-window">
                    <a class="modal-window__close" onclick="Popup.CloseWindow();"></a>
                    <h2 class="modal-window__title">Поиск</h2>
                    <?$APPLICATION->IncludeComponent("bitrix:search.title","",array(
                        "PAGE" => "/search/",
                        "INPUT_ID" => "title-search-input",
                        "CONTAINER_ID" => "title-search",
                        "TOP_COUNT" => "5",
                        "NUM_CATEGORIES" => "2",
                       /* "CATEGORY_0_TITLE" => "Каталог",
                        "CATEGORY_0" => array("iblock_catalog"),
                        "CATEGORY_0_iblock_catalog" => array("all"),
                        "CATEGORY_1_TITLE" => "Новости",
                        "CATEGORY_1" => array("iblock_news"),
                        "CATEGORY_1_iblock_news" => array("3"),*/
                    ));?>

                    <!--form action="">
                         <input type="text" class="input _modal" value="" placeholder="Поиск по сайту" required>
                         <input type="submit" class="submit " value="Найти">
                    </form-->
                </div>
            </div>
