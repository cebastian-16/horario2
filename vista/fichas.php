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
<script>
    function confirmacion() {
        var respuesta = confirm("¿Desea realmente borrar el registro?");
        if (respuesta == true) {
            return true;
        } else {
            return false;
        }

    }

    const toggle = document.getElementById('theme-toggle');
    const body = document.body;

    toggle.addEventListener('click', () => {
        body.classList.toggle('dark-theme');
    });
</script>

<body>
    <div class="container">

        <?php
        session_start();
        if (isset($_POST['userLogin'])) {
            header('Location: login.php');
            exit;
        } else {
            include "Menu.php";
            include '../controlador/fichas.php';
            $index = new index;

            if (isset($_GET['trimestre'])) {
                $trimestre = $_GET['trimestre'];
                $resultado = $index->consulta($trimestre);
                
                if (empty($resultado)) {
                    echo "<div class='alert alert-danger alert-dismissible'>";
                    echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                    echo "  <strong>Error!</strong> No se encontraron Registros";
                    echo "</div>";
                }
    
            } 
            
            
        ?><br>
            <div class="fichas">
                <div class="row">
                    <?php while ($trimestre = mysqli_fetch_array($resultado)) : ?>

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
                                        <td><strong>trimestre</strong></td>
                                        <td><?php echo $trimestre["trimestre"]; ?></td>
                                    </tr>
                                    </tr>
                                    <td><strong>municipio:</strong></td>
                                    <td><?php echo $trimestre["nombre_municipio"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>ambiente:</strong></td>
                                        <td><?php echo $trimestre["nombre_ambiente"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>ver horario :</strong></td>
                                        <td><?php echo "<a href='horario.php?id=" . $trimestre['id'] . "' ><svg style='color:blue'  xmlns='http://www.w3.org/2000/svg' width='30' height='20' fill='currentColor' class='bi bi-search' viewBox='0 0 16 16'>
				                        <path d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'/>
				                        </svg></a>"; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>actualizar horario :</strong></td>
                                        <td><?php echo "<a href='updateficha.php?id=" . $trimestre['id'] . "' ><svg style='color:blue' xmlns='http://www.w3.org/2000/svg'  width='30' height='40' fill='currentColor' class='bi bi-box-arrow-in-right' viewBox='0 0 16 16'>
                                        <path fill-rule='evenodd' d='M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z'/>
                                        <path fill-rule='evenodd' d='M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z'/>
                                        </svg></a>"; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>eliminar ficha :</strong></td>
                                        <td><?php echo "<a href='eliminar-fichas.php?id=" . $trimestre['id'] . "' class='btn btn-outline-danger' onclick='return confirmacion()'>Eliminar</a>"; ?></td>   
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