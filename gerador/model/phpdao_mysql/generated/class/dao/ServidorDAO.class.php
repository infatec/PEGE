<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-03-28 00:37
 */
interface ServidorI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Servidor 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Servidor      
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
 	 * @param servidor primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Servidor servidor
 	 */
	public function insert($servidor);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Servidor servidor
 	 */
	public function update($servidor);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByNome($value);

	public function queryByCpf($value);

	public function queryByInep($value);

	public function queryByEmail($value);

	public function queryBySenha($value);

	public function queryByEndereco($value);

	public function queryByNumero($value);

	public function queryByBairro($value);

	public function queryByCidade($value);

	public function queryByUf($value);

	public function queryByLocal($value);

	public function queryByNivEscola($value);

	public function queryByFormacao($value);

	public function queryByCelular($value);

	public function queryByTelefone($value);

	public function queryByCep($value);

	public function queryByCreated($value);

	public function queryByStatus($value);

	public function queryByRg($value);

	public function queryByOrgaoEmissor($value);

	public function queryByEstadoEmissor($value);

	public function queryByPisPasep($value);

	public function queryByTituloEleitorNumero($value);

	public function queryByZona($value);

	public function queryBySecao($value);

	public function queryByMunicipioTitulo($value);

	public function queryByNumeroCertidaoNascimento($value);

	public function queryByLivro($value);

	public function queryByCertidaoFl($value);

	public function queryByCartorio($value);

	public function queryByNomePai($value);

	public function queryByNomeMae($value);

	public function queryByNomeConjuge($value);

	public function queryByCertidaoCasamentoNumero($value);

	public function queryByLivroCasamento($value);

	public function queryByDisposicaoOutroOrgao($value);

	public function queryByNomeOutroOrgao($value);

	public function queryByPeriodo($value);

	public function queryByTipoRecebimentoOutroOrgao($value);

	public function queryByFoto($value);

	public function queryByProfessor($value);

	public function queryByQualEscolaridade($value);

	public function queryByCertidaoFlCasamento($value);

	public function queryByCartorioCasamento($value);

	public function queryByCarteiraTrab($value);

	public function queryByCarteiraSerie($value);

	public function queryByDataNascimento($value);

	public function queryByFuncaoPrincipal($value);


	public function deleteByNome($value);

	public function deleteByCpf($value);

	public function deleteByInep($value);

	public function deleteByEmail($value);

	public function deleteBySenha($value);

	public function deleteByEndereco($value);

	public function deleteByNumero($value);

	public function deleteByBairro($value);

	public function deleteByCidade($value);

	public function deleteByUf($value);

	public function deleteByLocal($value);

	public function deleteByNivEscola($value);

	public function deleteByFormacao($value);

	public function deleteByCelular($value);

	public function deleteByTelefone($value);

	public function deleteByCep($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);

	public function deleteByRg($value);

	public function deleteByOrgaoEmissor($value);

	public function deleteByEstadoEmissor($value);

	public function deleteByPisPasep($value);

	public function deleteByTituloEleitorNumero($value);

	public function deleteByZona($value);

	public function deleteBySecao($value);

	public function deleteByMunicipioTitulo($value);

	public function deleteByNumeroCertidaoNascimento($value);

	public function deleteByLivro($value);

	public function deleteByCertidaoFl($value);

	public function deleteByCartorio($value);

	public function deleteByNomePai($value);

	public function deleteByNomeMae($value);

	public function deleteByNomeConjuge($value);

	public function deleteByCertidaoCasamentoNumero($value);

	public function deleteByLivroCasamento($value);

	public function deleteByDisposicaoOutroOrgao($value);

	public function deleteByNomeOutroOrgao($value);

	public function deleteByPeriodo($value);

	public function deleteByTipoRecebimentoOutroOrgao($value);

	public function deleteByFoto($value);

	public function deleteByProfessor($value);

	public function deleteByQualEscolaridade($value);

	public function deleteByCertidaoFlCasamento($value);

	public function deleteByCartorioCasamento($value);

	public function deleteByCarteiraTrab($value);

	public function deleteByCarteiraSerie($value);

	public function deleteByDataNascimento($value);

	public function deleteByFuncaoPrincipal($value);


}
?>