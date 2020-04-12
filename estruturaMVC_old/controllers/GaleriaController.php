<?php

class GaleriaController extends Controller {

    public function index() {
        $dados = array(
            'quantidade' => 129
        );
        
        $this->loadTemplate('galeria', $dados);
    }

    public function abrir($id) {
        echo "Abrindo galeria: " . $id;
    }

}
