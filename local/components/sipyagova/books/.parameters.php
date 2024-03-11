<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Application;
$request = Application::getInstance()->getContext()->getRequest();
$arComponentParameters = [
	"PARAMETERS" => [
		"PAGE" => [
			"NAME" => Loc::getMessage("PAGE"),
			"TYPE" => "STRING",
			"PARENT" => "BASE",
			"DEFAULT" => "={\$_REQUEST[\"page\"]}",
		],
	]
];
