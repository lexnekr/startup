<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$arServices = Array(

    'main' => Array(
        'NAME' => GetMessage("SERVICE_MAIN_SETTINGS"),
        'STAGES' => Array(
            "files.php",
            "template.php",
            "settings.php",
            "menu.php",
            "schema_org.php",
            "post_event.php",
        ),
    ),
    "iblock"	=> array(
        "NAME"		=> GetMessage("SERVICE_IBLOCK"),
        "STAGES"	=> array(
            "types.php",
            "0.php",
            "1.php",
            "2.php",
            "3.php",
            "pricing_table.php",
            "4.php",
            "5.php",
            "6.php",
            "post_event.php",
        ),
    ),
);
?>