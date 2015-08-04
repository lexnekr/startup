<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<section id="blog" <?if($arParams['LIST_PADDING_TOP'] == "Y"):?> style="padding-top: 67px;"<?endif;?>>
	<div class="container">
		<<?if(!empty($arParams['TITLE_TYPE'])):?><?=$arParams['TITLE_TYPE']?><?else:?>p<?endif;?> class="h1 section-title wow fadeIn" data-wow-delay=".2s"><?=$arParams['~LIST_TITLE']?></<?if(!empty($arParams['TITLE_TYPE'])):?><?=$arParams['TITLE_TYPE']?><?else:?>p<?endif;?>>
		<div class="row">
			<div id="blog-slider" class="owl-carousel owl-theme">

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="blog-wrapper">

			<?if(!empty($arItem['DISPLAY_PROPERTIES']['SLIDER_PREVIEW_PICTURE']['FILE_VALUE'])):?>
				<div id="gallery" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<div class="item active">
							<img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arItem['PREVIEW_PICTURE']['ALT']?>" title="<?=$arItem['PREVIEW_PICTURE']['TITLE']?>">
						</div>
						<?foreach($arItem['DISPLAY_PROPERTIES']['SLIDER_PREVIEW_PICTURE']['FILE_VALUE'] as $pid=>$arSlide):?>
							<div class="item">
								<img src="<?=$arSlide['SRC']?>" alt="<?=$arSlide['ALT']?>" title="<?=$arSlide['TITLE']?>">
							</div>
						<?endforeach;?>
					</div>
					<a class="left carousel-control" href="#gallery" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
					<a class="right carousel-control" href="#gallery" data-slide="next"><i class="fa fa-chevron-right"></i></a>
				</div>
			<?elseif(!empty($arItem['PROPERTIES']['VIDEO_URL']['VALUE'])):?>
				<?$APPLICATION->IncludeComponent(
					"bitrix:player", 
					"", 
					array(
						"COMPONENT_TEMPLATE" => "",
						"USE_PLAYLIST" => "N",
						"PATH" => $arItem['PROPERTIES']['VIDEO_URL']['VALUE'],
						"WIDTH" => "365",
						"HEIGHT" => "268",
						"PREVIEW" => $arItem['PREVIEW_PICTURE']['SRC'],
						"ALLOW_SWF" => "N"
					),
					false,
                    array('HIDE_ICONS' => 'Y')
				);?>
			<?else:?>
				<img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arItem['PREVIEW_PICTURE']['ALT']?>" title="<?=$arItem['PREVIEW_PICTURE']['TITLE']?>">
			<?endif;?>

			<div class="content">
				<h3><?=$arItem['NAME']?></h3>
				<p><?=$arItem['PREVIEW_TEXT']?></p>
				<?if(!empty($arItem['DETAIL_TEXT'])):?>
					<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="redmore"><?=GetMessage("READ_MORE")?> +</a>
				<?endif;?>
			</div>
			<div class="blog-footer">
				<?if(!empty($arItem['ACTIVE_FROM'])):?>
					<p><?=GetMessage("PUBLISHED")?>: <?=$arItem['ACTIVE_FROM']?></p>
				<?endif;?>
				<!--<span><i class="fa fa-comments"></i>30 Comments</span> -->
			</div>
		</div>
	</div>
<?endforeach;?>

			</div>
		</div>
	</div>
</section>