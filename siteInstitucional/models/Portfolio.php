<?php

class Portfolio extends Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getTrabalhos($n = null) {
        $trabalhos = array();
        
        $sql = "SELECT * FROM portfolio ";
        if (!empty($n)) {
            $sql .= "LIMIT " . $n;
        }

        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $trabalhos = $sql->fetchAll();
        }
        
        return $trabalhos;
    }

}
