<?php

use classes\GeradorPDFQRCode;
$raiz = dirname(__FILE__). "/../..";
include_once $raiz.'/config.php';
include_once $raiz.'/classes/GeradorPDFQRCode.php';
$dql = "select c from \Entities\Cliente c";

$q = $em->createQuery($dql);
$clientes = $q->getResult();


$geradorPDF = new GeradorPDFQRCode($clientes);
$pdf = $geradorPDF->desenharItens();

echo $pdf->Output("orcamento", "I");
