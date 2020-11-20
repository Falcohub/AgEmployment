<?php include('vistas/Header.php') ?>

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
        <div class="row">
            <div class="col-10">
                <input type="text" class="form-control rounded-pill" id="buscar" placeholder="Ingresa el empleo que deseas buscar para ti!">
            </div>
            <div class="col mb-4">
                <button type="button" class="btn btn-warning rounded-pill border text-light">Buscar</button>
            </div>
        </div>
    </div>
    <img src="img/wave (6).svg" class="bottom-img">
</section>

<!---------------------- OFERTAS -------------------->
<section id="services">
    <div class="container text-center ">
        <div class="row">
           <?php 
                include_once '../backend/conexion.php';

                //Establece conexion
                $db = new Database();
                $conexion = $db->connect();

                $empleos = $conexion->query("SELECT emp_titulo, emp_tipoEmpleo, emp_descripcion, emp_salario FROM tbl_empleos");
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
                        <a href="Frm_OfertasDetalle.php" class="btn btn-primary">ver más</a>
                    </div>
                </div>
                <br>
            </div>
            <?php } ?>

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