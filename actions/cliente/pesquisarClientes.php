<?php
use Entities\Funcionario;
$strBusca = $_REQUEST['strBusca'];

$dql  = "select c from Entities\Cliente c where 1=1 ";
$dql .= " and c.nome like :parametro or c.email like :parametro or c.telefone like :parametro ";
$strBusca = "%$strBusca%";
$q = $em->createQuery($dql);
$q->setParameter("parametro", $strBusca);

$clientes = $q->getResult();
$xml = "";
foreach ($clientes as $cliente){
	$xml .= "<cliente>";
		$xml .= "<id>".$cliente->getId()."</id>";
		$xml .= "<nome>".$cliente->getNome()."</nome>";
		$xml .= "<email>".$cliente->getEmail()."</email>";
		$xml .= "<telefone>".$cliente->getTelefone()."</telefone>";
	$xml .= "</cliente>";
}

echo $xml;