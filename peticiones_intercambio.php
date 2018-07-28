<?php 
session_start();
if(!empty($_SESSION["NombreCompleto"])){
$nombrecompleto=$_SESSION["NombreCompleto"];
$enviadas=$_SESSION["enviadas"];
$recibidas=$_SESSION["recibidas"];

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
				Peticiones enviadas por mi
				<table  class="table table-condensed">
					<tr style="text-align: center" class="success">
					  <!--<th>ID del intercambio</th>-->
					  <th>Juego</th>
					  <th>Dueño</th>
					  <!--<th>id_usuario2</th>-->
					  <th>Fecha</th>
					  <th>Estado</th>
					  <th>Monto a Pagar</th>
					  
					</tr>
					<?php foreach($enviadas as $row){
						$estado="";$nombre="";
							if (($row[5]==0)&&($row[6]==0)){$estado="default";$nombre="En Espera";}
							if ($row[5]==1){$estado="success";$nombre="Aceptado";}
							if ($row[6]==1){$estado="danger";$nombre="Rechazado";}
					?>
					<tr class="active width=3500">
					  <!--<td><?//=$row[0]?></td>-->
					  <td><?=$row[1]?></td>
					  <td><?=$row[2]?></td>
					  <!--<td><?//=$row[3]?></td>-->
					  <td><?=$row[4]?></td>
					  <td><span class="label label-<?=$estado?>"><?=$nombre?></span></td>
					  <td><?=$row["precio"]?></span></td>
					</tr>
					<?php
					}
					?>
				</table>
				Peticiones recibidas
				<table  class="table table-condensed">
					<tr class="success">
					 <!-- <th>ID del intercambio</th>-->
					  <th>Juego</th>
					  <!--<th>id_usuario_dueno</th>-->
					  <th>Quién Intercambia</th>
					  <th>Fecha</th>
					  <th COLSPAN="2">Estado </th>
					  <th>Monto a Recibir</th>
					  
					</tr>
					<?php 
						foreach($recibidas as $row){
						$estado = "active";$estado1 = $estado;$estado2 = $estado; $btn1nombre="Aceptar"; $btn2nombre="Rechazar";
							if ($row[6]==1){$estado1="invisible";$estado2="disabled"; $btn2nombre="Rechazado";}
							if ($row[5]==1){$estado1="disabled";$estado2="invisible"; $btn1nombre="Aceptado";}
					?>
					<tr>
					  <!--<td><?//=$row[0]?></td>-->
					  <td><?=$row[1]?></td>
					  <!--<td><?//=$row[2]?></td>-->
					  <td><?=$row[3]?></td>
					  <td><?=$row[4]?></td>
					  <td><a href="peticiones_intercambioSQL.php?id_intercambio=<?=$row[0]?>&peticion=aceptar&id_nuevo_dueno=<?=$row[7]?>&monto=<?=$row['precio']?>&nombre_juego='<?=$row[1]?>'&nombreUsuarioNuevo=<?=$row[3]?>" class="btn btn-success <?=$estado1?>" role="button"><?=$btn1nombre?></a> <?//=$row[5]?></td>
					  <td><a href="peticiones_intercambioSQL.php?id_intercambio=<?=$row[0]?>&peticion=rechazar" class="btn btn-danger <?=$estado2?>" role="button"><?=$btn2nombre?></a> <?//=$row[6]?></td>
					  <td><?=$row["precio"]?></span></td>
					 
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