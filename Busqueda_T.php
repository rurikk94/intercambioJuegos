<?php
session_start();
header ("Location:buscar_juego.php");
require('conexion.php');

$sql="Select id_juego,nombre_juego from juegos";
if(!empty($_GET["q"])){
	$nombre=$_GET["q"];
	$sql .=" where nombre_juego like '%$nombre%'";
}
if(!empty($_GET["c"])){
	$c=$_GET["c"];
	$sql .=" where id_categoria =$c";
}

    $resultadojuegos=mysqli_query($conexion,$sql) or
                die("Problemas en el select:".mysqli_error($conexion));
                
    $array = array();
    while($row = mysqli_fetch_array($resultadojuegos)) {
        $array[] = $row;
    }
    
    $_SESSION["juego"]=$array;
	
	echo $sql;
                

//--------------------------------------
	$sql="select nombre_categoria,id_categoria from categoria";
	$resultadoCategorias=mysqli_query($conexion,$sql) or
                die("Problemas en el select:".mysqli_error($conexion));
                
    $array = array();
    while($row = mysqli_fetch_array($resultadoCategorias)) {
        $array[] = $row;
    }
    
    $_SESSION["categorias"]=$array;

?>