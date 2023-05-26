
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>horario</title>
    <link rel='stylesheet prefetch' href='css/bootstrap.min.css'>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <script type="text/javascript" src="js/scripRegArt.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<body>


        <?php
       session_start();
       if (!isset($_SESSION)) {
           header('Location: login.php');
           exit;
       } if(isset($_SESSION)) {
            session_destroy();
            include "Menu.php";

            include '../controlador/controladorHorario.php';
            $horario = new horario; 
            
            if (!empty($_GET['id'])) {
                $id = $_GET['id'];
                $resultadoDato = $horario->consultarHorario($id);
                $row = mysqli_fetch_array($resultadoDato);

                if (empty($row)) {
                    echo "<div class='alert alert-danger alert-dismissible'>";
                    echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                    echo "  <strong>Error!</strong> No se encontraron Registros";
                    echo "	<a href='insert-horario.php?activo=" . $id . "'><input type='button' class='btn btn-primary' value='insertar'></a> ";
                    echo "</div>";
                }
            }

        ?>

            <div class="container">
                <?php if (empty($row)) { ?>
                    <div class="row">
                        
                    </div>
                <?php } ?>
                <?php if (!empty($row)) { ?>
                    <div class="centrado1">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><strong>numero de ficha:</strong></td>
                                    <td><?php echo $row["id"]; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>lunes:</strong></td>
                                    <td><?php echo $row["lunes"]; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>martes:</strong></td>
                                    <td><?php echo $row["martes"]; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>miercoles:</strong></td>
                                    <td><?php echo $row["miercoles"]; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>jueves:</strong></td>
                                    <td><?php echo $row["jueves"]; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>viernes:</strong></td>
                                    <td><?php echo $row["viernes"]; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>sabado:</strong></td>
                                    <td><?php echo $row["sabado"]; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>domingo:</strong></td>
                                    <td><?php echo $row["domingo"]; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                    </div>

            </div>
    <?php
                }
            }
    ?>

    </div>
    <script type="text/javascript" src='js/jquery.min.js'></script>
    <script type="text/javascript" src='js/bootstrap.min.js'></script>
    <script type="text/javascript">
        function hola() {
            $("#id").val("hola");
        }
    </script>
</body>

</html>