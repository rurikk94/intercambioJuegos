<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8"/>
	<meta name="author" content="www.intercambiosvirtuales.org" />
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="estilo.css" rel="stylesheet">
    <link href='videojuegos-.jpg' rel='shortcut icon' type='image/png'>
    
	<title>Login</title>
</head>

<body class="fondo">
<div class="container-fluid">
    <div class="franja"></div>
    <div class="menu">
        <div class="row">
            <div class="col-xs-3">
                <img src="videojuegos-.jpg" alt="pencil" id="imagen1"/>
            </div>
            <h1>Busca tus videojuegos favoritos</h1>
        </div>
    </div>
    <div class="col-xs-4">
    <div class="jumbotron">
    <div class="container">
      <form action="AgregarUsuarioSQL.php" style="color: black" method="post" enctype="multipart/form-data" onKeypress="if(event.keyCode == 13) event.returnValue = false;">
                <ol>
                <h3><li>Registrarse como usuario</li></h3>
              
           
                <div id="TCP_AP">
                <div style="color:black">Nombres:</div>
                <input type="text" class="form-control" id="Nombres" name="Nombres" value="" >
                    <br /> 
                 <div style="color:black">Apellidos:</div>
                      <input type="text" class="form-control" id="Apellidos" name="Apellidos" value="" >
                    <br /> 
                    
              <div style="color:black">Usuario:</div>
                      <input type="text" class="form-control" id="usuario" name="usuario" value="" >
                    <br />
                <div style="color:black">Contraseña:</div>
                      <input type="password" class="form-control" id="contrasena" name="contrasena" value="" >
                    <br /> 
                  <br />
				 <div style="color:black">Email:</div>
                      <input type="email" class="form-control" id="email" name="email" value="" >
                    <br /> 
                  <br />
                          <button type="submit" class="btn btn-primary btn-lg style="color: black; width:100px; height:100px" onMouseover="this.style.color='blue'" onMouseout="this.style.color='black'"  >Registrarse</button>
                  
              
                </ol>
            </form>
            </div>
            </div>
            </div>
    <div class="container-fluid" style="margin-top: 50px;">
        <div class="row">
            <div class="">
                  </div>
            <div class="col-xs-4">
                <div class="jumbotron">
                    <h2 class="text-center">Login</h2>
                    <form class="form-horizontal"  role="form" method="POST" action="sqlogin.php">
                      <div class="form-group">
                        <label for="ejemplo_rut" class="col-lg-3">Usuario</label>
                        <div class="col-xs-10">
                        <input type="text" class="form-control" id="ejemplo_rut" name="Usuario" min="1" required autofocus>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="ejemplo_password_1" class="col-lg-3">Contraseña</label>
                        <div class="col-xs-10">
                        <input type="password" class="form-control" id="ejemplo_password_1" name="Pass" required>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary btn-lg ">Ingresar</button>
                        
            </div>
                    </form>
                </div>
            </div>
        </div>  
    </div>
</div>
<?php include("footer.php");// incluyes el archivo footer.php ?>
</body>
<script src="js/bootstrap.min.js"></script>
</html>