<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentParameters = array(
    "GROUPS" => array(
        "MAIN_PARAMS" => array(
            "SORT" => 100,
            "NAME" => GetMessage("MAIN_PARAMS"),
        ),
    ),
    "PARAMETERS"  =>  array(
        "CSS_PRESET" => array(
            "PARENT" => "MAIN_PARAMS",
            "NAME" => GetMessage("CSS_PRESET"),
            "TYPE" => "LIST",
            "VALUES" => array(
                "" =>  GetMessage("green"),
                "lgreen" =>  GetMessage("lgreen"),
                "red" => GetMessage("red"),
                "orange" =>  GetMessage("orange"),
                "purple" =>  GetMessage("purple"),
                "blue" => GetMessage("blue"),
                "mblue" => GetMessage("mblue"),
                "coffee" =>  GetMessage("coffee"),
            ),
        ),
    )
);