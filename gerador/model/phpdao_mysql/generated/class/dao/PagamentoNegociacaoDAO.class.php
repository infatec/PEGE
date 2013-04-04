<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-11 12:27
 */
interface PagamentoNegociacaoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return PagamentoNegociacao 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return PagamentoNegociacao      
	 */
	public function queryAll($campos="*",$criterio="");
    
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio="");
	
    /**
	 * Retorna todos os registro ordenado pelo campos
	 *
	 * @param $orderColumn nome da coluna
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Deleta registro da tabela
 	 * @param pagamentoNegociacao primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param PagamentoNegociacao pagamentoNegociacao
 	 */
	public function insert($pagamentoNegociacao);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param PagamentoNegociacao pagamentoNegociacao
 	 */
	public function update($pagamentoNegociacao);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByNumcheque($value);

	public function queryByDataCheque($value);

	public function queryByValor($value);

	public function queryByValorCobrado($value);

	public function queryByDataDevolucao($value);

	public function queryByDataDeposito($value);

	public function queryByDataRepresentacao2($value);

	public function queryByDataDevolucao2($value);

	public function queryByDataEnviocobranca($value);

	public function queryByDataRegularizacao($value);

	public function queryByEspecieBaixaCartao($value);

	public function queryByObservacao($value);

	public function queryByTipoEspecieId($value);

	public function queryByContaId($value);

	public function queryByCartaoId($value);

	public function queryByEmitenteId($value);

	public function queryByAgenciasId($value);

	public function queryByNegociacaoId($value);


	public function deleteByNumcheque($value);

	public function deleteByDataCheque($value);

	public function deleteByValor($value);

	public function deleteByValorCobrado($value);

	public function deleteByDataDevolucao($value);

	public function deleteByDataDeposito($value);

	public function deleteByDataRepresentacao2($value);

	public function deleteByDataDevolucao2($value);

	public function deleteByDataEnviocobranca($value);

	public function deleteByDataRegularizacao($value);

	public function deleteByEspecieBaixaCartao($value);

	public function deleteByObservacao($value);

	public function deleteByTipoEspecieId($value);

	public function deleteByContaId($value);

	public function deleteByCartaoId($value);

	public function deleteByEmitenteId($value);

	public function deleteByAgenciasId($value);

	public function deleteByNegociacaoId($value);


}
?>