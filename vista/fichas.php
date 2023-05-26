
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


    <?php
    session_start();
    if (!isset($_SESSION)) {
        header('Location: login.php');
        exit;
    }
    if (isset($_SESSION)) {
        session_destroy();
        include "Menu.php";
        include '../controlador/fichas.php';
        $index = new index;


        if (!empty($_GET['trimestre'])) {
            $trimestre = $_GET['trimestre'];
            $resultado = $index->consulta($trimestre);
        }



    ?>
        <div class="container">
            <br>

            <div class="fichas">
                <div class="row">
                    <?php while ($trimestre = mysqli_fetch_array($resultado)) : ?>

                        <div class="col-md-6">
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
				                        </svg></a>"; ?>
                                        <?php echo "<a href='genera-horario.php?id=" . $trimestre['id'] . "' > <svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor' class='bi bi-filetype-pdf' viewBox='0 0 16 16'>
                                        <path fill-rule='evenodd' d='M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z'/></a>"; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>actualizar ficha:</strong></td>
                                        <td><?php echo "<a href='updateficha.php?id=" . $trimestre['id'] . "' ><svg style='color:blue' xmlns='http://www.w3.org/2000/svg'  width='30' height='40' fill='currentColor' class='bi bi-box-arrow-in-right' viewBox='0 0 16 16'>
                                        <path fill-rule='evenodd' d='M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z'/>
                                        <path fill-rule='evenodd' d='M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z'/>
                                        </svg></a>"; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>generar pdf ficha:</strong></td>
                                        <td><?php echo "<a href='generar.php?id=" . $trimestre['id'] . "' class='btn btn-outline-danger'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor' class='bi bi-filetype-pdf' viewBox='0 0 16 16'>
                                        <path fill-rule='evenodd' d='M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z'/>
                                        </svg> </a>"; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>eliminar ficha:</strong></td>
                                        <td><?php echo "<a href='eliminar-fichas.php?id=" . $trimestre['id'] . "' class='btn btn-outline-danger' onclick='return confirmacion()'>Eliminar</a>"; ?></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                            <br>
                        </div>
                    <?php endwhile;
                    ?>
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

