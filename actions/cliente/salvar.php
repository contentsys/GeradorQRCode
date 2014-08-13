<?php
use Entities\Cliente;

$xml = "";

$id = (isset($_REQUEST["id"]))? get_request("id") :"" ;
$nome = (isset($_REQUEST["nome"]))? get_request("nome") :"" ;
$email = (isset($_REQUEST["email"]))? get_request("email") :"" ;

$c = $em->find("Entities\Cliente", $id); 	
if(empty($c)){
	$c = new Cliente();
}

$c->setNome($nome);
$c->setTelefone($telefone);
$c->setEmail($email);

$em->persist($c);
try {
	$em->flush();
	$erro = 0;
} catch (Exception $e) {
	$erro = $e->getMessage();
	//$erro = 1;
}

$xml .= "<erro>$erro</erro>";
echo $xml;