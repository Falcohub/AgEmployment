<?php 
    include_once '../backend/conexion.php';

    session_start();

    if (!isset($_SESSION['rol'])) {
        echo'<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=Frm_Login.php">';
        exit();
    } else {
        if ($_SESSION['rol'] == 'CC' || $_SESSION['rol'] == 'TI') {
            echo'<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=Frm_InfoEstudiante.php">';
            exit();
        }
    }

    //Establecer conexión
    $db = new Database();
    $conexion = $db->connect();
    
    include 'vistas/HeaderEmpresa.php';
?>

<div class="content mt-0 mb-5">
    <div class="shadow p-3 mb-5 bg-white rounded">
        <h3 class="card-title text-center">Postulaciones</h3>
        <div class="card-body">
            <form action="../backend/DescargarCV.php    " method="POST" enctype="multipart/form-data">
            <?php

                /*if (isset($_SESSION['idRegistroEmp'])) {

                    $idRegistro = $_SESSION['idRegistroEmp'];

                    $postulaciones=$conexion->query("SELECT tp.pos_fkUsuario, tu.user_nombres, tu.user_apellidos, tu.user_contacto, tu.user_correo, te.emp_titulo FROM tbl_postulaciones AS tp INNER JOIN tbl_empleos AS te ON tp.pos_fkEmpleo = te.emp_pkid INNER JOIN tbl_usuarios AS tu ON tp.pos_fkUsuario = tu.user_pkid WHERE te.emp_fkUsuario = '$idRegistro'");
                    //Almacenamos el resultado de fetchAll en una variable
                 $arrDatos=$postulaciones->fetchAll(PDO::FETCH_ASSOC);

                }else*/ 
                if (isset($_SESSION['idLogin'])) {

                    $idLogin = $_SESSION['idLogin']; 

                    $postulaciones=$conexion->query("SELECT tp.pos_fkUsuario, tu.user_nombres, tu.user_apellidos, tu.user_contacto, tu.user_correo, te.emp_titulo, tu.user_cv FROM tbl_postulaciones AS tp INNER JOIN tbl_empleos AS te ON tp.pos_fkEmpleo = te.emp_pkid INNER JOIN tbl_usuarios AS tu ON tp.pos_fkUsuario = tu.user_pkid WHERE te.emp_fkUsuario = '$idLogin'");
                    
                    /*Almacenamos el resultado de fetchAll en una variable*/
                    $arrDatos=$postulaciones->fetchAll(PDO::FETCH_ASSOC);
                }
            ?>

                <table class="table">
                    <thead class="thead-dark">
                       <tr> 
                            <th class="bg-dark" scope="col">Documento</th>
                            <th class="bg-dark" scope="col">Estudiante</th>
                            <th class="bg-dark" scope="col">Contacto</th>
                            <th class="bg-dark" scope="col">Correo</th>
                            <th class="bg-dark" scope="col">Empleo</th>
                            <th class="bg-dark" scope="col">Ruta CV</th>
                            <th class="bg-dark" scope="col">Hoja de vida</th>
                       </tr>
                    </thead>

                    <?php
                
                    /* var_dump($arrDatos);*/
                    /*Recorremos todos los resultados, ya no hace falta invocar más a fetchAll como si fuera fetch...*/
                    foreach ($arrDatos as $muestra) {
                        echo '<tr>';

                        echo '<td >' . $muestra['pos_fkUsuario'] . '</td>';
                        echo '<td >' . $muestra['user_nombres'] . ' '.$muestra['user_apellidos'].'</td>';
                        //echo '<td >' . $muestra['user_apellidos'] . '</td>';
                        echo '<td >' . $muestra['user_contacto'] . '</td>';
                        echo '<td >' . $muestra['user_correo'] . '</td>';
                        echo '<td >' . $muestra['emp_titulo'] . '</td>';
                        echo '<td >' . $muestra['user_cv'] . '</td>';
                        echo '<td >' . '<a href="'.$muestra['user_cv'].'" download="Curriculum.pdf">Descargar</a>' . '</td>';
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