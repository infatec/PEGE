<?php
/**
 * Classe operadora da tabela 'posicao_publicidade'. banco msSql.
 *
 * @author:frame arser
 * @date: 2012-01-04 12:46
 */
class PosicaoPublicidadeDAO extends Model implements PosicaoPublicidadeI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return PosicaoPublicidade 
	 */
	public function load($id){
		$sql = 'SELECT * FROM posicao_publicidade WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return PosicaoPublicidade      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM posicao_publicidade '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM posicao_publicidade '.$criterio.'';
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
		$sql = 'SELECT * FROM posicao_publicidade ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param posicaoPublicidade primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM posicao_publicidade WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param PosicaoPublicidade posicaoPublicidade
 	 */
	public function insert($posicaoPublicidade){
		$sql = 'INSERT INTO posicao_publicidade (descricao, created, status) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($posicaoPublicidade->descricao);
		$sqlQuery->set($posicaoPublicidade->created);
		$sqlQuery->set($posicaoPublicidade->status);

		$id = $this->executeInsert($sqlQuery);	
		$posicaoPublicidade->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param PosicaoPublicidade posicaoPublicidade
 	 */
	public function update($posicaoPublicidade){
		$campos = "";
        
        
		 if(!empty($posicaoPublicidade->descricao)) $campos .=' descricao = ?,';
		 if(!empty($posicaoPublicidade->created)) $campos .=' created = ?,';
		 if(!empty($posicaoPublicidade->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE posicao_publicidade SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($posicaoPublicidade->descricao)) 		$sqlQuery->set($posicaoPublicidade->descricao);
		 if(!empty($posicaoPublicidade->created)) 		$sqlQuery->set($posicaoPublicidade->created);
		 if(!empty($posicaoPublicidade->status)) 		$sqlQuery->set($posicaoPublicidade->status);

		$sqlQuery->setNumber($posicaoPublicidade->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM posicao_publicidade';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM posicao_publicidade WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM posicao_publicidade WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM posicao_publicidade WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescricao($value){
		$sql = 'DELETE FROM posicao_publicidade WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM posicao_publicidade WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM posicao_publicidade WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return PosicaoPublicidade 
	 */
	protected function readRow($row){
		$posicaoPublicidade = new PosicaoPublicidade();
		
		$posicaoPublicidade->id = $row['id'];
		$posicaoPublicidade->descricao = $row['descricao'];
		$posicaoPublicidade->created = $row['created'];
		$posicaoPublicidade->status = $row['status'];

		return $posicaoPublicidade;
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
	 * @return PosicaoPublicidade 
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