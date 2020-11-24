<?php

session_start();

if (isset($_SESSION['rol'])) {
    echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=Frm_Home.php">';
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Login.css">
    <title>Login y Registro</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="../backend/RegistroEstudiante.php" class="sign-in-form" method="POST">
                    <h2 class="tittle">Registro estudiante</h2>
                    <div class="input-field">
                        <i class="fas fa-id-card"></i>
                        <input type="text" name="TxtDocumento" placeholder="Documento" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="TxtNombres" placeholder="Nombres" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="TxtApellidos" placeholder="Apellidos" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" name="TxtCorreo" placeholder="Correo" required />
                    </div>
                    <button type="submit" value="RegistrarEstudiante" class="btn solid">Registrarse</button>

                    <!--<p class="social-text">Registrarse con</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                    </div>-->
                </form>

                <form action="../backend/RegistroEmpresa.php" class="sign-up-form" method="POST">
                    <h2 class="tittle">Registro empresa</h2>
                    <div class="input-field">
                        <i class="fas fa-id-card"></i>
                        <input type="text" name="TxtNIT" placeholder="NIT" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="TxtNombreEmpresa" placeholder="Nombre empresa" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" name="TxtCorreo" placeholder="Correo" required />
                    </div>
                    <input type="submit" value="Registrarse" class="btn solid">

                    <!--<p class="social-text">Registrarse con</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                    </div>-->
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Registrar empresa</h3>
                    <p>Publica tus ofertas laborales registrando tu cuenta como empresa.
                    </p>
                    <button class="btn transparent" id="sign-up-btn">Registrarse</button>
                </div>

                <img src="img/good.svg" class="image" alt="">
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Registrar estudiante</h3>
                    <p>Si eres un estudiante en busca de practicas laborales, registrate aqui y enterate de todas las oferta laborales que tenemos disponible para ti.
                    </p>
                    <button class="btn transparent" id="sign-in-btn">Registrarse</button>
                </div>

                <img src="img/Pensar.svg" class="image" alt="">
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous">
    </script>
    <script src="js/Login.js"></script>
</body>

</html>