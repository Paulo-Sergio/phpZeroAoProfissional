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
            $lista = implode(', ', $lista);
            $sql = "SELECT *, u.nome FROM posts p INNER JOIN usuarios u "
                    . "ON p.id_usuario = u.id WHERE p.id_usuario IN (".$lista.") "
                    . "ORDER BY p.data_post DESC LIMIT :limit";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $feeds = $stmt->fetchAll();
            }
        }

        return $feeds;
    }

}
