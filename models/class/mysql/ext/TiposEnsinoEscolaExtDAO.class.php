<?php
/**
 * Classe operadora da tabela 'tipos_ensino_escola'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-02-16 13:47
 */
class TiposEnsinoEscolaExtDAO extends TiposEnsinoEscolaDAO{

    public function getTiposEnsinoByEscola($escola_id){

        $sql = "select TM.id as tipo_ensino_mec_id,TM.nome,TM.codigo from tipos_ensino_mec TM inner join
                tipos_ensino_escola TE on TM.id = TE.tipos_ensino_mec_id
                where TE.escola_id=?";
        $query = new SqlQuery($sql);
        $query->setNumber($escola_id);

        $rs = $this->execute($query);

        return $rs;

    }
	
}
?>