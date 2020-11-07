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
            <a class="navbar-brand" href="Frm_Home.php"><img src="img/—Pngtree—creative company_1420804.png" alt=""></a>
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
                    <li class="nav">
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary dropdown-toggle fas fa-user-edit" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Opcion
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <button class="dropdown-item" type="button">Perfil</button>
                                <button class="dropdown-item" type="button">Informacion</button>
                                <button <?php header('location: ../backend/CerrarSesion.php')?>class="dropdown-item" type="button">Cerrar sesion</button>
                            </div>
                        </div>
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
            <a href="Frm_InfoEstudiante.php"><i class="fas fa-user-edit"></i><span>Perfil estudiante</span></a>
            <a href="Frm_InfoCuentaEst.php"><i class="fas fa-unlock-alt"></i><span>Informacion de cuenta</span></a>
            <a href="../backend/CerrarSesion.php"><i class="fas fa-sign-out-alt"></i><span>Salir</span></a>
        </div>
    </div>
    <!--mobile navigation bar end-->
    <!--sidebar start-->
    <div class="sidebar mt-5">
        <div class="profile_info">
            <img src="img/logo.jpeg" class="profile_image" alt="">
        </div>
        <a href="Frm_InfoEstudiante.php"><i class="fas fa-user-edit"></i><span>Perfil estudiante</span></a>
        <a href="Frm_InfoCuentaEst.php"><i class="fas fa-unlock-alt"></i><span>Informacion de cuenta</span></a>
        <a href="../backend/CerrarSesion.php"><i class="fas fa-sign-out-alt"></i><span>Salir</span></a>
    </div>
    <!--sidebar end-->

    <!-----------------Smooth Scroll------------------------>
    <script src="js/smooth-scroll.js"></script>
    <script>
        var scroll = new SmoothScroll('a[href*="#"]');
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>