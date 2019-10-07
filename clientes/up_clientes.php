<?php
  include '../conexion/conexion.php';

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = htmlentities($_POST['nombre']);
    $direccion = htmlentities($_POST['direccion']);
    $telefono = htmlentities($_POST['telefono']);
    $correo = htmlentities($_POST['correo']);
    $id = htmlentities($_POST['id']);

    $update = $con->prepare("UPDATE clientes SET nombre=?, direccion=?, tel=?, correo=? WHERE id=? ");
    $update->bind_param('ssssi', $nombre, $direccion, $telefono, $correo, $id);
  
    if ($update->execute()) {
      header('location:../extend/alerta.php?msj=cliente actualizado&c=cli&p=in&t=success');
    } else {
        header('location:../extend/alerta.php?msj=El cliente no pudo ser actualizado&c=cli&p=in&t=error');
    }

    $update->close();
    $con->close();
  }else {
    header('location:../extend/alerta.php?msj=Utiliza el formulario&c=cli&p=in&t=error');
  }
?>
