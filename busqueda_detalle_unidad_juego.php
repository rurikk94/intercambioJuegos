<?php
session_start();
header ("Location:detalle_unidad_juego.php");
require('conexion.php');
$sql="SELECT juegos_usuarios.id,usuario.nombres,juegos.nombre_juego,plataforma.nombre_plataforma,precio,juegos_usuarios.id_usuario 'id_usuario'
			FROM `juegos_usuarios`
			INNER JOIN juegos ON juegos_usuarios.id_juego = juegos.id_juego
			INNER JOIN usuario ON juegos_usuarios.id_usuario = usuario.id_usuario
			INNER JOIN plataforma ON juegos_usuarios.id_plataforma = plataforma.id
			INNER JOIN categoria ON juegos.id_categoria = categoria.id_categoria
			WHERE existe=1 and eliminado=0 AND NOT juegos_usuarios.id_usuario = ".$_SESSION["ID"];
if(!empty($_GET["q"])){
	$nombre=$_GET['q'];
	$sql.=" and juegos.nombre_juego='$nombre'";
}
if(!empty($_GET["p"])){
	$p=$_GET["p"];
	$sql.=" and plataforma.nombre_plataforma like '%$p%'";
}
if(!empty($_GET["c"])){
	$c=$_GET["c"];
	$sql.=" and categoria.nombre_categoria like '%$c%'";
}
	//echo $sql;
    $resultadojuegos=mysqli_query($conexion,$sql) or
                die("Problemas en el select:".mysqli_error($conexion));
                
    $array = array();
    while($row = mysqli_fetch_array($resultadojuegos)) {
        $array[] = $row;
    }
    
    $_SESSION["juego"]=$array;
	//mysqli_close($conexion);
                
//--------------------------------------
	$sql="select nombre_categoria from categoria";
	$resultadoCategorias=mysqli_query($conexion,$sql) or
                die("Problemas en el select:".mysqli_error($conexion));
                
    $array = array();
    while($row = mysqli_fetch_array($resultadoCategorias)) {
        $array[] = $row;
    }
    
    $_SESSION["categorias"]=$array;
	
	//--------------------------------------
	$sql="select nombre_plataforma from plataforma";
	$resultadoPlataforma=mysqli_query($conexion,$sql) or
                die("Problemas en el select:".mysqli_error($conexion));
                
    $array = array();
    while($row = mysqli_fetch_array($resultadoPlataforma)) {
        $array[] = $row;
    }
    
    $_SESSION["plataformas"]=$array;

?>