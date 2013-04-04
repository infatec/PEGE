<?php
/**
 * Classe operadora da tabela 'professor_turma'. banco msSql.
 *
 * @author:frame arser
 * @date: 2012-04-17 20:14
 */
class ProfessorTurmaDAO extends Model implements ProfessorTurmaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return ProfessorTurma 
	 */
	public function load($id){
		$sql = 'SELECT * FROM professor_turma WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return ProfessorTurma      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM professor_turma '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM professor_turma '.$criterio.'';
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
		$sql = 'SELECT * FROM professor_turma ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param professorTurma primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM professor_turma WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param ProfessorTurma professorTurma
 	 */
	public function insert($professorTurma){
		$sql = 'INSERT INTO professor_turma (professor_id, turma_id, sala_id, horario_aula_id, seg, ter, quar, quint, sexta, sab, dom) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($professorTurma->professorId);
		$sqlQuery->setNumber($professorTurma->turmaId);
		$sqlQuery->setNumber($professorTurma->salaId);
		$sqlQuery->setNumber($professorTurma->horarioAulaId);
		$sqlQuery->set($professorTurma->seg);
		$sqlQuery->set($professorTurma->ter);
		$sqlQuery->set($professorTurma->quar);
		$sqlQuery->set($professorTurma->quint);
		$sqlQuery->set($professorTurma->sexta);
		$sqlQuery->set($professorTurma->sab);
		$sqlQuery->set($professorTurma->dom);

		$id = $this->executeInsert($sqlQuery);	
		$professorTurma->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param ProfessorTurma professorTurma
 	 */
	public function update($professorTurma){
		$campos = "";
        
        
		 if(!empty($professorTurma->professorId)) $campos .=' professor_id = ?,';
		 if(!empty($professorTurma->turmaId)) $campos .=' turma_id = ?,';
		 if(!empty($professorTurma->salaId)) $campos .=' sala_id = ?,';
		 if(!empty($professorTurma->horarioAulaId)) $campos .=' horario_aula_id = ?,';
		 if(!empty($professorTurma->seg)) $campos .=' seg = ?,';
		 if(!empty($professorTurma->ter)) $campos .=' ter = ?,';
		 if(!empty($professorTurma->quar)) $campos .=' quar = ?,';
		 if(!empty($professorTurma->quint)) $campos .=' quint = ?,';
		 if(!empty($professorTurma->sexta)) $campos .=' sexta = ?,';
		 if(!empty($professorTurma->sab)) $campos .=' sab = ?,';
		 if(!empty($professorTurma->dom)) $campos .=' dom = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE professor_turma SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($professorTurma->professorId)) 		$sqlQuery->setNumber($professorTurma->professorId);
		 if(!empty($professorTurma->turmaId)) 		$sqlQuery->setNumber($professorTurma->turmaId);
		 if(!empty($professorTurma->salaId)) 		$sqlQuery->setNumber($professorTurma->salaId);
		 if(!empty($professorTurma->horarioAulaId)) 		$sqlQuery->setNumber($professorTurma->horarioAulaId);
		 if(!empty($professorTurma->seg)) 		$sqlQuery->set($professorTurma->seg);
		 if(!empty($professorTurma->ter)) 		$sqlQuery->set($professorTurma->ter);
		 if(!empty($professorTurma->quar)) 		$sqlQuery->set($professorTurma->quar);
		 if(!empty($professorTurma->quint)) 		$sqlQuery->set($professorTurma->quint);
		 if(!empty($professorTurma->sexta)) 		$sqlQuery->set($professorTurma->sexta);
		 if(!empty($professorTurma->sab)) 		$sqlQuery->set($professorTurma->sab);
		 if(!empty($professorTurma->dom)) 		$sqlQuery->set($professorTurma->dom);

		$sqlQuery->setNumber($professorTurma->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM professor_turma';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByProfessorId($value){
		$sql = 'SELECT * FROM professor_turma WHERE professor_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTurmaId($value){
		$sql = 'SELECT * FROM professor_turma WHERE turma_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySalaId($value){
		$sql = 'SELECT * FROM professor_turma WHERE sala_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHorarioAulaId($value){
		$sql = 'SELECT * FROM professor_turma WHERE horario_aula_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySeg($value){
		$sql = 'SELECT * FROM professor_turma WHERE seg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTer($value){
		$sql = 'SELECT * FROM professor_turma WHERE ter = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByQuar($value){
		$sql = 'SELECT * FROM professor_turma WHERE quar = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByQuint($value){
		$sql = 'SELECT * FROM professor_turma WHERE quint = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySexta($value){
		$sql = 'SELECT * FROM professor_turma WHERE sexta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySab($value){
		$sql = 'SELECT * FROM professor_turma WHERE sab = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDom($value){
		$sql = 'SELECT * FROM professor_turma WHERE dom = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByProfessorId($value){
		$sql = 'DELETE FROM professor_turma WHERE professor_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTurmaId($value){
		$sql = 'DELETE FROM professor_turma WHERE turma_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySalaId($value){
		$sql = 'DELETE FROM professor_turma WHERE sala_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHorarioAulaId($value){
		$sql = 'DELETE FROM professor_turma WHERE horario_aula_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySeg($value){
		$sql = 'DELETE FROM professor_turma WHERE seg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTer($value){
		$sql = 'DELETE FROM professor_turma WHERE ter = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByQuar($value){
		$sql = 'DELETE FROM professor_turma WHERE quar = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByQuint($value){
		$sql = 'DELETE FROM professor_turma WHERE quint = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySexta($value){
		$sql = 'DELETE FROM professor_turma WHERE sexta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySab($value){
		$sql = 'DELETE FROM professor_turma WHERE sab = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDom($value){
		$sql = 'DELETE FROM professor_turma WHERE dom = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return ProfessorTurma 
	 */
	protected function readRow($row){
		$professorTurma = new ProfessorTurma();
		
		$professorTurma->id = $row['id'];
		$professorTurma->professorId = $row['professor_id'];
		$professorTurma->turmaId = $row['turma_id'];
		$professorTurma->salaId = $row['sala_id'];
		$professorTurma->horarioAulaId = $row['horario_aula_id'];
		$professorTurma->seg = $row['seg'];
		$professorTurma->ter = $row['ter'];
		$professorTurma->quar = $row['quar'];
		$professorTurma->quint = $row['quint'];
		$professorTurma->sexta = $row['sexta'];
		$professorTurma->sab = $row['sab'];
		$professorTurma->dom = $row['dom'];

		return $professorTurma;
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
	 * @return ProfessorTurma 
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