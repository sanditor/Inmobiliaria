<?php 
    if ($_SESSION['rol'] != 'Administrador') {
        header("location:bloqueo.php");
    }
?>