<?$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    Array(
        "AREA_FILE_SHOW" => "sect",
        "EDIT_TEMPLATE" => "",
        "AREA_FILE_SUFFIX" => "footer",
        "AREA_FILE_RECURSIVE" => "Y"
    ),
    false,
    array('HIDE_ICONS' => 'Y')
);?>

<?$APPLICATION->IncludeComponent(
	"coffeediz:copyright", 
	"startup", 
	array(
		"COMPONENT_TEMPLATE" => "startup",
		"COPYRIGHT" => "FREE"
	),
	false
);?>