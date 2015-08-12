<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>

<?if($arParams['CSS_PRESET'] == "blue"):?>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/assets/css/presets/blue.css');?>
<?elseif($arParams['CSS_PRESET'] == "red"):?>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/assets/css/presets/red.css');?>
<?elseif($arParams['CSS_PRESET'] == "mblue"):?>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/assets/css/presets/mblue.css');?>
<?endif?>


