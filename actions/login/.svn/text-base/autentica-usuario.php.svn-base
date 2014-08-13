<?php

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$salt = "KmR2@*)&+";
$rememberPass = (isset($_POST['rememberPass']))?$_POST['rememberPass']:false;
$xml = "";
$usuarioValido = 0;

$dql = "select u from Entities\Login u where u.username = :login and u.senha = :senha";

$emLogin = getEmLogin();

$q = $emLogin->createQuery($dql);

$q->setParameter("login", $usuario);

$q->setParameter("senha", md5($senha.$salt));

$login = $q->getFirstResult();

if(!empty($login)){
	session_start();
	$dados = array();
	$dados[0] = $usuario;
	$dados[1] = $senha;
	$dados["idLogin"] = $login->getId();
	$dados["autoridade"] = $login->getAutoridade();
	$dados["idFuncionario"] = $login->getFuncionario()->getId();
	

	$_SESSION['dados'] = $dados;
	if($rememberPass){
		 setcookie("dados", serialize($dados), time()+60*60*24*365); 
	}
	$usuarioValido = 1;
	
}

$xml .= "<usuarioValido>$usuarioValido</usuarioValido>";
echo $xml;



