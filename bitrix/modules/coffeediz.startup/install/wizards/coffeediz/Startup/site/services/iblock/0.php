<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();


if(!CModule::IncludeModule("iblock"))
    return;

$iblockXMLFile = WIZARD_SERVICE_RELATIVE_PATH."/xml/".LANGUAGE_ID."/0_slides.xml";
$iblockCode = "STARTUP_SLIDES_".WIZARD_SITE_ID;
$iblockType = "STARTUP";
$rsIBlock = CIBlock::GetList(array(), array("CODE" => $iblockCode, "TYPE" => $iblockType));
$iblockID = false;
if ($arIBlock = $rsIBlock->Fetch())
{
    $iblockID = $arIBlock["ID"];
    if (WIZARD_INSTALL_DEMO_DATA)
    {
        CIBlock::Delete($arIBlock["ID"]);
        $iblockID = false;
    }
}
if($iblockID == false)
{
    $permissions = Array(
        "1" => "X",
        "2" => "R"
    );
    $dbGroup = CGroup::GetList($by = "", $order = "", Array("STRING_ID" => "content_editor"));
    if($arGroup = $dbGroup -> Fetch())
    {
        $permissions[$arGroup["ID"]] = 'W';
    };
    $iblockID = WizardServices::ImportIBlockFromXML(
        $iblockXMLFile,
        "STARTUP_SLIDES",
        $iblockType,
        WIZARD_SITE_ID,
        $permissions
    );
    if ($iblockID < 1)
        return;

    //WizardServices::SetIBlockFormSettings($iblockID, Array ( 'tabs' => GetMessage("W_IB_GROUP_PHOTOG_TAB1").$REAL_PICTURE_PROPERTY_ID.GetMessage("W_IB_GROUP_PHOTOG_TAB2").$rating_PROPERTY_ID.GetMessage("W_IB_GROUP_PHOTOG_TAB3").$vote_count_PROPERTY_ID.GetMessage("W_IB_GROUP_PHOTOG_TAB4").$vote_sum_PROPERTY_ID.GetMessage("W_IB_GROUP_PHOTOG_TAB5").$APPROVE_ELEMENT_PROPERTY_ID.GetMessage("W_IB_GROUP_PHOTOG_TAB6").$PUBLIC_ELEMENT_PROPERTY_ID.GetMessage("W_IB_GROUP_PHOTOG_TAB7"), ));

    //IBlock fields
    $iblock = new CIBlock;
    $arFields = Array(
        "ACTIVE" => "Y",
        "FIELDS" => array ( 'IBLOCK_SECTION' => array ( 'IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '', ), 'ACTIVE' => array ( 'IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => 'Y', ), 'ACTIVE_FROM' => array ( 'IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '=today', ), 'ACTIVE_TO' => array ( 'IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '', ), 'SORT' => array ( 'IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '', ), 'NAME' => array ( 'IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => '', ), 'PREVIEW_PICTURE' => array ( 'IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => array ( 'FROM_DETAIL' => 'N', 'SCALE' => 'N', 'WIDTH' => '', 'HEIGHT' => '', 'IGNORE_ERRORS' => 'N', ), ), 'PREVIEW_TEXT_TYPE' => array ( 'IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => 'text', ), 'PREVIEW_TEXT' => array ( 'IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '', ), 'DETAIL_PICTURE' => array ( 'IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => array ( 'SCALE' => 'N', 'WIDTH' => '', 'HEIGHT' => '', 'IGNORE_ERRORS' => 'N', ), ), 'DETAIL_TEXT_TYPE' => array ( 'IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => 'text', ), 'DETAIL_TEXT' => array ( 'IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '', ), 'XML_ID' => array ( 'IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '', ), 'CODE' => array ( 'IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '', ), 'TAGS' => array ( 'IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '', ), ),
        "CODE" => $iblockCode,
        "XML_ID" => $iblockCode,
        "NAME" => "[".WIZARD_SITE_ID."] ".$iblock->GetArrayByID($iblockID, "NAME")
    );

    $iblock->Update($iblockID, $arFields);
}
else
{
    $arSites = array();
    $db_res = CIBlock::GetSite($iblockID);
    while ($res = $db_res->Fetch())
        $arSites[] = $res["LID"];
    if (!in_array(WIZARD_SITE_ID, $arSites))
    {
        $arSites[] = WIZARD_SITE_ID;
        $iblock = new CIBlock;
        $iblock->Update($iblockID, array("LID" => $arSites));
    }
}

$services_code = '
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"services",
	array(
		"COMPONENT_TEMPLATE" => "services",
		"IBLOCK_TYPE" => "STARTUP",
		"IBLOCK_ID" => "#STARTUP_SLIDE_ID#",
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "ICON",
			1 => "TITLE_SIZE",
			2 => "TITLE_TYPE",
			3 => "LG",
			4 => "MD",
			5 => "SM",
			6 => "XS",
			7 => "LG_OFFSET",
			8 => "MD_OFFSET",
			9 => "SM_OFFSET",
			10 => "LG_PULL_PUSH_TYPE",
			11 => "MD_PULL_PUSH_TYPE",
			12 => "SM_PULL_PUSH_TYPE",
			13 => "LG_PULL_PUSH_VALUE",
			14 => "MD_PULL_PUSH_VALUE",
			15 => "SM_PULL_PUSH_VALUE",
			16 => "BONUS_CONTEINER",
			17 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "Y",
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "services",
		"INCLUDE_SUBSECTIONS" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"SLIDE_LINK_ID" => "services"
	),
	false
);?>
';

$contacts_code = '
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"contacts",
	Array(
		"COMPONENT_TEMPLATE" => "contacts",
		"IBLOCK_TYPE" => "STARTUP",
		"IBLOCK_ID" => "#STARTUP_SLIDE_ID#",
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"PROPERTY_CODE" => array(0=>"ICON",1=>"TITLE_SIZE",2=>"TITLE_TYPE",3=>"LG",4=>"MD",5=>"SM",6=>"XS",7=>"BONUS_CONTEINER",8=>"LG_OFFSET",9=>"MD_OFFSET",10=>"SM_OFFSET",11=>"LG_PULL_PUSH_TYPE",12=>"MD_PULL_PUSH_TYPE",13=>"SM_PULL_PUSH_TYPE",14=>"LG_PULL_PUSH_VALUE",15=>"MD_PULL_PUSH_VALUE",16=>"SM_PULL_PUSH_VALUE",17=>"",),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "Y",
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "contacts",
		"INCLUDE_SUBSECTIONS" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"SLIDE_LINK_ID" => "connected"
	)
);?>
#SCHEMA_ORG_ADRESS_CODE#
<?$APPLICATION->IncludeComponent(
	"bitrix:map.google.view",
	".default",
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"INIT_MAP_TYPE" => "ROADMAP",
		"MAP_DATA" => "a:4:{s:10:\"google_lat\";d:55.75512204628373;s:10:\"google_lon\";d:37.618778362274156;s:12:\"google_scale\";i:15;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:4:\"TEXT\";s:7:\"Company\";s:3:\"LON\";d:37.620234489441;s:3:\"LAT\";d:55.75419204814;}}}",
		"MAP_WIDTH" => "100%",
		"MAP_HEIGHT" => "400",
		"CONTROLS" => array(
			0 => "SMALL_ZOOM_CONTROL",
			1 => "TYPECONTROL",
			2 => "SCALELINE",
		),
		"OPTIONS" => array(
			0 => "ENABLE_SCROLL_ZOOM",
			1 => "ENABLE_DBLCLICK_ZOOM",
			2 => "ENABLE_DRAGGING",
			3 => "ENABLE_KEYBOARD",
		),
		"MAP_ID" => ""
	),
	false
);?>
';

$PageView = $wizard->GetVar("PageView");

if ($PageView == "longread") {
	CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/_index.php", array("CONTACTS_CODE" => $contacts_code));
    CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/_index.php", array("SERVICES_CODE" => $services_code));
    CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/_index.php", array("STARTUP_SLIDE_ID" => $iblockID));

}
elseif ($PageView == "pages") {
	CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/_index.php", array("CONTACTS_CODE" => ""));

	$folderby = $_SERVER["DOCUMENT_ROOT"]."/bitrix/wizards/coffeediz/Startup/site/services/iblock/lang/ru/include/contacts";
	$folderto = WIZARD_SITE_PATH."contacts";
	CopyDirFiles(
		$folderby,
		$folderto,
		$rewrite = true,
		$recursive = true,
		$delete_after_copy = false
	);

    CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/contacts/index.php", array("CONTACTS_CODE" => $contacts_code));
    CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/contacts/index.php", array("STARTUP_SLIDE_ID" => $iblockID));
    CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/_index.php", array("SERVICES_CODE" => $services_code));
    CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/_index.php", array("STARTUP_SLIDE_ID" => $iblockID));
}

?>