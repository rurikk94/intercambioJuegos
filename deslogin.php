<?php 
session_start();
unset($_SESSION["NombreCompleto"]); 
unset($_SESSION["nombres"]); 
unset($_SESSION["ID"]);
unset($_SESSION["contrasena"]);
unset($_SESSION["url_perfil"]);
unset($_SESSION["url_banner"]);
unset($_SESSION["monedero"]);
session_destroy();
header("Location: index.php");
exit;
?>