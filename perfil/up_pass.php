<?php
 include '../conexion/conexion.php';
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $nick = $_SESSION['nick'];
   $pass = $con->real_escape_string(htmlentities($_POST['pass']));
   $pass = sha1($pass);
   $update = $con->query("UPDATE usuarios SET pass='$pass' WHERE nick='$nick' ");

   if ($update) {
       header('location:../extend/alerta.php?msj=Password actualizada&c=pe&p=perfil&t=success');
   } else {
       header('location:../extend/alerta.php?msj=La password no pudo ser actualizada&c=pe&p=perfil&t=error');
   }

   $con->close();
 }else {
   header('location:../extend/alerta.php?msj=Utiliza el formulario&c=us&p=in&t=TIPO');
 }
?>
