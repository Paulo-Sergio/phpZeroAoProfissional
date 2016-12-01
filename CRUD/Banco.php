<?php

class Banco {

    private $pdo;
    private $numRows;
    private $array;

    public function __construct($host, $dbname, $dbuser, $dbpass) {
        try {
            $dsn = "mysql:dbname=$dbname;host=$host;charset=utf8";
            $this->pdo = new PDO($dsn, $dbuser, $dbpass);
        } catch (PDOException $e) {
            echo "Falhou : " . $e->getMessage();
        }
    }

    public function query($sql) {
        $resultado = $this->pdo->query($sql);
        $this->numRows = $resultado->rowCount();
        $this->array = $resultado->fetchAll();
    }

    public function result() {
        return $this->array;
    }

    public function numRows() {
        return $this->numRows;
    }

    public function insert($table, $data) {
        if (!empty($table) && (is_array($data) && count($data) > 0)) {
            $sql = "INSERT INTO $table SET ";

            // INSERT INTO tabela SET nome = 'fulano', idade = 50;
            $dados = array();
            foreach ($data as $chave => $valor) {
                $dados[] = $chave . " = '" . addslashes($valor) . "'";
            }
            $sql = $sql . implode(", ", $dados);

            echo $sql;
            $this->pdo->query($sql);
        }
    }

    public function update($table, $data, $where, $whereCond = "AND") {
        if (!empty($table) && (is_array($data) && count($data) > 0) && is_array($where)) {
            $sql = "UPDATE $table SET ";
            $dados = array();
            foreach ($data as $chave => $valor) {
                $dados[] = $chave . " = '" . addslashes($valor) . "'";
            }
            $sql = $sql . implode(", ", $dados);

            if (count($where) > 0) {
                $dados = array();
                foreach ($where as $chave => $valor) {
                    $dados[] = $chave . " = '" . addslashes($valor) . "'";
                }
                $sql = $sql . " WHERE " . implode(" " . $whereCond . " ", $dados);
            }

            echo $sql;
            $this->pdo->query($sql);
        }
    }

    public function delete($table, $where, $whereCond = "AND") {
        if (!empty($table) && (is_array($where) && count($where) > 0)) {
            $sql = "DELETE FROM $table";
            $dados = array();
            foreach ($where as $chave => $valor) {
                $dados[] = $chave . " = '" . addslashes($valor) . "'";
            }
            $sql = $sql . " WHERE " . implode(" ".$whereCond." ", $dados);
            
            echo $sql;
            $this->pdo->query($sql);
        }
    }

}
