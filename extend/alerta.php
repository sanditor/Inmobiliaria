<?php
include '../conexion/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.css">
    <title>Proyecto</title>
</head>

<body>
    <?php
        $mensaje = htmlentities($_GET['msj']);
        $c = htmlentities($_GET['c']);
        $p = htmlentities($_GET['p']);
        $t = htmlentities($_GET['t']);

        switch ($c) {
            case 'us':
                $carpeta = '../usuarios/';
                break;
            case 'home':
                $carpeta = '../inicio/';
                break;
            case 'salir':
                $carpeta = '../';
                break;
            case 'pe':
                $carpeta = '../perfil/';
                break;
            case 'cli':
                $carpeta = '../clientes/';
                break;

        }

        switch ($p) {
            case 'in':
                $pagina = 'index.php';
                break;
            case 'home':
                $pagina = 'index.php';
                break;
            case 'salir':
                $pagina = '';
            break;
            case 'perfil':
                $pagina = 'perfil.php';
              break;
    }

        $dir = $carpeta.$pagina;

        if ($t == "error") {
            $titulo = "Oppss..";
        }else {
            $titulo = "Buen trabajo";
        }
    ?>

    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.js"></script>
    <script>
        swal({
            title: '<?php echo $titulo; ?>',
            text: "<?php echo $mensaje; ?>",
            type: '<?php echo $t; ?>',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        }).then(function () {
            window.location.href = "<?php echo $dir ?>";
        });

        $(document).click(function(){
            window.location.href = "<?php echo $dir ?>";
        });

        $(document).keyup(function(e){
            if (e.which == 27) {
                window.location.href = "<?php echo $dir ?>";
            }
        });

    </script>

</body>

</html>
