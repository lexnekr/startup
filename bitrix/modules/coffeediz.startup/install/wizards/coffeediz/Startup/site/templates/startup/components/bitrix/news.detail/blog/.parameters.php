<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arTemplateParameters = array(
	"DISPLAY_DATE" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_DATE"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"DISPLAY_NAME" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_NAME"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"DISPLAY_PICTURE" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_PICTURE"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"DISPLAY_PREVIEW_TEXT" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_TEXT"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
    "USE_SHARE" => Array(
        "NAME" => GetMessage("USE_SHARE"),
        "TYPE" => "CHECKBOX",
        "DEFAULT" => "Y",
        "VALUE" => "Y",
        "REFRESH" => "Y",
    ),
    "USE_OPEN_GRAPH" => Array(
        "NAME" => GetMessage("USE_OPEN_GRAPH"),
        "TYPE" => "CHECKBOX",
        "DEFAULT" => "Y",
        "VALUE" => "Y",
        "REFRESH" => "Y",
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
    "USE_SCHEMA_ORG_ARTICLE" => Array(
        "NAME" => GetMessage("USE_SCHEMA_ORG_ARTICLE"),
        "TYPE" => "CHECKBOX",
        "DEFAULT" => "Y",
        "VALUE" => "Y",
        "REFRESH" => "Y",
    ),
);

if ($arCurrentValues["USE_SHARE"] == "Y")
{
    $arComponentParameters["PARAMETERS"]["USE_SHARE_VIEW"] = Array(
        "NAME" => GetMessage("USE_SHARE_VIEW"),
        "TYPE" => "LIST",
        "SORT" => 50,
        "VALUES" => array(
            "" => GetMessage("square_c"),
            "_c" => GetMessage("circle"),
        ),
    );
}
if ($arCurrentValues["USE_OPEN_GRAPH"] == "Y")
{
    $arComponentParameters["PARAMETERS"]["TWITTER_SITE"] = Array(
        "NAME" => GetMessage("TWITTER_SITE"),
        "TYPE" => "STRING",
        "MULTIPLE" => "N",
    );
}
if ($arCurrentValues["USE_SCHEMA_ORG_ARTICLE"] == "Y")
{
    $arTemplateParameters["SCHEMA_ORG_ARTICLE_TYPE"] = array(
        "NAME" => GetMessage("SCHEMA_ORG_ARTICLE_TYPE"),
        "TYPE" => "LIST",
        "SORT" => 50,
        "VALUES" => array(
            "" => GetMessage("wizSchemaOrgArticle_settings_TYPE_default"),
            "BlogPosting" => GetMessage("wizSchemaOrgArticle_settings_TYPE_BlogPosting"),
            "NewsArticle" => GetMessage("wizSchemaOrgArticle_settings_TYPE_NewsArticle"),
            "ScholarlyArticle" => GetMessage("wizSchemaOrgArticle_settings_TYPE_ScholarlyArticle"),
            "MedicalScholarlyArticle" => GetMessage("wizSchemaOrgArticle_settings_TYPE_MedicalScholarlyArticle"),
        ),
    );
}

?>
