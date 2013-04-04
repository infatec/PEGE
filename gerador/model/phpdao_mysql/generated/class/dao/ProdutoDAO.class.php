<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-11 12:27
 */
interface ProdutoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Produto 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Produto      
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
 	 * @param produto primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Produto produto
 	 */
	public function insert($produto);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Produto produto
 	 */
	public function update($produto);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByFornecedorId($value);

	public function queryByCategoriaId($value);

	public function queryByCentroCustoId($value);

	public function queryByCodigo($value);

	public function queryByNome($value);

	public function queryByDescricao($value);

	public function queryByPrecoVenda($value);

	public function queryByPrecoCusto($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByFornecedorId($value);

	public function deleteByCategoriaId($value);

	public function deleteByCentroCustoId($value);

	public function deleteByCodigo($value);

	public function deleteByNome($value);

	public function deleteByDescricao($value);

	public function deleteByPrecoVenda($value);

	public function deleteByPrecoCusto($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>