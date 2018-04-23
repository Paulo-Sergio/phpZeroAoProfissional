<?php

require './enviroment.php';

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