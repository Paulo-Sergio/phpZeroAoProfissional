<?php

class HomeController extends Controller {
    
    public function index() {
        $usuario = new Usuario();
        $usuario->setName("Paulo Sergio");
        
        $dados = array(
            'name' => $usuario->getName()
        );
        $this->loadTemplate('home', $dados);
    }
    
    public function sobre() {
        $dados = array();
        $this->loadTemplate('sobre', $dados);
    }
    
}
