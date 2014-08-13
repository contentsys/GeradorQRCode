<?php 

session_start();

if (isset($_SESSION['dados']) ){
//	header("Location: ui/PaginaInicial.php");
}
else if (isset( $_COOKIE["dados"])){
	
	$dados = unserialize($_COOKIE["dados"]);
	$_SESSION["dados"] = $dados;
//	header("Location: ui/PaginaInicial.php");
}
else{
	header("Location: login/pagina-login.php");
	
}


$raizTopo = dirname(__FILE__). "/../..";

$popup = isset($_REQUEST['popup'])? $_REQUEST['popup'] : false;
echo $popup;

include_once "$raizTopo/config.php";
if(!$popup){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<?php 
			require_once ROOTFOLDER . "/ui/templates/header.php";
		?>
	</head>
	<body>
		<div id="div_layout"> 
			<div id="div_conteudo" >
				<div class='out-topo'>
					<div class='inner-topo center'>
						<div class='left-topo'>
							
						</div>
						<div class='right-topo'></div>
					</div>
				</div>
				<?php  include_once ROOTFOLDER . "/ui/templates/menu.php"; ?>
				<div class='divBody'>
					<!-- Conteudo -->
				<?php }?>
