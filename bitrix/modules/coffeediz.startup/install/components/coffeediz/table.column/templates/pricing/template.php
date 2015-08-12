<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>

<div class="col-sm-<?=$arParams['BLOCK_SM']?> col-md-<?=$arParams['BLOCK_MD']?> wow bounceIn" data-wow-offset="10" data-wow-delay="0.2s">
    <div class="table text-center">
        <div class="pricing-header">
            <p class="price-quality"><?=$arParams["~TITLE"]?></p>
        </div>
        <div class="price">
            <p class="price-value"><?=$arParams["~PRICE"]?></p>
        </div>
        <?if(!empty($arParams['~STRING'])):?>
            <div class="pricing-list">
                <ul>
                    <?foreach($arParams["~STRING"] as $arString):?>
                        <li><?=$arString?></li>
                    <?endforeach;?>
                </ul>
            </div>
        <?endif;?>
        <?if(!empty($arParams['BUTTON_TEXT'])):?><a href="<?=$arParams["BUTTON_URL"]?>" class="btn btn-common"><?=$arParams["~BUTTON_TEXT"]?></a><?endif;?>
    </div>
</div>