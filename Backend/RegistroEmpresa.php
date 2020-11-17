<?php
    include_once 'conexion.php';
    
    session_start();

        /*if(isset($_GET['cerrar_sesion'])){
            session_unset();
            //Destroy the session
            session_destroy();
            header('location: ../frontend/Frm_Login.php');
        }

        if(isset($_SESSION['rol'])){
            header('location: ../frontend/Frm_Home.php');
        }*/

    //Establecer conexión
    $db = new Database();
    $conexion = $db->connect();

    //Asignamos campos agregados por campo texto con el metodo POST a las variables
    $NIT = $_POST['TxtNIT'];
    $nombreEmpresa = $_POST['TxtNombreEmpresa'];
    $correo = $_POST['TxtCorreo'];
    $password = sha1($_POST['TxtNIT']);
    
    if(isset($_POST['TxtNIT']) && isset($_POST['TxtNombreEmpresa']) && isset($_POST['TxtCorreo'])){

        //----- Verificar que no se repita el NIT -----
        $validar_NIT = $conexion->prepare("SELECT * FROM tbl_usuarios WHERE user_pkid = '$NIT'");
        $validar_NIT->execute();
        $resultado = $validar_NIT->fetchAll(PDO::FETCH_ASSOC);
        if ($resultado){
            echo '
            <script>
            alert("Este NIT ya esta registrado.");
            window.location = "../frontend/Frm_Registro.php";
            </script>
            ';
            exit();
        }
        //----- Verificar que no se repita correo -----
        $validar_correo = $conexion->prepare("SELECT * FROM tbl_usuarios WHERE user_correo = '$correo'");
        $validar_correo->execute();
        $resultado2 = $validar_correo->fetchAll(PDO::FETCH_ASSOC);
                
        if ($resultado2){
            echo '
            <script>
            alert("Este correo ya esta registrado.");
            window.location = "../frontend/Frm_Registro.php";
            </script>
            ';
            exit();
        }else{
        //----- Insertar o guardar datos en la tabla usuarios
        $pst =$conexion->prepare("INSERT INTO tbl_usuarios(user_pkid, user_ddi, user_nombres, user_correo, user_password, user_estado, user_fechaUser)
        VALUES ('$NIT', 'NIT', '$nombreEmpresa', '$correo', '$password', 'Activo', CURRENT_DATE);");
                    
        if($pst->execute()){
            //validar rol
            $_SESSION['rol'] = 'NIT';
            $_SESSION['idRegistroEmp'] = $NIT;
            header('location: ../frontend/Frm_InfoEmpresa.php');
        }else{
            //----- Cargar la pagina para completar registro -----
            header('location: ../frontend/Frm_Registro.php');
        }
        }
    }
?>