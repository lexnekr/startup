<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>

<?if (!empty($arResult)):?>
    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right" id="main_navigation_menu">

            <?
            $previousLevel = 0;
            foreach($arResult as $arItem):
                if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                    continue;
                ?>

                <?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
                <?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
            <?endif?>

                <?if ($arItem["IS_PARENT"]):?>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><?=$arItem["TEXT"]?><b class="caret"></b></a>
                <ul class="dropdown-menu">
            <?else:?>
                <?if($arItem["SELECTED"]):?>
                    <li /*class="active"*/><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
		<?else:?>
                    <li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
                <?endif?>
            <?endif?>

                <?$previousLevel = $arItem["DEPTH_LEVEL"];?>

            <?endforeach?>

        </ul>
    </div>
<?endif?>