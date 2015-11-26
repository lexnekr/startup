<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arType1 = Array (
"h1"=>GetMessage("Type1"),
"h2"=>GetMessage("Type2"),
"h3"=>GetMessage("Type3"),
"p"=>GetMessage("Type0"),
);

$arTemplateParameters = array(
    "LIST_TITLE" => Array(
        "NAME" => GetMessage("SLIDER_ABOUT_TITLE"),
        "PARENT" => "LIST_SETTINGS",
        "TYPE" => "STRING",
        "DEFAULT" => GetMessage("SLIDER_ABOUT_TITLE_DEFAULT"),
    ),
    "TITLE_TYPE" => Array(
        "NAME" => GetMessage("TITLE_TYPE"),
        "PARENT" => "LIST_SETTINGS",
        "TYPE" => "LIST",
        "DEFAULT" => "p",
		"VALUES" => $arType1,
    ),
    "DETAIL_TITLE" => Array(
        "NAME" => GetMessage("SLIDER_ABOUT_TITLE"),
        "PARENT" => "DETAIL_SETTINGS",
        "TYPE" => "STRING",
    ),
    "LIST_PADDING_TOP" => Array(
        "NAME" => GetMessage("LIST_PADDING_TOP"),
        "PARENT" => "LIST_SETTINGS",
        "TYPE" => "CHECKBOX",
        "DEFAULT" => "N",
    ),
    "DETAIL_PADDING_TOP" => Array(
        "NAME" => GetMessage("DETAIL_PADDING_TOP"),
        "PARENT" => "DETAIL_SETTINGS",
        "TYPE" => "CHECKBOX",
        "DEFAULT" => "N",
    ),
	"AUTHOR_TITLE" => Array(
		"NAME" => GetMessage("AUTHOR_TITLE"),
		"TYPE" => "STRING",
		"MULTIPLE" => "N",
		"DEFAULT"=> GetMessage("AUTHOR_DEFAULT"),
	),
	"OTHER_ARTICLES_TITLE" => Array(
		"NAME" => GetMessage("OTHER_ARTICLES_TITLE"),
		"TYPE" => "STRING",
		"MULTIPLE" => "N",
		"DEFAULT"=> GetMessage("OTHER_ARTICLES_DEFAULT"),
	),
	"OTHER_NEWS_TITLE" => Array(
		"NAME" => GetMessage("OTHER_NEWS_TITLE"),
		"TYPE" => "STRING",
		"MULTIPLE" => "N",
		"DEFAULT"=> GetMessage("OTHER_NEWS_DEFAULT"),
	),
);
?>