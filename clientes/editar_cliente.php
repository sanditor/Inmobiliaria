<?php include '../extend/header.php';
  $id = htmlentities($_GET['id']);
  $sel = $con->prepare("SELECT * FROM clientes WHERE id = ? ");
  $sel -> bind_param('i', $id);
  $sel -> execute();
  $res = $sel->get_result();

  if ($f = $res->fetch_assoc()){

  }

?>

<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span class="card-title">Editar clientes</span>
        <form class="form" action="up_clientes.php" method="post" autocomplete=off >
          <input type="hidden" name="id" value="<?php echo $id ?>" />
          <div class="input-field">
            <input type="text" name="nombre" title="Solo letras" pattern="[A-Z/s ]+" value="<?php echo $f['nombre'] ?>"  id="nombre" onblur="may(this.value, this.id)"  >
            <label for="nombre">Nombre</label>
          </div>
          <div class="input-field">
            <input type="text" name="direccion" value="<?php echo $f['direccion'] ?>" id="direccion" onblur="may(this.value, this.id)"  >
            <label for="direccion">Dirección</label>
          </div>
          <div class="input-field">
            <input type="text" name="telefono" value="<?php echo $f['tel'] ?>"  id="telefono"  >
            <label for="telefono">Telefono</label>
          </div>
          <div class="input-field">
            <input type="email" name="correo" value="<?php echo $f['correo'] ?>" id="correo"   >
            <label for="correo">Correo</label>
          </div>
          <button type="submit" class="btn" >Actualizar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php

$sel->close();
$con->close();
include '../extend/scripts.php';

?>

</body>
</html>
