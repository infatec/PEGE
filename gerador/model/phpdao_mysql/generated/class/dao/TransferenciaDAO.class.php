<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-04-17 20:14
 */
interface TransferenciaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Transferencia 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Transferencia      
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
 	 * @param transferencia primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Transferencia transferencia
 	 */
	public function insert($transferencia);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Transferencia transferencia
 	 */
	public function update($transferencia);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByBloco($value);

	public function queryByDataTransferencia($value);

	public function queryByAlunoId($value);

	public function queryByOcorreAcadId($value);

	public function queryByCursoId($value);


	public function deleteByBloco($value);

	public function deleteByDataTransferencia($value);

	public function deleteByAlunoId($value);

	public function deleteByOcorreAcadId($value);

	public function deleteByCursoId($value);


}
?>