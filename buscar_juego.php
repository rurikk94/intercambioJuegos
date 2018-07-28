<?php 
session_start();
if(!empty($_SESSION["NombreCompleto"])){
$nombrecompleto=$_SESSION["NombreCompleto"];
$juego=$_SESSION["juego"]; 
$categorias=$_SESSION["categorias"]; 

?>
<!DOCTYPE HTML>
<html>
<?php include("head.php"); // incluyes el archivo head.php ?>
<title>Buscar Juegos</title>

<body class="fondo">
<?php include("menus.php");// incluyes el archivo menus.php ?>
<div class="container-fluid">
	<div class="div text-center">
			<?php 
			foreach($categorias as $row){
			?>
				<div class="btn-group">
					<a href="Busqueda_T.php?c=<?=$row[1]?>">
						<button type="button" class="btn btn-warning"><?=$row[0]?></button>
					</a>
				</div>
			<?php
			}
			?>
	</div>
	<div class="form-group">
	
	<form id="q" action="Busqueda_T.php">
		<label>Nombre:</label>
		<input  type="search" class="form-control" name="q" placeholder="Buscar aquí..." >
		<button type="submit" class="btn btn-primary">Buscar</button>
    </form>
	
	  
	</div>
    <div class="row">
        <div class="col-xs-12" style="padding-right: 0%;">
            <div class="div12" style="display: block;">
                <div id="div2">
                    <table  class="table table-condensed">
                        <tr style="text-align: center" class="success">
                          <!--<td><strong>ID del videojuego</strong></td>-->
                          <td><strong>Nombre del juego</strong></td>
                        <?php foreach($juego as $row){?>
						  
                          <?php  //echo $juego; ?>
                        </tr>
                        <tr class="active width=3500">
                          <!--<td><strong><?//=$row[0]?></strong></td>-->
                          <td><a href="detalle_juego.php?id_juego=<?=$row[0]?>"><strong><?=$row[1]?></strong></a></td>
                         
                        </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
<script src="http://code.jquery.com/jquery.js"></script>
<!-- Javascript core JS -->
<script src="js/bootstrap.min.js"></script>
<?php include("footer.php");// incluyes el archivo footer.php ?>
</body>
</html>
<?php
}else{
   header("Location: index.php");  
}
?>