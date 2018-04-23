<?php

class Anuncio extends Model {

    public function getQuantidade() {
        $sql = "SELECT COUNT(*) as c FROM anuncios";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0) {
            $sql = $sql->fetch();
        }

        return $sql['c'];
    }
    
    public function getAllAnuncios() {
        $sql = "SELECT * FROM anuncios";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $anuncios = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        return $anuncios;
    }

}
