<?php

$dsn = file_get_contents(__DIR__ . '\dsnPDO.config.txt');

try {
    $obd = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_EMULATE_PREPARES => false
    ];
    $mbd = new PDO($dsn, 'root', null, $obd);
} catch (PDOException $e) {
    die("Error" . $e->getMessage());
}   

$bolState = true;

if ($bolState) {
    print_r($mbd);
}

function fntCrearTabla($mbd) {

    $sql = "DROP TABLE IF EXISTS tbl_personas;
    CREATE TABLE IF NOT EXISTS tbl_personas (
        id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
        documento VARCHAR(16) NOT NULL UNIQUE,
        nombres VARCHAR(50) NOT NULL,
        apellidos VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL
    );";
    // $mbd = $GLOBALS['mbd'];
    $mbd->exec($sql);
    var_dump($mbd);
}

fntCrearTabla($mbd);