<?php
use Entities\Login;

$xml = "";

$id = (isset($_REQUEST["id"]))? get_request("id") :"" ;

$f = $em->find("Entities\Login", $id); 	
if(empty($f)){
	$f = new Login();
}

$em->remove($f);
$msg = "";
try {
	$em->flush();
	$erro = 0;
} catch (Exception $e) {
	$msg = $e->getMessage();
	$erro = $e->getCode();
}

$xml .= "<erro>$erro</erro><msg>$msg</msg>";
echo $xml;