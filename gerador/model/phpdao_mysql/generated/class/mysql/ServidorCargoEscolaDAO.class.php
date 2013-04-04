<?php
/**
 * Classe operadora da tabela 'servidor_cargo_escola'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class ServidorCargoEscolaDAO extends Model implements ServidorCargoEscolaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return ServidorCargoEscola 
	 */
	public function load($id){
		$sql = 'SELECT * FROM servidor_cargo_escola WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return ServidorCargoEscola      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM servidor_cargo_escola '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM servidor_cargo_escola '.$criterio.'';
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
		$sql = 'SELECT * FROM servidor_cargo_escola ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param servidorCargoEscola primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM servidor_cargo_escola WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param ServidorCargoEscola servidorCargoEscola
 	 */
	public function insert($servidorCargoEscola){
		$sql = 'INSERT INTO servidor_cargo_escola (servidor_id, escola_id, cargos_mec_id, data_admissao, data_entrada_exercicio, matricula, vinculo, num_decreto) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($servidorCargoEscola->servidorId);
		$sqlQuery->setNumber($servidorCargoEscola->escolaId);
		$sqlQuery->setNumber($servidorCargoEscola->cargosMecId);
		$sqlQuery->set($servidorCargoEscola->dataAdmissao);
		$sqlQuery->set($servidorCargoEscola->dataEntradaExercicio);
		$sqlQuery->set($servidorCargoEscola->matricula);
		$sqlQuery->set($servidorCargoEscola->vinculo);
		$sqlQuery->set($servidorCargoEscola->numDecreto);

		$id = $this->executeInsert($sqlQuery);	
		$servidorCargoEscola->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param ServidorCargoEscola servidorCargoEscola
 	 */
	public function update($servidorCargoEscola){
		$campos = "";
        
        
		 if(!empty($servidorCargoEscola->servidorId)) $campos .=' servidor_id = ?,';
		 if(!empty($servidorCargoEscola->escolaId)) $campos .=' escola_id = ?,';
		 if(!empty($servidorCargoEscola->cargosMecId)) $campos .=' cargos_mec_id = ?,';
		 if(!empty($servidorCargoEscola->dataAdmissao)) $campos .=' data_admissao = ?,';
		 if(!empty($servidorCargoEscola->dataEntradaExercicio)) $campos .=' data_entrada_exercicio = ?,';
		 if(!empty($servidorCargoEscola->matricula)) $campos .=' matricula = ?,';
		 if(!empty($servidorCargoEscola->vinculo)) $campos .=' vinculo = ?,';
		 if(!empty($servidorCargoEscola->numDecreto)) $campos .=' num_decreto = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE servidor_cargo_escola SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($servidorCargoEscola->servidorId)) 		$sqlQuery->setNumber($servidorCargoEscola->servidorId);
		 if(!empty($servidorCargoEscola->escolaId)) 		$sqlQuery->setNumber($servidorCargoEscola->escolaId);
		 if(!empty($servidorCargoEscola->cargosMecId)) 		$sqlQuery->setNumber($servidorCargoEscola->cargosMecId);
		 if(!empty($servidorCargoEscola->dataAdmissao)) 		$sqlQuery->set($servidorCargoEscola->dataAdmissao);
		 if(!empty($servidorCargoEscola->dataEntradaExercicio)) 		$sqlQuery->set($servidorCargoEscola->dataEntradaExercicio);
		 if(!empty($servidorCargoEscola->matricula)) 		$sqlQuery->set($servidorCargoEscola->matricula);
		 if(!empty($servidorCargoEscola->vinculo)) 		$sqlQuery->set($servidorCargoEscola->vinculo);
		 if(!empty($servidorCargoEscola->numDecreto)) 		$sqlQuery->set($servidorCargoEscola->numDecreto);

		$sqlQuery->setNumber($servidorCargoEscola->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM servidor_cargo_escola';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByServidorId($value){
		$sql = 'SELECT * FROM servidor_cargo_escola WHERE servidor_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEscolaId($value){
		$sql = 'SELECT * FROM servidor_cargo_escola WHERE escola_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCargosMecId($value){
		$sql = 'SELECT * FROM servidor_cargo_escola WHERE cargos_mec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataAdmissao($value){
		$sql = 'SELECT * FROM servidor_cargo_escola WHERE data_admissao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataEntradaExercicio($value){
		$sql = 'SELECT * FROM servidor_cargo_escola WHERE data_entrada_exercicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMatricula($value){
		$sql = 'SELECT * FROM servidor_cargo_escola WHERE matricula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByVinculo($value){
		$sql = 'SELECT * FROM servidor_cargo_escola WHERE vinculo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumDecreto($value){
		$sql = 'SELECT * FROM servidor_cargo_escola WHERE num_decreto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByServidorId($value){
		$sql = 'DELETE FROM servidor_cargo_escola WHERE servidor_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEscolaId($value){
		$sql = 'DELETE FROM servidor_cargo_escola WHERE escola_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCargosMecId($value){
		$sql = 'DELETE FROM servidor_cargo_escola WHERE cargos_mec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataAdmissao($value){
		$sql = 'DELETE FROM servidor_cargo_escola WHERE data_admissao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataEntradaExercicio($value){
		$sql = 'DELETE FROM servidor_cargo_escola WHERE data_entrada_exercicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMatricula($value){
		$sql = 'DELETE FROM servidor_cargo_escola WHERE matricula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByVinculo($value){
		$sql = 'DELETE FROM servidor_cargo_escola WHERE vinculo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumDecreto($value){
		$sql = 'DELETE FROM servidor_cargo_escola WHERE num_decreto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return ServidorCargoEscola 
	 */
	protected function readRow($row){
		$servidorCargoEscola = new ServidorCargoEscola();
		
		$servidorCargoEscola->id = $row['id'];
		$servidorCargoEscola->servidorId = $row['servidor_id'];
		$servidorCargoEscola->escolaId = $row['escola_id'];
		$servidorCargoEscola->cargosMecId = $row['cargos_mec_id'];
		$servidorCargoEscola->dataAdmissao = $row['data_admissao'];
		$servidorCargoEscola->dataEntradaExercicio = $row['data_entrada_exercicio'];
		$servidorCargoEscola->matricula = $row['matricula'];
		$servidorCargoEscola->vinculo = $row['vinculo'];
		$servidorCargoEscola->numDecreto = $row['num_decreto'];

		return $servidorCargoEscola;
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
	 * @return ServidorCargoEscola 
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