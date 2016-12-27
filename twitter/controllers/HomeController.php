<?php

class HomeController extends Controller {

    public function __construct() {
        parent::__construct();

        $u = new Usuarios();
        if (!$u->isLogged()) {
            header("Location: " . BASE_URL . "/login");
        }
    }

    public function index() {
        $dados = array(
            'nome' => ''
        );

        $u = new Usuarios($_SESSION['twlg']);
        $dados['nome'] = $u->getNome();
        $dados['qtd_seguidos'] = $u->countSeguidos(); // qtd de pessoas que estou seguindo
        $dados['qtd_seguidores'] = $u->countSeguidores(); // qtd de pessoas que me seguem
        $dados['sugestao'] = $u->getUsuarios(5);

        $this->loadTemplate('home', $dados);
    }

}
