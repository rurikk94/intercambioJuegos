<?php
require_once './conexion.php';
    session_start();
    
    $nombres = $_POST["Nombres"];
    $apellidos=$_POST["Apellidos"];
    $usuario=$_POST["usuario"];
    $contrasena=$_POST["contrasena"];
    $email=$_POST["email"];
 

 $contrasenaCodificada = password_hash($contrasena, PASSWORD_DEFAULT);


    mysqli_query($conexion,"INSERT INTO usuario (nombres,apellidos,usuario,contrasena,email) VALUES ('".$nombres."','".$apellidos."','".$usuario."','".$contrasenaCodificada."','".$email."')") or
      die("Problemas en el select:".mysqli_error($conexion));
	  
	  
//------------------------------------------------- 
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
$mail->AddAddress($email,$usuario);
$mail->Subject = 'VideoJuegos Bienvenido!';
$mail->Body = 'Gracias por registrarse, su usuario es '.$usuario;
if(!$mail->Send()) {
  echo "Error: " . $mail->ErrorInfo;
} else {
  echo "Enviado!";
}
 //---------------------------
    header ("Location:index.htm");

?>