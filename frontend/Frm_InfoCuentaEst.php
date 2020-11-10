<?php include('vistas/HeaderEstudiante.php') ?>

<div class="content mt-0 mb-5">
    <div class="shadow p-3 mb-5 bg-white rounded">
        <div class="card-header text-center">
            <h3 class="card-title">Informacion de cuenta</h3>
        </div>
        <div class="card-body ">
            <form>
            <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Nombre</label>
                        <input type="email" class="form-control" id="nombre">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Usuario</label>
                        <input type="text" class="form-control" id="usuario">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Contraseña</label>
                        <input type="text" class="form-control" id="contraseña" placeholder="*****************">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Fecha</label>
                        <input type="date" class="form-control col-12" id="fecha" placeholder="Apartment, studio, or floor">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Correo</label>
                    <input type="text" class="form-control" id="correo" placeholder="exampl@.com">
                </div>
                <div class="form-row">
                    <div class="form-group col-2">
                        <button type="submit" class="btn btn-primary border-dark">Actualizar perfil</button>
                    </div>
                </div>
            </form>
        </div>
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