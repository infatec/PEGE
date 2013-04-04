<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-11 12:27
 */
interface ContaAPagarI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return ContaAPagar 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return ContaAPagar      
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
 	 * @param contaAPagar primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param ContaAPagar contaAPagar
 	 */
	public function insert($contaAPagar);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param ContaAPagar contaAPagar
 	 */
	public function update($contaAPagar);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByValorTotal($value);

	public function queryByDescricao($value);

	public function queryByObservacao($value);

	public function queryByNumDocumento($value);

	public function queryByDataDocumento($value);

	public function queryByParcela($value);

	public function queryByDataVencimento($value);

	public function queryByValorPago($value);

	public function queryByDataPagamento($value);

	public function queryByUsuarioCadastroId($value);

	public function queryByUsuarioBaixaId($value);

	public function queryByFormaPagamentoId($value);

	public function queryBySituacaoPagamentoId($value);

	public function queryByAberturaFechamentoCaixaId($value);

	public function queryByCaixaId($value);

	public function queryBySubcategoriaId($value);

	public function queryByCentroCustoId($value);

	public function queryByCategoriaTransacaoId($value);

	public function queryByPlanoContaId($value);

	public function queryByFornecedorId($value);

	public function queryByCartaoEmpresaId($value);

	public function queryByQtdParcelas($value);

	public function queryByValorParcela($value);

	public function queryByCanceladoParcela($value);

	public function queryByCanceladoBaixa($value);

	public function queryByEntrada($value);

	public function queryByDataAbertura($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByValorTotal($value);

	public function deleteByDescricao($value);

	public function deleteByObservacao($value);

	public function deleteByNumDocumento($value);

	public function deleteByDataDocumento($value);

	public function deleteByParcela($value);

	public function deleteByDataVencimento($value);

	public function deleteByValorPago($value);

	public function deleteByDataPagamento($value);

	public function deleteByUsuarioCadastroId($value);

	public function deleteByUsuarioBaixaId($value);

	public function deleteByFormaPagamentoId($value);

	public function deleteBySituacaoPagamentoId($value);

	public function deleteByAberturaFechamentoCaixaId($value);

	public function deleteByCaixaId($value);

	public function deleteBySubcategoriaId($value);

	public function deleteByCentroCustoId($value);

	public function deleteByCategoriaTransacaoId($value);

	public function deleteByPlanoContaId($value);

	public function deleteByFornecedorId($value);

	public function deleteByCartaoEmpresaId($value);

	public function deleteByQtdParcelas($value);

	public function deleteByValorParcela($value);

	public function deleteByCanceladoParcela($value);

	public function deleteByCanceladoBaixa($value);

	public function deleteByEntrada($value);

	public function deleteByDataAbertura($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>