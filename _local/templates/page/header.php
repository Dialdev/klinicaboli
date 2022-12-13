<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<? include_once $_SERVER["DOCUMENT_ROOT"]."/local/templates/.default/include_template/_head.php"; ?>
</head>
<body>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>

<? include_once $_SERVER["DOCUMENT_ROOT"]."/local/templates/.default/include_template/_header.php"; ?>
<main class="main _content_text _clearfix">

<?$APPLICATION->IncludeComponent("bitrix:breadcrumb","")?>
<h1><? $APPLICATION->ShowTitle(false); ?></h1>