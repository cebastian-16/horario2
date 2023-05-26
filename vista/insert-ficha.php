<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ficha</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<body>

    <?php
    session_start();
    if (!isset($_SESSION)) {
        header('Location: login.php');
        exit;
    }
    if (isset($_SESSION)) {
        session_destroy();
        include "Menu.php";
        include '../Controlador/controladorFicha.php';
        $ficha = new ficha;
    ?>
        <br>
        <?php

        if (!empty($_POST['boton'])) {
            $accion = $_POST['boton'];
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $hora_inicio = $_POST['hora_inicio'];
            $hora_final = $_POST['hora_final'];
            $id_centro = $_POST['id_centro'];
            $documento = $_POST['documento'];
            $lider_ficha = $_POST['lider_ficha'];    
            $id_trimestre = $_POST['id_trimestre'];
            $id_municipio = $_POST['id_municipio'];
            $id_ambiente = $_POST['id_ambiente'];

            if ($accion == "Agregar") {
                $insertardatos = $ficha->consultarficha($id, $nombre, $hora_inicio, $hora_final, $id_centro, $documento, $lider_ficha, $id_trimestre, $id_municipio, $id_ambiente);
            }
        }

        ?>
        <div class="container">
            <div class="rows">
                <form action="insert-ficha.php" method="POST" class="insert">
                    <h1 class="label"> Crear ficha</h1>
                    <div class="form-group col-md-4">
                        <label class="label">ficha </label>
                        <input type="text" name="id" for="id" placeholder="ficha" class="form-control" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="label">nombre </label>
                        <input type="text" name="nombre" for="nombre" placeholder="nombre" class="form-control" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="label">hora de inicio </label>
                        <input type="time" name="hora_inicio" for="hora_inicio" placeholder="hora de inicio" class="form-control" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="label">hora de salida </label>
                        <input type="time" name="hora_final" for="hora_final" placeholder="hora de salida" class="form-control" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="label">documento </label>
                        <input type="text" name="documento" for="documento" placeholder="documento" class="form-control" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="label">lider de ficha </label>
                        <input type="text" name="lider_ficha" for="lider_ficha" placeholder="lider de ficha" class="form-control" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="label">centro</label>
                        <select class="form-control" name="id_centro" for="id_centro" required>
                            <option value="">Seleccione:</option>
                            <option value="casona">casona</option>
                            <option value="samaria">samaria</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="label">trimestre</label>
                        <select class="form-control" name="id_trimestre" for="id_trimestre" required>
                            <option value="">Seleccione:</option>
                            <option value="1">trimestre1</option>
                            <option value="2">trimestre2</option>
                            <option value="3">trimestre3</option>
                            <option value="4">trimestre4</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="label">ambiente</label>
                        <select class="form-control" name="id_ambiente" for="id_ambiente" required>
                            <option value="">Seleccione:</option>
                            <option value="1">tic</option>
                            <option value="2">toc</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="label">municipio</label>
                        <select class="form-control" name="id_municipio" for="id_municipio" required>
                            <option value="">Seleccione:</option>
                            <option value="1">santander</option>
                        </select>
                    </div>

                    <div class="label1">
                        <input type="submit" name="boton" value="Agregar" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    <?php
    }
    ?>
    <script type="text/javascript" src='js/jquery.min.js'></script>
    <script type="text/javascript" src='js/bootstrap.min.js'></script>
</body>

</html>