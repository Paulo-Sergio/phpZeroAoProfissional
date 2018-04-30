<?php

class ProdutoController extends Controller {

    public function index() {
    }

    public function abrir($id) {
        $dados = array();
        
        $a = new Anuncios();
        $u = new Usuarios();

        if (empty($id)) {
            header("Location: " . BASE_URL);
            exit;
        }

        $dados['info'] = $a->getAnuncio($id);;

        $this->loadTemplate('produto', $dados);
    }

}
