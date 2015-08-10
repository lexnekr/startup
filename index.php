<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Startup - Простой и динамичный шаблон для 1С-Битрикс Стартапа или Сервиса");
?>

<?$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    Array(
        "AREA_FILE_SHOW" => "sect",
        "EDIT_TEMPLATE" => "",
        "AREA_FILE_SUFFIX" => "slide_1",
        "AREA_FILE_RECURSIVE" => "Y"
    )
);?>

<?$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    Array(
        "AREA_FILE_SHOW" => "sect",
        "EDIT_TEMPLATE" => "",
        "AREA_FILE_SUFFIX" => "slide_2",
        "AREA_FILE_RECURSIVE" => "Y"
    )
);?>

<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "about-preson-slider",
    array(
        "COMPONENT_TEMPLATE" => "about-preson-slider",
        "IBLOCK_TYPE" => "startup",
        "IBLOCK_ID" => "STARTUP_PERSONS",
        "NEWS_COUNT" => "20",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_ORDER1" => "DESC",
        "SORT_BY2" => "SORT",
        "SORT_ORDER2" => "ASC",
        "PROPERTY_CODE" => array(
            0 => "EMAIL",
            1 => "POSITION",
            2 => "RESUME_LINK",
            3 => "RESUME",
        ),
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "SET_TITLE" => "N",
        "SET_BROWSER_TITLE" => "N",
        "SET_META_KEYWORDS" => "NY",
        "SET_META_DESCRIPTION" => "N",
        "SET_LAST_MODIFIED" => "N",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "about",
        "INCLUDE_SUBSECTIONS" => "Y",
        "SLIDER_ABOUT_TITLE" => "<span>О нас</span>",
        "BACKGROUND_IMAGE" => "/local/templates/startup/components/bitrix/news.list/about-preson-slider/img/bg-1.jpg",
        "PADDING_TOP" => "N"
    ),
    false
);?>

<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "portfolio-list",
    array(
        "COMPONENT_TEMPLATE" => "portfolio-list",
        "IBLOCK_TYPE" => "startup",
        "IBLOCK_ID" => "STARTUP_PORTFOLIO",
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
        "SLIDER_ABOUT_TITLE" => "<span>Наше</span> портфолио",
        "PADDING_TOP" => "N",
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

<?$APPLICATION->IncludeComponent(
    "coffeediz:why-list",
    ".default",
    array(
        "COMPONENT_TEMPLATE" => ".default",
        "IBLOCK_TYPE" => "startup",
        "IBLOCK_ID" => "STARTUP_WHY",
        "NEWS_COUNT" => "20",
        "PARENT_SECTION_LEFT" => "",
        "PARENT_SECTION_CODE_LEFT" => "main-left",
        "PARENT_SECTION_RIGHT" => "",
        "PARENT_SECTION_CODE_RIGHT" => "main-right",
        "SLIDER_ABOUT_TITLE" => "Почему <span>Наше</span> Решение?",
        "PADDING_TOP" => "N",
        "BACKGROUND_IMAGE" => "/local/components/coffeediz/why-list/img/bg.jpg",
        "CENTRAL_IMAGE" => "/local/components/coffeediz/why-list/img/central.png"
    ),
    false
);?>

<?$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    Array(
        "AREA_FILE_SHOW" => "sect",
        "EDIT_TEMPLATE" => "",
        "AREA_FILE_SUFFIX" => "slide_3",
        "AREA_FILE_RECURSIVE" => "Y"
    )
);?>

<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "blog",
    array(
        "COMPONENT_TEMPLATE" => "blog",
        "IBLOCK_TYPE" => "startup",
        "IBLOCK_ID" => "STARTUP_BLOG",
        "NEWS_COUNT" => "20",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_ORDER1" => "DESC",
        "SORT_BY2" => "SORT",
        "SORT_ORDER2" => "ASC",
        "PROPERTY_CODE" => array(
            0 => "VIDEO_URL",
            1 => "SLIDER_PREVIEW_PICTURE",
        ),
        "SET_TITLE" => "N",
        "SET_BROWSER_TITLE" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_LAST_MODIFIED" => "N",
        "CHECK_DATES" => "Y",
        "DETAIL_URL" => "/blog/#ELEMENT_ID#/",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "LIST_TITLE" => "<span>Наш</span> Блог",
        "TITLE_TYPE" => "h2",
        "LIST_PADDING_TOP" => "N"
    ),
    false
);?>

<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "team-preson-slider",
    array(
        "COMPONENT_TEMPLATE" => "about-preson-slider",
        "IBLOCK_TYPE" => "startup",
        "IBLOCK_ID" => "STARTUP_PERSONS",
        "NEWS_COUNT" => "20",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_ORDER1" => "DESC",
        "SORT_BY2" => "SORT",
        "SORT_ORDER2" => "ASC",
        "PROPERTY_CODE" => array(
            0 => "",
            1 => "FACEBOOK_LINK",
            2 => "GOOGLEPLUS_LINK",
            3 => "TWITTER_LINK",
            4 => "YOUTUBE_LINK",
            5 => "VK_LINK",
            6 => "ODNOKLASSNII_LINK",
            7 => "",
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
        "PARENT_SECTION_CODE" => "team",
        "INCLUDE_SUBSECTIONS" => "Y",
        "SLIDER_ABOUT_TITLE" => "<span>Наша</span> Команда",
        "PADDING_TOP" => "N",
        "TITLE_TYPE" => "p",
    ),
    false
);?>

<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "quotes",
    array(
        "COMPONENT_TEMPLATE" => "quotes",
        "IBLOCK_TYPE" => "startup",
        "IBLOCK_ID" => "5",
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
        "SLIDER_ABOUT_TITLE" => "Отзывы наших Клиентов",
        "TITLE_TYPE" => "p",
        "PADDING_TOP" => "N",
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
        "IBLOCK_TYPE" => "startup",
        "IBLOCK_ID" => "STARTUP_BRANDS",
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