<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$arServices = Array(
	
	'main' => Array(
		'NAME' => GetMessage("SERVICE_MAIN_SETTINGS"),
		'STAGES' => Array(
			"files.php",
			"template.php",
			"settings.php",
			"post_event.php",
		),
	),
	"iblock"	=> array(
		"NAME"		=> GetMessage("SERVICE_IBLOCK"),
		"STAGES"	=> array(
			"types.php",
		),
	),
	"1"	=> array(
		"NAME"		=> GetMessage("SERVICE_1_SLIDE"),
		"STAGES"	=> array(
			"1.php",
		),
	),
);
?>