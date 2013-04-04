<?php
/**
 * Classe operadora da tabela 'conta_a_pagar'. banco msSql.
 *
 * @author:frame arser
 * @date: 2011-03-11 12:27
 */
class ContaAPagarDAO extends Model implements ContaAPagarI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return ContaAPagar 
	 */
	public function load($id){
		$sql = 'SELECT * FROM conta_a_pagar WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return ContaAPagar      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM conta_a_pagar '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM conta_a_pagar '.$criterio.'';
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
		$sql = 'SELECT * FROM conta_a_pagar ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param contaAPagar primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM conta_a_pagar WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param ContaAPagar contaAPagar
 	 */
	public function insert($contaAPagar){
		$sql = 'INSERT INTO conta_a_pagar (valor_total, descricao, observacao, num_documento, data_documento, parcela, data_vencimento, valor_pago, data_pagamento, usuario_cadastro_id, usuario_baixa_id, forma_pagamento_id, situacao_pagamento_id, abertura_fechamento_caixa_id, caixa_id, subcategoria_id, centro_custo_id, categoria_transacao_id, plano_conta_id, fornecedor_id, cartao_empresa_id, qtd_parcelas, valor_parcela, cancelado_parcela, cancelado_baixa, entrada, data_abertura, created, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($contaAPagar->valorTotal);
		$sqlQuery->set($contaAPagar->descricao);
		$sqlQuery->set($contaAPagar->observacao);
		$sqlQuery->set($contaAPagar->numDocumento);
		$sqlQuery->set($contaAPagar->dataDocumento);
		$sqlQuery->set($contaAPagar->parcela);
		$sqlQuery->set($contaAPagar->dataVencimento);
		$sqlQuery->set($contaAPagar->valorPago);
		$sqlQuery->set($contaAPagar->dataPagamento);
		$sqlQuery->setNumber($contaAPagar->usuarioCadastroId);
		$sqlQuery->setNumber($contaAPagar->usuarioBaixaId);
		$sqlQuery->setNumber($contaAPagar->formaPagamentoId);
		$sqlQuery->setNumber($contaAPagar->situacaoPagamentoId);
		$sqlQuery->setNumber($contaAPagar->aberturaFechamentoCaixaId);
		$sqlQuery->setNumber($contaAPagar->caixaId);
		$sqlQuery->setNumber($contaAPagar->subcategoriaId);
		$sqlQuery->setNumber($contaAPagar->centroCustoId);
		$sqlQuery->setNumber($contaAPagar->categoriaTransacaoId);
		$sqlQuery->setNumber($contaAPagar->planoContaId);
		$sqlQuery->setNumber($contaAPagar->fornecedorId);
		$sqlQuery->setNumber($contaAPagar->cartaoEmpresaId);
		$sqlQuery->setNumber($contaAPagar->qtdParcela);
		$sqlQuery->set($contaAPagar->valorParcela);
		$sqlQuery->setNumber($contaAPagar->canceladoParcela);
		$sqlQuery->setNumber($contaAPagar->canceladoBaixa);
		$sqlQuery->set($contaAPagar->entrada);
		$sqlQuery->set($contaAPagar->dataAbertura);
		$sqlQuery->set($contaAPagar->created);
		$sqlQuery->set($contaAPagar->status);

		$id = $this->executeInsert($sqlQuery);	
		$contaAPagar->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param ContaAPagar contaAPagar
 	 */
	public function update($contaAPagar){
		$campos = "";
        
        
		 if(!empty($contaAPagar->valorTotal)) $campos .=' valor_total = ?,';
		 if(!empty($contaAPagar->descricao)) $campos .=' descricao = ?,';
		 if(!empty($contaAPagar->observacao)) $campos .=' observacao = ?,';
		 if(!empty($contaAPagar->numDocumento)) $campos .=' num_documento = ?,';
		 if(!empty($contaAPagar->dataDocumento)) $campos .=' data_documento = ?,';
		 if(!empty($contaAPagar->parcela)) $campos .=' parcela = ?,';
		 if(!empty($contaAPagar->dataVencimento)) $campos .=' data_vencimento = ?,';
		 if(!empty($contaAPagar->valorPago)) $campos .=' valor_pago = ?,';
		 if(!empty($contaAPagar->dataPagamento)) $campos .=' data_pagamento = ?,';
		 if(!empty($contaAPagar->usuarioCadastroId)) $campos .=' usuario_cadastro_id = ?,';
		 if(!empty($contaAPagar->usuarioBaixaId)) $campos .=' usuario_baixa_id = ?,';
		 if(!empty($contaAPagar->formaPagamentoId)) $campos .=' forma_pagamento_id = ?,';
		 if(!empty($contaAPagar->situacaoPagamentoId)) $campos .=' situacao_pagamento_id = ?,';
		 if(!empty($contaAPagar->aberturaFechamentoCaixaId)) $campos .=' abertura_fechamento_caixa_id = ?,';
		 if(!empty($contaAPagar->caixaId)) $campos .=' caixa_id = ?,';
		 if(!empty($contaAPagar->subcategoriaId)) $campos .=' subcategoria_id = ?,';
		 if(!empty($contaAPagar->centroCustoId)) $campos .=' centro_custo_id = ?,';
		 if(!empty($contaAPagar->categoriaTransacaoId)) $campos .=' categoria_transacao_id = ?,';
		 if(!empty($contaAPagar->planoContaId)) $campos .=' plano_conta_id = ?,';
		 if(!empty($contaAPagar->fornecedorId)) $campos .=' fornecedor_id = ?,';
		 if(!empty($contaAPagar->cartaoEmpresaId)) $campos .=' cartao_empresa_id = ?,';
		 if(!empty($contaAPagar->qtdParcela)) $campos .=' qtd_parcelas = ?,';
		 if(!empty($contaAPagar->valorParcela)) $campos .=' valor_parcela = ?,';
		 if(!empty($contaAPagar->canceladoParcela)) $campos .=' cancelado_parcela = ?,';
		 if(!empty($contaAPagar->canceladoBaixa)) $campos .=' cancelado_baixa = ?,';
		 if(!empty($contaAPagar->entrada)) $campos .=' entrada = ?,';
		 if(!empty($contaAPagar->dataAbertura)) $campos .=' data_abertura = ?,';
		 if(!empty($contaAPagar->created)) $campos .=' created = ?,';
		 if(!empty($contaAPagar->status)) $campos .=' status = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE conta_a_pagar SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($contaAPagar->valorTotal)) 		$sqlQuery->set($contaAPagar->valorTotal);
		 if(!empty($contaAPagar->descricao)) 		$sqlQuery->set($contaAPagar->descricao);
		 if(!empty($contaAPagar->observacao)) 		$sqlQuery->set($contaAPagar->observacao);
		 if(!empty($contaAPagar->numDocumento)) 		$sqlQuery->set($contaAPagar->numDocumento);
		 if(!empty($contaAPagar->dataDocumento)) 		$sqlQuery->set($contaAPagar->dataDocumento);
		 if(!empty($contaAPagar->parcela)) 		$sqlQuery->set($contaAPagar->parcela);
		 if(!empty($contaAPagar->dataVencimento)) 		$sqlQuery->set($contaAPagar->dataVencimento);
		 if(!empty($contaAPagar->valorPago)) 		$sqlQuery->set($contaAPagar->valorPago);
		 if(!empty($contaAPagar->dataPagamento)) 		$sqlQuery->set($contaAPagar->dataPagamento);
		 if(!empty($contaAPagar->usuarioCadastroId)) 		$sqlQuery->setNumber($contaAPagar->usuarioCadastroId);
		 if(!empty($contaAPagar->usuarioBaixaId)) 		$sqlQuery->setNumber($contaAPagar->usuarioBaixaId);
		 if(!empty($contaAPagar->formaPagamentoId)) 		$sqlQuery->setNumber($contaAPagar->formaPagamentoId);
		 if(!empty($contaAPagar->situacaoPagamentoId)) 		$sqlQuery->setNumber($contaAPagar->situacaoPagamentoId);
		 if(!empty($contaAPagar->aberturaFechamentoCaixaId)) 		$sqlQuery->setNumber($contaAPagar->aberturaFechamentoCaixaId);
		 if(!empty($contaAPagar->caixaId)) 		$sqlQuery->setNumber($contaAPagar->caixaId);
		 if(!empty($contaAPagar->subcategoriaId)) 		$sqlQuery->setNumber($contaAPagar->subcategoriaId);
		 if(!empty($contaAPagar->centroCustoId)) 		$sqlQuery->setNumber($contaAPagar->centroCustoId);
		 if(!empty($contaAPagar->categoriaTransacaoId)) 		$sqlQuery->setNumber($contaAPagar->categoriaTransacaoId);
		 if(!empty($contaAPagar->planoContaId)) 		$sqlQuery->setNumber($contaAPagar->planoContaId);
		 if(!empty($contaAPagar->fornecedorId)) 		$sqlQuery->setNumber($contaAPagar->fornecedorId);
		 if(!empty($contaAPagar->cartaoEmpresaId)) 		$sqlQuery->setNumber($contaAPagar->cartaoEmpresaId);
		 if(!empty($contaAPagar->qtdParcela)) 		$sqlQuery->setNumber($contaAPagar->qtdParcela);
		 if(!empty($contaAPagar->valorParcela)) 		$sqlQuery->set($contaAPagar->valorParcela);
		 if(!empty($contaAPagar->canceladoParcela)) 		$sqlQuery->setNumber($contaAPagar->canceladoParcela);
		 if(!empty($contaAPagar->canceladoBaixa)) 		$sqlQuery->setNumber($contaAPagar->canceladoBaixa);
		 if(!empty($contaAPagar->entrada)) 		$sqlQuery->set($contaAPagar->entrada);
		 if(!empty($contaAPagar->dataAbertura)) 		$sqlQuery->set($contaAPagar->dataAbertura);
		 if(!empty($contaAPagar->created)) 		$sqlQuery->set($contaAPagar->created);
		 if(!empty($contaAPagar->status)) 		$sqlQuery->set($contaAPagar->status);

		$sqlQuery->setNumber($contaAPagar->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM conta_a_pagar';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByValorTotal($value){
		$sql = 'SELECT * FROM conta_a_pagar WHERE valor_total = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM conta_a_pagar WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByObservacao($value){
		$sql = 'SELECT * FROM conta_a_pagar WHERE observacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumDocumento($value){
		$sql = 'SELECT * FROM conta_a_pagar WHERE num_documento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataDocumento($value){
		$sql = 'SELECT * FROM conta_a_pagar WHERE data_documento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByParcela($value){
		$sql = 'SELECT * FROM conta_a_pagar WHERE parcela = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataVencimento($value){
		$sql = 'SELECT * FROM conta_a_pagar WHERE data_vencimento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValorPago($value){
		$sql = 'SELECT * FROM conta_a_pagar WHERE valor_pago = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataPagamento($value){
		$sql = 'SELECT * FROM conta_a_pagar WHERE data_pagamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUsuarioCadastroId($value){
		$sql = 'SELECT * FROM conta_a_pagar WHERE usuario_cadastro_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUsuarioBaixaId($value){
		$sql = 'SELECT * FROM conta_a_pagar WHERE usuario_baixa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFormaPagamentoId($value){
		$sql = 'SELECT * FROM conta_a_pagar WHERE forma_pagamento_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySituacaoPagamentoId($value){
		$sql = 'SELECT * FROM conta_a_pagar WHERE situacao_pagamento_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAberturaFechamentoCaixaId($value){
		$sql = 'SELECT * FROM conta_a_pagar WHERE abertura_fechamento_caixa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCaixaId($value){
		$sql = 'SELECT * FROM conta_a_pagar WHERE caixa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySubcategoriaId($value){
		$sql = 'SELECT * FROM conta_a_pagar WHERE subcategoria_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCentroCustoId($value){
		$sql = 'SELECT * FROM conta_a_pagar WHERE centro_custo_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCategoriaTransacaoId($value){
		$sql = 'SELECT * FROM conta_a_pagar WHERE categoria_transacao_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPlanoContaId($value){
		$sql = 'SELECT * FROM conta_a_pagar WHERE plano_conta_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFornecedorId($value){
		$sql = 'SELECT * FROM conta_a_pagar WHERE fornecedor_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCartaoEmpresaId($value){
		$sql = 'SELECT * FROM conta_a_pagar WHERE cartao_empresa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByQtdParcelas($value){
		$sql = 'SELECT * FROM conta_a_pagar WHERE qtd_parcelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValorParcela($value){
		$sql = 'SELECT * FROM conta_a_pagar WHERE valor_parcela = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCanceladoParcela($value){
		$sql = 'SELECT * FROM conta_a_pagar WHERE cancelado_parcela = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCanceladoBaixa($value){
		$sql = 'SELECT * FROM conta_a_pagar WHERE cancelado_baixa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEntrada($value){
		$sql = 'SELECT * FROM conta_a_pagar WHERE entrada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataAbertura($value){
		$sql = 'SELECT * FROM conta_a_pagar WHERE data_abertura = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM conta_a_pagar WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM conta_a_pagar WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByValorTotal($value){
		$sql = 'DELETE FROM conta_a_pagar WHERE valor_total = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescricao($value){
		$sql = 'DELETE FROM conta_a_pagar WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByObservacao($value){
		$sql = 'DELETE FROM conta_a_pagar WHERE observacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumDocumento($value){
		$sql = 'DELETE FROM conta_a_pagar WHERE num_documento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataDocumento($value){
		$sql = 'DELETE FROM conta_a_pagar WHERE data_documento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByParcela($value){
		$sql = 'DELETE FROM conta_a_pagar WHERE parcela = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataVencimento($value){
		$sql = 'DELETE FROM conta_a_pagar WHERE data_vencimento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValorPago($value){
		$sql = 'DELETE FROM conta_a_pagar WHERE valor_pago = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataPagamento($value){
		$sql = 'DELETE FROM conta_a_pagar WHERE data_pagamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUsuarioCadastroId($value){
		$sql = 'DELETE FROM conta_a_pagar WHERE usuario_cadastro_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUsuarioBaixaId($value){
		$sql = 'DELETE FROM conta_a_pagar WHERE usuario_baixa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFormaPagamentoId($value){
		$sql = 'DELETE FROM conta_a_pagar WHERE forma_pagamento_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySituacaoPagamentoId($value){
		$sql = 'DELETE FROM conta_a_pagar WHERE situacao_pagamento_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAberturaFechamentoCaixaId($value){
		$sql = 'DELETE FROM conta_a_pagar WHERE abertura_fechamento_caixa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCaixaId($value){
		$sql = 'DELETE FROM conta_a_pagar WHERE caixa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySubcategoriaId($value){
		$sql = 'DELETE FROM conta_a_pagar WHERE subcategoria_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCentroCustoId($value){
		$sql = 'DELETE FROM conta_a_pagar WHERE centro_custo_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCategoriaTransacaoId($value){
		$sql = 'DELETE FROM conta_a_pagar WHERE categoria_transacao_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPlanoContaId($value){
		$sql = 'DELETE FROM conta_a_pagar WHERE plano_conta_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFornecedorId($value){
		$sql = 'DELETE FROM conta_a_pagar WHERE fornecedor_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCartaoEmpresaId($value){
		$sql = 'DELETE FROM conta_a_pagar WHERE cartao_empresa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByQtdParcelas($value){
		$sql = 'DELETE FROM conta_a_pagar WHERE qtd_parcelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValorParcela($value){
		$sql = 'DELETE FROM conta_a_pagar WHERE valor_parcela = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCanceladoParcela($value){
		$sql = 'DELETE FROM conta_a_pagar WHERE cancelado_parcela = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCanceladoBaixa($value){
		$sql = 'DELETE FROM conta_a_pagar WHERE cancelado_baixa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEntrada($value){
		$sql = 'DELETE FROM conta_a_pagar WHERE entrada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataAbertura($value){
		$sql = 'DELETE FROM conta_a_pagar WHERE data_abertura = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM conta_a_pagar WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM conta_a_pagar WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return ContaAPagar 
	 */
	protected function readRow($row){
		$contaAPagar = new ContaAPagar();
		
		$contaAPagar->id = $row['id'];
		$contaAPagar->valorTotal = $row['valor_total'];
		$contaAPagar->descricao = $row['descricao'];
		$contaAPagar->observacao = $row['observacao'];
		$contaAPagar->numDocumento = $row['num_documento'];
		$contaAPagar->dataDocumento = $row['data_documento'];
		$contaAPagar->parcela = $row['parcela'];
		$contaAPagar->dataVencimento = $row['data_vencimento'];
		$contaAPagar->valorPago = $row['valor_pago'];
		$contaAPagar->dataPagamento = $row['data_pagamento'];
		$contaAPagar->usuarioCadastroId = $row['usuario_cadastro_id'];
		$contaAPagar->usuarioBaixaId = $row['usuario_baixa_id'];
		$contaAPagar->formaPagamentoId = $row['forma_pagamento_id'];
		$contaAPagar->situacaoPagamentoId = $row['situacao_pagamento_id'];
		$contaAPagar->aberturaFechamentoCaixaId = $row['abertura_fechamento_caixa_id'];
		$contaAPagar->caixaId = $row['caixa_id'];
		$contaAPagar->subcategoriaId = $row['subcategoria_id'];
		$contaAPagar->centroCustoId = $row['centro_custo_id'];
		$contaAPagar->categoriaTransacaoId = $row['categoria_transacao_id'];
		$contaAPagar->planoContaId = $row['plano_conta_id'];
		$contaAPagar->fornecedorId = $row['fornecedor_id'];
		$contaAPagar->cartaoEmpresaId = $row['cartao_empresa_id'];
		$contaAPagar->qtdParcela = $row['qtd_parcelas'];
		$contaAPagar->valorParcela = $row['valor_parcela'];
		$contaAPagar->canceladoParcela = $row['cancelado_parcela'];
		$contaAPagar->canceladoBaixa = $row['cancelado_baixa'];
		$contaAPagar->entrada = $row['entrada'];
		$contaAPagar->dataAbertura = $row['data_abertura'];
		$contaAPagar->created = $row['created'];
		$contaAPagar->status = $row['status'];

		return $contaAPagar;
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
	 * @return ContaAPagar 
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