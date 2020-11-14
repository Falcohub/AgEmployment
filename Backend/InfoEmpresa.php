<?php
    include_once 'conexion.php';

    session_start();

    $NIT = $_POST['TxtNIT'];
    $nombreEmpresa = $_POST['TxtNombreEmpresa'];
    $contacto = $_POST['TxtContacto'];
    $correo = $_POST['TxtCorreo'];
    $dpto = $_POST['TxtDpto'];
    $ciudad = $_POST['CbxMunicipio'];
    $direccion = $_POST['TxtDireccion'];
        
    //Establecer conexión
    $db = new Database();
    $conexion = $db->connect();
        
        //----- Actualizar datos para completar registro
        $ActualizarEmpresa = $conexion->prepare("UPDATE tbl_usuarios SET user_pkid = '$NIT', user_nombres = '$nombreEmpresa', 
        user_contacto = '$contacto', user_correo = '$correo', user_dpto = '$dpto', user_ciudad = '$ciudad', 
        user_direccion = '$direccion' WHERE user_pkid = {$_SESSION['documento']}");
        
        if ($ActualizarEmpresa->execute()){
            $_SESSION['documento'] = $NIT;
            header('location: ../frontend/Frm_InfoEmpresa.php');
        }
?>