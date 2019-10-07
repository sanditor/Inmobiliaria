<?php
include '../conexion/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nick = $con->real_escape_string(htmlentities($_POST['nick']));
    $pass1 = $con->real_escape_string(htmlentities($_POST['pass1']));    
    $rol = $con->real_escape_string(htmlentities($_POST['rol']));
    $nombre = $con->real_escape_string(htmlentities($_POST['nombre']));
    $correo = $con->real_escape_string(htmlentities($_POST['correo']));
    
    if (empty($nick) || empty($pass1) || empty($rol) || empty($nombre)) {
        header('location:../extend/alerta.php?msj=Hay un campo sin especificar&c=us&p=in&t=error');
        exit; //detiene el codigo
    }

    //funcion que verifica que sea un string
    if (!ctype_alpha($nick)) {
        header('location:../extend/alerta.php?msj=El nick no contiene solo letras&c=us&p=in&t=error');
        exit; //detiene el codigo
    }

    //funcion que verifica que sea un string
    if (!ctype_alpha($rol)) {
    header('location:../extend/alerta.php?msj=El rol no contiene solo letras&c=us&p=in&t=error');
    exit; //detiene el codigo
    }

    //comprueba que el nombre contiene solo letras y espacios  
    $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZ ";

    for ($i=0; $i < strlen($nombre); $i++) { 
        $buscar = substr($nombre,$i,1);
        if (strpos($caracteres,$buscar) === false) {
            header('location:../extend/alerta.php?msj=El nombre no contiene solo letras&c=us&p=in&t=error');
            exit; //detiene el codigo
        }
    }

    $usuario = strlen($nick);
    $pass = strlen($pass1);

    if ($usuario < 8 || $usuario >15) {
        header('location:../extend/alerta.php?msj=La contrasena debe contener entre 8 y 15 caracteres&c=us&p=in&t=error');
        exit; //detiene el codigo
    }

    if ($pass < 8 || $pass >15) {
        header('location:../extend/alerta.php?msj=El nick debe contener entre 8 y 15 caracteres&c=us&p=in&t=error');
        exit; //detiene el codigo
    }

    if (!empty($correo)) {
        if (!filter_var($correo,FILTER_VALIDATE_EMAIL)) {
            header('location:../extend/alerta.php?msj=El email no es valido&c=us&p=in&t=error');
            exit; //detiene el codigo.
        }
    }

$extension = '';
$ruta='foto_perfil';
$archivo=$_FILES['foto']['tmp_name'];
$nombrearchivo=$_FILES['foto']['name'];
$info = pathinfo($nombrearchivo);

if ($archivo != '') {
    $extension = $info['extension'];
    if ($extension == "png" || $extension == "PNG" || $extension == "jpg" || $extension == "JPG") {
        move_uploaded_file($archivo,'foto_perfil/'.$nick.'.'.$extension);
        $ruta = $ruta."/".$nick.'.'.$extension;
    }else {
        header('location:../extend/alerta.php?msj=El formato de imagen no es valido&c=us&p=in&t=error');
        exit; //detiene el codigo.
    }     
}else {
    $ruta = "foto_perfil/perfil.png";
}

$pass1 = sha1($pass1);//encriptar password

$ins = $con->query("INSERT INTO usuarios VALUES(null,'$nick','$pass1','$nombre','$correo','$rol',1,'$ruta') ");

if ($ins) {
    header('location:../extend/alerta.php?msj=El usuario ha sido registrado&c=us&p=in&t=success'); 
}else {  
    header('location:../extend/alerta.php?msj=El usuario no pudo ser registrado&c=us&p=in&t=error');
}

$con->close();

}else { //formulario
  /*   echo "<script>alert('utiliza el formulario')
            location.href='index.php';
          </script>"; */
    header('location:../extend/alerta.php?msj=utiliza el formulario&c=us&p=in&t=error');
}
