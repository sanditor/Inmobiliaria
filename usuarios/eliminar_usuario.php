<?php
    include '../conexion/conexion.php';
    $id = $con->real_escape_string(htmlentities($_GET['id']));
    $delete = $con->query("DELETE FROM usuarios WHERE id='$id' ");

    if ($delete){
         header('location:../extend/alerta.php?msj=El usuario ha sido eliminado&c=us&p=in&t=success');
    }else{
         header('location:../extend/alerta.php?msj=El usuario no ha sido eliminado&c=us&p=in&t=error');
    }
   $con->close();

 ?>
