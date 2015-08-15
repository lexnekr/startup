<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

$pricing_code = '
<?$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    Array(
        "AREA_FILE_SHOW" => "sect",
        "EDIT_TEMPLATE" => "",
        "AREA_FILE_SUFFIX" => "slide_4",
        "AREA_FILE_RECURSIVE" => "Y"
    )
);?>
';

$PageView = $wizard->GetVar("PageView");

if ($PageView == "longread") {
	CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/_index.php", array("CONTACTS_CODE" => $pricing_code));

    $strOldFile = $_SERVER["DOCUMENT_ROOT"]."/bitrix/wizards/coffeediz/Startup/site/services/iblock/lang/ru/include/sect_slide_4.php";
    $strNewFile = WIZARD_SITE_PATH."sect_slide_4.php";
    @copy($strOldFile, $strNewFile);
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
}

?>