<?php
session_start();

if (isset($_SESSION['rol'])) {
    header('location: ../frontend/Frm_InfoEstudiante.php');
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
                <form action="../backend/Login.php" class="sign-in-form" method="POST">
                    <h2 class="tittle">Iniciar sesión</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="TxtUsuario" placeholder="Usuario" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="TxtPassword" placeholder="Contraseña" required />
                    </div>
                    <a href="Frm_RecuperarPass.php">¿Olvidaste tu contraseña?</a>
                    <input type="submit" value="Iniciar sesion" class="btn solid">
                    <p class="social-text">Iniciar sesión con</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                    </div>
                </form>

            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <p>Si aun no tienes una cuenta de usuario, resgistrate de forma gratuita y enterate de todas las ofertas de empleo que tenemos disponible para ti.
                    </p>
                </div>

                <img src="img/good.svg" class="image" alt="">
            </div>

        </div>
    </div>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous">
    </script>
    <script src="js/Login.js"></script>
</body>

</html>