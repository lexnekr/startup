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
		$this->content .= $this->ShowCheckboxField("license", "yes")." Принимаю";
    }

    function OnPostForm()
    {
        $wizard =& $this->GetWizard();

		$license = $wizard->GetVar("license");
		if ($license != "yes") $this->SetError("Вы не приняли лицензионное соглашение", "license");

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
		'.CFile::ShowImage("/bitrix/wizards/coffeediz/Startup/images/ColorTheme/default.jpg", 167, 100, "border=0 vspace=15").'
	</td>
	<td>
		'.CFile::ShowImage("/bitrix/wizards/coffeediz/Startup/images/ColorTheme/blue.jpg", 167, 100, "border=0 vspace=15").'
	</td>
	<td>
		'.CFile::ShowImage("/bitrix/wizards/coffeediz/Startup/images/ColorTheme/red.jpg", 167, 100, "border=0 vspace=15").'
	</td>
	<td>
		'.CFile::ShowImage("/bitrix/wizards/coffeediz/Startup/images/ColorTheme/mblue.jpg", 167, 100, "border=0 vspace=15").'
	</td>
</tr>
<tr>
	<td>
		'.GetMessage("wiz_ColorTheme_default").'
	</td>
	<td>
		'.GetMessage("wiz_ColorTheme_blue").'
	</td>
	<td>
		'.GetMessage("wiz_ColorTheme_red").'
	</td>
	<td>
		'.GetMessage("wiz_ColorTheme_mblue").'
	</td>
</tr>
<tr>
	<td>
		'.$this->ShowRadioField("ColorTheme", "").'
	</td>
	<td>
		'.$this->ShowRadioField("ColorTheme", "blue").'
	</td>
	<td>
		'.$this->ShowRadioField("ColorTheme", "red").'
	</td>
	<td>
		'.$this->ShowRadioField("ColorTheme", "mblue").'
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
		$this->SetNextStep("data_install");
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

		$this->content = '<b>'.GetMessage("wiz_PageView_text").'</b><br>';
		$this->content .= $this->ShowRadioField("PageView", "longread").GetMessage("wiz_longread");
		$this->content .= '<br>';
		$this->content .= $this->ShowRadioField("PageView", "pages").GetMessage("wiz_pages");

    }

    function OnPostForm()
    {
        $wizard =& $this->GetWizard();
        $PageView = $wizard->GetVar("PageView");
        $wizard->SetVar("result", $PageView);
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