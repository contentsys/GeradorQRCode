<?php
use Entities\Login;

$xml = "";

$login = (isset($_REQUEST["login"]))? get_request("login") :"" ;
$funcionario = (isset($_REQUEST["funcionario"]))? get_request("funcionario") :"" ;
$autoridade = (isset($_REQUEST["autoridade"]))? get_request("autoridade") :"" ;
$senha = (isset($_REQUEST["senha"]))? get_request("senha") :"" ;

$f = $em->find("Entities\Funcionario", $funcionario); 	
if(empty($f)){
	$f = new Funcionario();
}

$l = new Login();

$l->setUsername($login);
$l->setPassword($senha);
$l->setAutoridade($autoridade);
$l->setFuncionario($f);

$em->persist($l);
try {
	$em->flush();
	$erro = 0;
} catch (Exception $e) {
	$erro = $e->getMessage();
}

$xml .= "<erro>$erro</erro>";
echo $xml;