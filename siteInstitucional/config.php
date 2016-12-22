<?php

require './enviroment.php';

define('BASE_URL','http://localhost/phpZeroAoProfissional/siteInstitucional');

global $config;
$config = array();

if (ENVIROMENT == "development") {
    $config['dbname'] = 'galeria';
    $config['dbhost'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
} else {
    // $config para ambiente de produção
    $config['dbname'] = 'galeria';
    $config['dbhost'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
}