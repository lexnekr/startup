<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?>

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
		"TITLE_TYPE" => "h1",
		"PADDING_TOP" => "Y",
		"BACKGROUND_IMAGE" => "/local/templates/startup/components/bitrix/news.list/quotes/img/bg.jpg",
		"HEIGHT_OF_AUTHOR_BLOCK" => "2"
	),
	false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>