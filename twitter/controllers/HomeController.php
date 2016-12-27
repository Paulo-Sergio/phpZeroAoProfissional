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

        $this->loadTemplate('home', $dados);
    }

}
