<?php
    include '../conexion/conexion.php';
    include '../extend/permiso.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $con->real_escape_string(htmlentities($_POST['id']));
        $rol = $con->real_escape_string(htmlentities($_POST['rol']));
        $update = $con->query("UPDATE usuarios SET rol= '$rol' WHERE id='$id' ");
        if ($update){
             header('location:../extend/alerta.php?msj=Rol actualizado&c=us&p=in&t=success');
        }else{
             header('location:../extend/alerta.php?msj=El rol del usuario no pudo ser actualizado&c=us&p=in&t=error');
        }
    }else{
         header('location:../extend/alerta.php?msj=Utiliza el formulario&c=us&p=in&t=error');
    }
    $con->close();

?>
