<?php
    include_once 'conexion.php';

    session_start();

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
    //Experiencia Laboral
    $nombreEmpre = $_POST['TxtNombreEmpresa'];
    $cargo = $_POST['TxtCargo'];
    $contactoEmpre = $_POST['TxtContactoEmpre'];
    $fechaInic = $_POST['TxtFechaInicio'];
    $fechaFin = $_POST['TxtFechaFin'];
        
    //Establecer conexión
    $db = new Database();
    $conexion = $db->connect();
        
        //----- Actualizar datos para completar registro
        $ActualizarEstudiante = $conexion->prepare("UPDATE tbl_usuarios SET user_pkid = '$documento', user_ddi = '$ddi', user_nombres = '$nombres', user_apellidos = '$apellidos', user_sexo = '$sexo', user_contacto = '$contacto', user_correo = '$correo', user_dpto = '$dpto', user_ciudad = '$ciudad', user_direccion = '$direccion', user_fechaNac = '$fechaNac', user_perfil = '$perfil' WHERE user_pkid = {$_SESSION['documentoEst']}");
        
        if ($ActualizarEstudiante->execute()){
            $_SESSION['documentoEst'] = $documento;
            header('location: ../frontend/Frm_InfoEstudiante.php');
        }


         //Experiencia Laboral

         $GuardarExperiencia = $conexion->prepare("INSERT INTO tbl_explaboral(exp_nombreEmpresa, exp_cargo, exp_contactoEmpresa, exp_fechaIni, exp_fechaFin)
         VALUES ({$_SESSION['documentoEst']},'$nombreEmpresa', '$cargo', '$contactoEmpre', '2020-10-12' , '2020-10-12');");

?>