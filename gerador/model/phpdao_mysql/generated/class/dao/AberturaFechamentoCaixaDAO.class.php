<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2011-03-11 12:27
 */
interface AberturaFechamentoCaixaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return AberturaFechamentoCaixa 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return AberturaFechamentoCaixa      
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
 	 * @param aberturaFechamentoCaixa primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param AberturaFechamentoCaixa aberturaFechamentoCaixa
 	 */
	public function insert($aberturaFechamentoCaixa);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param AberturaFechamentoCaixa aberturaFechamentoCaixa
 	 */
	public function update($aberturaFechamentoCaixa);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByDataAbertura($value);

	public function queryByDataFechamento($value);

	public function queryByUsuarioAbertura($value);

	public function queryByUsuarioFechamento($value);

	public function queryBySaldo($value);

	public function queryByCaixaId($value);


	public function deleteByDataAbertura($value);

	public function deleteByDataFechamento($value);

	public function deleteByUsuarioAbertura($value);

	public function deleteByUsuarioFechamento($value);

	public function deleteBySaldo($value);

	public function deleteByCaixaId($value);


}
?>