<?php
use Entities\Funcionario;

$xml = "";

$id = (isset($_REQUEST["id"]))? get_request("id") :"" ;
$nome = (isset($_REQUEST["nome"]))? get_request("nome") :"" ;
$matricula = (isset($_REQUEST["matricula"]))? get_request("matricula") :"" ;
$cargo = (isset($_REQUEST["cargo"]))? get_request("cargo") :"" ;
$obra = (isset($_REQUEST["obra"]))? get_request("obra") :"" ;
$telefone = (isset($_REQUEST["telefone"]))? get_request("telefone") :"" ;
$nextel = (isset($_REQUEST["nextel"]))? get_request("nextel") :"" ;
$email = (isset($_REQUEST["email"]))? get_request("email") :"" ;
$isAdm = (isset($_REQUEST["isAdm"]))? get_request("isAdm") :"" ;
if($isAdm == "true"){
	$isAdm = 1;
}else{
	$isAdm = 0;
}


$c = $em->find("Entities\Funcionario", $id); 	
if(empty($c)){
	$c = new Funcionario();
}

if($obra != 0){
	$o = $em->find("Entities\Obras", $obra);
	if(empty($o)){
		$o = new Obras();
	}
	$c->setObras($o);
}

$c->setNome($nome);
$c->setMatricula($matricula);
$c->setCargo($cargo);
$c->setTelefone($telefone);
$c->setNextel($nextel);
$c->setEmail($email);
$c->setIsAdm($isAdm);
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