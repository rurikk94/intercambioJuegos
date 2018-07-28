<?php
require_once './conexion.php';
session_start();

$nombre_juego=$_POST["nombre_juego"];
$id_categoria=$_POST["id_categoria"];
$descripcion=$_POST["descripcion"];
$ano=$_POST["ano"];
$cover=$_POST["cover"];
$art=$_POST["art"];



     header("Location:Busqueda_T.php");

    echo $id_categoria;
    echo $id_plataforma;
    echo $art;
    
//declaramos como variables a los campos de texto del formulario.
mysqli_query($conexion,"INSERT INTO `juegos` (`nombre_juego`, `id_categoria`, `descripcion`, `ano`, `cover`, `art`) 
								  VALUES  ('".$nombre_juego."','".$id_categoria."','".$descripcion."','".$ano."','".$cover."','".$art."')");




    

      
  

?>