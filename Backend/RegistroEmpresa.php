<?php
    require_once('conexion.php');

    //----- Ejecutar procedimiento almacenado para registrar empresa y usuario -----
    //$mysql = new connection();
    //$conexion = $mysql->get_connection();
    

    $NIT = $_POST['TxtNIT'];
    $nombreEmpresa = $_POST['TxtNombreEmpresa'];
    $correo = $_POST['TxtCorreo'];

    //----- Verificar que no se repita el NIT -----
    $validar_NIT = mysqli_query($conexion, "SELECT * FROM tbl_personas WHERE prs_pkid = '$NIT'");
    if (mysqli_num_rows($validar_NIT) > 0) {
        echo '
                <script>
                alert("Esta NIT ya se encuentra registrado.");
                window.location = "../frontend/Frm_Registro.php";
                </script>
                ';
        exit;
    };

    //----- Verificar que no se repita correo -----
    $validar_correo = mysqli_query($conexion, "SELECT * FROM tbl_personas WHERE prs_correo = '$correo'");
    if (mysqli_num_rows($validar_correo) > 0) {
        echo '
                <script>
                alert("Este correo ya encuentra registrado.");
                window.location = "../frontend/Frm_Registro.php";
                </script>
                ';
        exit;
    };

    //----- Ejecutar procedimiento almacenado por medio de sentencia preparada
    $statement = $conexion->prepare("CALL SP_RegistrarEmpresa(?,?,?)");
    $statement->bind_param("sss", $NIT, $nombreEmpresa, $correo);
    $statement->execute();
    $statement->close();
    $conexion->close();

//----- Cargar la pagina para completar registro -----
header('location: ../frontend/Frm_InfoEmpresa.php');
