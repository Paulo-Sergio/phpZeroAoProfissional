<?php

class Usuario {

    private $id;
    private $email;
    private $senha;
    private $nome;
    private $pdo;

    public function __construct($id = null) {
        try {
            $dsn = "mysql:dbname=blog;host=localhost;charset=utf8";
            $this->pdo = new PDO($dsn, "root", "");
        } catch (PDOException $e) {
            echo "Falhou: " . $e->getMessage();
        }

        if (!empty($id)) {
            $sql = "SELECT * FROM usuarios WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindParam(":id", $id);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $data = $sql->fetch();
                $this->id = $data['id'];
                $this->email = $data['email'];
                $this->senha = $data['senha'];
                $this->nome = $data['nome'];
            }
        }
    }

    public function salvar() {
        if (!empty($this->id)) {
            $sql = "UPDATE usuarios SET nome = :nome, email = :email, senha = :senha WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindParam(":nome", $this->nome);
            $sql->bindParam(":email", $this->email);
            $sql->bindParam(":senha", $this->senha);
            $sql->bindParam(":id", $this->id);
            $sql->execute();
        } else {
            $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindParam(":nome", $this->nome);
            $sql->bindParam(":email", $this->email);
            $sql->bindParam(":senha", $this->senha);
            $sql->execute();
        }
    }
    
    public function delete() {
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindParam(":id", $this->id);
        $sql->execute();
    }

    public function getId() {
        return $this->id;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setSenha($senha) {
        $this->senha = md5($senha);
    }

}
