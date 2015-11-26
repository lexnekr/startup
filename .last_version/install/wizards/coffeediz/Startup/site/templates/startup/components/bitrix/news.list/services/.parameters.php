<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arTemplateParameters = array(
	"DISPLAY_NAME" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_NAME"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"SLIDE_LINK_ID" => Array(
		"NAME" => GetMessage("SLIDE_LINK_ID"),
		"TYPE" => "STRING",
		"MULTIPLE" => "N",
		"PARENT" => "BASE",
		"DEFAULT" => "connected",
	),
);
?>
