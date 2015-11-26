<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
$this->createFrame()->begin("");
?>

<a <?if (!empty($arParams["SLIDE_LINK_ID"])):?>id="<?=$arParams['SLIDE_LINK_ID'];?>"<?endif?>></a>

<section id="contact">
    <div class="overlay">
        <div class="container">
            <?if(!empty($arParams["FORM_TITLE"])):?>
            <<?=$arParams['FORM_TITLE_TYPE'];?> style="visibility: visible;-webkit-animation-delay: .2s; -moz-animation-delay: .2s; animation-delay: .2s; font-size: <?=$arParams['FORM_TITLE_SIZE'];?>em;" class="h1 section-title wow fadeIn animated" data-wow-delay=".2s"><?=$arParams['~FORM_TITLE']?></<?=$arParams['FORM_TITLE_TYPE'];?>>
        <?endif?>
        <?if(!empty($arResult["ERROR_MESSAGE"]))
        {
            foreach($arResult["ERROR_MESSAGE"] as $v)
                ShowError($v);
        }
        if(strlen($arResult["OK_MESSAGE"]) > 0)
        {
            ?><div class="mf-ok-text"><?=$arResult["OK_MESSAGE"]?></div><?
        }
        ?>

        <div class="row">
            <div class="contact-form">
                <form action="<?=POST_FORM_ACTION_URI?>" method="POST">
                    <?=bitrix_sessid_post()?>

                    <?if(in_array("NAME", $arParams["USED_FIELDS"]) or in_array("EMAIL", $arParams["USED_FIELDS"]) or in_array("PHONE", $arParams["USED_FIELDS"])):?>
                        <div class="col-sm-6 col-md-6 wow fadeInLeft animated" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">
                            <?if(in_array("NAME", $arParams["USED_FIELDS"])):?>
                                <div class="controls">
                                    <input class="contact_input" placeholder="<?=$arParams['NAME_HINT_TEXT']?>" type="text" name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>">
                                    <i class="fa fa-user"></i>
                                </div>
                            <?endif?>
                            <?if(in_array("EMAIL", $arParams["USED_FIELDS"])):?>
                                <div class="controls">
                                    <input class="contact_input" placeholder="<?=$arParams['EMAIL_HINT_TEXT']?>" type="text" name="user_email" value="<?=$arResult["AUTHOR_EMAIL"]?>">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                            <?endif?>
                            <?if(in_array("PHONE", $arParams["USED_FIELDS"])):?>
                                <div class="controls">
                                    <input class="contact_input" placeholder="<?=$arParams['PHONE_HINT_TEXT']?>" type="text" name="user_phone" value="">
                                    <i class="fa fa-phone"></i>
                                </div>
                            <?endif?>
                        </div>
                    <?endif?>

                    <?if(in_array("MESSAGE", $arParams["USED_FIELDS"])):?>
                        <div class="col-sm-6 col-md-6 wow fadeInRight animated" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">
                            <textarea class="required form-control" name="MESSAGE" rows="<?=$arParams['MESSAGE_HIDTH']?>" cols="40"><?=$arResult["MESSAGE"]?></textarea>
                        </div>
                    <?endif?>




                    <?if($arParams["USE_CAPTCHA"] == "Y"):?>
                        <div class="col-md-12 col-lg-12">
                            <div class="col-md-6 col-lg-6">
                                <p style="text-align: center;"><?=GetMessage("MFT_CAPTCHA_CODE")?><span class="mf-req">*</span></p>
                                <div class="col-md-6 col-lg-6">
                                    <p style="text-align: center;"><input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
                                        <img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" class="img-responsive" alt="CAPTCHA"></p>
                                </div>
                                <div class="col-md-6 col-lg-6"><div class="controls">
                                        <input class="contact_input" type="text" name="captcha_word" size="30" maxlength="50" value="">
                                    </div></div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <p style="text-align:  center;">
                                    <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
                                    <input class="btn btn-common" type="submit" name="submit" value="<?=$arParams['BUTTON_MESSAGE']?>">
                                </p>
                            </div>
                        </div>
                    <?else:?>
                        <div class="col-md-12 col-lg-12">
                            <br/>
                            <p style="text-align:right;">
                                <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
                                <input class="btn btn-common" type="submit" name="submit" value="<?=$arParams['BUTTON_MESSAGE']?>">
                            </p>
                        </div>
                    <?endif;?>

                </form>
            </div>
        </div>
    </div>
    </div>
</section>