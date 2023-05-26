<?php
//contenedor para aguardar el contenido del php
ob_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
</head>

<body>


    <div class="container">

        <?php
        session_start();
        if (!isset($_SESSION)) {
            header('Location: login.php');
            exit;
        }
        if (isset($_SESSION)) {

            // include 'Menu.php';
            include '../Controlador/fichas.php';
            $index = new index;


            if (!empty($_GET['id'])) {
                $id = $_GET['id'];
                $resultado = $index->buscar($id);
                $row = mysqli_fetch_array($resultado);

                if (empty($row)) {
                    echo "<div class='alert alert-danger alert-dismissible'>";
                    echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                    echo "  <strong>Error!</strong> No se encontraron Registros";
                    echo "</div>";
                }
            }

        ?>

            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-4">
                            <h2 class="center">ficha</h2>
                            <hr>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="form-group col-md-3">
                        <label>id: </label>
                        <?php echo $row['id'] ?>
                    </div>
                    <br>
                    <div class="form-group col-md-3">
                        <label>nombre: </label>
                        <?php echo $row['nombre'] ?>
                    </div>
                    <br>
                    <div class="form-group col-md-3">
                        <label>hora_inicio: </label>
                        <?php echo $row["hora_inicio"] ?>
                    </div>
                    <br>
                    <div class="form-group col-md-3">
                        <label>hora_final: </label>
                        <?php echo $row["hora_final"] ?>
                    </div>
                    <br>
                    <div class="form-group col-md-3">
                        <label>id_centro: </label>
                        <?php echo $row['id_centro'] ?>
                    </div>
                    <br>
                    <div class="form-group col-md-3">
                        <label>documento: </label>
                        <?php echo $row["documento"] ?>
                    </div>
                    <br>
                    <div class="form-group col-md-3">
                        <label>lider_ficha: </label>
                        <?php echo $row["lider_ficha"] ?>
                    </div>
                    <br>
                    <div class="form-group col-md-3">
                        <label>trimestre: </label>
                        <?php echo $row["trimestre"] ?>
                    </div>
                    <br>
                    <div class="form-group col-md-3">
                        <label>nombre_municipio: </label>
                        <?php echo $row["nombre_municipio"] ?>
                    </div>
                    <br>
                    <div class="form-group col-md-3">
                        <label>nombre_ambiente: </label>
                        <?php echo $row["nombre_ambiente"] ?>
                    </div>
                    <br>


                </div>
            <?php
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

<?php
//codigo para el pdf
$html = ob_get_clean();

require_once '../Libreria/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf;
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('latter');

// $dompdf->setPaper('A4','landscape');

$dompdf->render();
$dompdf->stream("ficha.pdf", array("Attachment" => true))

?>