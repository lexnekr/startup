<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<section id="clients">
	<div class="container">
		<div class="row">
			<div id="logo-slider" class="owl-carousel owl-theme">
			<?foreach($arResult["ITEMS"] as $arItem):?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
				<div class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
					<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
						<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
							<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img
									src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
									alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
									title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
									/></a>
						<?else:?>
							<img
								src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
								alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
								title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
								/>
						<?endif;?>
					<?endif?>
				</div>
			<?endforeach;?>
			</div>
		</div>
	</div>
</section>