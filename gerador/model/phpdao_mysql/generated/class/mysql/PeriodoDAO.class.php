<?php
/**
 * Classe operadora da tabela 'periodo'. banco msSql.
 *
 * @author:frame arser
 * @date: 2012-04-17 20:14
 */
class PeriodoDAO extends Model implements PeriodoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Periodo 
	 */
	public function load($id){
		$sql = 'SELECT * FROM periodo WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Periodo      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM periodo '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM periodo '.$criterio.'';
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
		$sql = 'SELECT * FROM periodo ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param periodo primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM periodo WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Periodo periodo
 	 */
	public function insert($periodo){
		$sql = 'INSERT INTO periodo (referencia, tipo, data_inicio, data_fim, data_limite_matricula, data_inicio_matricula, data_fim_matricula, situacao, observacao, created, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($periodo->referencia);
		$sqlQuery->set($periodo->tipo);
		$sqlQuery->set($periodo->dataInicio);
		$sqlQuery->set($periodo->dataFim);
		$sqlQuery->set($periodo->dataLimiteMatricula);
		$sqlQuery->set($periodo->dataInicioMatricula);
		$sqlQuery->set($periodo->dataFimMatricula);
		$sqlQuery->set($periodo->situacao);
		$sqlQuery->set($periodo->observacao);
		$sqlQuery->set($periodo->created);
		$sqlQuery->setNumber($periodo->status);

		$id = $this->executeInsert($sqlQuery);	
		$periodo->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Periodo periodo
 	 */
	public function update($periodo){
		$campos = "";
        
        
		 if(!empty($periodo->referencia)) $campos .=' referencia = ?,';
		 if(!empty($periodo->tipo)) $campos .=' tipo = ?,';
		 if(!empty($periodo->dataInicio)) $campos .=' data_inicio = ?,';
		 if(!empty($periodo->dataFim)) $campos .=' data_fim = ?,';
		 if(!empty($periodo->dataLimiteMatricula)) $campos .=' data_limite_matricula = ?,';
		 if(!empty($periodo->dataInicioMatricula)) $campos .=' data_inicio_matricula = ?,';
		 if(!empty($periodo->dataFimMatricula)) $campos .=' data_fim_matricula = ?,';
		 if(!empty($periodo->situacao)) $campos .=' situacao = ?,';
		 if(!empty($periodo->observacao)) $campos .=' observacao = ?,';
		 if(!empty($periodo->created)) $campos .=' created = ?,';
		 if(!empty($periodo->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE periodo SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($periodo->referencia)) 		$sqlQuery->set($periodo->referencia);
		 if(!empty($periodo->tipo)) 		$sqlQuery->set($periodo->tipo);
		 if(!empty($periodo->dataInicio)) 		$sqlQuery->set($periodo->dataInicio);
		 if(!empty($periodo->dataFim)) 		$sqlQuery->set($periodo->dataFim);
		 if(!empty($periodo->dataLimiteMatricula)) 		$sqlQuery->set($periodo->dataLimiteMatricula);
		 if(!empty($periodo->dataInicioMatricula)) 		$sqlQuery->set($periodo->dataInicioMatricula);
		 if(!empty($periodo->dataFimMatricula)) 		$sqlQuery->set($periodo->dataFimMatricula);
		 if(!empty($periodo->situacao)) 		$sqlQuery->set($periodo->situacao);
		 if(!empty($periodo->observacao)) 		$sqlQuery->set($periodo->observacao);
		 if(!empty($periodo->created)) 		$sqlQuery->set($periodo->created);
		 if(!empty($periodo->status)) 		$sqlQuery->setNumber($periodo->status);

		$sqlQuery->setNumber($periodo->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM periodo';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByReferencia($value){
		$sql = 'SELECT * FROM periodo WHERE referencia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipo($value){
		$sql = 'SELECT * FROM periodo WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataInicio($value){
		$sql = 'SELECT * FROM periodo WHERE data_inicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataFim($value){
		$sql = 'SELECT * FROM periodo WHERE data_fim = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataLimiteMatricula($value){
		$sql = 'SELECT * FROM periodo WHERE data_limite_matricula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataInicioMatricula($value){
		$sql = 'SELECT * FROM periodo WHERE data_inicio_matricula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataFimMatricula($value){
		$sql = 'SELECT * FROM periodo WHERE data_fim_matricula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySituacao($value){
		$sql = 'SELECT * FROM periodo WHERE situacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByObservacao($value){
		$sql = 'SELECT * FROM periodo WHERE observacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM periodo WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM periodo WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByReferencia($value){
		$sql = 'DELETE FROM periodo WHERE referencia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipo($value){
		$sql = 'DELETE FROM periodo WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataInicio($value){
		$sql = 'DELETE FROM periodo WHERE data_inicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataFim($value){
		$sql = 'DELETE FROM periodo WHERE data_fim = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataLimiteMatricula($value){
		$sql = 'DELETE FROM periodo WHERE data_limite_matricula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataInicioMatricula($value){
		$sql = 'DELETE FROM periodo WHERE data_inicio_matricula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataFimMatricula($value){
		$sql = 'DELETE FROM periodo WHERE data_fim_matricula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySituacao($value){
		$sql = 'DELETE FROM periodo WHERE situacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByObservacao($value){
		$sql = 'DELETE FROM periodo WHERE observacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM periodo WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM periodo WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Periodo 
	 */
	protected function readRow($row){
		$periodo = new Periodo();
		
		$periodo->id = $row['id'];
		$periodo->referencia = $row['referencia'];
		$periodo->tipo = $row['tipo'];
		$periodo->dataInicio = $row['data_inicio'];
		$periodo->dataFim = $row['data_fim'];
		$periodo->dataLimiteMatricula = $row['data_limite_matricula'];
		$periodo->dataInicioMatricula = $row['data_inicio_matricula'];
		$periodo->dataFimMatricula = $row['data_fim_matricula'];
		$periodo->situacao = $row['situacao'];
		$periodo->observacao = $row['observacao'];
		$periodo->created = $row['created'];
		$periodo->status = $row['status'];

		return $periodo;
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
	 * @return Periodo 
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