<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-03-28 00:37
 */
interface GrupoUsuariosI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return GrupoUsuarios 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return GrupoUsuarios      
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
 	 * @param grupoUsuario primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param GrupoUsuarios grupoUsuario
 	 */
	public function insert($grupoUsuario);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param GrupoUsuarios grupoUsuario
 	 */
	public function update($grupoUsuario);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByTipo($value);

	public function queryByNome($value);

	public function queryByDescricao($value);

	public function queryByCreated($value);

	public function queryByStatus($value);

	public function queryBySetorId($value);

	public function queryByFuncionario($value);

	public function queryByCargoId($value);

	public function queryByAdminParcela($value);


	public function deleteByTipo($value);

	public function deleteByNome($value);

	public function deleteByDescricao($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);

	public function deleteBySetorId($value);

	public function deleteByFuncionario($value);

	public function deleteByCargoId($value);

	public function deleteByAdminParcela($value);


}
?>