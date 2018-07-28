<?php
session_start();
header ("Location:modificarUsuario.php");
require('conexion.php');
$id=$_SESSION["ID"];

$password=$_POST['contrasena'];
$passwordCodificada = password_hash($password, PASSWORD_DEFAULT);

echo "'".$passwordCodificada."'<br>";



$sql="UPDATE usuario 
SET contrasena = '".$passwordCodificada."'
WHERE id_usuario=$id ";

echo $sql;


mysqli_query($conexion,$sql);

?>