<?php
require_once './conexion.php';
session_start();




$nombre_categoria=$_POST["nombre_categoria"];




     header("Location:agregar_categoria.php");

    
    
//declaramos como variables a los campos de texto del formulario.


mysqli_query($conexion,"INSERT INTO categoria (nombre_categoria) VALUES ('".$nombre_categoria."')");




    

      
  

?>