<?php 
session_start();
if(!empty($_SESSION["NombreCompleto"])){
$nombrecompleto=$_SESSION["NombreCompleto"];
$misjuegos=$_SESSION["misjuegos"];

?>



<!DOCTYPE HTML>
<html>
<head>
<?php include("head.php"); // incluyes el archivo head.php ?>
<title>Peticiones de Intercambio</title>

<body style="background-color:white;">
<?php include("menus.php");// incluyes el archivo menus.php ?>
<div class="container-fluid">
    <div class="row">
		<div class="col-xs-12">
				Mis Juegos
				<table  class="table table-condensed">
					<tr style="text-align: center" class="success">
					  <!--<th>id_juego_usuario</th>
					  <th>id_juego</th>-->
					  <th>Juego</th>
					  <th></th>
					  <th>Plataforma</th>
					  <th></th>
					  <th></th>
					  <th>Precio</th>
					  <th></th>
					  
					</tr>
					<?php
					$compartir="compartir";
					foreach($misjuegos as $row){
							$estado = "active";$btn1nombre="Compartir";
							if ($row[5]==1){$btn1nombre="No Compartir";
											$compartir="nocompartir";}
					?>
					<tr  style="height:220px;" class="active width=3500">
					  <!--<td><?//=$row[0]?></td>
					  <td><?//=$row[1]?></td>-->
					  <td><?=$row[2]?></td>
					  <td>
					  
					  <div style="position:relative"><img src="<?=$row[3]?>" height="200" width="150" hspace="16" vspace="16" /><div style="position:absolute; top:0; left:0;"><a href="Busqueda_T.php?q='<?=$row[2]?>'"><img border="0"  src="<?=$row[4]?>.png"  height="240" width="180"/></a></div></div>
					  </td>
					  <td><?=$row[4]?></td>
					  <td><a href="misjuegosSQL.php?peticion=<?=$compartir?>&id_juego_usuario=<?=$row[0]?>" class="btn btn-success <?=$estado1?>" role="button"><?=$btn1nombre?></a></td>
					  <td><a href="misjuegosSQL.php?peticion=borrar&id_juego_usuario=<?=$row[0]?>" class="btn btn-danger" role="button">Borrar</a></td>
					  
				  <form action="/misjuegosSQL.php" method="get">
					  <td><input type="text" name="peticion" min="0" value="cambiarPrecio" hidden></td>
					  <td>$<input type="number" name="precio" min="0" value="<?=$row['precio']?>"></td>
					 <td><input type="number" name="id_juego_usuario" min="0" value="<?=$row[0]?>" hidden></td>
					  <td><input type="submit" class="btn btn-info" value="Cambiar Precio" ></td>
				  </form>
					 
					</tr>
					<?php
					}
					?>
				</table>
		
		
		</div>
    </div>
<?php include("footer.php");// incluyes el archivo footer.php ?>
</body>
</html>
<?php
}else{
   header("Location: index.php");  
}
?>