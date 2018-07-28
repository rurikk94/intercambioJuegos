<?php
session_start();

require('conexion.php');
    
//declaramos como variables a los campos de texto del formulario.
$usuario=$_POST["Usuario"];
$password=$_POST["Pass"];


$sql="Select contrasena from usuario WHERE usuario='$usuario'";


    $resultadojuegos=mysqli_query($conexion,$sql) or
                die("Problemas en el select:".mysqli_error($conexion));
                
    $array = array();
    while($row = mysqli_fetch_array($resultadojuegos)) {
        $array[] = $row;
    }
    
	
	//echo $sql;
	
	
	foreach($array as $row){
						
						$contrasenaGuardada=$row["contrasena"];
				}


$iguales = password_verify($password, $contrasenaGuardada);

if ($iguales) {
    $registros=mysqli_query($conexion,"SELECT id_usuario,nombres,apellidos,usuario,contrasena,url_perfil,url_banner,monedero FROM usuario WHERE usuario='$usuario'") or
  die("Problemas en el select:".mysqli_error($conexion));
  $row = $registros->fetch_assoc();
  if($row){
    $cantidad=0;
    $_SESSION["NombreCompleto"]=$row['nombres'] . " " . $row['apellidos'] ;
    $_SESSION["ID"]=$row['id_usuario'];
    $_SESSION["contrasena"]=$row['contrasena'];
    $_SESSION["url_perfil"]=$row['url_perfil'];
    $_SESSION["url_banner"]=$row['url_banner'];
    $_SESSION["monedero"]=$row['monedero'];
   // $cantidadNot=mysqli_query($conexion,"SELECT * FROM notificacion WHERE MensajeLeido='0'");
    //$num = mysqli_num_rows($cantidadNot);
    //while($num = mysqli_fetch_array($cantidadNot)) {
     // $cantidad=$cantidad+1;
   // }
    //$_SESSION["CantidadNotif"]=$cantidad;
    header ("Location:Busqueda_T.php");
  }
  else{
    $registros=mysqli_query($conexion,"SELECT id_usuario,nombres,apellidos,usuario,contrasena FROM administrador WHERE usuario='$usuario' and contrasena='$password' ") or
      die("Problemas en el select:".mysqli_error($conexion));
      $row = $registros->fetch_assoc();
      if($row){
        $_SESSION["NombreCompleto"]=$row['nombres'] . " " . $row['apellidos'] ;
        $_SESSION["ID"]=$row['id_usuario'];
        $_SESSION["contrasena"]=$row['contrasena'];
		
		
		
        header ("Location:Busqueda_T.php");  
      }
  }
  //$paterno=$row['ApellidoPaterno']; 
  //$materno=$row['ApellidoMaterno']; 
  //$nombrecompleto = $nombre.$paterno.$materno;
} else {
    echo 'La contraseña indicada no es correcta';
}

				

  
  if ($registros->num_rows === 0) {
    // ¡Oh, no ha filas! Unas veces es lo previsto, pero otras
    // no. Nosotros decidimos. En este caso, ¿podría haber sido
    // actor_id demasiado grande?
    header("Location:index.htm");
    } 
?>
