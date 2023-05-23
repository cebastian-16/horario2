<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>



    <?php
    session_start();
    if (isset($_POST['userLogin'])) {
        header("Location: login.php");
        exit();
    } else {
        session_destroy();
        include "Menu.php";
        include '../controlador/controladorTri.php';
        $trimestre = new trimestre;

        $resultado = $trimestre->consultar();
        $resultados = $trimestre->consulta();
        $resultados3 = $trimestre->consultas();
        $resultados4 = $trimestre->consultasT();


    ?> <div class="container">

            <br>

            <div class="centrado">

                <div class="row">
                    <?php $row = mysqli_fetch_array($resultado) ?>
                    <div class="col-md-4">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><strong>trimestre:</strong></td>
                                    <td><?php echo $row["trimestre"]; ?></td>
                                </tr>
                                <tr>
                                    <?php $row["id_ficha"]; ?></td>
                                </tr>
                                <tr>
                                    <?php $trimestre = $row["trimestre"]; ?>
                                    <td><strong>ver fichas:</strong></td>
                                    <td><?php echo "<a href='fichas.php?trimestre=$trimestre'><svg style='color:blue'  xmlns='http://www.w3.org/2000/svg' width='30' height='20' fill='currentColor' class='bi bi-search' viewBox='0 0 16 16'>
                                    <path d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'/>
                                    </svg></a>"; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                    </div>
                    <?php  ?>
                </div>
            </div>

            <div class="centrado">
                <div class="row">
                    <?php $row = mysqli_fetch_array($resultados) ?>
                    <div class="col-md-4">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><strong>trimestre:</strong></td>
                                    <td><?php echo $row["trimestre"]; ?></td>
                                </tr>
                                <tr>
                                    <?php $row["id_ficha"]; ?></td>
                                </tr>
                                <tr>
                                    <?php $trimestre = $row["trimestre"]; ?>
                                    <td><strong>ver fichas:</strong></td>
                                    <td><?php echo "<a href='fichas.php?trimestre=$trimestre'><svg style='color:blue'  xmlns='http://www.w3.org/2000/svg' width='30' height='20' fill='currentColor' class='bi bi-search' viewBox='0 0 16 16'>
                                    <path d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'/>
                                    </svg></a>"; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                    </div>
                    <?php  ?>
                </div>
            </div>

            <div class="centrado">
                <div class="row">
                    <?php $row = mysqli_fetch_array($resultados3) ?>
                    <div class="col-md-4">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><strong>trimestre:</strong></td>
                                    <td><?php echo $row["trimestre"]; ?></td>
                                </tr>
                                <tr>
                                    <?php $row["id_ficha"]; ?></td>
                                </tr>
                                <tr>
                                    <?php $trimestre = $row["trimestre"]; ?>
                                    <td><strong>ver fichas:</strong></td>
                                    <td><?php echo "<a href='fichas.php?trimestre=$trimestre'><svg style='color:blue'  xmlns='http://www.w3.org/2000/svg' width='30' height='20' fill='currentColor' class='bi bi-search' viewBox='0 0 16 16'>
                                    <path d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'/>
                                    </svg></a>"; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                    </div>
                    <?php  ?>
                </div>
            </div>

            <div class="centrado">
                <div class="row">
                    <?php $row = mysqli_fetch_array($resultados4) ?>
                    <div class="col-md-4">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><strong>trimestre:</strong></td>
                                    <td><?php echo $row["trimestre"]; ?></td>
                                </tr>
                                <tr>
                                    <?php $row["id_ficha"]; ?></td>
                                </tr>
                                <tr>
                                    <?php $trimestre = $row["trimestre"]; ?>
                                    <td><strong>ver fichas:</strong></td>
                                    <td><?php echo "<a href='fichas.php?trimestre=$trimestre'><svg style='color:blue'  xmlns='http://www.w3.org/2000/svg' width='30' height='20' fill='currentColor' class='bi bi-search' viewBox='0 0 16 16'>
                                    <path d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'/>
                                    </svg></a>"; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                    </div>
                    <?php  ?>
                </div>
            </div>

        <?php
    }
        ?>

</body>

</html>