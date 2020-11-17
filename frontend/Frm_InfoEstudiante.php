<?php
    include_once '../backend/conexion.php';

    session_start();

    if (!isset($_SESSION['rol'])) {
        header('location: Frm_Login.php');
    } else {
        if ($_SESSION['rol'] != 'CC' && $_SESSION['rol'] != 'TI') {
            header('location: Frm_Login.php');
        }
    }

    if (isset($_SESSION['idRegistroEst'])) {

        //Establecer conexion
        $db = new Database();
        $conexion = $db->connect();

        //Consulta para obtener datos
        $estudiante = $conexion->query("SELECT * FROM tbl_usuarios where user_pkid = {$_SESSION['idRegistroEst']}")->fetch(PDO::FETCH_ASSOC);
    } else if (isset($_SESSION['idLogin'])) {

        //Establecer conexion
        $db = new Database();
        $conexion = $db->connect();

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
                        <select id="inputSexo" value="<?php echo $estudiante['user_sexo']; ?>" name="CbxSexo" class="form-control">
                            <option selected>Seleccionar...</option>
                            <option>Masculino</option>
                            <option>Femenino</option>
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
                            <option>Chigorodo</option>
                            <option>Carepa</option>
                            <option>Apartadó</option>
                            <option>Turbo</option>
                            <option>Necocli</option>
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
                    <div class="form-group col-2">
                        <button type="submit" value="ActualizarEstudiante" class="btn btn-success">Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="shadow p-3 mb-5 bg-white rounded">
        <div>
            <h3 class="card-title text-center">Experiencia laboral</h3>

        </div>
        <div class="card-body">
            <form action="../backend/Experiencia.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputNombreEmpresa">Nombre de la empresa donde laboro</label>
                        <input type="text" class="form-control" name="TxtNombreEmpresa" id="inputNombreEmpresa">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="text">Cargo que desempeñaba</label>
                        <input id="inputCargo" name="TxtCargo" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputContactoEmpresa">Contacto</label>
                        <input type="text" class="form-control" name="TxtContacto" id="inputContactoEmpresa">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputFechaIniExp">Fecha en que inicio a laborar</label>
                        <input type="date" class="form-control" name="TxtFechaInicio" id="inputFechaIniExp">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputFechaFinExp">Fecha de finalizacion</label>
                        <input type="date" class="form-control" name="TxtFechaFin" id="inputFechaFinExp">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-2">
                        <button type="submit" value="GuardarExp" class="btn btn-success">Guardar</button>
                    </div>
                    <div class="form-group col-2">
                        <button type="submit" value="ActualizarExp" class="btn btn-success ">Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="shadow p-3 mb-5 bg-white rounded">
        <h3 class="card-title text-center">Estudios realizados</h3>
        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Nombre de la institucion</label>
                        <input type="email" class="form-control" id="nombre_institucion">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Titulos obtenidos</label>
                        <input type="text" class="form-control" id="titulos">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputAddress2">Fecha de inicio de estudio</label>
                        <input type="date" class="form-control" id="fecha_estudios" placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress2">Fecha final de estudio</label>
                        <input type="date" class="form-control" id="fechafin_estudios" placeholder="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-3">
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                    <div class="form-group col-4">
                        <button type="submit" class="btn btn-success ">Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

<script src="js/PanelEmpresa.js"></script>

</html>