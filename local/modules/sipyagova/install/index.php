<?php
use Bitrix\Main\Localization\Loc;
Class sipyagova extends CModule
{
	var $MODULE_ID = "sipyagova";
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;
	var $MODULE_CSS;
	var $MODULE_GROUP_RIGHTS = "Y";

	public function __construct()
	{
		$arModuleVersion = [];

		include(__DIR__.'/version.php');

		$this->MODULE_VERSION = $arModuleVersion["VERSION"];
		$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];

		$this->MODULE_NAME = Loc::GetMessage("MODULE_NAME");
		$this->MODULE_DESCRIPTION = Loc::GetMessage("MODULE_DESCRIPTION");
	}


	function InstallDB($install_wizard = true)
	{
		global $DB, $APPLICATION;
        $this->errors = false;

        $clearInstall = false;
        if(!$DB->Query("SELECT 'x' FROM book", true)&&!$DB->Query("SELECT 'x' FROM autors", true))
        {
            $clearInstall = true;
            $this->errors = $DB->RunSQLBatch($_SERVER["DOCUMENT_ROOT"]."/local/modules/sipyagova/install/db/mysql/install.sql");
        }

        if($this->errors !== false)
        {
            $APPLICATION->ThrowException(implode("", $this->errors));
            return false;
        }
		RegisterModule("sipyagova");
		return true;
	}

	function UnInstallDB($arParams = [])
	{
		global $DB, $APPLICATION;
        $this->errors = false;
			$this->errors = $DB->RunSQLBatch($_SERVER["DOCUMENT_ROOT"]."/local/modules/sipyagova/install/db/mysql/uninstall.sql");

            if($this->errors !== false)
            {
                $APPLICATION->ThrowException(implode("", $this->errors));
                return false;
            }
		UnRegisterModule("sipyagova");
		return true;
	}

	function InstallEvents()
	{
		return true;
	}

	function UnInstallEvents()
	{
		return true;
	}

	function InstallFiles()
	{
		return true;
	}

	function UnInstallFiles()
	{
		return true;
	}

	function DoInstall()
	{

		$this->InstallFiles();
		$this->InstallDB();
	}

	function DoUninstall()
	{
        $this->UnInstallFiles();
		$this->UnInstallDB();
	}
}