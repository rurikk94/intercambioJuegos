<?php
session_start();
header ("Location:modificarUsuario.php");
require('conexion.php');
$id=$_SESSION["ID"];



$sql="UPDATE usuario 
SET nombres = '".$_POST['nombres']."',
	apellidos = '".$_POST['apellidos']."',
	url_perfil = '".$_POST['url_perfil']."',
	url_banner = '".$_POST['url_banner']."',
	bio = '".$_POST['bio']."',
	ciudad = '".$_POST['ciudad']."',
	email = '".$_POST['email']."'
WHERE id_usuario=$id ";

echo $sql;



mysqli_query($conexion,$sql);
?>