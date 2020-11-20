<?php
    include_once '../backend/conexion.php';

    session_start();

    if (!isset($_SESSION['rol'])) {
        echo'<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=Frm_Login.php">';
        exit();
    } else {
        if ($_SESSION['rol'] == 'NIT') {
            echo'<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=Frm_InfoEmpresa.php">';
            exit();
        }
    }

    //Establecer conexion
    $db = new Database();
    $conexion = $db->connect();

    if (isset($_SESSION['idRegistroEst'])) {

        //Consulta para obtener datos
        $estudiante = $conexion->query("SELECT * FROM tbl_usuarios where user_pkid = {$_SESSION['idRegistroEst']}")->fetch(PDO::FETCH_ASSOC);
    } else if (isset($_SESSION['idLogin'])) {

        //Consulta para obtener datos
        $estudiante = $conexion->query("SELECT * FROM tbl_usuarios where user_pkid = {$_SESSION['idLogin']}")->fetch(PDO::FETCH_ASSOC);
    }

    include_once 'vistas/HeaderEstudiante.php';
?>

<div class="content mt-0 mb-5">
    <div class="shadow p-3 mb-5 bg-white rounded">
        <h3 class="card-title text-center">Perfil estudiante</h3>
        <div class="card-body">
            <form action="../backend/InfoEstudiante.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputDocumento">Documento</label>
                        <input type="text" value="<?php echo $estudiante['user_pkid']; ?>" name="TxtDocumento" class="form-control" id="inputDocumento" placeholder="No Documento">
                    </div>
                    <div class="form-group col-md-1">
                        <label for="Selectddi">Tipo</label>
                        <select id="inputddi" value="<?php echo $estudiante['user_ddi']; ?>" name="Cbx_ddi" class="form-control">
                            <option selected>CC</option>
                            <option>TI</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputNombreEst">Nombre</label>
                        <input type="text" value="<?php echo $estudiante['user_nombres']; ?>" name="TxtNombre" class="form-control" id="inputNombreEst" placeholder="Nombre completo">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputApellido">Apellido</label>
                        <input type="text" value="<?php echo $estudiante['user_apellidos']; ?>" name="TxtApellido" class="form-control" id="inputApellidos" placeholder="Apellidos">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="SelectSexo">Sexo</label>
                        <select id="inputSexo" name="CbxSexo" class="form-control">
                        <?php
                            foreach($categoria as $categorias)
                            {
                                echo '<option value="'.$categorias["Id_Categoria"].'">'.$categorias["DescripcionCat"].'</option>';
                            }
                        ?>
                        </select>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="inputContacto">Contacto</label>
                        <input type="text" value="<?php echo $estudiante['user_contacto']; ?>" name="TxtContacto" class="form-control" id="inputContacto" placeholder="Contacto">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="inputCorreo">Correo</label>
                        <input type="email" value="<?php echo $estudiante['user_correo']; ?>" name="TxtCorreo" class="form-control" id="inputCorreo" placeholder="estudiante@email.com">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputDpto">Departamento</label>
                        <input type="text" value="<?php echo $estudiante['user_dpto']; ?>" name="TxtDpto" class="form-control" id="inputDpto" placeholder="Departamento">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="SelectMunicipio">Ciudad</label>
                        <select id="inputMunicipio" value="<?php echo $estudiante['user_ciudad']; ?>" name="CbxCiudad" class="form-control">
                            <option selected>Selecione municipio...</option>
                            <option>Chigorodó</option>
                            <option>Cárepa</option>
                            <option>Apartadó</option>
                            <option>Turbo</option>
                            <option>Necoclí</option>
                            <option>Monteria</option>
                            <option>Medellin</option>
                            <option>Rionegro</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="inputDireccion">Direccion</label>
                        <input type="text" value="<?php echo $estudiante['user_direccion']; ?>" name="TxtDireccion" class="form-control" id="inputDireccion" placeholder="Calle 0 #0 - 0">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputFechaNac">Fecha de Nacimiento</label>
                        <input type="date" value="<?php echo $estudiante['user_fechaNac']; ?>" name="TxtFechaNac" class="form-control col-12" id="inputFechaNac">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Descripcion del perfil</label>
                        <textarea id="descripcion_perfil" name="TxtPerfil" class="md-textarea form-control"><?php echo $estudiante['user_perfil']; ?></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-2">
                        <button type="submit" value="GuardarEstudiante" class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

<script src="js/PanelEmpresa.js"></script>

</html>