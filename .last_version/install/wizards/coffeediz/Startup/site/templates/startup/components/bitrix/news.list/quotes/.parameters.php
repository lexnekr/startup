<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arType1 = Array (
    "h1"=>GetMessage("Type1"),
    "h2"=>GetMessage("Type2"),
    "h3"=>GetMessage("Type3"),
    "p"=>GetMessage("Type0"),
);

$arTemplateParameters = array(
    "SLIDER_ABOUT_TITLE" => Array(
        "NAME" => GetMessage("SLIDER_ABOUT_TITLE"),
        "PARENT" => "BASE",
        "TYPE" => "STRING",
        "DEFAULT" => GetMessage("SLIDER_ABOUT_TITLE_DEFAULT"),
    ),
    "TITLE_TYPE" => Array(
        "NAME" => GetMessage("TITLE_TYPE"),
        "PARENT" => "BASE",
        "TYPE" => "LIST",
        "DEFAULT" => "p",
        "VALUES" => $arType1,
    ),
    "PADDING_TOP" => Array(
        "NAME" => GetMessage("PADDING_TOP"),
        "PARENT" => "BASE",
        "TYPE" => "CHECKBOX",
        "DEFAULT" => "N",
    ),
    "HEIGHT_OF_AUTHOR_BLOCK" => Array(
        "NAME" => GetMessage("HEIGHT_OF_AUTHOR_BLOCK"),
        "PARENT" => "BASE",
        "TYPE" => "LIST",
        "DEFAULT" => "1",
        "VALUES" => Array (
            "1"=>GetMessage("1STRING"),
            "2"=>GetMessage("2STRING"),
        ),
    ),
    "BACKGROUND_IMAGE" => Array(
        "NAME" => GetMessage("BACKGROUND_IMAGE"),
        "PARENT" => "BASE",
        "TYPE" => "STRING",
        "DEFAULT" => "/local/templates/startup/components/bitrix/news.list/quotes/img/bg.jpg",
    ),

);
?>