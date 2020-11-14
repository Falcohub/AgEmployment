<?php
        include_once 'conexion.php';
        
        /*session_start();

        if(isset($_GET['cerrar_sesion'])){
            session_unset();
            //Destroy the session
            session_destroy();
            header('location: ../frontend/Frm_Login.php');
        }

        if(isset($_SESSION['rol'])){
            header('location: ../frontend/Frm_InfoEmpresa.php');
        }*/

        if(isset($_POST['TxtUsuario']) && isset($_POST['TxtPassword'])){
            $usuario = $_POST['TxtUsuario'];
            $password = $_POST['TxtPassword'];
            
            $db = new Database();
            $conexion = $db->connect();

            $consulta = $conexion->prepare ("SELECT * FROM tbl_usuarios WHERE user_correo = :usuario and user_password = :password");
            $consulta->execute(['usuario' => $usuario, 'password' => $password]);

            $row = $consulta->fetch(PDO::FETCH_NUM);
            if($row == true){
                //validar rol
                $rol = $row[1];
                $_SESSION['rol'] = $rol;
                if ($_SESSION['rol'] == 'TI' || $_SESSION['rol'] == 'CC') {
                    header('location: ../frontend/Frm_InfoEstudiante.php');
                }else{
                    header('location: ../frontend/Frm_InfoEmpresa.php');
                }
                
            }else{
                //No existe usuario
                echo '
                <script>
                alert("Usuario o contraseña incorrectos.");
                window.location = "../frontend/Frm_Login.php";
                </script>
                ';
            }
        }
?>