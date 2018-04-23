<?php

require './enviroment.php';

$config = array();

if (ENVIROMENT == "development") {
    define('BASE_URL', 'http://localhost/phpZeroAoProfissional/galeriaDeFotos');
    $config['dbname'] = 'galeria';
    $config['dbhost'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
} else {
    // $config para ambiente de produção
    define("BASE_URL", "http://paulofrancaweb.com.br");
    $config['dbname'] = 'galeria';
    $config['dbhost'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
}

global $pdo;
try{
    $pdo = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['dbhost'].";charset=utf8",
        $config['dbuser'], $config['dbpass']);
} catch (PDOException $e) {
    echo "ERROR: " . $e->getMessage();
    exit;
}