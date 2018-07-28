<?php 
session_start();
if(!empty($_SESSION["NombreCompleto"])){
$nombrecompleto=$_SESSION["NombreCompleto"];
$juego=$_SESSION["juego"]; 
$categorias=$_SESSION["categorias"]; 
$plataformas=$_SESSION["plataformas"];
?>
<!DOCTYPE HTML>
<html>
<?php include("head.php"); // incluyes el archivo head.php ?>
<title>Detalles Juegos</title>

<body style="background-color:#000000;">
<?php include("menus.php");// incluyes el archivo menus.php ?>
<div class="container-fluid">

    <div class="row">
        <div class="col-xs-12" style="padding-right: 0%;">
			<div class="div text-center">
			<?php 
			foreach($categorias as $row){
			?>
				<div class="btn-group">
					<a href="busqueda_detalle_unidad_juego.php?c=<?=$row[0]?>">
						<button type="button" class="btn btn-warning"><?=$row[0]?></button>
					</a>
				</div>
			<?php
			}
			?>
			</div>
			<div class="div text-center">
			<?php 
			foreach($plataformas as $row){
			?>
				<div class="btn-group">
					<a href="busqueda_detalle_unidad_juego.php?p=<?=$row[0]?>">
						<button type="button" class="btn btn-primary  btn-success"><?=$row[0]?></button>
					</a>
				</div>
			<?php
			}
			?>
			</div>
            <div class="div">
                    <table  class="table table-condensed">
                        <tr style="text-align: center" class="success">
                          <!--<td><strong>ID de venta</strong></td>-->
                          <td><strong>Usuario</strong></td>
                          <td><strong>Videojuego</strong></td>
                          <td><strong>Plataforma</strong></td>
                          <td><strong>Precio</strong></td>
                        </tr>
                        <?php 
							foreach($juego as $row){
						?>
							<tr class="active width=3500">
							  <!--<td><strong><?//=$row[0]?></strong></td> -->
							  <td><a href="detallesUsuarioSQL.php?id_usuario='<?=$row["id_usuario"]?>'"><strong><?=$row[1]?></strong></a></td> 
							  <td><a href="detalle_juego_usuario.php?id_juego_usuario=<?=$row[0]?>"><strong><?=$row[2]?></strong></a></td>
							  <td><strong><?=$row[3]?></strong></td>
							  <td><strong><?=$row[4]?></strong></td>
							 
							</tr>
                        <?php
							}
                        ?>
                    </table>
            </div>
        </div>
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