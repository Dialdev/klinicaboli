<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if (count($arResult) < 2) return;
$strReturn = '<div class="breadcrumbs">';
$count = count($arResult);
foreach($arResult as $key => $arItem)
	if ($key == 0)
		$strReturn .= '<a href="'.$arItem["LINK"].'" title="'.$arItem["TITLE"].'" itemprop="url" class="breadcrumb__link" itemscope itemtype="http://data-vocabulary.org/Breadcrumb" itemref="breadcrumb_'.($key+1).'"><span itemprop="title">'.$arItem["TITLE"].'</span></a>';
	elseif ($key + 1 < $count)
		$strReturn .= '<a itemscope itemtype="http://data-vocabulary.org/Breadcrumb" itemprop="child" itemref="breadcrumb_'.($key+1).'" id="breadcrumb_'.$key.'" class="breadcrumb__item" href="'.$arItem["LINK"].'" title="'.$arItem["TITLE"].'" itemprop="url" class="breadcrumb__link"><span itemprop="title">'.$arItem["TITLE"].'</span></a>';
	else
		$strReturn .= '<span itemprop="title" itemscope itemtype="http://data-vocabulary.org/Breadcrumb" itemprop="child" id="breadcrumb_'.$key.'">'.$arItem["TITLE"].'</span>';
$strReturn .= '</div>';
return $strReturn;
?>