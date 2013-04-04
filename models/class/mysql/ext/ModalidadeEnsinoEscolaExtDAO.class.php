<?php
/**
 * Classe operadora da tabela 'modalidade_ensino_escola'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-02-16 13:47
 */
class ModalidadeEnsinoEscolaExtDAO extends ModalidadeEnsinoEscolaDAO{

    public function getDadosByEscola($escola_id){
        $sql = "select MM.id as dados_mec_id,MM.nome,MM.codigo from modalidade_ensino_mec MM inner join
                modalidade_ensino_escola ME on MM.id = ME.modalidade_ensino_mec_id
                where ME.escola_id=?";
        $query = new SqlQuery($sql);
        $query->setNumber($escola_id);

        $rs = $this->execute($query);

        return $rs;

    }
}
?>