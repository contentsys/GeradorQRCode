<?php

use classes\GeradorPDFQRCode;
$raiz = dirname(__FILE__). "/../..";
include_once $raiz.'/config.php';
include_once $raiz.'/classes/GeradorPDFQRCode.php';
$dql = "select c from \Entities\Cliente c where c.id IN (:ids)";
$ids = $_REQUEST['ids'];
$q = $em->createQuery($dql);
$q->setParameter('ids', explode(",",$ids));
$clientes = $q->getResult();


$geradorPDF = new GeradorPDFQRCode($clientes);
$pdf = $geradorPDF->desenharItens();

echo $pdf->Output("orcamento", "I");
