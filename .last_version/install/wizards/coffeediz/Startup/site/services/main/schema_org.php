<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
if (!defined("WIZARD_SITE_ID"))
    return;
if (!defined("WIZARD_SITE_DIR"))
    return;


require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/update_client_partner.php");

$moduleId = 'coffeediz.schema';


//thanks for Evgeniy Pedan - INSTALL & UPDATE MarketPlace Module function START
Class mp
{
    Function Inst($MODULE,&$r)
    {
        $res = self::GetModule($MODULE);
        if(stristr($res,"FIN"))
        {
            $r = true;
        }
        elseif(stristr($res,"ERR"))
        {
            AddMessage2Log($res);
            $r = false;
        }
        elseif(stristr($res,"STP"))
        {
            self::Inst($MODULE,$r);
        }
        else
        {}
        if($r)
        {
            if($iModule = CModule::CreateModuleObject($MODULE))
            {
                if(!$iModule->IsInstalled())
                {
                    $iModule->InstallFiles();
                    //$iModule->InstallDB();
                    //$iModule->InstallIblock();
                    RegisterModule($MODULE);
                }
            }
        }
        return $r;
    }
    Function GetModule($MODULE)
    {
        require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php");
        require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/update_client_partner.php");

        @set_time_limit(0);
        ini_set("track_errors", "1");
        ignore_user_abort(true);

        $errorMessage = "";
        $stableVersionsOnly = COption::GetOptionString("main", "stable_versions_only", "Y");
        $queryType = "M";
        $arRequestedModules = Array($MODULE);

        COption::SetOptionString("main", "update_system_update", Date($GLOBALS["DB"]->DateFormatToPHP(CSite::GetDateFormat("FULL")), time()));
        $arUpdatedModulesList = array();
        $loadResult = CUpdateClientPartner::LoadModulesUpdates($errorMessage, $arUpdateDescription, LANG, $stableVersionsOnly, $arRequestedModules, true);

        if ($loadResult == "S")
        {
            $message = "";
            if (isset($arUpdateDescription["DATA"]["#"]["ITEM"]))
            {
                for ($i = 0, $cnt = count($arUpdateDescription["DATA"]["#"]["ITEM"]); $i < $cnt; $i++)
                {
                    if (strlen($message) > 0)
                        $message .= ", ";
                    $message .= $arUpdateDescription["DATA"]["#"]["ITEM"][$i]["@"]["NAME"];
                    if (strlen($arUpdateDescription["DATA"]["#"]["ITEM"][$i]["@"]["VALUE"]) > 0)
                        $message .= " (".$arUpdateDescription["DATA"]["#"]["ITEM"][$i]["@"]["VALUE"].")";
                }
            }

            return "STP0|".$message;
        }
        elseif ($loadResult == "E")
        {
            if (strlen($errorMessage) <= 0)
                $errorMessage = "[CL02] ".GetMessage("SUPC_ME_PACK");
        }
        elseif ($loadResult == "F")
        {
            return "FIN";
        }


        if (StrLen($errorMessage) <= 0)
        {
            $temporaryUpdatesDir = "";
            if (!CUpdateClientPartner::UnGzipArchive($temporaryUpdatesDir, $errorMessage, true))
            {
                $errorMessage .= "[CL02] ".GetMessage("SUPC_ME_PACK").". ";
            }
        }

        if (strlen($errorMessage) <= 0)
        {
            if (!CUpdateClientPartner::CheckUpdatability($temporaryUpdatesDir, $errorMessage))
            {
                $errorMessage .= "[CL03] ".GetMessage("SUPC_ME_CHECK").". ";
            }
        }

        $arStepUpdateInfo = $arUpdateDescription;

        if (StrLen($errorMessage) <= 0)
        {
            if (isset($arStepUpdateInfo["DATA"]["#"]["ERROR"]))
            {
                for ($i = 0, $cnt = count($arStepUpdateInfo["DATA"]["#"]["ERROR"]); $i < $cnt; $i++)
                    $errorMessage .= "[".$arStepUpdateInfo["DATA"]["#"]["ERROR"][$i]["@"]["TYPE"]."] ".$arStepUpdateInfo["DATA"]["#"]["ERROR"][$i]["#"];
            }
        }

        $arItemsUpdated = array();
        $arItemsUpdatedDescr = array();
        if (StrLen($errorMessage) <= 0)
        {
            if (isset($arStepUpdateInfo["DATA"]["#"]["ITEM"]))
            {
                for ($i = 0, $cnt = count($arStepUpdateInfo["DATA"]["#"]["ITEM"]); $i < $cnt; $i++)
                {
                    $arItemsUpdated[$arStepUpdateInfo["DATA"]["#"]["ITEM"][$i]["@"]["NAME"]] = $arStepUpdateInfo["DATA"]["#"]["ITEM"][$i]["@"]["VALUE"];
                    $arItemsUpdatedDescr[$arStepUpdateInfo["DATA"]["#"]["ITEM"][$i]["@"]["NAME"]] = $arStepUpdateInfo["DATA"]["#"]["ITEM"][$i]["@"]["DESCR"];
                }
            }
        }

        if (StrLen($errorMessage) <= 0)
        {
            if (isset($arStepUpdateInfo["DATA"]["#"]["NOUPDATES"]))
            {
                CUpdateClientPartner::ClearUpdateFolder($_SERVER["DOCUMENT_ROOT"]."/bitrix/updates/".$temporaryUpdatesDir);
                return "FIN";
            }
            else
            {
                if (strlen($errorMessage) <= 0)
                {
                    if (!CUpdateClientPartner::UpdateStepModules($temporaryUpdatesDir, $errorMessage))
                    {
                        $errorMessage .= "[CL04] ".GetMessage("SUPC_ME_UPDATE").". ";
                    }
                }

                if (StrLen($errorMessage) > 0)
                {
                    return "ERR".$errorMessage;
                }
                else
                {
                    $res = "STP".count($arItemsUpdated)."|";
                    $bFirst = True;
                    foreach ($arItemsUpdated as $key => $value)
                    {
                        $strModuleDescr = "";
                        if (strlen($arItemsUpdatedDescr[$key]) > 0)
                        {
                            $strModuleDescr = "<br>".htmlspecialcharsback($arItemsUpdatedDescr[$key]);
                            $strModuleDescr = preg_replace("#</?pre>#i", " ", $strModuleDescr);
                            $strModuleDescr = preg_replace("/[\s\n\r]+/", " ", $strModuleDescr);
                            $strModuleDescr = addslashes($strModuleDescr);
                        }
                        $res .= ($bFirst ? "" : ", ").$key.((StrLen($value) > 0) ? " (".$value.")" : "");
                        $bFirst = False;
                    }
                    return $res;
                }
            }
        }
        else
        {
            return "ERR".$errorMessage;
        }

        require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin_after.php");
    }
}
//thanks for Evgeniy Pedan - INSTALL & UPDATE MarketPlace Module function END


//thanks for Evgeniy Pedan - INSTALL & UPDATE MarketPlace Module START
mp::Inst($moduleId);
//thanks for Evgeniy Pedan - INSTALL & UPDATE MarketPlace Module END
?>