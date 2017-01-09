<?php

class Alunos extends Model {

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

}
