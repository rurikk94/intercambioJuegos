<?php
session_start();
header ("Location:peticiones_intercambio.php");
require('conexion.php');

$id_usuario_actual=$_SESSION["ID"];


//aceptar /rechazar solicitud
//recibe peticion,id_intercambio por get
$id_intercambio="";$peticion="";$id_nuevo_dueno="";
if(!empty($_GET["id_intercambio"])){ $id_intercambio=$_GET["id_intercambio"];}
if(!empty($_GET["peticion"])){ $peticion=$_GET["peticion"];}
if(!empty($_GET["id_nuevo_dueno"])){ $id_nuevo_dueno=$_GET["id_nuevo_dueno"];}
if(!empty($_GET["monto"])){ $monto=$_GET["monto"];}
if(!empty($_GET["nombre_juego"])){ $nombre_juego=$_GET["nombre_juego"];}
if(!empty($_SESSION["NombreCompleto"])){ $nombreUsuarioActual=$_SESSION["NombreCompleto"];}
if(!empty($_GET["nombreUsuarioNuevo"])){ $nombreUsuarioNuevo=$_GET["nombreUsuarioNuevo"];}

if ($peticion=='rechazar'){
	$sql = "UPDATE `intercambios` SET `leido` = '01' WHERE `intercambios`.`id` = ".$id_intercambio;
	
	mysqli_query($conexion,$sql);
	echo "rechazar <br>". $sql;
}
if ($peticion=='aceptar'){
	$sql = "UPDATE `intercambios` SET `aceptado` = '01' WHERE `intercambios`.`id` = ".$id_intercambio."; ";
	mysqli_query($conexion,$sql);
	echo "Aceptar <br>". $sql." <br>";
	
	$sql = "UPDATE `juegos_usuarios` SET `id_usuario` = '".$id_nuevo_dueno."',existe=0 WHERE id = (select id_juego_usuario from intercambios where id=".$id_intercambio.");";
	mysqli_query($conexion,$sql);
	echo "Aceptar <br>". $sql." <br>";
	
	$sql = "UPDATE `usuario` SET `monedero` = monedero-'".$monto."' WHERE id_usuario = $id_nuevo_dueno;";
	mysqli_query($conexion,$sql);
	echo "Aceptar <br>". $sql." <br>";
	
	$sql = "UPDATE `usuario` SET `monedero` = monedero+'".$monto."'  WHERE id_usuario = $id_usuario_actual;";
	mysqli_query($conexion,$sql);
	echo "Aceptar <br>". $sql." <br>";
	
	$sql = "INSERT INTO `transacciones`  (id_usuario, tipo, monto,descripcion) VALUES ($id_nuevo_dueno,'CARGO',".$monto.",'Compra de juego ".$nombre_juego." a ".$nombreUsuarioActual."');";
	mysqli_query($conexion,$sql);
	echo "Aceptar <br>". $sql." <br>";
	
	$sql = "INSERT INTO `transacciones`  (id_usuario, tipo, monto,descripcion) VALUES ($id_usuario_actual,'ABONO',".$monto.",'Venta de juego ".$nombreJuego." a ".$nombreUsuarioNuevo."');";
	mysqli_query($conexion,$sql);
	echo "Aceptar <br>". $sql." <br>";
	
}



//-----------------------------------------
//sqls tabla 1  Peticiones enviadas por mi 

$sql="select intercambios.id,juegos.nombre_juego,u1.nombres,u2.nombres,fecha,aceptado,leido,borrado,intercambios.precio
	FROM intercambios
			INNER JOIN juegos_usuarios ON juegos_usuarios.id = intercambios.id_juego_usuario
			INNER JOIN juegos ON juegos.id_juego = juegos_usuarios.id_juego
			INNER JOIN usuario u1 ON u1.id_usuario = intercambios.id_usuario_dueno
			INNER JOIN usuario u2 ON u2.id_usuario = intercambios.id_usuario2
	WHERE borrado=0 and id_usuario2=$id_usuario_actual order by fecha desc
";

    $resultadojuegos=mysqli_query($conexion,$sql) or
                die("Problemas en el select:".mysqli_error($conexion));
                
    $array = array();
    while($row = mysqli_fetch_array($resultadojuegos)) {
        $array[] = $row;
    }
    
    $_SESSION["enviadas"]=$array;
	
	echo "Peticiones enviadas por mi<br>";
	echo $sql;
	echo "<br>";
    
//---------------------------------	
//sqls tabla 2 Peticiones recibidas

$sql2="select intercambios.id,juegos.nombre_juego,u1.nombres,u2.nombres,fecha,aceptado,leido,intercambios.id_usuario2,borrado,intercambios.precio 
	FROM intercambios
			INNER JOIN juegos_usuarios ON juegos_usuarios.id = intercambios.id_juego_usuario
			INNER JOIN juegos ON juegos.id_juego = juegos_usuarios.id_juego
			INNER JOIN usuario u1 ON u1.id_usuario = intercambios.id_usuario_dueno
			INNER JOIN usuario u2 ON u2.id_usuario = intercambios.id_usuario2
	WHERE borrado=0 and id_usuario_dueno=$id_usuario_actual order by fecha desc
";

    $resultadojuegos=mysqli_query($conexion,$sql2) or
                die("Problemas en el select:".mysqli_error($conexion));
                
    $array = array();
    while($row = mysqli_fetch_array($resultadojuegos)) {
        $array[] = $row;
    }
    
    $_SESSION["recibidas"]=$array;
	echo "Peticiones recibidas<br>";
	echo $sql2;

?>