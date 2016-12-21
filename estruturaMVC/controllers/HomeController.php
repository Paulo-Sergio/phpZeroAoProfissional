<?php

class HomeController extends Controller {

    public function index() {
        $fotos = new Fotos();

        // $dados['fotos'] = $fotos->getFotos();
        $dados = array(
            'fotos' => $fotos->getFotos()
        );
        $this->loadTemplate('home', $dados);
    }

    public function sobre() {
        $dados = array();
        $this->loadTemplate('sobre', $dados);
    }

}
