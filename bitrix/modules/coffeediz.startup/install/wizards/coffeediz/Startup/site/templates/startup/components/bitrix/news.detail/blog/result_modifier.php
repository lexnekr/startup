<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arSelect = Array("ID", "IBLOCK_ID", "DETAIL_PAGE_URL", "NAME", "DATE_ACTIVE_FROM");
$arID = $arResult['PROPERTIES']['OTHER_ARTICLES']['VALUE'];
$arFilter = Array("ID"=>$arID, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");

$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);

while($ob = $res->GetNextElement()){ 
	$arFields = $ob->GetFields();  
	$arResult['OTHER_ARTICLES'][] = $arFields;
}




$arID = $arResult['PROPERTIES']['OTHER_NEWS']['VALUE'];
$arFilter = Array("ID"=>$arID, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");

$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);

while($ob = $res->GetNextElement()){ 
	$arFields = $ob->GetFields();  
	$arResult['OTHER_NEWS'][] = $arFields;
}



$res = CIBlockElement::GetByID($arResult['DISPLAY_PROPERTIES']['AUTHOR']['VALUE']);
$arAuthor = $res->GetNext();
$arPreviewPicture = CFile::GetFileArray($arAuthor["PREVIEW_PICTURE"]);
$arDetailPicture = CFile::GetFileArray($arAuthor["DETAIL_PICTURE"]);
$arAuthor["PREVIEW_PICTURE"] = $arPreviewPicture;
$arAuthor["DETAIL_PICTURE"] = $arDetailPicture;
$arResult['AUTHOR'] = $arAuthor;



$db_props = CIBlockElement::GetProperty($arAuthor['IBLOCK_ID'], $arAuthor['ID'], array("sort" => "asc"), Array());
while ($ob = $db_props->GetNext())
    {
        $VALUES[$ob['CODE']] = $ob;
    }
$arResult['AUTHOR']['PROPERTIES'] = $VALUES;
;?>