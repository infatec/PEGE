<?php
/**
 * Classe operadora da tabela 'transferencia'. banco msSql.
 *
 * @author:frame arser
 * @date: 2012-04-17 20:14
 */
class TransferenciaDAO extends Model implements TransferenciaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Transferencia 
	 */
	public function load($id){
		$sql = 'SELECT * FROM transferencia WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Transferencia      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM transferencia '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM transferencia '.$criterio.'';
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
		$sql = 'SELECT * FROM transferencia ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param transferencia primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM transferencia WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Transferencia transferencia
 	 */
	public function insert($transferencia){
		$sql = 'INSERT INTO transferencia (bloco, data_transferencia, aluno_id, ocorre_acad_id, curso_id) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($transferencia->bloco);
		$sqlQuery->set($transferencia->dataTransferencia);
		$sqlQuery->setNumber($transferencia->alunoId);
		$sqlQuery->setNumber($transferencia->ocorreAcadId);
		$sqlQuery->setNumber($transferencia->cursoId);

		$id = $this->executeInsert($sqlQuery);	
		$transferencia->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Transferencia transferencia
 	 */
	public function update($transferencia){
		$campos = "";
        
        
		 if(!empty($transferencia->bloco)) $campos .=' bloco = ?,';
		 if(!empty($transferencia->dataTransferencia)) $campos .=' data_transferencia = ?,';
		 if(!empty($transferencia->alunoId)) $campos .=' aluno_id = ?,';
		 if(!empty($transferencia->ocorreAcadId)) $campos .=' ocorre_acad_id = ?,';
		 if(!empty($transferencia->cursoId)) $campos .=' curso_id = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE transferencia SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($transferencia->bloco)) 		$sqlQuery->setNumber($transferencia->bloco);
		 if(!empty($transferencia->dataTransferencia)) 		$sqlQuery->set($transferencia->dataTransferencia);
		 if(!empty($transferencia->alunoId)) 		$sqlQuery->setNumber($transferencia->alunoId);
		 if(!empty($transferencia->ocorreAcadId)) 		$sqlQuery->setNumber($transferencia->ocorreAcadId);
		 if(!empty($transferencia->cursoId)) 		$sqlQuery->setNumber($transferencia->cursoId);

		$sqlQuery->setNumber($transferencia->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM transferencia';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByBloco($value){
		$sql = 'SELECT * FROM transferencia WHERE bloco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataTransferencia($value){
		$sql = 'SELECT * FROM transferencia WHERE data_transferencia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAlunoId($value){
		$sql = 'SELECT * FROM transferencia WHERE aluno_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOcorreAcadId($value){
		$sql = 'SELECT * FROM transferencia WHERE ocorre_acad_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCursoId($value){
		$sql = 'SELECT * FROM transferencia WHERE curso_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByBloco($value){
		$sql = 'DELETE FROM transferencia WHERE bloco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataTransferencia($value){
		$sql = 'DELETE FROM transferencia WHERE data_transferencia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAlunoId($value){
		$sql = 'DELETE FROM transferencia WHERE aluno_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOcorreAcadId($value){
		$sql = 'DELETE FROM transferencia WHERE ocorre_acad_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCursoId($value){
		$sql = 'DELETE FROM transferencia WHERE curso_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Transferencia 
	 */
	protected function readRow($row){
		$transferencia = new Transferencia();
		
		$transferencia->id = $row['id'];
		$transferencia->bloco = $row['bloco'];
		$transferencia->dataTransferencia = $row['data_transferencia'];
		$transferencia->alunoId = $row['aluno_id'];
		$transferencia->ocorreAcadId = $row['ocorre_acad_id'];
		$transferencia->cursoId = $row['curso_id'];

		return $transferencia;
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
	 * @return Transferencia 
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