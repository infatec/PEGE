<?php
/**
 * Classe operadora da tabela 'portaria'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class PortariaDAO extends Model implements PortariaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Portaria 
	 */
	public function load($id){
		$sql = 'SELECT * FROM portaria WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Portaria      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM portaria '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM portaria '.$criterio.'';
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
		$sql = 'SELECT * FROM portaria ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param portaria primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM portaria WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Portaria portaria
 	 */
	public function insert($portaria){
		$sql = 'INSERT INTO portaria (servidor_id, data_entrada, hora_entrada, rg, aluno_id, modalidade) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($portaria->servidorId);
		$sqlQuery->set($portaria->dataEntrada);
		$sqlQuery->set($portaria->horaEntrada);
		$sqlQuery->set($portaria->rg);
		$sqlQuery->setNumber($portaria->alunoId);
		$sqlQuery->set($portaria->modalidade);

		$id = $this->executeInsert($sqlQuery);	
		$portaria->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Portaria portaria
 	 */
	public function update($portaria){
		$campos = "";
        
        
		 if(!empty($portaria->servidorId)) $campos .=' servidor_id = ?,';
		 if(!empty($portaria->dataEntrada)) $campos .=' data_entrada = ?,';
		 if(!empty($portaria->horaEntrada)) $campos .=' hora_entrada = ?,';
		 if(!empty($portaria->rg)) $campos .=' rg = ?,';
		 if(!empty($portaria->alunoId)) $campos .=' aluno_id = ?,';
		 if(!empty($portaria->modalidade)) $campos .=' modalidade = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE portaria SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($portaria->servidorId)) 		$sqlQuery->setNumber($portaria->servidorId);
		 if(!empty($portaria->dataEntrada)) 		$sqlQuery->set($portaria->dataEntrada);
		 if(!empty($portaria->horaEntrada)) 		$sqlQuery->set($portaria->horaEntrada);
		 if(!empty($portaria->rg)) 		$sqlQuery->set($portaria->rg);
		 if(!empty($portaria->alunoId)) 		$sqlQuery->setNumber($portaria->alunoId);
		 if(!empty($portaria->modalidade)) 		$sqlQuery->set($portaria->modalidade);

		$sqlQuery->setNumber($portaria->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM portaria';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByServidorId($value){
		$sql = 'SELECT * FROM portaria WHERE servidor_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataEntrada($value){
		$sql = 'SELECT * FROM portaria WHERE data_entrada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHoraEntrada($value){
		$sql = 'SELECT * FROM portaria WHERE hora_entrada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRg($value){
		$sql = 'SELECT * FROM portaria WHERE rg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAlunoId($value){
		$sql = 'SELECT * FROM portaria WHERE aluno_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByModalidade($value){
		$sql = 'SELECT * FROM portaria WHERE modalidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByServidorId($value){
		$sql = 'DELETE FROM portaria WHERE servidor_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataEntrada($value){
		$sql = 'DELETE FROM portaria WHERE data_entrada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHoraEntrada($value){
		$sql = 'DELETE FROM portaria WHERE hora_entrada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRg($value){
		$sql = 'DELETE FROM portaria WHERE rg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAlunoId($value){
		$sql = 'DELETE FROM portaria WHERE aluno_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByModalidade($value){
		$sql = 'DELETE FROM portaria WHERE modalidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Portaria 
	 */
	protected function readRow($row){
		$portaria = new Portaria();
		
		$portaria->id = $row['id'];
		$portaria->servidorId = $row['servidor_id'];
		$portaria->dataEntrada = $row['data_entrada'];
		$portaria->horaEntrada = $row['hora_entrada'];
		$portaria->rg = $row['rg'];
		$portaria->alunoId = $row['aluno_id'];
		$portaria->modalidade = $row['modalidade'];

		return $portaria;
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
	 * @return Portaria 
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