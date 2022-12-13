<?
//Отключаем статистику Bitrix
define("NO_KEEP_STATISTIC", true);
//Подключаем движок
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
//устанавливаем тип ответа как xml документ
header('Content-Type: application/xml; charset=utf-8');


$array_pages = array();

//Простые текстовые страницы: начало
$array_pages[] = array(
   	'NAME' => 'Главная страница',
   	'URL' => '/',
);
$array_pages[] = array(
   	'NAME' => 'О клинике',
   	'URL' => '/o-klinike/',
);
$array_pages[] = array(
   	'NAME' => 'О нас',
   	'URL' => '/o-klinike/o-nas/',
);
$array_pages[] = array(
	'NAME' => 'Руководство клиники',
   	'URL' => '/o-klinike/rukovodstvo-kliniki/',
);
$array_pages[] = array(
   	'NAME' => 'Документы',
   	'URL' => '/o-klinike/dokumenty/',
);
$array_pages[] = array(
   	'NAME' => 'Лицензии',
   	'URL' => '/o-klinike/litsenzii/',
);
$array_pages[] = array(
   	'NAME' => 'Вакансии',
   	'URL' => '/o-klinike/vakansii/',
);
$array_pages[] = array(
   	'NAME' => 'Фотогалерея',
   	'URL' => '/o-klinike/fotogalereya/',
);
$array_pages[] = array(
   	'NAME' => 'Видеоролик Клиники боли',
   	'URL' => '/o-klinike/videorolik-kliniki-boli/',
);
$array_pages[] = array(
   	'NAME' => 'Контакты',
   	'URL' => '/kontakty/',
);


//Простые текстовые страницы: конец


$array_iblocks_id = array('14', '19', '15', '16', '20', '24'); //ID инфоблоков, разделы и элементы которых попадут в карту сайта
if(CModule::IncludeModule("iblock"))
{
	foreach($array_iblocks_id as $iblock_id)
	{
		//Список разделов
   		$res = CIBlockSection::GetList(
	      	array(),
	      	Array(
	         	"IBLOCK_ID" => $iblock_id,
	         	"ACTIVE" => "Y"
	      	),
      		false,
    		array(
    		"ID",
    		"NAME",
    		"SECTION_PAGE_URL",
    		"TIMESTAMP_X"
    	));
   		while($ob = $res->GetNext())
   		{
			$array_pages_iblock[] = array(
			   	'NAME' => $ob['NAME'],
			   	'URL' => $ob['SECTION_PAGE_URL'],
			   	'LASTMOD' => $ob['TIMESTAMP_X']
			);
   		}
		//Список элементов
   		$res = CIBlockElement::GetList(
	      	array(),
	      	Array(
	         	"IBLOCK_ID" => $iblock_id,
	         	"ACTIVE_DATE" => "Y",
	         	"ACTIVE" => "Y"
	      	),
      		false,
      		false,
    		array(
    		"ID",
    		"NAME",
    		"DETAIL_PAGE_URL",
    		"TIMESTAMP_X"
    	));
   		while($ob = $res->GetNext())
   		{
			$array_pages_iblock[] = array(
			   	'NAME' => $ob['NAME'],
			   	'URL' => $ob['DETAIL_PAGE_URL'],
			   	'LASTMOD' => $ob['TIMESTAMP_X']
			);
   		}
	}
}

//Создаём XML документ: начало
//echo '<pre>'; print_r($array_pages); echo '</pre>';
$xml_content = '';
$xml_content_iblock = '';
$dateformat = 'Y-m-d';
$site_url = 'https://'.$_SERVER['HTTP_HOST'];
$quantity_elements = 0;
foreach($array_pages as $v){
	$quantity_elements++;
	if ($quantity_elements == 1){
		$priority = 1;
	} else {
		$priority = 0.8;
	}
	$page_url = mb_substr( $v['URL']."index.php", 1);
	$lastmod = date($dateformat, filemtime($page_url));
	$xml_content.='
		<url>
			<loc>'.$site_url.$v['URL'].'</loc>
			<lastmod>'.$lastmod.'</lastmod>
			<priority>'.$priority.'</priority>
			<changefreq>weekly</changefreq>
		</url>
	';
}

foreach($array_pages_iblock as $v){
    /*Устраняем выдачу в карту сайта URL с запросами вида /norazd/detail.php?ID=54 */
    $h = $v["URL"];                         //получаем URL
    if(stristr($h, '?') === FALSE) {        //проверяем наличие символа ?
                                            //если его нету, выводим
    	$quantity_elements++;
        $priority = 0.6;
        $lastmod = date($dateformat, MakeTimeStamp($v['LASTMOD'], "DD.MM.YYYY"));
        $xml_content_iblock.='
            <url>
                <loc>'.$site_url.$v['URL'].'</loc>
                <lastmod>'.$lastmod.'</lastmod>
                <priority>'.$priority.'</priority>
				<changefreq>weekly</changefreq>

            </url>
        ';
    } else {
                                            //если есть, нчиего не делаем
    }
}
$quantity_elements = 0;

//Создаём XML документ: конец

//Выводим документ
echo '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	'.$xml_content.''.$xml_content_iblock.'
</urlset>
';
?>
