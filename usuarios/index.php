<?php
include '../extend/header.php';
include '../extend/permiso.php'
?>
<div class='row'>
    <div class='col s12'>
        <div class='card'>
            <div class='card-content'>
                <span class='card-title'>Alta de Usuarios</span>
                <form class="form" action="ins_usuarios.php" method="post" enctype="multipart/form-data">
                    <div class='input-field'>
                        <input type="text" name="nick" required autofocus title="DEBE CONTENER ENTRE 8 Y 15 CARACTERES, SOLO LETRAS" pattern="[A-Za-z]{8,15}" id="nick" onblur="may(this.value, this.id)" />
                        <label for="nick">Nick:</label>
                    </div>
                    <div class="validacion"></div>
                    <div class='input-field'>
                        <input type='password' name='pass1' title='La contrasena debe contener 8 y 15 o más caracteres que tengan al menos un número y una letra mayúscula y minúscula' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}" id='pass1' autofocus required />
                        <label for='pass1'>contraseña:</label>
                    </div>
                    <div class='input-field'>
                        <input type='password' name='pass2' title='La contrasena debe contener 8 y 15 caracteres que tengan al menos un número y una letra mayúscula y minúscula' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}" id='pass2' required />
                        <label for='pass2'>Verificar contraseña:</label>
                    </div>
                    <select name="rol" id="rol" required>
                        <option value="" disabled selected>Elige un rol de usuario</option>
                        <option value="Administrador">Administrador</option>
                        <option value="Asesor">Asesor</option>
                    </select>
                    <div class='input-field'>
                        <input type='text' name='nombre' title='El nombre debe contener solo letras y espacios' id='nombre' onblur='may(this.value, this.id)' pattern="[A-Za/s ]+" required />
                        <label for='nombre'>Nombre Completo del Usuario:</label>
                    </div>
                    <div class='input-field'>
                        <input type='email' name='correo' title='Correo Electronico' id='correo' />
                        <label for='correo'>Correo Electronico</label>
                    </div>
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>Foto:</span>
                            <input type="file" name="foto" />
                        </div>
                        <div class="file-path-wrapper">
                            <input type="text" class="file-path validate">
                        </div>
                    </div>
                    <button type="submit" class="btn black" id="btn_guardar">Guardar <i class="material-icons">send</i></button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col s12">
        <nav class="brown lighten-3">
            <div class="nav-wrapper">
                <div class='input-field'>
                    <input type='search' title='Buscar' id='buscar' autocomplete="off"/>
                    <label for='buscar'><i class="material-icons">search</i></label>
                    <i class="material-icons">close</i>
                </div>
            </div>
        </nav>
    </div>
</div>

<?php
$sel = $con->query('SELECT * FROM usuarios');
$row = mysqli_num_rows($sel);
?>
<div class='row'>
<div class=' col s12'>
    <div class='card'>
        <div class='card-content'>
            <span class='card-title'>Usuarios (<?php echo $row; ?>)</span>
            <table>
                <thead>
                    <tr class="cabecera">
                        <th>Nick</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th></th>
                        <th>Foto</th>
                        <th>Bloqueo</th>
                        <th>Eliminar</th>

                    </tr>
                </thead>
                    <?php while ($file = $sel->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $file['nick'] ?></td>
                        <td><?php echo $file['nombre'] ?></td>
                        <td><?php echo $file['correo'] ?></td>
                        <td>
                            <form action="up_rol.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $file['id'] ?>">
                                <select name="rol" id="rol" required>
                                    <option value="<?php echo $file['rol'] ?>"><?php echo $file['rol'] ?></option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Asesor">Asesor</option>
                                </select>
                        </td>
                        <td>
                            <button type="submit" class="btn-floating"><i class="material-icons">repeat</i></button>
                            </form>
                        </td>
                        <td><img src="<?php echo $file['foto'] ; ?>" width="50px" class="circle" alt="foto" ></td>
                        <td>
                        <?php
                        if ($file['bloqueo'] == 1): ?>
                            <a href="bloqueo_manual.php?us=<?php echo $file['id'] ?>&bl=<?php echo $file['bloqueo'] ?>"><i class="material-icons green-text">lock_open</i></a></td>
                        <?php else: ?>
                            <a href="bloqueo_manual.php?us=<?php echo $file['id'] ?>&bl=<?php echo $file['bloqueo'] ?>"><i class="material-icons red-text">lock_outline</i></a></td>
                        <?php endif; ?>
                        <td>
                          <a href="#" class="btn-floating red" onclick="swal({ title: 'Estas seguro que desea eliminar al usuario?',
                            text: 'Al eliminar no podra recuperarlo!', type: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33', confirmButtonText: 'Si, eliminarlo!' }).then(function () {
                            window.location.href = 'eliminar_usuario.php?id=<?php echo $file['id'] ?>'; })"> <i class="material-icons">clear</i>
                          </a>
                        </td>
                    </tr>
                <?php }; ?>
            </table>
        </div>
    </div>
</div>
</div>
<?php
include '../extend/scripts.php';
?>
<script src="../js/validacion.js"></script>
</body>

</html>
