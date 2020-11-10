<?php
    require_once('conexion.php');
    
    $documento = $_POST['TxtDocumento'];
    $nombres = $_POST['TxtNombres'];
    $apellidos = $_POST['TxtApellidos'];
    $correo = $_POST['TxtCorreo'];
    $password = sha1($_POST['TxtCorreo']);
    
    //Establecer conexión
    $db = new Database();
    $conexion = $db->connect();

    //----- Verificar que no se repita el ID -----
    $validar_id = $conexion->prepare("SELECT * FROM tbl_personas WHERE prs_pkid = '$documento'");
    $validar_id->execute();
    if ($validar_id == true)
    {
        echo '
        <script>
        alert("Este documento ya esta registrado.");
        window.location = "../frontend/Frm_Registro.php";
        </script>
        ';
    }
        //----- Insertar datos en la tabla personas y usuarios
        $statement =$conexion->prepare("INSERT INTO tbl_personas(prs_pkid, prs_ddi, prs_nombres, prs_apellidos, prs_correo) VALUES ('$documento', 'CC', '$nombres', '$apellidos', '$correo')");
        $statement->execute();
    
        $statement =$conexion->prepare("INSERT INTO tbl_usuarios(user_pkUsuario, user_contraseña, user_fkPersona, user_fkRol, user_fkEstado, user_fecha)
        VALUES ('$correo', '$password', '$documento', 1, 1, CURRENT_DATE);");
        $statement->execute();

        //----- Cargar la pagina para completar registro -----
        header('location: ../frontend/Frm_InfoEstudiante.php');
?>