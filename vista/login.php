<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel='stylesheet prefetch' href='css/bootstrap.min.css'>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

    <?php

    if (isset($_POST['login'])) {

        $usuario = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];

        include '../Controlador/controladorLogin.php';
        $login = new login;
        $result = $login->consultarLogin($usuario, $contraseña);
        if (!$result) {
            echo "<div class='alert alert-danger alert-dismissible'>";
            echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
            echo "  <strong>Error!</strong> Usuario no existe o Contraseña invalida";
            echo "</div>";
        } else {
            
            //if (password_verify($password, $result['password'])) { ---revisar
            if ($contraseña == $result['contraseña']  && $usuario == $result['usuario']) {
                $_SESSION['userLogin'] = $result['usuario'];
                echo "<div class='alert alert-success alert-dismissible'>";
                echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                echo "  <strong>Excelente!</strong> Datos correctos.";
                echo "</div>";
                echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php'>";
            } else {

                echo "<div class='alert alert-danger alert-dismissible'>";
                echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                echo "  <strong>Error!</strong> Usuario o Contraseña invalido";
                echo "</div>";
            }
        }
        $_SESSION['userLogin'] = $result['usuario'];
    }
    ?>
    <form method="post" action="" name="signin-form">
        <div class="login-wrap">
            <div class="login-html">
                <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Bienvenido </label>
                <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
                <div class="login-form">
                    <div class="sign-in-htm">
                        <div class="group">
                            <label for="user" class="label">Usuario</label>
                            <input name="usuario" type="text" class="input" required>
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Contraseña</label>
                            <input name="contraseña" type="password" class="input" data-type="contraseña" required>
                        </div>
                        <br />
                        <div class="group">
                            <input type="submit" class="button" name="login" value="Ingresar">
                        </div>
                        <div class="hr"></div>
                       
                    </div>
                </div>
            </div>
        </div>
    </form>>
    <?php
    // header('Location: index.php');
    // exit;
    ?>
    <script type="text/javascript" src='js/jquery.min.js'></script>
    <script type="text/javascript" src='js/bootstrap.min.js'></script>
</body>

</html>