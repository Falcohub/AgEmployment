<?php
    require_once('conexion.php');

    //if(isset($_POST['TxtNIT']) && isset($_POST['TxtNombreEmpresa']) && isset($_POST['TxtCorreo'])){
        
        $NIT = $_POST['TxtNIT'];
        $nombreEmpresa = $_POST['TxtNombreEmpresa'];
        $correo = $_POST['TxtCorreo'];
        $password = sha1($_POST['TxtNIT']);

        //Establecer conexión
        $db = new Database();
        $conexion = $db->connect();
        
        //----- Verificar que no se repita el NIT -----
        $validar_NIT = $conexion->prepare("SELECT * FROM tbl_personas WHERE prs_pkid = '$NIT'");
        $validar_NIT->execute();
        if ($validar_NIT == true)
        {
            echo '
            <script>
            alert("Este NIT ya esta registrado.");
            window.location = "../frontend/Frm_Registro.php";
            </script>
            ';
        }
        
        //----- Verificar que no se repita el correo -----
        /*$validar_correo = $conexion->prepare("SELECT * FROM tbl_personas WHERE prs_correo = '$correo'");
        $validar_correo->execute();
        if ($validar_correo == true)
        {
            echo '
            <script>
            alert("Este correo ya esta registrado.");
            window.location = "../frontend/Frm_Registro.php";
            </script>
            ';
        }*/
        
        //----- Insertar datos en la tabla personas y usuarios
        $statement =$conexion->prepare("INSERT INTO tbl_personas(prs_pkid, prs_ddi, prs_nombres, prs_correo) VALUES ('$NIT', 'NIT', '$nombreEmpresa', '$correo')");
        $statement->execute();

        $statement =$conexion->prepare("INSERT INTO tbl_usuarios(user_pkUsuario, user_contraseña, user_fkPersona, user_fkRol, user_fkEstado, user_fecha)
        VALUES ('$correo', '$password', '$NIT', 2, 1, CURRENT_DATE);");
        $statement->execute();
            
        //$ultimoid = $conexion->lastInsertId();
        //----- Cargar la pagina para completar registro -----
        header('location: ../frontend/Frm_InfoEmpresa.php');

    //}
?>