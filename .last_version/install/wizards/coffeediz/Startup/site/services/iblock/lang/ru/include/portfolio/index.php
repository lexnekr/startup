<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Портфолио");
?>
<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "portfolio-list",
    array(
        "COMPONENT_TEMPLATE" => "portfolio-list",
        "IBLOCK_TYPE" => "STARTUP",
        "IBLOCK_ID" => "#STARTUP_PORTFOLIO_ID#",
        "NEWS_COUNT" => "20",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_ORDER1" => "DESC",
        "SORT_BY2" => "SORT",
        "SORT_ORDER2" => "ASC",
        "PROPERTY_CODE" => array(
            0 => "",
            1 => "ALTERNATIV_URL",
            2 => "TITILE2",
            3 => "FILTER",
            4 => "",
        ),
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "SET_TITLE" => "N",
        "SET_BROWSER_TITLE" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_LAST_MODIFIED" => "N",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "INCLUDE_SUBSECTIONS" => "Y",
        "SLIDER_ABOUT_TITLE" => "#SLIDER_ABOUT_TITLE#",
        "PADDING_TOP" => "Y",
        "BACKGROUND_IMAGE" => "/local/templates/startup/components/bitrix/news.list/about-preson-slider/img/bg-1.jpg",
        "FILTER_NAME" => "",
        "FIELD_CODE" => array(
            0 => "DETAIL_PICTURE",
            1 => "",
        ),
        "DETAIL_URL" => "",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "VIEW_JSFILTER" => "Y"
    ),
    false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>