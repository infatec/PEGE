<?php
/**
 * Classe operadora da tabela 'recebimento_cartao'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-11 12:27
 */
class RecebimentoCartaoDAO extends Model implements RecebimentoCartaoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return RecebimentoCartao 
	 */
	public function load($id){
		$sql = 'SELECT * FROM recebimento_cartao WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return RecebimentoCartao      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM recebimento_cartao '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM recebimento_cartao '.$criterio.'';
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
		$sql = 'SELECT * FROM recebimento_cartao ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param recebimentoCartao primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM recebimento_cartao WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param RecebimentoCartao recebimentoCartao
 	 */
	public function insert($recebimentoCartao){
		$sql = 'INSERT INTO recebimento_cartao (cartao_venda_id, data_recebimento, valor, cancelado) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($recebimentoCartao->cartaoVendaId);
		$sqlQuery->set($recebimentoCartao->dataRecebimento);
		$sqlQuery->set($recebimentoCartao->valor);
		$sqlQuery->set($recebimentoCartao->cancelado);

		$id = $this->executeInsert($sqlQuery);	
		$recebimentoCartao->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param RecebimentoCartao recebimentoCartao
 	 */
	public function update($recebimentoCartao){
		$campos = "";
        
        
		 if(!empty($recebimentoCartao->cartaoVendaId)) $campos .=' cartao_venda_id = ?,';
		 if(!empty($recebimentoCartao->dataRecebimento)) $campos .=' data_recebimento = ?,';
		 if(!empty($recebimentoCartao->valor)) $campos .=' valor = ?,';
		 if(!empty($recebimentoCartao->cancelado)) $campos .=' cancelado = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE recebimento_cartao SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($recebimentoCartao->cartaoVendaId)) 		$sqlQuery->setNumber($recebimentoCartao->cartaoVendaId);
		 if(!empty($recebimentoCartao->dataRecebimento)) 		$sqlQuery->set($recebimentoCartao->dataRecebimento);
		 if(!empty($recebimentoCartao->valor)) 		$sqlQuery->set($recebimentoCartao->valor);
		 if(!empty($recebimentoCartao->cancelado)) 		$sqlQuery->set($recebimentoCartao->cancelado);

		$sqlQuery->setNumber($recebimentoCartao->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM recebimento_cartao';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCartaoVendaId($value){
		$sql = 'SELECT * FROM recebimento_cartao WHERE cartao_venda_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataRecebimento($value){
		$sql = 'SELECT * FROM recebimento_cartao WHERE data_recebimento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValor($value){
		$sql = 'SELECT * FROM recebimento_cartao WHERE valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCancelado($value){
		$sql = 'SELECT * FROM recebimento_cartao WHERE cancelado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCartaoVendaId($value){
		$sql = 'DELETE FROM recebimento_cartao WHERE cartao_venda_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataRecebimento($value){
		$sql = 'DELETE FROM recebimento_cartao WHERE data_recebimento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValor($value){
		$sql = 'DELETE FROM recebimento_cartao WHERE valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCancelado($value){
		$sql = 'DELETE FROM recebimento_cartao WHERE cancelado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return RecebimentoCartao 
	 */
	protected function readRow($row){
		$recebimentoCartao = new RecebimentoCartao();
		
		$recebimentoCartao->id = $row['id'];
		$recebimentoCartao->cartaoVendaId = $row['cartao_venda_id'];
		$recebimentoCartao->dataRecebimento = $row['data_recebimento'];
		$recebimentoCartao->valor = $row['valor'];
		$recebimentoCartao->cancelado = $row['cancelado'];

		return $recebimentoCartao;
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
	 * @return RecebimentoCartao 
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