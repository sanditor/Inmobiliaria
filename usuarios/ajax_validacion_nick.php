<?php

include '../conexion/conexion.php';

$nick = $con->real_escape_string($_POST['nick']);

$sql = $con->query("SELECT id FROM usuarios WHERE nick = '$nick' ");
$row = mysqli_num_rows($sql);
if($row != 0) {
   echo "<label style='color:red;'>El nombre de usuario ya existe</label>"; 
}else{
    echo "<label style='color:green;'>El nombre de usuario esta disponible</label>";  
}
$con->close();
?>

