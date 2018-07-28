<?php
require_once './conexion.php';
session_start();




$saldo=$_GET["s"];
$id=$_SESSION["ID"];




     header("Location:recargarSaldo.php");

    
    
//declaramos como variables a los campos de texto del formulario.

$sql="UPDATE usuario
SET monedero=monedero+$saldo
WHERE id_usuario=$id";
echo $sql;
mysqli_query($conexion,$sql);


$sql="INSERT INTO transacciones
(id_usuario,tipo,monto,descripcion)
VALUES ($id,'ABONO',$saldo,'Recarga vía Webbay')";
echo $sql;
mysqli_query($conexion,$sql);




    

      
  

?>