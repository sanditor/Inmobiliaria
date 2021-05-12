<?php include '../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nick = $_SESSION['nick'];
  $foto = $_SESSION['foto'];

    $extension = '';
    $ruta='foto_perfil';
    $archivo=$_FILES['foto']['tmp_name'];
    $nombrearchivo=$_FILES['foto']['name'];
    $info = pathinfo($nombrearchivo);

    if ($nombrearchivo != '') {
        $extension = $info['extension'];
        if ($extension == "png" || $extension == "PNG" || $extension == "jpg" || $extension == "JPG") {
            unlink('../usuarios/'.$foto);
            $rand = rand(000,999);
            move_uploaded_file($archivo,'../usuarios/foto_perfil/'.$nick.$rand.'.'.$extension);
            $ruta = $ruta."/".$nick.$rand.'.'.$extension;
            $update = $con->query("UPDATE usuarios SET foto='$ruta' WHERE nick='$nick' ");
            if ($update) {
              $_SESSION['foto'] = $ruta;
              header('location:../extend/alerta.php?msj=Foto de perfil actualizada&c=pe&p=in&t=success');
            }else {
              header('location:../extend/alerta.php?msj=La foto de perfil no pudo ser actualizado&c=pe&p=in&t=error');
            }
        }else {
            header('location:../extend/alerta.php?msj=El formato de imagen no es valido&c=us&p=in&t=error');
            exit; //detiene el codigo.
        }
  }else {
       header('location:../extend/alerta.php?msj=No se detecto ninguna foto para actualizar &c=pe&p=in&t=error');
      }
    $con->close();
}else {
  header('location:../extend/alerta.php?msj=Utilia el formulario&c=pe&p=in&t=error');
}

?>
