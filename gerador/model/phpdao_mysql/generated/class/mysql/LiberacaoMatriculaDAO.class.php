<?php
/**
 * Classe operadora da tabela 'liberacao_matricula'. banco msSql.
 *
 * @author:frame arser
 * @date: 2012-04-17 20:14
 */
class LiberacaoMatriculaDAO extends Model implements LiberacaoMatriculaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return LiberacaoMatricula 
	 */
	public function load($id){
		$sql = 'SELECT * FROM liberacao_matricula WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return LiberacaoMatricula      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM liberacao_matricula '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM liberacao_matricula '.$criterio.'';
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
		$sql = 'SELECT * FROM liberacao_matricula ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param liberacaoMatricula primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM liberacao_matricula WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param LiberacaoMatricula liberacaoMatricula
 	 */
	public function insert($liberacaoMatricula){
		$sql = 'INSERT INTO liberacao_matricula (observacao, aluno_id, periodo_id) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($liberacaoMatricula->observacao);
		$sqlQuery->setNumber($liberacaoMatricula->alunoId);
		$sqlQuery->setNumber($liberacaoMatricula->periodoId);

		$id = $this->executeInsert($sqlQuery);	
		$liberacaoMatricula->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param LiberacaoMatricula liberacaoMatricula
 	 */
	public function update($liberacaoMatricula){
		$campos = "";
        
        
		 if(!empty($liberacaoMatricula->observacao)) $campos .=' observacao = ?,';
		 if(!empty($liberacaoMatricula->alunoId)) $campos .=' aluno_id = ?,';
		 if(!empty($liberacaoMatricula->periodoId)) $campos .=' periodo_id = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE liberacao_matricula SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($liberacaoMatricula->observacao)) 		$sqlQuery->set($liberacaoMatricula->observacao);
		 if(!empty($liberacaoMatricula->alunoId)) 		$sqlQuery->setNumber($liberacaoMatricula->alunoId);
		 if(!empty($liberacaoMatricula->periodoId)) 		$sqlQuery->setNumber($liberacaoMatricula->periodoId);

		$sqlQuery->setNumber($liberacaoMatricula->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM liberacao_matricula';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByObservacao($value){
		$sql = 'SELECT * FROM liberacao_matricula WHERE observacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAlunoId($value){
		$sql = 'SELECT * FROM liberacao_matricula WHERE aluno_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPeriodoId($value){
		$sql = 'SELECT * FROM liberacao_matricula WHERE periodo_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByObservacao($value){
		$sql = 'DELETE FROM liberacao_matricula WHERE observacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAlunoId($value){
		$sql = 'DELETE FROM liberacao_matricula WHERE aluno_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPeriodoId($value){
		$sql = 'DELETE FROM liberacao_matricula WHERE periodo_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return LiberacaoMatricula 
	 */
	protected function readRow($row){
		$liberacaoMatricula = new LiberacaoMatricula();
		
		$liberacaoMatricula->id = $row['id'];
		$liberacaoMatricula->observacao = $row['observacao'];
		$liberacaoMatricula->alunoId = $row['aluno_id'];
		$liberacaoMatricula->periodoId = $row['periodo_id'];

		return $liberacaoMatricula;
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
	 * @return LiberacaoMatricula 
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