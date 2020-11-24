<?php
include_once 'backend/conexion.php';

session_start();

if (!isset($_SESSION['rol'])) {
    echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=Frm_Login.php">';
    exit();
} else {
    if ($_SESSION['rol'] == 'CC' || $_SESSION['rol'] == 'TI') {
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=Frm_InfoEstudiante.php">';
        exit();
    }
}

//Establecer conexion
$db = new Database();
$conexion = $db->connect();

if (isset($_SESSION['idRegistroEmp'])) {

    //Consulta para obtener datos
    $cuenta = $conexion->query("SELECT * FROM tbl_usuarios where user_pkid = {$_SESSION['idRegistroEmp']}")->fetch(PDO::FETCH_ASSOC);

} else if (isset($_SESSION['idLogin'])) {

    //Consulta para obtener datos
    $cuenta = $conexion->query("SELECT * FROM tbl_usuarios where user_pkid = {$_SESSION['idLogin']}")->fetch(PDO::FETCH_ASSOC);
}
include_once 'vistas/HeaderEmpresa.php';
?>

<div class="content mt-0 mb-5">
    <div class="shadow p-3 mb-5 bg-white rounded">
        <h3 class="card-title text-center">Información de cuenta</h3>
        <div class="card-body">
            <form action="backend/CambiarPassEmp.php" method="POST">
                <div class="form-row">
                    <div class="form-group">
                        <label for="inputPassword4">Usuario: </label>
                        <label for="inputFecha"><?php echo $cuenta['user_correo']; ?></label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="inputAddress2">Fecha de creación: </label>
                        <label for="inputFecha"><?php echo $cuenta['user_fechaUser']; ?></label>
                    </div>
                </div>
                <h3 class="card-title text-center">Cambiar contraseña</h3>
                <div class="form-row">
                    <div class="form-group">
                        <label for="inputAddress">Contraseña actual</label>
                        <input type="password" name="TxtPassword" value="" class="form-control" id="contraseña" placeholder="Ingrese contraseña">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="inputAddress">Nueva contraseña</label>
                        <input type="password" name="TxtNewPass" value="" class="form-control" id="contraseña" placeholder="Ingrese nueva contraseña">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <button type="submit" name="Actualizar" class="btn btn-success">Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="footer">
        <hr>
        <p class="copyright">PractiApp 2020</p>
    </div>
</div>

</body>

<script src="js/PanelEmpresa.js"></script>

</html>