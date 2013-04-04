<?php
/**
 * Classe operadora da tabela 'escola'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-02-16 13:47
 */
class EscolaExtDAO extends EscolaDAO{

    public function getDadosMecByEscola($parametros){
        $sql = "select DM.id as dado_mec_id,DM.nome,DM.codigo from ".$parametros["tabela_mec"]." DM inner join
                ".$parametros["tabela_escola"]." DE on DM.id = DE.".$parametros["chave_ligacao"]."
                where DE.escola_id=?";
        $query = new SqlQuery($sql);
        $query->setNumber($parametros["escola_id"]);

        $rs = $this->execute($query);

        return $rs;
    }

    public function getEscolasByParametro($criterio){
        $sql="select e.*,ce.* from escola e inner join
                configuracao_escola ce on e.id=ce.escola_id
                where 1=1 ".$criterio;
        $query = new SqlQuery($sql);

        $rs = $this->execute($query);

        return $rs;
    }
    public function getCountAlunosMatriculados($escola_id){

         $sql="select count(id) as qtd_matriculados from
                matricula where turma_id in (select id from turma where escola_id = ?
                and ano_letivo_id = (select max(id) from ano_letivo where escola_id=? and situacao = 'Aberto')) ";

        $query = new SqlQuery($sql);

        $query->setNumber($escola_id);
        $query->setNumber($escola_id);

        $rs = $this->execute($query);

        return $rs[0]["qtd_matriculados"];

    }

    public function getCountTurmas($escola_id){
        $sql="select count(id) as qtd_turmas from
                turma where escola_id = ?
                and ano_letivo_id = (select max(id) from ano_letivo where escola_id=? and situacao = 'Aberto') ";

        $query = new SqlQuery($sql);

        $query->setNumber($escola_id);
        $query->setNumber($escola_id);

        $rs = $this->execute($query);

        return $rs[0]["qtd_turmas"];

    }

    public function getCountProfessores($escola_id){
        $sql="select count(id) as qtd_professor from
                servidor where id in (select servidor_id from servidor_escola where escola_id=?)
                and professor='S' ";

        $query = new SqlQuery($sql);

        $query->setNumber($escola_id);
        $query->setNumber($escola_id);

        $rs = $this->execute($query);

        return $rs[0]["qtd_professor"];

    }

    public function getCountServidores($escola_id){
        $sql="select count(id) as qtd_servidor from
                servidor where id in (select servidor_id from servidor_escola where escola_id=?)
                and (professor='N' or professor is null or professor='') ";

        $query = new SqlQuery($sql);

        $query->setNumber($escola_id);

        $rs = $this->execute($query);

        return $rs[0]["qtd_servidor"];

    }

}
?>