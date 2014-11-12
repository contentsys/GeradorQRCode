<?php
$raizController = dirname(__FILE__);
$raizActions = "$raizController/actions";
require_once "$raizController/config.php";

if($_REQUEST['typeRequest'] == "xml"){
	header("content-type: application/xml; charset=ISO-8859-1");
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"yes\" ?>";
}
$action = $_REQUEST["action"];

if($_REQUEST['typeRequest'] == "xml"){
	echo "<data>";
}

require_once ROOTFOLDER . "/actions/$action.php";

if($_REQUEST['typeRequest'] == "xml"){
	echo "</data>";
}