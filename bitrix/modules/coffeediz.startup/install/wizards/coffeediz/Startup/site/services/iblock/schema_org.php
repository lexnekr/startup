<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if (!defined("WIZARD_SITE_ID"))
    return;
if (!defined("WIZARD_SITE_DIR"))
    return;

$wizard =& $this->GetWizard();
$SchemaOrgAdress_code = GetMessage("STARTUP_SCHEMA_ORG_ADRESS");

$SchemaOrg = $wizard->GetVar("wiz_SchemaOrg_settings_checkbox");
$SchemaOrgBreadcrumb = $wizard->GetVar("wiz_SchemaOrgBreadcrumb_settings_checkbox");
$SchemaOrgPerson = $wizard->GetVar("wiz_SchemaOrgPerson_settings_checkbox");
if ($SchemaOrg == "Y") {
    $SchemaOrgActive = "Y";
    if ($SchemaOrgBreadcrumb == "Y") {
        $SchemaOrgActiveBreadcrumb = "Y";
    }
    else {$SchemaOrgActiveBreadcrumb = "N";}
    if ($SchemaOrgPerson == "Y") {
        $SchemaOrgActivePerson = "Y";
    }
    else {$SchemaOrgActivePerson = "N";}
}
else {
    $SchemaOrgActive = "N";
    $SchemaOrgActiveBreadcrumb = "N";
    $SchemaOrgActivePerson = "N";
}

$wiz_SchemaOrgAdress_settings_LOGO = $wizard->GetVar("wiz_SchemaOrgAdress_settings_LOGO");
if($wiz_SchemaOrgAdress_settings_LOGO>0)
{
    $ff = CFile::GetByID($wiz_SchemaOrgAdress_settings_LOGO);
    if($zr = $ff->Fetch())
    {
        $strOldFile = str_replace("//", "/", WIZARD_SITE_ROOT_PATH."/".(COption::GetOptionString("main", "upload_dir", "upload"))."/".$zr["SUBDIR"]."/".$zr["FILE_NAME"]);
        $strNewFile = WIZARD_SITE_PATH."include/SchemaOrgLogo.png";
        @copy($strOldFile, $strNewFile);
        CFile::Delete($wiz_SchemaOrgAdress_settings_LOGO);
    }
}

CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/sect_footer.php", array(
    "SCHEMA_ORG_ADRESS_CODE" => $SchemaOrgAdress_code,
    "STARTUP_SCHEMA_ORG_ADRESS_ACTIVE" => $SchemaOrgActive,
    "STARTUP_SCHEMA_ORG_BREADCRUMB_ACTIVE" => $SchemaOrgActiveBreadcrumb,
    "ADDRESS" => htmlspecialcharsbx($wizard->GetVar("wiz_SchemaOrgAdress_settings_ADDRESS")),
    "COUNTRY" => htmlspecialcharsbx($wizard->GetVar("wiz_SchemaOrgAdress_settings_COUNTRY")),
    "DESCRIPTION" => htmlspecialcharsbx($wizard->GetVar("wiz_SchemaOrgAdress_settings_DESCRIPTION")),
    "EMAIL" => htmlspecialcharsbx($wizard->GetVar("wiz_SchemaOrgAdress_settings_EMAIL")),
    "FAX" => htmlspecialcharsbx($wizard->GetVar("wiz_SchemaOrgAdress_settings_FAX")),
    "LOCALITY" => htmlspecialcharsbx($wizard->GetVar("wiz_SchemaOrgAdress_settings_LOCALITY")),
    "LOGO" => "/include/SchemaOrgLogo.png",
    "NAME" => htmlspecialcharsbx($wizard->GetVar("wiz_SchemaOrgAdress_settings_Name")),
    "PHONE" => htmlspecialcharsbx($wizard->GetVar("wiz_SchemaOrgAdress_settings_PHONE")),
    "POST_CODE" => htmlspecialcharsbx($wizard->GetVar("wiz_SchemaOrgAdress_settings_POST_CODE")),
    "REGION" => htmlspecialcharsbx($wizard->GetVar("wiz_SchemaOrgAdress_settings_REGION")),
    "SITE" => htmlspecialcharsbx($wizard->GetVar("wiz_SchemaOrgAdress_settings_SITE")),
    "TAXID" => htmlspecialcharsbx($wizard->GetVar("wiz_SchemaOrgAdress_settings_TAXID")),
    "TYPE_2" => htmlspecialcharsbx($wizard->GetVar("wiz_SchemaOrgAdress_settings_TYPE")),
    "SITE_ID" => WIZARD_SITE_ID,
));


$PageView = $wizard->GetVar("PageView");

if ($PageView == "longread") {
    CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/_index.php", array(
        "STARTUP_SCHEMA_ORG_PERSON_ACTIVE" => $SchemaOrgActivePerson,
    ));
}
elseif ($PageView == "pages") {
    CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."about/index.php", array(
        "STARTUP_SCHEMA_ORG_PERSON_ACTIVE" => $SchemaOrgActivePerson,
    ));
    }

?>