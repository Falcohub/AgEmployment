<?php
include_once 'conexion.php';

$db = new Database();
$conexion = $db->connect();

$consulta = $conexion->prepare("SELECT * FROM tbl_usuarios WHERE user_correo = 'obeimar@sanchez' and user_password = '001'");
$consulta->execute();

$row = $consulta->fetch(PDO::FETCH_NUM);
if ($row == true) {
    //validar rol
    $rol = $row[1];

    $_SESSION['rol'] = $rol;

    if ($_SESSION['rol'] == 'TI' || $_SESSION['rol'] == 'CC') {
        header('location: ../frontend/Frm_InfoEstudiante.php');
    } else
        header('location: ../frontend/Frm_InfoEmpresa.php');

}
