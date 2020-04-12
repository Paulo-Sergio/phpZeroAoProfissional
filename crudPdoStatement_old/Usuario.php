<?php

class Usuario {

    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:dbname=blog;host=localhost;charset=utf8", "root", "");
        } catch (PDOException $e) {
            echo "Falou: " . $e->getMessage();
        }
    }

    public function buscarPorId($id) {
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->bindParam(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $resultado = $sql->fetch();
        }

        return $resultado;
    }

    public function inserir($nome, $email, $senha) {
        $sql = $this->pdo->prepare("INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha");
        $sql->bindParam(":nome", $nome);
        $sql->bindParam(":email", $email);
        $senhaCript = md5($senha);
        $sql->bindParam(":senha", $senhaCript);
        $sql->execute();
    }

    public function update($nome, $email, $senha, $id) {
        $sql = $this->pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, "
                . "senha = :senha WHERE id = :id");
        $sql->bindParam(":nome", $nome);
        $sql->bindParam(":email", $email);
        $senhaCript = md5($senha);
        $sql->bindParam(":senha", $senhaCript);
        $sql->bindParam(":id", $id);
        $sql->execute();
    }
    
    public function remover($id) {
        $sql = $this->pdo->prepare("DELETE FROM usuarios WHERE id = :id");
        $sql->bindParam(":id", $id);
        $sql->execute();
    }

}
