<?php
require('datosUsuarioSQL.php');
?>


<div class="menu">
        <div class="row">
            <div class="col-xs-3">
                <img src="iconoH.png" alt="Logo" id="imagen"/>
                <img src="<?=$url_perfil?>" alt="perfil" id="perfil"  width="170" height="170"/>
				<a class="btn btn-success" style="color: white" href="modificarUsuario.php"><b>Opciones de la Cuenta</b></a>
            </div>
            <div class="col-xs-7" id="texto">
                <h1 class="text-capitalize">Bienvenido/a <?=$_SESSION["NombreCompleto"]?></h1>
                <img src="<?=$url_banner?>" alt="banner" id="banner"  width="750" height="150"/>
            </div>
            <div class="col-xs-2" id="texto" style="padding-top: 1%;">
                <h4 class="sesion"><b>Sesion Iniciada</b></h4>
                <h4><a class="btn btn-warning" style="color: white" href='misjuegosSQL.php'><b>Mis Juegos</b></a></h4>
				<h4 class="sesion"><b>Mi Saldo</b></h4>
						<h3>$<?=$monedero?></h3>
                <h4><a class="btn btn-danger" href='recargarSaldo.php'><b>Recargar Saldo</b></a></h4>
				<a type="submit" href='deslogin.php' class="btn btn-primary btn-lg" style="color: white" >Salir</a>
            </div>
        </div>
</div>
<?php 
$desactivado='btn btn-primary btn-lg';
$activo="btn btn-primary btn-lg active";
$buscar=$desactivado; $buscarV=$desactivado; $agregarC=$desactivado; $agregarV=$desactivado; $intercambiarV=$desactivado;$peticionesI=$desactivado;
if (($_SERVER["REQUEST_URI"]=='/buscar_juego.php')||(strpos($_SERVER["REQUEST_URI"], 'detalle_juego.php'))){$buscar = $activo;};
if ($_SERVER["REQUEST_URI"]=='/agregar_categoria.php'){$agregarC = $activo;};
if ($_SERVER["REQUEST_URI"]=='/agregar_juego.php'){$agregarV = $activo;};
if ($_SERVER["REQUEST_URI"]=='/peticiones_intercambio.php'){$peticionesI = $activo;};
if (($_SERVER["REQUEST_URI"]=='/detalle_unidad_juego.php')||(strpos($_SERVER["REQUEST_URI"], 'detalle_juego_usuario'))){$intercambiarV = $activo;};
?>
<div class="menu">
	<div class="row">
		<div class="col-xs-12" style="padding-right: 0%;">
			<div class="tamaño">
				<div class="btn-group">
					<a type="submit" href='Busqueda_T.php' class="<?=$buscar?>">Buscar Videojuegos</a>
					<a type="submit" href='agregar_categoria.php' class="<?=$agregarC?>">Agregar Categoria a la Base de Datos</a>
					<a type="submit" href='agregar_juego.php' class="<?=$agregarV?>">Agregar Videojuego a la Base de Datos</a>   
					<a type="submit" href='busqueda_detalle_unidad_juego.php' class="<?=$intercambiarV?>">Intercambiar Videojuegos</a>
					<a type="submit" href='peticiones_intercambioSQL.php' class="<?=$peticionesI?>">Peticiones de Intercambio</a>
				</div>
			</div>
		</div>
	</div>
</div>
