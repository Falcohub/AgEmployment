<?php
    include_once 'conexion.php';

    session_start();
    
    //Establecer conexión
    $db = new Database();
    $conexion = $db->connect();

        // Postular a empleo si existe la sesión por registro
        if (isset($_SESSION['idRegistroEst'])) {
            if(isset($_POST['AplicarEmpleo'])){
                $idEmpleo = $_POST['idEmpleo'];
                
                $AplicarEmpleo = $conexion->prepare("INSERT INTO tbl_postulaciones (pos_fkUsuario, pos_fkEmpleo, pos_Estado, pos_fecha) 
                VALUES ('{$_SESSION['idRegistroEst']}', $idEmpleo, 'Activo', CURRENT_DATE);");
                if ($AplicarEmpleo->execute()) {
                    echo '
                        <script>
                            alert("Aplicaste a este empleo exitosamente");
                            window.location = "../Frm_Ofertas.php";
                        </script>
                        ';
                        exit();
                }
            }
        // Postular a empleo si existe la sesión por Login
        }else if (isset($_SESSION['idLogin'])) {
            if(isset($_POST['AplicarEmpleo'])){
                $idEmpleo = $_POST['idEmpleo'];

                $AplicarEmpleo = $conexion->prepare("INSERT INTO tbl_postulaciones (pos_fkUsuario, pos_fkEmpleo, pos_Estado, pos_fecha) 
                VALUES ('{$_SESSION['idLogin']}', $idEmpleo, 'Activo', CURRENT_DATE);");
                if ($AplicarEmpleo->execute()) {
                    echo '
                        <script>
                            alert("Aplicaste a este empleo exitosamente.");
                            window.location = "../Frm_Ofertas.php";
                        </script>
                        ';
                        exit();
                }
            }
        }else{
            echo '
            <script>
                alert("Debes iniciar sesión.");
                window.location = "../Frm_Ofertas.php";
            </script>
            ';
            exit();
        }
