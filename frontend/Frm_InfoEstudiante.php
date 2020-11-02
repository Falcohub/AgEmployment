<?php include('vistas/HeaderEstudiante.php') ?>

<div class="content mt-0 mb-5">
    <div class="card border-dark">
        <div class="card-header text-center">
            <h3 class="card-title">Perfil estudiante</h3>
        </div>
        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Nombre</label>
                        <input type="email" class="form-control border-dark" id="nombre">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Apellido</label>
                        <input type="text" class="form-control border-dark" id="apellidos">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Contacto</label>
                        <input type="text" class="form-control border-dark" id="contacto">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputAddress">Direccion</label>
                        <input type="text" class="form-control border-dark" id="direccion" placeholder="1234 Main St">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Fecha de Nacimiento</label>
                        <input type="date" class="form-control col-12 border-dark" id="fecha_nac" placeholder="Apartment, studio, or floor">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="fas fa-pencil-alt prefix">Descripcion del perfil</label>
                    <textarea id="descripcion_perfil" class="md-textarea form-control border-dark"></textarea>
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

    <div class="card border-dark">
        <div class="card-header text-center">
            <h3 class="card-title">Experiencia laboral</h3>
        </div>

        <div class="card-body border-dark">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Nombre de la anterior empresas</label>
                        <input type="email" class="form-control border-dark" id="nombre_Empre_anterior">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="text">Cargo que ocupaba en la empresas</label>
                        <textarea id="cargo" class="md-textarea form-control border-dark"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputAddress">Contacto de la empresa</label>
                        <input type="text" class="form-control" id="contacto_empresa" placeholder="1234 Main St">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Fecha de inicio de contracto</label>
                        <input type="date" class="form-control col-12 border-dark" id="fecha_inicio" placeholder="Apartment, studio, or floor">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Fecha de finalizacion</label>
                    <input type="date" class="form-control col-6 border-dark" id="fecha_final" placeholder="Apartment, studio, or floor">
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

    <div class="card border-dark">
        <div class="card-header text-center">
            <h3 class="card-title">Estudios realizados</h3>
        </div>

        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Nombre de la institucion</label>
                        <input type="email" class="form-control border-dark" id="nombre_institucion">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Titulos obtenidos</label>
                        <input type="text" class="form-control border-dark" id="titulos">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="inputAddress2">Fecha de inicio de estudio</label>
                        <input type="date" class="form-control col-12 border-dark" id="fecha_estudios" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Fecha final de estudio</label>
                    <input type="date" class="form-control col-md-2 border-dark" id="fechafin_estudios" placeholder="">
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