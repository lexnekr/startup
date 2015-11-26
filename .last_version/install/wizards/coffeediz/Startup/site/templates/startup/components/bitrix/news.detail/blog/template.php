<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<section id="services" <?if($arParams['DETAIL_PADDING_TOP'] == "Y"):?> style="padding-top: 67px;"<?endif;?>>
	<div class="container">
		<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
			<h1 class="section-title wow fadeIn animated" data-wow-delay=".2s" style="visibility: visible;-webkit-animation-delay: .2s; -moz-animation-delay: .2s; animation-delay: .2s;"><?=$arResult["NAME"]?></h1>
		<?endif;?>
		<div class="row">
			<?if(!empty($arResult['PROPERTIES']['HEAD_SIDEBAR']['~VALUE'])):?>
				<div class="col-md-4" style="float: right;">
					<?=$arResult['PROPERTIES']['HEAD_SIDEBAR']['~VALUE']['TEXT'];?>
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
	
	<?if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
	{
		?>
		<div class="news-detail-share">
			<noindex>
			<?
			$APPLICATION->IncludeComponent("bitrix:main.share", "", array(
					"HANDLERS" => $arParams["SHARE_HANDLERS"],
					"PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
					"PAGE_TITLE" => $arResult["~NAME"],
					"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
					"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
					"HIDE" => $arParams["SHARE_HIDE"],
				),
				$component,
				array("HIDE_ICONS" => "Y")
			);
			?>
			</noindex>
		</div>
		<?
	}
	?>

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






		</div>
	</div>
</section>