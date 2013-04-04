<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-03-28 00:37
 */
interface TiposDespesaMecI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return TiposDespesaMec 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return TiposDespesaMec      
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
 	 * @param tiposDespesaMec primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param TiposDespesaMec tiposDespesaMec
 	 */
	public function insert($tiposDespesaMec);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param TiposDespesaMec tiposDespesaMec
 	 */
	public function update($tiposDespesaMec);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByCodigo($value);

	public function queryByNome($value);

	public function queryByIndividualEscola($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByCodigo($value);

	public function deleteByNome($value);

	public function deleteByIndividualEscola($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>