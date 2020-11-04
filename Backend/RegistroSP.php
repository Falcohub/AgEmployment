<?php
    require_once ('conexion.php');

    //Ejecutar procedimiento almacenado para registrar persona y usuario
        $mysql = new connection();
        $conexion = $mysql->get_connection();

        $documento = $_POST['TxtDocumento'];
        $nombres = $_POST['TxtNombres'];
        $apellidos = $_POST['TxtApellidos'];
        $correo = $_POST['TxtCorreo'];

        $statement = $conexion->prepare("CALL SP_Registrar(?,?,?,?)");
        $statement->bind_param("ssss" , $documento, $nombres, $apellidos, $correo);
        $statement->execute();
        $statement->close();
        $conexion->close();

        // Cargar la pagina de completar registro
        header('location: ../frontend/Frm_InfoEstudiante.php');

?>