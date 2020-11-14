<?php
    include_once '../backend/conexion.php';
    
    session_start();
    
    if(!isset($_SESSION['rol'])){
        header('location: Frm_Login.php');
    }else {
        if ($_SESSION['rol'] != 'CC') {
            header('location: Frm_Login.php');
        }
    }
    //Establecer conexion
    $db = new Database();
    $conexion = $db->connect();
    //Consulta para obtener datos
    $estudiante = $conexion->query("SELECT * FROM tbl_usuarios where user_pkid = {$_SESSION['documentoEst']}")->fetch(PDO::FETCH_ASSOC);

    include_once 'vistas/HeaderEstudiante.php';
    ?>

<div class="content mt-0 mb-5">
    <div class="shadow p-3 mb-5 bg-white rounded">
        <h3 class="card-title text-center">Perfil estudiante</h3>
        <div class="card-body">
            <form action="../backend/InfoEstudiante.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Documento</label>
                        <input type="text" value="<?php echo $estudiante['user_pkid'];?>" name="TxtDocumento" class="form-control" id="nombre" placeholder="No Documento">
                    </div>
                    <div class="form-group col-md-1">
                        <label for="SelectMunicipio">Tipo</label>
                        <select id="inputMunicipio" value="<?php echo $estudiante['user_ddi'];?>" name="Cbx_ddi" class="form-control">
                            <option selected>CC</option>
                            <option>TI</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Nombre</label>
                        <input type="text" value="<?php echo $estudiante['user_nombres'];?>" name="TxtNombre" class="form-control" id="nombre" placeholder="Nombres">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Apellido</label>
                        <input type="text" value="<?php echo $estudiante['user_apellidos'];?>" name="TxtApellido" class="form-control" id="apellidos" placeholder="Apellidos">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="SelectMunicipio">Sexo</label>
                        <select id="inputMunicipio" value="<?php echo $estudiante['user_sexo'];?>" name="CbxSexo" class="form-control">
                            <option selected>Seleccione sexo...</option>
                            <option>Masculino</option>
                            <option>Femenino</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Contacto</label>
                        <input type="text" value="<?php echo $estudiante['user_contacto'];?>" name="TxtContacto" class="form-control" id="contacto" placeholder="Contacto">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputCorreo">Correo</label>
                        <input type="email"  value="<?php echo $estudiante['user_correo'];?>" name="TxtCorreo" class="form-control" id="inputCorreo" placeholder="estudiante@email.com">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputAddress">Departamento</label>
                        <input type="text" value="<?php echo $estudiante['user_dpto'];?>" name="TxtDpto" class="form-control" id="direccion" placeholder="Departamento">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="SelectMunicipio">Ciudad</label>
                        <select id="inputMunicipio" value="<?php echo $estudiante['user_ciudad'];?>" name="CbxCiudad" class="form-control">
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
                    <div class="form-group col-md-3">
                        <label for="inputAddress">Direccion</label>
                        <input type="text" value="<?php echo $estudiante['user_direccion'];?>" name="TxtDireccion" class="form-control" id="direccion" placeholder="Calle 0 #0 - 0">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputAddress2">Fecha de Nacimiento</label>
                        <input type="date" value="<?php echo $estudiante['user_fechaNac'];?>" name="TxtFechaNac" class="form-control col-12" id="fecha_nac">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="fas fa-pencil-alt prefix">Descripcion del perfil</label>
                    <textarea id="descripcion_perfil" name="TxtPerfil" class="md-textarea form-control"><?php echo $estudiante['user_perfil'];?></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group col-2">
                        <button type="submit" value="GuardarEstudiante" class="btn btn-success">Guardar</button>
                    </div>
                    <div class="form-group col-2">
                        <button type="submit" class="btn btn-success">Actualizar</button>
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
            <form action="../backend/InfoEstudiante.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Nombre de la anterior empresas</label>
                        <input type="text" class="form-control" name="TxtNombreEmpresa" id="nombre_Empre_anterior">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="text">Cargo que ocupaba en la empresas</label>
                        <textarea id="cargo"  name="TxtCargo"  class="md-textarea form-control"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputAddress">Contacto de la empresa</label>
                        <input type="text" class="form-control" name="TxtContactoEmpre"  id="contacto_empresa" placeholder="1234 Main St">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Fecha de inicio de contracto</label>
                        <input type="date" class="form-control col-12" name="TxtFechaInicio"  id="fecha_inicio" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Fecha de finalizacion</label>
                    <input type="date" class="form-control col-6" name="TxtFechaFin"  id="fecha_final">
                </div>
                <div class="form-row">
                    <div class="form-group col-3">
                        <button type="submit" value="GuardarExp" class="btn btn-success">Guardar</button>
                    </div>
                    <div class="form-group col-4">
                        <button type="submit" class="btn btn-success ">Actualizar</button>
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
                    <div class="form-group">
                        <label for="inputAddress2">Fecha de inicio de estudio</label>
                        <input type="date" class="form-control col-12" id="fecha_estudios" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Fecha final de estudio</label>
                    <input type="date" class="form-control col-md-2" id="fechafin_estudios" placeholder="">
                </div>
                <div class="form-row">
                    <div class="form-group col-3">
                        <button type="submit" class="btn btn-success">Guardar Estudios Realizados</button>
                    </div>
                    <div class="form-group col-4">
                        <button type="submit" class="btn btn-success ">Actualizar Estudios Realizados</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

<script src="js/PanelEmpresa.js"></script>

</html>