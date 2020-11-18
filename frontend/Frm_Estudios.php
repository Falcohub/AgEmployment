<?php
include_once '../backend/conexion.php';

session_start();

if (!isset($_SESSION['rol'])) {
    header('location: Frm_Login.php');
} else {
    if ($_SESSION['rol'] != 'CC' && $_SESSION['rol'] != 'TI') {
        header('location: Frm_Login.php');
    }
}

if (isset($_SESSION['idRegistroEst'])) {

    //Establecer conexion
    $db = new Database();
    $conexion = $db->connect();

    //Consulta para obtener datos
    $estudios = $conexion->query("SELECT * FROM tbl_estudios where est_fkUsuario = {$_SESSION['idRegistroEst']}")->fetch(PDO::FETCH_ASSOC);
} else if (isset($_SESSION['idLogin'])) {

    //Establecer conexion
    $db = new Database();
    $conexion = $db->connect();

    //Consulta para obtener datos
    $estudios = $conexion->query("SELECT * FROM tbl_estudios where est_fkUsuario = {$_SESSION['idLogin']}")->fetch(PDO::FETCH_ASSOC);
}

include('vistas/HeaderEstudiante.php');
?>
<div class="content mt-0 mb-5">
    <div class="shadow p-3 mb-5 bg-white rounded">
        <h3 class="card-title text-center">Estudios realizados</h3>
        <div class="card-body">
            <form action= "../backend/Estudios.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Nombre de la institucion</label>
                        <input type="text" value=" <?php echo $estudios['est_nombreInstituto']; ?>" name="txtNombre" class="form-control" id="nombre_institucion">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Titulos obtenidos</label>
                        <input type="text" value=" <?php echo $estudios['est_titulo']; ?>" name="txtTitulos" class="form-control" id="titulos">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputAddress2">Fecha de inicio de estudio</label>
                        <input type="date" value=" <?php echo $estudios['est_fechaIni']; ?>" name="txtFechaIni" class="form-control" id="fecha_estudios" placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress2">Fecha final de estudio</label>
                        <input type="date" value=" <?php echo $estudios['est_fechaFin']; ?>" name="txtFechaFin" class="form-control" id="fechafin_estudios" placeholder="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-3">
                        <button type="submit" value="Guardar" class="btn btn-success">Guardar</button>
                    </div>
                    <div class="form-group col-4">
                        <button type="" value="actualizar" class="btn btn-success ">Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>