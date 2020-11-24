<?php

session_start();

if (!isset($_SESSION['rol'])) {

  include_once 'vistas/Header.php';
} else if ($_SESSION['rol'] == 'CC' || $_SESSION['rol'] == 'TI') {

  include_once 'vistas/HeaderLogEstudiante.php';
} else {
  include_once 'vistas/HeaderLogEmpresa.php';
}
?>

<!---------------------BANNER SECTION------------------------------>

<section id="banner">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <p class="promo-title">BES DIGITAL AGENCY</p>
        <P>Lorem ipsum dolor, sit amet consectetur adipisicing elit.
          Laudantium minima incidunt voluptatem tempora quae velit corporis? Necessitatibus deserunt quia hic magni
          voluptas ipsum at, aliquam, saepe blanditiis debitis itaque eum.</P>
      </div>
      <div class="col-md-6 text-center">
        <img src="img/illustrator.svg" class="img-fluid" alt="">
      </div>
    </div>
  </div>
  <img src="img/wave (6).svg" class="bottom-img">
</section>

<!----------------------SERVICES SECTION--------->
<section id="services">
  <div class="container text-center">
    <h1 class="title">NUESTROS SERVICIOS</h1>
    <div class="row text-center">
      <div class="col-md-4 services">
        <img src="img/services.png" class="service-img">
        <h4>Services 1</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo totam sit officiis ea ut aspernatur fugit
          eos, repudiandae quasi cumque fuga sequi, quisquam enim nobis laudantium magnam. Officiis, minima ullam?</p>
      </div>
      <div class="col-md-4 services">
        <img src="img/services.png" class="service-img">
        <h4>Services 2</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo totam sit officiis ea ut aspernatur fugit
          eos, repudiandae quasi cumque fuga sequi, quisquam enim nobis laudantium magnam. Officiis, minima ullam?</p>
      </div>
      <div class="col-md-4 services">
        <img src="img/services.png" class="service-img">
        <h4>Services 3</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo totam sit officiis ea ut aspernatur fugit
          eos, repudiandae quasi cumque fuga sequi, quisquam enim nobis laudantium magnam. Officiis, minima ullam?</p>
      </div>
    </div>
    <button type="button" class="btn btn-primary">Ingresar</button>
  </div>
</section>

<!-----------ABOUT US------------>
<section id="about-us">
  <div class="container">
    <h1 class="tilte text-center">NOSOTROS</h1>
    <div class="row">
      <div class="col-md-6">
        <p class="about-title">Cual es la diferencia?</p>
        <ul>
          <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto deserunt veritatis sed laboriosam
            aliquid, ut reiciendis eos earum, quibusdam hic numquam quidem nostrum et sapiente, adipisci libero vitae
            odit deleniti!</li>
          <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto deserunt veritatis sed laboriosam
            aliquid, ut reiciendis eos earum, quibusdam hic numquam quidem nostrum et sapiente, adipisci libero vitae
            odit deleniti!</li>
          <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto deserunt veritatis sed laboriosam
            aliquid, ut reiciendis eos earum, quibusdam hic numquam quidem nostrum et sapiente, adipisci libero vitae
            odit deleniti!</li>
        </ul>
      </div>
      <div class="col-md-6">
        <img src="img/about.svg" class="img-fluid service2img">
      </div>
    </div>


  </div>
</section>

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
<?php include_once 'vistas/Footer.php'; ?>