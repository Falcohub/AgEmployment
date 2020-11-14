<?php

include_once 'conexion.php';

session_start();

$nombreEmpre = $_POST['TxtNombreEmpresa'];
$cargo = $_POST['TxtCargo'];
$contactoEmpre = $_POST['TxtContactoEmpre'];
$fechaInic = $_POST['TxtFechaInicio'];
$fechaFin = $_POST['TxtFechaFin'];

$db = new Database();
$conexion = $db->connect();

$GuardarExperiencia = $conexion->prepare("INSERT INTO tbl_explaboral(exp_fk_pkid, exp_nombreEmpresa, exp_cargo, exp_contactoEmpresa, exp_fechaIni, exp_fechaFin)
VALUES ({$_SESSION['documentoEst']},'$nombreEmpre', '$cargo', '$contactoEmpre', '$fechaInic' , '$fechaFin');");

