<?php

class Alunos extends Model {

    private $info;

    public function isLogged() {
        if (isset($_SESSION['lgaluno']) && !empty($_SESSION['lgaluno'])) {
            return true;
        }
        return false;
    }

    public function fazerLogin($email, $senha) {
        $sql = "SELECT * FROM alunos WHERE email = :email AND senha = :senha";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', $senha);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch();

            $_SESSION['lgaluno'] = $row['id'];
            return true;
        }
        return false;
    }

    public function setAluno($id) {
        $sql = "SELECT * FROM alunos WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $this->info = $stmt->fetch();
        }
    }

    public function getNome() {
        return $this->info['nome'];
    }
    
    public function getId() {
        return $this->info['id'];
    }

}