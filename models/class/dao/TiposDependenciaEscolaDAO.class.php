<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-03-28 00:37
 */
interface TiposDependenciaEscolaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return TiposDependenciaEscola 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return TiposDependenciaEscola      
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
 	 * @param tiposDependenciaEscola primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param TiposDependenciaEscola tiposDependenciaEscola
 	 */
	public function insert($tiposDependenciaEscola);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param TiposDependenciaEscola tiposDependenciaEscola
 	 */
	public function update($tiposDependenciaEscola);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByEscolaId($value);

	public function queryByTiposDependenciaMecId($value);


	public function deleteByEscolaId($value);

	public function deleteByTiposDependenciaMecId($value);


}
?>