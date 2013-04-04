<?php
/**
 * Classe operadora da tabela 'abertura_fechamento_caixa'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-11 12:27
 */
class AberturaFechamentoCaixaDAO extends Model implements AberturaFechamentoCaixaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return AberturaFechamentoCaixa 
	 */
	public function load($id){
		$sql = 'SELECT * FROM abertura_fechamento_caixa WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return AberturaFechamentoCaixa      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM abertura_fechamento_caixa '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM abertura_fechamento_caixa '.$criterio.'';
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
		$sql = 'SELECT * FROM abertura_fechamento_caixa ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param aberturaFechamentoCaixa primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM abertura_fechamento_caixa WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param AberturaFechamentoCaixa aberturaFechamentoCaixa
 	 */
	public function insert($aberturaFechamentoCaixa){
		$sql = 'INSERT INTO abertura_fechamento_caixa (data_abertura, data_fechamento, usuario_abertura, usuario_fechamento, saldo, caixa_id) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($aberturaFechamentoCaixa->dataAbertura);
		$sqlQuery->set($aberturaFechamentoCaixa->dataFechamento);
		$sqlQuery->setNumber($aberturaFechamentoCaixa->usuarioAbertura);
		$sqlQuery->setNumber($aberturaFechamentoCaixa->usuarioFechamento);
		$sqlQuery->set($aberturaFechamentoCaixa->saldo);
		$sqlQuery->setNumber($aberturaFechamentoCaixa->caixaId);

		$id = $this->executeInsert($sqlQuery);	
		$aberturaFechamentoCaixa->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param AberturaFechamentoCaixa aberturaFechamentoCaixa
 	 */
	public function update($aberturaFechamentoCaixa){
		$campos = "";
        
        
		 if(!empty($aberturaFechamentoCaixa->dataAbertura)) $campos .=' data_abertura = ?,';
		 if(!empty($aberturaFechamentoCaixa->dataFechamento)) $campos .=' data_fechamento = ?,';
		 if(!empty($aberturaFechamentoCaixa->usuarioAbertura)) $campos .=' usuario_abertura = ?,';
		 if(!empty($aberturaFechamentoCaixa->usuarioFechamento)) $campos .=' usuario_fechamento = ?,';
		 if(!empty($aberturaFechamentoCaixa->saldo)) $campos .=' saldo = ?,';
		 if(!empty($aberturaFechamentoCaixa->caixaId)) $campos .=' caixa_id = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE abertura_fechamento_caixa SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($aberturaFechamentoCaixa->dataAbertura)) 		$sqlQuery->set($aberturaFechamentoCaixa->dataAbertura);
		 if(!empty($aberturaFechamentoCaixa->dataFechamento)) 		$sqlQuery->set($aberturaFechamentoCaixa->dataFechamento);
		 if(!empty($aberturaFechamentoCaixa->usuarioAbertura)) 		$sqlQuery->setNumber($aberturaFechamentoCaixa->usuarioAbertura);
		 if(!empty($aberturaFechamentoCaixa->usuarioFechamento)) 		$sqlQuery->setNumber($aberturaFechamentoCaixa->usuarioFechamento);
		 if(!empty($aberturaFechamentoCaixa->saldo)) 		$sqlQuery->set($aberturaFechamentoCaixa->saldo);
		 if(!empty($aberturaFechamentoCaixa->caixaId)) 		$sqlQuery->setNumber($aberturaFechamentoCaixa->caixaId);

		$sqlQuery->setNumber($aberturaFechamentoCaixa->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM abertura_fechamento_caixa';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDataAbertura($value){
		$sql = 'SELECT * FROM abertura_fechamento_caixa WHERE data_abertura = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataFechamento($value){
		$sql = 'SELECT * FROM abertura_fechamento_caixa WHERE data_fechamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUsuarioAbertura($value){
		$sql = 'SELECT * FROM abertura_fechamento_caixa WHERE usuario_abertura = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUsuarioFechamento($value){
		$sql = 'SELECT * FROM abertura_fechamento_caixa WHERE usuario_fechamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySaldo($value){
		$sql = 'SELECT * FROM abertura_fechamento_caixa WHERE saldo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCaixaId($value){
		$sql = 'SELECT * FROM abertura_fechamento_caixa WHERE caixa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDataAbertura($value){
		$sql = 'DELETE FROM abertura_fechamento_caixa WHERE data_abertura = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataFechamento($value){
		$sql = 'DELETE FROM abertura_fechamento_caixa WHERE data_fechamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUsuarioAbertura($value){
		$sql = 'DELETE FROM abertura_fechamento_caixa WHERE usuario_abertura = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUsuarioFechamento($value){
		$sql = 'DELETE FROM abertura_fechamento_caixa WHERE usuario_fechamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySaldo($value){
		$sql = 'DELETE FROM abertura_fechamento_caixa WHERE saldo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCaixaId($value){
		$sql = 'DELETE FROM abertura_fechamento_caixa WHERE caixa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return AberturaFechamentoCaixa 
	 */
	protected function readRow($row){
		$aberturaFechamentoCaixa = new AberturaFechamentoCaixa();
		
		$aberturaFechamentoCaixa->id = $row['id'];
		$aberturaFechamentoCaixa->dataAbertura = $row['data_abertura'];
		$aberturaFechamentoCaixa->dataFechamento = $row['data_fechamento'];
		$aberturaFechamentoCaixa->usuarioAbertura = $row['usuario_abertura'];
		$aberturaFechamentoCaixa->usuarioFechamento = $row['usuario_fechamento'];
		$aberturaFechamentoCaixa->saldo = $row['saldo'];
		$aberturaFechamentoCaixa->caixaId = $row['caixa_id'];

		return $aberturaFechamentoCaixa;
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
	 * @return AberturaFechamentoCaixa 
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