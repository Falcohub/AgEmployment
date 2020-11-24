<?php

include_once 'conexion.php';

session_start();

$db = new Database();
$conexion = $db->connect();

$password = sha1($_POST['TxtPassword']);
$newPassword = sha1($_POST['TxtNewPass']);

if (isset($_SESSION['idRegistroEmp'])) {
    $usuario = $_SESSION['idRegistroEmp'];

    $ObtenerPassword = $conexion->prepare("SELECT user_password FROM tbl_usuarios WHERE user_pkid = :usuario AND user_password = :password");
    $ObtenerPassword->execute(['usuario' => $usuario, 'password' => $password]);

    $row = $ObtenerPassword->fetch(PDO::FETCH_NUM);
    if ($row == true) {

        $ActualizarPassword = $conexion->prepare("UPDATE tbl_usuarios SET user_password = '$newPassword' WHERE user_pkid = '$usuario'");

        if ($ActualizarPassword->execute()) {
            echo '
                    <script>
                        alert("Contraseña actualizada con éxito.");
                        window.location = "../Frm_InfoCuenta.php";
                    </script>
                    ';
        }
    } else {
        echo '
        <script>
            alert("La contraseña actual es incorrecta.");
            window.location = "../Frm_InfoCuenta.php";
        </script>
        ';
    }
}

if (isset($_SESSION['idLogin'])) {
    $usuario = $_SESSION['idLogin'];

    $ObtenerPassword = $conexion->prepare("SELECT user_password FROM tbl_usuarios WHERE user_pkid = :usuario AND user_password = :password");
    $ObtenerPassword->execute(['usuario' => $usuario, 'password' => $password]);

    //var_dump($ObtenerPassword);
    $row = $ObtenerPassword->fetch(PDO::FETCH_NUM);
    if ($row == true) {

        $ActualizarPassword = $conexion->prepare("UPDATE tbl_usuarios SET user_password = '$newPassword' WHERE user_pkid = '$usuario'");

        if ($ActualizarPassword->execute()) {
            echo '
                    <script>
                        alert("Contraseña actualizada con éxito.");
                        window.location = "../Frm_InfoCuenta.php";
                    </script>
                    ';
        }
    } else {
        echo '
        <script>
            alert("La contraseña actual es incorrecta.");
            window.location = "../Frm_InfoCuenta.php";
        </script>
        ';
    }
}