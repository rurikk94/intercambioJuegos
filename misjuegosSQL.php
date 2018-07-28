<?php
session_start();
header ("Location:misjuegos.php");
require('conexion.php');

$id_usuario_actual=$_SESSION["ID"];

$peticion="";$id_juego_usuario="";$precio="";
if(!empty($_GET["peticion"])){ $peticion=$_GET["peticion"];}
if(!empty($_GET["id_juego_usuario"])){ $id_juego_usuario=$_GET["id_juego_usuario"];}
if(!empty($_GET["precio"])){ $precio=$_GET["precio"];}

//-----------------------------------------

if ($peticion=='compartir'){
	$sql = "UPDATE `juegos_usuarios` SET `existe` = '01' WHERE `juegos_usuarios`.`id` = ".$id_juego_usuario;
	
	mysqli_query($conexion,$sql);
	echo "compartir <br>". $sql;
}

if ($peticion=='nocompartir'){
	$sql = "UPDATE `juegos_usuarios` SET `existe` = '00' WHERE `juegos_usuarios`.`id` = ".$id_juego_usuario;
	
	mysqli_query($conexion,$sql);
	echo "nocompartir <br>". $sql;
}

if ($peticion=='borrar'){
	$sql = "UPDATE `juegos_usuarios` SET `eliminado` = '01' WHERE `juegos_usuarios`.`id` = ".$id_juego_usuario;
	
	mysqli_query($conexion,$sql);
	echo "borrar <br>". $sql;
}

if ($peticion=='cambiarPrecio'){
	$sql = "UPDATE `juegos_usuarios` SET `precio` = '".$precio."' WHERE `juegos_usuarios`.`id` = ".$id_juego_usuario;
	
	mysqli_query($conexion,$sql);
	echo "cambiarPrecio <br>". $sql;
}


//-----------------------------------------
//sqls tabla 1  Mis juegos
// 8 columnas [0..7]
$sql="SELECT juegos_usuarios.id,juegos_usuarios.id_juego, juegos.nombre_juego,juegos.cover,plataforma.nombre_plataforma,existe,eliminado,juegos_usuarios.precio 'precio'
FROM `juegos_usuarios`
inner join juegos on juegos.id_juego= juegos_usuarios.id_juego
inner join plataforma on plataforma.id= juegos_usuarios.id_plataforma
where id_usuario = $id_usuario_actual and eliminado = 0 order by juegos.nombre_juego
";

    $resultadojuegos=mysqli_query($conexion,$sql) or
                die("Problemas en el select:".mysqli_error($conexion));
                
    $array = array();
    while($row = mysqli_fetch_array($resultadojuegos)) {
        $array[] = $row;
    }
    
    $_SESSION["misjuegos"]=$array;
	
	echo "Mis juegos<br>";
	echo $sql;
    

?>