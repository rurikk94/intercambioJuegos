<?php 
session_start();
if(!empty($_SESSION["NombreCompleto"])){
$nombrecompleto=$_SESSION["NombreCompleto"];
?>
<!DOCTYPE HTML>
<html>
<head>
<?php include("head.php"); // incluyes el archivo head.php ?>
<title>Agregar Categoria</title>

<body style="background-color:#000000;">
<?php include("menus.php");// incluyes el archivo menus.php ?>
<div class="container-fluid">
    <div class="row" >
        <div class="col-xs-8 col-xs-offset-2">
            <form action="agregarcategoriaSQL.php" style="color: black" method="post" enctype="multipart/form-data" onKeypress="if(event.keyCode == 13) event.returnValue = false;">
                <ol>
                
               
                <h3><li>Ingresar Categoria</li></h3>
                <div id="TCP_AP">
                <input type="text" class="form-control" id="ejemplo_preg" name="nombre_categoria" value="">
                    <br /> 
        <br />
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
   header("Location: index.php");  
}
?>