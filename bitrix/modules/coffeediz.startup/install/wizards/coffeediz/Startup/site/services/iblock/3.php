<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();
if(!CModule::IncludeModule("iblock"))
	return;

	$iblockXMLFile = WIZARD_SERVICE_RELATIVE_PATH."/xml/".LANGUAGE_ID."/3_why.xml";
	$iblockCode = "STARTUP_WHY_".WIZARD_SITE_ID;
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
			"STARTUP_WHY",
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




$why_code = '
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
        "PADDING_TOP" => "N",
        "BACKGROUND_IMAGE" => "/local/components/coffeediz/why-list/img/bg.jpg",
        "CENTRAL_IMAGE" => "/local/components/coffeediz/why-list/img/central.png"
    ),
    false
);?>
';

$PageView = $wizard->GetVar("PageView");

if ($PageView == "longread") {
	CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/_index.php", array("WHY_CODE" => $why_code));
	CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/_index.php", array("STARTUP_WHY_ID" => $iblockID));
	CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/_index.php", array("SLIDER_ABOUT_TITLE" => GetMessage("SLIDER_ABOUT_TITLE")));
}
elseif ($PageView == "pages") {
	CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/_index.php", array("WHY_CODE" => ""));

	$folderby = $_SERVER["DOCUMENT_ROOT"]."/bitrix/wizards/coffeediz/Startup/site/services/iblock/lang/ru/include/why";
	$folderto = WIZARD_SITE_PATH."why";
	CopyDirFiles(
		$folderby,
		$folderto,
		$rewrite = true,
		$recursive = true,
		$delete_after_copy = false
	);

	CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."why/index.php", array("STARTUP_WHY_ID" => $iblockID));
	CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."why/index.php", array("SLIDER_ABOUT_TITLE" => GetMessage("SLIDER_ABOUT_TITLE")));
}

?>