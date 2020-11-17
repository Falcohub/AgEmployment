<?php
    include_once 'conexion.php';

    session_start();

    $nombreEmpre = $_POST['TxtNombreEmpresa'];
    $cargo = $_POST['TxtCargo'];
    $contactoEmpre = $_POST['TxtContacto'];
    $fechaInic = $_POST['TxtFechaInicio'];
    $fechaFin = $_POST['TxtFechaFin'];

    $db = new Database();
    $conexion = $db->connect();

    $GuardarExperiencia = $conexion->prepare("INSERT INTO tbl_explaboral(exp_fkUsuario, exp_nombreEmpresa, exp_cargo, exp_contactoEmpresa, exp_fechaIni, exp_fechaFin)
    VALUES ('{$_SESSION['documentoEst']}','$nombreEmpre', '$cargo', '$contactoEmpre', '$fechaInic' , '$fechaFin');");

    if ($GuardarExperiencia->execute()){
        header('location: ../frontend/Frm_InfoEstudiante.php');
    }
?>