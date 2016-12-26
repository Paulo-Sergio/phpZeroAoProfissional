<?php

class LoginController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $dados = array();

        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $email = addslashes($_POST['email']);
            $senha = md5($_POST['senha']);

            $u = new Usuarios();
            if ($u->fazerLogin($email, $senha)) {
                header("Location: " . BASE_URL . "/");
            }
        }
        $this->loadView('login', $dados);
    }

    public function cadastro() {
        $dados = array();

        // rebendo parametros submit do cadastro
        if (isset($_POST['nome']) && !empty($_POST['nome'])) {
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $senha = md5($_POST['senha']);

            if (!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
                $u = new Usuarios();
                if (!$u->usuarioExiste($_POST['email'])) {
                    $_SESSION['twlg'] = $u->inserirUsuario($nome, $email, $senha);
                    header("Location: " . BASE_URL . "/");
                } else {
                    $dados['aviso'] = "Esse usuário já existe!";
                }
            } else {
                $dados['aviso'] = "Preencha todos os campos!";
            }
        }

        $this->loadView('cadastro', $dados);
    }

    public function logout() {
        unset($_SESSION['twlg']);
        header("Location: " . BASE_URL . "/login");
    }

}
