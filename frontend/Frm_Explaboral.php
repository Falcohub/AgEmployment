<?php 
    include_once '../backend/conexion.php';

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
        $experiencia = $conexion->query("SELECT * FROM tbl_explaboral where exp_fkUsuario = {$_SESSION['idRegistroEst']}")->fetch(PDO::FETCH_ASSOC);

    } else if (isset($_SESSION['idLogin'])) {

        //Consulta para obtener datos
        $experiencia = $conexion->query("SELECT * FROM tbl_explaboral where exp_fkUsuario = {$_SESSION['idLogin']}")->fetch(PDO::FETCH_ASSOC);
    }

    include('vistas/HeaderEstudiante.php');
?>
<div class="content mt-0 mb-5">
    <div class="shadow p-3 mb-5 bg-white rounded">
        <div>
            <h3 class="card-title text-center">Experiencia laboral</h3>

        </div>
        <div class="card-body">
            <form action="../backend/Experiencia.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputNombreEmpresa">Nombre de la empresa donde laboro</label>
                        <input type="text" value="<?php echo $experiencia['exp_nombreEmpresa']; ?>" class="form-control" name="TxtNombreEmpresa" id="inputNombreEmpresa">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="text">Cargo que desempeñaba</label>
                        <input id="inputCargo" value="<?php echo $experiencia['exp_cargo']; ?>" name="TxtCargo" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputContactoEmpresa">Contacto</label>
                        <input type="text" class="form-control" value="<?php echo $experiencia['exp_contactoEmpresa']; ?>" name="TxtContacto" id="inputContactoEmpresa">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputFechaIniExp">Fecha en que inicio a laborar</label>
                        <input type="date" class="form-control" value="<?php echo $experiencia['exp_fechaIni']; ?>" name="TxtFechaInicio" id="inputFechaIniExp">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputFechaFinExp">Fecha de finalizacion</label>
                        <input type="date" class="form-control" value="<?php echo $experiencia['exp_fechaFin']; ?>" name="TxtFechaFin" id="inputFechaFinExp">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-2">
                        <button type="submit" value="Guardar" name="Guardar" class="btn btn-success">Guardar</button>
                    </div>
                    <div class="form-group col-2">
                        <button type="submit" value="Actualizar" name="Actualizar" class="btn btn-success">Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>