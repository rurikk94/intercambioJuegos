<?php
session_start();
require('conexion.php');
$ID=$_SESSION["ID"];

$sql="UPDATE usuario SET ultimo_login = CONVERT_TZ(ADDTIME(now(), '00:02:40.0'),'+00:00','-04:00') WHERE id_usuario =".$ID;
mysqli_query($conexion,$sql);

$sql="Select id_usuario,nombres,apellidos,usuario,url_perfil,url_banner,bio,ciudad,monedero,email from usuario WHERE id_usuario=$ID";


    $resultadoperfil=mysqli_query($conexion,$sql) or
                die("Problemas en el select:".mysqli_error($conexion));
                
    $array10 = array();
    while($row10 = mysqli_fetch_array($resultadoperfil)) {
        $array10[] = $row10;
    }
    
    $_SESSION["datosUsuario"]=$array10;
	
	//echo $sql;
	
	
	foreach($array10 as $row10){
						
						$nombres=$row10["nombres"];
						$apellidos=$row10["apellidos"];
						$usuario=$row10["usuario"];
						$url_perfil=$row10["url_perfil"];
						$url_banner=$row10["url_banner"];
						$bio=$row10["bio"];
						$ciudad=$row10["ciudad"];
						$monedero=$row10["monedero"];
						$email=$row10["email"];
				}
				
?>