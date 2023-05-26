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


    <?php
    session_start();
    if (!isset($_SESSION)) {
        header('Location: login.php');
        exit;
    }
    if (isset($_SESSION)) {
        session_destroy();


        include '../controlador/controladorHorario.php';
        $horario = new horario;

        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $resultadoDato = $horario->consultarHorario($id);
            $row = mysqli_fetch_array($resultadoDato);
        }

    ?>

        <div class="container">

            <div class="row">
                <div class="col-sm-4">
                    <h2 class="center">ficha</h2>
                    <hr>
                </div>
            </div>

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