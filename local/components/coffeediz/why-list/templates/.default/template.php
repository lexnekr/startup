<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>


<section id="why-chose" style="padding-top: <?if($arParams['PADDING_TOP'] == 'Y'):?>110<?else:?>40<?endif;?>px; background: url('<?if(!empty($arParams["BACKGROUND_IMAGE"])):?><?=$arParams["BACKGROUND_IMAGE"]?><?endif;?>') center center no-repeat; background-size: cover;">
	<div class="container">
		<h1 class="section-title wow fadeIn" data-wow-delay=".2s"><?=$arParams["~SLIDER_ABOUT_TITLE"]?></h1>
		<div class="row">
			<?$APPLICATION->IncludeComponent(
				"bitrix:news.list",
				"why-left-right-list",
				array(
					"COMPONENT_TEMPLATE" => "why-left-right-list",
					"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
					"IBLOCK_ID" => $arParams["IBLOCK_ID"],
					"NEWS_COUNT" => $arParams["NEWS_COUNT"],
					"SORT_BY1" => "ACTIVE_FROM",
					"SORT_ORDER1" => "DESC",
					"SORT_BY2" => "SORT",
					"SORT_ORDER2" => "ASC",
					"PROPERTY_CODE" => array(
						0 => "ICON",
						1 => "",
					),
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "36000000",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "Y",
					"SET_TITLE" => "N",
					"SET_BROWSER_TITLE" => "N",
					"SET_META_KEYWORDS" => "N",
					"SET_META_DESCRIPTION" => "N",
					"SET_LAST_MODIFIED" => "N",
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
					"ADD_SECTIONS_CHAIN" => "N",
					"HIDE_LINK_WHEN_NO_DETAIL" => "N",
					"PARENT_SECTION" => $arParams["PARENT_SECTION_LEFT"],
					"PARENT_SECTION_CODE" => $arParams["PARENT_SECTION_CODE_LEFT"],
					"INCLUDE_SUBSECTIONS" => "Y",
					"POSITION" => "left"
				),
				false,
			array('HIDE_ICONS' => 'Y')
			);?>
			<div class="col-md-4 wow fadeInUp" data-wow-offset="10"  data-wow-delay="0.3s">
				<div class="showcase-box">
					<img src="<?=$arParams["CENTRAL_IMAGE"]?>" alt="">
				</div>
			</div>
			<?$APPLICATION->IncludeComponent(
				"bitrix:news.list",
				"why-left-right-list",
				array(
					"COMPONENT_TEMPLATE" => "why-left-right-list",
					"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
					"IBLOCK_ID" => $arParams["IBLOCK_ID"],
					"NEWS_COUNT" => $arParams["NEWS_COUNT"],
					"SORT_BY1" => "ACTIVE_FROM",
					"SORT_ORDER1" => "DESC",
					"SORT_BY2" => "SORT",
					"SORT_ORDER2" => "ASC",
					"PROPERTY_CODE" => array(
						0 => "ICON",
						1 => "",
					),
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "36000000",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "Y",
					"SET_TITLE" => "N",
					"SET_BROWSER_TITLE" => "N",
					"SET_META_KEYWORDS" => "N",
					"SET_META_DESCRIPTION" => "N",
					"SET_LAST_MODIFIED" => "N",
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
					"ADD_SECTIONS_CHAIN" => "N",
					"HIDE_LINK_WHEN_NO_DETAIL" => "N",
					"PARENT_SECTION" => $arParams["PARENT_SECTION_RIGHT"],
					"PARENT_SECTION_CODE" => $arParams["PARENT_SECTION_CODE_RIGHT"],
					"INCLUDE_SUBSECTIONS" => "Y",
					"POSITION" => "right",
				),
				false,
			array('HIDE_ICONS' => 'Y')
			);?>
		</div>
	</div>
</section>