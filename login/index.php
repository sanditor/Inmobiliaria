<?php
include '../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $con->real_escape_string($_POST['usuario']);
    $pass = $con->real_escape_string($_POST['pass']);

    //verificar espacios por sql injection
    $candado = ' ';
    $str_u = strpos($user, $candado);
    $str_p = strpos($pass, $candado);
    if (is_int($str_u)) {
        $user = '';
    } else {
        $usuario = $user;
    }

    if (is_int($str_p)) {
        $pass = '';
    } else {
        $pass2 = sha1($pass);
    }

    //verificar si viene con espacios por sql injection
    if ($user == null && $pass == null) {
        header('location:../extend/alerta.php?msj=El formulario no es correcto&c=salir&p=salir&t=error');
    } else {
        $sel = $con->query("SELECT nick, nombre, rol, correo, foto, pass FROM usuarios WHERE nick = '$usuario' AND pass = '$pass2' AND bloqueo = 1 ");
        $row = mysqli_num_rows($sel);
        if ($row == 1) {
            //verificamos si existe el usuario y sacar las variables para sesion
            if ($fila = $sel->fetch_assoc()) {
                $nick = $fila['nick'];
                $contra = $fila['pass'];
                $rol = $fila['rol'];
                $correo = $fila['correo'];
                $foto = $fila['foto'];
                $nombre = $fila['nombre'];
            }

            if ($nick == $usuario && $contra == $pass2 && $rol == "Administrador") {

                //CREAR VARIABLES DE SESION
                $_SESSION['nick'] = $nick;
                $_SESSION['nombre'] = $nombre;
                $_SESSION['rol'] = $rol;
                $_SESSION['correo'] = $correo;
                $_SESSION['foto'] = $foto;
                header('location:../extend/alerta.php?msj=Bienvenido&c=home&p=home&t=success');
            } elseif ($nick == $usuario && $contra == $pass2 && $rol == "Asesor") {

                //CREAR VARIABLES DE SESION
                $_SESSION['nick'] = $nick;
                $_SESSION['nombre'] = $nombre;
                $_SESSION['rol'] = $rol;
                $_SESSION['correo'] = $correo;
                $_SESSION['foto'] = $foto;
                header('location:../extend/alerta.php?msj=Bienvenido&c=home&p=home&t=success');
            } else {
                header('location:../extend/alerta.php?msj=No tienes el permiso para entrar&c=salir&p=salir&t=error');
            }
        } else {
            header('location:../extend/alerta.php?msj=Nombre de usuario y contrasena incorrectos&c=salir&p=salir&t=error');
        }
    }
} else
    header('location:../extend/alerta.php?msj=Utiliza el formulario&c=salir&p=salir&t=error');
