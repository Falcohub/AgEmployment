<?php
    require_once('conexion.php');
    
    session_start();

    //Establecer conexión
    $db = new Database();
    $conexion = $db->connect();

    $documento = $_POST['TxtDocumento'];
    $nombres = $_POST['TxtNombres'];
    $apellidos = $_POST['TxtApellidos'];
    $correo = $_POST['TxtCorreo'];
    $password = sha1($_POST['TxtDocumento']);
    
    if(isset($_POST['TxtDocumento']) && isset($_POST['TxtNombres']) && isset($_POST['TxtApellidos']) && isset($_POST['TxtCorreo'])){

        //----- Verificar que no se repita el NIT -----
        $validar_id = $conexion->prepare("SELECT * FROM tbl_usuarios WHERE user_pkid = '$documento'");
        $validar_id->execute();
        $resultado = $validar_id->fetchAll(PDO::FETCH_ASSOC);
        if ($resultado){
            echo '
            <script>
            alert("Este documento ya esta registrado.");
            window.location = "../frontend/Frm_Registro.php";
            </script>
            ';
            exit();
        }

        $validar_correo = $conexion->prepare("SELECT * FROM tbl_usuarios WHERE user_correo = '$correo'");
        $validar_correo->execute();
        $resultado2 = $validar_correo->fetchAll(PDO::FETCH_ASSOC);
                
        if ($resultado2){
            echo '
            <script>
            alert("Este correo ya esta registrado.");
            window.location = "../frontend/Frm_Registro.php";
            </script>
            ';
            exit();
        }else{
        //----- Insertar o guardar datos en la tabla usuarios
        $pst =$conexion->prepare("INSERT INTO tbl_usuarios(user_pkid, user_ddi, user_nombres, user_apellidos, user_correo, user_password, user_estado, user_fechaUser) VALUES ('$documento', 'CC', '$nombres', '$apellidos', '$correo', '$password', 'Activo', CURRENT_DATE);");
        
        if ($pst->execute()){
            $_SESSION['rol'] = 'CC';
            $_SESSION['documentoEst'] = $documento;
            header('location: ../frontend/Frm_InfoEstudiante.php');
        }else {
            //----- Cargar la pagina para completar registro -----
            header('location: ../frontend/Frm_Registro.php');
        }
        }   
    }
?>