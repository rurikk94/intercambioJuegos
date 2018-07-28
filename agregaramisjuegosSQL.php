<?php
require_once './conexion.php';
session_start();

$id_usuario_actual=$_SESSION["ID"];
$id_juego=$_GET["id_juego"];
$id_plataforma=$_GET["id_plataforma"];



     header("Location:misjuegosSQL.php");
	 
	 echo $id_usuario_actual ." ". $id_juego ." ". $id_plataforma ."<br>";

    
//declaramos como variables a los campos de texto del formulario.
$sql=" INSERT INTO `juegos_usuarios` (`id_usuario`, `id_juego`, `id_plataforma`, `precio`, `existe`, `eliminado`) 
								  VALUES  ('".$id_usuario_actual."','".$id_juego."','".$id_plataforma."','0','0','0')";
mysqli_query($conexion,$sql);

echo $sql;




    

      
  

?>