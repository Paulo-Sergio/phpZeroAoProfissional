<?php

class LoginController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $dados = array();

        // quando Aluno clicar em 'Entrar'
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $email = addslashes($_POST['email']);
            $senha = md5($_POST['senha']);

            $aluno = new Alunos();
            if ($aluno->fazerLogin($email, $senha)) {
                header("Location: " . BASE_URL);
            }
        }

        $this->loadView("login", $dados);
    }

    public function logout() {
        unset($_SESSION['lgaluno']);
        session_destroy();
        header("Location: " . BASE_URL);
    }

}
