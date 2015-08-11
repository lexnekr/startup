<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);
?>

<!doctype html>
<html lang="<?=LANGUAGE_ID;?>-<?=strtoupper(LANGUAGE_ID);?>">
<head>
    <meta charset="UTF-8">
    <title><?$APPLICATION->ShowTitle()?></title>
    <?
    $APPLICATION->ShowHead();
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/assets/css/bootstrap.min.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/assets/fonts/font-awesome/font-awesome.min.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/assets/css/style.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/assets/css/responsive.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/assets/css/normalize.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/assets/extras/animate.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/assets/extras/lightbox.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/assets/extras/owl/owl.carousel.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/assets/extras/owl/owl.theme.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/assets/extras/owl/owl.transitions.css');

    CJSCore::Init(array('jquery'));

    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/assets/js/bootstrap.min.js");
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/assets/js/jquery.nav.js");
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/assets/js/owl.carousel.js");
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/assets/js/wow.js");
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/assets/js/jquery.mixitup.js");
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/assets/js/lightbox.min.js");
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/assets/js/scroll-top.js");
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/assets/js/style.changer.js");
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/assets/js/modernizr-2.8.0.main.js");
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/assets/js/main.js");
    ?>

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" data-skip-moving="true"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" data-skip-moving="true"></script>
    <![endif]-->

</head>
<body>
<!-- Start Header Section -->
<header id="header">
    <nav class="main-navigation navbar-fixed-top" role="navigation" data-spy="affix" data-offset-top="200">
        <?$APPLICATION->ShowPanel();?>
        <?$APPLICATION->IncludeComponent(
            "coffeediz:css-preset",
            "startup",
            Array(
            ),
            false
        );?>
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <i class="fa fa-bars fa-lg"></i>
                </button>
                <!-- logo here -->
                <a href="/" class="navbar-brand">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => SITE_TEMPLATE_PATH."/include/logo.php",
                            "EDIT_TEMPLATE" => ""
                        ),
                        false
                    );?>
                </a>
            </div>
            <?$APPLICATION->IncludeComponent("bitrix:menu", "top", Array(
                    "COMPONENT_TEMPLATE" => ".default",
                    "ROOT_MENU_TYPE" => "top",
                    "MENU_CACHE_TYPE" => "N",
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "MENU_CACHE_GET_VARS" => array(
                        0 => "",
                    ),
                    "MAX_LEVEL" => "1",
                    "USE_EXT" => "N",
                    "DELAY" => "N",
                    "ALLOW_MULTI_SELECT" => "N",
                ),
                false
            );?>
        </div>
    </nav>
</header>
<!-- End Header Section -->
