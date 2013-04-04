<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-11 12:27
 */
interface CartaoVendaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return CartaoVenda 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return CartaoVenda      
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
 	 * @param cartaoVenda primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param CartaoVenda cartaoVenda
 	 */
	public function insert($cartaoVenda);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param CartaoVenda cartaoVenda
 	 */
	public function update($cartaoVenda);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByDescricao($value);

	public function queryByPorcentagemCartao($value);

	public function queryByDiaMesRecebimento($value);

	public function queryByDiaSemanaRecebimento($value);

	public function queryByValorAluguelMaquina($value);

	public function queryByValorServicoMensal($value);

	public function queryByCaixaIdRecebimento($value);

	public function queryByCreated($value);

	public function queryByStatus($value);


	public function deleteByDescricao($value);

	public function deleteByPorcentagemCartao($value);

	public function deleteByDiaMesRecebimento($value);

	public function deleteByDiaSemanaRecebimento($value);

	public function deleteByValorAluguelMaquina($value);

	public function deleteByValorServicoMensal($value);

	public function deleteByCaixaIdRecebimento($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);


}
?>