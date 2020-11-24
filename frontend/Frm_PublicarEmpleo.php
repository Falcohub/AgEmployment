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

date_default_timezone_set('America/Bogota');
$fechapubli = date("Y-m-d");

include_once 'vistas/HeaderEmpresa.php';
?>

<div class="content mt-0 mb-5">
    <div class="shadow p-3 mb-5 bg-white rounded">
        <h3 class="card-title text-center">Publicar empleo</h3>
        <div class="card-body">
            <form action="backend/PublicarEmpleo.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputTitulo">Titulo</label>
                        <input type="text" name="txtTitulo" class="form-control" id="inputTitulo" placeholder="Nombre del empleo..." required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputTipo">Tipo de empleo</label>
                        <input type="text" name="txtTipoEmp" class="form-control" id="inputTipo" placeholder="Practica" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputDescripcion">Descripcion</label>
                        <textarea id="inputDescripcion" name="txtDescripcion" class="md-textarea form-control" required></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputSalario">Salario</label>
                        <input type="text" name="txtSalario" class="form-control" id="inputSalario" placeholder="$" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Municipio">Ubicacion de trabajo</label>
                        <select id="select" name="cbxMunicipio" class="form-control">
                            <option selected>Seleccione municipio...</option>
                            <option>Mutatá</option>
                            <option>Chigorodo</option>
                            <option>Carepa</option>
                            <option>Apartado</option>
                            <option>Turbo</option>
                            <option>Necocli</option>
                            <option>Arboletes</option>
                            <option>Medellin</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputFechaPubli">Fecha de publicacion</label>
                        <input type="date" name="txtFechaPubli" class="form-control" id="inputFechaPubli" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputFechaFin">Fecha de finalizacion</label>
                        <input type="date" name="txtFechaFin" class="form-control" id="inputFechaFin" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-2">
                        <button type="submit" alue="PublicarEmpleo" class="btn btn-success w-75">Guardar</button>
                    </div>
                    <!--<div class="form-group col-2">
                        <button type="submit" class="btn btn-success w-75">Editar</button>
                    </div>-->
                </div>
            </form>
            <br>
            <br>
            <form>
                <?php

                //Establecer conexión
                $db = new Database();
                $conexion = $db->connect();

                if (isset($_SESSION['idLogin'])) {

                    $idLogin = $_SESSION['idLogin'];

                    $busqueda = $conexion->query("SELECT * FROM tbl_empleos WHERE emp_fkUsuario = '$idLogin'");
                    /*Almacenamos el resultado de fetchAll en una variable*/
                    $arrDatos = $busqueda->fetchAll(PDO::FETCH_ASSOC);
                }

                ?>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th class="bg-dark" scope="col">Titulo</th>
                                <th class="bg-dark" scope="col">Descripcion</th>
                                <th class="bg-dark" scope="col">salario</th>
                                <th class="bg-dark" scope="col">Tipo</th>
                                <th class="bg-dark" scope="col">Lugar</th>
                                <th class="bg-dark" scope="col">FechaInicio</th>
                                <th class="bg-dark" scope="col">FechaFin</th>
                            </tr>
                        </thead>

                        <?php

                        /* var_dump($arrDatos);*/
                        /*Recorremos todos los resultados, ya no hace falta invocar más a fetchAll como si fuera fetch...*/
                        foreach ($arrDatos as $muestra) {
                            echo '<tr>';

                            echo '<td >' . $muestra['emp_titulo'] . '</td>';
                            echo '<td >' . $muestra['emp_descripcion'] . '</td>';
                            echo '<td >' . $muestra['emp_salario'] . '</td>';
                            echo '<td >' . $muestra['emp_tipoEmpleo'] . '</td>';
                            echo '<td >' . $muestra['emp_lugar'] . '</td>';
                            echo '<td >' . $muestra['emp_fechaPubli'] . '</td>';
                            echo '<td >' . $muestra['emp_fechaFin'] . '</td>';
                        }
                        ?>
                    </table>
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