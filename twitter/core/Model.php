<?php

class Model {
    
    // todos que 'extends Model' vão usar a variavel $db
    protected $db;

    public function __construct() {
        global $config;
        try{
            $this->db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['dbhost'].";charset=utf8",
                $config['dbuser'], $config['dbpass']);
        } catch (PDOException $e) {
            echo "Falou: " . $e->getMessage();
        }
        
    }
}
