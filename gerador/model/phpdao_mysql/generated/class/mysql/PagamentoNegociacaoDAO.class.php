<?php
/**
 * Classe operadora da tabela 'pagamento_negociacao'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-11 12:27
 */
class PagamentoNegociacaoDAO extends Model implements PagamentoNegociacaoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return PagamentoNegociacao 
	 */
	public function load($id){
		$sql = 'SELECT * FROM pagamento_negociacao WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return PagamentoNegociacao      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM pagamento_negociacao '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM pagamento_negociacao '.$criterio.'';
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
		$sql = 'SELECT * FROM pagamento_negociacao ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param pagamentoNegociacao primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM pagamento_negociacao WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param PagamentoNegociacao pagamentoNegociacao
 	 */
	public function insert($pagamentoNegociacao){
		$sql = 'INSERT INTO pagamento_negociacao (numcheque, data_cheque, valor, valor_cobrado, data_devolucao, data_deposito, data_representacao2, data_devolucao2, data_enviocobranca, data_regularizacao, especieBaixaCartao, observacao, tipo_especie_id, conta_id, cartao_id, emitente_id, agencias_id, negociacao_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($pagamentoNegociacao->numcheque);
		$sqlQuery->set($pagamentoNegociacao->dataCheque);
		$sqlQuery->set($pagamentoNegociacao->valor);
		$sqlQuery->set($pagamentoNegociacao->valorCobrado);
		$sqlQuery->set($pagamentoNegociacao->dataDevolucao);
		$sqlQuery->set($pagamentoNegociacao->dataDeposito);
		$sqlQuery->set($pagamentoNegociacao->dataRepresentacao2);
		$sqlQuery->set($pagamentoNegociacao->dataDevolucao2);
		$sqlQuery->set($pagamentoNegociacao->dataEnviocobranca);
		$sqlQuery->set($pagamentoNegociacao->dataRegularizacao);
		$sqlQuery->set($pagamentoNegociacao->especieBaixaCartao);
		$sqlQuery->set($pagamentoNegociacao->observacao);
		$sqlQuery->setNumber($pagamentoNegociacao->tipoEspecieId);
		$sqlQuery->setNumber($pagamentoNegociacao->contaId);
		$sqlQuery->setNumber($pagamentoNegociacao->cartaoId);
		$sqlQuery->setNumber($pagamentoNegociacao->emitenteId);
		$sqlQuery->setNumber($pagamentoNegociacao->agenciasId);
		$sqlQuery->setNumber($pagamentoNegociacao->negociacaoId);

		$id = $this->executeInsert($sqlQuery);	
		$pagamentoNegociacao->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param PagamentoNegociacao pagamentoNegociacao
 	 */
	public function update($pagamentoNegociacao){
		$campos = "";
        
        
		 if(!empty($pagamentoNegociacao->numcheque)) $campos .=' numcheque = ?,';
		 if(!empty($pagamentoNegociacao->dataCheque)) $campos .=' data_cheque = ?,';
		 if(!empty($pagamentoNegociacao->valor)) $campos .=' valor = ?,';
		 if(!empty($pagamentoNegociacao->valorCobrado)) $campos .=' valor_cobrado = ?,';
		 if(!empty($pagamentoNegociacao->dataDevolucao)) $campos .=' data_devolucao = ?,';
		 if(!empty($pagamentoNegociacao->dataDeposito)) $campos .=' data_deposito = ?,';
		 if(!empty($pagamentoNegociacao->dataRepresentacao2)) $campos .=' data_representacao2 = ?,';
		 if(!empty($pagamentoNegociacao->dataDevolucao2)) $campos .=' data_devolucao2 = ?,';
		 if(!empty($pagamentoNegociacao->dataEnviocobranca)) $campos .=' data_enviocobranca = ?,';
		 if(!empty($pagamentoNegociacao->dataRegularizacao)) $campos .=' data_regularizacao = ?,';
		 if(!empty($pagamentoNegociacao->especieBaixaCartao)) $campos .=' especieBaixaCartao = ?,';
		 if(!empty($pagamentoNegociacao->observacao)) $campos .=' observacao = ?,';
		 if(!empty($pagamentoNegociacao->tipoEspecieId)) $campos .=' tipo_especie_id = ?,';
		 if(!empty($pagamentoNegociacao->contaId)) $campos .=' conta_id = ?,';
		 if(!empty($pagamentoNegociacao->cartaoId)) $campos .=' cartao_id = ?,';
		 if(!empty($pagamentoNegociacao->emitenteId)) $campos .=' emitente_id = ?,';
		 if(!empty($pagamentoNegociacao->agenciasId)) $campos .=' agencias_id = ?,';
		 if(!empty($pagamentoNegociacao->negociacaoId)) $campos .=' negociacao_id = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE pagamento_negociacao SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($pagamentoNegociacao->numcheque)) 		$sqlQuery->set($pagamentoNegociacao->numcheque);
		 if(!empty($pagamentoNegociacao->dataCheque)) 		$sqlQuery->set($pagamentoNegociacao->dataCheque);
		 if(!empty($pagamentoNegociacao->valor)) 		$sqlQuery->set($pagamentoNegociacao->valor);
		 if(!empty($pagamentoNegociacao->valorCobrado)) 		$sqlQuery->set($pagamentoNegociacao->valorCobrado);
		 if(!empty($pagamentoNegociacao->dataDevolucao)) 		$sqlQuery->set($pagamentoNegociacao->dataDevolucao);
		 if(!empty($pagamentoNegociacao->dataDeposito)) 		$sqlQuery->set($pagamentoNegociacao->dataDeposito);
		 if(!empty($pagamentoNegociacao->dataRepresentacao2)) 		$sqlQuery->set($pagamentoNegociacao->dataRepresentacao2);
		 if(!empty($pagamentoNegociacao->dataDevolucao2)) 		$sqlQuery->set($pagamentoNegociacao->dataDevolucao2);
		 if(!empty($pagamentoNegociacao->dataEnviocobranca)) 		$sqlQuery->set($pagamentoNegociacao->dataEnviocobranca);
		 if(!empty($pagamentoNegociacao->dataRegularizacao)) 		$sqlQuery->set($pagamentoNegociacao->dataRegularizacao);
		 if(!empty($pagamentoNegociacao->especieBaixaCartao)) 		$sqlQuery->set($pagamentoNegociacao->especieBaixaCartao);
		 if(!empty($pagamentoNegociacao->observacao)) 		$sqlQuery->set($pagamentoNegociacao->observacao);
		 if(!empty($pagamentoNegociacao->tipoEspecieId)) 		$sqlQuery->setNumber($pagamentoNegociacao->tipoEspecieId);
		 if(!empty($pagamentoNegociacao->contaId)) 		$sqlQuery->setNumber($pagamentoNegociacao->contaId);
		 if(!empty($pagamentoNegociacao->cartaoId)) 		$sqlQuery->setNumber($pagamentoNegociacao->cartaoId);
		 if(!empty($pagamentoNegociacao->emitenteId)) 		$sqlQuery->setNumber($pagamentoNegociacao->emitenteId);
		 if(!empty($pagamentoNegociacao->agenciasId)) 		$sqlQuery->setNumber($pagamentoNegociacao->agenciasId);
		 if(!empty($pagamentoNegociacao->negociacaoId)) 		$sqlQuery->setNumber($pagamentoNegociacao->negociacaoId);

		$sqlQuery->setNumber($pagamentoNegociacao->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM pagamento_negociacao';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNumcheque($value){
		$sql = 'SELECT * FROM pagamento_negociacao WHERE numcheque = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataCheque($value){
		$sql = 'SELECT * FROM pagamento_negociacao WHERE data_cheque = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValor($value){
		$sql = 'SELECT * FROM pagamento_negociacao WHERE valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValorCobrado($value){
		$sql = 'SELECT * FROM pagamento_negociacao WHERE valor_cobrado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataDevolucao($value){
		$sql = 'SELECT * FROM pagamento_negociacao WHERE data_devolucao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataDeposito($value){
		$sql = 'SELECT * FROM pagamento_negociacao WHERE data_deposito = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataRepresentacao2($value){
		$sql = 'SELECT * FROM pagamento_negociacao WHERE data_representacao2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataDevolucao2($value){
		$sql = 'SELECT * FROM pagamento_negociacao WHERE data_devolucao2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataEnviocobranca($value){
		$sql = 'SELECT * FROM pagamento_negociacao WHERE data_enviocobranca = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataRegularizacao($value){
		$sql = 'SELECT * FROM pagamento_negociacao WHERE data_regularizacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEspecieBaixaCartao($value){
		$sql = 'SELECT * FROM pagamento_negociacao WHERE especieBaixaCartao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByObservacao($value){
		$sql = 'SELECT * FROM pagamento_negociacao WHERE observacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipoEspecieId($value){
		$sql = 'SELECT * FROM pagamento_negociacao WHERE tipo_especie_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByContaId($value){
		$sql = 'SELECT * FROM pagamento_negociacao WHERE conta_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCartaoId($value){
		$sql = 'SELECT * FROM pagamento_negociacao WHERE cartao_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmitenteId($value){
		$sql = 'SELECT * FROM pagamento_negociacao WHERE emitente_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAgenciasId($value){
		$sql = 'SELECT * FROM pagamento_negociacao WHERE agencias_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNegociacaoId($value){
		$sql = 'SELECT * FROM pagamento_negociacao WHERE negociacao_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNumcheque($value){
		$sql = 'DELETE FROM pagamento_negociacao WHERE numcheque = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataCheque($value){
		$sql = 'DELETE FROM pagamento_negociacao WHERE data_cheque = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValor($value){
		$sql = 'DELETE FROM pagamento_negociacao WHERE valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValorCobrado($value){
		$sql = 'DELETE FROM pagamento_negociacao WHERE valor_cobrado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataDevolucao($value){
		$sql = 'DELETE FROM pagamento_negociacao WHERE data_devolucao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataDeposito($value){
		$sql = 'DELETE FROM pagamento_negociacao WHERE data_deposito = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataRepresentacao2($value){
		$sql = 'DELETE FROM pagamento_negociacao WHERE data_representacao2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataDevolucao2($value){
		$sql = 'DELETE FROM pagamento_negociacao WHERE data_devolucao2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataEnviocobranca($value){
		$sql = 'DELETE FROM pagamento_negociacao WHERE data_enviocobranca = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataRegularizacao($value){
		$sql = 'DELETE FROM pagamento_negociacao WHERE data_regularizacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEspecieBaixaCartao($value){
		$sql = 'DELETE FROM pagamento_negociacao WHERE especieBaixaCartao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByObservacao($value){
		$sql = 'DELETE FROM pagamento_negociacao WHERE observacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipoEspecieId($value){
		$sql = 'DELETE FROM pagamento_negociacao WHERE tipo_especie_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByContaId($value){
		$sql = 'DELETE FROM pagamento_negociacao WHERE conta_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCartaoId($value){
		$sql = 'DELETE FROM pagamento_negociacao WHERE cartao_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmitenteId($value){
		$sql = 'DELETE FROM pagamento_negociacao WHERE emitente_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAgenciasId($value){
		$sql = 'DELETE FROM pagamento_negociacao WHERE agencias_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNegociacaoId($value){
		$sql = 'DELETE FROM pagamento_negociacao WHERE negociacao_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return PagamentoNegociacao 
	 */
	protected function readRow($row){
		$pagamentoNegociacao = new PagamentoNegociacao();
		
		$pagamentoNegociacao->id = $row['id'];
		$pagamentoNegociacao->numcheque = $row['numcheque'];
		$pagamentoNegociacao->dataCheque = $row['data_cheque'];
		$pagamentoNegociacao->valor = $row['valor'];
		$pagamentoNegociacao->valorCobrado = $row['valor_cobrado'];
		$pagamentoNegociacao->dataDevolucao = $row['data_devolucao'];
		$pagamentoNegociacao->dataDeposito = $row['data_deposito'];
		$pagamentoNegociacao->dataRepresentacao2 = $row['data_representacao2'];
		$pagamentoNegociacao->dataDevolucao2 = $row['data_devolucao2'];
		$pagamentoNegociacao->dataEnviocobranca = $row['data_enviocobranca'];
		$pagamentoNegociacao->dataRegularizacao = $row['data_regularizacao'];
		$pagamentoNegociacao->especieBaixaCartao = $row['especieBaixaCartao'];
		$pagamentoNegociacao->observacao = $row['observacao'];
		$pagamentoNegociacao->tipoEspecieId = $row['tipo_especie_id'];
		$pagamentoNegociacao->contaId = $row['conta_id'];
		$pagamentoNegociacao->cartaoId = $row['cartao_id'];
		$pagamentoNegociacao->emitenteId = $row['emitente_id'];
		$pagamentoNegociacao->agenciasId = $row['agencias_id'];
		$pagamentoNegociacao->negociacaoId = $row['negociacao_id'];

		return $pagamentoNegociacao;
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
	 * @return PagamentoNegociacao 
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