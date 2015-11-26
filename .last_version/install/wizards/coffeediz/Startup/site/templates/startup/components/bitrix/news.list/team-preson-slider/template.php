<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<section id="team"<?if($arParams['PADDING_TOP'] == "Y"):?> style="padding-top: 67px;"<?endif;?>>
    <div class="container">
        <<?if(!empty($arParams['TITLE_TYPE'])):?><?=$arParams['TITLE_TYPE']?><?else:?>p<?endif;?> class="section-title wow fadeIn" data-wow-delay=".2s"><?=$arParams['~SLIDER_ABOUT_TITLE']?></<?if(!empty($arParams['TITLE_TYPE'])):?><?=$arParams['TITLE_TYPE']?><?else:?>p<?endif;?>>
        <div class="row">

            <?foreach($arResult["ITEMS"] as $key => $arItem):?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <?$DataDelay = $key*0.2 + 0.2;?>

                <div class="col-sm-6 col-md-3 wow flipInY" data-wow-offset="10" data-wow-delay="<?=$DataDelay?>s" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <div class="item-square">
                        <div class="face">
                            <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>">
                            <div class="overlay"></div>
                        </div>
                        <div class="content">
                            <div class="title">
                                <h3><?=$arItem['NAME']?></h3>
                                <?if(!empty($arItem['PROPERTIES']['POSITION']['VALUE'])):?>
                                    <p><?=$arItem['PROPERTIES']['POSITION']['VALUE']?></p>
                                <?endif;?>
                            </div>
                            <?if($arParams["SCHEMAORG_PERSON"] == "Y"):?>
                                <?$APPLICATION->IncludeComponent(
                                    "coffeediz:schema.org.Person",
                                    ".default",
                                    array(
                                        "ADDITIONALNAME" => "",
                                        "COMPONENT_TEMPLATE" => ".default",
                                        "FAMILYNAME" => "",
                                        "IMAGEURL" => $arItem["PREVIEW_PICTURE"]["SRC"],
                                        "ITEMPROP" => "",
                                        "JOBTITLE" => $arItem["PROPERTIES"]["POSITION"]["VALUE"],
                                        "NAME" => $arItem["NAME"],
                                        "PERSON_EMAIL" => array(
                                            0 => $arItem["PROPERTIES"]["EMAIL"]["VALUE"],
                                        ),
                                        "PERSON_PHONE" => array(
                                            0 => $arItem["PROPERTIES"]["PHONE"]["VALUE"],
                                        ),
                                        "PERSON_URL" => array(),
                                        "PERSON_URL_SAMEAS" => array(
                                            0 => $arItem["PROPERTIES"]["RESUME_LINK"]["VALUE"],
                                            1 => $arItem["PROPERTIES"]["FACEBOOK_LINK"]["VALUE"],
                                            2 => $arItem["PROPERTIES"]["TWITTER_LINK"]["VALUE"],
                                            3 => $arItem["PROPERTIES"]["GOOGLEPLUS_LINK"]["VALUE"],
                                            4 => $arItem["PROPERTIES"]["VK_LINK"]["VALUE"],
                                            5 => $arItem["PROPERTIES"]["YOUTUBE_LINK"]["VALUE"],
                                            6 => $arItem["PROPERTIES"]["ODNOKLASSNII_LINK"]["VALUE"],
                                        ),
                                        "SHOW" => "Y",
                                        "WORKSFORNAME" => $arItem["PROPERTIES"]["COMPANY"]["VALUE"],
                                        "IMAGE_NAME" => $arItem["NAME"],
                                        "IMAGE_CAPTION" => "",
                                        "IMAGE_DESCRIPTION" => "",
                                        "IMAGE_HEIGHT" => $arItem["PREVIEW_PICTURE"]["HEIGHT"],
                                        "IMAGE_WIDTH" => $arItem["PREVIEW_PICTURE"]["WIDTH"],
                                        "IMAGE_TRUMBNAIL_CONTENTURL" => "",
                                        "WORKSFOR_TYPE_2" => "",
                                        "WORKSFOR_DESCRIPTION" => "",
                                        "WORKSFOR_SITE" => "",
                                        "WORKSFOR_PHONE" => array(),
                                        "WORKSFOR_POST_CODE" => "",
                                        "WORKSFOR_COUNTRY" => "",
                                        "WORKSFOR_REGION" => "",
                                        "WORKSFOR_LOCALITY" => "",
                                        "WORKSFOR_ADDRESS" => ""
                                    ),
                                    false,
                                    array('HIDE_ICONS' => 'Y')
                                );?>
                            <?endif;?>
                            <div class="text">
                                <p><?=$arItem['PREVIEW_TEXT']?></p>
                            </div>
                            <div class="social-icons">
                                <ul>
                                    <?if(!empty($arItem['DISPLAY_PROPERTIES']['FACEBOOK_LINK']['VALUE'])):?>
                                        <li><a href="<?=$arItem['DISPLAY_PROPERTIES']['FACEBOOK_LINK']['VALUE']?>"><i class="fa fa-facebook"></i></a></li>
                                    <?endif;?>
                                    <?if(!empty($arItem['DISPLAY_PROPERTIES']['TWITTER_LINK']['VALUE'])):?>
                                        <li><a href="https://twitter.com/<?=$arItem['DISPLAY_PROPERTIES']['TWITTER_LINK']['VALUE']?>"><i class="fa fa-twitter"></i></a></li>
                                    <?endif;?>
                                    <?if(!empty($arItem['DISPLAY_PROPERTIES']['GOOGLEPLUS_LINK']['VALUE'])):?>
                                        <li><a href="<?=$arItem['DISPLAY_PROPERTIES']['GOOGLEPLUS_LINK']['VALUE']?>"><i class="fa fa-google-plus"></i></a></li>
                                    <?endif;?>
                                    <?if(!empty($arItem['DISPLAY_PROPERTIES']['VK_LINK']['VALUE'])):?>
                                        <li><a href="<?=$arItem['DISPLAY_PROPERTIES']['VK_LINK']['VALUE']?>"><i class="fa fa-vk"></i></a></li>
                                    <?endif;?>
                                    <?if(!empty($arItem['DISPLAY_PROPERTIES']['YOUTUBE_LINK']['VALUE'])):?>
                                        <li><a href="<?=$arItem['DISPLAY_PROPERTIES']['YOUTUBE_LINK']['VALUE']?>"><i class="fa fa-youtube"></i></a></li>
                                    <?endif;?>
                                    <?if(!empty($arItem['DISPLAY_PROPERTIES']['ODNOKLASSNII_LINK']['VALUE'])):?>
                                        <li><a href="<?=$arItem['DISPLAY_PROPERTIES']['ODNOKLASSNII_LINK']['VALUE']?>"><i class="fa fa-odnoklassniki"></i></a></li>
                                    <?endif;?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            <?endforeach;?>

		</div>
	</div>
</section>