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

        // select de todos os campos da tabela usuarios
        // um campo 'seguido' para saber se eu sou seguidor de outro usuario
        $sql = "SELECT u.*, (SELECT count(*) FROM relacionamentos r WHERE r.id_seguidor = :id AND r.id_seguido = u.id) as seguido "
                . "FROM usuarios u WHERE u.id != :id LIMIT :limite";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $this->uid);
        $stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
        $stmt->execute();

        //var_dump($sql);        exit();
        if ($stmt->rowCount() > 0) {
            $usuarios = $stmt->fetchAll();
        }

        return $usuarios;
    }

    public function buscaUsuarioPeloId($id) {
        $sql = $this->db->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $usuario = $sql->fetch();
        }
        return $usuario;
    }

    public function getSeguidos() {
        $sql = "SELECT id_seguido FROM relacionamentos WHERE id_seguidor = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $this->uid);
        $stmt->execute();

        $resultado = array();
        if ($stmt->rowCount() > 0) {
            foreach ($stmt->fetchAll() as $seguido) {
                $resultado[] = $seguido['id_seguido'];
            }
        }
        
        return $resultado;
    }

}
