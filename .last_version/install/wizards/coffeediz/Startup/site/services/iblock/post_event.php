<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if (IsModuleInstalled("form")){

	if(!CModule::IncludeModule("form"))
		return;

	$FORM_SID = "FEEDBACK_FORM_".WIZARD_SITE_ID;
	$rsForm = CForm::GetBySID($FORM_SID);
	$arForm = $rsForm->Fetch();
	
	$FormName = GetMessage('WEBFORM_NAME').' '.WIZARD_SITE_ID;

	if (empty($arForm))
	{

		$arFields = array(
			"NAME"              => $FormName,
			"DESCRIPTION"       => GetMessage('WEBFORM_DESCRIPTION'),
			"SID"               => $FORM_SID,
			"USE_CAPTCHA"		=> "Y",
			"C_SORT"            => 100,
			"BUTTON"            => GetMessage('WEBFORM_BUTTON'),
			"arSITE"            => array(WIZARD_SITE_ID),
			"arMENU"            => array("ru" => GetMessage('WEBFORM_MENU_NAME_RU').' '.WIZARD_SITE_ID, "en" => GetMessage('WEBFORM_MENU_NAME_EN').' '.WIZARD_SITE_ID),
			);

		// ADD NEW WEBFORM
		$NEW_FORM_ID = CForm::Set($arFields);
		//if ($NEW_FORM_ID>0) echo "Добавлена веб-форма с ID=".$NEW_FORM_ID;

		// CREATE ARRAY for QUESTION 1
		$arFields = array( 
			"FORM_ID"              => $NEW_FORM_ID,                     
			"ACTIVE"               => Y,                     
			"TITLE"                => GetMessage('WEBFORM_QUESTION_1_TITLE'),
			"TITLE_TYPE"           => "text",                // тип текста вопроса
			"SID"                  => "FEEDBACK_FORM_NAME",          // символьный идентификатор вопроса
			"C_SORT"               => 100,                   // порядок сортировки
			"ADDITIONAL"           => "N",                   // мы добавляем вопрос веб-формы
			"REQUIRED"             => "Y",                   // ответ на данный вопрос обязателен
			"IN_RESULTS_TABLE"     => "Y",                   // добавить в HTML таблицу результатов
			"IN_EXCEL_TABLE"       => "Y",                   // добавить в Excel таблицу результатов
			"FILTER_TITLE"         => GetMessage('WEBFORM_QUESTION_1_FILTR_NAME'),       // подпись к полю фильтра
			"RESULTS_TABLE_TITLE"  => GetMessage('WEBFORM_QUESTION_1_FILTR_NAME'),       // заголовок столбца фильтра
			"arANSWER"             => array(
				0 => array(
					"MESSAGE"     => GetMessage('WEBFORM_QUESTION_1_ANSWER_TEXT'),                           // параметр ANSWER_TEXT
					"C_SORT"      => 100,                            // порядок фортировки 
					"ACTIVE"      => "Y",                            // флаг активности
					"FIELD_TYPE"  => "text",                        // тип ответа
                    "FIELD_PARAM" => "user",
				),
			),
			
		);

		// ADD NEW QUESTION 1
		$NEW_ID = CFormField::Set($arFields);
		//if ($NEW_ID>0) echo "Добавлен вопрос с ID=".$NEW_ID;
		
		// CREATE ARRAY for QUESTION 2
		$arFields = array( 
			"FORM_ID"              => $NEW_FORM_ID,                     // ID веб-формы
			"ACTIVE"               => Y,                     // флаг активности
			"TITLE"                => GetMessage('WEBFORM_QUESTION_2_TITLE'), // текст вопроса
			"TITLE_TYPE"           => "text",                // тип текста вопроса
			"SID"                  => "FEEDBACK_FORM_EMAIL",          // символьный идентификатор вопроса
			"C_SORT"               => 200,                   // порядок сортировки
			"ADDITIONAL"           => "N",                   // мы добавляем вопрос веб-формы
			"REQUIRED"             => "Y",                   // ответ на данный вопрос обязателен
			"IN_RESULTS_TABLE"     => "Y",                   // добавить в HTML таблицу результатов
			"IN_EXCEL_TABLE"       => "Y",                   // добавить в Excel таблицу результатов
			"FILTER_TITLE"         => GetMessage('WEBFORM_QUESTION_2_FILTR_NAME'),       // подпись к полю фильтра
			"RESULTS_TABLE_TITLE"  => GetMessage('WEBFORM_QUESTION_2_FILTR_NAME'),       // заголовок столбца фильтра
			"arANSWER"             => array(
				0 => array(
					"MESSAGE"     => GetMessage('WEBFORM_QUESTION_2_ANSWER_TEXT'),                           // параметр ANSWER_TEXT
					"C_SORT"      => 100,                            // порядок фортировки 
					"ACTIVE"      => "Y",                            // флаг активности
					"FIELD_TYPE"  => "email",                        // тип ответа
                    "FIELD_PARAM" => "envelope-o",
				),
			),
		);

		// ADD NEW QUESTION 2
		$NEW_ID = CFormField::Set($arFields);
		//if ($NEW_ID>0) echo "Добавлен вопрос с ID=".$NEW_ID;
		
		

		// CREATE ARRAY for QUESTION 3
		$arFields = array( 
			"FORM_ID"              => $NEW_FORM_ID,                     // ID веб-формы
			"ACTIVE"               => Y,                     // флаг активности
			"TITLE"                => GetMessage('WEBFORM_QUESTION_3_TITLE'), // текст вопроса
			"TITLE_TYPE"           => "text",                // тип текста вопроса
			"SID"                  => "FEEDBACK_FORM_PHONE",          // символьный идентификатор вопроса
			"C_SORT"               => 300,                   // порядок сортировки
			"ADDITIONAL"           => "N",                   // мы добавляем вопрос веб-формы
			"REQUIRED"             => "Y",                   // ответ на данный вопрос обязателен
			"IN_RESULTS_TABLE"     => "Y",                   // добавить в HTML таблицу результатов
			"IN_EXCEL_TABLE"       => "Y",                   // добавить в Excel таблицу результатов
			"FILTER_TITLE"         => GetMessage('WEBFORM_QUESTION_3_FILTR_NAME'),       // подпись к полю фильтра
			"RESULTS_TABLE_TITLE"  => GetMessage('WEBFORM_QUESTION_3_FILTR_NAME'),       // заголовок столбца фильтра
			"arANSWER"             => array(
				0 => array(
					"MESSAGE"     => GetMessage('WEBFORM_QUESTION_3_ANSWER_TEXT'),                           // параметр ANSWER_TEXT
					"C_SORT"      => 100,                            // порядок фортировки 
					"ACTIVE"      => "Y",                            // флаг активности
					"FIELD_TYPE"  => "text",                        // тип ответа
                    "FIELD_PARAM" => "phone",
				),
			),
			
		);

		// ADD NEW QUESTION 3
		$NEW_ID = CFormField::Set($arFields);
		//if ($NEW_ID>0) echo "Добавлен вопрос с ID=".$NEW_ID;
		
		
		// CREATE ARRAY for QUESTION 4
		$arFields = array( 
			"FORM_ID"              => $NEW_FORM_ID,                     // ID веб-формы
			"ACTIVE"               => Y,                     // флаг активности
			"TITLE"                => GetMessage('WEBFORM_QUESTION_4_TITLE'), // текст вопроса
			"TITLE_TYPE"           => "text",                // тип текста вопроса
			"SID"                  => "FEEDBACK_FORM_MESSAGE",          // символьный идентификатор вопроса
			"C_SORT"               => 400,                   // порядок сортировки
			"REQUIRED"             => "N",                   // ответ на данный вопрос обязателен
			"arANSWER"             => array(
				0 => array(
					"MESSAGE"     => GetMessage('WEBFORM_QUESTION_4_ANSWER_TEXT'),                           // параметр ANSWER_TEXT
					"C_SORT"      => 100,                            // порядок фортировки 
					"ACTIVE"      => "Y",                            // флаг активности
					"FIELD_TYPE"  => "textarea",                        // тип ответа
					"FIELD_HEIGHT" => 10,
				),
			),		
		);

		// ADD NEW QUESTION 4
		$NEW_ID = CFormField::Set($arFields);
		//if ($NEW_ID>0) echo "Добавлен вопрос с ID=".$NEW_ID;

		
		// CREAT POST EVENT to WebForm
		// ADD NEW POST TEMPLATE
		$arTemplates = CForm::SetMailTemplate($NEW_FORM_ID);
		
		// MODIFIED Email Template to WebForm
		$em = new CEventMessage;
		$arPostFields = Array(
			//"SUBJECT" => GetMessage("MF_EVENT_SUBJECT"),
					"SUBJECT" => GetMessage('WEBFORM_EMAIL_SUBJECT'),
			//"MESSAGE" => GetMessage("MF_EVENT_MESSAGE")
					"MESSAGE" => GetMessage('WEBFORM_EMAIL_TEXT'),
					"EMAIL_TO" => htmlspecialcharsbx($wizard->GetVar("admins_e_mail"))
			);

		$res = $em->Update($arTemplates['0'], $arPostFields);
	//echo "Почтовый шаблон ID=".$arTemplates['0'];
		

		// ADD MODIFIED Email Template to WebForm

		CForm::Set(array("arMAIL_TEMPLATE" => $arTemplates), $NEW_FORM_ID);						

		
		
		// Creat STATUS For Form's RESULT
		
		$arFields = array(
			"FORM_ID"             => $NEW_FORM_ID,
			"C_SORT"              => 100,
			"ACTIVE"              => "Y",
			"TITLE"               => "NEW",
			"DESCRIPTION"         => "",
			"CSS"                 => "",
			"HANDLER_OUT"         => "",
			"HANDLER_IN"          => "",
			"DEFAULT_VALUE"       => "Y",
			"arPERMISSION_VIEW"   => array(2),
			"arPERMISSION_MOVE"   => array(2),
			"arPERMISSION_EDIT"   => array(),
			"arPERMISSION_DELETE" => array(),
		);

		$NEW_STATUS_ID = CFormStatus::Set($arFields);
		//if ($NEW_STATUS_ID>0) echo "Успешно добавлен Статус ID=".$NEW_STATUS_ID;


		
		//ADD WEBFORM TO PAGE
		
	$feedback_form='
<?$APPLICATION->IncludeComponent("bitrix:form", "modal", array(
	"START_PAGE" => "new",
	"SHOW_LIST_PAGE" => "N",
	"SHOW_EDIT_PAGE" => "N",
	"SHOW_VIEW_PAGE" => "N",
	"SUCCESS_URL" => "",
	"WEB_FORM_ID" => #WEBFORM_ON_PAGE_ID#,
	"RESULT_ID" => $_REQUEST[RESULT_ID],
	"SHOW_ANSWER_VALUE" => "N",
	"SHOW_ADDITIONAL" => "N",
	"SHOW_STATUS" => "Y",
	"EDIT_ADDITIONAL" => "N",
	"EDIT_STATUS" => "Y",
	"NOT_SHOW_FILTER" => array(
		0 => "",
		1 => "",
	),
	"NOT_SHOW_TABLE" => array(
		0 => "",
		1 => "",
	),
	"IGNORE_CUSTOM_TEMPLATE" => "N",
	"USE_EXTENDED_ERRORS" => "Y",
	"SEF_MODE" => "N",
	"SEF_FOLDER" => "/",
	"AJAX_MODE" => "Y",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "3600",
	"CHAIN_ITEM_TEXT" => "",
	"CHAIN_ITEM_LINK" => "",
	"NUMBER_OF_LAST_ELEMENT_OF_1_COLL" => "3",
	"SLIDE_LINK_ID" => "#4",
	"BACKGRAUND_IMG" => "#WEBFORM_ON_PAGE_BACKGRAUND_IMG#",
	"TEXT_COLOR" => "#FFFFFF",
	"RESULT_TITLE" => "",
	"RESULT_TEXT" => "",
	"AJAX_OPTION_ADDITIONAL" => "",
	"VARIABLE_ALIASES" => array(
		"action" => "action",
	)
	),
	false
);?>
	';

	}

	
	
}

else {
	$arEventTypes = Array();
	$langs = CLanguage::GetList(($b=""), ($o=""));
	while($language = $langs->Fetch())
	{
		$lid = $language["LID"];
		IncludeModuleLangFile(__FILE__, $lid);
	}

	IncludeModuleLangFile(__FILE__);




	// START ESEY POST TEMPLATE
	$arFilter = Array(
		"TYPE_ID"       => "FEEDBACK_FORM",
		"ACTIVE"        => "Y",
		"SUBJECT"       => GetMessage("MF_EVENT_SUBJECT"),
		);

	$rsMess = CEventMessage::GetList($by="site_id", $order="desc", $arFilter);
	$GetPostTemplateEsey = $rsMess->Fetch();
	if (empty($GetPostTemplateEsey))
	{
		$emess = new CEventMessage;
		$arMessage = Array(
			"EVENT_NAME" => "FEEDBACK_FORM",
			"LID" => WIZARD_SITE_ID,
			"EMAIL_FROM" => "#DEFAULT_EMAIL_FROM#",
			"EMAIL_TO" => "#EMAIL_TO#",
			"SUBJECT" => GetMessage("MF_EVENT_SUBJECT"),
			"MESSAGE" => GetMessage("MF_EVENT_MESSAGE")
		);
		$PostTemplateID = $emess->Add($arMessage);
		//	echo $PostTemplateID;
	}
	else
	{

		$arFilter2 = Array(
			"TYPE_ID"       => "FEEDBACK_FORM",
			"SITE_ID"       => WIZARD_SITE_ID,
			"ACTIVE"        => "Y",
			"SUBJECT"       => GetMessage("MF_EVENT_SUBJECT"),
			);

		$rsMess = CEventMessage::GetList($by="site_id", $order="desc", $arFilter2);
		$GetPostTemplateEseySite = $rsMess->Fetch();


		if (empty($GetPostTemplateEseySite))
		{


			$replacements = array(LID => array($GetPostTemplateEsey['LID'],WIZARD_SITE_ID));
			$GetPostTemplateEseyAdd = array_replace($GetPostTemplateEsey, $replacements);

			$em = new CEventMessage;
//			$PostTemplateIDUp = $em->Update($GetPostTemplateEsey['ID'], $GetPostTemplateEseyAdd); //
            $PostTemplateIDUp = $em->Update($GetPostTemplateEsey['ID'], array("LID" =>$GetPostTemplateEseyAdd['LID']));
		}
		$PostTemplateID=$GetPostTemplateEsey['ID'];
		//	echo $PostTemplateID;
	}
	// END ESEY POST TEMPLATE





	$feedback_form='
	<?$APPLICATION->IncludeComponent("coffeediz:feedback.main", "2_collumns", array(
		"FORM_TITLE" => "#FORM_TITLE#",
		"FORM_TITLE_TYPE" => "H2",
		"FORM_TITLE_SIZE" => "2",
		"USE_CAPTCHA" => "Y",
		"OK_TEXT" => "#OK_TEXT#",
		"EMAIL_TO" => "#MAIL#",
		"USED_FIELDS" => array(
			0 => "NAME",
			1 => "PHONE",
			2 => "EMAIL",
			3 => "MESSAGE",
		),
		"REQUIRED_FIELDS" => array(
			0 => "PHONE",
		),
		"EVENT_MESSAGE_ID" => array(
			0 => "#EMAIL_TEMPLATE_ID#",
		),
		"USE_IN_COMPONENT" => "N",
		"MESSAGE_HIDTH" => "10",
		"BUTTON_MESSAGE" => "#BUTTON_MESSAGE#",
		"PROPERTY_CODE_BUTTON_COLOR" => "btn-warning",
		"NAME_HINT_TITLE" => "#NAME_HINT_TITLE#",
		"NAME_HINT_TEXT" => "#NAME_HINT_TEXT#",
		"EMAIL_HINT_TITLE" => "#EMAIL_HINT_TITLE#",
		"EMAIL_HINT_TEXT" => "email",
		"PHONE_HINT_TITLE" => "#PHONE_HINT_TITLE#",
		"PHONE_HINT_TEXT" => "+7(926)123-45-67",
		"MESSAGE_HINT_TITLE" => "#MESSAGE_HINT_TITLE#",
		"BACKGRAUND_IMG" => "#WEBFORM_ON_PAGE_BACKGRAUND_IMG#",
		"TEXT_COLOR" => "#FFFFFF"
		),
		false
	);?>
	';

	//	CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/_index.php", array("MAIL" => htmlspecialcharsbx($wizard->GetVar("admins_e_mail"))));
};






$PageView = $wizard->GetVar("PageView");
if ($PageView == "longread") {
    $path = WIZARD_SITE_PATH."/_index.php";
    $ClearPath = WIZARD_SITE_PATH."contacts/index.php";
}
elseif ($PageView == "pages") {
    $path = WIZARD_SITE_PATH."contacts/index.php";
    $ClearPath = WIZARD_SITE_PATH."/_index.php";
}



CWizardUtil::ReplaceMacros($path, array("FEEDBACK_FORM" => $feedback_form));
CWizardUtil::ReplaceMacros($ClearPath, array("FEEDBACK_FORM" => ""));

CWizardUtil::ReplaceMacros($path, array(
        "WEBFORM_ON_PAGE_ID" => htmlspecialcharsbx($NEW_FORM_ID),
        "EMAIL_TEMPLATE_ID" => htmlspecialcharsbx($PostTemplateID),
        "MAIL" => htmlspecialcharsbx($wizard->GetVar("admins_e_mail")),
        "MESSAGE_HINT_TITLE" => GetMessage('MESSAGE_HINT_TITLE'),
        "PHONE_HINT_TITLE" => GetMessage('PHONE_HINT_TITLE'),
        "EMAIL_HINT_TITLE" => GetMessage('EMAIL_HINT_TITLE'),
        "NAME_HINT_TEXT" => GetMessage('NAME_HINT_TEXT'),
        "NAME_HINT_TITLE" => GetMessage('NAME_HINT_TITLE'),
        "BUTTON_MESSAGE" => GetMessage('BUTTON_MESSAGE'),
        "OK_TEXT" => GetMessage('OK_TEXT'),
        "FORM_TITLE" => GetMessage('FORM_TITLE'),
        "WEBFORM_ON_PAGE_BACKGRAUND_IMG" => WIZARD_SITE_DIR."include/feedback-bg.jpg",
    )
);


?>