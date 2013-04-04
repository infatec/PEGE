<?php
/**
 * Classe operadora da tabela 'agendamento'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-02-02 11:43
 */
class AgendamentoDAO extends Model implements AgendamentoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Agendamento 
	 */
	public function load($id){
		$sql = 'SELECT * FROM agendamento WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Agendamento      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM agendamento '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM agendamento '.$criterio.'';
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
		$sql = 'SELECT * FROM agendamento ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param agendamento primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM agendamento WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Agendamento agendamento
 	 */
	public function insert($agendamento){
		$sql = 'INSERT INTO agendamento (ordem, situacao_agendamento_id, contas_a_receber_id, cliente_id, data_marcacao, hora_marcacao, descricao_servico, created, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($agendamento->ordem);
		$sqlQuery->setNumber($agendamento->situacaoAgendamentoId);
		$sqlQuery->setNumber($agendamento->contasAReceberId);
		$sqlQuery->setNumber($agendamento->clienteId);
		$sqlQuery->set($agendamento->dataMarcacao);
		$sqlQuery->set($agendamento->horaMarcacao);
		$sqlQuery->set($agendamento->descricaoServico);
		$sqlQuery->set($agendamento->created);
		$sqlQuery->set($agendamento->status);

		$id = $this->executeInsert($sqlQuery);	
		$agendamento->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Agendamento agendamento
 	 */
	public function update($agendamento){
		$campos = "";
        
        
		 if(!empty($agendamento->ordem)) $campos .=' ordem = ?,';
		 if(!empty($agendamento->situacaoAgendamentoId)) $campos .=' situacao_agendamento_id = ?,';
		 if(!empty($agendamento->contasAReceberId)) $campos .=' contas_a_receber_id = ?,';
		 if(!empty($agendamento->clienteId)) $campos .=' cliente_id = ?,';
		 if(!empty($agendamento->dataMarcacao)) $campos .=' data_marcacao = ?,';
		 if(!empty($agendamento->horaMarcacao)) $campos .=' hora_marcacao = ?,';
		 if(!empty($agendamento->descricaoServico)) $campos .=' descricao_servico = ?,';
		 if(!empty($agendamento->created)) $campos .=' created = ?,';
		 if(!empty($agendamento->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE agendamento SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($agendamento->ordem)) 		$sqlQuery->setNumber($agendamento->ordem);
		 if(!empty($agendamento->situacaoAgendamentoId)) 		$sqlQuery->setNumber($agendamento->situacaoAgendamentoId);
		 if(!empty($agendamento->contasAReceberId)) 		$sqlQuery->setNumber($agendamento->contasAReceberId);
		 if(!empty($agendamento->clienteId)) 		$sqlQuery->setNumber($agendamento->clienteId);
		 if(!empty($agendamento->dataMarcacao)) 		$sqlQuery->set($agendamento->dataMarcacao);
		 if(!empty($agendamento->horaMarcacao)) 		$sqlQuery->set($agendamento->horaMarcacao);
		 if(!empty($agendamento->descricaoServico)) 		$sqlQuery->set($agendamento->descricaoServico);
		 if(!empty($agendamento->created)) 		$sqlQuery->set($agendamento->created);
		 if(!empty($agendamento->status)) 		$sqlQuery->set($agendamento->status);

		$sqlQuery->setNumber($agendamento->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM agendamento';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByOrdem($value){
		$sql = 'SELECT * FROM agendamento WHERE ordem = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySituacaoAgendamentoId($value){
		$sql = 'SELECT * FROM agendamento WHERE situacao_agendamento_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByContasAReceberId($value){
		$sql = 'SELECT * FROM agendamento WHERE contas_a_receber_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByClienteId($value){
		$sql = 'SELECT * FROM agendamento WHERE cliente_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataMarcacao($value){
		$sql = 'SELECT * FROM agendamento WHERE data_marcacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHoraMarcacao($value){
		$sql = 'SELECT * FROM agendamento WHERE hora_marcacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescricaoServico($value){
		$sql = 'SELECT * FROM agendamento WHERE descricao_servico = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM agendamento WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM agendamento WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByOrdem($value){
		$sql = 'DELETE FROM agendamento WHERE ordem = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySituacaoAgendamentoId($value){
		$sql = 'DELETE FROM agendamento WHERE situacao_agendamento_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByContasAReceberId($value){
		$sql = 'DELETE FROM agendamento WHERE contas_a_receber_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByClienteId($value){
		$sql = 'DELETE FROM agendamento WHERE cliente_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataMarcacao($value){
		$sql = 'DELETE FROM agendamento WHERE data_marcacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHoraMarcacao($value){
		$sql = 'DELETE FROM agendamento WHERE hora_marcacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescricaoServico($value){
		$sql = 'DELETE FROM agendamento WHERE descricao_servico = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM agendamento WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM agendamento WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Agendamento 
	 */
	protected function readRow($row){
		$agendamento = new Agendamento();
		
		$agendamento->id = $row['id'];
		$agendamento->ordem = $row['ordem'];
		$agendamento->situacaoAgendamentoId = $row['situacao_agendamento_id'];
		$agendamento->contasAReceberId = $row['contas_a_receber_id'];
		$agendamento->clienteId = $row['cliente_id'];
		$agendamento->dataMarcacao = $row['data_marcacao'];
		$agendamento->horaMarcacao = $row['hora_marcacao'];
		$agendamento->descricaoServico = $row['descricao_servico'];
		$agendamento->created = $row['created'];
		$agendamento->status = $row['status'];

		return $agendamento;
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
	 * @return Agendamento 
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