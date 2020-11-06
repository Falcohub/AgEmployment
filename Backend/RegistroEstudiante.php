<?php
    require_once('conexion.php');

    //Ejecutar procedimiento almacenado para registrar persona y usuario
    $mysql = new connection();
    $conexion = $mysql->get_connection();

    $documento = $_POST['TxtDocumento'];
    $nombres = $_POST['TxtNombres'];
    $apellidos = $_POST['TxtApellidos'];
    $correo = $_POST['TxtCorreo'];

    //----- Verificar que no se repita documento -----
    $validar_id = mysqli_query($conexion, "SELECT * FROM tbl_personas WHERE prs_pkid = '$documento'");
    if (mysqli_num_rows($validar_id) > 0) {
        echo '
                    <script>
                    alert("Esta persona ya se encuentra registrada.");
                    window.location = "../frontend/Frm_Registro.php";
                    </script>
                    ';
        exit();
    };

    //----- Verificar que no se repita correo -----
    $validar_correo = mysqli_query($conexion, "SELECT * FROM tbl_personas WHERE prs_correo = '$correo'");
    if (mysqli_num_rows($validar_correo) > 0) {
        echo '
                    <script>
                    alert("Este correo ya esta en uso.");
                    window.location = "../frontend/Frm_Registro.php";
                    </script>
                    ';
        exit();
    };

    $statement = $conexion->prepare("CALL SP_Registrar(?,?,?,?)");
    $statement->bind_param("ssss", $documento, $nombres, $apellidos, $correo);
    $statement->execute();
    $statement->close();
    $conexion->close();

//----- Cargar la pagina para completar registro -----
header('location: ../frontend/Frm_InfoEstudiante.php');
