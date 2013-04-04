<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-04-17 20:14
 */
interface ProfessorI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Professor 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Professor      
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
 	 * @param professor primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Professor professor
 	 */
	public function insert($professor);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Professor professor
 	 */
	public function update($professor);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByCursoId($value);

	public function queryByNome($value);

	public function queryByTitulacao($value);

	public function queryByCpf($value);

	public function queryByRg($value);

	public function queryByEndereco($value);

	public function queryByNumero($value);

	public function queryByBairro($value);

	public function queryByCep($value);

	public function queryByComplemento($value);

	public function queryByTelefone1($value);

	public function queryByTelefone2($value);

	public function queryByCelular($value);

	public function queryByEmail($value);

	public function queryByEstadoId($value);

	public function queryByCidadeId($value);

	public function queryByArea($value);

	public function queryByMatricula($value);

	public function queryBySenha($value);

	public function queryByDataAdmissao($value);

	public function queryByCPTS($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByCursoId($value);

	public function deleteByNome($value);

	public function deleteByTitulacao($value);

	public function deleteByCpf($value);

	public function deleteByRg($value);

	public function deleteByEndereco($value);

	public function deleteByNumero($value);

	public function deleteByBairro($value);

	public function deleteByCep($value);

	public function deleteByComplemento($value);

	public function deleteByTelefone1($value);

	public function deleteByTelefone2($value);

	public function deleteByCelular($value);

	public function deleteByEmail($value);

	public function deleteByEstadoId($value);

	public function deleteByCidadeId($value);

	public function deleteByArea($value);

	public function deleteByMatricula($value);

	public function deleteBySenha($value);

	public function deleteByDataAdmissao($value);

	public function deleteByCPTS($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>