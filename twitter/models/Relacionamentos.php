<?php

class Relacionamentos extends Model {
    
    public function seguir($id_seguidor, $id_seguido) {
        $sql = $this->db->prepare("INSERT INTO relacionamentos "
                . "(id_seguidor, id_seguido) VALUES (:seguidor, :seguido)");
        $sql->bindValue(':seguidor', $id_seguidor);
        $sql->bindValue(':seguido', $id_seguido);
        $sql->execute();
    }
    
    public function deseguir($id_seguidor, $id_seguido) {
        $sql = $this->db->prepare("DELETE FROM relacionamentos "
                . "WHERE id_seguidor = :seguidor AND id_seguido = :seguido");
        $sql->bindValue(':seguidor', $id_seguidor);
        $sql->bindValue(':seguido', $id_seguido);
        $sql->execute();
    }
    
}
