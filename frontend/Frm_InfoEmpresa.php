<?php
    include_once '../backend/conexion.php';

    session_start();

    if (!isset($_SESSION['rol'])) {
        echo'<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=Frm_Login.php">';
        exit();
    } else {
        if ($_SESSION['rol'] == 'CC' || $_SESSION['rol'] == 'TI') {
            echo'<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=Frm_InfoEstudiante.php">';
            exit();
        }
    }

    //Establecer conexion
    $db = new Database();
    $conexion = $db->connect();

    if (isset($_SESSION['idRegistroEmp'])) {

        //Consulta para obtener datos
        $empresa = $conexion->query("SELECT * FROM tbl_usuarios where user_pkid = {$_SESSION['idRegistroEmp']}")->fetch(PDO::FETCH_ASSOC);

    }else if (isset($_SESSION['idLogin'])) {

        //Consulta para obtener datos
        $empresa = $conexion->query("SELECT * FROM tbl_usuarios where user_pkid = {$_SESSION['idLogin']}")->fetch(PDO::FETCH_ASSOC);
    }

    include 'vistas/HeaderEmpresa.php';
?>

<div class="content mt-0 mb-5">
    <div class="shadow p-3 mb-5 bg-white rounded">
        <h3 class="card-title text-center">Perfil empresa</h3>
        <div class="card-body">
            <form action="../backend/InfoEmpresa.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputNIT">NIT</label>
                        <input type="text" value="<?php echo $empresa['user_pkid']; ?>" name="TxtNIT" class="form-control" id="inputNIT" placeholder="Ingrese el NIT...">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmpresa">Nombre empresa</label>
                        <input type="text" value="<?php echo $empresa['user_nombres']; ?>" name="TxtNombreEmpresa" class="form-control" id="inputEmpresa" placeholder="Nombre empresa">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputContacto">Contacto</label>
                        <input type="text" value="<?php echo $empresa['user_contacto'] ?>" name="TxtContacto" class="form-control" id="inputContacto" placeholder="Numero de telefono">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCorreo">Correo</label>
                        <input type="email" value="<?php echo $empresa['user_correo'] ?>" name="TxtCorreo" class="form-control" id="inputCorreo" placeholder="empresa@mail.com">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputDpto">Departamento</label>
                        <input type="text" value="<?php echo $empresa['user_dpto'] ?>" name="TxtDpto" class="form-control" id="inputDpto" placeholder="Seleccione departamento...">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="SelectMunicipio">Municipio</label>
                        <select value="<?php echo $empresa['user_ciudad'] ?>" name="CbxMunicipio" id="inputMunicipio" class="form-control">
                            <option selected>Selecione municipio...</option>
                            <option>Chigorodo</option>
                            <option>Carepa</option>
                            <option>Apartado</option>
                            <option>Turbo</option>
                            <option>Necocli</option>
                            <option>Monteria</option>
                            <option>Medellin</option>
                            <option>Rionegro</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputDireccion">Direccion</label>
                    <input type="text" value="<?php echo $empresa['user_direccion'] ?>" name="TxtDireccion" class="form-control" id="inputDireccion" placeholder="Calle 0 # 0 - 0">
                </div>
                <div class="form-row">
                    <div class="form-group col-2">
                        <button type="submit" value="CompletarRegistro" class="btn btn-success w-75">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="footer">
        <hr>
        <p class="copyright">PracticApp 2020</p>
    </div>
</div>

</body>

<script src="js/PanelEmpresa.js"></script>

</html>