<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
if (!defined("WIZARD_SITE_ID"))
    return;
if (!defined("WIZARD_SITE_DIR"))
    return;

// START IMPORT MENU TYPES
$arMenuTypes = GetMenuTypes();
$arMenuTypes["top"] = GetMessage("MAIN_OPT_MENU_TOP");
SetMenuTypes($arMenuTypes, WIZARD_SITE_ID);
// END IMPORT MENU TYPES

$PageView = $wizard->GetVar("PageView");

//START IMPORT MENU FILES
if ($PageView == "longread") {
    $fileby = $_SERVER["DOCUMENT_ROOT"]."/bitrix/wizards/coffeediz/Startup/site/services/main/lang/ru/include/longread.top.menu.php";
    $fileto = WIZARD_SITE_PATH.".top.menu.php";
    @copy($fileby, $fileto);
}
elseif ($PageView == "pages") {
    $fileby = $_SERVER["DOCUMENT_ROOT"]."/bitrix/wizards/coffeediz/Startup/site/services/main/lang/ru/include/pages.top.menu.php";
    $fileto = WIZARD_SITE_PATH.".top.menu.php";
    @copy($fileby, $fileto);
}
//END IMPORT MENU FILES
?>