<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Ошибка. Страница не найдена");
?>
<p>К сожалению, запрашиваемая Вами страница не найдена на сайте нашей компании.</p>
    <p>Мы просим прощение за доставленные неудобства, чтобы найти интересующие Вас материалы предлагаем следующие пути:</p>
    <ul>
        <li>перейти на <a href="/">главную страницу</a> сайта,</li>
        <li>воспользоваться <a href="/map.php">картой сайта</a></li>
        <li>позвонить по телефонам:&nbsp; <a class="phone-block__item" href="tel:+74842546266">+7 (4842) 54-62-66</a> | <a class="phone-block__item" href="tel:+79158901515">+7 (915) 890-15-15</a>.</li>
    </ul>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>