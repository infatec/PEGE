<?php
/**
 * Classe operadora da tabela 'carteira_estudantil'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class CarteiraEstudantilDAO extends Model implements CarteiraEstudantilI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return CarteiraEstudantil 
	 */
	public function load($id){
		$sql = 'SELECT * FROM carteira_estudantil WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return CarteiraEstudantil      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM carteira_estudantil '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM carteira_estudantil '.$criterio.'';
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
		$sql = 'SELECT * FROM carteira_estudantil ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param carteiraEstudantil primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM carteira_estudantil WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param CarteiraEstudantil carteiraEstudantil
 	 */
	public function insert($carteiraEstudantil){
		$sql = 'INSERT INTO carteira_estudantil (escola_id, aluno_id, turma, turno, matricula, foto, created, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($carteiraEstudantil->escolaId);
		$sqlQuery->setNumber($carteiraEstudantil->alunoId);
		$sqlQuery->set($carteiraEstudantil->turma);
		$sqlQuery->set($carteiraEstudantil->turno);
		$sqlQuery->set($carteiraEstudantil->matricula);
		$sqlQuery->set($carteiraEstudantil->foto);
		$sqlQuery->set($carteiraEstudantil->created);
		$sqlQuery->set($carteiraEstudantil->status);

		$id = $this->executeInsert($sqlQuery);	
		$carteiraEstudantil->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param CarteiraEstudantil carteiraEstudantil
 	 */
	public function update($carteiraEstudantil){
		$campos = "";
        
        
		 if(!empty($carteiraEstudantil->escolaId)) $campos .=' escola_id = ?,';
		 if(!empty($carteiraEstudantil->alunoId)) $campos .=' aluno_id = ?,';
		 if(!empty($carteiraEstudantil->turma)) $campos .=' turma = ?,';
		 if(!empty($carteiraEstudantil->turno)) $campos .=' turno = ?,';
		 if(!empty($carteiraEstudantil->matricula)) $campos .=' matricula = ?,';
		 if(!empty($carteiraEstudantil->foto)) $campos .=' foto = ?,';
		 if(!empty($carteiraEstudantil->created)) $campos .=' created = ?,';
		 if(!empty($carteiraEstudantil->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE carteira_estudantil SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($carteiraEstudantil->escolaId)) 		$sqlQuery->setNumber($carteiraEstudantil->escolaId);
		 if(!empty($carteiraEstudantil->alunoId)) 		$sqlQuery->setNumber($carteiraEstudantil->alunoId);
		 if(!empty($carteiraEstudantil->turma)) 		$sqlQuery->set($carteiraEstudantil->turma);
		 if(!empty($carteiraEstudantil->turno)) 		$sqlQuery->set($carteiraEstudantil->turno);
		 if(!empty($carteiraEstudantil->matricula)) 		$sqlQuery->set($carteiraEstudantil->matricula);
		 if(!empty($carteiraEstudantil->foto)) 		$sqlQuery->set($carteiraEstudantil->foto);
		 if(!empty($carteiraEstudantil->created)) 		$sqlQuery->set($carteiraEstudantil->created);
		 if(!empty($carteiraEstudantil->status)) 		$sqlQuery->set($carteiraEstudantil->status);

		$sqlQuery->setNumber($carteiraEstudantil->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM carteira_estudantil';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByEscolaId($value){
		$sql = 'SELECT * FROM carteira_estudantil WHERE escola_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAlunoId($value){
		$sql = 'SELECT * FROM carteira_estudantil WHERE aluno_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTurma($value){
		$sql = 'SELECT * FROM carteira_estudantil WHERE turma = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTurno($value){
		$sql = 'SELECT * FROM carteira_estudantil WHERE turno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMatricula($value){
		$sql = 'SELECT * FROM carteira_estudantil WHERE matricula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFoto($value){
		$sql = 'SELECT * FROM carteira_estudantil WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM carteira_estudantil WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM carteira_estudantil WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByEscolaId($value){
		$sql = 'DELETE FROM carteira_estudantil WHERE escola_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAlunoId($value){
		$sql = 'DELETE FROM carteira_estudantil WHERE aluno_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTurma($value){
		$sql = 'DELETE FROM carteira_estudantil WHERE turma = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTurno($value){
		$sql = 'DELETE FROM carteira_estudantil WHERE turno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMatricula($value){
		$sql = 'DELETE FROM carteira_estudantil WHERE matricula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFoto($value){
		$sql = 'DELETE FROM carteira_estudantil WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM carteira_estudantil WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM carteira_estudantil WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return CarteiraEstudantil 
	 */
	protected function readRow($row){
		$carteiraEstudantil = new CarteiraEstudantil();
		
		$carteiraEstudantil->id = $row['id'];
		$carteiraEstudantil->escolaId = $row['escola_id'];
		$carteiraEstudantil->alunoId = $row['aluno_id'];
		$carteiraEstudantil->turma = $row['turma'];
		$carteiraEstudantil->turno = $row['turno'];
		$carteiraEstudantil->matricula = $row['matricula'];
		$carteiraEstudantil->foto = $row['foto'];
		$carteiraEstudantil->created = $row['created'];
		$carteiraEstudantil->status = $row['status'];

		return $carteiraEstudantil;
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
	 * @return CarteiraEstudantil 
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