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

    if (isset($_SESSION['idRegistroEst'])) {  

        $GuardarExperiencia = $conexion->prepare("INSERT INTO tbl_explaboral(exp_fkUsuario, exp_nombreEmpresa, exp_cargo, exp_contactoEmpresa, exp_fechaIni, exp_fechaFin)
        VALUES ('{$_SESSION['idRegistroEst']}','$nombreEmpre', '$cargo', '$contactoEmpre', '$fechaInic' , '$fechaFin');");

        if ($GuardarExperiencia->execute()) {
            echo '
                <script>
                    alert("Se guardo correctamente.");
                    window.location = "../frontend/Frm_Infoestudiante.php";
                </script>
                ';
        }
    }else 
        if (isset($_SESSION['idLogin'])) {  

            $GuardarExperiencia = $conexion->prepare("INSERT INTO tbl_explaboral(exp_fkUsuario, exp_nombreEmpresa, exp_cargo, exp_contactoEmpresa, exp_fechaIni, exp_fechaFin)
            VALUES ('{$_SESSION['idLogin']}','$nombreEmpre', '$cargo', '$contactoEmpre', '$fechaInic' , '$fechaFin');");

            if ($GuardarExperiencia->execute()) {
                echo '
                    <script>
                        alert("Se guardo correctamente.");
                        window.location = "../frontend/Frm_Infoestudiante.php";
                    </script>
                    ';
            }
    }
?>