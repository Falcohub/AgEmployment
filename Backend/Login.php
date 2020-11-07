<?php
        include 'conexion.php';
        
        session_start();

        if(isset($_GET['cerrar_sesion'])){
            session_unset();
            //Destroy the session
            session_destroy();
            header('location: ../frontend/Frm_Login.php');
        }

        if(isset($_SESSION['rol'])){
            header('location: ../frontend/Frm_Home.php');
        }

        if(isset($_POST['TxtUsuario']) && isset($_POST['TxtPassword'])){
            $usuario = $_POST['TxtUsuario'];
            $password = $_POST['TxtPassword'];
            
            $db = new Database();
            $conexion = $db->connect();

            $consulta = $conexion->prepare ("SELECT * FROM tbl_usuarios WHERE user_pkUsuario = :usuario and user_contraseña = :password");
            $consulta->execute(['usuario' => $usuario, 'password' => $password]);

            $row = $consulta->fetch(PDO::FETCH_NUM);
            if($row == true){
                //validar rol
                $_SESSION['rol'] = $row[3];
                header('location: ../frontend/Frm_Home.php');
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