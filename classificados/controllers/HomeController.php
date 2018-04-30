<?php

class HomeController extends Controller {

    public function index() {
        $dados = array();

        $a = new Anuncios();
        $u = new Usuarios();
        $c = new Categorias();

        $filtros = array(
            'categoria' => '',
            'preco' => '',
            'estado' => ''
        );
        if (isset($_GET['filtros'])) {
            $filtros = $_GET['filtros'];
        }

        $totalAnuncios = $a->getTotalAnuncios($filtros);
        $totalUsuarios = $u->getTotalUsuarios();

        // paginacao
        $p = 1;
        if (isset($_GET['p']) && !empty($_GET['p'])) {
            $p = addslashes($_GET['p']);
        }
        $porPagina = 2;
        $totalPaginas = ceil($totalAnuncios / $porPagina);

        $anuncios = $a->getUltimosAnuncios($p, $porPagina, $filtros);
        $categorias = $c->getLista();
        
        $dados['totalAnuncios'] = $totalAnuncios;
        $dados['totalUsuarios'] = $totalUsuarios;
        $dados['categorias'] = $categorias;
        $dados['filtros'] = $filtros;
        $dados['anuncios'] = $anuncios;
        $dados['totalPaginas'] = $totalPaginas;
        $dados['p'] = $p;

        $this->loadTemplate('home', $dados);
    }

}
