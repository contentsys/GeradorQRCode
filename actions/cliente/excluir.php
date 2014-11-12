<?php
use Entities\Funcionario;

$xml = "";

$id = (isset($_REQUEST["ids"]))? $_REQUEST["ids"] :"" ;
foreach ($id as $key => $value){

	$f = $em->find("Entities\Cliente", $value);
	if(empty($f)){
		$f = new Cliente();
	}
	
	$em->remove($f);
}

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