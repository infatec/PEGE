<?php
/**
 * Classe operadora da tabela 'nota'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class NotaDAO extends Model implements NotaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Nota 
	 */
	public function load($id){
		$sql = 'SELECT * FROM nota WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Nota      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM nota '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM nota '.$criterio.'';
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
		$sql = 'SELECT * FROM nota ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param nota primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM nota WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Nota nota
 	 */
	public function insert($nota){
		$sql = 'INSERT INTO nota (matricula_id, turma_disciplina_id, num_nota, conceito, valor) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($nota->matriculaId);
		$sqlQuery->setNumber($nota->turmaDisciplinaId);
		$sqlQuery->setNumber($nota->numNota);
		$sqlQuery->set($nota->conceito);
		$sqlQuery->set($nota->valor);

		$id = $this->executeInsert($sqlQuery);	
		$nota->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Nota nota
 	 */
	public function update($nota){
		$campos = "";
        
        
		 if(!empty($nota->matriculaId)) $campos .=' matricula_id = ?,';
		 if(!empty($nota->turmaDisciplinaId)) $campos .=' turma_disciplina_id = ?,';
		 if(!empty($nota->numNota)) $campos .=' num_nota = ?,';
		 if(!empty($nota->conceito)) $campos .=' conceito = ?,';
		 if(!empty($nota->valor)) $campos .=' valor = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE nota SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($nota->matriculaId)) 		$sqlQuery->setNumber($nota->matriculaId);
		 if(!empty($nota->turmaDisciplinaId)) 		$sqlQuery->setNumber($nota->turmaDisciplinaId);
		 if(!empty($nota->numNota)) 		$sqlQuery->setNumber($nota->numNota);
		 if(!empty($nota->conceito)) 		$sqlQuery->set($nota->conceito);
		 if(!empty($nota->valor)) 		$sqlQuery->set($nota->valor);

		$sqlQuery->setNumber($nota->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM nota';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByMatriculaId($value){
		$sql = 'SELECT * FROM nota WHERE matricula_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTurmaDisciplinaId($value){
		$sql = 'SELECT * FROM nota WHERE turma_disciplina_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumNota($value){
		$sql = 'SELECT * FROM nota WHERE num_nota = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByConceito($value){
		$sql = 'SELECT * FROM nota WHERE conceito = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValor($value){
		$sql = 'SELECT * FROM nota WHERE valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByMatriculaId($value){
		$sql = 'DELETE FROM nota WHERE matricula_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTurmaDisciplinaId($value){
		$sql = 'DELETE FROM nota WHERE turma_disciplina_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumNota($value){
		$sql = 'DELETE FROM nota WHERE num_nota = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByConceito($value){
		$sql = 'DELETE FROM nota WHERE conceito = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValor($value){
		$sql = 'DELETE FROM nota WHERE valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Nota 
	 */
	protected function readRow($row){
		$nota = new Nota();
		
		$nota->id = $row['id'];
		$nota->matriculaId = $row['matricula_id'];
		$nota->turmaDisciplinaId = $row['turma_disciplina_id'];
		$nota->numNota = $row['num_nota'];
		$nota->conceito = $row['conceito'];
		$nota->valor = $row['valor'];

		return $nota;
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
	 * @return Nota 
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