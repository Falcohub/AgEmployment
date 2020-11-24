<?php
    include_once 'backend/conexion.php';

    session_start();

    if (!isset($_SESSION['rol'])) {
        echo'<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=Frm_Login.php">';
        exit();
    } else {
        if ($_SESSION['rol'] == 'NIT') {
            echo'<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=Frm_InfoEmpresa.php">';
            exit();
        }
    }

    //Establecer conexion
    $db = new Database();
    $conexion = $db->connect();

    if (isset($_SESSION['idRegistroEst'])) {

        //Consulta para obtener datos
        $estudios = $conexion->query("SELECT * FROM tbl_estudios where est_fkUsuario = {$_SESSION['idRegistroEst']}")->fetch(PDO::FETCH_ASSOC);
        
    } else if (isset($_SESSION['idLogin'])) {

        //Consulta para obtener datos
        $estudios = $conexion->query("SELECT * FROM tbl_estudios where est_fkUsuario = {$_SESSION['idLogin']}")->fetch(PDO::FETCH_ASSOC);
    }

    include('vistas/HeaderEstudiante.php');
?>
<div class="content mt-0 mb-5">
    <div class="shadow p-3 mb-5 bg-white rounded">
        <h3 class="card-title text-center">Estudios realizados</h3>
        <div class="card-body">
            <form action= "backend/Estudios.php" method="POST">
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
                    <div class="form-group col-2">
                        <button type="submit" value="Guardar" name="Guardar" class="btn btn-success">Guardar</button>
                    </div>
                    <div class="form-group col-2">
                        <button type="submit" value="actualizar" name="Actualizar" class="btn btn-success ">Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>