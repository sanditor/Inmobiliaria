<?php include '../extend/header.php'?>

  <div class="row">
    <div class="col s12">
      <div class="card">
           <div class="card-content">
            <h1>Editar perfil</h1>
           </div>
           <div class="card-tabs">
             <ul class="tabs tabs-fixed-width">
               <li class="tab"><a href="#datos" class="active">Perfil</a></li>
               <li class="tab"><a href="#pass">Contraseña</a></li>
             </ul>
           </div>
           <div class="card-content grey lighten-4">
             <div id="datos">
               <form class="form" action="up_perfil.php" method="post" enctype="multipart/form-data">
                   <div class='input-field'>
                       <input type='text' name='nombre' title='El nombre debe contener solo letras y espacios' id='nombre' onblur='may(this.value, this.id)' pattern="[A-Za/s ]+" value="<?php echo $_SESSION['nombre'] ?>" required />
                       <label for='nombre'>Nombre Completo del Usuario:</label>
                   </div>
                   <div class='input-field'>
                       <input type='email' name='correo' title='Correo Electronico' id='correo' value="<?php echo $_SESSION['correo'] ?>" />
                       <label for='correo'>Correo Electronico</label>
                   </div>
                   <button type="submit" class="btn black">Editar<i class="material-icons">send</i></button>
               </form>
             </div>
             <div id="pass">
               <form class="form" action="up_pass.php" method="post" enctype="multipart/form-data">
                   <div class='input-field'>
                       <input type='password' name='pass1' title='La contrasena debe contener 8 y 15 o más caracteres que tengan al menos un número y una letra mayúscula y minúscula' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}" id='pass1' autofocus required />
                       <label for='pass1'>contraseña:</label>
                   </div>
                   <div class='input-field'>
                       <input type='password' name='pass2' title='La contraseña debe contener 8 y 15 caracteres que tengan al menos un número y una letra mayúscula y minúscula' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}" id='pass2' required />
                       <label for='pass2'>Verificar contraseña:</label>
                   </div>
                   <button type="submit" class="btn black" id="btn_guardar">Editar <i class="material-icons">send</i></button>
               </form>
             </div>
           </div>
      </div>
    </div>
  </div>

<?php include '../extend/scripts.php'?>
<script src="../js/validacion.js"></script>
<script type="text/javascript">
    function may(obj, id){
        obj = obj.toUpperCase();
        document.getElementById(id).value = obj;
    }
</script>

</body>
</html>
