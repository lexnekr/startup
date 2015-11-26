<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>


<section id="<?if (!empty($arParams["SLIDE_LINK_ID"])):?><?=$arParams['SLIDE_LINK_ID'];?><?else:?>services<?endif?>" class="services">
    <div class="container">
        <div class="row">


<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>

			<div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="<?if(!empty($arItem['PROPERTIES']['LG']['VALUE_XML_ID'])):?>col-lg-<?=$arItem['PROPERTIES']['LG']['VALUE_XML_ID'];?> <?endif;?><?if(!empty($arItem['PROPERTIES']['MD']['VALUE_XML_ID'])):?>col-md-<?=$arItem['PROPERTIES']['MD']['VALUE_XML_ID'];?> <?endif;?><?if(!empty($arItem['PROPERTIES']['SM']['VALUE_XML_ID'])):?>col-sm-<?=$arItem['PROPERTIES']['SM']['VALUE_XML_ID'];?> <?endif;?><?if(!empty($arItem['PROPERTIES']['XS']['VALUE_XML_ID'])):?>col-xs-<?=$arItem['PROPERTIES']['XS']['VALUE_XML_ID'];?> <?endif;?><?if(!empty($arItem['PROPERTIES']['LG_OFFSET']['VALUE_XML_ID'])):?>col-lg-offset-<?=$arItem['PROPERTIES']['LG_OFFSET']['VALUE_XML_ID'];?> <?endif;?><?if(!empty($arItem['PROPERTIES']['MD_OFFSET']['VALUE_XML_ID'])):?>col-md-offset-<?=$arItem['PROPERTIES']['MD_OFFSET']['VALUE_XML_ID'];?> <?endif;?><?if(!empty($arItem['PROPERTIES']['SM_OFFSET']['VALUE_XML_ID'])):?>col-sm-offset-<?=$arItem['PROPERTIES']['SM_OFFSET']['VALUE_XML_ID'];?> <?endif;?><?if(!empty($arItem['PROPERTIES']['LG_PULL_PUSH_TYPE']['VALUE_XML_ID']) & !empty($arItem['PROPERTIES']['LG_PULL_PUSH_VALUE']['VALUE_XML_ID'])):?>col-lg-<?=$arItem['PROPERTIES']['LG_PULL_PUSH_TYPE']['VALUE_XML_ID'];?>-<?=$arItem['PROPERTIES']['LG_PULL_PUSH_VALUE']['VALUE_XML_ID'];?> <?endif;?><?if(!empty($arItem['PROPERTIES']['MD_PULL_PUSH_TYPE']['VALUE_XML_ID']) & !empty($arItem['PROPERTIES']['MD_PULL_PUSH_VALUE']['VALUE_XML_ID'])):?>col-md-<?=$arItem['PROPERTIES']['MD_PULL_PUSH_TYPE']['VALUE_XML_ID'];?>-<?=$arItem['PROPERTIES']['MD_PULL_PUSH_VALUE']['VALUE_XML_ID'];?> <?endif;?><?if(!empty($arItem['PROPERTIES']['SM_PULL_PUSH_TYPE']['VALUE_XML_ID']) & !empty($arItem['PROPERTIES']['SM_PULL_PUSH_VALUE']['VALUE_XML_ID'])):?>col-sm-<?=$arItem['PROPERTIES']['SM_PULL_PUSH_TYPE']['VALUE_XML_ID'];?>-<?=$arItem['PROPERTIES']['SM_PULL_PUSH_VALUE']['VALUE_XML_ID'];?> <?endif;?>wow fadeInUp">

				<?if(!empty($arItem['PROPERTIES']['BONUS_CONTEINER_1']['VALUE'])):?>
					<div class="<?=$arItem['PROPERTIES']['BONUS_CONTEINER_1']['VALUE'];?>">
				<?endif;?>
                <?if(!empty($arItem['PROPERTIES']['BONUS_CONTEINER_2']['VALUE'])):?>
                    <div class="<?=$arItem['PROPERTIES']['BONUS_CONTEINER_2']['VALUE'];?>">
                <?endif;?>

					<?if(!empty($arItem['PROPERTIES']['ICON']['VALUE_XML_ID'])):?>
						<div class="icon-wrapper">
							<i class="fa fa-<?=$arItem['PROPERTIES']['ICON']['VALUE_XML_ID'];?>"></i>
						</div>
					<?endif;?>
					<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
							<<?if(!empty($arItem['PROPERTIES']['TITLE_TYPE']['VALUE_XML_ID'])):?><?=$arItem['PROPERTIES']['TITLE_TYPE']['VALUE_XML_ID'];?><?else:?>p<?endif;?> class="<?if(!empty($arItem['PROPERTIES']['TITLE_SIZE']['VALUE_XML_ID'])):?><?=$arItem['PROPERTIES']['TITLE_SIZE']['VALUE_XML_ID'];?><?endif;?>" data-wow-delay=".2s"><?echo $arItem["~NAME"]?></<?if(!empty($arItem['PROPERTIES']['TITLE_TYPE']['VALUE_XML_ID'])):?><?=$arItem['PROPERTIES']['TITLE_TYPE']['VALUE_XML_ID'];?><?else:?>p<?endif;?>>
					<?endif;?>
					<?if(!empty($arItem["PREVIEW_TEXT"])):?>
						<?=$arItem["PREVIEW_TEXT"];?>
					<?endif;?>

                <?if(!empty($arItem['PROPERTIES']['BONUS_CONTEINER_2']['VALUE'])):?>
                    </div>
                <?endif;?>
				<?if(!empty($arItem['PROPERTIES']['BONUS_CONTEINER_1']['VALUE'])):?>
					</div>
				<?endif;?>

			</div>
<?endforeach;?>
		</div>
	</div>
</section>