<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

$SchemaOrgAdress_code = GetMessage("STARTUP_SCHEMA_ORG_ADRESS");

$SchemaOrg = $wizard->GetVar("SchemaOrg");
if ($SchemaOrg == "Y") {
    $SchemaOrgActive = "Y";
}
else {
    $SchemaOrgActive = "N";
}


CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/sect_footer.php", array("STARTUP_SCHEMA_ORG_ADRESS_ACTIVE" => $SchemaOrgActive));


$PageView = $wizard->GetVar("PageView");

if ($PageView == "longread") {
}
elseif ($PageView == "pages") {
}

?>