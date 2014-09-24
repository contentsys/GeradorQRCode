<?php
use Entities\Cliente;

$xml = "";

$id = (isset($_REQUEST["id"]))? get_request("id") :"" ;
$nome = (isset($_REQUEST["nome"]))? get_request("nome") :"" ;
$email = (isset($_REQUEST["email"]))? get_request("email") :"" ;
$telefone = (isset($_REQUEST["telefone"]))? get_request("telefone") :"" ;
$codigo = (isset($_REQUEST["codigo"]))? get_request("codigo") :"" ;

$c = $em->find("Entities\Cliente", $id); 	
if(empty($c)){
	$c = new Cliente();
}

$c->setNome($nome);
$c->setTelefone($telefone);
$c->setEmail($email);
$c->setCodigo($codigo);

$em->persist($c);
try {
	$em->flush();
	$id = $c->getId();
	$erro = 0;
} catch (Exception $e) {
	$erro = $e->getMessage();
	//$erro = 1;
}

$xml .= "<erro>$erro</erro><id>$id</id>";
echo $xml;