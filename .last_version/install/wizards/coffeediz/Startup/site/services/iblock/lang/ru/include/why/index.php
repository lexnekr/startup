<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Почему мы");
?>
 <?$APPLICATION->IncludeComponent(
	"coffeediz:why-list", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"IBLOCK_TYPE" => "STARTUP",
		"IBLOCK_ID" => "#STARTUP_WHY_ID#",
		"NEWS_COUNT" => "20",
		"PARENT_SECTION_LEFT" => "",
		"PARENT_SECTION_CODE_LEFT" => "main-left",
		"PARENT_SECTION_RIGHT" => "",
		"PARENT_SECTION_CODE_RIGHT" => "main-right",
		"SLIDER_ABOUT_TITLE" => "#SLIDER_ABOUT_TITLE#",
		"PADDING_TOP" => "Y",
		"BACKGROUND_IMAGE" => "/local/components/coffeediz/why-list/img/bg.jpg",
		"CENTRAL_IMAGE" => "/local/components/coffeediz/why-list/img/central.png"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>