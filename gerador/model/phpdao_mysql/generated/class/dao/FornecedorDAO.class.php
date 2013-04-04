<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-11 12:27
 */
interface FornecedorI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Fornecedor 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Fornecedor      
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
 	 * @param fornecedor primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Fornecedor fornecedor
 	 */
	public function insert($fornecedor);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Fornecedor fornecedor
 	 */
	public function update($fornecedor);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByNomeFantasia($value);

	public function queryByRazaoSocial($value);

	public function queryByTipoDoc($value);

	public function queryByNumdoc($value);

	public function queryByIm($value);

	public function queryByEndereco($value);

	public function queryByBairro($value);

	public function queryByCep($value);

	public function queryByEstadoId($value);

	public function queryByCidadeId($value);

	public function queryBySite($value);

	public function queryByEmail($value);

	public function queryByFone1($value);

	public function queryByFone2($value);

	public function queryByFax($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByNomeFantasia($value);

	public function deleteByRazaoSocial($value);

	public function deleteByTipoDoc($value);

	public function deleteByNumdoc($value);

	public function deleteByIm($value);

	public function deleteByEndereco($value);

	public function deleteByBairro($value);

	public function deleteByCep($value);

	public function deleteByEstadoId($value);

	public function deleteByCidadeId($value);

	public function deleteBySite($value);

	public function deleteByEmail($value);

	public function deleteByFone1($value);

	public function deleteByFone2($value);

	public function deleteByFax($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>