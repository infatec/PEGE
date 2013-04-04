<?php
/**
 * Classe operadora da tabela 'negociacao'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-11 12:27
 */
class NegociacaoDAO extends Model implements NegociacaoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Negociacao 
	 */
	public function load($id){
		$sql = 'SELECT * FROM negociacao WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Negociacao      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM negociacao '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM negociacao '.$criterio.'';
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
		$sql = 'SELECT * FROM negociacao ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param negociacao primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM negociacao WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Negociacao negociacao
 	 */
	public function insert($negociacao){
		$sql = 'INSERT INTO negociacao (data, valor_total, status, abertura_fechamento_caixa_id, caixa_id) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($negociacao->data);
		$sqlQuery->set($negociacao->valorTotal);
		$sqlQuery->setNumber($negociacao->status);
		$sqlQuery->setNumber($negociacao->aberturaFechamentoCaixaId);
		$sqlQuery->setNumber($negociacao->caixaId);

		$id = $this->executeInsert($sqlQuery);	
		$negociacao->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Negociacao negociacao
 	 */
	public function update($negociacao){
		$campos = "";
        
        
		 if(!empty($negociacao->data)) $campos .=' data = ?,';
		 if(!empty($negociacao->valorTotal)) $campos .=' valor_total = ?,';
		 if(!empty($negociacao->status)) $campos .=' status = ?,';
		 if(!empty($negociacao->aberturaFechamentoCaixaId)) $campos .=' abertura_fechamento_caixa_id = ?,';
		 if(!empty($negociacao->caixaId)) $campos .=' caixa_id = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE negociacao SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($negociacao->data)) 		$sqlQuery->set($negociacao->data);
		 if(!empty($negociacao->valorTotal)) 		$sqlQuery->set($negociacao->valorTotal);
		 if(!empty($negociacao->status)) 		$sqlQuery->setNumber($negociacao->status);
		 if(!empty($negociacao->aberturaFechamentoCaixaId)) 		$sqlQuery->setNumber($negociacao->aberturaFechamentoCaixaId);
		 if(!empty($negociacao->caixaId)) 		$sqlQuery->setNumber($negociacao->caixaId);

		$sqlQuery->setNumber($negociacao->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM negociacao';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByData($value){
		$sql = 'SELECT * FROM negociacao WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValorTotal($value){
		$sql = 'SELECT * FROM negociacao WHERE valor_total = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM negociacao WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAberturaFechamentoCaixaId($value){
		$sql = 'SELECT * FROM negociacao WHERE abertura_fechamento_caixa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCaixaId($value){
		$sql = 'SELECT * FROM negociacao WHERE caixa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByData($value){
		$sql = 'DELETE FROM negociacao WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValorTotal($value){
		$sql = 'DELETE FROM negociacao WHERE valor_total = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM negociacao WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAberturaFechamentoCaixaId($value){
		$sql = 'DELETE FROM negociacao WHERE abertura_fechamento_caixa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCaixaId($value){
		$sql = 'DELETE FROM negociacao WHERE caixa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Negociacao 
	 */
	protected function readRow($row){
		$negociacao = new Negociacao();
		
		$negociacao->id = $row['id'];
		$negociacao->data = $row['data'];
		$negociacao->valorTotal = $row['valor_total'];
		$negociacao->status = $row['status'];
		$negociacao->aberturaFechamentoCaixaId = $row['abertura_fechamento_caixa_id'];
		$negociacao->caixaId = $row['caixa_id'];

		return $negociacao;
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
	 * @return Negociacao 
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