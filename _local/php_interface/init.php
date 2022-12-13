<?
define("LOG_FILENAME", $_SERVER["DOCUMENT_ROOT"]."/test.txt");
/*
You can place here your functions and event handlers

AddEventHandler("module", "EventName", "FunctionName");
function FunctionName(params)
{
	//code
}
*/
use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;





function my_onBeforeResultAdd($WEB_FORM_ID, &$arFields, &$arrVALUES)
{
    global $APPLICATION;

    if ($WEB_FORM_ID == 4)
    {
		if($arrVALUES['form_text_39']!=''){
		
		if (!CModule::IncludeModule("highloadblock")) {return;}
		
			$hlblock = HL\HighloadBlockTable::getById(2)->fetch();

				if (empty($hlblock)) return;

				$entity = HL\HighloadBlockTable::compileEntity($hlblock);
				$entity_data_class = $entity->getDataClass();
				
				$result_upd = $entity_data_class::update((int)$arrVALUES['form_text_39'], array(
				  'UF_ACTIVE'   => 'N'
				));
		
		}
        //AddMessage2Log($arrVALUES);

    }
}
AddEventHandler('form', 'onBeforeResultAdd', 'my_onBeforeResultAdd');

AddEventHandler("iblock", "OnBeforeIBlockElementAdd",  "OnBeforeIBlockElementAddHandler");

function OnBeforeIBlockElementAddHandler(&$arFields)
{
	//AddMessage2Log($arFields);
	if($arFields["IBLOCK_ID"] == 23) //вопрос-ответ
	{
		CModule::IncludeModule('main');
		$sectionName = $arFields['IBLOCK_SECTION'][0];
		$sectionCode = CUtil::translit($sectionName,"ru", array("replace_space"=>"-","replace_other"=>"-"));

		CModule::IncludeModule('iblock');

		$bxSection = CIBlockSection::GetList(array(), array('IBLOCK_ID' => 23, 'CODE' => $sectionCode));

		if ($arSection = $bxSection->Fetch()) {
			//AddMessage2Log($arSection);
			$sectionId = $arSection['ID'];
		} else {
			$arSectionFields = Array(
				"ACTIVE" => "Y",
				"IBLOCK_SECTION_ID" => false,
				"IBLOCK_ID" => 23,
				"NAME" => $sectionName,
				"CODE" => $sectionCode
			);
			$bxSection = new CIBlockSection();
			$sectionId = $bxSection->Add($arSectionFields);
			//AddMessage2Log($sectionId);
		}

		$arFields['IBLOCK_SECTION'] = $sectionId;
		
		if (isset($sectionId)) {
			// выбор списка пользователей, имеющих право доступа на изменение инфоблока

			 $obRights = new CIBlockSectionRights(23, $sectionId);
			 $groups = array();
			 $userEmails = array();
				$arRights = $obRights->GetRights(); 
				foreach ($arRights as $right) {
					
					if ($right['TASK_ID'] == 34) //права на изменение из CTask::GetList
					{
						$groups[] = substr($right['GROUP_CODE'], 1);
					}
				}
				$filter = Array("GROUPS_ID" => $groups);
				$rsUsers = CUser::GetList(($by="id"), ($order="desc"), $filter);
				while ($arUser = $rsUsers->Fetch()) {
					$userEmails[] = $arUser['EMAIL'];
				}
				if (!empty($userEmails)) {
				$arEventFields = array(
					"QUESTION_SECTION" => strval($sectionName),
					"QUESTION_EMAILS" => implode(',',$userEmails),
					"QUESTION_TEXT" => strval($arFields['PREVIEW_TEXT']),
					"QUESTION_NAME" => strval($arFields["NAME"]));
					CEvent::Send("NEW_QUESTION", 's1', $arEventFields,'N',31);
				}
		}
	}
}




function translit($s, $clear = false) {
    $s = (string) $s; // преобразуем в строковое значение
    $s = strip_tags($s); // убираем HTML-теги
    $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
    if ($clear) {
        $s = preg_replace("/\s/", '', $s); // удаляем пробелы
    } else {
        $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
    }

    $s = trim($s); // убираем пробелы в начале и конце строки
    $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
    $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
    if ($clear) {
        $s = preg_replace("/[^0-9a-z]/i", "", $s); // очищаем строку от недопустимых символов
    } else {
        $s = preg_replace("/[^0-9a-z_ ]/i", "", $s); // очищаем строку от недопустимых символов
    }

    $s = str_replace(" ", "_", $s); // заменяем пробелы знаком минус
    return $s; // возвращаем результат
}
?>