<?php

require './enviroment.php';

define('BASE_URL', "http://localhost/phpZeroAoProfissional/twitter");

global $config;
$config = array();

if (ENVIROMENT == "development") {
    $config['dbname'] = 'twitter';
    $config['dbhost'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
} else {
    // $config para ambiente de produção
    $config['dbname'] = 'twitter';
    $config['dbhost'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
}