<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Modificar datos</title>
    <link rel='stylesheet prefetch' href='css/bootstrap.min.css'>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <script type="text/javascript" src="js/scripRegArt.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">

        <?php
        session_start();

        if (isset($_POST['userLogin'])) {
            header('Location: login.php');
            exit;
        } else {

            include "Menu.php";
            include '../Controlador/controladorFicha.php';
            $ficha = new ficha;


            if (!empty($_GET['id'])) {
                $id = $_GET['id'];
                $resultadoficha = $ficha->mirarficha($id);
                $consultaM = mysqli_fetch_array($resultadoficha);

                if (empty($consultaM)) {
                    echo "<div class='alert alert-danger alert-dismissible'>";
                    echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                    echo "  <strong>Error!</strong> No se encontraron Registros";
                    echo "</div>";
                }
            }

            if (!empty($_POST['boton'])) {
                $accion = $_POST['boton'];
                if ($accion == "Modificar") {
                    $id = $_POST['id'];
                    $hora_inicio = $_POST['hora_inicio'];
                    $hora_final = $_POST['hora_final'];
                    $documento = $_POST['documento'];
                    $lider_ficha = $_POST['lider_ficha'];
                    $id_trimestre  = $_POST['id_trimestre'];
                    $modificarficha = $ficha->actualizarficha($id, $hora_inicio, $hora_final, $documento, $lider_ficha, $id_trimestre);
                }
            }
        ?>

            <?php if (!empty($consultaM)) { ?>
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-4">
                                <h2>Modificar Ficha</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <form action="updateficha.php" method="post" name="formDatos" class="form">
                            <div class="form-group col-md-4">
                                <label>ficha </label>
                                <?php echo "<input class='form-control' style='display:none;' value='" . $consultaM["id"] . "' name='id' type='text'>" ?>
                                <?php echo "<input class='form-control' disabled value='" . $consultaM["id"] . "' type='text'>" ?>
                            </div>

                            <div class="form-group col-md-4">
                                <label>nombre </label>
                                <?php echo "<input class='form-control' style='display:none;' value='" . $consultaM["nombre"] . "' name='nombre' type='text'>" ?>
                                <?php echo "<input class='form-control' disabled value='" . $consultaM["nombre"] . "' type='text'>" ?>
                            </div>

                            <div class="form-group col-md-4">
                                <label>hora de inicio </label>
                                <input type="time" name="hora_inicio" for="hora_inicio" value="<?php echo $consultaM["hora_inicio"] ?>" placeholder="hora_inicio" class="form-control" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label>hora de salida </label>
                                <input type="time" name="hora_final" value="<?php echo $consultaM["hora_final"] ?>" for="hora_final" placeholder="" class="form-control" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label>documento </label>
                                <input type="text" name="documento" value="<?php echo $consultaM["documento"] ?>" for="documento" placeholder="documento" class="form-control" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label>lider de ficha </label>
                                <input type="text" name="lider_ficha" value="<?php echo $consultaM["lider_ficha"] ?>" for="lider_ficha" placeholder="lider de ficha" class="form-control" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label>trimestre</label>
                                <select class="form-control" name="id_trimestre" for="id_trimestre" required>
                                    <option value="<?php echo $consultaM["id_trimestre"] ?>">Seleccione trimestre:</option>
                                    <option value="1">trimestre1</option>
                                    <option value="2">trimestre2</option>
                                    <option value="3">trimestre3</option>
                                    <option value="4">trimestre4</option>
                                </select>
                            </div>

                            <div class="form-group col-md-1">
                                <input type="submit" name="boton" value="Modificar" class="btn btn-primary">
                                
                            </div>
                            
                            <div class="form-group col-md-1">
                                <?php echo "<a href='updatehorario.php?id=" . $consultaM["id"] . "'><input type='button' class='btn bt-primary' value='Modificar horario'></a> " ?>
                            </div>

                        </form>
                    </div>
                    
            <?php
            }
        }
            ?>
                </div>
    </div>
    <script type="text/javascript" src='js/jquery.min.js'></script>
    <script type="text/javascript" src='js/bootstrap.min.js'></script>
    <script>
        if ($("#nombre_equipo").val() != "") {
            document.getElementById('divAdmin').classList.remove('deshabilitarDiv');
            document.getElementById('divCheckbox').classList.add('deshabilitarDiv');
        }
    </script>
</body>

</html>