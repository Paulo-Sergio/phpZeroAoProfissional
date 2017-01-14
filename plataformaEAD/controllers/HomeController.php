<?php

class HomeController extends Controller {

    public function __construct() {
        parent::__construct();

        $aluno = new Alunos();
        if (!$aluno->islogged()) {
            header("Location: " . BASE_URL . "login");
        }
    }

    public function index() {
        $dados = array(
            'info' => array(),
            'cursos' => array()
        );

        $aluno = new Alunos();
        $aluno->setAluno($_SESSION['lgaluno']);
        $dados['info'] = $aluno;
        
        $curso = new Cursos();
        $dados['cursos'] = $curso->getCursosDoAluno($aluno->getId());
        

        $this->loadTemplate('home', $dados);
    }

}
