<?php
    include_once 'conexion.php';

    session_start();

    //Establecer conexión
    $db = new Database();
    $conexion = $db->connect();

    $NIT = $_POST['TxtNIT'];
    $nombreEmpresa = $_POST['TxtNombreEmpresa'];
    $contacto = $_POST['TxtContacto'];
    $correo = $_POST['TxtCorreo'];
    $dpto = $_POST['TxtDpto'];
    $ciudad = $_POST['CbxMunicipio'];
    $direccion = $_POST['TxtDireccion'];

    if (isset($_SESSION['idRegistroEmp'])) {

        //----- Actualizar datos para completar registro
        $ActualizarEmpresa = $conexion->prepare("UPDATE tbl_usuarios SET user_pkid = '$NIT', user_nombres = '$nombreEmpresa', user_contacto = '$contacto', user_correo = '$correo', user_dpto = '$dpto', user_ciudad = '$ciudad', user_direccion = '$direccion' WHERE user_pkid = {$_SESSION['idRegistroEmp']}");

        if ($ActualizarEmpresa->execute()) {
            $_SESSION['idRegistroEmp'] = $NIT;
            echo '
            <script>
                alert("Datos actualizado correctamente.");
                window.location = "../Frm_InfoEmpresa.php";
            </script>
            ';
        }
    } else if (isset($_SESSION['idLogin'])) {

        $ActualizarEmpresa = $conexion->prepare("UPDATE tbl_usuarios SET user_pkid = '$NIT', user_nombres = '$nombreEmpresa', user_contacto = '$contacto', user_correo = '$correo', user_dpto = '$dpto', user_ciudad = '$ciudad', user_direccion = '$direccion' WHERE user_pkid = {$_SESSION['idLogin']}");

        if ($ActualizarEmpresa->execute()) {
            $_SESSION['idLogin'] = $NIT;
            echo '
            <script>
                alert("Datos actualizado correctamente.");
                window.location = "../Frm_InfoEmpresa.php";
            </script>
            ';
        }
}
