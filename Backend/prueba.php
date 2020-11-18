<?php
    include_once 'conexion.php';

    session_start();
    $db = new Database();
    $conexion = $db->connect();

    $estudiante = $conexion->query("SELECT * FROM tbl_usuarios WHERE user_pkid = {$_SESSION['idRegistroEst']}")->fetch(PDO::FETCH_ASSOC);

    //$experiencia = $conexion->query("SELECT * FROM tbl_explaboral WHERE exp_fkUsuario = {$_SESSION['idRegistroEst']}")->fetch(PDO::FETCH_ASSOC);

        var_dump($estudiante);