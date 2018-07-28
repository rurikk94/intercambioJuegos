	<?php 
session_start();
if(!empty($_SESSION["NombreCompleto"])){
        
?>
<!DOCTYPE HTML>
<html>
<?php include("head.php"); // incluyes el archivo head.php ?>

<title> <?=$_SESSION["NombreCompleto"]?></title>

<style>
	body {
	background:url(<?=$row[7]?>) no-repeat center center fixed;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
	}
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
	</style>
<body  style="background-color:WHITE;">
<?php include("menus.php");// incluyes el archivo menus.php ?>
	<div class="container-fluid">
	
	<form action="/modificarUsuarioSQL.php"  method="post" id="usrform">
		<table>
		<tr>
			<td>Nombre</td>
			<td><input  type="text" name="nombres" value="<?=$nombres?>" autofocus></td></tr>
		<tr>
			<td>Apellidos</td>
			<td><input type="text" name="apellidos" value="<?=$apellidos?>"></td></tr>
		<tr>
			<td>Ciudad</td>
			<td><input type="text" name="ciudad" value="<?=$ciudad?>"></td></tr>
		<tr>
			<td>Foto de Perfil</td>
			<td><input  type="url" name="url_perfil" value="<?=$url_perfil?>">  170x170</td></tr>
		<tr>
			<td>Banner</td>
			<td><input  type="url" name="url_banner" value="<?=$url_banner?>">  750x150</td></tr>
		<tr>
			<td>Email</td>
			<td><input  type="email" name="email" value="<?=$email?>"></td></tr>
		<tr>
			<td>Biografia</td>
			<td>
			<textarea rows="4" cols="50" name="bio" form="usrform">
			<?=$bio?></textarea>			
			</td></tr>
		<tr><td><input type="submit" value="Modificar Datos"></td></tr>
		</table>
	</form>
	
	<form action="/modificarContrasenaSQL.php"  method="post">
		<table>
		<tr>
			<td>Contraseña</td>
			<td><input  type="password" name="contrasena" value="<?=$contrasena?>" autofocus></td></tr>
		<tr>
		<tr><td><input type="submit" value="Modificar Contraseña"></td></tr>
		</table>
	</form>
		
	</div>
<?php include("footer.php");// incluyes el archivo footer.php ?>
</body>
</html>
<?php
}else{
   header("Location: index.php");  
}
?>