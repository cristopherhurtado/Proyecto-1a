<?php
  $error='faltan_valores';

    if(!empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['pais']) && !empty($_POST['comuna']) && !empty($_POST['asunto']) && $_POST['enviar'] == 'si' ){

        $error = 'ok';

        $nombre = $_POST['nombre'];
        $email  = $_POST['email'];
        $pais   = $_POST['pais'];
        $comuna = $_POST['comuna'];
        $asunto = $_POST['asunto'];
        $comentario = $_POST['comentario'];

        if(!is_string($nombre) || preg_match('/^[A-ZÁÉÍÓÚ][a-záéíóú]*$/', $nombre)){
            $error = 'nombre';
        }

        if(!is_string($email)  || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error = 'email';
        }

        if(!is_string($pais) || $pais == 'Seleccione . . .'){
            $error = 'pais';
        }

        if(!is_string($comuna) || $comuna == 'Seleccione . . .'){
            $error = 'Comuna';
        }

        if(!is_string($asunto) || $asunto == 'Seleccione . . .'){
            $error = 'asunto';
        }

    }else{
        $error = 'faltan_valores';
    }

    if($error != 'ok'){
        header("Location:contacto.php?error=$error");
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <title>Formulario</title>

</head>
    <body>
        <h1>Datos validados correctamente</h1>
        <?php if($error == 'ok'):?>
            <h2>
                <p><label><strong style="color:red"> Nombre Ingresado: </strong><?=$nombre?></label></p>
                <p><label><strong style="color:red">Email Ingresado:  </strong><?=$email?></label></p>
                <p><label><strong style="color:red">Pais Ingresado: </strong><?=$pais?></label></p>
                <p><label><strong style="color:red">Comuna Ingresada: </strong><?=$comuna?></label></p>
                <p><label><strong style="color:red">Asunto Ingresado: </strong><?=$asunto?></label></p>
            </h2>

                <?php if(!empty($comentario)): ?>
                    <h2>
                        <p><label><strong style="color:red">Mensaje Ingresado: </strong><?=$comentario?></label></p>
                    </h2>
                <?php else:?>
                    <h2>
                        <p><label><strong style="color:green">No hay comentario ingresado </strong><?=$comentario?></label></p>
                    </h2>
                <?php endif;?>

        <?php endif;?>

    </body>
</html>
