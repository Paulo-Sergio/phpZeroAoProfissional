<?php

class Posts extends Model {

    public function inserirPost($msg) {
        $id_usuario = $_SESSION['twlg'];
        $sql = "INSERT INTO posts (id_usuario, data_post, mensagem) VALUES "
                . "(:id, NOW(), :mensagem)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id_usuario);
        $stmt->bindValue(':mensagem', $msg);
        $stmt->execute();
    }

    public function getFeed($lista, $limit) {
        $feeds = array();
        if (count($lista) > 0) {
            $sql = "SELECT * FROM posts WHERE id_usuario IN (:lista) LIMIT :limit";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':lista', implode(',', $lista));
            $stmt->bindValue(':limite', $limit, PDO::PARAM_INT);
        }
        
        return $feeds;
    }

}
