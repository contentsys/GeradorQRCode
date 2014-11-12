<?php
error_reporting(E_ALL ^ E_NOTICE);
define("APP_NAME", "GeradorQRCode");
define("APP_SRC", "./");
define("APPLICATION_ENV", "development");
define("DEBUG_MODE", true);
define("ROOTFOLDER", dirname(__FILE__));
define("RESOURCE_FOLDER", $_SERVER["DOCUMENT_ROOT"] . "/".APP_NAME. "/" . APP_SRC . "/resources/");
define("UI_FOLDER", "/".APP_NAME. "/" . APP_SRC . "/ui/");
