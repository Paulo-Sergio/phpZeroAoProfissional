<?php

class Cursos extends Model {

    public function getCursosDoAluno($id) {
        $sql = "SELECT ac.id_curso, c.nome, c.imagem, c.descricao "
                . "FROM aluno_curso ac "
                . "INNER JOIN cursos c ON ac.id_curso = c.id "
                . "WHERE ac.id_aluno = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $cursos = $stmt->fetchAll();
            return $cursos;
        }

        return null;
    }

}
