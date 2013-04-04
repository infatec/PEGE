<?php
/**
 * Classe operadora da tabela 'tabelas'. banco msSql.
 *
 * @author:frame arser
 * @date: 2010-04-19 21:43
 */
class TabelasExtDAO extends TabelasDAO{

    public function permissoesTabela($grupo_id,$menu_id)
    {
        $sql="select id,nome,
             (select count(id) from grupo_usuario_tabelas where tabela_id=tabelas.id and grupo_id= ".$grupo_id." ) 
             as permissao from tabelas where menu_id=".$menu_id." and status=1";
        $query = new SqlQuery($sql);
        $rs_tabelas = $this->execute($query);
        return $rs_tabelas;
        
    }
}
?>