<?php
/**
 * Classe operadora da tabela 'curriculo_curso'. banco msSql.
 *
 * @author:frame arser
 * @date: 2012-04-17 20:14
 */
class CurriculoCursoDAO extends Model implements CurriculoCursoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return CurriculoCurso 
	 */
	public function load($id){
		$sql = 'SELECT * FROM curriculo_curso WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return CurriculoCurso      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM curriculo_curso '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM curriculo_curso '.$criterio.'';
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
		$sql = 'SELECT * FROM curriculo_curso ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param curriculoCurso primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM curriculo_curso WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param CurriculoCurso curriculoCurso
 	 */
	public function insert($curriculoCurso){
		$sql = 'INSERT INTO curriculo_curso (curso_id, curriculo_id, carga_horaria_disciplina, duracao_min, duracao_med, duracao_max, carga_horaria_estagio, carga_horaria_ex_curricular, created, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($curriculoCurso->cursoId);
		$sqlQuery->setNumber($curriculoCurso->curriculoId);
		$sqlQuery->setNumber($curriculoCurso->cargaHorariaDisciplina);
		$sqlQuery->setNumber($curriculoCurso->duracaoMin);
		$sqlQuery->setNumber($curriculoCurso->duracaoMed);
		$sqlQuery->setNumber($curriculoCurso->duracaoMax);
		$sqlQuery->setNumber($curriculoCurso->cargaHorariaEstagio);
		$sqlQuery->setNumber($curriculoCurso->cargaHorariaExCurricular);
		$sqlQuery->set($curriculoCurso->created);
		$sqlQuery->setNumber($curriculoCurso->status);

		$id = $this->executeInsert($sqlQuery);	
		$curriculoCurso->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param CurriculoCurso curriculoCurso
 	 */
	public function update($curriculoCurso){
		$campos = "";
        
        
		 if(!empty($curriculoCurso->cursoId)) $campos .=' curso_id = ?,';
		 if(!empty($curriculoCurso->curriculoId)) $campos .=' curriculo_id = ?,';
		 if(!empty($curriculoCurso->cargaHorariaDisciplina)) $campos .=' carga_horaria_disciplina = ?,';
		 if(!empty($curriculoCurso->duracaoMin)) $campos .=' duracao_min = ?,';
		 if(!empty($curriculoCurso->duracaoMed)) $campos .=' duracao_med = ?,';
		 if(!empty($curriculoCurso->duracaoMax)) $campos .=' duracao_max = ?,';
		 if(!empty($curriculoCurso->cargaHorariaEstagio)) $campos .=' carga_horaria_estagio = ?,';
		 if(!empty($curriculoCurso->cargaHorariaExCurricular)) $campos .=' carga_horaria_ex_curricular = ?,';
		 if(!empty($curriculoCurso->created)) $campos .=' created = ?,';
		 if(!empty($curriculoCurso->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE curriculo_curso SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($curriculoCurso->cursoId)) 		$sqlQuery->setNumber($curriculoCurso->cursoId);
		 if(!empty($curriculoCurso->curriculoId)) 		$sqlQuery->setNumber($curriculoCurso->curriculoId);
		 if(!empty($curriculoCurso->cargaHorariaDisciplina)) 		$sqlQuery->setNumber($curriculoCurso->cargaHorariaDisciplina);
		 if(!empty($curriculoCurso->duracaoMin)) 		$sqlQuery->setNumber($curriculoCurso->duracaoMin);
		 if(!empty($curriculoCurso->duracaoMed)) 		$sqlQuery->setNumber($curriculoCurso->duracaoMed);
		 if(!empty($curriculoCurso->duracaoMax)) 		$sqlQuery->setNumber($curriculoCurso->duracaoMax);
		 if(!empty($curriculoCurso->cargaHorariaEstagio)) 		$sqlQuery->setNumber($curriculoCurso->cargaHorariaEstagio);
		 if(!empty($curriculoCurso->cargaHorariaExCurricular)) 		$sqlQuery->setNumber($curriculoCurso->cargaHorariaExCurricular);
		 if(!empty($curriculoCurso->created)) 		$sqlQuery->set($curriculoCurso->created);
		 if(!empty($curriculoCurso->status)) 		$sqlQuery->setNumber($curriculoCurso->status);

		$sqlQuery->setNumber($curriculoCurso->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM curriculo_curso';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCursoId($value){
		$sql = 'SELECT * FROM curriculo_curso WHERE curso_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCurriculoId($value){
		$sql = 'SELECT * FROM curriculo_curso WHERE curriculo_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCargaHorariaDisciplina($value){
		$sql = 'SELECT * FROM curriculo_curso WHERE carga_horaria_disciplina = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDuracaoMin($value){
		$sql = 'SELECT * FROM curriculo_curso WHERE duracao_min = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDuracaoMed($value){
		$sql = 'SELECT * FROM curriculo_curso WHERE duracao_med = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDuracaoMax($value){
		$sql = 'SELECT * FROM curriculo_curso WHERE duracao_max = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCargaHorariaEstagio($value){
		$sql = 'SELECT * FROM curriculo_curso WHERE carga_horaria_estagio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCargaHorariaExCurricular($value){
		$sql = 'SELECT * FROM curriculo_curso WHERE carga_horaria_ex_curricular = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM curriculo_curso WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM curriculo_curso WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCursoId($value){
		$sql = 'DELETE FROM curriculo_curso WHERE curso_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCurriculoId($value){
		$sql = 'DELETE FROM curriculo_curso WHERE curriculo_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCargaHorariaDisciplina($value){
		$sql = 'DELETE FROM curriculo_curso WHERE carga_horaria_disciplina = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDuracaoMin($value){
		$sql = 'DELETE FROM curriculo_curso WHERE duracao_min = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDuracaoMed($value){
		$sql = 'DELETE FROM curriculo_curso WHERE duracao_med = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDuracaoMax($value){
		$sql = 'DELETE FROM curriculo_curso WHERE duracao_max = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCargaHorariaEstagio($value){
		$sql = 'DELETE FROM curriculo_curso WHERE carga_horaria_estagio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCargaHorariaExCurricular($value){
		$sql = 'DELETE FROM curriculo_curso WHERE carga_horaria_ex_curricular = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM curriculo_curso WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM curriculo_curso WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return CurriculoCurso 
	 */
	protected function readRow($row){
		$curriculoCurso = new CurriculoCurso();
		
		$curriculoCurso->id = $row['id'];
		$curriculoCurso->cursoId = $row['curso_id'];
		$curriculoCurso->curriculoId = $row['curriculo_id'];
		$curriculoCurso->cargaHorariaDisciplina = $row['carga_horaria_disciplina'];
		$curriculoCurso->duracaoMin = $row['duracao_min'];
		$curriculoCurso->duracaoMed = $row['duracao_med'];
		$curriculoCurso->duracaoMax = $row['duracao_max'];
		$curriculoCurso->cargaHorariaEstagio = $row['carga_horaria_estagio'];
		$curriculoCurso->cargaHorariaExCurricular = $row['carga_horaria_ex_curricular'];
		$curriculoCurso->created = $row['created'];
		$curriculoCurso->status = $row['status'];

		return $curriculoCurso;
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
	 * @return CurriculoCurso 
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