<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-03-28 00:37
 */
interface AnoLetivoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return AnoLetivo 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return AnoLetivo      
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
 	 * @param anoLetivo primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param AnoLetivo anoLetivo
 	 */
	public function insert($anoLetivo);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param AnoLetivo anoLetivo
 	 */
	public function update($anoLetivo);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByEscolaId($value);

	public function queryByIdentificacao($value);

	public function queryByDataInicioMatricula($value);

	public function queryByDataFimMatricula($value);

	public function queryByDataInicioAulas($value);

	public function queryByDataFimAulas($value);

	public function queryByDataFimPrimeiroSemestre($value);

	public function queryBySituacao($value);

	public function queryByDataInicioSegundoSemestre($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByEscolaId($value);

	public function deleteByIdentificacao($value);

	public function deleteByDataInicioMatricula($value);

	public function deleteByDataFimMatricula($value);

	public function deleteByDataInicioAulas($value);

	public function deleteByDataFimAulas($value);

	public function deleteByDataFimPrimeiroSemestre($value);

	public function deleteBySituacao($value);

	public function deleteByDataInicioSegundoSemestre($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>