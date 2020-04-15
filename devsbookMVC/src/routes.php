<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->get('/login', 'LoginController@signin');
$router->post('/login', 'LoginController@signinAction');

$router->get('/cadastro', 'LoginController@signup');
$router->post('/cadastro', 'LoginController@signupAction');

$router->get('/pesquisa', 'LoginController@signup');
$router->get('/perfil', 'LoginController@signup');
$router->get('/amigos', 'LoginController@signup');
$router->get('/fotos', 'LoginController@signup');
$router->get('/config', 'LoginController@signup');
$router->get('/sair', 'LoginController@signup');