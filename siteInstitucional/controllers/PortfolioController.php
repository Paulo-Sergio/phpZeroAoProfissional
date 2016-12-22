<?php

class PortfolioController extends Controller {

    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $dados = array();
        
        $portfolio = new Portfolio();
        $dados['portfolio'] = $portfolio->getTrabalhos();
        
        $this->loadTemplate('portfolio', $dados);
    }

}
