<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-11 12:27
 */
interface EmitenteI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Emitente 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Emitente      
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
 	 * @param emitente primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Emitente emitente
 	 */
	public function insert($emitente);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Emitente emitente
 	 */
	public function update($emitente);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByNome($value);

	public function queryByCep($value);

	public function queryByEndereco($value);

	public function queryByNumero($value);

	public function queryByBairro($value);

	public function queryByEstadoId($value);

	public function queryByCidadeId($value);

	public function queryByFone($value);

	public function queryByCelular($value);

	public function queryByRg($value);

	public function queryByCpf($value);

	public function queryByNomeReferencia($value);

	public function queryByTelReferencia($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByNome($value);

	public function deleteByCep($value);

	public function deleteByEndereco($value);

	public function deleteByNumero($value);

	public function deleteByBairro($value);

	public function deleteByEstadoId($value);

	public function deleteByCidadeId($value);

	public function deleteByFone($value);

	public function deleteByCelular($value);

	public function deleteByRg($value);

	public function deleteByCpf($value);

	public function deleteByNomeReferencia($value);

	public function deleteByTelReferencia($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>