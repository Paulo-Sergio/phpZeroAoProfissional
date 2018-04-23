<?php

class HomeController extends Controller {

    public function __construct() {
        parent::__construct();

        $aluno = new Aluno();
        if (!$aluno->isLogged()) {
            header("Location: " . BASE_URL . "/login");
        }
    }

    public function index() {
        $dados = array(
            'info' => array(),
            'cursos' => array()
        );

        $aluno = new Aluno();
        $aluno->setAluno($_SESSION['lgaluno']);
        $dados['info'] = $aluno;
        
        $curso = new Curso();
        $dados['cursos'] = $curso->getCursosDoAluno($aluno->getId());
        

        $this->loadTemplate('home', $dados);
    }

}
