<?php
require_once './conexion.php';
session_start();



$nombrecompleto=$_SESSION["NombreCompleto"];
$id_usuario_actual=$_SESSION["ID"];
$id_juego_usuario=$_GET["id_juego_usuario"];
$id_usuario_dueno=$_GET["id_usuario_dueno"];
$precio=$_GET["precio"];




    header("Location:peticiones_intercambioSQL.php");

    
    
//declaramos como variables a los campos de texto del formulario.

$sql="INSERT INTO intercambios (id_juego_usuario,id_usuario_dueno,id_usuario2,precio) VALUES (".$id_juego_usuario.",".$id_usuario_dueno.",".$id_usuario_actual.",".$precio.");";
echo $sql;
mysqli_query($conexion,$sql);



$sql="select usuario, email from usuario where id_usuario=$id_usuario_dueno";

$resultadoemail=mysqli_query($conexion,$sql) or
                die("Problemas en el select:".mysqli_error($conexion));
                
    $array100 = array();
    while($row100 = mysqli_fetch_array($resultadoemail)) {
        $array100[] = $row100;
    }
    
	
	echo $sql;
	
	
	foreach($array100 as $row100){
						
						$email=$row100["email"];
						$nombre=$row100["usuario"];
				}
	
	
	
require('mail.php');	




    

      
  

?>