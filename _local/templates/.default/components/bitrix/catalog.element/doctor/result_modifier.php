<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

foreach ($arResult['DISPLAY_PROPERTIES']['SPEC']['DISPLAY_VALUE'] as $k=>&$spec) {
   if ($k>0) $spec = mb_strtolower($spec);
}
?>