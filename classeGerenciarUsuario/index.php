<?php

require './Usuario.class.php';

//CRIANDO USUARIO E SALVANDO
//salvar();

function salvar() {
    $u = new Usuario();
    $u->setNome("teste de nome ééé");
    $u->setEmail("teste@hotmail.com");
    $u->setSenha("123456");
    $u->salvar();
    echo "Usuário salvo com sucesso";
}

//ATUALIZANDO USUARIO
//atualizar();

function atualizar() {
    $usu = new Usuario(12);
    $usu->setNome("Kuki");
    $usu->setEmail("kuki@nautico.com.br");
    $usu->salvar();
    echo "Usuário atualizado com sucesso";
}

//DELETANDO USUARIO
deletar();

function deletar() {
    $usu = new Usuario(11);
    $usu->delete();
    echo "Usuário deletado com sucesso";
}
