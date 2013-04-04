<?php
/**
 * Classe operadora da tabela 'ano_letivo'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class AnoLetivoDAO extends Model implements AnoLetivoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return AnoLetivo 
	 */
	public function load($id){
		$sql = 'SELECT * FROM ano_letivo WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return AnoLetivo      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM ano_letivo '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM ano_letivo '.$criterio.'';
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
		$sql = 'SELECT * FROM ano_letivo ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param anoLetivo primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM ano_letivo WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param AnoLetivo anoLetivo
 	 */
	public function insert($anoLetivo){
		$sql = 'INSERT INTO ano_letivo (escola_id, identificacao, data_inicio_matricula, data_fim_matricula, data_inicio_aulas, data_fim_aulas, data_fim_primeiro_semestre, situacao, data_inicio_segundo_semestre, created, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($anoLetivo->escolaId);
		$sqlQuery->set($anoLetivo->identificacao);
		$sqlQuery->set($anoLetivo->dataInicioMatricula);
		$sqlQuery->set($anoLetivo->dataFimMatricula);
		$sqlQuery->set($anoLetivo->dataInicioAula);
		$sqlQuery->set($anoLetivo->dataFimAula);
		$sqlQuery->set($anoLetivo->dataFimPrimeiroSemestre);
		$sqlQuery->set($anoLetivo->situacao);
		$sqlQuery->set($anoLetivo->dataInicioSegundoSemestre);
		$sqlQuery->set($anoLetivo->created);
		$sqlQuery->set($anoLetivo->status);

		$id = $this->executeInsert($sqlQuery);	
		$anoLetivo->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param AnoLetivo anoLetivo
 	 */
	public function update($anoLetivo){
		$campos = "";
        
        
		 if(!empty($anoLetivo->escolaId)) $campos .=' escola_id = ?,';
		 if(!empty($anoLetivo->identificacao)) $campos .=' identificacao = ?,';
		 if(!empty($anoLetivo->dataInicioMatricula)) $campos .=' data_inicio_matricula = ?,';
		 if(!empty($anoLetivo->dataFimMatricula)) $campos .=' data_fim_matricula = ?,';
		 if(!empty($anoLetivo->dataInicioAula)) $campos .=' data_inicio_aulas = ?,';
		 if(!empty($anoLetivo->dataFimAula)) $campos .=' data_fim_aulas = ?,';
		 if(!empty($anoLetivo->dataFimPrimeiroSemestre)) $campos .=' data_fim_primeiro_semestre = ?,';
		 if(!empty($anoLetivo->situacao)) $campos .=' situacao = ?,';
		 if(!empty($anoLetivo->dataInicioSegundoSemestre)) $campos .=' data_inicio_segundo_semestre = ?,';
		 if(!empty($anoLetivo->created)) $campos .=' created = ?,';
		 if(!empty($anoLetivo->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE ano_letivo SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($anoLetivo->escolaId)) 		$sqlQuery->setNumber($anoLetivo->escolaId);
		 if(!empty($anoLetivo->identificacao)) 		$sqlQuery->set($anoLetivo->identificacao);
		 if(!empty($anoLetivo->dataInicioMatricula)) 		$sqlQuery->set($anoLetivo->dataInicioMatricula);
		 if(!empty($anoLetivo->dataFimMatricula)) 		$sqlQuery->set($anoLetivo->dataFimMatricula);
		 if(!empty($anoLetivo->dataInicioAula)) 		$sqlQuery->set($anoLetivo->dataInicioAula);
		 if(!empty($anoLetivo->dataFimAula)) 		$sqlQuery->set($anoLetivo->dataFimAula);
		 if(!empty($anoLetivo->dataFimPrimeiroSemestre)) 		$sqlQuery->set($anoLetivo->dataFimPrimeiroSemestre);
		 if(!empty($anoLetivo->situacao)) 		$sqlQuery->set($anoLetivo->situacao);
		 if(!empty($anoLetivo->dataInicioSegundoSemestre)) 		$sqlQuery->set($anoLetivo->dataInicioSegundoSemestre);
		 if(!empty($anoLetivo->created)) 		$sqlQuery->set($anoLetivo->created);
		 if(!empty($anoLetivo->status)) 		$sqlQuery->set($anoLetivo->status);

		$sqlQuery->setNumber($anoLetivo->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM ano_letivo';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByEscolaId($value){
		$sql = 'SELECT * FROM ano_letivo WHERE escola_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdentificacao($value){
		$sql = 'SELECT * FROM ano_letivo WHERE identificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataInicioMatricula($value){
		$sql = 'SELECT * FROM ano_letivo WHERE data_inicio_matricula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataFimMatricula($value){
		$sql = 'SELECT * FROM ano_letivo WHERE data_fim_matricula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataInicioAulas($value){
		$sql = 'SELECT * FROM ano_letivo WHERE data_inicio_aulas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataFimAulas($value){
		$sql = 'SELECT * FROM ano_letivo WHERE data_fim_aulas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataFimPrimeiroSemestre($value){
		$sql = 'SELECT * FROM ano_letivo WHERE data_fim_primeiro_semestre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySituacao($value){
		$sql = 'SELECT * FROM ano_letivo WHERE situacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataInicioSegundoSemestre($value){
		$sql = 'SELECT * FROM ano_letivo WHERE data_inicio_segundo_semestre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM ano_letivo WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM ano_letivo WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByEscolaId($value){
		$sql = 'DELETE FROM ano_letivo WHERE escola_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdentificacao($value){
		$sql = 'DELETE FROM ano_letivo WHERE identificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataInicioMatricula($value){
		$sql = 'DELETE FROM ano_letivo WHERE data_inicio_matricula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataFimMatricula($value){
		$sql = 'DELETE FROM ano_letivo WHERE data_fim_matricula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataInicioAulas($value){
		$sql = 'DELETE FROM ano_letivo WHERE data_inicio_aulas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataFimAulas($value){
		$sql = 'DELETE FROM ano_letivo WHERE data_fim_aulas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataFimPrimeiroSemestre($value){
		$sql = 'DELETE FROM ano_letivo WHERE data_fim_primeiro_semestre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySituacao($value){
		$sql = 'DELETE FROM ano_letivo WHERE situacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataInicioSegundoSemestre($value){
		$sql = 'DELETE FROM ano_letivo WHERE data_inicio_segundo_semestre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM ano_letivo WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM ano_letivo WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return AnoLetivo 
	 */
	protected function readRow($row){
		$anoLetivo = new AnoLetivo();
		
		$anoLetivo->id = $row['id'];
		$anoLetivo->escolaId = $row['escola_id'];
		$anoLetivo->identificacao = $row['identificacao'];
		$anoLetivo->dataInicioMatricula = $row['data_inicio_matricula'];
		$anoLetivo->dataFimMatricula = $row['data_fim_matricula'];
		$anoLetivo->dataInicioAula = $row['data_inicio_aulas'];
		$anoLetivo->dataFimAula = $row['data_fim_aulas'];
		$anoLetivo->dataFimPrimeiroSemestre = $row['data_fim_primeiro_semestre'];
		$anoLetivo->situacao = $row['situacao'];
		$anoLetivo->dataInicioSegundoSemestre = $row['data_inicio_segundo_semestre'];
		$anoLetivo->created = $row['created'];
		$anoLetivo->status = $row['status'];

		return $anoLetivo;
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
	 * @return AnoLetivo 
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