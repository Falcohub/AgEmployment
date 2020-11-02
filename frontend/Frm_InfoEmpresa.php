<?php include('vistas/HeaderEmpresa.php') ?>

<div class="content mt-0 mb-5">
    <div class="shadow p-3 mb-5 bg-white rounded">
        <h3 class="card-title text-center">Perfil empresa</h3>
        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputNIT">NIT</label>
                        <input type="text" class="form-control" id="inputNIT" placeholder="Ingrese el NIT...">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmpresa">Nombre empresa</label>
                        <input type="text" class="form-control" id="inputEmpresa" placeholder="Nombre empresa">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputContacto">Contacto</label>
                        <input type="text" class="form-control" id="inputContacto" placeholder="Numero de telefono">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCorreo">Correo</label>
                        <input type="email" class="form-control" id="inputCorreo" placeholder="empresa@mail.com">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputDpto">Departamento</label>
                        <input type="text" class="form-control" id="inputDpto" placeholder="Seleccione departamento...">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="SelectMunicipio">Municipio</label>
                        <select id="inputMunicipio" class="form-control">
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
                    <input type="text" class="form-control" id="inputDireccion" placeholder="Calle 0 # 0 - 0">
                </div>
                <div class="form-row">
                    <div class="form-group col-2">
                        <button type="submit" class="btn btn-primary w-75">Guardar</button>
                    </div>
                    <div class="form-group col-2">
                        <button type="submit" class="btn btn-primary w-75">Actualizar</button>
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