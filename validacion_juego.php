<?php 
session_start();
if(!empty($_SESSION["NombreCompleto"])){
$nombrecompleto=$_SESSION["NombreCompleto"];
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8"/>
	<meta name="author" content="www.intercambiosvirtuales.org" />
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="estilo.css" rel="stylesheet">
    <link href='videojuegos-.jpg' rel='shortcut icon' type='image/png'>

 
    <!--<script type="text/javascript" src="https://latex.codecogs.com/integration/ckeditor_v4.4.7/ckeditor.js"></script>-->
    <!--<script type="text/javascript" src="ckeditor/ckeditor4/plugins/ckeditor_wiris/core/display.js"></script>-->
	<!--<script type="text/javascript" src="./ckeditor4/plugins/ckeditor_wiris/integration/WIRISplugins.js?viewer=image"></script> -->
	<!--<script type="text/javascript" src="ckeditor/ckeditor4/ckeditor.js"></script>-->


	<title>Agregar Videojuego</title>
</head>

<body style="background-color:#000000;">
<div class="container-fluid">
    <div class="franja"></div>
    <div class="menu">
        <div class="row">
            <div class="col-xs-3">
                <img src="icono.png" alt="Logo" id="imagen"/>
            </div>
            <div class="col-xs-7" id="texto">
                <h1 class="titulo">Bienvenido/a <?=$nombrecompleto?></h1>
                <h3 class="titulo2">En esta página podrá agregar los videojuegos que quieras.</h3>
            </div>
            <div class="col-xs-2" id="texto" style="padding-top: 1%;">
                <h4 class="sesion"><b>Sesion Iniciada</b></h4>
                <h4  class="sesion" style="padding-top: 30px;"><a type="submit" href="CambiarContrasena.php" style="color: white; width:100px; height:100px" onMouseover="this.style.color='blue'" onMouseout="this.style.color='white'">Cambiar Contraseña</a></h4>
            </div>
        </div>
    </div>
   
        
    <div class="row" >
        <div  class="col-xs-8 col-xs-offset-2" style="font-size:27px;">
        <b>El videojuego fue agregado correctamente.</b>
            
        </div>
    </div>
    <div class="MenuFinal" style="margin-top: 99px;">
        <h4 class="text-center"></h4>
    </div>

</body>
</html>
<?php
}else{
   header("Location: index.htm");  
}
?>