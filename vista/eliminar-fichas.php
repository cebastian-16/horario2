<?php

session_start();
if (isset($_POST['userLogin'])) {
    header('Location: login.php');
    exit;
} else {

    include '../controlador/fichas.php';
    $index = new index;

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $resultado = $index->eliminar($id);

    } 
}
?>

