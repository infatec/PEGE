<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-04-17 20:14
 */
interface MensalidadeI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Mensalidade 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Mensalidade      
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
 	 * @param mensalidade primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Mensalidade mensalidade
 	 */
	public function insert($mensalidade);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Mensalidade mensalidade
 	 */
	public function update($mensalidade);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByAlunoId($value);

	public function queryByPeriodoId($value);

	public function queryByParcela($value);

	public function queryByQtdParcela($value);

	public function queryByValorParcela($value);

	public function queryByValorRecebido($value);

	public function queryByDataVencimento($value);

	public function queryByCreated($value);

	public function queryBySituacao($value);

	public function queryByDataPagamento($value);

	public function queryByUsuarioBaixaId($value);

	public function queryByUsuarioEdicaoId($value);

	public function queryByDataModificacao($value);


	public function deleteByAlunoId($value);

	public function deleteByPeriodoId($value);

	public function deleteByParcela($value);

	public function deleteByQtdParcela($value);

	public function deleteByValorParcela($value);

	public function deleteByValorRecebido($value);

	public function deleteByDataVencimento($value);

	public function deleteByCreated($value);

	public function deleteBySituacao($value);

	public function deleteByDataPagamento($value);

	public function deleteByUsuarioBaixaId($value);

	public function deleteByUsuarioEdicaoId($value);

	public function deleteByDataModificacao($value);


}
?>