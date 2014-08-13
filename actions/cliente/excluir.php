<?php
use Entities\Funcionario;

$xml = "";

$id = (isset($_REQUEST["id"]))? get_request("id") :"" ;

$f = $em->find("Entities\Cliente", $id); 	
if(empty($f)){
	$f = new Cliente();
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