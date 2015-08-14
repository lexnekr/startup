<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Îòçûâû");
?>

<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "quotes",
    array(
        "COMPONENT_TEMPLATE" => "quotes",
        "IBLOCK_TYPE" => "STARTUP",
        "IBLOCK_ID" => "#STARTUP_QUOTES_ID#",
        "NEWS_COUNT" => "20",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_ORDER1" => "DESC",
        "SORT_BY2" => "SORT",
        "SORT_ORDER2" => "ASC",
        "FILTER_NAME" => "",
        "FIELD_CODE" => array(
            0 => "",
            1 => "PROPERTY_AUTHOR.PROPERTY_COMPANY",
            2 => "PROPERTY_AUTHOR.PROPERTY_POSITION",
            3 => "PROPERTY_AUTHOR.PREVIEW_PICTURE",
            4 => "PROPERTY_AUTHOR.NAME",
            5 => "",
        ),
        "PROPERTY_CODE" => array(
            0 => "",
            1 => "AUTHOR",
            2 => "",
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
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "qoutes",
        "SLIDER_ABOUT_TITLE" => "#SLIDER_ABOUT_TITLE#",
        "TITLE_TYPE" => "h1",
        "PADDING_TOP" => "Y",
        "BACKGROUND_IMAGE" => "/local/templates/startup/components/bitrix/news.list/quotes/img/bg.jpg",
        "HEIGHT_OF_AUTHOR_BLOCK" => "2"
    ),
    false
);?>

<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "brand_list",
    array(
        "COMPONENT_TEMPLATE" => "brand_list",
        "IBLOCK_TYPE" => "STARTUP",
        "IBLOCK_ID" => "#STARTUP_BRANDS_ID#",
        "NEWS_COUNT" => "20",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_ORDER1" => "DESC",
        "SORT_BY2" => "SORT",
        "SORT_ORDER2" => "ASC",
        "FILTER_NAME" => "",
        "DETAIL_URL" => "",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "PREVIEW_TRUNCATE_LEN" => "",
        "SET_TITLE" => "N",
        "SET_BROWSER_TITLE" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_LAST_MODIFIED" => "N",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "HIDE_LINK_WHEN_NO_DETAIL" => "Y",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "clients",
        "DISPLAY_PICTURE" => "Y"
    ),
    false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>