<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
if (!defined("WIZARD_SITE_ID"))
    return;
if (!defined("WIZARD_SITE_DIR"))
    return;


require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/update_client_partner.php");

$moduleId = 'coffeediz.schema';
CUpdateClientPartner::LoadModuleNoDemand($moduleId, $strError, "Y", false);

?>