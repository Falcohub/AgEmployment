<?php include('vistas/HeaderEstudiante.php') ?>

<div class="content mt-0 mb-5">
    <div class="shadow mp-3 mb-3 bg-white rounded"> 
            <h3 class="card-title text-center">Perfil estudiante</h3>
        <div class="card-body">
           <form>
                 <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Documento</label>
                        <input type="email" name="txtNombre" class="form-control" id="nombre">
                    </div>
                    <div class="form-group col-md-1">
                        <label for="SelectMunicipio">Tipo</label>
                        <select id="inputMunicipio" name="txtSexo" class="form-control">
                            <option selected>CC</option>
                            <option>TI</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Nombre</label>
                        <input type="email" name="txtNombre" class="form-control" id="nombre">
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Apellido</label>
                        <input type="text" name="txtApellido" class="form-control" id="apellidos">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="SelectMunicipio">Sexo</label>
                        <select id="inputMunicipio" name="txtSexo" class="form-control">
                            <option selected>Seleccione sexo...</option>
                            <option>hombre</option>
                            <option>mujer</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Contacto</label>
                        <input type="text" name="txtContacto" class="form-control" id="contacto">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputCorreo">Correo</label>
                        <input type="email" name="txtCorreo" class="form-control" id="inputCorreo" placeholder="empresa@mail.com">
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-3">
                        <label for="SelectMunicipio">Departamento</label>
                        <select id="inputMunicipio" name="txtDepartamento" class="form-control">
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
                    <div class="form-group col-md-3">
                        <label for="inputAddress">Ciudad</label>
                        <input type="text" name="txtCiudad" class="form-control" id="direccion" placeholder="">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputAddress">Direccion</label>
                        <input type="text" name="txtDireccion" class="form-control" id="direccion" placeholder="">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputAddress2">Fecha de Nacimiento</label>
                        <input type="date" name="txtFecha" class="form-control col-12" id="fecha_nac" placeholder="Apartment, studio, or floor">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="fas fa-pencil-alt prefix">Descripcion del perfil</label>
                    <textarea id="descripcion_perfil" name="txtDescripcion" class="md-textarea form-control"></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group col-2">
                        <button type="submit" class="btn btn-success border-dark">Guardar perfil</button>
                    </div>
                    <div class="form-group col-2">
                        <button type="submit" class="btn btn-success border-dark">Actualizar perfil</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

    <div class="shadow p-1 mb-4 bg-white rounded">  
            <h3 class="card-title text-center">Experiencia laboral</h3>
        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Nombre de la anterior empresas</label>
                        <input type="email" class="form-control" id="nombre_Empre_anterior">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="text">Cargo que ocupaba en la empresas</label>
                        <textarea id="cargo" class="md-textarea form-control"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputAddress">Contacto de la empresa</label>
                        <input type="text" class="form-control" id="contacto_empresa" placeholder="1234 Main St">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Fecha de inicio de contracto</label>
                        <input type="date" class="form-control col-12" id="fecha_inicio" placeholder="Apartment, studio, or floor">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Fecha de finalizacion</label>
                    <input type="date" class="form-control col-6" id="fecha_final" placeholder="Apartment, studio, or floor">
                </div>
                <div class="form-row">
                    <div class="form-group col-3">
                        <button type="submit" class="btn btn-success">Guardar Experiencia</button>
                    </div>
                    <div class="form-group col-4">
                        <button type="submit" class="btn btn-success ">Actualizar experiencia</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="shadow p-1 mb-5 bg-white rounded">
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

<footer>
    <div class="container">
        <div class="row"></div>
        <hr>
        <p class="copyright">PractiApp 2020</p>
    </div>
</footer>

<script src="js/PanelEmpresa.js"></script>

</html>