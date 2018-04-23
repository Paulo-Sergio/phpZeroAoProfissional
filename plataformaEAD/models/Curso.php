<?php

class Curso extends Model {

    private $info;

    public function getCursosDoAluno($idAluno) {
        $sql = "SELECT ac.id_curso, c.nome, c.imagem, c.descricao "
                . "FROM cursos c "
                . "INNER JOIN aluno_cursos ac ON c.id = ac.id_curso "
                . "WHERE ac.id_aluno = :idAluno";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':idAluno', $idAluno);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $cursos = $stmt->fetchAll();
            return $cursos;
        }

        return null;
    }

    public function setCurso($id) {      
        $stmt = $this->db->prepare("SELECT * FROM cursos WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $this->info = $stmt->fetch();
        }
    }
    
    public function getNome() {
        return $this->info['nome'];
    }
    
    public function getImagem() {
        return $this->info['imagem'];
    }
    
    public function getDescricao() {
        return $this->info['descricao'];
    }

}
