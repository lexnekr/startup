<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<section id="portfolio" <?if($arParams['PADDING_TOP'] == "Y"):?> style="padding-top: 67px;"<?endif;?>>
	<div class="container">
		<h1 class="section-title wow fadeIn" data-wow-delay=".2s"><?=$arParams['~SLIDER_ABOUT_TITLE']?></h1>
        <div class="row">

            <?if($arParams["VIEW_JSFILTER"] == "Y"):?>
                    <div class="controls text-center">
                        <a class="filter btn btn-border" data-filter="all"><?=GetMessage("ALL")?></a>
                        <?foreach($arResult["FILTER"] as $arFilter):?>
                        <a class="filter btn btn-border" data-filter=".<?=$arFilter['XML_ID']?>"><?=$arFilter['VALUE']?></a>
                        <?endforeach;?>
                    </div>
            <?endif;?>
            <div id="portfolio-items" class="portfolio-items wow fadeInUpQuick">
                <?foreach($arResult["ITEMS"] as $arItem):?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <div class="mix<?foreach($arItem['PROPERTIES']['FILTER']['VALUE_XML_ID'] as $arFilterItem):?> <?=$arFilterItem?><?endforeach;?>" data-myorder="1" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                        <figure>
                            <div class="img">
                                <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arItem['PREVIEW_PICTURE']['TITLE']?>" title="<?=$arItem['PREVIEW_PICTURE']['TITLE']?>">
                                <div class="overlay">
                                    <a data-lightbox="image1" href="<?=$arItem['DETAIL_PICTURE']['SRC']?>" class="link-left"><i class="fa fa-plus"></i></a>
                                    <a href="<?=$arItem['PROPERTIES']['ALTERNATIV_URL']['VALUE']?>" class="link-right"><i class="fa fa-link"></i></a>
                                </div>
                            </div>
                            <figcaption class="item-description">
                                <h4 class="item-title"><?=$arItem['NAME']?></h4>
                                <?if(!empty($arItem['PROPERTIES']['TITILE2']['VALUE'])):?>
                                    <p><?=$arItem['PROPERTIES']['TITILE2']['VALUE']?></p>
                                <?endif;?>
                            </figcaption>
                        </figure>
                    </div>
                <?endforeach;?>
            </div>
        </div>
	</div>
</section>