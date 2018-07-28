<?php 
session_start();
if(!empty($_SESSION["nombres"])){
$nombre=$_SESSION["nombres"];
$apellidos=$_SESSION["apellidos"];
require('conexion.php');

?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8"/>
	<meta name="author" content="www.intercambiosvirtuales.org" />
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="estilo.css" rel="stylesheet">
    <link href='iconoH.png' rel='shortcut icon' type='image/png'>

	<title>Registro de Usuario</title>
</head>

<body class="fondo">
<div class="container-fluid">
    <div class="franja"></div>
    <div class="menu">
        <div class="row">
            <div class="col-xs-3">
                <img src="icono.png" alt="Insignia" id="imagen"/>
            </div>
            <div class="col-xs-7" id="texto">
                <h1 class="titulo">Bienvenido Profesor <?=$nombrecompleto?></h1>
                <h3 class="titulo2">Colegio Esperanza de Quilpué</h3>
            </div>
            <div class="col-xs-2" id="texto" style="padding-top: 1%;">
                <h4 class="sesion"><b>Sesion Iniciada</b></h4>
                <h4  class="sesion" style="padding-top: 30px;"><a type="submit" href="CambiarContrasena.php" style="color: white; width:100px; height:100px" onMouseover="this.style.color='blue'" onMouseout="this.style.color='white'">Cambiar Contraseña</a></h4>
            </div>
        </div>
    </div>
    <div class="menu">
        <div class="row">
            <div class="col-xs-12">
                <div class="tamaño">
                    <div class="btn-group">
                      <a type="submit" href='Crear_Prueba.php' class="btn btn-primary btn-lg">Crear Prueba</a>
                      <a type="submit" href='Agregar_Pregunta.php' class="btn btn-primary btn-lg">Agregar Pregunta</a>
                      <div class="btn-group">
                          <button type="button" class="btn btn-primary btn-lg dropdown-toggle" data-toggle="dropdown">Visualizar Preguntas<span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="Busqueda_T.php">Buscar Todas</a></li>
                            <li class="divider"></li>
                            <li><a href="Visualizacion_Busq.php">Busca Específica</a></li>
                          </ul>
                      </div>
                      <a type="submit" href='Corregir_Prueba.php' class="btn btn-primary btn-lg">Corregir Prueba</a>
                      <a type="submit" href='Estadisticas.php' class="btn btn-primary btn-lg">Estadistica</a>
                      <a type="submit" href='#' class="btn btn-primary btn-lg active">Modificar Usuario</a>
                      <a type="submit" href='salir.php' class="btn btn-primary btn-lg">Salir</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
        
        
        
            <form action="AgregarUsuarioSQL.php" style="color: black" method="post" enctype="multipart/form-data" onKeypress="if(event.keyCode == 13) event.returnValue = false;">
                <ol>
                <h3><li>Registro de usuario</li></h3>
              
           
                <div id="TCP_AP">
                Nombres:
                <input type="text" class="form-control" id="ejemplo_preg" name="nombre_juego" value="">
                    <br /> 
                    Apellidos:
                      <input type="text" class="form-control" id="ejemplo_preg" name="nombre_juego" value="">
                    <br /> 
                    
                usuario:
                      <input type="text" class="form-control" id="ejemplo_preg" name="nombre_juego" value="">
                    <br />
                    contraseña: 
                      <input type="text" class="form-control" id="ejemplo_preg" name="nombre_juego" value="">
                    <br /> 
                  <br />
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Registrarse</button>
                  
              
                </ol>
            </form>
            
            
        </div>
    </div>
    <div class="MenuFinalPrueba">
        <h4 class="text-center">Creado por: The Hardcore Engineers</h4>
    </div>
</div>
<script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>
<script src="http://code.jquery.com/jquery.js"></script>
<!-- Javascript core JS -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
}else{
   header("Location: index.htm");  
}
?>