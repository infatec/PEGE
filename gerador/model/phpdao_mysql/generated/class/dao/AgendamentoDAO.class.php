<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-02-02 11:44
 */
interface AgendamentoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Agendamento 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Agendamento      
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
 	 * @param agendamento primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Agendamento agendamento
 	 */
	public function insert($agendamento);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Agendamento agendamento
 	 */
	public function update($agendamento);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByOrdem($value);

	public function queryBySituacaoAgendamentoId($value);

	public function queryByContasAReceberId($value);

	public function queryByClienteId($value);

	public function queryByDataMarcacao($value);

	public function queryByHoraMarcacao($value);

	public function queryByDescricaoServico($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByOrdem($value);

	public function deleteBySituacaoAgendamentoId($value);

	public function deleteByContasAReceberId($value);

	public function deleteByClienteId($value);

	public function deleteByDataMarcacao($value);

	public function deleteByHoraMarcacao($value);

	public function deleteByDescricaoServico($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>