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
            <form action="" class="sign-in-form">
                <h2 class="tittle">Iniciar sesión</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Usuario">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Contraseña">
                </div>
                <a href="Frm_ForgetPass.html">¿Olvidaste tu contraseña?</a>
                <input type="submit" value="Iniciar sesion" class="btn solid">
                
                <p class="social-text">Iniciar sesión con</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </form>

            <form action="" class="sign-up-form">
                <h2 class="tittle">Registrarse</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Nombre">
                </div>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Apellidos">
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
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Crear una cuenta</h3>
                    <p>Si aun no tienes una cuenta de usuario resgistrate de forma gratuita y enterate de todas las ofertas de empleo que tenemos disponible en nuestro catalogo. 
                    </p>
                    <button class="btn transparent" id="sign-up-btn">Registrarse</button>
                </div>

                <img src="img/good.svg" class="image" alt="">
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Iniciar sesión</h3>
                    <p>Si ya tienes una cuenta o te encuentras registrado ingresa desde aqui.
                    </p>
                    <button class="btn transparent" id="sign-in-btn">Ingresar</button>
                </div>

                <img src="img/Pensar.svg" class="image" alt="">
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/64d58efce2.js"
    crossorigin="anonymous">
    </script>
<script src="js/Login.js"></script>
</body>
</html>