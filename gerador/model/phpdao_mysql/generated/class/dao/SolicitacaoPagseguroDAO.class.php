<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-11 12:27
 */
interface SolicitacaoPagseguroI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return SolicitacaoPagseguro 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return SolicitacaoPagseguro      
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
 	 * @param solicitacaoPagseguro primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param SolicitacaoPagseguro solicitacaoPagseguro
 	 */
	public function insert($solicitacaoPagseguro);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param SolicitacaoPagseguro solicitacaoPagseguro
 	 */
	public function update($solicitacaoPagseguro);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByClienteId($value);

	public function queryByTransacaoid($value);

	public function queryByTipoPagamento($value);

	public function queryByDataTransacao($value);

	public function queryByStatusTransacao($value);

	public function queryByProdutoid($value);

	public function queryByDescricaoProduto($value);

	public function queryByValorProd($value);


	public function deleteByClienteId($value);

	public function deleteByTransacaoid($value);

	public function deleteByTipoPagamento($value);

	public function deleteByDataTransacao($value);

	public function deleteByStatusTransacao($value);

	public function deleteByProdutoid($value);

	public function deleteByDescricaoProduto($value);

	public function deleteByValorProd($value);


}
?>