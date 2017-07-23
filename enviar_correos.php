<!DOCTYPE html>
<html>
<head>
	<title>Envío de mails con PHP</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>

<?php

$cuerpo = '
<html>
<head>
 <title></title>
</head>
<body>
'.$_POST['cuerpo'].'
</body>
</html>
';

//para el envío en formato HTML
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

//dirección del remitente
$headers .= "From: ".$_POST['nombre']." <".$_POST['emisor'].">\r\n";

//Una Dirección de respuesta, si queremos que sea distinta que la del remitente
//$headers .= "Reply-To: ejemplo@hotmail.com\r\n";

//Direcciones que recibián copia
//$headers .= "Cc: ejemplo2@gmail.com\r\n";

//direcciones que recibirán copia oculta
//$headers .= "Bcc: ejemplo3@yahoo.com\r\n";
if(isset($_POST['enviar'])){
	if(mail($_POST['receptor'],$_POST['asunto'],$cuerpo,$headers)){
		echo "<script>alert('Email enviado correctamente');</script>";
	}else{
		echo "<script>alert('No se pudo enviar el mail.');</script>";
	}
}
?>
	<form method="post">

    	<div style="background-color:#09C; width:50%; font-family:Verdana, Geneva, sans-serif; border-radius:5px;">
        	<h1>Formulario de envio de mails atravez de PHP</h1>
            <label>Asunto</label><br>
            <input type="text" size="55" name="asunto" value="" required autofocus style=" border-radius:5px;" placeholder="Asunto" ><br>
            <label>De</label><br>
            <input type="text" size="25" name="nombre" value="" required style=" border-radius:5px;" placeholder="Tu Nombre" >
            <input type="email" size="25" name="emisor" required style=" border-radius:5px;" placeholder="Email remitente" ><br>
            <label>Para</label><br>
            <input type="text" size="55" name="receptor" required style=" border-radius:5px;" placeholder="Email destinatario">
            <label>Si quieres enviar a varios emails, separalos con una coma ",".</label><br>
            <label>Cuerpo</label><br>
            <textarea name="cuerpo" style=" border-radius:5px;" placeholder="Contenido del mensaje" cols="40" rows="10"></textarea><br>
            <input type="submit" name="enviar" value="Enviar">
            <br><br>
        </div>
        <h2><a href="http://codigoweblibre.wordpress.com/" target="_blank">http://codigoweblibre.wordpress.com/</a></h2>
        <h2><a href="http://codigoweblibre.comli.com" target="_blank">http://codigoweblibre.comli.com/</a></h2>
    </form>    
</body>
</html>

