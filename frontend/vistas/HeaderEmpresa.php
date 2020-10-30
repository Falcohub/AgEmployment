<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!--------------- Panel Empresa ----------------->
    <link rel="stylesheet" href="css/PanelEmpresa.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <title>PRACTICAPP</title>
</head>

<body>
    <section id="nav-bar">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#"><img src="img/—Pngtree—creative company_1420804.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="Frm_Home.php">INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Frm_Ofertas.php">OFERTAS LABORALES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#social-media">CONTACTOS</a>
                    </li>
                    <li class="nav-item">
                        
                    </li>
                </ul>
            </div>
        </nav>
    </section>

    <input type="checkbox" id="check">
<!--mobile navigation bar start-->
<div class="mobile_nav">
    <div class="nav_bar">
        <i class="fa fa-bars nav_btn"></i>
    </div>
    <div class="mobile_nav_items">
        <a href="#"><i class="fas fa-user-edit"></i><span>Editar informacion</span></a>
        <a href="#"><i class="fas fa-bell"></i><span>Publicar empleo</span></a>
        <a href="#"><i class="fas fa-address-card"></i><span>Postulados</span></a>
        <a href="#"><i class="fas fa-unlock-alt"></i><span>Cambiar contraseña</span></a>
        <a href="#"><i class="fas fa-sign-out-alt"></i><span>Salir</span></a>

    </div>
</div>
<!--mobile navigation bar end-->
<!--sidebar start-->
<div class="sidebar mt-5">
    <div class="profile_info">
        <img src="logo.jpeg" class="profile_image" alt="">
        <h4>Empresa</h4>
    </div>
    <a href="Frm_InfoEmpresa.php"><i class="fas fa-user-edit"></i><span>Editar informacion</span></a>
    <a href="Frm_PublicarEmpleo.php"><i class="fas fa-bell"></i><span>Publicar empleo</span></a>
    <a href="Frm_Postulaciones.php"><i class="fas fa-address-card"></i><span>Postulados</span></a>
    <a href="Frm_InfoCuenta.php"><i class="fas fa-unlock-alt"></i><span>Informacion de cuenta</span></a>
    <a href="#"><i class="fas fa-sign-out-alt"></i><span>Salir</span></a>
</div>
<!--sidebar end-->