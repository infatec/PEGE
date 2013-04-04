<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-03-28 00:37
 */
interface ConfiguracaoEscolaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return ConfiguracaoEscola 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return ConfiguracaoEscola      
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
 	 * @param configuracaoEscola primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param ConfiguracaoEscola configuracaoEscola
 	 */
	public function insert($configuracaoEscola);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param ConfiguracaoEscola configuracaoEscola
 	 */
	public function update($configuracaoEscola);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByEscolaId($value);

	public function queryByPredPesq($value);

	public function queryByStatusCodificacao($value);

	public function queryByCodSeecA($value);

	public function queryByCodSeecB($value);

	public function queryByDependenciaAdministrativa($value);

	public function queryByNaturezaOcupacao($value);

	public function queryByNaturezaOcupacaoPredrio($value);

	public function queryByEntidadeProprietariaMovel($value);

	public function queryByTotalSalasAula($value);

	public function queryByTotalSalasLevantada($value);

	public function queryByUnidadeExecutora($value);

	public function queryByStatusFuncionamento($value);

	public function queryBySituacaoCenso($value);

	public function queryByIdentificacaoOutrasAtividadesPredio($value);

	public function queryByDocencia($value);

	public function queryByPromocaoAcessoInformacao($value);

	public function queryByApoioEducacional($value);

	public function queryByAlimentacao($value);

	public function queryBySaudeEHigiene($value);

	public function queryByPromocaoConvivencia($value);

	public function queryBySuportePedagogicoDocencia($value);

	public function queryByAdministracao($value);

	public function queryByManutencaoConservacaoSeguranca($value);

	public function queryByCreated($value);

	public function queryByStatus($value);

	public function queryByAssentamento($value);


	public function deleteByEscolaId($value);

	public function deleteByPredPesq($value);

	public function deleteByStatusCodificacao($value);

	public function deleteByCodSeecA($value);

	public function deleteByCodSeecB($value);

	public function deleteByDependenciaAdministrativa($value);

	public function deleteByNaturezaOcupacao($value);

	public function deleteByNaturezaOcupacaoPredrio($value);

	public function deleteByEntidadeProprietariaMovel($value);

	public function deleteByTotalSalasAula($value);

	public function deleteByTotalSalasLevantada($value);

	public function deleteByUnidadeExecutora($value);

	public function deleteByStatusFuncionamento($value);

	public function deleteBySituacaoCenso($value);

	public function deleteByIdentificacaoOutrasAtividadesPredio($value);

	public function deleteByDocencia($value);

	public function deleteByPromocaoAcessoInformacao($value);

	public function deleteByApoioEducacional($value);

	public function deleteByAlimentacao($value);

	public function deleteBySaudeEHigiene($value);

	public function deleteByPromocaoConvivencia($value);

	public function deleteBySuportePedagogicoDocencia($value);

	public function deleteByAdministracao($value);

	public function deleteByManutencaoConservacaoSeguranca($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);

	public function deleteByAssentamento($value);


}
?>