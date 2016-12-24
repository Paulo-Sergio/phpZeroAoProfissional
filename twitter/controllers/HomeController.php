<?php

class HomeController extends Controller {

    public function __construct() {
        parent::__construct();

        $u = new Usuarios();
        // se não estiver logado redireciona para o controller de login
        if (!$u->isLogged()) {
            header("Location: " . BASE_URL . "/login");
        }
    }

    public function index() {
        $dados = array();

        $this->loadTemplate('home', $dados);
    }

}
