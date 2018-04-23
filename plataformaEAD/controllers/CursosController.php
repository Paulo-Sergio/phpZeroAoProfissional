<?php

class CursosController extends Controller {

    public function __construct() {
        parent::__construct();
        $aluno = new Aluno();

        if (!$aluno->isLogged()) {
            header("Location: " . BASE_URL . "/login");
        }
    }

    public function index() {
        header("Location: " . BASE_URL);
    }

    public function entrar($id) {
        $dados = array(
            'info' => array(),
            'curso' => array(),
            'aulas' => array()
        );
        $aluno = new Aluno();
        $aluno->setAluno($_SESSION['lgaluno']);
        $dados['info'] = $aluno;

        if ($aluno->isInscrito($id)) {
            $curso = new Curso();
            $curso->setCurso($id);
            $dados['curso'] = $curso;
            
            $this->loadTemplate('curso_entrar', $dados);
        } else {
            header("Location: " . BASE_URL);
        }

    }
}
