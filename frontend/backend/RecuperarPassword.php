<?php
    include_once 'conexion.php';

    $db = new Database();
    $conexion = $db->connect();

    $correo = $_POST['TxtCorreo'];
    
    $recuperarpass = $conexion->query("SELECT user_correo FROM tbl_usuarios WHERE user_correo = '$correo'")->fetch(PDO::FETCH_ASSOC);

    if ($recuperarpass) {
        echo 'Correo de recuperación de contraseña enviado a '.$recuperarpass['user_correo'].'<br>'; 
    }else{
        echo 'El correo ingresado no existe';
    };