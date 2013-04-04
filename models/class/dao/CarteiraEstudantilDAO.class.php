<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-03-28 00:37
 */
interface CarteiraEstudantilI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return CarteiraEstudantil 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return CarteiraEstudantil      
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
 	 * @param carteiraEstudantil primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param CarteiraEstudantil carteiraEstudantil
 	 */
	public function insert($carteiraEstudantil);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param CarteiraEstudantil carteiraEstudantil
 	 */
	public function update($carteiraEstudantil);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByEscolaId($value);

	public function queryByAlunoId($value);

	public function queryByTurma($value);

	public function queryByTurno($value);

	public function queryByMatricula($value);

	public function queryByFoto($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByEscolaId($value);

	public function deleteByAlunoId($value);

	public function deleteByTurma($value);

	public function deleteByTurno($value);

	public function deleteByMatricula($value);

	public function deleteByFoto($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>