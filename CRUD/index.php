<?php

require './Banco.php';

//select();
//insert();
//update();
delete();

function delete() {
    $banco = new Banco("localhost", "blog", "root", "");
    $banco->delete("posts", 
            array("id" => "15"));
    echo "<br>Registro excluido";
}

function update() {
    $banco = new Banco("localhost", "blog", "root", "");
    $banco->update("posts", 
            array("titulo" => "TÍTULO TESTE"), 
            array("id" => "1"));
    
    echo "<br>Atualizado com sucesso";
}

function insert() {
    $banco = new Banco("localhost", "blog", "root", "");
    $banco->insert("posts", array(
        "titulo" => "Titulo de teste",
        "corpo" => "corpo de teste"
    ));

    echo "<br>Inserido com sucesso!";
}

function select() {
    $banco = new Banco("localhost", "blog", "root", "");
    $banco->query("SELECT * FROM posts");

    if ($banco->numRows() > 0) {
        foreach ($banco->result() as $post) {
            echo "Titulo {$post['titulo']}<br>";
            echo "Titulo {$post['corpo']}<br>";
            echo "<hr>";
        }
        echo "Quantidade de Posts: " . $banco->numRows();
    } else {
        echo "Não houve resultados";
    }
}
