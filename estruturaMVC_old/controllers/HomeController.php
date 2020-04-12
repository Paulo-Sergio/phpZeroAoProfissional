<?php

class HomeController extends Controller {

    public function index() {
        $anuncio = new Anuncio();
        $usuario = new Usuario();

        $dados = array(
            'nome' => $usuario->getNome(),
            'idade' => $usuario->getIdade(),
            'anuncios' => $anuncio->getAllAnuncios(),
            'quantidade' => $anuncio->getQuantidade()
        );
        $this->loadTemplate('home', $dados);
    }

    public function sobre() {
        $dados = array();
        $this->loadTemplate('sobre', $dados);
    }

}
