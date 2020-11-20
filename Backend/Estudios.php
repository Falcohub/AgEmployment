<?php
    include_once 'conexion.php';

    session_start();
    
    //Establecer conexión
    $db = new Database();
    $conexion = $db->connect();
    
    $nombre = $_POST['txtNombre'];
    $titulos = $_POST['txtTitulos'];
    $fechaInic = $_POST['txtFechaFin'];
    $fechaFin = $_POST['txtFechaFin'];


    if (isset($_SESSION['idRegistroEst'])) { 
        if (isset($_POST['Guardar'])){

            $estudios = $conexion->prepare("INSERT INTO tbl_estudios(est_fkUsuario, est_nombreInstituto, est_titulo, est_fechaIni, est_fechaFin)
            VALUES ('{$_SESSION['idRegistroEst']}','$nombre', '$titulos', '$fechaInic', '$fechaFin');");

            if ($estudios->execute()) {
                echo '
                    <script>
                        alert("Datos guardados correctamente.");
                        window.location = "../frontend/Frm_Estudios.php";
                    </script>
                    ';
                    exit();
            }
        }

        if (isset($_POST['Actualizar'])) {

            //----- Actualizar datos para completar registro
            $ActualizarExp = $conexion->prepare("UPDATE tbl_estudios SET est_nombreInstituto = '$nombre', est_titulo = '$titulos', est_fechaIni = '$fechaInic', est_fechaFin= '$fechaFin'  WHERE est_fkUsuario = {$_SESSION['idRegistroEst']}");

            if ($ActualizarExp->execute()) {
                echo '
                    <script>
                        alert("Datos actualizados correctamente.");
                        window.location = "../frontend/Frm_Estudios.php";
                    </script>
                    ';
                    exit();
                }
            }

    }else if (isset($_SESSION['idLogin'])) {  
        if (isset($_POST['Guardar'])){

            $estudios = $conexion->prepare("INSERT INTO tbl_estudios(est_fkUsuario, est_nombreInstituto, est_titulo, est_fechaIni, est_fechaFin)
            VALUES ('{$_SESSION['idLogin']}','$nombre', '$titulos', '$fechaInic', '$fechaFin');");
    
            if ($estudios->execute()) {
                echo '
                    <script>
                        alert("Se guardo correctamente.");
                        window.location = "../frontend/Frm_Estudios.php";
                    </script>
                    ';
                    exit();
            }
        }

        if (isset($_POST['Actualizar'])) {

            //----- Actualizar datos para completar registro
            $ActualizarExp = $conexion->prepare("UPDATE tbl_estudios SET est_nombreInstituto = '$nombre', est_titulo = '$titulos', est_fechaIni = '$fechaInic', est_fechaFin= '$fechaFin'  WHERE est_fkUsuario = {$_SESSION['idLogin']}");

            if ($ActualizarExp->execute()) {
                echo '
                    <script>
                        alert("Datos actualizados correctamente.");
                        window.location = "../frontend/Frm_Estudios.php";
                    </script>
                    ';
                    exit();
                }
            }
    }
?>