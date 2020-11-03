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
};