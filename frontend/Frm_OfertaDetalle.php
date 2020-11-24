<?php
include_once 'backend/conexion.php';

session_start();

if (!isset($_SESSION['rol'])) {

    include_once 'vistas/Header.php';
} else if ($_SESSION['rol'] == 'CC' || $_SESSION['rol'] == 'TI') {

    include_once 'vistas/HeaderLogEstudiante.php';
} else {
    include_once 'vistas/HeaderLogEmpresa.php';
}

$idEmpleo = $_POST['idEmpleo'];
$idEmpresa = $_POST['idEmpresa'];

//Establece conexion
$db = new Database();
$conexion = $db->connect();

$consulta = $conexion->prepare("SELECT emp_pkid, emp_titulo, emp_tipoEmpleo, emp_descripcion, emp_salario, emp_lugar, user_nombres FROM tbl_empleos, tbl_usuarios WHERE emp_pkid = $idEmpleo AND user_pkid = $idEmpresa");
$consulta->execute();
$array = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>

<!----------------------SERVICES SECTION--------->
<section id="services">
    <div class="container text-center">
        <h1>OFERTA LABORAL</h1>
        <br>
        <div class="container" id="con">
            <div class="row">
                <?php foreach ($array as $oferta) { ?>
                    <div class="col-lg-8" id="row1">
                        <div class="card" id="car1">
                            <div class="card-header">
                                <h4><?php echo $oferta['emp_titulo']; ?></h4>
                            </div>
                            <h5 class="text-left p-2">Descripcion del cargo</h5>
                            <div class="card-body">
                                <div class="input-group text-justify">
                                    <p><?php echo $oferta['emp_descripcion']; ?></p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4" id="row2">
                        <div class="card" id="car2">
                            <div class="card-header">
                                <form action="backend/Postular.php" method="POST">
                                    <input name="idEmpleo" class="form-control" type="text" hidden value="<?php echo $oferta['emp_pkid'] ?>">
                                    <button type="submit" name="AplicarEmpleo" class="btn btn-primary">Aplicar empleo</button>
                                </form>
                            </div>
                            <div class="card-body">
                                <h6>Empresa</h6>
                                <div class="Empresa">
                                    <p><?php echo $oferta['user_nombres']; ?></p>
                                </div>
                                <h6>Tipo Empleo</h6>
                                <div class="Empleo">
                                    <p><?php echo $oferta['emp_tipoEmpleo']; ?></p>
                                </div>
                                <h6>Lugar</h6>
                                <div class="Departamento">
                                    <p><?php echo $oferta['emp_lugar']; ?></p>
                                </div>
                                <h6>Salario</h6>
                                <div class="Salario">
                                    <p><?php echo $oferta['emp_salario']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        <?php }

        ?>
        </div>
    </div>
</section>

<!-----------ABOUT US------------>


<!--------------------Social media section----------------------->


<!---------------------Footer Section-------------------------->
<?php include('vistas/Footer.php') ?>