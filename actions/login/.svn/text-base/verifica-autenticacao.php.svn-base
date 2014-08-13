<?php
use Entities\Login;
$usuarioValido = 0;
$xml = "";
if(isset($_POST['usuario'])){
	
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	$salt = "KmR2@*)&+";
	$rememberPass = (isset($_POST['rememberPass']))?$_POST['rememberPass']:false;
	
	
	
	$dql = "select u from Entities\Login u where u.username = :login and u.password = :senha";
	
	$emLogin = getEm();
	
	$q = $emLogin->createQuery($dql);
	
	$q->setParameter("login", $usuario);
	
//	echo md5($senha.$salt);
	$q->setParameter("senha", md5($senha.$salt));
	
//	echo "Login: $usuario, senha : ".md5($senha.$salt);	
	$logins = $q->getResult();
	
	$login = "";
	foreach ($logins as $login) {
//		echo "adsfas";
	}
	
	if(!empty($login)){
	
		session_start();
		$dados = array();
		$dados[0] = $usuario;
		$dados[1] = $senha;
		$dados["idLogin"] = $login->getId();
		$dados["autoridade"] = $login->getAutoridade();
		$dados["idFuncionario"] = $login->getFuncionario()->getId();
		
		$_SESSION['dados'] = $dados;
		if($rememberPass == "true"){
			 
			 setcookie("dados", serialize($dados), time()+60*60*24*365); 
		}
		$usuarioValido = 1;
		
	}
}
else{
	session_start();
	
	if(isset($_SESSION['dados']) || isset($_COOKIE["dados"])){
		$usuarioValido = 1;
	}
}


$xml .= "<usuarioValido>$usuarioValido</usuarioValido>";
echo $xml;



