<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?

if(empty($_POST)) {
	return;
}

if (!CModule::IncludeModule("highloadblock")) {
	ShowError(GetMessage("Модуль highloadblock не установлен."));return;
}

use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;

$hlblock_id = 2;

if ($_POST['service'] !='') {

	if (CModule::IncludeModule("iblock")) {

		$arSectionFilter = array(
			'IBLOCK_ID' => 26,
			'ACTIVE' => 'Y',
			'ID' => (int)$_POST['service']
		);
		$bs = new CIBlockSection();
		$sectionObj = $bs->GetList(array(), $arSectionFilter, false, array("IBLOCK_ID","ID","UF_ID_MIS","ACTIVE"));

		if ($section = $sectionObj->GetNext()) {

			if ($section['UF_ID_MIS']!='') {

				$hlblock = HL\HighloadBlockTable::getById($hlblock_id)->fetch();

				if (empty($hlblock)) return;

				$entity = HL\HighloadBlockTable::compileEntity($hlblock);
				$entity_data_class = $entity->getDataClass();

				$rsData = $entity_data_class::getList(array(
					"select" => array("*"),
					"order" => array("ID" => "ASC"),
					"filter" => array("UF_ID_MIS"=>$section['UF_ID_MIS'],"UF_ACTIVE"=>"Y")
				));

				$ar_selectTime = array();
				while ($arData = $rsData->Fetch()) {
					$ar_selectTime[] = '<div class="alaselect__option" data-id="'.$arData['ID'].'">'.$arData['UF_TIME'].'</div>';
				}
				if (count($ar_selectTime>2)) echo implode($ar_selectTime);
					else return;
			}
		}

	}
}
if ($_POST['doctor'] !='') {

	if (CModule::IncludeModule("iblock")) {

		$db_props = CIBlockElement::GetProperty(20, (int)$_POST['doctor'], array("sort" => "asc"), Array("CODE"=>"ID_MIS"));
		if($ar_props = $db_props->Fetch()) {
			if ($ar_props['VALUE']!='') {

				$hlblock = HL\HighloadBlockTable::getById($hlblock_id)->fetch();

				if (empty($hlblock)) return;

				$entity = HL\HighloadBlockTable::compileEntity($hlblock);
				$entity_data_class = $entity->getDataClass();

				$rsData = $entity_data_class::getList(array(
					"select" => array("*"),
					"order" => array("ID" => "ASC"),
					"filter" => array("UF_ID_MIS"=>$ar_props['VALUE'], "UF_ACTIVE"=>"Y")
				));

				$ar_selectTime = array();
				/*$ar_selectTime[] = '<select class="select _time" onchange="setTime(this);" data-input="form_text_37" data-inputrasp="form_text_39"><option value="0">Время приёма</option>';
				while ($arData = $rsData->Fetch()) {
					$ar_selectTime[] = '<option value="'.$arData['ID'].'">'.$arData['UF_TIME'].'</option>';
				}*/
				while ($arData = $rsData->Fetch()) {
					$ar_selectTime[] = '<div class="alaselect__option" data-id="'.$arData['ID'].'">'.$arData['UF_TIME'].'</div>';
				}
				//$ar_selectTime[] = '</select>';
				if (count($ar_selectTime>2)) echo implode($ar_selectTime);
				else return;

			}
		}

	}
}

//print_r($_POST);

?>

