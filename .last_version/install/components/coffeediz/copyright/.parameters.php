<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
CModule::IncludeModule('coffeediz.startup'); 
$license = new CoffeeStartupLicense();
$T = $license->Type();
if ($T == "E") {
 $COPYRIGHT_name = GetMessage("COPYRIGHT_name_ERROR");
 $COPYRIGHT_value = Array("ERROR" => GetMessage("COPYRIGHT_name_ERROR"));
}
elseif ($T == "F") {
 $COPYRIGHT_name = GetMessage("COPYRIGHT_name");
 $COPYRIGHT_value = Array("FREE" => GetMessage("COPYRIGHT_FREE"));
}
elseif ($T == "C") {
 $COPYRIGHT_name = GetMessage("COPYRIGHT_name");
 $COPYRIGHT_value = Array(
	"FREE" => GetMessage("COPYRIGHT_FREE"),
	"COFFEE" => GetMessage("COPYRIGHT_COFFEE"),
	"GRAYGRIDS" => GetMessage("COPYRIGHT_GRAYGRIDS"),
	"NONE" => GetMessage("COPYRIGHT_NONE"),
	"CUSTOME" => GetMessage("COPYRIGHT_CUSTOME"),
 );
}

$arComponentParameters = array(
	"GROUPS" => array(
		"MAIN_PARAMS" => array(
			"SORT" => 100,
			"NAME" => GetMessage("MAIN_PARAMS"),
		),
	),
	"PARAMETERS"  =>  array(
        "COPYRIGHT" => array(
            "PARENT" => "MAIN_PARAMS",
            "NAME" => $COPYRIGHT_name,
            "TYPE" => "LIST",
			"REFRESH" => "Y",
			"VALUES" => $COPYRIGHT_value
        ),
	)
);

if ($arCurrentValues["COPYRIGHT"] == "CUSTOME") {
	$arComponentParameters["PARAMETERS"]["CUSTOME_COPYRIGHT"] = array(
		"PARENT" => "MAIN_PARAMS",
		"NAME" => GetMessage("CUSTOME_COPYRIGHT_NAME"),
		"TYPE" => "STRING",
		"DEFAULT" => GetMessage("CUSTOME_COPYRIGHT_TEXT")
	);
}