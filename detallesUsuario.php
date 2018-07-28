<?php 
session_start();
if(!empty($_SESSION["NombreCompleto"])){
	$datosOtroUsuario=$_SESSION["datosOtroUsuario"];
        
?>
<!DOCTYPE HTML>
<html>
<?php include("head.php"); // incluyes el archivo head.php ?>

<title> USUARIO </title>

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
	<?php
	foreach($datosOtroUsuario as $row){
			?>
			 
			 
	
		<table>
		<tr>
			<td><img src="<?=$row["url_perfil"]?>" alt="perfil" height="170" width="170"></td>
			<td><img src="<?=$row["url_banner"]?>" alt="banner" height="150" width="750"></td></tr>
		<tr>
		<tr>
			<td COLSPAN="2"><h2  class="text-capitalize" style="color: black"><?=$row["nombres"]?> <?=$row["apellidos"]?>
		<tr>
			<td>Ciudad</td>
			<td><h2 class="text-capitalize"  style="color: black"><?=$row["ciudad"]?></h2></td></tr>
		<tr>
			<td>Email</td>
			<td><h2 style="color: black"><?=$row["email"]?></h2></td></tr>
			
		<tr>
			<td>Biografia</td>
			<td>
			<p><?=$row["bio"]?></p>			
			</td></tr>
		<tr>
			<td>Ultima ves visto</td>
			<td><?=$row["ultimo_login"]?></p>			
			</td></tr>
		</table>
	
		<?php
			}
			?>
	</div>
<?php include("footer.php");// incluyes el archivo footer.php ?>
</body>
</html>
<?php
}else{
   header("Location: index.php");  
}
?>