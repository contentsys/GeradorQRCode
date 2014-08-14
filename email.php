<?php
$param = $_GET["param"];

list ($nome, $email, $telefone) = explode("FIMCAMPO",$param);

$to      = "contato@juiceintime.com";
$subject = "Solicitacao via QR Code";
$message = "Ola, alguem efetuou uma solicitacao vi QR Code!" ."\n\nSegue abaixo os dados para contato:" ."\nEmpresa: ".$nome . "\n"."Email: ".$email . "\n"
			."Telefone: ". $telefone; 
$headers = "From: Suporte QRCode <no-reply@juiceintime.com>" . "\r\n" .
		"Reply-To: $nome <$email>" . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if(mail($to, $subject, $message, $headers)){
	header("Location: ok.php");
}else {
	echo "Ocorreu algum erro, tente novamente mais tarde!";
}
?>