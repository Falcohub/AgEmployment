<?php 
    include_once '../backend/conexion.php';

    session_start();

    if (!isset($_SESSION['rol'])) {
        header('location: Frm_Login.php');
    } else {
        if ($_SESSION['rol'] != 'NIT') {
            header('location: Frm_Login.php');
        }
    }

    if (isset($_SESSION['idRegistroEmp'])) {

        //Establecer conexion
        $db = new Database();
        $conexion = $db->connect();

        //Consulta para obtener datos
        $empresas = $conexion->query("SELECT * FROM tbl_usuarios where user_pkid = {$_SESSION['idRegistroEmp']}")->fetch(PDO::FETCH_ASSOC);

    }else if (isset($_SESSION['idLogin'])) {

        //Establecer conexion
        $db = new Database();
        $conexion = $db->connect();

        //Consulta para obtener datos
        $empresas = $conexion->query("SELECT * FROM tbl_usuarios where user_pkid = {$_SESSION['idLogin']}")->fetch(PDO::FETCH_ASSOC);
    }
    include_once 'vistas/HeaderEmpresa.php';
?>

<div class="content mt-0 mb-5">
    <div class="shadow p-3 mb-5 bg-white rounded">
            <h3 class="card-title text-center">Información de cuenta</h3>
        <div class="card-body">
            <form >
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputUser">Usuario</label>
                        <input type="text" name="txtUsuario" value="<?php echo $empresas['user_correo']; ?>" class="form-control" id="inputUser" placeholder="Correo electronico">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword">Contraseña</label>
                        <input type="password" name="txtContraseña" value="<?php echo $empresas['user_password']; ?>" class="form-control" id="inputPassword" placeholder="Contraseña">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputFecha">Fecha de creación: </label>
                        <label for="inputFecha"><?php echo $empresas['user_fechaUser']; ?></label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-2">
                        <button type="submit" class="btn btn-success w-75">Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="footer">
        <hr>
        <p class="copyright">PractiApp 2020</p>
    </div>
</div>

</body>

<script src="js/PanelEmpresa.js"></script>

</html>