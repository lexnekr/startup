<?
$MESS["STARTUP_SCHEMA_ORG_ADRESS"] = '
<?$APPLICATION->IncludeComponent(
	"coffeediz:schema.org.OrganizationAndPlace",
	"",
	Array(
		"ADDRESS" => "#ADDRESS#",
		"COMPONENT_TEMPLATE" => ".default",
		"COUNTRY" => "#COUNTRY#",
		"DESCRIPTION" => "#DESCRIPTION#",
		"EMAIL" => array(0 =>"#EMAIL#"),
		"FAX" => "#FAX#",
		"ITEMPROP" => "",
		"LATITUDE" => "",
		"LOCALITY" => "#LOCALITY#",
		"LOGO" => "#LOGO#",
		"LONGITUDE" => "",
		"NAME" => "#NAME#",
		"OPENING_HOURS_HUMAN" => array(""),
		"OPENING_HOURS_ROBOT" => array(""),
		"PARAM_RATING_SHOW" => "N",
		"PHONE" => array(0 =>"#PHONE#"),
		"POST_CODE" => "#POST_CODE#",
		"REGION" => "#REGION#",
		"SHOW" => "Y",
		"SITE" => "#SITE#",
		"TAXID" => "#TAXID#",
		"TYPE" => "Organization",
		"TYPE_2" => "#TYPE_2#",
		"TYPE_3" => ""
	),
	false,
	array("ACTIVE_COMPONENT" => "#STARTUP_SCHEMA_ORG_ADRESS_ACTIVE#")
);?>
 <?$APPLICATION->IncludeComponent(
	"coffeediz:breadcrumb",
	"coffeediz.data-vocabulary.org",
	Array(
		"COMPONENT_TEMPLATE" => "coffeediz.data-vocabulary.org",
		"PATH" => "",
		"SHOW" => "Y",
		"SITE_ID" => "#SITE_ID#",
		"START_FROM" => "0"
	),
	false,
	array("ACTIVE_COMPONENT" => "#STARTUP_SCHEMA_ORG_BREADCRUMB_ACTIVE#")
);?>
';
?>