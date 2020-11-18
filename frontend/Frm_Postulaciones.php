<?php include('vistas/HeaderEmpresa.php') ?>

<div class="content mt-0 mb-5">
    <div class="shadow p-3 mb-5 bg-white rounded">
        <h3 class="card-title text-center">Postulaciones</h3>
        <div class="card-body">
            <form>
            <?php
                $conexion=new PDO("mysql:host=localhost;dbname=db_agempleo1","root","");

                $busqueda=$conexion->query("Select * from tbl_postulaciones");
                /*Almacenamos el resultado de fetchAll en una variable*/
                $arrDatos=$busqueda->fetchAll(PDO::FETCH_ASSOC);

                ?>

                <table class="table">
                    <thead class="thead-dark">
                       <tr> 
                            <th class="bg-dark" scope="col">id</th>
                            <th class="bg-dark" scope="col">Id usuario</th>
                            <th class="bg-dark" scope="col">Id Empleo</th>
                            <th class="bg-dark" scope="col">Estado</th>
                            <th class="bg-dark" scope="col">Fecha</th>
                       </tr>
                    </thead>

                        <?php
                    
                /* var_dump($arrDatos);*/
                /*Recorremos todos los resultados, ya no hace falta invocar más a fetchAll como si fuera fetch...*/
                foreach ($arrDatos as $muestra) {
                    echo '<tr>';

                    echo '<td >' . $muestra['pos_pkid'] . '</td>';
                    echo '<td >' . $muestra['pos_fkUsuario'] . '</td>';
                    echo '<td >' . $muestra['pos_fkEmpleo'] . '</td>';
                    echo '<td >' . $muestra['pos_Estado'] . '</td>';
                    echo '<td >' . $muestra['pos_fecha'] . '</td>';
                }
                ?>

                </table>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
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