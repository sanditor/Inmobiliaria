<?php @session_start();
    if (isset($_SESSION['nick'])) {
        header('location:inicio');
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Proyecto</title>
</head>

<body class="grey lighten-2">
    <main>
        <div class="row">
            <div class="input-field col s12 center">
                <img src="img/logo.png" alt="logo" width="100" class="circle">
            </div>
        </div>
        <div class="container">
            <div class='row'>
                <div class='col s12'>
                    <div class='card z-depth-5'>
                        <div class='card-content'>
                            <span class='card-title'>
                                <center>Inicio de Sesion</center>
                            </span>
                            <form class="" action="login/index.php" method="post" autocomplete="off">
                                <div class='input-field'>
                                    <i class="material-icons prefix">perm_identity</i>
                                    <input type='text' name='usuario' id='usuario' title='Solo letras entre 8 y 15 caracteres' pattern='[A-Za-z]{8,15}' onblur='may(this.value, this.id)' autofocus required />
                                    <label for='usuario'>Usuario:</label>
                                    <div class='input-field'>
                                        <i class="material-icons prefix">vpn_key</i>
                                        <input type='password' name='pass' id='pass' title='La contrasena debe contener 8 y 15 caracteres que tengan al menos un número y una letra mayúscula y minúscula' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}' required />
                                        <label for='pass'>Contrasena:</label>
                                    </div>
                                    <div class='input-field center'>
                                        <button type="submit" class="btn waves-effect waves-ligh">Acceder</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>


    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script>
        function may(obj, id) {
            obj = obj.toUpperCase();
            document.getElementById(id).value = obj;
        }
    </script>
</body>

</html>
