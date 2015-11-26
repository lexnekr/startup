<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$lg = array (
    "1"=>GetMessage("lg1"),
    "2"=>GetMessage("lg2"),
    "3"=>GetMessage("lg3"),
    "4"=>GetMessage("lg4"),
    "5"=>GetMessage("lg5"),
    "6"=>GetMessage("lg6"),
    "7"=>GetMessage("lg7"),
    "8"=>GetMessage("lg8"),
    "9"=>GetMessage("lg9"),
);

$arComponentParameters = array(
	"GROUPS" => array(
		"MAIN_PARAMS" => array(
			"SORT" => 50,
			"NAME" => GetMessage("MAIN_PARAMS"),
		),
	),
	"PARAMETERS"  =>  array(
        "TITLE" => array(
            "PARENT" => "MAIN_PARAMS",
            "NAME" => GetMessage("TITLE"),
            "TYPE" => "STRING",
        ),
        "STRING" => array(
            "PARENT" => "MAIN_PARAMS",
            "NAME" => GetMessage("STRING"),
            "TYPE" => "STRING",
            "MULTIPLE" =>"Y",
        ),
        "BUTTON_TEXT" => array(
            "PARENT" => "MAIN_PARAMS",
            "NAME" => GetMessage("BUTTON_TEXT"),
            "TYPE" => "STRING",
            "DEFAULT" => GetMessage("BUTTON_TEXT_DEFAULT"),
        ),
        "BUTTON_URL" => array(
            "PARENT" => "MAIN_PARAMS",
            "NAME" => GetMessage("BUTTON_URL"),
            "TYPE" => "STRING",
        ),
        "BLOCK_MD" => Array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("BLOCK_MD"),
            "TYPE" => "LIST",
            "VALUES" => $lg,
            "ADDITIONAL_VALUES" => "N",
            "REFRESH" => "N",
            "DEFAULT" => "3",
            "SORT" => "160",
        ),
        "BLOCK_SM" => Array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("BLOCK_SM"),
            "TYPE" => "LIST",
            "VALUES" => $lg,
            "ADDITIONAL_VALUES" => "N",
            "REFRESH" => "N",
            "DEFAULT" => "6",
            "SORT" => "160",
        ),
	)
);
