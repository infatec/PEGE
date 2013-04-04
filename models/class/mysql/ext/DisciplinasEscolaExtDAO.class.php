<?php
/**
 * Classe operadora da tabela 'disciplinas_escola'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-02-16 13:47
 */
class DisciplinasEscolaExtDAO extends DisciplinasEscolaDAO{

    public function getDisciplinasEscola($escola_id){
        $sql = "select DM.id as disciplina_mec_id,DM.nome,DM.codigo from disciplinas_mec DM inner join
                disciplinas_escola DE on DM.id = DE.disciplinas_mec_id
                where DE.escola_id=?";
        $query = new SqlQuery($sql);
        $query->setNumber($escola_id);

        $disciplinas = $this->execute($query);

        return $disciplinas;

    }
	
}
?>