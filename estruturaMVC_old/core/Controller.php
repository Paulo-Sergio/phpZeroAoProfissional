<?php

class Controller {

    public function loadView($viewName, $viewData = array()) {
        /** extract transformar as chaves do array em variaveis para acessar na view
         *  $viewData = array('nome' => 'Paulo', 'idade' => 25);
         *  $nome = paulo;
         *  $idade = 25;
         */
        extract($viewData);
        include './views/' . $viewName . '.php';
    }

    public function loadTemplate($viewName, $viewData = array()) {
        include './views/template.php';
    }

    public function loadViewInTemplate($viewName, $viewData = array()) {
        extract($viewData);
        include './views/' . $viewName . '.php';
    }

}
