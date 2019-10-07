<nav class="black">
  <a href="" data-activates="menu" class="button-collpase" ><i class="material-icons">menu</i></a>
</nav>
<ul id="menu" class="side-nav fixed" >
  <li>
    <div class="userView">
      <div class="background">
        <img src="http://lorempixel.com/output/abstract-q-c-640-480-5.jpg"  >
      </div>
      <a href="../perfil/index.php" ><img src="../usuarios/<?php echo $_SESSION['foto']; ?>" class="circle" alt=""></a>
      <a href="../perfil/perfil.php" class="white-text"><?php echo $_SESSION['nombre']; ?></a>
      <a href="" class="white-text"><?php echo $_SESSION['correo']; ?></a>
    </div>
  </li>
  <li><a href="../inicio"><i class="material-icons">home</i>INICIO</a></li>
  <li><div class="divider" ></div></li>
  <li><a href="../clientes"><i class="material-icons">contact_phone</i>CLIENTES</a></li>
  <li><div class="divider" ></div></li>
  <li><a href="../login/salir.php"><i class="material-icons">power_settings_new</i>SALIR</a></li>
  <li><div class="divider" ></div></li>
</ul>
