<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arTemplateParameters = array(
    "NUMBER_OF_LAST_ELEMENT_OF_1_COLL" => Array(
        "NAME" => GetMessage("NUMBER_OF_LAST_ELEMENT_OF_1_COLL"),
        "TYPE" => "STRING",
        "DEFAULT" => "3",
    ),
    "SLIDE_LINK_ID" => Array(
        "NAME" => GetMessage("SLIDE_LINK_ID"),
        "TYPE" => "STRING",
        "MULTIPLE" => "N",
    ),
    "RESULT_TITLE" => array(
        "NAME" => GetMessage("RESULT_TITLE_PARAMETR"),
        "TYPE" => "STRING",
        "MULTIPLE" => "N",
        "DEFAULT" => GetMessage("RESULT_TITLE"),
        "ADDITIONAL_VALUES" => "N",
    ),
    "RESULT_TEXT" => array(
        "NAME" => GetMessage("RESULT_TEXT_PARAMETR"),
        "TYPE" => "STRING",
        "MULTIPLE" => "N",
        "DEFAULT" => GetMessage("RESULT_TEXT"),
        "ADDITIONAL_VALUES" => "N",
    ),
);
?>