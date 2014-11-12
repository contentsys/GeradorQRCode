<?php
use Entities\Funcionario;

include_once '../templates/topo.php';

$id= '';

if(isset($_REQUEST['id']))
	$id = $_REQUEST['id'];
	
$funcionario = $em->find("Entities\Funcionario", $id);
if(empty($funcionario))
	$funcionario = new Funcionario();
	
//includeJs("utils.js");
	
?>



<?php 
if(!$popup)
	include_once '../templates/footer.php';
?>