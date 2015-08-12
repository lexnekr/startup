<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$property_enums = CIBlockPropertyEnum::GetList(Array("DEF"=>"DESC", "SORT"=>"ASC"), Array("IBLOCK_ID"=>$arResult["ID"], "CODE"=>"FILTER"));

while($enum_fields = $property_enums->GetNext())
{
$arResult["FILTER"][$enum_fields["ID"]]["XML_ID"] = $enum_fields["XML_ID"];
$arResult["FILTER"][$enum_fields["ID"]]["VALUE"] = $enum_fields["VALUE"];
}
?>