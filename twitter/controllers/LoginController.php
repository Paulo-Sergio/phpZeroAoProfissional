<?php

class LoginController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $dados = array();

        $this->loadView('login', $dados);
    }

    public function cadastro() {
        $dados = array();

        if (isset($_POST['nome']) && !empty($_POST)) {
            
        }

        $this->loadView('cadastro', $dados);
    }

}
