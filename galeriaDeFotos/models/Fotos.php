<?php

class Fotos extends Model {

    public function saveFotos($titulo) {
        print_r($_FILES);
        if (isset($_FILES['arquivo']) && !empty($_FILES['arquivo']['tmp_name'])) {
            $permitidos = array('image/jpeg', 'image/jpg', 'image/png');
            if (in_array($_FILES['arquivo']['type'], $permitidos)) {
                // gerando md5 para ser o nome do meu arquivo no banco
                $nome = md5(time() . rand(0, 999)) . '.jpg';

                // pegando img da pasta temporaria e colocando no destino certo
                $destination = 'assets/images/galeria/' . $nome;
                move_uploaded_file($_FILES['arquivo']['tmp_name'], $destination);
                
                // salvando no banco de dados
                $sql = "INSERT INTO fotos (titulo, url) VALUES (:titulo, :url)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue(':titulo', $titulo);
                $stmt->bindValue(':url', $nome);
                $stmt->execute();
            }
        }
    }

    public function getFotos() {
        $fotos = array();
        $stmt = $this->db->prepare("SELECT * FROM fotos ORDER BY id DESC");
        $stmt->execute();

        if ($stmt->rowCount() > 0) {

            $fotos = $stmt->fetchAll();
        }
        return $fotos;
    }

}
