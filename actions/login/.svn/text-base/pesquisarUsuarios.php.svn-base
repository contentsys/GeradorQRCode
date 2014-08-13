<?php
use Entities\Login;

$tipoBusca = $_REQUEST['tipoBusca'];
$strBusca = $_REQUEST['strBusca'];

$dql = "select c from Entities\Login c where 1=1 ";
switch ($tipoBusca){
	case "login":
		$dql .= " and c.username like :parametro";
		$strBusca = "%$strBusca%";
		break;
	default:
		$dql .= " and 1>2";
}
$q = $em->createQuery($dql);
$q->setParameter("parametro", $strBusca);
$usuarios = $q->getResult();
$xml = "";
foreach ($usuarios as $usuario){
	$xml .= "<usuario>";
	$xml .= "<id>".$usuario->getId()."</id>";
	$xml .= "<nome>".$usuario->getFuncionario()->getNome()."</nome>";
	$xml .= "<login>".$usuario->getUsername()."</login>";
	$xml .= "</usuario>";
}

echo $xml;