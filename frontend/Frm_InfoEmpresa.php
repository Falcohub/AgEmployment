<?php include('vistas/HeaderEmpresa.php') ?>

<div class="content mt-0 mb-5">
    <div class="card border-dark">
        <div class="card-header text-center border-dark ">
            <h3 class="card-title">Perfil empresa</h3>
        </div>
        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">NIT</label>
                        <input type="email" class="form-control  border-dark" id="inputEmail4">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Nombre empresa</label>
                        <input type="text" class="form-control  border-dark" id="inputPassword4">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Contacto</label>
                        <input type="text" class="form-control  border-dark" id="inputAddress" placeholder="1234 Main St">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Correo</label>
                        <input type="text" class="form-control  border-dark" id="inputAddress" placeholder="1234 Main St">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Direccion</label>
                    <input type="text" class="form-control  border-dark" id="inputAddress2" placeholder="Apartment, studio, or floor">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">Departamento</label>
                        <input type="text" class="form-control  border-dark" id="inputCity">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Municipio</label>
                        <select id="inputState" class="form-control  border-dark">
                            <option selected>Selecione municipio...</option>
                            <option>Chigorodp</option>
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

                <button type="submit" class="btn btn-primary">Actualizar informacion</button>
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