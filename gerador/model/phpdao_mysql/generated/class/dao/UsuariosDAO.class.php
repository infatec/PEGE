<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-03-28 00:37
 */
interface UsuariosI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Usuarios 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Usuarios      
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
 	 * @param usuario primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Usuarios usuario
 	 */
	public function insert($usuario);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Usuarios usuario
 	 */
	public function update($usuario);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByGrupoId($value);

	public function queryByTipo($value);

	public function queryByLogin($value);

	public function queryBySenha($value);

	public function queryByNome($value);

	public function queryByEmail($value);

	public function queryByMsn($value);

	public function queryByOrkut($value);

	public function queryByFone($value);

	public function queryByCelular($value);

	public function queryByFoto($value);

	public function queryByUltimoacesso($value);

	public function queryByAcessos($value);

	public function queryByCreated($value);

	public function queryByModified($value);

	public function queryByStatus($value);


	public function deleteByGrupoId($value);

	public function deleteByTipo($value);

	public function deleteByLogin($value);

	public function deleteBySenha($value);

	public function deleteByNome($value);

	public function deleteByEmail($value);

	public function deleteByMsn($value);

	public function deleteByOrkut($value);

	public function deleteByFone($value);

	public function deleteByCelular($value);

	public function deleteByFoto($value);

	public function deleteByUltimoacesso($value);

	public function deleteByAcessos($value);

	public function deleteByCreated($value);

	public function deleteByModified($value);

	public function deleteByStatus($value);


}
?>