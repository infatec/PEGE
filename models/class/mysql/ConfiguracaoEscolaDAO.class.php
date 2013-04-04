<?php
/**
 * Classe operadora da tabela 'configuracao_escola'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class ConfiguracaoEscolaDAO extends Model implements ConfiguracaoEscolaI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return ConfiguracaoEscola 
	 */
	public function load($id){
		$sql = 'SELECT * FROM configuracao_escola WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return ConfiguracaoEscola      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM configuracao_escola '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM configuracao_escola '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		$rs=$this->execute($sqlQuery);
        return $rs[0]["qtd"];
	}
    
	/**
	 * Retorna todos os registro ordenado pelo campos
	 *
	 * @param $orderColumn nome da coluna
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM configuracao_escola ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param configuracaoEscola primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM configuracao_escola WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param ConfiguracaoEscola configuracaoEscola
 	 */
	public function insert($configuracaoEscola){
		$sql = 'INSERT INTO configuracao_escola (escola_id, pred_pesq, status_codificacao, cod_seec_a, cod_seec_b, dependencia_administrativa, natureza_ocupacao, natureza_ocupacao_predrio, entidade_proprietaria_movel, total_salas_aula, total_salas_levantada, unidade_executora, status_funcionamento, situacao_censo, identificacao_outras_atividades_predio, docencia, promocao_acesso_informacao, apoio_educacional, alimentacao, saude_e_higiene, promocao_convivencia, suporte_pedagogico_docencia, administracao, manutencao_conservacao_seguranca, created, status, assentamento) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($configuracaoEscola->escolaId);
		$sqlQuery->set($configuracaoEscola->predPesq);
		$sqlQuery->set($configuracaoEscola->statusCodificacao);
		$sqlQuery->set($configuracaoEscola->codSeecA);
		$sqlQuery->set($configuracaoEscola->codSeecB);
		$sqlQuery->set($configuracaoEscola->dependenciaAdministrativa);
		$sqlQuery->set($configuracaoEscola->naturezaOcupacao);
		$sqlQuery->set($configuracaoEscola->naturezaOcupacaoPredrio);
		$sqlQuery->set($configuracaoEscola->entidadeProprietariaMovel);
		$sqlQuery->setNumber($configuracaoEscola->totalSalasAula);
		$sqlQuery->setNumber($configuracaoEscola->totalSalasLevantada);
		$sqlQuery->set($configuracaoEscola->unidadeExecutora);
		$sqlQuery->set($configuracaoEscola->statusFuncionamento);
		$sqlQuery->set($configuracaoEscola->situacaoCenso);
		$sqlQuery->set($configuracaoEscola->identificacaoOutrasAtividadesPredio);
		$sqlQuery->set($configuracaoEscola->docencia);
		$sqlQuery->set($configuracaoEscola->promocaoAcessoInformacao);
		$sqlQuery->set($configuracaoEscola->apoioEducacional);
		$sqlQuery->set($configuracaoEscola->alimentacao);
		$sqlQuery->set($configuracaoEscola->saudeEHigiene);
		$sqlQuery->set($configuracaoEscola->promocaoConvivencia);
		$sqlQuery->set($configuracaoEscola->suportePedagogicoDocencia);
		$sqlQuery->set($configuracaoEscola->administracao);
		$sqlQuery->set($configuracaoEscola->manutencaoConservacaoSeguranca);
		$sqlQuery->set($configuracaoEscola->created);
		$sqlQuery->set($configuracaoEscola->status);
		$sqlQuery->set($configuracaoEscola->assentamento);

		$id = $this->executeInsert($sqlQuery);	
		$configuracaoEscola->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param ConfiguracaoEscola configuracaoEscola
 	 */
	public function update($configuracaoEscola){
		$campos = "";
        
        
		 if(!empty($configuracaoEscola->escolaId)) $campos .=' escola_id = ?,';
		 if(!empty($configuracaoEscola->predPesq)) $campos .=' pred_pesq = ?,';
		 if(!empty($configuracaoEscola->statusCodificacao)) $campos .=' status_codificacao = ?,';
		 if(!empty($configuracaoEscola->codSeecA)) $campos .=' cod_seec_a = ?,';
		 if(!empty($configuracaoEscola->codSeecB)) $campos .=' cod_seec_b = ?,';
		 if(!empty($configuracaoEscola->dependenciaAdministrativa)) $campos .=' dependencia_administrativa = ?,';
		 if(!empty($configuracaoEscola->naturezaOcupacao)) $campos .=' natureza_ocupacao = ?,';
		 if(!empty($configuracaoEscola->naturezaOcupacaoPredrio)) $campos .=' natureza_ocupacao_predrio = ?,';
		 if(!empty($configuracaoEscola->entidadeProprietariaMovel)) $campos .=' entidade_proprietaria_movel = ?,';
		 if(!empty($configuracaoEscola->totalSalasAula)) $campos .=' total_salas_aula = ?,';
		 if(!empty($configuracaoEscola->totalSalasLevantada)) $campos .=' total_salas_levantada = ?,';
		 if(!empty($configuracaoEscola->unidadeExecutora)) $campos .=' unidade_executora = ?,';
		 if(!empty($configuracaoEscola->statusFuncionamento)) $campos .=' status_funcionamento = ?,';
		 if(!empty($configuracaoEscola->situacaoCenso)) $campos .=' situacao_censo = ?,';
		 if(!empty($configuracaoEscola->identificacaoOutrasAtividadesPredio)) $campos .=' identificacao_outras_atividades_predio = ?,';
		 if(!empty($configuracaoEscola->docencia)) $campos .=' docencia = ?,';
		 if(!empty($configuracaoEscola->promocaoAcessoInformacao)) $campos .=' promocao_acesso_informacao = ?,';
		 if(!empty($configuracaoEscola->apoioEducacional)) $campos .=' apoio_educacional = ?,';
		 if(!empty($configuracaoEscola->alimentacao)) $campos .=' alimentacao = ?,';
		 if(!empty($configuracaoEscola->saudeEHigiene)) $campos .=' saude_e_higiene = ?,';
		 if(!empty($configuracaoEscola->promocaoConvivencia)) $campos .=' promocao_convivencia = ?,';
		 if(!empty($configuracaoEscola->suportePedagogicoDocencia)) $campos .=' suporte_pedagogico_docencia = ?,';
		 if(!empty($configuracaoEscola->administracao)) $campos .=' administracao = ?,';
		 if(!empty($configuracaoEscola->manutencaoConservacaoSeguranca)) $campos .=' manutencao_conservacao_seguranca = ?,';
		 if(!empty($configuracaoEscola->created)) $campos .=' created = ?,';
		 if(!empty($configuracaoEscola->status)) $campos .=' status = ?,';
		 if(!empty($configuracaoEscola->assentamento)) $campos .=' assentamento = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE configuracao_escola SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($configuracaoEscola->escolaId)) 		$sqlQuery->setNumber($configuracaoEscola->escolaId);
		 if(!empty($configuracaoEscola->predPesq)) 		$sqlQuery->set($configuracaoEscola->predPesq);
		 if(!empty($configuracaoEscola->statusCodificacao)) 		$sqlQuery->set($configuracaoEscola->statusCodificacao);
		 if(!empty($configuracaoEscola->codSeecA)) 		$sqlQuery->set($configuracaoEscola->codSeecA);
		 if(!empty($configuracaoEscola->codSeecB)) 		$sqlQuery->set($configuracaoEscola->codSeecB);
		 if(!empty($configuracaoEscola->dependenciaAdministrativa)) 		$sqlQuery->set($configuracaoEscola->dependenciaAdministrativa);
		 if(!empty($configuracaoEscola->naturezaOcupacao)) 		$sqlQuery->set($configuracaoEscola->naturezaOcupacao);
		 if(!empty($configuracaoEscola->naturezaOcupacaoPredrio)) 		$sqlQuery->set($configuracaoEscola->naturezaOcupacaoPredrio);
		 if(!empty($configuracaoEscola->entidadeProprietariaMovel)) 		$sqlQuery->set($configuracaoEscola->entidadeProprietariaMovel);
		 if(!empty($configuracaoEscola->totalSalasAula)) 		$sqlQuery->setNumber($configuracaoEscola->totalSalasAula);
		 if(!empty($configuracaoEscola->totalSalasLevantada)) 		$sqlQuery->setNumber($configuracaoEscola->totalSalasLevantada);
		 if(!empty($configuracaoEscola->unidadeExecutora)) 		$sqlQuery->set($configuracaoEscola->unidadeExecutora);
		 if(!empty($configuracaoEscola->statusFuncionamento)) 		$sqlQuery->set($configuracaoEscola->statusFuncionamento);
		 if(!empty($configuracaoEscola->situacaoCenso)) 		$sqlQuery->set($configuracaoEscola->situacaoCenso);
		 if(!empty($configuracaoEscola->identificacaoOutrasAtividadesPredio)) 		$sqlQuery->set($configuracaoEscola->identificacaoOutrasAtividadesPredio);
		 if(!empty($configuracaoEscola->docencia)) 		$sqlQuery->set($configuracaoEscola->docencia);
		 if(!empty($configuracaoEscola->promocaoAcessoInformacao)) 		$sqlQuery->set($configuracaoEscola->promocaoAcessoInformacao);
		 if(!empty($configuracaoEscola->apoioEducacional)) 		$sqlQuery->set($configuracaoEscola->apoioEducacional);
		 if(!empty($configuracaoEscola->alimentacao)) 		$sqlQuery->set($configuracaoEscola->alimentacao);
		 if(!empty($configuracaoEscola->saudeEHigiene)) 		$sqlQuery->set($configuracaoEscola->saudeEHigiene);
		 if(!empty($configuracaoEscola->promocaoConvivencia)) 		$sqlQuery->set($configuracaoEscola->promocaoConvivencia);
		 if(!empty($configuracaoEscola->suportePedagogicoDocencia)) 		$sqlQuery->set($configuracaoEscola->suportePedagogicoDocencia);
		 if(!empty($configuracaoEscola->administracao)) 		$sqlQuery->set($configuracaoEscola->administracao);
		 if(!empty($configuracaoEscola->manutencaoConservacaoSeguranca)) 		$sqlQuery->set($configuracaoEscola->manutencaoConservacaoSeguranca);
		 if(!empty($configuracaoEscola->created)) 		$sqlQuery->set($configuracaoEscola->created);
		 if(!empty($configuracaoEscola->status)) 		$sqlQuery->set($configuracaoEscola->status);
		 if(!empty($configuracaoEscola->assentamento)) 		$sqlQuery->set($configuracaoEscola->assentamento);

		$sqlQuery->setNumber($configuracaoEscola->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM configuracao_escola';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByEscolaId($value){
		$sql = 'SELECT * FROM configuracao_escola WHERE escola_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPredPesq($value){
		$sql = 'SELECT * FROM configuracao_escola WHERE pred_pesq = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatusCodificacao($value){
		$sql = 'SELECT * FROM configuracao_escola WHERE status_codificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodSeecA($value){
		$sql = 'SELECT * FROM configuracao_escola WHERE cod_seec_a = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodSeecB($value){
		$sql = 'SELECT * FROM configuracao_escola WHERE cod_seec_b = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDependenciaAdministrativa($value){
		$sql = 'SELECT * FROM configuracao_escola WHERE dependencia_administrativa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNaturezaOcupacao($value){
		$sql = 'SELECT * FROM configuracao_escola WHERE natureza_ocupacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNaturezaOcupacaoPredrio($value){
		$sql = 'SELECT * FROM configuracao_escola WHERE natureza_ocupacao_predrio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEntidadeProprietariaMovel($value){
		$sql = 'SELECT * FROM configuracao_escola WHERE entidade_proprietaria_movel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTotalSalasAula($value){
		$sql = 'SELECT * FROM configuracao_escola WHERE total_salas_aula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTotalSalasLevantada($value){
		$sql = 'SELECT * FROM configuracao_escola WHERE total_salas_levantada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUnidadeExecutora($value){
		$sql = 'SELECT * FROM configuracao_escola WHERE unidade_executora = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatusFuncionamento($value){
		$sql = 'SELECT * FROM configuracao_escola WHERE status_funcionamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySituacaoCenso($value){
		$sql = 'SELECT * FROM configuracao_escola WHERE situacao_censo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdentificacaoOutrasAtividadesPredio($value){
		$sql = 'SELECT * FROM configuracao_escola WHERE identificacao_outras_atividades_predio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDocencia($value){
		$sql = 'SELECT * FROM configuracao_escola WHERE docencia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPromocaoAcessoInformacao($value){
		$sql = 'SELECT * FROM configuracao_escola WHERE promocao_acesso_informacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByApoioEducacional($value){
		$sql = 'SELECT * FROM configuracao_escola WHERE apoio_educacional = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAlimentacao($value){
		$sql = 'SELECT * FROM configuracao_escola WHERE alimentacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySaudeEHigiene($value){
		$sql = 'SELECT * FROM configuracao_escola WHERE saude_e_higiene = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPromocaoConvivencia($value){
		$sql = 'SELECT * FROM configuracao_escola WHERE promocao_convivencia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySuportePedagogicoDocencia($value){
		$sql = 'SELECT * FROM configuracao_escola WHERE suporte_pedagogico_docencia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAdministracao($value){
		$sql = 'SELECT * FROM configuracao_escola WHERE administracao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByManutencaoConservacaoSeguranca($value){
		$sql = 'SELECT * FROM configuracao_escola WHERE manutencao_conservacao_seguranca = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM configuracao_escola WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM configuracao_escola WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAssentamento($value){
		$sql = 'SELECT * FROM configuracao_escola WHERE assentamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByEscolaId($value){
		$sql = 'DELETE FROM configuracao_escola WHERE escola_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPredPesq($value){
		$sql = 'DELETE FROM configuracao_escola WHERE pred_pesq = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatusCodificacao($value){
		$sql = 'DELETE FROM configuracao_escola WHERE status_codificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodSeecA($value){
		$sql = 'DELETE FROM configuracao_escola WHERE cod_seec_a = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodSeecB($value){
		$sql = 'DELETE FROM configuracao_escola WHERE cod_seec_b = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDependenciaAdministrativa($value){
		$sql = 'DELETE FROM configuracao_escola WHERE dependencia_administrativa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNaturezaOcupacao($value){
		$sql = 'DELETE FROM configuracao_escola WHERE natureza_ocupacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNaturezaOcupacaoPredrio($value){
		$sql = 'DELETE FROM configuracao_escola WHERE natureza_ocupacao_predrio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEntidadeProprietariaMovel($value){
		$sql = 'DELETE FROM configuracao_escola WHERE entidade_proprietaria_movel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTotalSalasAula($value){
		$sql = 'DELETE FROM configuracao_escola WHERE total_salas_aula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTotalSalasLevantada($value){
		$sql = 'DELETE FROM configuracao_escola WHERE total_salas_levantada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUnidadeExecutora($value){
		$sql = 'DELETE FROM configuracao_escola WHERE unidade_executora = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatusFuncionamento($value){
		$sql = 'DELETE FROM configuracao_escola WHERE status_funcionamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySituacaoCenso($value){
		$sql = 'DELETE FROM configuracao_escola WHERE situacao_censo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdentificacaoOutrasAtividadesPredio($value){
		$sql = 'DELETE FROM configuracao_escola WHERE identificacao_outras_atividades_predio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDocencia($value){
		$sql = 'DELETE FROM configuracao_escola WHERE docencia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPromocaoAcessoInformacao($value){
		$sql = 'DELETE FROM configuracao_escola WHERE promocao_acesso_informacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByApoioEducacional($value){
		$sql = 'DELETE FROM configuracao_escola WHERE apoio_educacional = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAlimentacao($value){
		$sql = 'DELETE FROM configuracao_escola WHERE alimentacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySaudeEHigiene($value){
		$sql = 'DELETE FROM configuracao_escola WHERE saude_e_higiene = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPromocaoConvivencia($value){
		$sql = 'DELETE FROM configuracao_escola WHERE promocao_convivencia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySuportePedagogicoDocencia($value){
		$sql = 'DELETE FROM configuracao_escola WHERE suporte_pedagogico_docencia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAdministracao($value){
		$sql = 'DELETE FROM configuracao_escola WHERE administracao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByManutencaoConservacaoSeguranca($value){
		$sql = 'DELETE FROM configuracao_escola WHERE manutencao_conservacao_seguranca = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM configuracao_escola WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM configuracao_escola WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAssentamento($value){
		$sql = 'DELETE FROM configuracao_escola WHERE assentamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return ConfiguracaoEscola 
	 */
	protected function readRow($row){
		$configuracaoEscola = new ConfiguracaoEscola();
		
		$configuracaoEscola->id = $row['id'];
		$configuracaoEscola->escolaId = $row['escola_id'];
		$configuracaoEscola->predPesq = $row['pred_pesq'];
		$configuracaoEscola->statusCodificacao = $row['status_codificacao'];
		$configuracaoEscola->codSeecA = $row['cod_seec_a'];
		$configuracaoEscola->codSeecB = $row['cod_seec_b'];
		$configuracaoEscola->dependenciaAdministrativa = $row['dependencia_administrativa'];
		$configuracaoEscola->naturezaOcupacao = $row['natureza_ocupacao'];
		$configuracaoEscola->naturezaOcupacaoPredrio = $row['natureza_ocupacao_predrio'];
		$configuracaoEscola->entidadeProprietariaMovel = $row['entidade_proprietaria_movel'];
		$configuracaoEscola->totalSalasAula = $row['total_salas_aula'];
		$configuracaoEscola->totalSalasLevantada = $row['total_salas_levantada'];
		$configuracaoEscola->unidadeExecutora = $row['unidade_executora'];
		$configuracaoEscola->statusFuncionamento = $row['status_funcionamento'];
		$configuracaoEscola->situacaoCenso = $row['situacao_censo'];
		$configuracaoEscola->identificacaoOutrasAtividadesPredio = $row['identificacao_outras_atividades_predio'];
		$configuracaoEscola->docencia = $row['docencia'];
		$configuracaoEscola->promocaoAcessoInformacao = $row['promocao_acesso_informacao'];
		$configuracaoEscola->apoioEducacional = $row['apoio_educacional'];
		$configuracaoEscola->alimentacao = $row['alimentacao'];
		$configuracaoEscola->saudeEHigiene = $row['saude_e_higiene'];
		$configuracaoEscola->promocaoConvivencia = $row['promocao_convivencia'];
		$configuracaoEscola->suportePedagogicoDocencia = $row['suporte_pedagogico_docencia'];
		$configuracaoEscola->administracao = $row['administracao'];
		$configuracaoEscola->manutencaoConservacaoSeguranca = $row['manutencao_conservacao_seguranca'];
		$configuracaoEscola->created = $row['created'];
		$configuracaoEscola->status = $row['status'];
		$configuracaoEscola->assentamento = $row['assentamento'];

		return $configuracaoEscola;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get registro
	 *
	 * @return ConfiguracaoEscola 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query para um registro e uma coluna
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Inseri um registro na tabela
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>