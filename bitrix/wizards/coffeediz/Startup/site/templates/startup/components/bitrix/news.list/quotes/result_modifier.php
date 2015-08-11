<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach($arResult["ITEMS"] as $key => $arItem){

    $arFile = CFile::GetFileArray($arItem['PROPERTY_AUTHOR_PREVIEW_PICTURE']);
    $arResult['ITEMS'][$key]['AUTHOR_PREVIEW_PICTURE'] = $arFile;
}

?>