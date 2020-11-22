<?php
include_once 'conexion.php';

session_start();

//Establecer conexión
$db = new Database();
$conexion = $db->connect();

$titulo = $_POST['txtTitulo'];
$descripcion = $_POST['txtDescripcion'];
$salario = $_POST['txtSalario'];
$tipoEmpleo = $_POST['txtTipoEmp'];
$ubicacion = $_POST['cbxMunicipio'];
//$fechaInic = $_POST['txtFechaPubli'];
$fechaFin = $_POST['txtFechaFin'];


if (isset($_SESSION['idRegistroEmp'])) {

    $publicarEmpleo = $conexion->prepare("INSERT INTO tbl_empleos(emp_titulo, emp_descripcion, emp_salario, emp_tipoEmpleo, emp_lugar, emp_fechaPubli, emp_fechaFin, emp_fkUsuario)
    VALUES ('$titulo', '$descripcion', '$salario',  '$tipoEmpleo', '$ubicacion', CURRENT_DATE, '$fechaFin', '{$_SESSION['idRegistroEmp']}');");

    if ($publicarEmpleo->execute()) {
        echo '
        <script>
            alert("Empleo publicado.");
            window.location = "../frontend/Frm_PublicarEmpleo.php";
        </script>
        ';
        exit();
    }
}else if (isset($_SESSION['idLogin'])) {

    $publicarEmpleo = $conexion->prepare("INSERT INTO tbl_empleos(emp_titulo, emp_descripcion, emp_salario, emp_tipoEmpleo, emp_lugar, emp_fechaPubli, emp_fechaFin, emp_fkUsuario)
        VALUES ('$titulo', '$descripcion', '$salario',  '$tipoEmpleo', '$ubicacion', CURRENT_DATE, '$fechaFin', '{$_SESSION['idLogin']}');");

    if ($publicarEmpleo->execute()) {
        
    }
}
