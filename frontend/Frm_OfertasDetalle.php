<?php
    include 'vistas/Header.php';
    include_once '../backend/conexion.php';

    $idEmpleo = $_POST['idEmpleo'];
    
    //Establece conexion
    $db = new Database();
    $conexion = $db->connect();

    $consulta = $conexion->prepare("SELECT emp_pkid, emp_titulo, emp_tipoEmpleo, emp_descripcion, emp_salario FROM tbl_empleos WHERE emp_pkid = $idEmpleo");
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
                                <a href="#" class="btn btn-primary">Aplicar trabajo</a>
                            </div>
                            <div class="card-body">
                                <h6>Compañia</h6>
                                <div class="compañia">
                                    <p>empresa</p>
                                </div>
                                <h6>Tipo Empleo</h6>
                                <div class="Empleo">
                                    <p><?php echo $oferta['emp_tipoEmpleo']; ?></p>
                                </div>
                                <h6>Departamento</h6>
                                <div class="Departamento">
                                    <p>empresa</p>
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
    <?php include ('vistas/Footer.php') ?>