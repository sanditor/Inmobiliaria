<?php @session_start();

//array para limpiar las variables
$_SESSION = array();
session_destroy();
header('location:../');
?>