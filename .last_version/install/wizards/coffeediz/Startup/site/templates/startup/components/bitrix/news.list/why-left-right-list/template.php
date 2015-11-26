<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<div class="col-md-4 wow <?if($arParams['POSITION'] == 'right'):?>fadeInRight<?elseif($arParams['POSITION'] == 'left'):?>fadeInLeft<?endif;?>" data-wow-offset="10" data-wow-delay="0.5s">
	<div class="content-<?=$arParams['POSITION']?>">
		<?foreach($arResult["ITEMS"] as $key => $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<?if($key != 0) { echo '<br>'; }?>
			<div class="box-<?=$arParams['POSITION']?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
					<span class="icon">
						<i class="fa fa-<?=$arItem['PROPERTIES']['ICON']['VALUE_XML_ID']?>"></i>
					</span>
				<div class="content">
					<h4><?=$arItem['NAME']?></h4>
					<p><?=$arItem['PREVIEW_TEXT']?></p>
				</div>
			</div>
		<?endforeach;?>
	</div>
</div>