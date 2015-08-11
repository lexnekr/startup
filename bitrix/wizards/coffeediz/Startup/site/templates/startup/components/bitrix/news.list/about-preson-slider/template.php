<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<section id="about" class="about-section"<?if($arParams['PADDING_TOP'] == "Y"):?> style="padding-top: 67px;"<?endif;?> style="background: url('<?if(!empty($arParams["BACKGROUND_IMAGE"])):?><?=$arParams["BACKGROUND_IMAGE"]?><?endif;?>') center center no-repeat;">
	<div class="container">
		<h1 class="section-title wow fadeIn" data-wow-delay=".2s"><?=$arParams['~SLIDER_ABOUT_TITLE']?></h1>
		<div class="row">
			<div id="slide" class="owl-carousel">

            <?foreach($arResult["ITEMS"] as $arItem):?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
				<div class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
					<div class="col-sm-6 col-md-6 wow fadeInLeft" data-wow-offset="10">
						<div class="side-left">
							<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>">
							<div class="info">
								<h4><?=$arItem['NAME']?></h4>
								<?if(!empty($arItem['PROPERTIES']['POSITION']['VALUE'])):?>
									<p><?=$arItem['PROPERTIES']['POSITION']['VALUE']?></p>
								<?endif;?>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-6 wow fadeInRight" data-wow-offset="10">
						<div class="side-right">
							<p>
								<?=$arItem['DETAIL_TEXT']?>
							</p>
                            <?if(!empty($arItem['DISPLAY_PROPERTIES']['EMAIL']['VALUE'])):?>
							    <a href="mailto:<?=$arItem['PROPERTIES']['EMAIL']['VALUE']?>" class="btn btn-border"><i class="fa fa-envelope-o"></i> <?=GetMessage("EMAIL")?></a>
                            <?endif;?>
                            <?if(!empty($arItem['DISPLAY_PROPERTIES']['RESUME_LINK']['VALUE'])):?>
                                <a href="<?=$arItem['PROPERTIES']['RESUME_LINK']['VALUE']?>" class="btn btn-border"><i class="fa fa-folder-open"></i> <?=GetMessage("RESUME_LINK")?></a>
                            <?endif;?>
                            <?if(!empty($arItem['DISPLAY_PROPERTIES']['RESUME']['FILE_VALUE']['SRC'])):?>
                                <a href="<?=$arItem['PROPERTIES']['RESUME']['FILE_VALUE']['SRC']?>" class="btn btn-border"><i class="fa fa-download"></i> <?=GetMessage("RESUME_FILE")?></a>
                            <?endif;?>
						</div>
					</div>
				</div>
            <?endforeach;?>

			</div>
		</div>
	</div>
</section>