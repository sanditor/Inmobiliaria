<?php 
include '../conexion/conexion.php';
$id = $con->real_escape_string(htmlentities($_GET['us']));
$bloqueo = $con->real_escape_string(htmlentities($_GET['bl']));

if($bloqueo == 1) {
    $update = $con->query("UPDATE usuarios SET bloqueo=0 WHERE id=$id ");
    if ($update){
         header('location:../extend/alerta.php?msj=El usuario ha sido bloqueado&c=us&p=in&t=success');
    }else{
        header('location:../extend/alerta.php?msj=El usuario no ha podido ser bloqueado&c=us&p=in&t=error');
    }

}else{
    $update = $con->query("UPDATE usuarios SET bloqueo=1 WHERE id=$id ");
    if ($update){
         header('location:../extend/alerta.php?msj=El usuario ha sido desbloqueado&c=us&p=in&t=success');
    }else{
        header('location:../extend/alerta.php?msj=El usuario no ha podido ser desbloqueado&c=us&p=in&t=error');
    }
}

?>