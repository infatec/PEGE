<?php
/**
 * Classe operadora da tabela 'ano'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class AnoDAO extends Model implements AnoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Ano 
	 */
	public function load($id){
		$sql = 'SELECT * FROM ano WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Ano      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM ano '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM ano '.$criterio.'';
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
		$sql = 'SELECT * FROM ano ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param ano primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM ano WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Ano ano
 	 */
	public function insert($ano){
		$sql = 'INSERT INTO ano (nivel_ensino_mec_id, codigo, nome, individual_escola, created, status, idade_correta) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($ano->nivelEnsinoMecId);
		$sqlQuery->set($ano->codigo);
		$sqlQuery->set($ano->nome);
		$sqlQuery->set($ano->individualEscola);
		$sqlQuery->set($ano->created);
		$sqlQuery->set($ano->status);
		$sqlQuery->setNumber($ano->idadeCorreta);

		$id = $this->executeInsert($sqlQuery);	
		$ano->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Ano ano
 	 */
	public function update($ano){
		$campos = "";
        
        
		 if(!empty($ano->nivelEnsinoMecId)) $campos .=' nivel_ensino_mec_id = ?,';
		 if(!empty($ano->codigo)) $campos .=' codigo = ?,';
		 if(!empty($ano->nome)) $campos .=' nome = ?,';
		 if(!empty($ano->individualEscola)) $campos .=' individual_escola = ?,';
		 if(!empty($ano->created)) $campos .=' created = ?,';
		 if(!empty($ano->status)) $campos .=' status = ?,';
		 if(!empty($ano->idadeCorreta)) $campos .=' idade_correta = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE ano SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($ano->nivelEnsinoMecId)) 		$sqlQuery->setNumber($ano->nivelEnsinoMecId);
		 if(!empty($ano->codigo)) 		$sqlQuery->set($ano->codigo);
		 if(!empty($ano->nome)) 		$sqlQuery->set($ano->nome);
		 if(!empty($ano->individualEscola)) 		$sqlQuery->set($ano->individualEscola);
		 if(!empty($ano->created)) 		$sqlQuery->set($ano->created);
		 if(!empty($ano->status)) 		$sqlQuery->set($ano->status);
		 if(!empty($ano->idadeCorreta)) 		$sqlQuery->setNumber($ano->idadeCorreta);

		$sqlQuery->setNumber($ano->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM ano';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNivelEnsinoMecId($value){
		$sql = 'SELECT * FROM ano WHERE nivel_ensino_mec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigo($value){
		$sql = 'SELECT * FROM ano WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM ano WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIndividualEscola($value){
		$sql = 'SELECT * FROM ano WHERE individual_escola = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM ano WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM ano WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdadeCorreta($value){
		$sql = 'SELECT * FROM ano WHERE idade_correta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNivelEnsinoMecId($value){
		$sql = 'DELETE FROM ano WHERE nivel_ensino_mec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigo($value){
		$sql = 'DELETE FROM ano WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM ano WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIndividualEscola($value){
		$sql = 'DELETE FROM ano WHERE individual_escola = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM ano WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM ano WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdadeCorreta($value){
		$sql = 'DELETE FROM ano WHERE idade_correta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Ano 
	 */
	protected function readRow($row){
		$ano = new Ano();
		
		$ano->id = $row['id'];
		$ano->nivelEnsinoMecId = $row['nivel_ensino_mec_id'];
		$ano->codigo = $row['codigo'];
		$ano->nome = $row['nome'];
		$ano->individualEscola = $row['individual_escola'];
		$ano->created = $row['created'];
		$ano->status = $row['status'];
		$ano->idadeCorreta = $row['idade_correta'];

		return $ano;
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
	 * @return Ano 
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