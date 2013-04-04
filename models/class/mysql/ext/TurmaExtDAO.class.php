<?php
/**
 * Classe operadora da tabela 'turma'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-02-21 21:41
 */
class TurmaExtDAO extends TurmaDAO{

	public function getTurmasByEscolaByAnoLetivo($escola_id,$ano_letivo_id){

        $sql= "SELECT
                    t.id AS turma_id,t.codigo AS codigo_turma,t.codigo,ne.nome AS nome_nivel_de_ensino, tur.nome AS nome_turno,s.nome
                     AS nome_sala,t.num_max_aluno,a.nome AS nome_ano,
                    (SELECT COUNT(id) FROM turma_disciplina WHERE turma_id = t.id) AS qtd_disciplinas
                FROM
                    turma t
                INNER JOIN
                    nivel_ensino_mec ne ON t.nivel_ensino_mec_id = ne.id
                INNER JOIN
                    turno tur ON tur.id = t.turno_id
                INNER JOIN
                    ano a ON a.id=t.ano_id
                INNER JOIN
                    sala s ON s.id = t.sala_id
                WHERE
                    t.escola_id = ? AND t.ano_letivo_id = ?
                ORDER BY
                    nome_nivel_de_ensino,nome_turno,nome_ano ASC";
        $query = new SqlQuery($sql);
        $query->setNumber($escola_id);
        $query->setNumber($ano_letivo_id);

        $rs = $this->execute($query);

        return $rs;

    }
    public function getDisciplinasTurma($escola_id,$turma_id){

        $sql = "SELECT
                    T.id,T.codigo,TD.turma_id,TD.horas_aula_semestre1,TD.horas_aula_semestre2,
                    D.nome,TD.id as turma_disciplina_id
                FROM
                    turma T
                INNER JOIN
                    turma_disciplina TD ON TD.turma_id=T.id
                INNER JOIN
                    disciplinas_mec D ON TD.disciplinas_mec_id = D.id
                WHERE T.escola_id=? AND T.id=?";

        $query = new SqlQuery($sql);
        $query->setNumber($escola_id);
        $query->setNumber($turma_id);

        $rs = $this->execute($query);

        return $rs;

    }
    public function getAulasDisciplina($turma_disciplina_id){
        $sql = "SELECT
                  a.id,a.data_aula,a.hora_inicio,a.hora_fim,a.qtd_aula,a.atividade
                FROM
                  turma_disciplina td
                INNER JOIN
                  aula a ON td.id = a.turma_disciplina_id
                WHERE td.id=? ORDER BY a.data_aula DESC";

        $query = new SqlQuery($sql);
        $query->setNumber($turma_disciplina_id);
        $rs = $this->execute($query);

        return $rs;
    }

    public function getDisciplinasByTurma($turma_id){
        $sql = "SELECT td.id as turma_disciplina_id,d.nome as nome_disciplina,s.nome as nome_professor,horas_aula_semestre1,
                horas_aula_semestre2,d.id as disciplina_mec_id,s.id as servidor_id,td.horas_aula_semestre1,td.horas_aula_semestre2,d.id as disciplina_med_id
                FROM turma_disciplina td INNER JOIN
                disciplinas_mec d ON d.id=td.disciplinas_mec_id INNER JOIN
                servidor s ON s.id = td.servidor_id WHERE td.turma_id=? ORDER BY nome_disciplina ASC ";

        $query = new SqlQuery($sql);
        $query->setNumber($turma_id);

        $rs_disciplinas = $this->execute($query);

        $disciplinas=array();
        $grade_horarios = array();
        foreach($rs_disciplinas as $disciplina){

            $horarios_disciplinas = DAOFactory::getTurmaDisciplinaHorarioDAO()->queryByTurmaDisciplinaId($disciplina["turma_disciplina_id"]);
            $horarios_hidden = array();
            foreach($horarios_disciplinas as $horario){
                //echo $horario->diasSemana;
                $grade_horarios[$horario->horarioId][$horario->diasSemana]["nome_disciplina"] = $disciplina["nome_disciplina"];
                $grade_horarios[$horario->horarioId][$horario->diasSemana]["disciplina_mec_id"] = $disciplina["disciplina_mec_id"];
                $horarios_hidden[] = $horario->horarioId."_".$horario->diasSemana;
            }

            $disciplinas[]=array(
                "disciplina"=>$disciplina,
                "horarios_disciplinas"=>$horarios_disciplinas,
                "horarios_hidden"=>$horarios_hidden
            );

        }
       // echo "<pre>";
       // print_r($grade_horarios);

        return array("disciplinas"=>$disciplinas,"grade_horario"=>$grade_horarios);
    }
    public function getAlunosMatriculados($turma_id){

        $sql ="SELECT a.*,m.matricula FROM aluno a INNER JOIN
                matricula m ON m.aluno_id=a.id INNER JOIN
                turma t ON t.id = m.turma_id where m.turma_id=? ORDER BY a.nome ASC";

        $query = new SqlQuery($sql);
        $query->setNumber($turma_id);

        $rs_alunos = $this->execute($query);

        return $rs_alunos;

    }

}
?>