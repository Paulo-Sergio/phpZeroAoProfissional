<?php

class Usuarios extends Model {

    private $uid;

    public function __construct($id = '') {
        parent::__construct();
        if (!empty($id)) {
            $this->uid = $id;
        }
    }

    public function getNome() {
        if ($this->uid) {
            $sql = $this->db->prepare('SELECT * FROM usuarios WHERE id = :id');
            $sql->bindParam(':id', $this->uid);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $sql = $sql->fetch();
                return $sql['nome'];
            }
        }
        return null;
    }

    public function isLogged() {
        if (isset($_SESSION['twlg']) && !empty($_SESSION['twlg'])) {
            return true;
        } else {
            return false;
        }
    }

    public function usuarioExiste($email) {
        $sql = $this->db->prepare("SELECT * FROM usuarios WHERE email = :email");
        $sql->bindParam(':email', $email);
        $sql->execute();

        return $sql->rowCount() > 0;
    }

    public function inserirUsuario($nome, $email, $senha) {
        $sql = $this->db->prepare("INSERT INTO usuarios (nome, email, senha) "
                . "values(:nome, :email, :senha)");
        $sql->bindParam(':nome', $nome);
        $sql->bindParam(':email', $email);
        $sql->bindParam(':senha', $senha);
        $sql->execute();

        $id = $this->db->lastInsertId();
        return $id;
    }

    public function fazerLogin($email, $senha) {
        $sql = $this->db->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
        $sql->bindParam(':email', $email);
        $sql->bindParam(':senha', $senha);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            $_SESSION['twlg'] = $sql['id'];
            return true;
        } else {
            return false;
        }
    }

    public function countSeguidos() {
        $sql = $this->db->prepare("SELECT * FROM relacionamentos WHERE id_seguidor = :id");
        $sql->bindParam(':id', $this->uid);
        $sql->execute();

        return $sql->rowCount();
    }

    public function countSeguidores() {
        $sql = $this->db->prepare("SELECT * FROM relacionamentos WHERE id_seguido = :id");
        $sql->bindParam(':id', $this->uid);
        $sql->execute();

        return $sql->rowCount();
    }

    public function getUsuarios($limite) {
        $usuarios = array();
        
        $sql = $this->db->prepare("SELECT * FROM usuarios WHERE id != :id LIMIT :limite");
        $sql->bindValue(':id', $this->uid);
        $sql->bindValue(':limite', $limite, PDO::PARAM_INT);
        $sql->execute();
        
        //var_dump($sql);        exit();
        if ($sql->rowCount() > 0) {
            $usuarios = $sql->fetchAll();
        }
        
        return $usuarios;
    }

}
