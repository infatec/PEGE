<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-06-23 08:39
 */
interface HistoriaDoForroI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return HistoriaDoForro 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return HistoriaDoForro      
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
 	 * @param historiaDoForro primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param HistoriaDoForro historiaDoForro
 	 */
	public function insert($historiaDoForro);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param HistoriaDoForro historiaDoForro
 	 */
	public function update($historiaDoForro);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByTexto($value);


	public function deleteByTexto($value);


}
?>