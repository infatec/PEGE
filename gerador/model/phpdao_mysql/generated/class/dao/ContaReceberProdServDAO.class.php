<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-11 12:27
 */
interface ContaReceberProdServI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return ContaReceberProdServ 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return ContaReceberProdServ      
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
 	 * @param contaReceberProdServ primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param ContaReceberProdServ contaReceberProdServ
 	 */
	public function insert($contaReceberProdServ);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param ContaReceberProdServ contaReceberProdServ
 	 */
	public function update($contaReceberProdServ);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByProdutoId($value);

	public function queryByServicoId($value);

	public function queryByLigaContaRPSId($value);

	public function queryByQtdProduto($value);


	public function deleteByProdutoId($value);

	public function deleteByServicoId($value);

	public function deleteByLigaContaRPSId($value);

	public function deleteByQtdProduto($value);


}
?>