<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$arTemplateParameters = array(
    "POSITION" => Array(
        "NAME" => GetMessage("POSITION"),
        "PARENT" => "BASE",
        "TYPE" => "LIST",
        "DEFAULT" => "",
		"VALUES" => array (
			"left" => GetMessage("LEFT"),
			"right" => GetMessage("RIGHT")
		),
    ),

);
?>