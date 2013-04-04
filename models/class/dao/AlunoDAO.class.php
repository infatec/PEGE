<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-03-28 00:37
 */
interface AlunoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Aluno 
	 */
	public function load($id);

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Aluno      
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
 	 * @param aluno primary key
 	 */
	public function delete($id);
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Aluno aluno
 	 */
	public function insert($aluno);
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Aluno aluno
 	 */
	public function update($aluno);	

	/**
 	 * Deleta todos os campos
 	 */
	public function clean();

	public function queryByNome($value);

	public function queryByEndereco($value);

	public function queryByNumero($value);

	public function queryByBairro($value);

	public function queryByCidade($value);

	public function queryByNacionalidade($value);

	public function queryByCep($value);

	public function queryByUf($value);

	public function queryByLocal($value);

	public function queryByComplemento($value);

	public function queryByInep($value);

	public function queryByNis($value);

	public function queryByTelefone($value);

	public function queryByCelular($value);

	public function queryByEmail($value);

	public function queryByPeso($value);

	public function queryByAltura($value);

	public function queryByRaca($value);

	public function queryByTipoDefic($value);

	public function queryByTipoTranspEscolar($value);

	public function queryByIdEducCenso($value);

	public function queryByTipoUsoInternet($value);

	public function queryBySexo($value);

	public function queryByRegNascimento($value);

	public function queryByRegLivroNum($value);

	public function queryByRegFolhaNum($value);

	public function queryByRegComarca($value);

	public function queryByRg($value);

	public function queryByRgOrgao($value);

	public function queryByRgDataExpedicao($value);

	public function queryByTitulo($value);

	public function queryByTituloZona($value);

	public function queryByTituloSecao($value);

	public function queryByReservista($value);

	public function queryByReservistaSerie($value);

	public function queryByReservistaNumero($value);

	public function queryByReservistaCategNum($value);

	public function queryByReservistaCsm($value);

	public function queryByCartProf($value);

	public function queryByGrupoSangue($value);

	public function queryByGrupoSangueRh($value);

	public function queryByGrupoSangueAlergia($value);

	public function queryByGrupoSangueDiabetico($value);

	public function queryByOutraDoenca($value);

	public function queryByFamiliaComposta($value);

	public function queryByEstadoCivil($value);

	public function queryByUsaOculos($value);

	public function queryByDestro($value);

	public function queryByConvenio($value);

	public function queryByNomePai($value);

	public function queryByPaiVivo($value);

	public function queryByPaiNacionalidade($value);

	public function queryByPaiNaturalidade($value);

	public function queryByPaiNivEscolar($value);

	public function queryByPaiReligiao($value);

	public function queryByPaiProfissao($value);

	public function queryByPaiEnderTrab($value);

	public function queryByPaiTelefone($value);

	public function queryByPaiEmail($value);

	public function queryByPaiTitulo($value);

	public function queryByPaiTituloZona($value);

	public function queryByPaiTituloSecao($value);

	public function queryByNomeMae($value);

	public function queryByMaeViva($value);

	public function queryByMaeNacionalidade($value);

	public function queryByMaeNaturalidade($value);

	public function queryByMaeNivEscolar($value);

	public function queryByMaeReligiao($value);

	public function queryByMaeProfissao($value);

	public function queryByMaeEnderTrab($value);

	public function queryByMaeTelefone($value);

	public function queryByMaeEmail($value);

	public function queryByMaeTitulo($value);

	public function queryByMaeTituloZona($value);

	public function queryByMaeTituloSecao($value);

	public function queryByMaeNis($value);

	public function queryByPaiNis($value);

	public function queryByNomeResponsavel($value);

	public function queryByParentescoResponsavel($value);

	public function queryByNacionalResponsavel($value);

	public function queryByNaturalResponsavel($value);

	public function queryByNivEscolarResponsavel($value);

	public function queryByReligiaoResponsavel($value);

	public function queryByProfissaoResponsavel($value);

	public function queryByEnderTrabResponsavel($value);

	public function queryByTelefResponsavel($value);

	public function queryByEmailResponsavel($value);

	public function queryByTituloResponsavel($value);

	public function queryByTituloZonaResponsavel($value);

	public function queryByTituloSecaoResponsavel($value);

	public function queryByDescriTranspEscolar($value);

	public function queryByPaiUf($value);

	public function queryByMaeUf($value);

	public function queryByResponsavelUf($value);

	public function queryByDataNascimento($value);

	public function queryByUfRegComarca($value);

	public function queryByCpfAluno($value);

	public function queryByCpfPai($value);

	public function queryByCpfMae($value);

	public function queryByCpfResponsavel($value);

	public function queryByCodUf($value);

	public function queryByCodCidade($value);

	public function queryByCodPais($value);

	public function queryByCreated($value);

	public function queryByStatus($value);

	public function queryBySenha($value);

	public function queryByFoto($value);

	public function queryByColaboraRendaFamiliar($value);


	public function deleteByNome($value);

	public function deleteByEndereco($value);

	public function deleteByNumero($value);

	public function deleteByBairro($value);

	public function deleteByCidade($value);

	public function deleteByNacionalidade($value);

	public function deleteByCep($value);

	public function deleteByUf($value);

	public function deleteByLocal($value);

	public function deleteByComplemento($value);

	public function deleteByInep($value);

	public function deleteByNis($value);

	public function deleteByTelefone($value);

	public function deleteByCelular($value);

	public function deleteByEmail($value);

	public function deleteByPeso($value);

	public function deleteByAltura($value);

	public function deleteByRaca($value);

	public function deleteByTipoDefic($value);

	public function deleteByTipoTranspEscolar($value);

	public function deleteByIdEducCenso($value);

	public function deleteByTipoUsoInternet($value);

	public function deleteBySexo($value);

	public function deleteByRegNascimento($value);

	public function deleteByRegLivroNum($value);

	public function deleteByRegFolhaNum($value);

	public function deleteByRegComarca($value);

	public function deleteByRg($value);

	public function deleteByRgOrgao($value);

	public function deleteByRgDataExpedicao($value);

	public function deleteByTitulo($value);

	public function deleteByTituloZona($value);

	public function deleteByTituloSecao($value);

	public function deleteByReservista($value);

	public function deleteByReservistaSerie($value);

	public function deleteByReservistaNumero($value);

	public function deleteByReservistaCategNum($value);

	public function deleteByReservistaCsm($value);

	public function deleteByCartProf($value);

	public function deleteByGrupoSangue($value);

	public function deleteByGrupoSangueRh($value);

	public function deleteByGrupoSangueAlergia($value);

	public function deleteByGrupoSangueDiabetico($value);

	public function deleteByOutraDoenca($value);

	public function deleteByFamiliaComposta($value);

	public function deleteByEstadoCivil($value);

	public function deleteByUsaOculos($value);

	public function deleteByDestro($value);

	public function deleteByConvenio($value);

	public function deleteByNomePai($value);

	public function deleteByPaiVivo($value);

	public function deleteByPaiNacionalidade($value);

	public function deleteByPaiNaturalidade($value);

	public function deleteByPaiNivEscolar($value);

	public function deleteByPaiReligiao($value);

	public function deleteByPaiProfissao($value);

	public function deleteByPaiEnderTrab($value);

	public function deleteByPaiTelefone($value);

	public function deleteByPaiEmail($value);

	public function deleteByPaiTitulo($value);

	public function deleteByPaiTituloZona($value);

	public function deleteByPaiTituloSecao($value);

	public function deleteByNomeMae($value);

	public function deleteByMaeViva($value);

	public function deleteByMaeNacionalidade($value);

	public function deleteByMaeNaturalidade($value);

	public function deleteByMaeNivEscolar($value);

	public function deleteByMaeReligiao($value);

	public function deleteByMaeProfissao($value);

	public function deleteByMaeEnderTrab($value);

	public function deleteByMaeTelefone($value);

	public function deleteByMaeEmail($value);

	public function deleteByMaeTitulo($value);

	public function deleteByMaeTituloZona($value);

	public function deleteByMaeTituloSecao($value);

	public function deleteByMaeNis($value);

	public function deleteByPaiNis($value);

	public function deleteByNomeResponsavel($value);

	public function deleteByParentescoResponsavel($value);

	public function deleteByNacionalResponsavel($value);

	public function deleteByNaturalResponsavel($value);

	public function deleteByNivEscolarResponsavel($value);

	public function deleteByReligiaoResponsavel($value);

	public function deleteByProfissaoResponsavel($value);

	public function deleteByEnderTrabResponsavel($value);

	public function deleteByTelefResponsavel($value);

	public function deleteByEmailResponsavel($value);

	public function deleteByTituloResponsavel($value);

	public function deleteByTituloZonaResponsavel($value);

	public function deleteByTituloSecaoResponsavel($value);

	public function deleteByDescriTranspEscolar($value);

	public function deleteByPaiUf($value);

	public function deleteByMaeUf($value);

	public function deleteByResponsavelUf($value);

	public function deleteByDataNascimento($value);

	public function deleteByUfRegComarca($value);

	public function deleteByCpfAluno($value);

	public function deleteByCpfPai($value);

	public function deleteByCpfMae($value);

	public function deleteByCpfResponsavel($value);

	public function deleteByCodUf($value);

	public function deleteByCodCidade($value);

	public function deleteByCodPais($value);

	public function deleteByCreated($value);

	public function deleteByStatus($value);

	public function deleteBySenha($value);

	public function deleteByFoto($value);

	public function deleteByColaboraRendaFamiliar($value);


}
?>