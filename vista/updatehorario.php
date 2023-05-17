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
            include '../controlador/controladorHorario.php';
            $horario = new horario;


            if (!empty($_GET['id'])) {
                $id = $_GET['id'];
                $resultadohorario = $horario->mirarHorario($id);
                $consultaM = mysqli_fetch_array($resultadohorario);

                if (empty($consultaM)) {
                    echo "<div class='alert alert-danger alert-dismissible'>";
                    echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                    echo "  <strong>Error!</strong> No se encontraron Registros";
                    echo "	<a href='insert-horario.php?activo=" . $id . "'><input type='button' class='btn btn-primary' value='insertar horario'></a> ";
                    echo "</div>";
                }
            }

            if (!empty($_POST['boton'])) {
                $accion = $_POST['boton'];
                if ($accion == "Modificar") {
                    $id_ficha = $_POST['id_ficha'];
                    $lunes = $_POST['lunes'];
                    $martes = $_POST['martes'];
                    $miercoles = $_POST['miercoles'];
                    $jueves = $_POST['jueves'];
                    $viernes = $_POST['viernes'];
                    $sabado = $_POST['sabado'];
                    $domingo = $_POST['domingo'];
                    $updatehorario = $horario->updateHorario($id_ficha, $lunes, $martes, $miercoles, $jueves, $viernes, $sabado, $domingo);
                }
            }
        ?>

            <?php if (!empty($consultaM)) { ?>

                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-4">
                                <h2>Modificar Horario</h2>    
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <form action="updatehorario.php" method="post" name="formDatos">
                            <div class="form-group col-md-4">
                                <label>ficha </label>
                                <?php echo "<input class='form-control' style='display:none;' value='" . $consultaM["id_ficha"] . "' name='id_ficha' type='text'>" ?>
                                <?php echo "<input class='form-control' disabled value='" . $consultaM["id_ficha"] . "' type='text'>" ?>
                            </div>

                            <div class="form-group col-md-4">
                                <label>lunes </label>
                                <input type="text" name="lunes" value="<?php echo $consultaM["lunes"] ?>" for="lunes" placeholder="lunes" class="form-control">
                            </div>

                            <div class="form-group col-md-4">
                                <label>martes </label>
                                <input type="text" name="martes" value="<?php echo $consultaM["martes"] ?>" for="martes" placeholder="martes" class="form-control">
                            </div>

                            <div class="form-group col-md-4">
                                <label>miercoles </label>
                                <input type="text" name="miercoles" value="<?php echo $consultaM["miercoles"] ?>" for="miercoles" placeholder="mierecoles" class="form-control">
                            </div>

                            <div class="form-group col-md-4">
                                <label>jueves </label>
                                <input type="text" name="jueves" value="<?php echo $consultaM["jueves"] ?>" for="jueves" placeholder="jueves" class="form-control">
                            </div>

                            <div class="form-group col-md-4">
                                <label>viernes </label>
                                <input type="text" name="viernes" value="<?php echo $consultaM["viernes"] ?>" for="viernes" placeholder="viernes" class="form-control">
                            </div>

                            <div class="form-group col-md-4">
                                <label>sabados </label>
                                <input type="text" name="sabado" value="<?php echo $consultaM["sabado"] ?>" for="sabado" placeholder="sabado" class="form-control">
                            </div>

                            <div class="form-group col-md-4">
                                <label>domingos </label>
                                <input type="text" name="domingo" value="<?php echo $consultaM["domingo"] ?>" for="domingo" placeholder="domingo" class="form-control">
                            </div>

                            <div class="form-group col-md-1">
                                <input type="submit" name="boton" value="Modificar" class="btn btn-primary">

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