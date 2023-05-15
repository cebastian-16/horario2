<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel='stylesheet prefetch' href='css/bootstrap.min.css'>
    <link href="css/estilo.css" rel="stylesheet">
    <script type="text/javascript" src="js/scriptDatos.js"></script>
    <title>Ingresar Caracteristicas</title>
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

            if (!empty($_GET['activo'])) {
                $activo = $_GET['activo'];
            }
            if (!empty($_POST['boton'])) {
                $accion = $_POST['boton'];
                $id_ficha = null;
                $activo = $_POST['activo'];
                $lunes = $_POST['lunes'];
                $martes = $_POST['martes'];
                $miercoles = $_POST['miercoles'];
                $jueves = $_POST['jueves'];
                $viernes = $_POST['viernes'];
                $sabado = $_POST['sabado'];
                $domingo = $_POST['domingo'];

                if ($accion == "Agregar") {
                    $insertHorario = $horario->insertHorario($id_ficha, $activo, $lunes, $martes, $miercoles, $jueves, $viernes, $sabado, $domingo);
                }
            }
            if (!empty($_GET['activo'])) {

        ?>
                <div class="users-form">
                <h1> Crear Horario de la ficha</h1>
                <form action="insert-horario.php" method="POST">
                    <div class="form-group col-md-4">
                        <label>lunes </label>
                        <input type="text" name="lunes" for="lunes" value="" placeholder="lunes" class="form-control" >
                    </div>
                    <br>
                    <div class="form-group col-md-4">
                        <label>martes </label>
                        <input type="text" name="martes" value="" for="martes" placeholder="martes" class="form-control" >
                    </div>
                    <br>
                    <div class="form-group col-md-4">
                        <label>miercoles </label>
                        <input type="text" name="miercoles" value="" for="miercoles" placeholder="miercoles" class="form-control" >
                    </div>
                    <br>
                    <div class="form-group col-md-4">
                        <label>jueves </label>
                        <input type="text" name="jueves" value="" for="jueves" placeholder="jueves" class="form-control" >
                    </div>
                    <br>
                    <div class="form-group col-md-4">
                        <label>viernes </label>
                        <input type="text" name="viernes" for="viernes" value="" placeholder="viernes" class="form-control" >
                    </div>
                    <br>
                    <div class="form-group col-md-4">
                        <label>sabados </label>
                        <input type="text" name="sabado" value="" for="sabado" placeholder="sabado" class="form-control" >
                    </div>
                    <br>
                    <div class="form-group col-md-4">
                        <label>domingos </label>
                        <input type="text" name="domingo" value="" for="domingo" placeholder="domingo" class="form-control" >
                    </div>
                    <br>

                    <input type="hidden" name="activo" value="<?php echo $activo ?>">

                    <div class="form-group col-md-2">
                        <input type="submit" name="boton" value="Agregar" class="btn btn-primary">
                    </div>
                </form>
                <!-- </div> -->
    </div>
<?php
            }
        }
?>
<script type="text/javascript" src='js/jquery.min.js'></script>
<script type="text/javascript" src='js/bootstrap.min.js'></script>
</body>

</html>