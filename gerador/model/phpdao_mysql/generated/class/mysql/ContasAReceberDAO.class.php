<?php
/**
 * Classe operadora da tabela 'contas_a_receber'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-11 12:27
 */
class ContasAReceberDAO extends Model implements ContasAReceberI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return ContasAReceber 
	 */
	public function load($id){
		$sql = 'SELECT * FROM contas_a_receber WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return ContasAReceber      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM contas_a_receber '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM contas_a_receber '.$criterio.'';
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
		$sql = 'SELECT * FROM contas_a_receber ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param contasAReceber primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM contas_a_receber WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param ContasAReceber contasAReceber
 	 */
	public function insert($contasAReceber){
		$sql = 'INSERT INTO contas_a_receber (descricao, data_abertura, valor_pago, observacao, data_vencimento, parcela, usuario_cadastro_id, usuario_baixa_id, created, status, situacao_pagamento_id, forma_pagamento_id, centro_custo_id, plano_conta_id, subcategoria_id, caixa_id, abertura_fechamento_caixa_id, qtd_parcelas, valor_total, entrada, valor_parcela, categoria_transacao_id, cancelado_parcela, cancelado_baixa, data_pagamento, acrescimo, desconto, liga_conta_r_p_s_id, cartao_venda_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($contasAReceber->descricao);
		$sqlQuery->set($contasAReceber->dataAbertura);
		$sqlQuery->set($contasAReceber->valorPago);
		$sqlQuery->set($contasAReceber->observacao);
		$sqlQuery->set($contasAReceber->dataVencimento);
		$sqlQuery->setNumber($contasAReceber->parcela);
		$sqlQuery->setNumber($contasAReceber->usuarioCadastroId);
		$sqlQuery->setNumber($contasAReceber->usuarioBaixaId);
		$sqlQuery->set($contasAReceber->created);
		$sqlQuery->setNumber($contasAReceber->status);
		$sqlQuery->setNumber($contasAReceber->situacaoPagamentoId);
		$sqlQuery->setNumber($contasAReceber->formaPagamentoId);
		$sqlQuery->setNumber($contasAReceber->centroCustoId);
		$sqlQuery->setNumber($contasAReceber->planoContaId);
		$sqlQuery->setNumber($contasAReceber->subcategoriaId);
		$sqlQuery->setNumber($contasAReceber->caixaId);
		$sqlQuery->setNumber($contasAReceber->aberturaFechamentoCaixaId);
		$sqlQuery->setNumber($contasAReceber->qtdParcela);
		$sqlQuery->set($contasAReceber->valorTotal);
		$sqlQuery->set($contasAReceber->entrada);
		$sqlQuery->set($contasAReceber->valorParcela);
		$sqlQuery->setNumber($contasAReceber->categoriaTransacaoId);
		$sqlQuery->setNumber($contasAReceber->canceladoParcela);
		$sqlQuery->setNumber($contasAReceber->canceladoBaixa);
		$sqlQuery->set($contasAReceber->dataPagamento);
		$sqlQuery->set($contasAReceber->acrescimo);
		$sqlQuery->set($contasAReceber->desconto);
		$sqlQuery->setNumber($contasAReceber->ligaContaRPSId);
		$sqlQuery->setNumber($contasAReceber->cartaoVendaId);

		$id = $this->executeInsert($sqlQuery);	
		$contasAReceber->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param ContasAReceber contasAReceber
 	 */
	public function update($contasAReceber){
		$campos = "";
        
        
		 if(!empty($contasAReceber->descricao)) $campos .=' descricao = ?,';
		 if(!empty($contasAReceber->dataAbertura)) $campos .=' data_abertura = ?,';
		 if(!empty($contasAReceber->valorPago)) $campos .=' valor_pago = ?,';
		 if(!empty($contasAReceber->observacao)) $campos .=' observacao = ?,';
		 if(!empty($contasAReceber->dataVencimento)) $campos .=' data_vencimento = ?,';
		 if(!empty($contasAReceber->parcela)) $campos .=' parcela = ?,';
		 if(!empty($contasAReceber->usuarioCadastroId)) $campos .=' usuario_cadastro_id = ?,';
		 if(!empty($contasAReceber->usuarioBaixaId)) $campos .=' usuario_baixa_id = ?,';
		 if(!empty($contasAReceber->created)) $campos .=' created = ?,';
		 if(!empty($contasAReceber->status)) $campos .=' status = ?,';
		 if(!empty($contasAReceber->situacaoPagamentoId)) $campos .=' situacao_pagamento_id = ?,';
		 if(!empty($contasAReceber->formaPagamentoId)) $campos .=' forma_pagamento_id = ?,';
		 if(!empty($contasAReceber->centroCustoId)) $campos .=' centro_custo_id = ?,';
		 if(!empty($contasAReceber->planoContaId)) $campos .=' plano_conta_id = ?,';
		 if(!empty($contasAReceber->subcategoriaId)) $campos .=' subcategoria_id = ?,';
		 if(!empty($contasAReceber->caixaId)) $campos .=' caixa_id = ?,';
		 if(!empty($contasAReceber->aberturaFechamentoCaixaId)) $campos .=' abertura_fechamento_caixa_id = ?,';
		 if(!empty($contasAReceber->qtdParcela)) $campos .=' qtd_parcelas = ?,';
		 if(!empty($contasAReceber->valorTotal)) $campos .=' valor_total = ?,';
		 if(!empty($contasAReceber->entrada)) $campos .=' entrada = ?,';
		 if(!empty($contasAReceber->valorParcela)) $campos .=' valor_parcela = ?,';
		 if(!empty($contasAReceber->categoriaTransacaoId)) $campos .=' categoria_transacao_id = ?,';
		 if(!empty($contasAReceber->canceladoParcela)) $campos .=' cancelado_parcela = ?,';
		 if(!empty($contasAReceber->canceladoBaixa)) $campos .=' cancelado_baixa = ?,';
		 if(!empty($contasAReceber->dataPagamento)) $campos .=' data_pagamento = ?,';
		 if(!empty($contasAReceber->acrescimo)) $campos .=' acrescimo = ?,';
		 if(!empty($contasAReceber->desconto)) $campos .=' desconto = ?,';
		 if(!empty($contasAReceber->ligaContaRPSId)) $campos .=' liga_conta_r_p_s_id = ?,';
		 if(!empty($contasAReceber->cartaoVendaId)) $campos .=' cartao_venda_id = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE contas_a_receber SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($contasAReceber->descricao)) 		$sqlQuery->set($contasAReceber->descricao);
		 if(!empty($contasAReceber->dataAbertura)) 		$sqlQuery->set($contasAReceber->dataAbertura);
		 if(!empty($contasAReceber->valorPago)) 		$sqlQuery->set($contasAReceber->valorPago);
		 if(!empty($contasAReceber->observacao)) 		$sqlQuery->set($contasAReceber->observacao);
		 if(!empty($contasAReceber->dataVencimento)) 		$sqlQuery->set($contasAReceber->dataVencimento);
		 if(!empty($contasAReceber->parcela)) 		$sqlQuery->setNumber($contasAReceber->parcela);
		 if(!empty($contasAReceber->usuarioCadastroId)) 		$sqlQuery->setNumber($contasAReceber->usuarioCadastroId);
		 if(!empty($contasAReceber->usuarioBaixaId)) 		$sqlQuery->setNumber($contasAReceber->usuarioBaixaId);
		 if(!empty($contasAReceber->created)) 		$sqlQuery->set($contasAReceber->created);
		 if(!empty($contasAReceber->status)) 		$sqlQuery->setNumber($contasAReceber->status);
		 if(!empty($contasAReceber->situacaoPagamentoId)) 		$sqlQuery->setNumber($contasAReceber->situacaoPagamentoId);
		 if(!empty($contasAReceber->formaPagamentoId)) 		$sqlQuery->setNumber($contasAReceber->formaPagamentoId);
		 if(!empty($contasAReceber->centroCustoId)) 		$sqlQuery->setNumber($contasAReceber->centroCustoId);
		 if(!empty($contasAReceber->planoContaId)) 		$sqlQuery->setNumber($contasAReceber->planoContaId);
		 if(!empty($contasAReceber->subcategoriaId)) 		$sqlQuery->setNumber($contasAReceber->subcategoriaId);
		 if(!empty($contasAReceber->caixaId)) 		$sqlQuery->setNumber($contasAReceber->caixaId);
		 if(!empty($contasAReceber->aberturaFechamentoCaixaId)) 		$sqlQuery->setNumber($contasAReceber->aberturaFechamentoCaixaId);
		 if(!empty($contasAReceber->qtdParcela)) 		$sqlQuery->setNumber($contasAReceber->qtdParcela);
		 if(!empty($contasAReceber->valorTotal)) 		$sqlQuery->set($contasAReceber->valorTotal);
		 if(!empty($contasAReceber->entrada)) 		$sqlQuery->set($contasAReceber->entrada);
		 if(!empty($contasAReceber->valorParcela)) 		$sqlQuery->set($contasAReceber->valorParcela);
		 if(!empty($contasAReceber->categoriaTransacaoId)) 		$sqlQuery->setNumber($contasAReceber->categoriaTransacaoId);
		 if(!empty($contasAReceber->canceladoParcela)) 		$sqlQuery->setNumber($contasAReceber->canceladoParcela);
		 if(!empty($contasAReceber->canceladoBaixa)) 		$sqlQuery->setNumber($contasAReceber->canceladoBaixa);
		 if(!empty($contasAReceber->dataPagamento)) 		$sqlQuery->set($contasAReceber->dataPagamento);
		 if(!empty($contasAReceber->acrescimo)) 		$sqlQuery->set($contasAReceber->acrescimo);
		 if(!empty($contasAReceber->desconto)) 		$sqlQuery->set($contasAReceber->desconto);
		 if(!empty($contasAReceber->ligaContaRPSId)) 		$sqlQuery->setNumber($contasAReceber->ligaContaRPSId);
		 if(!empty($contasAReceber->cartaoVendaId)) 		$sqlQuery->setNumber($contasAReceber->cartaoVendaId);

		$sqlQuery->setNumber($contasAReceber->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM contas_a_receber';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM contas_a_receber WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataAbertura($value){
		$sql = 'SELECT * FROM contas_a_receber WHERE data_abertura = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValorPago($value){
		$sql = 'SELECT * FROM contas_a_receber WHERE valor_pago = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByObservacao($value){
		$sql = 'SELECT * FROM contas_a_receber WHERE observacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataVencimento($value){
		$sql = 'SELECT * FROM contas_a_receber WHERE data_vencimento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByParcela($value){
		$sql = 'SELECT * FROM contas_a_receber WHERE parcela = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUsuarioCadastroId($value){
		$sql = 'SELECT * FROM contas_a_receber WHERE usuario_cadastro_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUsuarioBaixaId($value){
		$sql = 'SELECT * FROM contas_a_receber WHERE usuario_baixa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM contas_a_receber WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM contas_a_receber WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySituacaoPagamentoId($value){
		$sql = 'SELECT * FROM contas_a_receber WHERE situacao_pagamento_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFormaPagamentoId($value){
		$sql = 'SELECT * FROM contas_a_receber WHERE forma_pagamento_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCentroCustoId($value){
		$sql = 'SELECT * FROM contas_a_receber WHERE centro_custo_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPlanoContaId($value){
		$sql = 'SELECT * FROM contas_a_receber WHERE plano_conta_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySubcategoriaId($value){
		$sql = 'SELECT * FROM contas_a_receber WHERE subcategoria_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCaixaId($value){
		$sql = 'SELECT * FROM contas_a_receber WHERE caixa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAberturaFechamentoCaixaId($value){
		$sql = 'SELECT * FROM contas_a_receber WHERE abertura_fechamento_caixa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByQtdParcelas($value){
		$sql = 'SELECT * FROM contas_a_receber WHERE qtd_parcelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValorTotal($value){
		$sql = 'SELECT * FROM contas_a_receber WHERE valor_total = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEntrada($value){
		$sql = 'SELECT * FROM contas_a_receber WHERE entrada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValorParcela($value){
		$sql = 'SELECT * FROM contas_a_receber WHERE valor_parcela = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCategoriaTransacaoId($value){
		$sql = 'SELECT * FROM contas_a_receber WHERE categoria_transacao_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCanceladoParcela($value){
		$sql = 'SELECT * FROM contas_a_receber WHERE cancelado_parcela = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCanceladoBaixa($value){
		$sql = 'SELECT * FROM contas_a_receber WHERE cancelado_baixa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataPagamento($value){
		$sql = 'SELECT * FROM contas_a_receber WHERE data_pagamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAcrescimo($value){
		$sql = 'SELECT * FROM contas_a_receber WHERE acrescimo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDesconto($value){
		$sql = 'SELECT * FROM contas_a_receber WHERE desconto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLigaContaRPSId($value){
		$sql = 'SELECT * FROM contas_a_receber WHERE liga_conta_r_p_s_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCartaoVendaId($value){
		$sql = 'SELECT * FROM contas_a_receber WHERE cartao_venda_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescricao($value){
		$sql = 'DELETE FROM contas_a_receber WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataAbertura($value){
		$sql = 'DELETE FROM contas_a_receber WHERE data_abertura = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValorPago($value){
		$sql = 'DELETE FROM contas_a_receber WHERE valor_pago = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByObservacao($value){
		$sql = 'DELETE FROM contas_a_receber WHERE observacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataVencimento($value){
		$sql = 'DELETE FROM contas_a_receber WHERE data_vencimento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByParcela($value){
		$sql = 'DELETE FROM contas_a_receber WHERE parcela = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUsuarioCadastroId($value){
		$sql = 'DELETE FROM contas_a_receber WHERE usuario_cadastro_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUsuarioBaixaId($value){
		$sql = 'DELETE FROM contas_a_receber WHERE usuario_baixa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM contas_a_receber WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM contas_a_receber WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySituacaoPagamentoId($value){
		$sql = 'DELETE FROM contas_a_receber WHERE situacao_pagamento_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFormaPagamentoId($value){
		$sql = 'DELETE FROM contas_a_receber WHERE forma_pagamento_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCentroCustoId($value){
		$sql = 'DELETE FROM contas_a_receber WHERE centro_custo_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPlanoContaId($value){
		$sql = 'DELETE FROM contas_a_receber WHERE plano_conta_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySubcategoriaId($value){
		$sql = 'DELETE FROM contas_a_receber WHERE subcategoria_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCaixaId($value){
		$sql = 'DELETE FROM contas_a_receber WHERE caixa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAberturaFechamentoCaixaId($value){
		$sql = 'DELETE FROM contas_a_receber WHERE abertura_fechamento_caixa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByQtdParcelas($value){
		$sql = 'DELETE FROM contas_a_receber WHERE qtd_parcelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValorTotal($value){
		$sql = 'DELETE FROM contas_a_receber WHERE valor_total = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEntrada($value){
		$sql = 'DELETE FROM contas_a_receber WHERE entrada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValorParcela($value){
		$sql = 'DELETE FROM contas_a_receber WHERE valor_parcela = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCategoriaTransacaoId($value){
		$sql = 'DELETE FROM contas_a_receber WHERE categoria_transacao_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCanceladoParcela($value){
		$sql = 'DELETE FROM contas_a_receber WHERE cancelado_parcela = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCanceladoBaixa($value){
		$sql = 'DELETE FROM contas_a_receber WHERE cancelado_baixa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataPagamento($value){
		$sql = 'DELETE FROM contas_a_receber WHERE data_pagamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAcrescimo($value){
		$sql = 'DELETE FROM contas_a_receber WHERE acrescimo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDesconto($value){
		$sql = 'DELETE FROM contas_a_receber WHERE desconto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLigaContaRPSId($value){
		$sql = 'DELETE FROM contas_a_receber WHERE liga_conta_r_p_s_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCartaoVendaId($value){
		$sql = 'DELETE FROM contas_a_receber WHERE cartao_venda_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return ContasAReceber 
	 */
	protected function readRow($row){
		$contasAReceber = new ContasAReceber();
		
		$contasAReceber->id = $row['id'];
		$contasAReceber->descricao = $row['descricao'];
		$contasAReceber->dataAbertura = $row['data_abertura'];
		$contasAReceber->valorPago = $row['valor_pago'];
		$contasAReceber->observacao = $row['observacao'];
		$contasAReceber->dataVencimento = $row['data_vencimento'];
		$contasAReceber->parcela = $row['parcela'];
		$contasAReceber->usuarioCadastroId = $row['usuario_cadastro_id'];
		$contasAReceber->usuarioBaixaId = $row['usuario_baixa_id'];
		$contasAReceber->created = $row['created'];
		$contasAReceber->status = $row['status'];
		$contasAReceber->situacaoPagamentoId = $row['situacao_pagamento_id'];
		$contasAReceber->formaPagamentoId = $row['forma_pagamento_id'];
		$contasAReceber->centroCustoId = $row['centro_custo_id'];
		$contasAReceber->planoContaId = $row['plano_conta_id'];
		$contasAReceber->subcategoriaId = $row['subcategoria_id'];
		$contasAReceber->caixaId = $row['caixa_id'];
		$contasAReceber->aberturaFechamentoCaixaId = $row['abertura_fechamento_caixa_id'];
		$contasAReceber->qtdParcela = $row['qtd_parcelas'];
		$contasAReceber->valorTotal = $row['valor_total'];
		$contasAReceber->entrada = $row['entrada'];
		$contasAReceber->valorParcela = $row['valor_parcela'];
		$contasAReceber->categoriaTransacaoId = $row['categoria_transacao_id'];
		$contasAReceber->canceladoParcela = $row['cancelado_parcela'];
		$contasAReceber->canceladoBaixa = $row['cancelado_baixa'];
		$contasAReceber->dataPagamento = $row['data_pagamento'];
		$contasAReceber->acrescimo = $row['acrescimo'];
		$contasAReceber->desconto = $row['desconto'];
		$contasAReceber->ligaContaRPSId = $row['liga_conta_r_p_s_id'];
		$contasAReceber->cartaoVendaId = $row['cartao_venda_id'];

		return $contasAReceber;
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
	 * @return ContasAReceber 
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