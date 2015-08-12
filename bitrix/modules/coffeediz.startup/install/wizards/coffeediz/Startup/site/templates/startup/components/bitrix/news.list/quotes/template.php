<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<section id="testimonial" style="padding-top: <?if($arParams['PADDING_TOP'] == 'Y'):?>67<?else:?>0<?endif;?>px; background: url('<?if(!empty($arParams["BACKGROUND_IMAGE"])):?><?=$arParams["BACKGROUND_IMAGE"]?><?endif;?>') center center no-repeat; background-size: cover;">
    <div class="container">
        <div class="row">
            <<?if(!empty($arParams['TITLE_TYPE'])):?><?=$arParams['TITLE_TYPE']?><?else:?>p<?endif;?> class="h2 section-title wow fadeIn" data-wow-delay=".2s"><?=$arParams['~SLIDER_ABOUT_TITLE']?></<?if(!empty($arParams['TITLE_TYPE'])):?><?=$arParams['TITLE_TYPE']?><?else:?>p<?endif;?>>
            <div id="testimonial-slider" class="owl-carousel">

            <?foreach($arResult["ITEMS"] as $key => $arItem):?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <?$DataDelay = $key*0.3 + 0.3;?>

                <div class="item wow fadeInDown" data-wow-delay="0.3s">
                    <div class="testimonial">
                        <div class="testimonial-text">
                            <i class="fa fa-quote-left"></i>
                            <p><?=$arItem['PREVIEW_TEXT']?></p>
                            <i class="fa fa-quote-right pull-right"></i>
                        </div>
                        <div class="testimonial-info" style="height: <?if($arParams['HEIGHT_OF_AUTHOR_BLOCK'] == '1'):?>67<?elseif($arParams['HEIGHT_OF_AUTHOR_BLOCK'] == '2'):?>87<?else:?>67<?endif;?>px;">
                            <img src="<?=$arItem['AUTHOR_PREVIEW_PICTURE']['SRC']?>" alt="<?=$arItem['AUTHOR_PREVIEW_PICTURE']['DESCRIPTION']?>">
                            <p><span class="name"><?=$arItem['PROPERTY_AUTHOR_NAME']?></span>
                                <?if($arParams['HEIGHT_OF_AUTHOR_BLOCK'] == '1'):?> | <?elseif($arParams['HEIGHT_OF_AUTHOR_BLOCK'] == '2'):?><br><?else:?> | <?endif;?>
                                <span class="company"><?if(!empty($arItem["PROPERTY_AUTHOR_PROPERTY_POSITION_VALUE"])):?><?=$arItem['PROPERTY_AUTHOR_PROPERTY_POSITION_VALUE']?><?endif;?><?if(!empty($arItem["PROPERTY_AUTHOR_PROPERTY_POSITION_VALUE"]) and !empty($arItem["PROPERTY_AUTHOR_PROPERTY_COMPANY_VALUE"])):?> - <?endif;?><?if(!empty($arItem["PROPERTY_AUTHOR_PROPERTY_POSITION_VALUE"])):?><?=$arItem['PROPERTY_AUTHOR_PROPERTY_COMPANY_VALUE']?><?endif;?></span></p>
                        </div>
                    </div>
                </div>

            <?endforeach;?>

            </div>
		</div>
	</div>
</section>