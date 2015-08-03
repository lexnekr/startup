<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock"))
	return;

$arTypesEx = CIBlockParameters::GetIBlockTypes(array("-"=>" "));

$arIBlocks=array();
$db_iblock = CIBlock::GetList(array("SORT"=>"ASC"), array("SITE_ID"=>$_REQUEST["site"], "TYPE" => ($arCurrentValues["IBLOCK_TYPE"]!="-"?$arCurrentValues["IBLOCK_TYPE"]:"")));
while($arRes = $db_iblock->Fetch())
	$arIBlocks[$arRes["ID"]] = $arRes["NAME"];

$arComponentParameters = array(
	"GROUPS" => array(
		"MAIN_PARAMS" => array(
			"SORT" => 100,
			"NAME" => GetMessage("MAIN_PARAMS"),
		),
	),
	"PARAMETERS"  =>  array(
		"IBLOCK_TYPE" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("T_IBLOCK_DESC_LIST_TYPE"),
			"TYPE" => "LIST",
			"VALUES" => $arTypesEx,
			"DEFAULT" => "news",
			"REFRESH" => "Y",
		),
		"IBLOCK_ID" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("T_IBLOCK_DESC_LIST_ID"),
			"TYPE" => "LIST",
			"VALUES" => $arIBlocks,
			"DEFAULT" => '={$_REQUEST["ID"]}',
			"ADDITIONAL_VALUES" => "Y",
			"REFRESH" => "Y",
		),
		"NEWS_COUNT" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("T_IBLOCK_DESC_LIST_CONT"),
			"TYPE" => "STRING",
			"DEFAULT" => "20",
		),

		"PARENT_SECTION_LEFT" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("IBLOCK_SECTION_ID_LEFT"),
			"TYPE" => "STRING",
			"DEFAULT" => '',
		),
		"PARENT_SECTION_CODE_LEFT" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("IBLOCK_SECTION_CODE_LEFT"),
			"TYPE" => "STRING",
			"DEFAULT" => '',
		),

		"PARENT_SECTION_RIGHT" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("IBLOCK_SECTION_ID_RIGHT"),
			"TYPE" => "STRING",
			"DEFAULT" => '',
		),
		"PARENT_SECTION_CODE_RIGHT" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("IBLOCK_SECTION_CODE_RIGHT"),
			"TYPE" => "STRING",
			"DEFAULT" => '',
		),

		"SLIDER_ABOUT_TITLE" => Array(
			"NAME" => GetMessage("SLIDER_ABOUT_TITLE"),
			"PARENT" => "BASE",
			"TYPE" => "STRING",
			"DEFAULT" => GetMessage("SLIDER_ABOUT_TITLE_DEFAULT"),
		),
		"PADDING_TOP" => Array(
			"NAME" => GetMessage("PADDING_TOP"),
			"PARENT" => "BASE",
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "N",
		),
		"BACKGROUND_IMAGE" => Array(
			"NAME" => GetMessage("BACKGROUND_IMAGE"),
			"PARENT" => "BASE",
			"TYPE" => "STRING",
			"DEFAULT" => "/local/components/coffeediz/why-list/img/bg.jpg",
		),
		"CENTRAL_IMAGE" => Array(
			"NAME" => GetMessage("CENTRAL_IMAGE"),
			"PARENT" => "BASE",
			"TYPE" => "STRING",
			"DEFAULT" => "/local/components/coffeediz/why-list/img/central.png",
		),
	)
);
