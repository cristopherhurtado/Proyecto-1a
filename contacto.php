<?php
    require_once('datos.php');
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

    <title>Contacto</title>

</head>
    <body>
        <div class="container">
            <div class="col-md-6 mt-3">
            <h1>Formulario</h1>

                <?php
                    if(isset($_GET['error'])){
                        $error = $_GET['error'];
                        if($error == 'faltan_valores'){
                            echo "<p class='alert alert-danger'> Faltan valores </p>";
                        }
                        if($error == 'nombre'){
                            echo "<p class='alert alert-danger'> Nombre no valido </p>";
                        }
                        if($error == 'email'){
                            echo "<p class='alert alert-danger'> Email no valido </p>";
                        }
                        if($error == 'pais'){
                            echo "<p class='alert alert-danger'> Selecciona Pais </p>";
                        }
                        if($error == 'comuna'){
                            echo "<p class='alert alert-danger'> Selecciona comuna </p>";
                        }
                        if($error == 'asunto'){
                            echo "<p class='alert alert-danger'> Ingrese asunto </p>";
                        }

                    }
                ?>

                <form action="validar.php" method="POST">

                    <div class="form-group">
                        <label for="nombre">Ingrese su nombre:</label>
                        <input type="text" name="nombre" placeholder="Ingrese su nombre completo" class="form-control" value="<?php echo @($nombre); ?>">
                    </div>

                    <div class="form-group">
                        <label for="email">Ingrese email:</label>
                        <input type="text" name="email" placeholder="Ingrese su correo electrónico" class="form-control" value="<?php echo @($email); ?>">
                    </div>

                    <div class="form-group">
                    <label for="pais">Pais</label>
                        <select name="pais" class="form-control">
                        <option value="<?php echo $pais;?>">Seleccione . . .</option>
                            <?php foreach($paises as $pais):?>
                                <option value="<?php echo $pais;?>"><?php echo $pais;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>

                    <div class="form-group">
                    <label for="comuna">Comunas</label>
                        <select name="Comuna" class="form-control">
                        <option value="<?php echo $comuna;?>">Seleccione . . .</option>
                            <?php foreach($comuna as $comuna):?>
                                <option value="<?php echo $comuna;?>"><?php echo $comuna;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>

                    <div class="form-group">
                    <label>Seleccione un asunto:</label>
                        <select name="asunto" class="form-control">
                            <option value="Seleccione . . .">Seleccione . . .</option>
                            <?php foreach($asunto as $as):?>
                                <option value="<?php echo $as;?>"><?php echo $as?></option>
                            <?php endforeach;?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="comentario">Comentario:</label>
                        <textarea name="comentario" class="form-control" rows="4" placeholder="Ingrese su comentario" style="resize: none;"></textarea>
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="enviar" value="si">
                        <button type="submit" class="btn btn-success">Enviar Comentario</button>
                    </div>

                </form>

            </div>
        </div>
    </body>
</html>
