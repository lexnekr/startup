<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>


<a <?if (!empty($arParams["SLIDE_LINK_ID"])):?>id="<?=$arParams['SLIDE_LINK_ID'];?>"<?endif?>></a>


<?if (!empty($arResult["FORM_NOTE"]) or $arResult["isFormErrors"] == "Y"):?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">

                <?if ($arResult["isFormErrors"] == "Y"):?>
                    <h4 style="color: red;text-align: center;" class="modal-title" id="mySmallModalLabel"><?=GetMessage('ERROR_TITLE_DEFAULT');?></h4>
                <?else:?>
                    <h4 style="text-align: center;" class="modal-title" id="mySmallModalLabel"><?if (!empty($arParams["RESULT_TITLE"])):?><?=$arParams['RESULT_TITLE'];?><?else:?><?=GetMessage('RESULT_TITLE_DEFAULT');?><?endif?></h4>
                <?endif?>

                <?if ($arResult["isFormErrors"] == "Y"):?>
                    <?=$arResult["FORM_ERRORS_TEXT"];?>
                <?else:?>
                    <?if (!empty($arParams["RESULT_TEXT"])):?><span style="text-align: center;"><?=$arParams['RESULT_TEXT'];?></span><?else:?><?=GetMessage('RESULT_TEXT_DEFAULT');?><?endif?>
                <?endif?>

            </div>
        </div>
    </div>
<?endif?>


<?if ($arResult["isFormNote"] != "Y")
{
?>
<section id="contact">
	<div class="overlay">
		<div class="container">
			<?if (!empty($arResult["FORM_DESCRIPTION"])):?>
				<h2 class="h1 section-title wow fadeIn animated" data-wow-delay=".2s" style="visibility: visible;-webkit-animation-delay: .2s; -moz-animation-delay: .2s; animation-delay: .2s;"><?=$arResult["FORM_DESCRIPTION"]?></h2>
                <?endif?>
			<div class="row">
				<div class="contact-form">

                <?=$arResult["FORM_HEADER"]?>


                <?
                /***********************************************************************************
                form questions
                 ***********************************************************************************/
                ?>
            <div class="col-sm-6 col-md-6 wow fadeInLeft animated" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">
                    <?
                    $i=0;
                    foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
                    {
                    if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden')
                    {
                        echo $arQuestion["HTML_CODE"];
                    }
                    else
                    {
                    ?>
                <?if($i == $arParams["NUMBER_OF_LAST_ELEMENT_OF_1_COLL"] ):?></div><div class="col-sm-6 col-md-6 wow fadeInRight animated" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;"><?endif;?>

                    <?if($arQuestion['STRUCTURE']['0']['FIELD_TYPE'] == "textarea"):?>
                    <textarea class="required form-control" name="form_<?=$arQuestion['STRUCTURE']['0']['FIELD_TYPE']?>_<?=$arQuestion['STRUCTURE']['0']['ID']?>" cols="40" rows="<?=$arQuestion['STRUCTURE']['0']['FIELD_HEIGHT']?>"></textarea>
                    <?elseif($arQuestion['STRUCTURE']['0']['FIELD_TYPE'] == "text" or $arQuestion['STRUCTURE']['0']['FIELD_TYPE'] == "email"):?>
					<div class="controls">
                    	<input class="contact_input" placeholder="<?=$arQuestion['CAPTION']?>" class="required form-control" type="text" name="form_<?=$arQuestion['STRUCTURE']['0']['FIELD_TYPE']?>_<?=$arQuestion['STRUCTURE']['0']['ID']?>" value="">
						<i class="fa fa-<?=$arQuestion['STRUCTURE']['0']['FIELD_PARAM']?>"></i>
					</div>
                    <?endif;?>
                    <?
                    $i++;
                    }
                    } //endwhile
                    ?>
                </div>

                <div class="col-md-12 col-lg-12">
                    <?
                    if($arResult["isUseCaptcha"] == "Y")
                    {
                        ?>

                        <div class="col-md-6 col-lg-6">

						<p style="text-align: center;"><span style="color: white;"><?=GetMessage("FORM_CAPTCHA_FIELD_TITLE")?><?=$arResult["REQUIRED_SIGN"];?></span></p>
                        <div class="col-md-6 col-lg-6">
                            <input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" /><img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" class="img-responsive"/>
                        </div>
                        <div class="col-md-6 col-lg-6"><div class="controls">
                            <input type="text" name="captcha_word" size="30" maxlength="50" value="" class="contact_input" />
                        </div></div>

                        </div>
                    <?
                    } // isUseCaptcha
                    ?>
                    <div class="col-md-6 col-lg-6">
                        
                        <p style="text-align:  center;">
                        <input class="btn btn-common" <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" />
                        </p>
                    </div>
                </div>



                <?=$arResult["FORM_FOOTER"]?>
				</div>
			</div>
		</div>	
	</div>
</section>
<?
} //endif (isFormNote)
?>