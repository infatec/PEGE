<?php
/**
 * Classe operadora da tabela 'disciplina'. banco msSql.
 *
 * @author:frame arser
 * @date: 2012-04-17 20:14
 */
class DisciplinaDAO extends Model implements DisciplinaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Disciplina 
	 */
	public function load($id){
		$sql = 'SELECT * FROM disciplina WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Disciplina      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM disciplina '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM disciplina '.$criterio.'';
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
		$sql = 'SELECT * FROM disciplina ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param disciplina primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM disciplina WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Disciplina disciplina
 	 */
	public function insert($disciplina){
		$sql = 'INSERT INTO disciplina (tipo_disciplina_id, descricao, carga_horario_teorica, carga_horaria_pratica, created, status, curso_id, bloco) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($disciplina->tipoDisciplinaId);
		$sqlQuery->set($disciplina->descricao);
		$sqlQuery->setNumber($disciplina->cargaHorarioTeorica);
		$sqlQuery->setNumber($disciplina->cargaHorariaPratica);
		$sqlQuery->set($disciplina->created);
		$sqlQuery->setNumber($disciplina->status);
		$sqlQuery->setNumber($disciplina->cursoId);
		$sqlQuery->setNumber($disciplina->bloco);

		$id = $this->executeInsert($sqlQuery);	
		$disciplina->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Disciplina disciplina
 	 */
	public function update($disciplina){
		$campos = "";
        
        
		 if(!empty($disciplina->tipoDisciplinaId)) $campos .=' tipo_disciplina_id = ?,';
		 if(!empty($disciplina->descricao)) $campos .=' descricao = ?,';
		 if(!empty($disciplina->cargaHorarioTeorica)) $campos .=' carga_horario_teorica = ?,';
		 if(!empty($disciplina->cargaHorariaPratica)) $campos .=' carga_horaria_pratica = ?,';
		 if(!empty($disciplina->created)) $campos .=' created = ?,';
		 if(!empty($disciplina->status)) $campos .=' status = ?,';
		 if(!empty($disciplina->cursoId)) $campos .=' curso_id = ?,';
		 if(!empty($disciplina->bloco)) $campos .=' bloco = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE disciplina SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($disciplina->tipoDisciplinaId)) 		$sqlQuery->setNumber($disciplina->tipoDisciplinaId);
		 if(!empty($disciplina->descricao)) 		$sqlQuery->set($disciplina->descricao);
		 if(!empty($disciplina->cargaHorarioTeorica)) 		$sqlQuery->setNumber($disciplina->cargaHorarioTeorica);
		 if(!empty($disciplina->cargaHorariaPratica)) 		$sqlQuery->setNumber($disciplina->cargaHorariaPratica);
		 if(!empty($disciplina->created)) 		$sqlQuery->set($disciplina->created);
		 if(!empty($disciplina->status)) 		$sqlQuery->setNumber($disciplina->status);
		 if(!empty($disciplina->cursoId)) 		$sqlQuery->setNumber($disciplina->cursoId);
		 if(!empty($disciplina->bloco)) 		$sqlQuery->setNumber($disciplina->bloco);

		$sqlQuery->setNumber($disciplina->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM disciplina';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTipoDisciplinaId($value){
		$sql = 'SELECT * FROM disciplina WHERE tipo_disciplina_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM disciplina WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCargaHorarioTeorica($value){
		$sql = 'SELECT * FROM disciplina WHERE carga_horario_teorica = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCargaHorariaPratica($value){
		$sql = 'SELECT * FROM disciplina WHERE carga_horaria_pratica = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM disciplina WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM disciplina WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCursoId($value){
		$sql = 'SELECT * FROM disciplina WHERE curso_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBloco($value){
		$sql = 'SELECT * FROM disciplina WHERE bloco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTipoDisciplinaId($value){
		$sql = 'DELETE FROM disciplina WHERE tipo_disciplina_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescricao($value){
		$sql = 'DELETE FROM disciplina WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCargaHorarioTeorica($value){
		$sql = 'DELETE FROM disciplina WHERE carga_horario_teorica = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCargaHorariaPratica($value){
		$sql = 'DELETE FROM disciplina WHERE carga_horaria_pratica = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM disciplina WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM disciplina WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCursoId($value){
		$sql = 'DELETE FROM disciplina WHERE curso_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBloco($value){
		$sql = 'DELETE FROM disciplina WHERE bloco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Disciplina 
	 */
	protected function readRow($row){
		$disciplina = new Disciplina();
		
		$disciplina->id = $row['id'];
		$disciplina->tipoDisciplinaId = $row['tipo_disciplina_id'];
		$disciplina->descricao = $row['descricao'];
		$disciplina->cargaHorarioTeorica = $row['carga_horario_teorica'];
		$disciplina->cargaHorariaPratica = $row['carga_horaria_pratica'];
		$disciplina->created = $row['created'];
		$disciplina->status = $row['status'];
		$disciplina->cursoId = $row['curso_id'];
		$disciplina->bloco = $row['bloco'];

		return $disciplina;
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
	 * @return Disciplina 
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