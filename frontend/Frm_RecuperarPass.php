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
            <form action="backend/RecuperarPassword.php" class="sign-in-form" method="POST">
                <h2 class="tittle">Ingresar correo electronico</h2>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="TxtCorreo" placeholder="ejemplo@email.com">
                </div>
                <input type="submit" value="Enviar" class="btn solid">
                
            </form>

            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>¿Olvidaste tu contraseña?</h3>
                    <p>Ingresa el correo electronico para recuperar la contraseña.
                    </p>
                </div>
                
                <img src="img/good.svg" class="image" alt="">
            </div>
            
        </div>
    </div>
    <script src="https://kit.fontawesome.com/64d58efce2.js"
    crossorigin="anonymous">
    </script>
<script src="js/Login.js"></script>
</body>
</html>