<?php

define("ARY_BD", json_decode(file_get_contents(__DIR__ . '\dsnPDO.config.json'), true));

function conectarBD() {
    try {
        $dsn = 'mysql:host=' . ARY_BD['host'] . ';port=' . ARY_BD['port'] . ';dbname=' . ARY_BD['dbname'] . ';charset=' . ARY_BD['charset'];
        // var_dump(ARY_BD['options']); exit;
        $mbd = new PDO($dsn, ARY_BD['user'], ARY_BD['password'], ARY_BD['options']);
        var_dump($mbd);
        return $mbd;
    } catch (PDOException $e) {
        die("Error" . $e->getMessage());
    }
}

$mbd = conectarBD();

$sql = "SELECT * FROM tbl_personas";
$query = $mbd->query($sql)->fetchAll(PDO::FETCH_ASSOC);
var_dump($query);