<?php
/**
 * Classe operadora da tabela 'situacao_agendamento'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-02-02 11:43
 */
class SituacaoAgendamentoDAO extends Model implements SituacaoAgendamentoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return SituacaoAgendamento 
	 */
	public function load($id){
		$sql = 'SELECT * FROM situacao_agendamento WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return SituacaoAgendamento      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM situacao_agendamento '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM situacao_agendamento '.$criterio.'';
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
		$sql = 'SELECT * FROM situacao_agendamento ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param situacaoAgendamento primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM situacao_agendamento WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param SituacaoAgendamento situacaoAgendamento
 	 */
	public function insert($situacaoAgendamento){
		$sql = 'INSERT INTO situacao_agendamento (descricao) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($situacaoAgendamento->descricao);

		$id = $this->executeInsert($sqlQuery);	
		$situacaoAgendamento->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param SituacaoAgendamento situacaoAgendamento
 	 */
	public function update($situacaoAgendamento){
		$campos = "";
        
        
		 if(!empty($situacaoAgendamento->descricao)) $campos .=' descricao = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE situacao_agendamento SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($situacaoAgendamento->descricao)) 		$sqlQuery->set($situacaoAgendamento->descricao);

		$sqlQuery->setNumber($situacaoAgendamento->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM situacao_agendamento';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM situacao_agendamento WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescricao($value){
		$sql = 'DELETE FROM situacao_agendamento WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return SituacaoAgendamento 
	 */
	protected function readRow($row){
		$situacaoAgendamento = new SituacaoAgendamento();
		
		$situacaoAgendamento->id = $row['id'];
		$situacaoAgendamento->descricao = $row['descricao'];

		return $situacaoAgendamento;
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
	 * @return SituacaoAgendamento 
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