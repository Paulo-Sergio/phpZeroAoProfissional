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

        $p = new Posts();
        $u = new Usuarios($_SESSION['twlg']);
        $dados['nome'] = $u->getNome();
        $dados['qtd_seguidos'] = $u->countSeguidos(); // qtd de pessoas que estou seguindo
        $dados['qtd_seguidores'] = $u->countSeguidores(); // qtd de pessoas que me seguem
        $dados['sugestao'] = $u->getUsuarios(5);
        
        $listaSeguidos = $u->getSeguidos();
        $listaSeguidos[] = $_SESSION['twlg']; // adicionando eu mesmo na lista
        $dados['feed'] = $p->getFeed($listaSeguidos, 10);

        $this->loadTemplate('home', $dados);
    }

    public function postagem() {
        if (isset($_POST['msg']) && !empty($_POST['msg'])) {
            $msg = addslashes($_POST['msg']);
            $p = new Posts();
            $p->inserirPost($msg);
        }
        
        header("Location: " . BASE_URL . "/");
    }

    public function seguir($id) {
        if (!empty($id)) {
            $id = addslashes($id);
            $u = new Usuarios();
            if ($u->buscaUsuarioPeloId($id) != null) {
                $r = new Relacionamentos();
                $r->seguir($_SESSION['twlg'], $id);
            }
        }

        header("Location: " . BASE_URL . "/");
    }

    public function deseguir($id) {
        if (!empty($id)) {
            $id = addslashes($id);
            $u = new Usuarios($id);
            if ($u->buscaUsuarioPeloId($id) != null) {
                $r = new Relacionamentos();
                $r->deseguir($_SESSION['twlg'], $id);
            }
        }

        header("Location: " . BASE_URL . "/");
    }

}
