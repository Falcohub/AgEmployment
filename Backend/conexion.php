<?php

    class connection{
        private $conn;

        public function __construct(){
            $this->conn = new mysqli("localhost", "root", "", "db_agempleo");
        }

        public function get_connection(){
            return $this->conn;
        }
    }

    /*$conexion = mysqli_connect("localhost", "root", "", "db_agempleo");

    if($conexion){
        echo 'conexion correcta';
    }else{
        echo 'conexcion incorrecta';
    }*/

?>