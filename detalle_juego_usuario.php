<?php 
session_start();
if(!empty($_SESSION["NombreCompleto"])){
$nombrecompleto=$_SESSION["NombreCompleto"];
$id_juego_usuario=$_GET["id_juego_usuario"];


require('conexion.php');
	$sql="SELECT juegos_usuarios.id,usuario.nombres,juegos.nombre_juego,plataforma.nombre_plataforma,precio,juegos.descripcion,juegos.cover,juegos.art,juegos_usuarios.id_usuario
			FROM `juegos_usuarios`
			INNER JOIN juegos ON juegos_usuarios.id_juego = juegos.id_juego
			INNER JOIN usuario ON juegos_usuarios.id_usuario = usuario.id_usuario
			INNER JOIN plataforma ON juegos_usuarios.id_plataforma = plataforma.id
			WHERE existe=1 and juegos_usuarios.id=$id_juego_usuario";
    $resultadojuegos=mysqli_query($conexion,$sql) or
                die("Problemas en el select:".mysqli_error($conexion));
                
    $array = array();
    while($row = mysqli_fetch_array($resultadojuegos)) {
        $array[] = $row;
    }
    
    $juego=$array;
        
?>
<!DOCTYPE HTML>
<html>
<?php include("head.php"); // incluyes el archivo head.php ?>
<!--<title>Detalle <?=$id_juego_usuario?></title>-->

<?php
	foreach($juego as $row){
?>
<title>Detalle <?=$row[2]?></title>

<style>
body {
background:url(<?=$row[7]?>) no-repeat center center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
}
	</style>
	<body  style="background-color:#000000;">
<?php include("menus.php");// incluyes el archivo menus.php ?>
<div class="container-fluid">
	<div class="row">
        <div class="col-sm-8"  style="background-color:grey;  opacity: 0.95;">
				<div class="table-responsive">
                    <table class="table">
						  <tr><td>
						  
						  <?php
						  if ($row[4]>$monedero){
							  echo "<button type='button' class='btn btn-danger btn-lg btn-block disabled'>No tiene suficiente dinero</button>";
						  }
						  else{
							  echo "<a href='agregarintercambioSQL.php?id_juego_usuario=".$row[0]."&id_usuario_dueno=".$row[8]."&precio=".$row[4]."'>
									<button type='button' class='btn btn-danger btn-lg btn-block'>Intercambiar</button>";
						  }
						  ?>
						  
								  </a>
						  </td></tr>
						  <tr><td><a href="Busqueda_T.php?q=<?=$row[2]?>"><h2><?=$row[2]?></h2></a></td></tr>
						  <tr><td>ID <strong><?=$row[0]?></strong></td></tr>
						  <tr><td>Usuario <strong><?=$row[1]?></strong></td></tr>
						  <tr><td>Plataforma <strong><?=$row[3]?></strong></td></tr>
						  <tr><td>Precio <strong><?=$row[4]?></strong></td></tr>
						  <tr><td>Descripción <p><?=$row[5]?></p></td></tr>
						  
						  <!--<img src="<?=$row[7]?>" alt="art" height="480" width="850">-->
					</table>
				</div>
        </div>
		<div class="col-sm-2">
			<img src="<?=$row[6]?>" alt="art"  class="img" width="350" height="480">
        </div>
    </div>
	<?php
		}
	?>
</div>
<?php include("footer.php");// incluyes el archivo footer.php ?>
</body>
</html>
<?php
}else{
   header("Location: index.php");  
}
?>