<?php
require './Usuario.php';

$u = new Usuario();

//SELECT
$res = $u->buscarPorId(1);
var_dump($res);

//INSERT
//$u->inserir("Bellynha", "bellynha_18@hotmail.com", "123");

//UPDATE
//$u->update("Bellynha 2", "bellynha_18@hotmail.com", "123", 10);

//REMOVER
//$u->remover(2);