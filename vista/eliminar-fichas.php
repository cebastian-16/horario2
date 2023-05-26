<?php

session_start();
    if (!isset($_SESSION)) {
        header('Location: login.php');
        exit;
    } if(isset($_SESSION)) {
    session_destroy();
    include '../controlador/fichas.php';
    $index = new index;

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $resultado = $index->eliminar($id);
    } 
}
?>

