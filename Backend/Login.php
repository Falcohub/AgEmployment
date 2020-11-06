<?php
        include_once"conexion.php";
        session_start();

        if(isset($_GET['cerrar_sesion'])){
            session_unset();

            session_destroy();
        }

        if(isset($_SESSION['rol'])){
            switch($_SESSION['rol']){
                case 1:
                    header('location: ../frontend/Frm_infoestudiante.php');
                break;
                
                case 2;
                header('location: ../frontend/Frm_infoEmpresa.php');
                break; 

                default:
            }
        }

        if(isset($_POST['TxtUsuario']) && isset($_POST['TxtPassword'])){
            $usuario = $_POST['TxtUsuario'];
            $password = $_POST['TxtPassword'];

            $db = new Database();

            $consulta = $db->connect()->prepare ("SELECT * FROM tbl_usuarios WHERE user_pkUsuario = :usuario and user_contraseña = :password");
            $consulta->execute(['usuario' => $usuario, 'password' => $password]);

            $row = $consulta->fetch(PDO::FETCH_NUM);
            if($row == true){
                //validar rol
            }else{
                //No existe usuario
                "Usuario o contraseña incorrectos";
            }
        }




    
    /*$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $consulta = $conexion->prepare ("SELECT * FROM tbl_usuarios WHERE user_pkUsuario = :usuario and user_contraseña = :password");  
    $consulta->bindParam(":usuario", $usuario);
    $consulta->bindParam(":password", $password);
    $consulta->execute();
    $user = $consulta->fetch(PDO::FETCH_ASSOC);
    if($user){
        $_SESSION['usuario'] = $user['user_pkUsuario'];
        header("location: ../frontend/Frm_Home.php");
    }else{
        echo "Usuario o contraseña incorrectos";
    }

    
    
    /*$sql = "SELECT COUNT(*) FROM tbl_usuarios WHERE user_pkUsuario = '$usuario' and user_contraseña = '$contraseña'";

    if ($result = mysqli_query($conexion, $sql)) {
        // Return the number of rows in result set
        $rowcount = mysqli_num_rows($result);
        mysqli_free_result($result);
        if($result > 0){
        }
    }*/
    
    
    

    
    
    

