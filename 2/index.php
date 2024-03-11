<?
use Bitrix\Main\Application;
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>
<?php $APPLICATION->IncludeComponent(
	"sipyagova:books",
	"",
	[
		"PAGE" => $_REQUEST["page"],
	]
);?><?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>