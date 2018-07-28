<?php
//$email=$_GET["email"];
//$nombre=$_GET["nombre"];

require 'PHPMailerAutoload.php';
/*Lo primero es añadir al script la clase phpmailer desde la ubicación en que esté*/
//require '../class.phpmailer.php';
 
//Crear una instancia de PHPMailer
$mail = new PHPMailer();
//Definir que vamos a usar SMTP
$mail->IsSMTP();
//Esto es para activar el modo depuración. En entorno de pruebas lo mejor es 2, en producción siempre 0
// 0 = off (producción)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug  = 0;
$mail->Host       = 'smtp.gmail.com';
$mail->Port       = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth   = true;
$mail->Username   = "videojuegos01vina@gmail.com";
$mail->Password   = "videojuegos01";
$mail->SetFrom('videojuegos@gmail.com', 'VideoJuegos');
$mail->AddAddress($email,$nombre);
$mail->Subject = 'VideoJuegos Notificacion!';
$mail->Body = 'Le ha llegado una petición de intercambio!';
if(!$mail->Send()) {
  echo "Error: " . $mail->ErrorInfo;
} else {
  echo "Enviado!";
}

?>