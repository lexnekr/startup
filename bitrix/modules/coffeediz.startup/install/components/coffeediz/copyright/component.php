<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

CModule::IncludeModule('coffeediz.startup'); 

$Lic = new CoffeeStartupLicense();
$LicType = $Lic->Type();


if ($LicType == "C") {
	switch($arParams["COPYRIGHT"]){
		case "FREE":	$COPYRIGHT = GetMessage("COPYRIGHT_FREE");
		break;
		case "COFFEE":	$COPYRIGHT = GetMessage("COPYRIGHT_COFFEE");
		break;
		case "GRAYGRIDS":	$COPYRIGHT = GetMessage("COPYRIGHT_GRAYGRIDS");
		break;
		case "NONE":	$COPYRIGHT = "";
		break;
		case "CUSTOME":	$COPYRIGHT = $arParams["~CUSTOME_COPYRIGHT"];
		break;
	
		default:		$COPYRIGHT = GetMessage("COPYRIGHT_FREE");
	}
}
elseif ($LicType == "F"){
	$COPYRIGHT = GetMessage("COPYRIGHT_FREE");
}
else {
	$COPYRIGHT = GetMessage("COPYRIGHT_FREE");
}
$APPLICATION->SetPageProperty("CopyRightLink", $COPYRIGHT);
$APPLICATION->ShowProperty("CopyRightLink");


if($this->StartResultCache())
{
 $this->IncludeComponentTemplate();
}

