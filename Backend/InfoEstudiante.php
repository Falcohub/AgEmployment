<?php
    include_once 'conexion.php';

    $directorio = "Documentos/";

    $archivo = $directorio . basename($_FILES["file"]["name"]);

    $tipoArchivo = pathinfo($archivo, PATHINFO_EXTENSION);

      // valida que es imagen
     //$checarSiImagen = file_exists($_FILES["file"]["tmp_name"]);

    if($tipoArchivo != false){

        //validando tamaño del archivo
        $size = $_FILES["file"]["size"];

        if($size > 900000){
            echo "El archivo tiene que ser menor a 900kb";
        }else{

            //validar tipo de imagen
            if($tipoArchivo == "docx" || $tipoArchivo == "pdf" || $tipoArchivo == "doc"){
                // se validó el archivo correctamente
                if(move_uploaded_file($_FILES["file"]["tmp_name"], $archivo)){
                     echo '
                    <script>
                        alert("Datos guardados correctamente.");
                        window.location = "../frontend/Frm_Infoestudiante.php";
                    </script>
                    ';
                }else{
                    echo "Hubo un error en la subida del archivo";
                }
            }else{
                echo "Solo se admiten archivos docx/pdf";
            }
        }
    }else{
        echo "No es un Documento";
    }

    session_start();
    
    //Establecer conexión
    $db = new Database();
    $conexion = $db->connect();

    $documento = $_POST['TxtDocumento'];
    $ddi = $_POST['Cbx_ddi'];
    $nombres = $_POST['TxtNombre'];
    $apellidos = $_POST['TxtApellido'];
    $sexo = $_POST['CbxSexo'];
    $contacto = $_POST['TxtContacto'];
    $correo = $_POST['TxtCorreo'];
    $dpto = $_POST['TxtDpto'];
    $ciudad = $_POST['CbxCiudad'];
    $direccion = $_POST['TxtDireccion'];
    $fechaNac = $_POST['TxtFechaNac'];
    $perfil = $_POST['TxtPerfil'];


    if (isset($_SESSION['idRegistroEst'])) {       

        //----- Actualizar datos para completar registro
        $ActualizarEstudiante = $conexion->prepare("UPDATE tbl_usuarios SET user_pkid = '$documento', user_ddi = '$ddi', user_nombres = '$nombres', user_apellidos = '$apellidos', user_sexo = '$sexo', user_contacto = '$contacto', user_correo = '$correo', user_dpto = '$dpto', user_ciudad = '$ciudad', user_direccion = '$direccion', user_fechaNac = '$fechaNac', user_perfil = '$perfil' , Hoja = '$checarSiImagen'  WHERE user_pkid = {$_SESSION['idRegistroEst']}");

            if ($ActualizarEstudiante->execute()) {
                $_SESSION['idRegistroEst'] = $documento;
                echo '
                    <script>
                        alert("Datos guardados correctamente.");
                        window.location = "../frontend/Frm_Infoestudiante.php";
                    </script>
                    ';
            }
    }else if (isset($_SESSION['idLogin'])) {
    
        //----- Actualizar datos para completar registro
        $ActualizarEstudiante = $conexion->prepare("UPDATE tbl_usuarios SET user_pkid = '$documento', user_ddi = '$ddi', user_nombres = '$nombres', user_apellidos = '$apellidos', user_sexo = '$sexo', user_contacto = '$contacto', user_correo = '$correo', user_dpto = '$dpto', user_ciudad = '$ciudad', user_direccion = '$direccion', user_fechaNac = '$fechaNac', user_perfil = '$perfil', Hoja = '$checarSiImagen'  WHERE user_pkid = {$_SESSION['idLogin']}");
    
            if ($ActualizarEstudiante->execute()) {
                $_SESSION['idLogin'] = $documento;
                echo '
                    <script>
                        alert("Datos guardados correctamente.");
                        window.location = "../frontend/Frm_Infoestudiante.php";
                    </script>
                    ';
            }
    }
?>