<?php
/**
 * Classe operadora da tabela 'tabelas'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class TabelasDAO extends Model implements TabelasI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Tabelas 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tabelas WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Tabelas      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM tabelas '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM tabelas '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		$rs=$this->execute($sqlQuery);
        return $rs[0]["qtd"];
	}
    
	/**
	 * Retorna todos os registro ordenado pelo campos
	 *
	 * @param $orderColumn nome da coluna
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tabelas ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param tabela primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tabelas WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Tabelas tabela
 	 */
	public function insert($tabela){
		$sql = 'INSERT INTO tabelas (tabela_id, menu_id, nome, tipo, pasta, status, ordem) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tabela->tabelaId);
		$sqlQuery->setNumber($tabela->menuId);
		$sqlQuery->set($tabela->nome);
		$sqlQuery->setNumber($tabela->tipo);
		$sqlQuery->set($tabela->pasta);
		$sqlQuery->setNumber($tabela->status);
		$sqlQuery->setNumber($tabela->ordem);

		$id = $this->executeInsert($sqlQuery);	
		$tabela->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Tabelas tabela
 	 */
	public function update($tabela){
		$campos = "";
        
        
		 if(!empty($tabela->tabelaId)) $campos .=' tabela_id = ?,';
		 if(!empty($tabela->menuId)) $campos .=' menu_id = ?,';
		 if(!empty($tabela->nome)) $campos .=' nome = ?,';
		 if(!empty($tabela->tipo)) $campos .=' tipo = ?,';
		 if(!empty($tabela->pasta)) $campos .=' pasta = ?,';
		 if(!empty($tabela->status)) $campos .=' status = ?,';
		 if(!empty($tabela->ordem)) $campos .=' ordem = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE tabelas SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($tabela->tabelaId)) 		$sqlQuery->setNumber($tabela->tabelaId);
		 if(!empty($tabela->menuId)) 		$sqlQuery->setNumber($tabela->menuId);
		 if(!empty($tabela->nome)) 		$sqlQuery->set($tabela->nome);
		 if(!empty($tabela->tipo)) 		$sqlQuery->setNumber($tabela->tipo);
		 if(!empty($tabela->pasta)) 		$sqlQuery->set($tabela->pasta);
		 if(!empty($tabela->status)) 		$sqlQuery->setNumber($tabela->status);
		 if(!empty($tabela->ordem)) 		$sqlQuery->setNumber($tabela->ordem);

		$sqlQuery->setNumber($tabela->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM tabelas';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTabelaId($value){
		$sql = 'SELECT * FROM tabelas WHERE tabela_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMenuId($value){
		$sql = 'SELECT * FROM tabelas WHERE menu_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM tabelas WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipo($value){
		$sql = 'SELECT * FROM tabelas WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPasta($value){
		$sql = 'SELECT * FROM tabelas WHERE pasta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM tabelas WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOrdem($value){
		$sql = 'SELECT * FROM tabelas WHERE ordem = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTabelaId($value){
		$sql = 'DELETE FROM tabelas WHERE tabela_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMenuId($value){
		$sql = 'DELETE FROM tabelas WHERE menu_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM tabelas WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipo($value){
		$sql = 'DELETE FROM tabelas WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPasta($value){
		$sql = 'DELETE FROM tabelas WHERE pasta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM tabelas WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOrdem($value){
		$sql = 'DELETE FROM tabelas WHERE ordem = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Tabelas 
	 */
	protected function readRow($row){
		$tabela = new Tabela();
		
		$tabela->id = $row['id'];
		$tabela->tabelaId = $row['tabela_id'];
		$tabela->menuId = $row['menu_id'];
		$tabela->nome = $row['nome'];
		$tabela->tipo = $row['tipo'];
		$tabela->pasta = $row['pasta'];
		$tabela->status = $row['status'];
		$tabela->ordem = $row['ordem'];

		return $tabela;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get registro
	 *
	 * @return Tabelas 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query para um registro e uma coluna
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Inseri um registro na tabela
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>