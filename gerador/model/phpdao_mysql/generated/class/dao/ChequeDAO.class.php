<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-11 12:27
 */
interface ChequeI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Cheque 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Cheque      
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
 	 * @param cheque primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Cheque cheque
 	 */
	public function insert($cheque);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Cheque cheque
 	 */
	public function update($cheque);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByCaixaId($value);

	public function queryByIdentificacao($value);

	public function queryByQtd($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByCaixaId($value);

	public function deleteByIdentificacao($value);

	public function deleteByQtd($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>