<?php
use Entities\Funcionario;
$tipoBusca = $_REQUEST['tipoBusca'];
$strBusca = $_REQUEST['strBusca'];

$dql = "select c from Entities\Funcionario c where 1=1 ";
switch ($tipoBusca){
	case "nome":
		$dql .= " and c.nome like :parametro";
		$strBusca = "%$strBusca%";
		break;
	case "matricula":
		$dql .= " and c.matricula like :parametro";
		$strBusca = "%$strBusca%";
		break;
	default:
		$dql .= " and 1>2";
}
$q = $em->createQuery($dql);
$q->setParameter("parametro", $strBusca);
$funcionarios = $q->getResult();
$xml = "";
foreach ($funcionarios as $funcionario){
	$xml .= "<funcionario>";
		$xml .= "<id>".$funcionario->getId()."</id>";
		$xml .= "<nome>".$funcionario->getNome()."</nome>";
		$xml .= "<matricula>".$funcionario->getMatricula()."</matricula>";
		$xml .= "<telefone>".$funcionario->getTelefone()."</telefone>";
	$xml .= "</funcionario>";
}

echo $xml;