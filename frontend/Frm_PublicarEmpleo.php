<?php include('vistas/HeaderEmpresa.php') ?>

<div class="content mt-0 mb-5">
    <div class="card border-dark">
        <div class="card-header text-center">
            <h3 class="card-title">Publicar empleo</h3>
        </div>
        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Titulo</label>
                        <input type="email" class="form-control border-dark" id="inputEmail4">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Tipo de empleo</label>
                        <input type="email" class="form-control border-dark" id="inputEmail4">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="fas fa-pencil-alt prefix">Descripcion</label>
                    <textarea id="form8" class="md-textarea form-control border-dark"></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Salario</label>
                        <input type="num" class="form-control border-dark" id="inputAddress" placeholder=$ ......">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Ubicacion de trabajo</label>
                        <select id="inputState" class="form-control border-dark">
                            <option selected>Seleccione municipio</option>
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
                <div class="form-group">
                    <label for="inputAddress2">Fecha de publicacion</label>
                    <input type="date" class="form-control col-2 border-dark" id="inputAddress2" placeholder="Apartment, studio, or floor">
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Fecha de finalizacion</label>
                    <input type="date" class="form-control col-2 border-dark" id="inputAddress2" placeholder="Apartment, studio, or floor">
                </div>
                <div class="form-row">
                    <div class="form-group col-2">
                        <button type="submit" class="btn btn-primary border-dark">Guardar empleo</button>
                    </div>
                    <div class="form-group col-2">
                        <button type="submit" class="btn btn-primary border-dark">Editar empleo</button>
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