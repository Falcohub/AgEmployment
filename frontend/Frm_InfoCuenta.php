<?php include('vistas/HeaderEmpresa.php') ?>

<div class="content mt-0 mb-5">
    <div class="shadow p-3 mb-5 bg-white rounded">
            <h3 class="card-title text-center">Información de cuenta</h3>
        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputUser">Usuario</label>
                        <input type="text" class="form-control" id="inputUser" placeholder="Correo electronico">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword">Contraseña</label>
                        <input type="password" class="form-control" id="inputPassword" placeholder="Contraseña">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputAddress2">Fecha</label>
                        <input type="date" class="form-control col-12" id="fecha">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-2">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
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