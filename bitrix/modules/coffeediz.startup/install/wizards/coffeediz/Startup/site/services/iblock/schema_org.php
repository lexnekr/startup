<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

$SchemaOrgAdress_code = GetMessage("STARTUP_SCHEMA_ORG_ADRESS");

$SchemaOrg = $wizard->GetVar("SchemaOrg");

$PageView = $wizard->GetVar("PageView");

if ($PageView == "longread") {
	CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/_index.php", array("SCHEMA_ORG_ADRESS_CODE" => $SchemaOrgAdress_code));
    CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/_index.php", array("STARTUP_SCHEMA_ORG_ADRESS_ACTIVE" => $SchemaOrg));

}
elseif ($PageView == "pages") {
	CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/_index.php", array("SCHEMA_ORG_ADRESS_CODE" => ""));
    CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/contacts/index.php", array("SCHEMA_ORG_ADRESS_CODE" => $SchemaOrgAdress_code));
    CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/contacts/index.php", array("STARTUP_SCHEMA_ORG_ADRESS_ACTIVE" => $SchemaOrg));
}

?>