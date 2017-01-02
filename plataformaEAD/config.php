<?php

require './enviroment.php';

define('BASE_URL', 'http://localhost/phpZeroAoProfissional/plataformaEAD/');

global $config;
$config = array();

if (ENVIROMENT == "development") {
    $config['dbname'] = 'ead';
    $config['dbhost'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
} else {
    // $config para ambiente de produção
    $config['dbname'] = 'ead';
    $config['dbhost'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
}