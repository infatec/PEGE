<?php
/**
 * Classe operadora da tabela 'curriculo_disciplina'. banco msSql.
 *
 * @author:frame arser
 * @date: 2012-04-17 20:14
 */
class CurriculoDisciplinaDAO extends Model implements CurriculoDisciplinaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return CurriculoDisciplina 
	 */
	public function load($id){
		$sql = 'SELECT * FROM curriculo_disciplina WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return CurriculoDisciplina      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM curriculo_disciplina '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM curriculo_disciplina '.$criterio.'';
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
		$sql = 'SELECT * FROM curriculo_disciplina ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param curriculoDisciplina primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM curriculo_disciplina WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param CurriculoDisciplina curriculoDisciplina
 	 */
	public function insert($curriculoDisciplina){
		$sql = 'INSERT INTO curriculo_disciplina (disciplina_id, curriculo_id, carga_horaria, bloco, curso_id, created, status) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($curriculoDisciplina->disciplinaId);
		$sqlQuery->setNumber($curriculoDisciplina->curriculoId);
		$sqlQuery->setNumber($curriculoDisciplina->cargaHoraria);
		$sqlQuery->setNumber($curriculoDisciplina->bloco);
		$sqlQuery->setNumber($curriculoDisciplina->cursoId);
		$sqlQuery->set($curriculoDisciplina->created);
		$sqlQuery->setNumber($curriculoDisciplina->status);

		$id = $this->executeInsert($sqlQuery);	
		$curriculoDisciplina->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param CurriculoDisciplina curriculoDisciplina
 	 */
	public function update($curriculoDisciplina){
		$campos = "";
        
        
		 if(!empty($curriculoDisciplina->disciplinaId)) $campos .=' disciplina_id = ?,';
		 if(!empty($curriculoDisciplina->curriculoId)) $campos .=' curriculo_id = ?,';
		 if(!empty($curriculoDisciplina->cargaHoraria)) $campos .=' carga_horaria = ?,';
		 if(!empty($curriculoDisciplina->bloco)) $campos .=' bloco = ?,';
		 if(!empty($curriculoDisciplina->cursoId)) $campos .=' curso_id = ?,';
		 if(!empty($curriculoDisciplina->created)) $campos .=' created = ?,';
		 if(!empty($curriculoDisciplina->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE curriculo_disciplina SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($curriculoDisciplina->disciplinaId)) 		$sqlQuery->setNumber($curriculoDisciplina->disciplinaId);
		 if(!empty($curriculoDisciplina->curriculoId)) 		$sqlQuery->setNumber($curriculoDisciplina->curriculoId);
		 if(!empty($curriculoDisciplina->cargaHoraria)) 		$sqlQuery->setNumber($curriculoDisciplina->cargaHoraria);
		 if(!empty($curriculoDisciplina->bloco)) 		$sqlQuery->setNumber($curriculoDisciplina->bloco);
		 if(!empty($curriculoDisciplina->cursoId)) 		$sqlQuery->setNumber($curriculoDisciplina->cursoId);
		 if(!empty($curriculoDisciplina->created)) 		$sqlQuery->set($curriculoDisciplina->created);
		 if(!empty($curriculoDisciplina->status)) 		$sqlQuery->setNumber($curriculoDisciplina->status);

		$sqlQuery->setNumber($curriculoDisciplina->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM curriculo_disciplina';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDisciplinaId($value){
		$sql = 'SELECT * FROM curriculo_disciplina WHERE disciplina_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCurriculoId($value){
		$sql = 'SELECT * FROM curriculo_disciplina WHERE curriculo_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCargaHoraria($value){
		$sql = 'SELECT * FROM curriculo_disciplina WHERE carga_horaria = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBloco($value){
		$sql = 'SELECT * FROM curriculo_disciplina WHERE bloco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCursoId($value){
		$sql = 'SELECT * FROM curriculo_disciplina WHERE curso_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM curriculo_disciplina WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM curriculo_disciplina WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDisciplinaId($value){
		$sql = 'DELETE FROM curriculo_disciplina WHERE disciplina_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCurriculoId($value){
		$sql = 'DELETE FROM curriculo_disciplina WHERE curriculo_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCargaHoraria($value){
		$sql = 'DELETE FROM curriculo_disciplina WHERE carga_horaria = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBloco($value){
		$sql = 'DELETE FROM curriculo_disciplina WHERE bloco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCursoId($value){
		$sql = 'DELETE FROM curriculo_disciplina WHERE curso_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM curriculo_disciplina WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM curriculo_disciplina WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return CurriculoDisciplina 
	 */
	protected function readRow($row){
		$curriculoDisciplina = new CurriculoDisciplina();
		
		$curriculoDisciplina->id = $row['id'];
		$curriculoDisciplina->disciplinaId = $row['disciplina_id'];
		$curriculoDisciplina->curriculoId = $row['curriculo_id'];
		$curriculoDisciplina->cargaHoraria = $row['carga_horaria'];
		$curriculoDisciplina->bloco = $row['bloco'];
		$curriculoDisciplina->cursoId = $row['curso_id'];
		$curriculoDisciplina->created = $row['created'];
		$curriculoDisciplina->status = $row['status'];

		return $curriculoDisciplina;
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
	 * @return CurriculoDisciplina 
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