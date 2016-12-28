<?php

class Relacionamentos extends Model {
    
    public function seguir($id_seguidor, $id_seguido) {
        $sql = "INSERT INTO relacionamentos "
                . "(id_seguidor, id_seguido) VALUES (:seguidor, :seguido)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':seguidor', $id_seguidor);
        $stmt->bindValue(':seguido', $id_seguido);
        $stmt->execute();
    }
    
    public function deseguir($id_seguidor, $id_seguido) {
        $sql = "DELETE FROM relacionamentos "
                . "WHERE id_seguidor = :seguidor AND id_seguido = :seguido";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':seguidor', $id_seguidor);
        $stmt->bindValue(':seguido', $id_seguido);
        $stmt->execute();
    }
    
}
