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
        

        $estudios = $conexion->prepare("INSERT INTO tbl_estudios(est_fkUsuario, est_nombreInstituto, est_titulo, est_fechaIni, est_fechaFin)
        VALUES ('{$_SESSION['idRegistroEst']}','$nombre', '$titulos', '$fechaInic', '$fechaFin');");

        if ($estudios->execute()) {
            echo '
                <script>
                    alert("Se guardo correctamente.");
                    window.location = "../frontend/Frm_Estudios.php";
                </script>
                ';
        }
    }else 
        if (isset($_SESSION['idLogin'])) {  

            $estudios = $conexion->prepare("INSERT INTO tbl_estudios(est_fkUsuario, est_nombreInstituto, est_titulo, est_fechaIni, est_fechaFin)
            VALUES ('{$_SESSION['idLogin']}','$nombre', '$titulos', '$fechaInic', '$fechaFin');");
    
            if ($estudios->execute()) {
                echo '
                    <script>
                        alert("Se guardo correctamente.");
                        window.location = "../frontend/Frm_Estudios.php";
                    </script>
                    ';
            }
    }
?>