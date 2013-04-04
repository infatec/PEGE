<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-11 12:27
 */
interface RecebimentoCartaoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return RecebimentoCartao 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return RecebimentoCartao      
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
 	 * @param recebimentoCartao primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param RecebimentoCartao recebimentoCartao
 	 */
	public function insert($recebimentoCartao);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param RecebimentoCartao recebimentoCartao
 	 */
	public function update($recebimentoCartao);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByCartaoVendaId($value);

	public function queryByDataRecebimento($value);

	public function queryByValor($value);

	public function queryByCancelado($value);


	public function deleteByCartaoVendaId($value);

	public function deleteByDataRecebimento($value);

	public function deleteByValor($value);

	public function deleteByCancelado($value);


}
?>