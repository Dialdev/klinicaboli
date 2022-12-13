<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>

        <?$APPLICATION->IncludeComponent(
            "bitrix:iblock.element.add.form",
            "review-add",
            array(
                "CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
                "CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
                "CUSTOM_TITLE_DETAIL_PICTURE" => "",
                "CUSTOM_TITLE_DETAIL_TEXT" => "",
                "CUSTOM_TITLE_IBLOCK_SECTION" => "",
                "CUSTOM_TITLE_NAME" => "Имя",
                "CUSTOM_TITLE_PREVIEW_PICTURE" => "",
                "CUSTOM_TITLE_PREVIEW_TEXT" => "Ваш отзыв",
                "CUSTOM_TITLE_TAGS" => "",
                "DEFAULT_INPUT_SIZE" => "30",
                "DETAIL_TEXT_USE_HTML_EDITOR" => "N",
                "ELEMENT_ASSOC" => "CREATED_BY",
                "GROUPS" => array(
                    0 => "2",
                ),
                "IBLOCK_ID" => "24",
                "IBLOCK_TYPE" => "content",
                "LEVEL_LAST" => "Y",
                "LIST_URL" => "",
                "MAX_FILE_SIZE" => "0",
                "MAX_LEVELS" => "100000",
                "MAX_USER_ENTRIES" => "100000",
                "PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
                "PROPERTY_CODES" => array(
                    0 => "106",
                    1 => "NAME",
                    2 => "PREVIEW_TEXT",
                    3 => "107",
                    4 => "108",
                ),
                "PROPERTY_CODES_REQUIRED" => array(
                    0 => "NAME",
                    1 => "PREVIEW_TEXT",
                ),
                "RESIZE_IMAGES" => "N",
                "SEF_MODE" => "N",
                "STATUS" => "ANY",
                "STATUS_NEW" => "1",
                "USER_MESSAGE_ADD" => "",
                "USER_MESSAGE_EDIT" => "",
                "USE_CAPTCHA" => "N",
         //      "AJAX_MODE" => "Y",
          //      "AJAX_OPTION_SHADOW" => "Y",
            ),
            false
        );?>



