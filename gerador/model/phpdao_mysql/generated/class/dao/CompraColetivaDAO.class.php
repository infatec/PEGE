<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-23 22:00
 */
interface CompraColetivaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return CompraColetiva 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return CompraColetiva      
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
 	 * @param compraColetiva primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param CompraColetiva compraColetiva
 	 */
	public function insert($compraColetiva);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param CompraColetiva compraColetiva
 	 */
	public function update($compraColetiva);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByUrl($value);

	public function queryByNome($value);

	public function queryByDescricao($value);

	public function queryByLogo($value);

	public function queryByStatus($value);

	public function queryByCreated($value);

	public function queryByCidadeId($value);

	public function queryByIdentificacao($value);


	public function deleteByUrl($value);

	public function deleteByNome($value);

	public function deleteByDescricao($value);

	public function deleteByLogo($value);

	public function deleteByStatus($value);

	public function deleteByCreated($value);

	public function deleteByCidadeId($value);

	public function deleteByIdentificacao($value);


}
?>