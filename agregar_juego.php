<?php 
session_start();
if(!empty($_SESSION["NombreCompleto"])){
$nombrecompleto=$_SESSION["NombreCompleto"];

//--------------------------------------
require('conexion.php');
	$sql="select id_categoria,nombre_categoria from categoria";
	$resultadoCategorias=mysqli_query($conexion,$sql) or
                die("Problemas en el select:".mysqli_error($conexion));
                
    $array2 = array();
    while($row = mysqli_fetch_array($resultadoCategorias)) {
        $array2[] = $row;
    }
    
    //$_SESSION["categorias"]=$array;
?>

<!DOCTYPE HTML>
<html>
<?php include("head.php"); // incluyes el archivo head.php ?>
<title>Agregar VideoJuego</title>

<body style="background-color:#000000;">
<?php include("menus.php");// incluyes el archivo menus.php ?>
<div class="container-fluid">
    <div class="row" >
        <div class="col-xs-8 col-xs-offset-2">
            <form action="agregarPreguntaSQL.php" style="color: black" method="post" enctype="multipart/form-data" onKeypress="if(event.keyCode == 13) event.returnValue = false;">
                <ol>
                <h3><li>Categoría del Videojuego</li></h3>
                <ul>
                    <a>
                        <h4><li style="font-weight: bold;">Categoría</li></h4>
                    </a>
					
					
                    <div id="demoA" >
					<?php 
					foreach($array2 as $row){
					?>
						<input type="radio" name="id_categoria" value="<?=$row[0]?>" checked="checked"><?=$row[1]?><br>
					<?php
					}
					?>
                    </div>
                    <a>                    
                        
                    <a>                    
                        
                </ul>
                <h3><li>Ingresar Videojuegos</li></h3>
                <div id="TCP_AP">
                <input type="text" class="form-control" id="ejemplo_preg" name="nombre_juego" value=""  placeholder="Nombre" >
                <input type="text" class="form-control" id="ejemplo_preg" name="descripcion" value=""  placeholder="descripcion" >
                <input type="number" class="form-control" id="ejemplo_preg" name="ano" value=""  min="0" placeholder="ano" >
                <input type="url" class="form-control" id="ejemplo_preg" name="cover" value=""  placeholder="cover url" >
                <input type="url" class="form-control" id="ejemplo_preg" name="art" value=""  placeholder="art url" >
                <button type="submit" class="btn btn-primary btn-lg btn-block">Ingresar</button>
                  
              
                </ol>
            </form>
        </div>
    </div>
    <div class="MenuFinal" style="margin-top: 99px;">
        <h4 class="text-center"></h4>
    </div>

<?php include("footer.php");// incluyes el archivo footer.php ?>
</body>
</html>
<?php
}else{
   header("Location: index.htm");  
}
?>