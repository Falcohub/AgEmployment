<?php include('vistas/HeaderEmpresa.php') ?>

<div class="content mt-0 mb-5">
    <div class="card border-dark">
        <div class="card-header text-center">
            <h3 class="card-title">Información de cuenta</h3>
        </div>
        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">NIT</label>
                        <input type="email" class="form-control border-dark" id="inputEmail4">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Usuario</label>
                        <input type="text" class="form-control border-dark" id="inputPassword4">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Contraseña</label>
                        <input type="text" class="form-control border-dark" id="inputAddress" placeholder="*****************">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Fecha</label>
                        <input type="date" class="form-control col-12 border-dark" id="inputAddress2" placeholder="Apartment, studio, or floor">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Correo</label>
                    <input type="text" class="form-control border-dark" id="inputAddress2" placeholder="exampl@.com">
                </div>
                <div class="form-row">
                    <div class="form-group col-2">
                        <button type="submit" class="btn btn-primary border-dark">Actualizar Cuenta</button>
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