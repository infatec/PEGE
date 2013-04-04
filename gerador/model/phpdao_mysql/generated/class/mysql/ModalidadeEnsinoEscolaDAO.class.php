<?php
/**
 * Classe operadora da tabela 'modalidade_ensino_escola'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class ModalidadeEnsinoEscolaDAO extends Model implements ModalidadeEnsinoEscolaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return ModalidadeEnsinoEscola 
	 */
	public function load($id){
		$sql = 'SELECT * FROM modalidade_ensino_escola WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return ModalidadeEnsinoEscola      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM modalidade_ensino_escola '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM modalidade_ensino_escola '.$criterio.'';
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
		$sql = 'SELECT * FROM modalidade_ensino_escola ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param modalidadeEnsinoEscola primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM modalidade_ensino_escola WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param ModalidadeEnsinoEscola modalidadeEnsinoEscola
 	 */
	public function insert($modalidadeEnsinoEscola){
		$sql = 'INSERT INTO modalidade_ensino_escola (escola_id, modalidade_ensino_mec_id) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($modalidadeEnsinoEscola->escolaId);
		$sqlQuery->setNumber($modalidadeEnsinoEscola->modalidadeEnsinoMecId);

		$id = $this->executeInsert($sqlQuery);	
		$modalidadeEnsinoEscola->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param ModalidadeEnsinoEscola modalidadeEnsinoEscola
 	 */
	public function update($modalidadeEnsinoEscola){
		$campos = "";
        
        
		 if(!empty($modalidadeEnsinoEscola->escolaId)) $campos .=' escola_id = ?,';
		 if(!empty($modalidadeEnsinoEscola->modalidadeEnsinoMecId)) $campos .=' modalidade_ensino_mec_id = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE modalidade_ensino_escola SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($modalidadeEnsinoEscola->escolaId)) 		$sqlQuery->setNumber($modalidadeEnsinoEscola->escolaId);
		 if(!empty($modalidadeEnsinoEscola->modalidadeEnsinoMecId)) 		$sqlQuery->setNumber($modalidadeEnsinoEscola->modalidadeEnsinoMecId);

		$sqlQuery->setNumber($modalidadeEnsinoEscola->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM modalidade_ensino_escola';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByEscolaId($value){
		$sql = 'SELECT * FROM modalidade_ensino_escola WHERE escola_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByModalidadeEnsinoMecId($value){
		$sql = 'SELECT * FROM modalidade_ensino_escola WHERE modalidade_ensino_mec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByEscolaId($value){
		$sql = 'DELETE FROM modalidade_ensino_escola WHERE escola_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByModalidadeEnsinoMecId($value){
		$sql = 'DELETE FROM modalidade_ensino_escola WHERE modalidade_ensino_mec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return ModalidadeEnsinoEscola 
	 */
	protected function readRow($row){
		$modalidadeEnsinoEscola = new ModalidadeEnsinoEscola();
		
		$modalidadeEnsinoEscola->id = $row['id'];
		$modalidadeEnsinoEscola->escolaId = $row['escola_id'];
		$modalidadeEnsinoEscola->modalidadeEnsinoMecId = $row['modalidade_ensino_mec_id'];

		return $modalidadeEnsinoEscola;
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
	 * @return ModalidadeEnsinoEscola 
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