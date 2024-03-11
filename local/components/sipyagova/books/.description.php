<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
use Bitrix\Main\Localization\Loc;
$arComponentDescription = [
	"NAME" =>Loc::GetMessage("S_TEMPLATE_NAME"),
	"DESCRIPTION" =>Loc::GetMessage("S_DESCRIPTION"),
    "ICON" => "/images/icon.gif",
    "COMPLEX" => "N",
    "PATH" => [
        "ID" => "biblio",
		"NAME" =>Loc::GetMessage("S_NAME"),
    ],
];
