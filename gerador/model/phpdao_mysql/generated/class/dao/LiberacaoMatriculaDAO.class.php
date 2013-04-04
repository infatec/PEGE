<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-04-17 20:14
 */
interface LiberacaoMatriculaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return LiberacaoMatricula 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return LiberacaoMatricula      
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
 	 * @param liberacaoMatricula primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param LiberacaoMatricula liberacaoMatricula
 	 */
	public function insert($liberacaoMatricula);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param LiberacaoMatricula liberacaoMatricula
 	 */
	public function update($liberacaoMatricula);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByObservacao($value);

	public function queryByAlunoId($value);

	public function queryByPeriodoId($value);


	public function deleteByObservacao($value);

	public function deleteByAlunoId($value);

	public function deleteByPeriodoId($value);


}
?>