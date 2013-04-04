<?php
/**
 * Classe operadora da tabela 'funcoes_escola'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class FuncoesEscolaDAO extends Model implements FuncoesEscolaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return FuncoesEscola 
	 */
	public function load($id){
		$sql = 'SELECT * FROM funcoes_escola WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return FuncoesEscola      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM funcoes_escola '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM funcoes_escola '.$criterio.'';
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
		$sql = 'SELECT * FROM funcoes_escola ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param funcoesEscola primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM funcoes_escola WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param FuncoesEscola funcoesEscola
 	 */
	public function insert($funcoesEscola){
		$sql = 'INSERT INTO funcoes_escola (escola_id, funcoes_mec_id) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($funcoesEscola->escolaId);
		$sqlQuery->setNumber($funcoesEscola->funcoesMecId);

		$id = $this->executeInsert($sqlQuery);	
		$funcoesEscola->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param FuncoesEscola funcoesEscola
 	 */
	public function update($funcoesEscola){
		$campos = "";
        
        
		 if(!empty($funcoesEscola->escolaId)) $campos .=' escola_id = ?,';
		 if(!empty($funcoesEscola->funcoesMecId)) $campos .=' funcoes_mec_id = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE funcoes_escola SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($funcoesEscola->escolaId)) 		$sqlQuery->setNumber($funcoesEscola->escolaId);
		 if(!empty($funcoesEscola->funcoesMecId)) 		$sqlQuery->setNumber($funcoesEscola->funcoesMecId);

		$sqlQuery->setNumber($funcoesEscola->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM funcoes_escola';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByEscolaId($value){
		$sql = 'SELECT * FROM funcoes_escola WHERE escola_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFuncoesMecId($value){
		$sql = 'SELECT * FROM funcoes_escola WHERE funcoes_mec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByEscolaId($value){
		$sql = 'DELETE FROM funcoes_escola WHERE escola_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFuncoesMecId($value){
		$sql = 'DELETE FROM funcoes_escola WHERE funcoes_mec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return FuncoesEscola 
	 */
	protected function readRow($row){
		$funcoesEscola = new FuncoesEscola();
		
		$funcoesEscola->id = $row['id'];
		$funcoesEscola->escolaId = $row['escola_id'];
		$funcoesEscola->funcoesMecId = $row['funcoes_mec_id'];

		return $funcoesEscola;
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
	 * @return FuncoesEscola 
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