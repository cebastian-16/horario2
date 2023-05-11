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
<div class="container-fluid">

<?php
session_start();
if (isset($_POST['userLogin'])) {
    header('Location: login.php');
    exit;
} else {
    include "Menu.php";
    include '../controlador/fichas.php';
    $index = new index;

    if (!empty($trimestre = $_GET['trimestre'])) {
        $resultado = $index->consulta($trimestre);
       
    } 
 
    
    

?><br>
    <div class="centrado">
        
        
        <div class="row">
            <?php while ($trimestre = mysqli_fetch_array($resultado) )  : ?>
                
                <div class="col-md-4">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><strong>codigo de ficha:</strong></td>
                                <td><?php echo $trimestre["id"]; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Nombre de ficha:</strong></td>
                                <td><?php echo $trimestre["nombre"]; ?></td>
                            </tr>
                            <tr>
                                <td><strong>hora de inicio:</strong></td>
                                <td><?php echo $trimestre["hora_inicio"]; ?></td>
                            </tr>
                            <tr>
                                <td><strong>hora de salida:</strong></td>
                                <td><?php echo $trimestre["hora_final"]; ?></td>
                            </tr>
                            <tr>
                                <td><strong>centro:</strong></td>
                                <td><?php echo $trimestre["id_centro"]; ?></td>
                            </tr>
                            <tr>
                                <td><strong>documento:</strong></td>
                                <td><?php echo $trimestre["documento"]; ?></td>
                            </tr>
                            <tr>
                                <td><strong>lider de ficha:</strong></td>
                                <td><?php echo $trimestre["lider_ficha"]; ?></td>
                            </tr>
                            <tr>
                            <td><strong>id:</strong></td>
                                <td><?php echo $trimestre["id_ficha"]; ?></td>
                            </tr>
                            <tr>
                            <td><strong>trimestre</strong></td>
                                <td><?php echo $trimestre["trimestre"]; ?></td>
                            </tr>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                </div>
            <?php endwhile; ?>
        </div>
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