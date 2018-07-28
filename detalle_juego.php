	<?php 
session_start();
if(!empty($_SESSION["NombreCompleto"])){
$nombrecompleto=$_SESSION["NombreCompleto"];
$id_juego=$_GET["id_juego"];


require('conexion.php');
	$sql="SELECT juegos.id_juego,juegos.nombre_juego,juegos.descripcion,juegos.cover,juegos.art
			FROM `juegos`
			WHERE juegos.id_juego=$id_juego";
    $resultadojuegos=mysqli_query($conexion,$sql) or
                die("Problemas en el select:".mysqli_error($conexion));
                
    $array = array();
    while($row = mysqli_fetch_array($resultadojuegos)) {
        $array[] = $row;
    }
    
    $juego=$array;
	
	
	$sql="select id,nombre_plataforma from plataforma";
	$resultadoCategorias=mysqli_query($conexion,$sql) or
                die("Problemas en el select:".mysqli_error($conexion));
                
    $array3 = array();
    while($row = mysqli_fetch_array($resultadoCategorias)) {
        $array3[] = $row;
    }
        
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
        <div class="col-sm-8"  style="background-color:white;  opacity: 0.95;">
		
				
				<form action="agregaramisjuegosSQL.php?id_juego=<?=$id_juego?>" style="color: black" method="get" enctype="multipart/form-data" onKeypress="if(event.keyCode == 13) event.returnValue = false;">
						    <select name="id_plataforma">
								<?php 
								foreach($array3 as $row3){
								?> 
									  <option value="<?=$row3[0]?>"><?=$row3[1]?></option>
								<?php
								}
								?>	
							</select> 
							
							<input type="hidden" name="id_juego" value="<?php echo $id_juego;?>" id="id_juego" />
							
							<button type="submit" class="btn btn-primary btn-lg">Agregar a mis juegos</button>
				   </form>
		
				<div class="table-responsive">
                    <table class="table">
						  <tr><td>ID <strong><?=$row[0]?></strong></td></tr>
						  <tr><td>Nombre <strong><?=$row[1]?></strong></td></tr>
						  <tr><td>Descripción <p><?=$row[2]?></p></td></tr>
						  <tr><td><a href="busqueda_detalle_unidad_juego.php?q=<?=$row[1]?>">
						  
						   <button type="button" class="btn btn-primary btn-lg btn-block">Ver ofertas de intercambio</button>
						   </a></td></tr>
						   
						  
						  <img src="<?=$row[4]?>" alt="fanart"  class="img-fluid" height="480" width="850">
					
						
					</table>
				
				
				
				</div>
				
				
		</div>
		<div class="col-sm-2">
			<img src="<?=$row[3]?>" alt="cover"  class="img-rounded" width="350" height="480">
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