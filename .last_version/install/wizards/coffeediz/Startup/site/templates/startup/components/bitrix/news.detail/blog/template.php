<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<?if($arParams["USE_OPEN_GRAPH"]=="Y"){
    $rsSites = CSite::GetByID(SITE_ID);
    $arSite = $rsSites->Fetch();

    $APPLICATION->IncludeComponent(
        "coffeediz:Open.Graph",
        "",
        Array(
            "COMPONENT_TEMPLATE" => ".default",
            "DESCRIPTION" => $arResult["PREVIEW_TEXT"],
            "IMAGES" => array("http://" . $_SERVER["HTTP_HOST"] . $arResult["DETAIL_PICTURE"]["SRC"]),
            "LOCALE" => "ru_RU",
            "SITE_NAME" => $arSite['SITE_NAME'],
            "TITLE" => $arResult['NAME'],
            "TWITTER_CARD_TYPE" => "summary_large_image",
            "TWITTER_CREATOR" => $arResult['TWITTER_CREATOR'],
            "TWITTER_SITE" => $arResult['TWITTER_SITE'],
            "TYPE" => "article",
            "URL" => "http://" . $_SERVER["HTTP_HOST"] . $arResult['DETAIL_PAGE_URL'],
            "USE_TWITTER" => "Y",
            "VIDEO" => $arResult['PROPERTIES']['VIDEO_URL']['VALUE'],
            "VIDEO_HEIGHT" => "",
            "VIDEO_WIDTH" => ""
        ),
        false,
        array('HIDE_ICONS' => 'Y')
    );
}
?>
<section id="services" <?if($arParams['DETAIL_PADDING_TOP'] == "Y"):?> style="padding-top: 67px;"<?endif;?>>
<div class="container">
<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
    <h1 class="section-title wow fadeIn animated" data-wow-delay=".2s" style="visibility: visible;-webkit-animation-delay: .2s; -moz-animation-delay: .2s; animation-delay: .2s;"><?=$arResult["NAME"]?></h1>
<?endif;?>
<div class="row">
    <?if(!(empty($arResult['OTHER_ARTICLES']) & empty($arResult['PROPERTIES']['HEAD_SIDEBAR']['~VALUE']) & empty($arResult['OTHER_NEWS']) & empty($arResult['PROPERTIES']['FOOTER_SIDEBAR']['~VALUE']) & empty($arResult['AUTHOR']['NAME']))):?>
        <div class="col-md-4" style="float: right;">
            <?if($arParams["USE_SHARE"]=="Y"):?>
                <div class="social_share_icons">
                    <div class="social_share_icon"><img class="social_share" src="/local/templates/startup/components/bitrix/news.detail/blog/images/facebook<?=$arParams['USE_SHARE_VIEW'];?>.png" data-type="fb"></div>
                    <div class="social_share_icon"><img class="social_share" src="/local/templates/startup/components/bitrix/news.detail/blog/images/vk<?=$arParams['USE_SHARE_VIEW'];?>.png" data-type="vk"></div>
                    <div class="social_share_icon"><img class="social_share" src="/local/templates/startup/components/bitrix/news.detail/blog/images/odnoklassniki<?=$arParams['USE_SHARE_VIEW'];?>.png" data-type="ok"></div>
                    <div class="social_share_icon"><img class="social_share" src="/local/templates/startup/components/bitrix/news.detail/blog/images/twitter<?=$arParams['USE_SHARE_VIEW'];?>.png" data-type="tw"></div>
                    <div class="social_share_icon"><img class="social_share" src="/local/templates/startup/components/bitrix/news.detail/blog/images/google_plus<?=$arParams['USE_SHARE_VIEW'];?>.png" data-type="gg"></div>
                    <div class="social_share_icon"><img class="social_share" src="/local/templates/startup/components/bitrix/news.detail/blog/images/livejournal<?=$arParams['USE_SHARE_VIEW'];?>.png" data-type="lj"></div>
                    <div class="social_share_icon"><img class="social_share" src="/local/templates/startup/components/bitrix/news.detail/blog/images/mailru<?=$arParams['USE_SHARE_VIEW'];?>.png" data-type="mr"></div>
                </div>
            <?endif;?>
            <?if(!empty($arResult['PROPERTIES']['HEAD_SIDEBAR']['~VALUE'])):?>
                <?=$arResult['PROPERTIES']['HEAD_SIDEBAR']['~VALUE']['TEXT'];?>
            <?endif;?>
        </div>
    <?endif;?>

    <div class="col-md-<?if(empty($arResult['OTHER_ARTICLES']) & empty($arResult['PROPERTIES']['HEAD_SIDEBAR']['~VALUE']) & empty($arResult['OTHER_NEWS']) & empty($arResult['PROPERTIES']['FOOTER_SIDEBAR']['~VALUE']) & empty($arResult['AUTHOR']['NAME'])):?>12<?else:?>8<?endif;?> wow fadeInUp animated" style="float: left; visibility: visible;">
        <div class="service-box service-box-content">
            <div class="content" style="text-align: left;">
                <div class="icon-wrapper">
                    <i class="fa fa-newspaper-o"></i>
                </div>
                <br>
                <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
                    <div style="text-align: center;" class="col-md-12">
                        <img
                            class="img-responsive"
                            border="0"
                            src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
                            width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
                            height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
                            alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
                            title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
                            />
                    </div>
                <?endif?>
                <?if(!empty($arResult['PROPERTIES']['VIDEO_URL']['VALUE'])):?>
                    <div style="text-align: center;" class="col-md-12">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:player",
                            "",
                            array(
                                "COMPONENT_TEMPLATE" => "",
                                "USE_PLAYLIST" => "N",
                                "PATH" => $arResult['PROPERTIES']['VIDEO_URL']['VALUE'],
                                "WIDTH" => "",
                                "HEIGHT" => "",
                                "PREVIEW" => $arResult['PREVIEW_PICTURE']['SRC'],
                                "ALLOW_SWF" => "N"
                            ),
                            false,
                            array('HIDE_ICONS' => 'Y')
                        );?>
                    </div>
                <?endif;?>
                <?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
                    <span class="news-date-time"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
                <?endif;?>
                <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):?>
                    <p><?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?></p>
                <?endif;?>
                <?if($arResult["NAV_RESULT"]):?>
                    <?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
                    <?echo $arResult["NAV_TEXT"];?>
                    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
                <?elseif(strlen($arResult["DETAIL_TEXT"])>0):?>
                    <?echo $arResult["DETAIL_TEXT"];?>
                <?else:?>
                    <?echo $arResult["PREVIEW_TEXT"];?>
                <?endif?>
                <div style="clear:both"></div>
                <br />
                <?foreach($arResult["FIELDS"] as $code=>$value):
                    if ('PREVIEW_PICTURE' == $code || 'DETAIL_PICTURE' == $code)
                    {
                        ?><?=GetMessage("IBLOCK_FIELD_".$code)?>: <?
                        if (!empty($value) && is_array($value))
                        {
                            ?><img border="0" src="<?=$value["SRC"]?>" width="<?=$value["WIDTH"]?>" height="<?=$value["HEIGHT"]?>"><?
                        }
                    }
                    else
                    {
                        ?><?=GetMessage("IBLOCK_FIELD_".$code)?>: <?=$value;?><?
                    }
                    ?><br />
                <?endforeach;?>


            </div>
        </div>
    </div>



    <?if(!empty($arResult['OTHER_ARTICLES'])):?>
        <div class="col-xs-12 col-md-4 wow fadeInUp animated" style="padding-top: 30px;float: left; visibility: visible;">
            <div class="service-box">
                <div class="content" style="text-align: left;">
                    <div class="icon-wrapper">
                        <i class="fa fa-link"></i>
                    </div>
                    <h3 data-wow-delay=".2s"><?if(!empty($arParams['OTHER_ARTICLES_TITLE'])):?><?=$arParams['OTHER_ARTICLES_TITLE'];?><?else:?><?=GetMessage("OTHER_ARTICLES");?><?endif;?></h3>
                    <ul>
                        <?foreach($arResult['OTHER_ARTICLES'] as $pid=>$arOther_News):?>
                            <li><i class="fa fa-book"></i> <a href="<?=$arOther_News['DETAIL_PAGE_URL'];?>"><?=$arOther_News['NAME'];?></a></li>
                        <?endforeach;?>
                    </ul>
                </div>
            </div>
        </div>
    <?endif;?>

    <?if(!empty($arResult['PROPERTIES']['FOOTER_SIDEBAR']['~VALUE'])):?>
        <div class="col-md-4">
            <?=$arResult['PROPERTIES']['FOOTER_SIDEBAR']['~VALUE']['TEXT'];?>
        </div>
    <?endif;?>

    <?if(!empty($arResult['OTHER_NEWS'])):?>
        <div class="col-xs-12 col-md-4 wow fadeInUp animated" style="padding-top: 30px;float: left; visibility: visible;">
            <div class="service-box">
                <div class="content" style="text-align: left;">
                    <div class="icon-wrapper">
                        <i class="fa fa-link"></i>
                    </div>
                    <h3 data-wow-delay=".2s"><?if(!empty($arParams['OTHER_NEWS_TITLE'])):?><?=$arParams['OTHER_NEWS_TITLE'];?><?else:?><?=GetMessage("OTHER_NEWS");?><?endif;?></h3>
                    <ul>
                        <?foreach($arResult['OTHER_NEWS'] as $pid=>$arOther_News):?>
                            <li><i class="fa fa-arrow-right"></i> <a href="<?=$arOther_News['DETAIL_PAGE_URL'];?>"><?=$arOther_News['NAME'];?></a></li>
                        <?endforeach;?>
                    </ul>
                </div>
            </div>
        </div>
    <?endif;?>

    <?if(!empty($arResult['AUTHOR']['NAME'])):?>
        <div class="col-xs-12 col-md-4 wow fadeInUp animated" style="padding-top: 30px;float: left; visibility: visible;">
            <div class="service-box">
                <div class="content" style="text-align: left;">
                    <div class="icon-wrapper">
                        <i class="fa fa-user"></i>
                    </div>
                    <h3 data-wow-delay=".2s"><?if(!empty($arParams['AUTHOR_TITLE'])):?><?=$arParams['AUTHOR_TITLE'];?><?else:?><?=GetMessage("AUTHOR");?><?endif;?></h3>
                    <?if(!empty($arResult['AUTHOR']["DETAIL_PICTURE"])):?>
                        <img class="img-responsive" src="<?=$arResult['AUTHOR']["DETAIL_PICTURE"]["SRC"]?>" title="<?=$arResult['AUTHOR']["DETAIL_PICTURE"]["TITLE"]?>" alt="<?=$arResult['AUTHOR']["DETAIL_PICTURE"]["TITLE"]?>">
                    <?elseif(!empty($arResult['AUTHOR']["PREVIEW_PICTURE"])):?>
                        <img class="img-responsive" src="<?=$arResult['AUTHOR']["PREVIEW_PICTURE"]["SRC"]?>" title="<?=$arResult['AUTHOR']["PREVIEW_PICTURE"]["TITLE"]?>" alt="<?=$arResult['AUTHOR']["PREVIEW_PICTURE"]["TITLE"]?>">
                    <?endif;?>
                    <h3><?=$arResult['AUTHOR']['NAME']?></h3>
                    <?if(!empty($arResult['AUTHOR']['PROPERTIES']['POSITION']['VALUE'])):?>
                        <p><b><?=$arResult['AUTHOR']['PROPERTIES']['POSITION']['VALUE']?></b></p>
                    <?endif;?>
                    <p><?=$arResult['AUTHOR']['PREVIEW_TEXT']?></p>
                </div>
            </div>
        </div>
    <?endif;?>

    <?if($arParams["USE_SHARE"]=="Y"):?>
    <div class="col-md-4" style="float: right;">
        <div class="social_share_icons">
            <div class="social_share_icon"><img class="social_share" src="/local/templates/startup/components/bitrix/news.detail/blog/images/facebook<?=$arParams['USE_SHARE_VIEW'];?>.png" data-type="fb"></div>
            <div class="social_share_icon"><img class="social_share" src="/local/templates/startup/components/bitrix/news.detail/blog/images/vk<?=$arParams['USE_SHARE_VIEW'];?>.png" data-type="vk"></div>
            <div class="social_share_icon"><img class="social_share" src="/local/templates/startup/components/bitrix/news.detail/blog/images/odnoklassniki<?=$arParams['USE_SHARE_VIEW'];?>.png" data-type="ok"></div>
            <div class="social_share_icon"><img class="social_share" src="/local/templates/startup/components/bitrix/news.detail/blog/images/twitter<?=$arParams['USE_SHARE_VIEW'];?>.png" data-type="tw"></div>
            <div class="social_share_icon"><img class="social_share" src="/local/templates/startup/components/bitrix/news.detail/blog/images/google_plus<?=$arParams['USE_SHARE_VIEW'];?>.png" data-type="gg"></div>
            <div class="social_share_icon"><img class="social_share" src="/local/templates/startup/components/bitrix/news.detail/blog/images/livejournal<?=$arParams['USE_SHARE_VIEW'];?>.png" data-type="lj"></div>
            <div class="social_share_icon"><img class="social_share" src="/local/templates/startup/components/bitrix/news.detail/blog/images/mailru<?=$arParams['USE_SHARE_VIEW'];?>.png" data-type="mr"></div>
        </div>
    </div>
    <?endif;?>

    <?$APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "",
        Array(
            "AREA_FILE_SHOW" => "page",
            "AREA_FILE_SUFFIX" => "blog_sidebar_include",
            "COMPONENT_TEMPLATE" => ".default",
            "EDIT_TEMPLATE" => ""
        ),
        false,
        array('HIDE_ICONS' => 'Y')
    );?>

    <?if($arParams["USE_SCHEMA_ORG_ARTICLE"]=="Y"):?>
        <?$APPLICATION->IncludeComponent(
            "coffeediz:schema.org.Article",
            ".default",
            array(
                "ABOUT" => "",
                "ARTICLEBODY" => $arResult["PREVIEW_TEXT"],
                "ARTICLE_SECTION" => array(
                ),
                "AUTHOR_PERSON_ADDITIONALNAME" => "",
                "AUTHOR_PERSON_EMAIL" => array(
                ),
                "AUTHOR_PERSON_FAMILYNAME" => "",
                "AUTHOR_PERSON_IMAGEURL" => $arResult['AUTHOR']["DETAIL_PICTURE"],
                "AUTHOR_PERSON_JOBTITLE" => $arResult['AUTHOR']['PROPERTIES']['POSITION']['VALUE'],
                "AUTHOR_PERSON_NAME" => $arResult['AUTHOR']['NAME'],
                "AUTHOR_PERSON_PHONE" => array(
                ),
                "AUTHOR_PERSON_URL" => array(
                ),
                "AUTHOR_PERSON_URL_SAMEAS" => array(
                ),
                "AUTHOR_TYPE" => "Person",
                "COMPONENT_TEMPLATE" => ".default",
                "DATA_MODIFIED" => "",
                "DATA_PUBLISHED" => "",
                "GENRE" => "",
                "IMAGEURL" => $arResult["DETAIL_PICTURE"]["SRC"],
                "IN_LANGUAGE" => LANGUAGE_ID,
                "KEYWORDS" => array(
                ),
                "LEARNING_RESOURCE_TYPE" => "",
                "MAINENTITYOFPAGE" => "",
                "NAME" => $arResult["NAME"],
                "PARAM_RATING_SHOW" => "N",
                "PUBLISHER_ORGANIZATION_ADDRESS" => "",
                "PUBLISHER_ORGANIZATION_COUNTRY" => "",
                "PUBLISHER_ORGANIZATION_DESCRIPTION" => "",
                "PUBLISHER_ORGANIZATION_LOCALITY" => "",
                "PUBLISHER_ORGANIZATION_LOGO" => "",
                "PUBLISHER_ORGANIZATION_NAME" => "",
                "PUBLISHER_ORGANIZATION_PHONE" => array(
                ),
                "PUBLISHER_ORGANIZATION_POST_CODE" => "",
                "PUBLISHER_ORGANIZATION_REGION" => "",
                "PUBLISHER_ORGANIZATION_SITE" => "",
                "PUBLISHER_ORGANIZATION_TYPE_2" => "",
                "SHOW" => "Y",
                "TYPE" => $arParams["SCHEMA_ORG_ARTICLE_TYPE"],
                "SOURCE_TYPE" => "SOURCE_TYPE_URL",
                "REFERENCES_URLS" => array(
                ),
                "REFERENCES_TEXTS" => array(
                ),
                "SOURCE_TYPE_URL_URL" => "",
                "SOURCE_TYPE_URL_TEXT" => ""
            ),
            false,
            array('HIDE_ICONS' => 'Y')
        );?>
    <?endif;?>
</div>
</div>
</section>