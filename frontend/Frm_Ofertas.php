<?php include 'vistas/Header.php';
    session_start();
?>

<!---------------------BANNER SECTION------------------------------>

<section id="banner">
    <div class="container" id="pr">

        <p class="promo-title">Ofertas de trabajos</p>
        <P>Lorem ipsum dolor, sit amet consectetur adipisicing elit.Laudantium minima incidunt voluptatem
            tempora quae velit corporis? Necessitatibus deserunt quia
            hic magni voluptas ipsum at, aliquam, saepe blanditiis debitis itaque eum.
        </P>

    </div>
    <!------------------------------ BUSCAR ---------------------------->
    <div class="container" id="buscar">
        <form action="Frm_Ofertas.php" method="POST">
            <div class="row">
                <div class="col-10">
                    <input type="text" name="Empleo" class="form-control rounded-pill" placeholder="Ingresa una palabra clave ejemplo: Administracion, Practicante, Software...">
                </div>
                <div class="col mb-4">
                    <input type="submit" name="buscarEmpleo" value="Buscar" class="btn btn-warning rounded-pill border text-light">
                </div>
            </div>
        </form>
    </div>
</section>

<!---------------------- OFERTAS -------------------->
<section id="services">
    <div class="container text-center ">
        <div class="row">
           <?php 
                include_once '../backend/conexion.php';
                
                if(isset($_POST['Empleo'])){
                $Empleo = $_POST['Empleo'];

                //Establece conexion
                $db = new Database();
                $conexion = $db->connect();

                $empleos = $conexion->query("SELECT emp_pkid ,emp_titulo, emp_tipoEmpleo, emp_descripcion, emp_salario, emp_fkUsuario FROM tbl_empleos WHERE emp_titulo LIKE '%$Empleo%'");
                $empleos->execute();
                $listaempleos = $empleos->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <?php foreach ($listaempleos as $ofertas) { ?>

            <div class="col-lg-6 shadow p-3 mb-5 bg-white rounded" id="row1">
                <div class="card">
                    <div class="card-header text-white bg-secondary"><?php echo $ofertas['emp_tipoEmpleo'] ?></div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $ofertas['emp_titulo'] ?></h5>
                        <p class="card-text text-justify"><?php echo $ofertas['emp_descripcion'] ?></p>
                        <p class=""><?php echo $ofertas['emp_salario'] ?></p>
                        <form action="Frm_OfertaDetalle.php" method="POST">
                            <input name="idEmpresa" class="form-control" type="text" hidden value="<?php echo $ofertas['emp_fkUsuario']?>">
                            <input name="idEmpleo" class="form-control" type="text" hidden value="<?php echo $ofertas['emp_pkid'] ?>">
                            <button type="submit" class="btn btn-primary">ver más</button>
                        </form>
                    </div>
                </div>
                <br>
            </div>
            <?php     
                }
            }else{

                //Establece conexion
                $db = new Database();
                $conexion = $db->connect();

                $empleos = $conexion->query("SELECT emp_pkid ,emp_titulo, emp_tipoEmpleo, emp_descripcion, emp_salario, emp_fkUsuario FROM tbl_empleos");
                $empleos->execute();
                $listaempleos = $empleos->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <?php foreach ($listaempleos as $ofertas) { ?>

            <div class="col-lg-6 shadow p-3 mb-5 bg-white rounded" id="row1">
                <div class="card">
                    <div class="card-header text-white bg-secondary"><?php echo $ofertas['emp_tipoEmpleo'] ?></div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $ofertas['emp_titulo'] ?></h5>
                        <p class="card-text text-justify"><?php echo $ofertas['emp_descripcion'] ?></p>
                        <p class=""><?php echo $ofertas['emp_salario'] ?></p>
                        <form action="Frm_OfertaDetalle.php" method="POST">
                            <input name="idEmpresa" class="form-control" type="text" hidden value="<?php echo $ofertas['emp_fkUsuario']?>">
                            <input name="idEmpleo" class="form-control" type="text" hidden value="<?php echo $ofertas['emp_pkid'] ?>">
                            <button type="submit" class="btn btn-primary">ver más</button>
                        </form>
                    </div>
                </div>
                <br>
            </div>
            <?php } } ?>
        </div>
    </div>
</section>

<!-----------ABOUT US------------>


<!--------------------Social media section----------------------->
<section id="social-media">
    <div class="container text-center">
        <p>ENCUÉNTRANOS EN LAS REDES SOCIALES</p>
        <div class="social-icons">
            <i class="fab fa-facebook"></i>
            <i class="fab fa-whatsapp"></i>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-twitter"></i>
        </div>

    </div>
</section>

<!---------------------Footer Section-------------------------->
<?php include('vistas/Footer.php') ?>