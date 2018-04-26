<?php

class Usuario extends Model {

    public function setNome($name) {
        $this->name = $name;
    }

    public function getNome() {
        return 'Paulo';
    }

    public function getIdade() {
        return 26;
    }

}
