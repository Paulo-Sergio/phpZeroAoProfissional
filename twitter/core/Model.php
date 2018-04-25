<?php

class Model {
    
    // todos que 'extends Model' vão usar a variavel $db
    protected $db;

    public function __construct() {
        global $pdo;
        $this->db = $pdo;
    }
}
