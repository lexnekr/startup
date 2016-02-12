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
    $arTemplateParameters["USE_SHARE_VIEW"] = array(
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
    $arTemplateParameters["TWITTER_SITE"] = array(
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