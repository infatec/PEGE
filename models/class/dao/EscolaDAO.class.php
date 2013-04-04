<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-03-28 00:37
 */
interface EscolaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Escola 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Escola      
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
 	 * @param escola primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Escola escola
 	 */
	public function insert($escola);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Escola escola
 	 */
	public function update($escola);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByNome($value);

	public function queryByEndereco($value);

	public function queryByNumero($value);

	public function queryByBairro($value);

	public function queryByCidade($value);

	public function queryByUf($value);

	public function queryByCep($value);

	public function queryByInep($value);

	public function queryByCnpj($value);

	public function queryByCodEscola($value);

	public function queryByDepAdministrativo($value);

	public function queryByStatusFuncionamento($value);

	public function queryByFoto($value);

	public function queryByZona($value);

	public function queryByStatusCenso($value);

	public function queryByQuantAluno($value);

	public function queryByQuantProf($value);

	public function queryByQuantAux($value);

	public function queryByQuantMonitores($value);

	public function queryByQuantTradutLibras($value);

	public function queryByTelefone($value);

	public function queryByEmail($value);

	public function queryByLatitude($value);

	public function queryByLongitude($value);

	public function queryByCodEstado($value);

	public function queryByCodCidade($value);

	public function queryByDdd($value);

	public function queryByCreated($value);

	public function queryByStatus($value);

	public function queryByDistrito($value);

	public function queryByAssentamento($value);


	public function deleteByNome($value);

	public function deleteByEndereco($value);

	public function deleteByNumero($value);

	public function deleteByBairro($value);

	public function deleteByCidade($value);

	public function deleteByUf($value);

	public function deleteByCep($value);

	public function deleteByInep($value);

	public function deleteByCnpj($value);

	public function deleteByCodEscola($value);

	public function deleteByDepAdministrativo($value);

	public function deleteByStatusFuncionamento($value);

	public function deleteByFoto($value);

	public function deleteByZona($value);

	public function deleteByStatusCenso($value);

	public function deleteByQuantAluno($value);

	public function deleteByQuantProf($value);

	public function deleteByQuantAux($value);

	public function deleteByQuantMonitores($value);

	public function deleteByQuantTradutLibras($value);

	public function deleteByTelefone($value);

	public function deleteByEmail($value);

	public function deleteByLatitude($value);

	public function deleteByLongitude($value);

	public function deleteByCodEstado($value);

	public function deleteByCodCidade($value);

	public function deleteByDdd($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);

	public function deleteByDistrito($value);

	public function deleteByAssentamento($value);


}
?>