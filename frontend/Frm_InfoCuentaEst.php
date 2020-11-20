<?php
include_once '../backend/conexion.php';

session_start();

if (!isset($_SESSION['rol'])) {
    echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=Frm_Login.php">';
    exit();
    //header('location: Frm_Login.php');
} else {
    if ($_SESSION['rol'] == 'NIT') {
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=Frm_InfoEmpresa.php">';
        exit();
        //header('location: Frm_Login.php');
    }
}

//Establecer conexion
$db = new Database();
$conexion = $db->connect();

if (isset($_SESSION['idRegistroEst'])) {

    //Consulta para obtener datos
    $cuenta = $conexion->query("SELECT * FROM tbl_usuarios where user_pkid = {$_SESSION['idRegistroEst']}")->fetch(PDO::FETCH_ASSOC);
} else if (isset($_SESSION['idLogin'])) {

    //Consulta para obtener datos
    $cuenta = $conexion->query("SELECT * FROM tbl_usuarios where user_pkid = {$_SESSION['idLogin']}")->fetch(PDO::FETCH_ASSOC);
}

include('vistas/HeaderEstudiante.php') ?>

<div class="content mt-0 mb-5">
    <div class="shadow p-3 mb-5 bg-white rounded">
        <h3 class="card-title text-center">Informacion de cuenta</h3>
        <div class="card-body ">
            <form action="../backend/ActualizarInfoEst.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Usuario</label>
                        <input type="text" name="txtuser" value=" <?php echo $cuenta['user_correo']; ?>" class="form-control" id="usuario">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Contraseña</label>
                        <input type="password" name="txtpass" value=" <?php echo $cuenta['user_password']; ?>" class="form-control" id="contraseña" placeholder="Ingrese contraseña">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="inputAddress2">Fecha</label>
                        <input type="date" name="txtdate" value=" <?php echo $cuenta['user_fechaUser']; ?>" class="form-control col-12" id="fecha">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-2">
                        <button type="submit" name="Actualizar" class="btn btn-success">Actualizar perfil</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

</body>

<footer>
    <div class="container">
        <div class="row"></div>
        <hr>
        <p class="copyright">PractiApp 2020</p>
    </div>
</footer>