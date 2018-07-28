<?php
session_start();
header ("Location:detallesUsuario.php");
require('conexion.php');

$id_usuario="";
if(!empty($_GET["id_usuario"])){ $id_usuario=$_GET["id_usuario"];}

$sql="SELECT * 
FROM usuario
WHERE id_usuario=".$id_usuario;

  $resultado=mysqli_query($conexion,$sql) or
                die("Problemas en el select:".mysqli_error($conexion));
                
    $array = array();
    while($row = mysqli_fetch_array($resultado)) {
        $array[] = $row;
    }
    
    $_SESSION["datosOtroUsuario"]=$array;
	
	echo "Datos del Usuario<br>";
	echo $sql;
    




?>