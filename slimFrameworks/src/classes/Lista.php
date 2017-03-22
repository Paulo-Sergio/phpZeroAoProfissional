<?php

class Lista {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getLista() {
        $result = array();

        $stmt = $this->db->prepare("SELECT * FROM lista");
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetchAll();
        }
        return $result;
    }

    public function add($data) {
        $sql = "INSERT INTO lista (nome, telefone) values (:nome, :telefone)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":nome", $data['nome']);
        $stmt->bindValue(":telefone", $data['telefone']);
        $stmt->execute();
    }

    public function getContato($id) {
        $result = array();
        
        $sql = "SELECT * FROM lista WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch();
        }
        return $result;
    }
    
    public function update($data, $id) {
        $sql = "UPDATE lista SET nome = :nome, telefone = :telefone WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nome', $data['nome']);
        $stmt->bindValue(':telefone', $data['telefone']);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
    
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM lista WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

}
