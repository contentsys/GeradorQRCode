<?php

function auto_version($file)
{
//  if(strpos($file, '/') !== 0 || !file_exists($_SERVER['DOCUMENT_ROOT'] . $file)){
//  	echo $_SERVER['DOCUMENT_ROOT']. "ee";
//    return $file;
//  }
  $mtime = filemtime($file);
//  echo $file;
  $retorno = preg_replace('{\\.([^./]+)$}', ".$mtime.\$1", $file);
  $retorno = str_replace($_SERVER["DOCUMENT_ROOT"], "", $retorno);
  return $retorno;
}
function includeUi($file){
	include ROOTFOLDER ."/ui/" . $file;
}
function importUi($file){

	include_once ROOTFOLDER ."/ui/" . $file;
}
function includeJs($file){
	echo "<script type=\"text/javascript\" src=\"". auto_version("".RESOURCE_FOLDER."javascript/$file.js"). "\"></script>";
	
}
function includeCSS($file){
	echo "<link type=\"text/css\" href=\"".auto_version("".RESOURCE_FOLDER. "/css/$file.css")."\" rel=\"stylesheet\" />";
}
function includeImg($file, $cssClass= "", $alt = "", $title=""){
	$file = RESOURCE_FOLDER."img/$file";
	$file = str_replace($_SERVER["DOCUMENT_ROOT"], "", $file);
	echo "<img src='".$file."' alt='$alt' title='$title' class='$cssClass' />";
	
}


function calculaIdade($dataNasc){
	if($dataNasc != "" && $dataNasc!= "0000-00-00"){
		$diaNasc = substr($dataNasc,8, 2);
		$mesNasc = substr($dataNasc,5, 2);
		$anoNasc = substr($dataNasc,0, 4);

		$ano = date('Y');
		$mes = date('m');
		$dia = date('d');
		if ($mes < $mesNasc){
			$idade = $ano - $anoNasc - 1;
		}
		else if($mes == $mesNasc){
				
			if($dia < $diaNasc){
				$idade = $ano - $anoNasc - 1;
			}
			else{
				$idade = $ano - $anoNasc;
			}
				
		}
		else{
				
			$idade = $ano - $anoNasc;
		}

		return $idade;
	}
}

function redirectLogin(){
	header("Location: ./index.php");
}


function change_data_from_bd_to_Br($date_bd){
	if($date_bd != "" && $date_bd!= "0000-00-00"){
		$diaNasc = substr($date_bd,8, 2);
		
		$mesNasc = substr($date_bd,5, 2);
	
		$anoNasc = substr($date_bd,0, 4);
		
		$novadata = $diaNasc."/". $mesNasc . "/". $anoNasc;
	}
	else {

		$novadata = "";
	}

	return $novadata ;
}


function  change_data_from_Br_to_bd($date_bd){
	if($date_bd != "" && $date_bd!= "0000-00-00"){
		$diaNasc = substr($date_bd,0, 2);
		
		$mesNasc = substr($date_bd,3, 2);
		
		$anoNasc = substr($date_bd,6, 4);
		
		$novadata = $anoNasc."-". $mesNasc . "-". $diaNasc;
	}
	else {

		$novadata = "";
	}
	return $novadata ;
}


function print_selected($value, $field){

	if(strtolower($value) == strtolower($field)){

		echo "selected=\"selected\"";
	}
}

function numeroDiasMes($mes){
	$retorno = "";
	switch($mes){

		case 1:
		case 3:
		case 5:
		case 7:
		case 8:
		case 10:
		case 12:
				
			$retorno = 31;
			break;
		case 2:
			$retorno = 28;
			break;
		default:
				
			$retorno = 30;
			break;

	}

	return $retorno;

}
function atualizarSenha(){
	$usuario = $_POST["txtUsuario"];
	$senha = md5($_POST["txtNovaSenha"]);
	$senha_antiga = md5($_POST["txtSenhaAtual"]);
	//$confirmaSenha = $_POST["txtConfirmaSenha"];

	$sql_test = "select * from usuarios where senha = '".$senha_antiga."' and login = '".$usuario."'";
	$result_test = mysql_query($sql_test);
	if(mysql_num_rows($result_test) != 0){

		$sql = "UPDATE usuarios SET senha = '".$senha."'
									  where login = '".$usuario."'
									  
									  ";

		return mysql_query($sql) or die(mysql_error());
	}
	else{
		return 0;
	}
}

function getCamposTabela($tabela){
	
	$sql_describe = "describe ".$tabela;
	$result_describe = mysql_query($sql_describe);
	$arr_colunas = "";
	$cont = 0;
	while($row_describe = mysql_fetch_array($result_describe)){
		$arr_colunas[$cont] = $row_describe["Field"];
//		echo $arr_colunas[$cont];
		$cont++;
	}
	
	return $arr_colunas;


}

function insertInTo($campos, $valores, $tabela){
	
	$sql = "insert into ".$tabela." (".$campos.") values(".utf8_decode($valores).")";
	
	if(mysql_query($sql)){
		return true;
	}
	else{
		return false;
	}
	
	
	
	
	
}


function selectFrom($tabela, $campos, $where){
	
	if(isset($where) && $where != ""){
	$sql = "select ".$campos." from ". $tabela ." where ". $where;
	}
	else{
		$sql = "select ".$campos." from ". $tabela ;
	}
//	echo $sql;
	if($result = mysql_query($sql)){
		return $result;
	}
	else{
		return false;
	}
	
}

function removeAcentosXML($xml){
	
	
	
$sql_novo = $xml;

$sql_novo = str_replace("Ç", "C", $sql_novo);
$sql_novo = str_replace("Ã", "A", $sql_novo);
$sql_novo = str_replace("Á", "A", $sql_novo);
$sql_novo = str_replace("À", "A", $sql_novo);
$sql_novo = str_replace("Ä", "A", $sql_novo);
$sql_novo = str_replace("Â", "A", $sql_novo);
$sql_novo = str_replace("'", "", $sql_novo);
//$sql_novo = str_replace("\"", "", $sql_novo);
$sql_novo = str_replace("\\", "", $sql_novo);
$sql_novo = str_replace("Ê", "E", $sql_novo);
$sql_novo = str_replace("É", "E", $sql_novo);
$sql_novo = str_replace("È", "E", $sql_novo);
$sql_novo = str_replace("Ë", "E", $sql_novo);
$sql_novo = str_replace("Í", "I", $sql_novo);
$sql_novo = str_replace("Ì", "I", $sql_novo);
$sql_novo = str_replace("Ï", "I", $sql_novo);
$sql_novo = str_replace("Î", "I", $sql_novo);
$sql_novo = str_replace("Ó", "O", $sql_novo);
$sql_novo = str_replace("Ô", "O", $sql_novo);
$sql_novo = str_replace("Ò", "O", $sql_novo);
$sql_novo = str_replace("Ö", "O", $sql_novo);
$sql_novo = str_replace("Õ", "O", $sql_novo);
$sql_novo = str_replace("Ú", "U", $sql_novo);
$sql_novo = str_replace("Ü", "U", $sql_novo);
$sql_novo = str_replace("Ù", "U", $sql_novo);
$sql_novo = str_replace("Û", "U", $sql_novo);
$sql_novo = str_replace("~", "", $sql_novo);
$sql_novo = str_replace("¨", "", $sql_novo);
$sql_novo = str_replace("^", "", $sql_novo);
$sql_novo = str_replace("´", "", $sql_novo);
$sql_novo = str_replace("`", "", $sql_novo);
//$sql_novo = str_replace("<", "", $sql_novo);
//$sql_novo = str_replace(">", "", $sql_novo);
$sql_novo = str_replace("&", "E", $sql_novo);
$sql_novo = str_replace("°", "o.", $sql_novo);
//$sql_novo = str_replace("'", "", $sql_novo);

//ereg_replace("[^a-zA-Z0-9_]", $texto, $sql_novo);

return $sql_novo;
}
	
function removeAcentos($texto){
	
$sql_novo = $texto;

$sql_novo = str_replace("Ç", "C", $sql_novo);

$sql_novo = str_replace("ç", "C", $sql_novo);

$sql_novo = str_replace("Ã", "A", $sql_novo);
$sql_novo = str_replace("Á", "A", $sql_novo);
$sql_novo = str_replace("À", "A", $sql_novo);
$sql_novo = str_replace("Ä", "A", $sql_novo);
$sql_novo = str_replace("Â", "A", $sql_novo);

$sql_novo = str_replace("ã", "A", $sql_novo);
$sql_novo = str_replace("á", "A", $sql_novo);
$sql_novo = str_replace("à", "A", $sql_novo);
$sql_novo = str_replace("ä", "A", $sql_novo);
$sql_novo = str_replace("â", "A", $sql_novo);


$sql_novo = str_replace("'", "", $sql_novo);
$sql_novo = str_replace("\"", "", $sql_novo);
$sql_novo = str_replace("\\", "", $sql_novo);
$sql_novo = str_replace("Ê", "E", $sql_novo);
$sql_novo = str_replace("É", "E", $sql_novo);
$sql_novo = str_replace("È", "E", $sql_novo);
$sql_novo = str_replace("Ë", "E", $sql_novo);

$sql_novo = str_replace("ê", "E", $sql_novo);
$sql_novo = str_replace("é", "E", $sql_novo);
$sql_novo = str_replace("è", "E", $sql_novo);
$sql_novo = str_replace("ë", "E", $sql_novo);

$sql_novo = str_replace("í", "I", $sql_novo);
$sql_novo = str_replace("ì", "I", $sql_novo);
$sql_novo = str_replace("ï", "I", $sql_novo);
$sql_novo = str_replace("î", "I", $sql_novo);

$sql_novo = str_replace("Í", "I", $sql_novo);
$sql_novo = str_replace("Ì", "I", $sql_novo);
$sql_novo = str_replace("Ï", "I", $sql_novo);
$sql_novo = str_replace("Î", "I", $sql_novo);

$sql_novo = str_replace("Ó", "O", $sql_novo);
$sql_novo = str_replace("Ô", "O", $sql_novo);
$sql_novo = str_replace("Ò", "O", $sql_novo);
$sql_novo = str_replace("Ö", "O", $sql_novo);
$sql_novo = str_replace("Õ", "O", $sql_novo);

$sql_novo = str_replace("ó", "O", $sql_novo);
$sql_novo = str_replace("ô", "O", $sql_novo);
$sql_novo = str_replace("ò", "O", $sql_novo);
$sql_novo = str_replace("ö", "O", $sql_novo);
$sql_novo = str_replace("õ", "O", $sql_novo);

$sql_novo = str_replace("Ú", "U", $sql_novo);
$sql_novo = str_replace("Ü", "U", $sql_novo);
$sql_novo = str_replace("Ù", "U", $sql_novo);
$sql_novo = str_replace("Û", "U", $sql_novo);

$sql_novo = str_replace("ú", "U", $sql_novo);
$sql_novo = str_replace("ü", "U", $sql_novo);
$sql_novo = str_replace("ù", "U", $sql_novo);
$sql_novo = str_replace("û", "U", $sql_novo);

$sql_novo = str_replace("~", "", $sql_novo);
$sql_novo = str_replace("¨", "", $sql_novo);
$sql_novo = str_replace("^", "", $sql_novo);
$sql_novo = str_replace("´", "", $sql_novo);
$sql_novo = str_replace("`", "", $sql_novo);
$sql_novo = str_replace("<", "", $sql_novo);
$sql_novo = str_replace(">", "", $sql_novo);
$sql_novo = str_replace("&", "E", $sql_novo);
$sql_novo = str_replace("°", "o.", $sql_novo);
$sql_novo = str_replace("º", "o.", $sql_novo);
$sql_novo = str_replace("ª", "a.", $sql_novo);
$sql_novo = str_replace("'", "", $sql_novo);

//ereg_replace("[^a-zA-Z0-9_]", $texto, $sql_novo);

return $sql_novo;
	
}

function get_request($name){
	return trim(removeAcentos($_REQUEST[$name]));
}

function get_post($name){
	return trim(removeAcentos($_POST[$name]));
}

function get_get($name){
	return trim(removeAcentos($_GET[$name]));
}

function limpaPontuacaoDocumento($documento){
	$newDoc= str_replace(".","", $documento);
	$newDoc= str_replace("/", "", $newDoc);
	$newDoc= str_replace("-", "", $newDoc);
	return $newDoc;
}
	

function codificacao($string) {

	return mb_detect_encoding($string.'x', 'UTF-8, ISO-8859-1');

}


function getProperUTF8Encode($texto){
	$strRetorno = (codificacao($texto) == 'UTF-8')? utf8_encode($texto):$texto;
	return $strRetorno;
}

function getProperUTF8Decode($texto){
	return (codificacao($texto) == 'UTF-8')? utf8_decode($texto):$texto;
	
}


?>