<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/install/wizard_sol/wizard.php");

class license extends CWizardStep
{
    function InitStep()
    {
        $this->SetTitle(GetMessage("wiz_license_title"));
        $this->SetStepID("license");
        $this->SetNextStep("SelectSiteStep");
        $this->SetNextCaption(GetMessage("wiz_install"));
        $this->SetPrevCaption(GetMessage("wiz_uninstall"));
        $wizard =& $this->GetWizard();
        $wizard->SetDefaultVars(
            Array(
                "siteCopyright" => GetMessage("wisCopyright"),
            )
        );
    }

    function ShowStep()
    {

        $this->content .= '<h1>'.GetMessage("wiz_license_title").'</h1>';
        $this->content .= GetMessage("wiz_license_text");
        $this->content .= $this->ShowCheckboxField("license", "yes", array("id"=>"license")).' <label for="license">'.GetMessage("wiz_license_mess").'</label>';
    }

    function OnPostForm()
    {
        $wizard =& $this->GetWizard();

        $license = $wizard->GetVar("license");
        if ($license != "yes") $this->SetError(GetMessage("wiz_license_error"), "license");

        $wizard->SetVar("siteCopyright", GetMessage("wisCopyright"));
    }

}

class SelectSiteStep extends CSelectSiteWizardStep
{
    function InitStep()
    {
        parent::InitStep();
        $wizard =& $this->GetWizard();
        $this->SetStepID("SelectSiteStep");
        $this->SetNextStep("ColorTheme");
        $this->SetPrevStep("license");
        $this->SetNextCaption(GetMessage("wiz_install"));
        $this->SetPrevCaption(GetMessage("wiz_uninstall"));
        $wizard->solutionName = "Startup";
    }
}


class SelectColorThemeStep extends CWizardStep
{
    function InitStep()
    {
        $this->SetTitle(GetMessage("wiz_ColorTheme_title"));
        $this->SetStepID("ColorTheme");
        $this->SetNextStep("PageView");
        $this->SetPrevStep("SelectSiteStep");
        $this->SetNextCaption(GetMessage("wiz_install"));
        $this->SetPrevCaption(GetMessage("wiz_uninstall"));
        $wizard =& $this->GetWizard();
        $wizard->SetDefaultVars(
            Array(
                "ColorTheme" => "",
            )
        );
    }

    function ShowStep()
    {

        $this->content .= '
<table cellpadding="5" cellspacing="5" align="center" style="text-align: center;">
<tbody>
<tr>
	<td>
		<label for="default">'.CFile::ShowImage("/bitrix/wizards/coffeediz/Startup/images/ColorTheme/default.jpg", 167, 100, "border=0 vspace=15").'</label>
	</td>
	<td>
		<label for="blue">'.CFile::ShowImage("/bitrix/wizards/coffeediz/Startup/images/ColorTheme/blue.jpg", 167, 100, "border=0 vspace=15").'</label>
	</td>
	<td>
		<label for="red">'.CFile::ShowImage("/bitrix/wizards/coffeediz/Startup/images/ColorTheme/red.jpg", 167, 100, "border=0 vspace=15").'</label>
	</td>
	<td>
		<label for="mblue">'.CFile::ShowImage("/bitrix/wizards/coffeediz/Startup/images/ColorTheme/mblue.jpg", 167, 100, "border=0 vspace=15").'</label>
	</td>
</tr>
<tr>
	<td>
		<label for="default">'.GetMessage("wiz_ColorTheme_default").'</label>
	</td>
	<td>
		<label for="blue">'.GetMessage("wiz_ColorTheme_blue").'</label>
	</td>
	<td>
		<label for="red">'.GetMessage("wiz_ColorTheme_red").'</label>
	</td>
	<td>
		<label for="mblue">'.GetMessage("wiz_ColorTheme_mblue").'</label>
	</td>
</tr>
<tr>
	<td>
		'.$this->ShowRadioField("ColorTheme", "", array("id" => "default")).'
	</td>
	<td>
		'.$this->ShowRadioField("ColorTheme", "blue", array("id" => "blue")).'
	</td>
	<td>
		'.$this->ShowRadioField("ColorTheme", "red", array("id" => "red")).'
	</td>
	<td>
		'.$this->ShowRadioField("ColorTheme", "mblue", array("id" => "mblue")).'
	</td>
</tr>

<tr>
	<td>
		<label for="lgreen">'.CFile::ShowImage("/bitrix/wizards/coffeediz/Startup/images/ColorTheme/lgreen.jpg", 167, 110, "border=0 vspace=15").'</label>
	</td>
	<td>
		<label for="purple">'.CFile::ShowImage("/bitrix/wizards/coffeediz/Startup/images/ColorTheme/purple.jpg", 167, 110, "border=0 vspace=15").'</label>
	</td>
	<td>
		<label for="orange">'.CFile::ShowImage("/bitrix/wizards/coffeediz/Startup/images/ColorTheme/orange.jpg", 167, 110, "border=0 vspace=15").'</label>
	</td>
	<td>
		<label for="coffee">'.CFile::ShowImage("/bitrix/wizards/coffeediz/Startup/images/ColorTheme/coffee.jpg", 167, 110, "border=0 vspace=15").'</label>
	</td>
</tr>
<tr>
	<td>
		<label for="lgreen">'.GetMessage("wiz_ColorTheme_lgreen").'</label>
	</td>
	<td>
		<label for="purple">'.GetMessage("wiz_ColorTheme_purple").'</label>
	</td>
	<td>
		<label for="orange">'.GetMessage("wiz_ColorTheme_orange").'</label>
	</td>
	<td>
		<label for="coffee">'.GetMessage("wiz_ColorTheme_coffee").'</label>
	</td>
</tr>
<tr>
	<td>
		'.$this->ShowRadioField("ColorTheme", "lgreen", array("id" => "lgreen")).'
	</td>
	<td>
		'.$this->ShowRadioField("ColorTheme", "purple", array("id" => "purple")).'
	</td>
	<td>
		'.$this->ShowRadioField("ColorTheme", "orange", array("id" => "orange")).'
	</td>
	<td>
		'.$this->ShowRadioField("ColorTheme", "coffee", array("id" => "coffee")).'
	</td>
</tr>
</tbody>
</table>
';

    }

    function OnPostForm()
    {
        $wizard =& $this->GetWizard();
        $ColorTheme = $wizard->GetVar("ColorTheme");
        $wizard->SetVar("result", $ColorTheme);
    }

}


class SelectPageViewStep extends CWizardStep
{
    function InitStep()
    {
        $this->SetTitle(GetMessage("wiz_PageView_title"));
        $this->SetStepID("PageView");
        $this->SetNextStep("SchemaOrgStep");
        $this->SetPrevStep("ColorTheme");
        $this->SetNextCaption(GetMessage("wiz_install"));
        $this->SetPrevCaption(GetMessage("wiz_uninstall"));
        $wizard =& $this->GetWizard();
        $wizard->SetDefaultVars(
            Array(
                "PageView" => "longread",
            )
        );
    }

    function ShowStep()
    {

        $this->content .= '
<table cellpadding="5" cellspacing="5" align="center" style="text-align: center;">
<tbody>
<tr>
	<td>
		'.CFile::ShowImage("/bitrix/wizards/coffeediz/Startup/images/ru/longread.png", 128, 300, "border=0 vspace=15").'
	</td>
	<td>
		'.CFile::ShowImage("/bitrix/wizards/coffeediz/Startup/images/ru/pages.png", 461, 300, "border=0 vspace=15").'
	</td>
</tr>
<tr>
	<td>
		'.GetMessage("wiz_longread").'
	</td>
	<td>
		'.GetMessage("wiz_pages").'
	</td>
</tr>
<tr>
	<td>
		'.$this->ShowRadioField("PageView", "longread").'
	</td>
	<td>
		'.$this->ShowRadioField("PageView", "pages").'
	</td>
</tr>
</tbody>
</table>
';


    }

    function OnPostForm()
    {
        $wizard =& $this->GetWizard();
        $PageView = $wizard->GetVar("PageView");
        $wizard->SetVar("result", $PageView);
    }

}

class SchemaOrgStep extends CWizardStep
{
    function InitStep()
    {
        $this->SetTitle(GetMessage("wiz_chemaOrg_title"));
        $this->SetStepID("SchemaOrgStep");
        $this->SetNextStep("data_install");
        $this->SetPrevStep("SelectPageViewStep");
        $this->SetNextCaption(GetMessage("wiz_install"));
        $this->SetPrevCaption(GetMessage("wiz_uninstall"));
        $wizard =& $this->GetWizard();
        $wiz_SchemaOrgAdress_settings_LOGO = "/bitrix/modules/coffeediz.startup/install/wizards/coffeediz/Startup/site/templates/startup/assets/img/logo.png";
        $wizard->SetDefaultVars(
            Array(
                "wiz_SchemaOrg_settings_checkbox" => "Y",
                "SchemaOrgAdress" => "",
                "wiz_SchemaOrgAdress_settings_Name" => GetMessage("wiz_SchemaOrgAdress_settings_Name_Text"),
                "wiz_SchemaOrgAdress_settings_POST_CODE" => GetMessage("wiz_SchemaOrgAdress_settings_POST_CODE_Default"),
                "wiz_SchemaOrgAdress_settings_COUNTRY" => GetMessage("wiz_SchemaOrgAdress_settings_COUNTRY_Default"),
                "wiz_SchemaOrgAdress_settings_REGION" => GetMessage("wiz_SchemaOrgAdress_settings_REGION_Default"),
                "wiz_SchemaOrgAdress_settings_LOCALITY" => GetMessage("wiz_SchemaOrgAdress_settings_LOCALITY_Default"),
                "wiz_SchemaOrgAdress_settings_ADDRESS" => GetMessage("wiz_SchemaOrgAdress_settings_ADDRESS_Default"),
                "wiz_SchemaOrgAdress_settings_PHONE" => GetMessage("wiz_SchemaOrgAdress_settings_PHONE_Default"),
                "wiz_SchemaOrgAdress_settings_FAX" => GetMessage("wiz_SchemaOrgAdress_settings_FAX_Default"),
                "wiz_SchemaOrgAdress_settings_SITE" => GetMessage("wiz_SchemaOrgAdress_settings_SITE_Default"),
                "wiz_SchemaOrgAdress_settings_EMAIL" => GetMessage("wiz_SchemaOrgAdress_settings_EMAIL_Default"),
                "wiz_SchemaOrgAdress_settings_TAXID" => GetMessage("wiz_SchemaOrgAdress_settings_TAXID_Default"),
                "wiz_SchemaOrgAdress_settings_DESCRIPTION" => GetMessage("wiz_SchemaOrgAdress_settings_DESCRIPTION_Default"),
                "wiz_SchemaOrgAdress_settings_LOGO" => $wiz_SchemaOrgAdress_settings_LOGO,
                "wiz_SchemaOrgBreadcrumb_settings_checkbox" => "Y",
                "wiz_SchemaOrgPerson_settings_checkbox" => "Y",

                            )
        );
    }

    function ShowStep()
    {
        $wizard =& $this->GetWizard();
        $wiz_SchemaOrgAdress_settings_LOGO = $wizard->GetVar("wiz_SchemaOrgAdress_settings_LOGO", true);

        $wiz_SchemaOrgAdress_settings_TYPEs = array(
            "" => GetMessage("wiz_SchemaOrgAdress_settings_TYPE_default_none"),
            "LocalBusiness" => GetMessage("wiz_SchemaOrgAdress_settings_TYPE_default_LocalBusiness"),
            "EducationalOrganization" => GetMessage("wiz_SchemaOrgAdress_settings_TYPE_default_EducationalOrganization"),
            "PerformingGroup" => GetMessage("wiz_SchemaOrgAdress_settings_TYPE_default_PerformingGroup"),
            "Airline" => GetMessage("wiz_SchemaOrgAdress_settings_TYPE_default_Airline"),
            "Corporation" => GetMessage("wiz_SchemaOrgAdress_settings_TYPE_default_Corporation"),
            "GovernmentOrganization" => GetMessage("wiz_SchemaOrgAdress_settings_TYPE_default_GovernmentOrganization"),
            "NGO" => GetMessage("wiz_SchemaOrgAdress_settings_TYPE_default_NGO"),
            "SportsOrganization" => GetMessage("wiz_SchemaOrgAdress_settings_TYPE_default_SportsOrganization"),
        );

        $this->content .= '<h1>'.GetMessage("wiz_SchemaOrgTitle").'</h1>';
        $this->content .= $this->ShowCheckboxField("wiz_SchemaOrg_settings_checkbox", "Y", Array("id" => "wiz_SchemaOrg_settings_checkbox")).GetMessage("wiz_Yes");
        $this->content .= '
<script>
    document.getElementById("wiz_SchemaOrg_settings_checkbox").onchange = function(){
        if (this.checked) {
             document.getElementById("wiz_SchemaOrg_settings").style.display="block";
        }
        else {
            document.getElementById("wiz_SchemaOrg_settings").style.display="none";
        }
    }
</script>

<style>
.small {
  width: 400px;
}
</style>

<table cellpadding="5" cellspacing="5" align="center">
<tbody>
<tr>
	<td>
	 '.CFile::ShowImage("/bitrix/wizards/coffeediz/Startup/images/ru/schema_org.png", 100, 100, "border=0 vspace=15").'
	</td>
	<td>
	'.GetMessage("wiz_SchemaOrg_Text_1").'
	</td>
</tr>
<tr>
    <td colspan="2">
    <iframe width="640" height="360" frameborder="0" src="//video.yandex.ru/iframe/yacinema/7xkus6z1gj.3412/?player-type=custom&amp;show-info=false&amp;show-logo=false&amp;hd=1"></iframe>
    </td>
</tr>
<tr>
    <td colspan="2">
    <h1 style="color:red;">'.GetMessage("wiz_SchemaOrg_Text_2").'</h1>
    </td>
</tr>
</tbody>
</table>

    <table align="center" border="1" cellpadding="5" id="wiz_SchemaOrg_settings">
        <tbody>
            <tr>
                <th colspan="2">
                    <h1 style="color:red;">'.GetMessage("wiz_SchemaOrg_settings_title").'</h1>
                </th>
            </tr>
            <tr>
                <td>
                    '.$this->ShowCheckboxField("wiz_SchemaOrgAdress_settings_checkbox", "Y", Array("id" => "wiz_SchemaOrgAdress_settings_checkbox")).GetMessage("wiz_SchemaOrgAdress_settings_edit").'
                </td>
                <td id="wiz_SchemaOrgAdress_settings" style="display: none;">
                    <script>
                        document.getElementById("wiz_SchemaOrgAdress_settings_checkbox").onchange = function(){
                            if (this.checked) {
                                 document.getElementById("wiz_SchemaOrgAdress_settings").style.display="block";
                            }
                            else {
                                document.getElementById("wiz_SchemaOrgAdress_settings").style.display="none";
                            }
                        }
                    </script>
                        '.GetMessage("wiz_SchemaOrgAdress_settings_Name_Text").'<br>'.$this->ShowInputField('text', 'wiz_SchemaOrgAdress_settings_Name', array("id" => "wiz_SchemaOrgAdress_settings_Name", "class" => "wizard-field small")).'
                        <br>
                        '.GetMessage("wiz_SchemaOrgAdress_settings_TYPE_Text").'<br>'.$this->ShowSelectField("wiz_SchemaOrgAdress_settings_TYPE", $wiz_SchemaOrgAdress_settings_TYPEs, Array("id" => "wiz_SchemaOrgAdress_settings_TYPE")).'
                        <br>
                        '.GetMessage("wiz_SchemaOrgAdress_settings_POST_CODE_Text").'<br>'.$this->ShowInputField('text', 'wiz_SchemaOrgAdress_settings_POST_CODE', array("id" => "wiz_SchemaOrgAdress_settings_POST_CODE", "class" => "wizard-field small")).'
                        <br>
                        '.GetMessage("wiz_SchemaOrgAdress_settings_COUNTRY_Text").'<br>'.$this->ShowInputField('text', 'wiz_SchemaOrgAdress_settings_COUNTRY', array("id" => "wiz_SchemaOrgAdress_settings_COUNTRY", "class" => "wizard-field small")).'
                        <br>
                        '.GetMessage("wiz_SchemaOrgAdress_settings_REGION_Text").'<br>'.$this->ShowInputField('text', 'wiz_SchemaOrgAdress_settings_REGION', array("id" => "wiz_SchemaOrgAdress_settings_REGION", "class" => "wizard-field small")).'
                        <br>
                        '.GetMessage("wiz_SchemaOrgAdress_settings_LOCALITY_Text").'<br>'.$this->ShowInputField('text', 'wiz_SchemaOrgAdress_settings_LOCALITY', array("id" => "wiz_SchemaOrgAdress_settings_LOCALITY", "class" => "wizard-field small")).'
                        <br>
                        '.GetMessage("wiz_SchemaOrgAdress_settings_ADDRESS_Text").'<br>'.$this->ShowInputField('text', 'wiz_SchemaOrgAdress_settings_ADDRESS', array("id" => "wiz_SchemaOrgAdress_settings_ADDRESS", "class" => "wizard-field small")).'
                        <br>
                        '.GetMessage("wiz_SchemaOrgAdress_settings_PHONE_Text").'<br>'.$this->ShowInputField('text', 'wiz_SchemaOrgAdress_settings_PHONE', array("id" => "wiz_SchemaOrgAdress_settings_PHONE", "class" => "wizard-field small")).'
                        <br>
                        '.GetMessage("wiz_SchemaOrgAdress_settings_FAX_Text").'<br>'.$this->ShowInputField('text', 'wiz_SchemaOrgAdress_settings_FAX', array("id" => "wiz_SchemaOrgAdress_settings_FAX", "class" => "wizard-field small")).'
                        <br>
                        '.GetMessage("wiz_SchemaOrgAdress_settings_SITE_Text").'<br>'.$this->ShowInputField('text', 'wiz_SchemaOrgAdress_settings_SITE', array("id" => "wiz_SchemaOrgAdress_settings_SITE", "class" => "wizard-field small")).'
                        <br>
                        '.GetMessage("wiz_SchemaOrgAdress_settings_EMAIL_Text").'<br>'.$this->ShowInputField('text', 'wiz_SchemaOrgAdress_settings_EMAIL', array("id" => "wiz_SchemaOrgAdress_settings_EMAIL", "class" => "wizard-field small")).'
                        <br>
                        '.GetMessage("wiz_SchemaOrgAdress_settings_TAXID_Text").'<br>'.$this->ShowInputField('text', 'wiz_SchemaOrgAdress_settings_TAXID', array("id" => "wiz_SchemaOrgAdress_settings_TAXID", "class" => "wizard-field small")).'
                        <br>
                        '.GetMessage("wiz_SchemaOrgAdress_settings_DESCRIPTION_Text").'<br>'.$this->ShowInputField('textarea', 'wiz_SchemaOrgAdress_settings_DESCRIPTION', array("rows"=>"4", "id" => "wiz_SchemaOrgAdress_settings_DESCRIPTION", "class" => "wizard-field small")).'
                        <br>
                        '.GetMessage("wiz_SchemaOrgAdress_settings_LOGO_Text").'<br>'.CFile::ShowImage($wiz_SchemaOrgAdress_settings_LOGO, 206, 35, "border=0 vspace=15").'
                        <br>
                        '.$this->ShowFileField("wiz_SchemaOrgAdress_settings_LOGO", Array("show_file_info" => "N", "id" => "wiz_SchemaOrgAdress_settings_LOGO")).'

                </td>
            </tr>
            <tr>
                <td>
                    '.$this->ShowCheckboxField("wiz_SchemaOrgBreadcrumb_settings_checkbox", "Y", Array("id" => "wiz_SchemaOrgBreadcrumb_settings_checkbox")).GetMessage("wiz_SchemaOrgBreadcrumb_settings_edit").'
                </td>
            </tr>
            <tr>
                <td>
                    '.$this->ShowCheckboxField("wiz_SchemaOrgPerson_settings_checkbox", "Y", Array("id" => "wiz_SchemaOrgPerson_settings_checkbox")).GetMessage("wiz_SchemaOrgPerson_settings_edit").'
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <h3 style="color:red;">'.GetMessage("wiz_SchemaOrg_settings_PS").'</h3>
                </td>
            </tr>
        </tbody>
	</table>

        ';


    }

    function OnPostForm()
    {
        $wizard =& $this->GetWizard();
        $PageView = $wizard->GetVar("SchemaOrg");
        $wizard->SetVar("result", $PageView);
        $res = $this->SaveFile("wiz_SchemaOrgAdress_settings_LOGO", Array("extensions" => "gif,jpg,jpeg,png", "max_height" => 1900, "max_width" => 1900, "make_preview" => "Y"));
    }

}


class DataInstallStep extends CDataInstallWizardStep
{
    function CorrectServices(&$arServices)
    {
        $wizard =& $this->GetWizard();
        if($wizard->GetVar("installDemoData") != "Y")
        {
        }
    }
}

class FinishStep extends CFinishWizardStep
{
    function InitStep()
    {
        $this->SetStepID("finish");
        $this->SetNextStep("finish");
        $this->SetTitle(GetMessage("FINISH_STEP_TITLE"));
        $this->SetNextCaption(GetMessage("wiz_go"));
    }
    function ShowStep()
    {
        global $USER;
        $wizard =& $this->GetWizard();
        $siteID = WizardServices::GetCurrentSiteID($wizard->GetVar("siteID"));
        if (strlen($siteID) > 0 and is_object($USER) and method_exists($USER, 'GetEmail')) {
            $obSite = new CSite();
            $t = $obSite->Update($siteID, array(
                'EMAIL' => $USER->GetEmail(),
                'NAME' => GetMessage('wiz_site_name'),
                'SERVER_NAME' => $this->getSiteUrl()
            ));
        };
        $rsSites = CSite::GetByID($siteID);
        $siteDir = SITE_DIR;
        if ($arSite = $rsSites->Fetch())
            $siteDir = $arSite["DIR"];
        $wizard->SetFormActionScript(str_replace("//", "/", $siteDir . "/?finish"));
        $this->CreateNewIndex();
        COption::SetOptionString("main", "wizard_solution", $wizard->solutionName, false, $siteID);
        //$this->content .= "<br clear=\"all\"><a href=\"/bitrix/admin/wizard_install.php?lang=".LANGUAGE_ID."&site_id=".$siteID."&wizardName=bitrix:eshop.mobile&".bitrix_sessid_get()."\" class=\"button-next\"><span id=\"next-button-caption\">".GetMessage("wizard_store_mobile")."</span></a>";
        //		$this->content .= GetMessage("FINISH_STEP_COMPOSITE");
        //		$this->content .= '<br/><center><a href="/bitrix/admin/composite.php?lang=ru">'.CFile::ShowImage("/bitrix/wizards/coffeediz/Start_Bootstrap_Landing_Page/images/ru/composite.gif", 600, 250, "border=0 vspace=15").'</a></center>';
        //		$this->content .= '<center><b><a href="/bitrix/admin/composite.php?lang=ru">'.GetMessage("FINISH_STEP_COMPOSITE_LINK").'</a></b></center>';

        //		$this->content .= '<br/><br/><b>'.GetMessage("FINISH_STEP_CONTENT").'</b>';

        if ($wizard->GetVar("installDemoData") == "Y")
            $this->content .= GetMessage("FINISH_STEP_REINDEX");
    }
    function getSiteUrl()
    {
        $PARSE_HOST = parse_url(getenv('HTTP_HOST'));
        if (isset($PARSE_HOST['port']) and $PARSE_HOST['port'] == '80') {
            $HOST = $PARSE_HOST['host'];
        }
        elseif (isset($PARSE_HOST['port']) and $PARSE_HOST['port'] == '443') {
            $HOST = $PARSE_HOST['host'];
        }
        elseif(isset($PARSE_HOST['port'])) {
            $HOST = $PARSE_HOST['host'] . ":" . $PARSE_HOST['port'];
        } else {
            $HOST = $PARSE_HOST['host'];
        }
        return $HOST;
    }
}
?>