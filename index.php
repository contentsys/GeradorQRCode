<?php 
session_start();
if(isset($_REQUEST["removeCookie"])){
	echo "Deslogando...";
	session_start(); 
	unset($_SESSION["dados"]);
	setcookie("dados", $_COOKIE["dados"], time() - 2 * 10000);
	session_destroy();
	header("Location: index.php");
}
if (isset($_SESSION['dados'])){
	header("Location: ui/PaginaInicial.php");
}
else if (isset( $_COOKIE["dados"])){
	
	$dados = unserialize($_COOKIE["dados"]);
	$_SESSION["dados"] = $dados;
	header("Location: ui/PaginaInicial.php");
}
else{
	header("Location: ui/login/pagina-login.php");
	
}

?>
