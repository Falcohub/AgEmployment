<?php include('vistas/HeaderEmpresa.php') ?>

<div class="content mt-0 mb-5">
    <div class="shadow p-3 mb-5 bg-white rounded">
        <h3 class="card-title text-center">Publicar empleo</h3>
        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputTitulo">Titulo</label>
                        <input type="text" class="form-control" id="inputTitulo" placeholder="Nombre del empleo...">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputTipo">Tipo de empleo</label>
                        <input type="text" class="form-control" id="inputTipo" placeholder="Practica">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputDescripcion">Descripcion</label>
                        <textarea id="inputDescripcion" class="md-textarea form-control"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputSalario">Salario</label>
                        <input type="text" class="form-control" id="inputSalario" placeholder="$">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Municipio">Ubicacion de trabajo</label>
                        <select id="cbxMunicipio" class="form-control">
                            <option selected>Seleccione municipio...</option>
                            <option>Mutatá</option>
                            <option>Chigorodo</option>
                            <option>Carepa</option>
                            <option>Apartado</option>
                            <option>Turbo</option>
                            <option>Necocli</option>
                            <option>Arboletes</option>
                            <option>Medellin</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputFechaPubli">Fecha de publicacion</label>
                    <input type="date" class="form-control col-3" id="inputFechaPubli">
                </div>
                <div class="form-group">
                    <label for="inputFechaFin">Fecha de finalizacion</label>
                    <input type="date" class="form-control col-3" id="inputFechaFin">
                </div>
                <div class="form-row">
                    <div class="form-group col-2">
                        <button type="submit" class="btn btn-primary w-75">Guardar</button>
                    </div>
                    <div class="form-group col-2">
                        <button type="submit" class="btn btn-primary w-75">Editar</button>
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