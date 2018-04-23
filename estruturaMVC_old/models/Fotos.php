<?php

class Fotos extends Model {

    public function getFotos() {
        $fotos = array();

        $sql = "SELECT * FROM fotos";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $fotos = $sql->fetchAll();
        }

        return $fotos;
    }

}
