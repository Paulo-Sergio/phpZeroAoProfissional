<?php

class HomeController extends Controller {

    public function index() {
        $dados = array();

        $fotos = new Fotos();

        if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {
            $titulo = addslashes($_POST['titulo']);
            $fotos->saveFotos($titulo);
        }


        $dados['fotos'] = $fotos->getFotos();

        $this->loadTemplate('home', $dados);
    }

}
