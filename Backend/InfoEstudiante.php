<?php
    include_once 'conexion.php';

    session_start();
    
    //Establecer conexión
    $db = new Database();
    $conexion = $db->connect();


//Ubicacion para guardar el archivo----------------------------------------------------------------------
$directorio = "../frontend/docs/";

//Nombre de archivo
$archivo = $directorio . basename($_FILES["file"]["name"]);

$tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

$checarSiArchivo =  filesize($_FILES["file"]["tmp_name"]);

//var_dump($size);

if ($checarSiArchivo != false) {

    //validando tamaño del archivo
    $size = $_FILES["file"]["size"];

    if ($size > 900000) {
        echo "El archivo tiene que ser menor a 900kb";
    } else {

        //validar tipo de archivo
        if ($tipoArchivo == "pdf") {
            //se valido el archivo correctamente

            if(move_uploaded_file($_FILES["file"]["tmp_name"], $archivo)){
                echo "El archivo se subió correctamente";     
            }else{
                echo "Hubo un error en la subida del archivo";
            }

        }else{
            echo "Solo de admite archivos pdf";
        }
    }
} else {
    echo "El archivo no es una imagen";
}   

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
    $subirCV = $archivo;

    if (isset($_SESSION['idRegistroEst'])) {       

        //----- Actualizar datos para completar registro
        $ActualizarEstudiante = $conexion->prepare("UPDATE tbl_usuarios SET user_pkid = '$documento', user_ddi = '$ddi', user_nombres = '$nombres', user_apellidos = '$apellidos', user_sexo = '$sexo', user_contacto = '$contacto', user_correo = '$correo', user_dpto = '$dpto', user_ciudad = '$ciudad', user_direccion = '$direccion', user_fechaNac = '$fechaNac', user_perfil = '$perfil', user_cv = '$subirCV'  WHERE user_pkid = {$_SESSION['idRegistroEst']}");

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
        $ActualizarEstudiante = $conexion->prepare("UPDATE tbl_usuarios SET user_pkid = '$documento', user_ddi = '$ddi', user_nombres = '$nombres', user_apellidos = '$apellidos', user_sexo = '$sexo', user_contacto = '$contacto', user_correo = '$correo', user_dpto = '$dpto', user_ciudad = '$ciudad', user_direccion = '$direccion', user_fechaNac = '$fechaNac', user_perfil = '$perfil', user_cv = '$subirCV' WHERE user_pkid = {$_SESSION['idLogin']}");
    
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
