<?php
    require_once('conexion.php');

    //----- Ejecutar procedimiento almacenado para registrar empresa y usuario -----  

    //if(isset($_POST['TxtNIT']) && isset($_POST['TxtNombreEmpresa']) && isset($_POST['TxtCorreo'])){
        
        $NIT = $_POST['TxtNIT'];
        $nombreEmpresa = $_POST['TxtNombreEmpresa'];
        $correo = $_POST['TxtCorreo'];

        //Establecer conexión
        $db = new Database();
        $conexion = $db->connect();
        
        //----- Verificar que no se repita el NIT -----
        $validar_NIT = $conexion->prepare("SELECT * FROM tbl_personas WHERE prs_pkid = '$NIT'");
        
        $row = $validar_NIT->fetch(PDO::FETCH_NUM);
            if($row == true){
                //validar NIT
                $_nit = $row[0];
                if($_nit == $NIT){
                    //Existe NIT
                    echo '
                    <script>
                    alert("Este NIT ya se encuentra registrado.");
                    window.location = "../frontend/Frm_Registro.php";
                    </script>
                    ';
                    exit;
                }
            }else{
                header('location: ../frontend/Frm_InfoEmpresa.php');
            }

        //----- Insertar datos en la tabla personas y usuarios
        $statement =$conexion->prepare("INSERT INTO tbl_personas(prs_pkid, prs_ddi, prs_nombres, prs_correo) VALUES ('$NIT', 'NIT', '$nombreEmpresa', '$correo')");
        $statement->execute();

        $statement =$conexion->prepare("INSERT INTO tbl_usuarios(user_pkUsuario, user_contraseña, user_fkPersona, user_fkRol, user_fkEstado, user_fecha)
        VALUES ('$correo', '$NIT', '$NIT', 2, 1, CURRENT_DATE);");
        $statement->execute();

        
            
        //$ultimoid = $conexion->lastInsertId();
        //----- Cargar la pagina para completar registro -----
        header('location: ../frontend/Frm_InfoEmpresa.php');

    //}


        /*//----- Verificar que no se repita correo -----
        $validar_correo = mysqli_query($conexion, "SELECT * FROM tbl_personas WHERE prs_correo = '$correo'");
        if (mysqli_num_rows($validar_correo) > 0) {
            echo '
                    <script>
                    alert("Este correo ya encuentra registrado.");
                    window.location = "../frontend/Frm_Registro.php";
                    </script>
                    ';
            exit;
        };*/
?>