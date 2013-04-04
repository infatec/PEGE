<?php
/**
 * Classe operadora da tabela 'aluno'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-02-24 18:10
 */
class AlunoExtDAO extends AlunoDAO{

	public function salvaAluno(){

    }
    public function getAlunosByDisciplina($turma_disciplina_id){

        $sql="SELECT m.id AS matricula_id,a.nome,a.id AS aluno_id,m.matricula FROM aluno a INNER JOIN
                matricula m ON a.id = m.aluno_id INNER JOIN
                turma t ON t.id = m.turma_id INNER JOIN
                turma_disciplina td ON td.turma_id = t.id
                WHERE td.id=? ORDER BY a.nome";

        $query = new SqlQuery($sql);
        $query->setNumber($turma_disciplina_id);
        $rs = $this->execute($query);

        return $rs;

    }

    public function getAlunosByTurma($turma_id){

        $sql="SELECT DISTINCT m.id AS matricula_id,a.nome,a.id AS aluno_id,m.matricula FROM aluno a INNER JOIN
                matricula m ON a.id = m.aluno_id INNER JOIN
                turma t ON t.id = m.turma_id INNER JOIN
                turma_disciplina td ON td.turma_id = t.id
                WHERE t.id=? ORDER BY a.nome ";

        $query = new SqlQuery($sql);
        $query->setNumber($turma_id);
        $rs = $this->execute($query);

        return $rs;

    }

    public function getAlunosFiltro($criterio){
        $sql ="select *,(YEAR(CURDATE())-YEAR(data_nascimento)) - (RIGHT(CURDATE(),5)<RIGHT(data_nascimento,5)) as idade
         from aluno where 1=1 ".$criterio." ORDER BY nome ASC LIMIT 500";

        $query = new SqlQuery($sql);
        $rs = $this->execute($query);

        return $rs;

    }

    public function getAlunosIdadeNaoMatriculados($filtro){
        $sql ="SELECT id,nome,(YEAR(CURDATE())-YEAR(data_nascimento)) - (RIGHT(CURDATE(),5)<RIGHT(data_nascimento,5)) AS idade,data_nascimento
         FROM aluno WHERE id not in (select m.aluno_id from matricula m inner join turma t on m.turma_id=t.id where t.ano_letivo_id = ".$filtro["ano_letivo_id"].")
         AND (YEAR(CURDATE())-YEAR(data_nascimento)) - (RIGHT(CURDATE(),5)<RIGHT(data_nascimento,5))=".$filtro["idade"]." LIMIT ".$filtro["limit"]."";

        $query = new SqlQuery($sql);
        $rs = $this->execute($query);

        return $rs;
    }

}
?>