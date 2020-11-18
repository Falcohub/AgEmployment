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
        <div class="card-header text-center">
            <h3 class="card-title">Informacion de cuenta</h3>
        </div>
        <div class="card-body ">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Nombre</label>
                        <input type="email" value=" <?php echo $cuenta['user_nombres']; ?>" class="form-control" id="nombre">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Usuario</label>
                        <input type="text" value=" <?php echo $cuenta['user_correo']; ?>" class="form-control" id="usuario">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Contraseña</label>
                        <input type="text" value=" <?php echo $cuenta['user_password']; ?>" class="form-control" id="contraseña" placeholder="*****************">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Fecha</label>
                        <input type="date" value=" <?php echo $cuenta['user_fechaUser']; ?>" class="form-control col-12" id="fecha" placeholder="Apartment, studio, or floor">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Correo</label>
                    <input type="text" value=" <?php echo $cuenta['user_correo']; ?>" class="form-control" id="correo" placeholder="exampl@.com">
                </div>
                <div class="form-row">
                    <div class="form-group col-2">
                        <button type="submit" class="btn btn-primary border-dark">Actualizar perfil</button>
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