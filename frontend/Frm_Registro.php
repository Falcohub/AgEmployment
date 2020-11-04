
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
                <form action="../backend/RegistroSP.php" class="sign-in-form" method="POST">
                    <h2 class="tittle">Registro estudiante</h2>
                    <div class="input-field">
                        <i class="fas fa-id-card"></i>
                        <input type="text" name="TxtDocumento" placeholder="Documento">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="TxtNombres" placeholder="Nombres">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="TxtApellidos" placeholder="Apellidos">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" name="TxtCorreo" placeholder="Correo">
                    </div>
                    <button type="submit" value="Registrarse" class="btn solid">Registrarse</button>

                    <p class="social-text">Registrarse con</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                    </div>
                </form>

                <form action="" class="sign-up-form" method="POST">
                    <h2 class="tittle">Registro empresa</h2>
                    <div class="input-field">
                        <i class="fas fa-id-card"></i>
                        <input type="text" placeholder="NIT">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Nombres">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" placeholder="Correo">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Contraseña">
                    </div>
                    <input type="submit" value="Registrarse" class="btn solid">

                    <p class="social-text">Registrarse con</p>
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
                    <h3>Crear una cuenta</h3>
                    <p>Si aun no tienes una cuenta de usuario resgistrate de forma gratuita y enterate de todas las ofertas de empleo que tenemos disponible para ti.
                    </p>
                    <button class="btn transparent" id="sign-up-btn">Registrarse</button>
                </div>

                <img src="img/good.svg" class="image" alt="">
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Inicia sesión</h3>
                    <p>Si ya tienes una cuenta o te encuentras registrado ingresa desde aqui.
                    </p>
                    <button class="btn transparent" id="sign-in-btn">Ingresar</button>
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