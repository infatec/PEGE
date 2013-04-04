<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-01-04 12:47
 */
interface NoticiaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Noticia 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Noticia      
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
 	 * @param noticia primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Noticia noticia
 	 */
	public function insert($noticia);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Noticia noticia
 	 */
	public function update($noticia);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByIdBdAntigo($value);

	public function queryByEditoriaId($value);

	public function queryByTipoDestaqueId($value);

	public function queryByUrl($value);

	public function queryByTitulo($value);

	public function queryBySubtitulo($value);

	public function queryByAssinatura($value);

	public function queryByConteudo($value);

	public function queryByDataEntrada($value);

	public function queryByPalavraChave($value);

	public function queryByFotoDestaque($value);

	public function queryByLegendaFotoInterna($value);

	public function queryByFotoInterna($value);

	public function queryByCreated($value);

	public function queryByStatus($value);

	public function queryByClicks($value);

	public function queryByCreditoFoto($value);

	public function queryByFonte($value);


	public function deleteByIdBdAntigo($value);

	public function deleteByEditoriaId($value);

	public function deleteByTipoDestaqueId($value);

	public function deleteByUrl($value);

	public function deleteByTitulo($value);

	public function deleteBySubtitulo($value);

	public function deleteByAssinatura($value);

	public function deleteByConteudo($value);

	public function deleteByDataEntrada($value);

	public function deleteByPalavraChave($value);

	public function deleteByFotoDestaque($value);

	public function deleteByLegendaFotoInterna($value);

	public function deleteByFotoInterna($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);

	public function deleteByClicks($value);

	public function deleteByCreditoFoto($value);

	public function deleteByFonte($value);


}
?>