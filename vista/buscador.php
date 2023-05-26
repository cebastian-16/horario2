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

</body>

</html>


<?php
// Conexión a la base de datos
include '../controlador/fichas.php';
include "Menu.php";
$index = new index;

// Obtener el término de búsqueda
$query = isset($_POST['id']) ? $_POST['id'] : '';

// Realizar la búsqueda de la ficha
$resultadoFicha = $index->buscarficha($query);
?>

<?php
// Mostrar los resultados
if ($resultadoFicha->num_rows > 0) {
    while ($trimestre = $resultadoFicha->fetch_assoc()) {
        $fila = '<div class="container">';
        $fila .= '<div class="fichas">';
        $fila .= '<div class="row">';
        $fila .=  '<div class="col-md-6">';
        $fila .=            '<table class="table"  margin-top: 5%;">';
        $fila .=               '<tbody>';
        $fila .=            '<tr>';
        $fila .=                '<td><strong>codigo de ficha:</strong></td>';
        $fila .=                '<td>' . $trimestre["id"] . '</td>';
        $fila .=            '</tr>';
        $fila .=            '<tr>';
        $fila .=                '<td><strong>Nombre de ficha:</strong></td>';
        $fila .=                '<td>' . $trimestre["nombre"] . '</td>';
        $fila .=            '</tr>';
        $fila .=            '<tr>';
        $fila .=                '<td><strong>hora de inicio:</strong></td>';
        $fila .=                '<td>' . $trimestre["hora_inicio"] . '</td>';
        $fila .=            '</tr>';
        $fila .=            '<tr>';
        $fila .=                 '<td><strong>hora de final:</strong></td>';
        $fila .=                '<td>' . $trimestre["hora_final"] . '</td>';
        $fila .=            '</tr>';;
        $fila .=            '<tr>';
        $fila .=                '<td><strong>centro:</strong></td>';
        $fila .=                '<td>' . $trimestre["id_centro"] . '</td>';
        $fila .=            '</tr>';
        $fila .=            '<tr>';
        $fila .=                '<td><strong>documento:</strong></td>';
        $fila .=                '<td>' . $trimestre["documento"] . '</td>';
        $fila .=            '</tr>';
        $fila .=            '<tr>';
        $fila .=                '<td><strong>lider de ficha:</strong></td>';
        $fila .=                '<td>' . $trimestre["lider_ficha"] . '</td>';
        $fila .=            '</tr>';
        $fila .=            '<tr>';
        $fila .=                '<td><strong>trimestre</strong></td>';
        $fila .=                '<td>' . $trimestre["trimestre"] . '</td>';
        $fila .=            '</tr>';
        $fila .=            '<tr>';
        $fila .=                '<td><strong>municipio:</strong></td>';
        $fila .=                '<td>' . $trimestre["nombre_municipio"] . '</td>';
        $fila .=            '</tr>';
        $fila .=            '<tr>';
        $fila .=                '<td><strong>ambiente:</strong></td>';
        $fila .=                '<td>' . $trimestre["nombre_ambiente"] . '</td>';
        $fila .=            '</tr>';
        $fila .=            '</tr>';
        $fila .=            '<tr>';
        $fila .=                '<td><strong>ver horario:</strong></td>';
        $fila .=                '<td> <a href="horario.php?id=' . $trimestre["id"] . '" ><svg style="color:blue"  xmlns="http://www.w3.org/2000/svg" width="30" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">';
        $fila .=                  '<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>';
        $fila .=                '</svg></a></td>';
        $fila .=            '</tr>';
        $fila .=            '<tr>';
        $fila .=                '<td><strong>actualizar ficha:</strong></td>';
        $fila .=                '<td>  <a href="updateficha.php?id=' . $trimestre["id"] . '" ><svg style="color:blue" xmlns="http://www.w3.org/2000/svg"  width="30" height="40" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">';
        $fila .=                  '<path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>';
        $fila .=                  '<path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>';
        $fila .=                '</svg></a></td>';
        $fila .=            '</tr>';
        $fila .=            '<tr>';
        $fila .=                '<td><strong>eliminar ficha:</strong></td>';
        $fila .=                '<td>  <a href="eliminar-fichas.php?id=' . $trimestre["id"] . '" class="btn btn-outline-danger" onclick="return confirmacion()">Eliminar</a></td>';
        $fila .=            '</tr>';
        $fila .=        '</tbody>';
        $fila .=    '</table>';
        $fila .=    '<br>';
        $fila .=    '</div>';
        $fila .=    '</div>';
        $fila .=    '</div>';
        $fila .=    '</div>';

        // Imprimir la tabla en HTML
        echo $fila;
    }
} else {
    echo "<div class='alert alert-danger alert-dismissible'>";
    echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
    echo "  <strong>Error!</strong> No se encontraron Registros";
    echo "</div>";
}
?>