<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel='stylesheet prefetch' href='css/bootstrap.min.css'>
    <link href="css/style.css" rel="stylesheet">
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
            include '../controlador/controladorTri.php';
            $trimestre1 = new trimestre;

            if (!empty($_GET['activo'])) {
                $activo = $_GET['activo'];
            }
            
            if (!empty($_POST['boton'])) {
                $accion = $_POST['boton'];
                $activo = $_POST['activo'];
                $trimestre = $_POST['trimestre'];


                if ($accion == "Agregar") {
                    $insertTrimestre = $trimestre1->insertTrimestre($activo, $trimestre);
                }
            }
            if (!empty($_GET['activo'])) {

        ?>
                <!-- <div class="users-form"> -->
                <h1> Crear Horario de la ficha</h1>
                <form action="insert-trimestre.php" method="POST">

                <div class="form-group col-md-4">
                        <label>trimestre </label>
                        <input type="" name="activo" value="<?php echo $activo ?>">
                    </div>

                
                    
                    <div class="form-group col-md-4">
                        <label>trimestre </label>
                        <input type="text" name="trimestre" value="" for="trimestre" placeholder="trimestre" class="form-control" required>
                    </div>



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