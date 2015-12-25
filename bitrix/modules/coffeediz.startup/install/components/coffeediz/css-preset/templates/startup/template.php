<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>

<?if($arParams['CSS_PRESET'] == "blue"):?>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/assets/css/presets/blue.css');?>
<?elseif($arParams['CSS_PRESET'] == "red"):?>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/assets/css/presets/red.css');?>
<?elseif($arParams['CSS_PRESET'] == "mblue"):?>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/assets/css/presets/mblue.css');?>
<?elseif($arParams['CSS_PRESET'] == "lgreen"):?>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/assets/css/presets/lgreen.css');?>
<?elseif($arParams['CSS_PRESET'] == "orange"):?>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/assets/css/presets/orange.css');?>
<?elseif($arParams['CSS_PRESET'] == "purple"):?>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/assets/css/presets/purple.css');?>
<?elseif($arParams['CSS_PRESET'] == "coffee"):?>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/assets/css/presets/coffee.css');?>
<?endif?>


