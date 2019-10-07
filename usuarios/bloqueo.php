<?php 
    include '../conexion/conexion.php';
    $user = $_SESSION['nick'];
    $update = $con->query("UPDATE usuarios SET bloqueo=0 WHERE nick='$user' ");
    if ($update) {
        //destruir todas las variables de sesion
        $_SESSION= array();
        session_destroy();
         header('location:../extend/alerta.php?msj=USO INDEBIDO DEL SISTEMA!!!&c=salir&p=salir&t=error');
    }
?>