<?php
    include_once 'conexion.php';

    session_start();
    
    //Establecer conexión
    $db = new Database();
    $conexion = $db->connect();


//Ubicacion para guardar el archivo----------------------------------------------------------------------
$directorio = "../docs/";

//Nombre de archivo
$archivo = $directorio . basename($_FILES["file"]["name"]);

$tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

$checarSiArchivo =  filesize($_FILES["file"]["tmp_name"]);

//var_dump($size);

if ($checarSiArchivo != false) {

    //validando tamaño del archivo
    $size = $_FILES["file"]["size"];

    if ($size > 2000000) {
        echo '
        <script>
            alert("El archivo tiene que ser menor a 900kb");
            window.location = "../Frm_Infoestudiante.php";
        </script>
        ';
    } else {

        //validar tipo de archivo
        if ($tipoArchivo == "pdf" || $tipoArchivo == "docx" ) {
            //se valido el archivo correctamente

            if(move_uploaded_file($_FILES["file"]["tmp_name"], $archivo)){
                echo '
                <script>
                    alert("Datos guardados correctamente.");
                    window.location = "../Frm_Infoestudiante.php";
                </script>
                ';     
            }else{
                echo '
                <script>
                    alert("Hubo Error");
                    window.location = "../Frm_Infoestudiante.php";
                </script>
                ';
            }

        }else{
            echo '
        <script>
            alert("Solo permite archivos pdf y docx");
            window.location = "../Frm_Infoestudiante.php";
        </script>
        ';
        }
    }
} else {
    echo '
        <script>
            alert("Esto no es un archivo");
            window.location = "../Frm_Infoestudiante.php";
        </script>
        ';
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
                        window.location = "../Frm_Infoestudiante.php";
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
                        window.location = "../Frm_Infoestudiante.php";
                    </script>
                    ';
            }
    }
