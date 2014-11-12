<?php
use Entities\Login;

$xml = "";

$id = (isset($_REQUEST["id"]))? get_request("id") :"" ;
$senha = (isset($_REQUEST["senha"]))? get_request("senha") :"" ;

$l = $em->find("Entities\Login", $id); 	
if(empty($l)){
	$l = new Funcionario();
}
$l->setPassword($senha);

$em->persist($l);
try {
	$em->flush();
	$erro = 0;
} catch (Exception $e) {
	$erro = $e->getMessage();
}

$xml .= "<erro>$erro</erro>";
echo $xml;
?>
