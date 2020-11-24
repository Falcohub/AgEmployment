<?php
    include_once 'conexion.php';

    session_start();
    
    //Establecer conexión
    $db = new Database();
    $conexion = $db->connect();

    $nombreEmpre = $_POST['TxtNombreEmpresa'];
    $cargo = $_POST['TxtCargo'];
    $contactoEmpre = $_POST['TxtContacto'];
    $fechaInic = $_POST['TxtFechaInicio'];
    $fechaFin = $_POST['TxtFechaFin'];

    //Guardar experiencia laboral por sesion de registro
    if (isset($_SESSION['idRegistroEst'])) {
        if (isset($_POST['Guardar'])){
    
            $GuardarExperiencia = $conexion->prepare("INSERT INTO tbl_explaboral(exp_fkUsuario, exp_nombreEmpresa, exp_cargo, exp_contactoEmpresa, exp_fechaIni, exp_fechaFin)
            VALUES ('{$_SESSION['idRegistroEst']}','$nombreEmpre', '$cargo', '$contactoEmpre', '$fechaInic' , '$fechaFin');");

            if ($GuardarExperiencia->execute()) {
                echo '
                    <script>
                        alert("Datos guardados correctamente.");
                        window.location = "../Frm_Explaboral.php";
                    </script>
                    ';
                    exit();
            }
        }
        if (isset($_POST['Actualizar'])) {

            //----- Actualizar datos para completar registro
            $ActualizarExp = $conexion->prepare("UPDATE tbl_explaboral SET exp_nombreEmpresa = '$nombreEmpre', exp_cargo = '$cargo', exp_contactoEmpresa = '$contactoEmpre', exp_fechaIni = '$fechaInic', exp_fechaFin = '$fechaFin'  WHERE exp_fkUsuario = {$_SESSION['idRegistroEst']}");

            if ($ActualizarExp->execute()) {
                echo '
                    <script>
                        alert("Datos actualizados correctamente.");
                        window.location = "../Frm_Explaboral.php";
                    </script>
                    ';
                    exit();
                }
            }

    }else if (isset($_SESSION['idLogin'])) {
            if (isset($_POST['Guardar'])){
  
                $GuardarExperiencia = $conexion->prepare("INSERT INTO tbl_explaboral(exp_fkUsuario, exp_nombreEmpresa, exp_cargo, exp_contactoEmpresa, exp_fechaIni, exp_fechaFin)
                VALUES ('{$_SESSION['idLogin']}','$nombreEmpre', '$cargo', '$contactoEmpre', '$fechaInic' , '$fechaFin');");

                if ($GuardarExperiencia->execute()) {
                    echo '
                        <script>
                            alert("Datos guardados correctamente.");
                            window.location = "../Frm_Explaboral.php";
                        </script>
                        ';
                        exit();
                }
            }

            if (isset($_POST['Actualizar'])) {

                //----- Actualizar datos para completar registro
                 $ActualizarExp = $conexion->prepare("UPDATE tbl_explaboral SET exp_nombreEmpresa = '$nombreEmpre', exp_cargo = '$cargo', exp_contactoEmpresa = '$contactoEmpre', exp_fechaIni = '$fechaInic', exp_fechaFin = '$fechaFin'  WHERE exp_fkUsuario = {$_SESSION['idLogin']}");
 
                 if ($ActualizarExp->execute()) {
                     echo '
                         <script>
                             alert("Datos actualizados correctamente.");
                             window.location = "../Frm_Explaboral.php";
                         </script>
                         ';
                         exit();
                 }
             }
    }
?>