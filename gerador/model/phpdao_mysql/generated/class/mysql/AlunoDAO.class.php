<?php
/**
 * Classe operadora da tabela 'aluno'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class AlunoDAO extends Model implements AlunoI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Aluno 
	 */
	public function load($id){
		$sql = 'SELECT * FROM aluno WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Aluno      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM aluno '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM aluno '.$criterio.'';
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
		$sql = 'SELECT * FROM aluno ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param aluno primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM aluno WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Aluno aluno
 	 */
	public function insert($aluno){
		$sql = 'INSERT INTO aluno (nome, endereco, numero, bairro, cidade, nacionalidade, cep, uf, local, complemento, inep, nis, telefone, celular, email, peso, altura, raca, tipo_defic, tipo_transp_escolar, id_educ_censo, tipo_uso_internet, sexo, reg_nascimento, reg_livro_num, reg_folha_num, reg_comarca, rg, rg_orgao, rg_data_expedicao, titulo, titulo_zona, titulo_secao, reservista, reservista_serie, reservista_numero, reservista_categ_num, reservista_csm, cart_prof, grupo_sangue, grupo_sangue_rh, grupo_sangue_alergia, grupo_sangue_diabetico, outra_doenca, familia_composta, estado_civil, usa_oculos, destro, convenio, nome_pai, pai_vivo, pai_nacionalidade, pai_naturalidade, pai_niv_escolar, pai_religiao, pai_profissao, pai_ender_trab, pai_telefone, pai_email, pai_titulo, pai_titulo_zona, pai_titulo_secao, nome_mae, mae_viva, mae_nacionalidade, mae_naturalidade, mae_niv_escolar, mae_religiao, mae_profissao, mae_ender_trab, mae_telefone, mae_email, mae_titulo, mae_titulo_zona, mae_titulo_secao, mae_nis, pai_nis, nome_responsavel, parentesco_responsavel, nacional_responsavel, natural_responsavel, niv_escolar_responsavel, religiao_responsavel, profissao_responsavel, ender_trab_responsavel, telef_responsavel, email_responsavel, titulo_responsavel, titulo_zona_responsavel, titulo_secao_responsavel, descri_transp_escolar, pai_uf, mae_uf, responsavel_uf, data_nascimento, uf_reg_comarca, cpf_aluno, cpf_pai, cpf_mae, cpf_responsavel, cod_uf, cod_cidade, cod_pais, created, status, senha, foto, colabora_renda_familiar) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($aluno->nome);
		$sqlQuery->set($aluno->endereco);
		$sqlQuery->set($aluno->numero);
		$sqlQuery->set($aluno->bairro);
		$sqlQuery->set($aluno->cidade);
		$sqlQuery->set($aluno->nacionalidade);
		$sqlQuery->set($aluno->cep);
		$sqlQuery->set($aluno->uf);
		$sqlQuery->set($aluno->local);
		$sqlQuery->set($aluno->complemento);
		$sqlQuery->set($aluno->inep);
		$sqlQuery->set($aluno->ni);
		$sqlQuery->set($aluno->telefone);
		$sqlQuery->set($aluno->celular);
		$sqlQuery->set($aluno->email);
		$sqlQuery->set($aluno->peso);
		$sqlQuery->set($aluno->altura);
		$sqlQuery->set($aluno->raca);
		$sqlQuery->set($aluno->tipoDefic);
		$sqlQuery->set($aluno->tipoTranspEscolar);
		$sqlQuery->set($aluno->idEducCenso);
		$sqlQuery->set($aluno->tipoUsoInternet);
		$sqlQuery->set($aluno->sexo);
		$sqlQuery->set($aluno->regNascimento);
		$sqlQuery->set($aluno->regLivroNum);
		$sqlQuery->set($aluno->regFolhaNum);
		$sqlQuery->set($aluno->regComarca);
		$sqlQuery->set($aluno->rg);
		$sqlQuery->set($aluno->rgOrgao);
		$sqlQuery->set($aluno->rgDataExpedicao);
		$sqlQuery->set($aluno->titulo);
		$sqlQuery->set($aluno->tituloZona);
		$sqlQuery->set($aluno->tituloSecao);
		$sqlQuery->set($aluno->reservista);
		$sqlQuery->set($aluno->reservistaSerie);
		$sqlQuery->set($aluno->reservistaNumero);
		$sqlQuery->set($aluno->reservistaCategNum);
		$sqlQuery->set($aluno->reservistaCsm);
		$sqlQuery->set($aluno->cartProf);
		$sqlQuery->set($aluno->grupoSangue);
		$sqlQuery->set($aluno->grupoSangueRh);
		$sqlQuery->set($aluno->grupoSangueAlergia);
		$sqlQuery->set($aluno->grupoSangueDiabetico);
		$sqlQuery->set($aluno->outraDoenca);
		$sqlQuery->set($aluno->familiaComposta);
		$sqlQuery->set($aluno->estadoCivil);
		$sqlQuery->set($aluno->usaOculo);
		$sqlQuery->set($aluno->destro);
		$sqlQuery->set($aluno->convenio);
		$sqlQuery->set($aluno->nomePai);
		$sqlQuery->set($aluno->paiVivo);
		$sqlQuery->set($aluno->paiNacionalidade);
		$sqlQuery->set($aluno->paiNaturalidade);
		$sqlQuery->set($aluno->paiNivEscolar);
		$sqlQuery->set($aluno->paiReligiao);
		$sqlQuery->set($aluno->paiProfissao);
		$sqlQuery->set($aluno->paiEnderTrab);
		$sqlQuery->set($aluno->paiTelefone);
		$sqlQuery->set($aluno->paiEmail);
		$sqlQuery->set($aluno->paiTitulo);
		$sqlQuery->set($aluno->paiTituloZona);
		$sqlQuery->set($aluno->paiTituloSecao);
		$sqlQuery->set($aluno->nomeMae);
		$sqlQuery->set($aluno->maeViva);
		$sqlQuery->set($aluno->maeNacionalidade);
		$sqlQuery->set($aluno->maeNaturalidade);
		$sqlQuery->set($aluno->maeNivEscolar);
		$sqlQuery->set($aluno->maeReligiao);
		$sqlQuery->set($aluno->maeProfissao);
		$sqlQuery->set($aluno->maeEnderTrab);
		$sqlQuery->set($aluno->maeTelefone);
		$sqlQuery->set($aluno->maeEmail);
		$sqlQuery->set($aluno->maeTitulo);
		$sqlQuery->set($aluno->maeTituloZona);
		$sqlQuery->set($aluno->maeTituloSecao);
		$sqlQuery->set($aluno->maeNi);
		$sqlQuery->set($aluno->paiNi);
		$sqlQuery->set($aluno->nomeResponsavel);
		$sqlQuery->set($aluno->parentescoResponsavel);
		$sqlQuery->set($aluno->nacionalResponsavel);
		$sqlQuery->set($aluno->naturalResponsavel);
		$sqlQuery->set($aluno->nivEscolarResponsavel);
		$sqlQuery->set($aluno->religiaoResponsavel);
		$sqlQuery->set($aluno->profissaoResponsavel);
		$sqlQuery->set($aluno->enderTrabResponsavel);
		$sqlQuery->set($aluno->telefResponsavel);
		$sqlQuery->set($aluno->emailResponsavel);
		$sqlQuery->set($aluno->tituloResponsavel);
		$sqlQuery->set($aluno->tituloZonaResponsavel);
		$sqlQuery->set($aluno->tituloSecaoResponsavel);
		$sqlQuery->set($aluno->descriTranspEscolar);
		$sqlQuery->set($aluno->paiUf);
		$sqlQuery->set($aluno->maeUf);
		$sqlQuery->set($aluno->responsavelUf);
		$sqlQuery->set($aluno->dataNascimento);
		$sqlQuery->set($aluno->ufRegComarca);
		$sqlQuery->set($aluno->cpfAluno);
		$sqlQuery->set($aluno->cpfPai);
		$sqlQuery->set($aluno->cpfMae);
		$sqlQuery->set($aluno->cpfResponsavel);
		$sqlQuery->set($aluno->codUf);
		$sqlQuery->set($aluno->codCidade);
		$sqlQuery->set($aluno->codPai);
		$sqlQuery->set($aluno->created);
		$sqlQuery->set($aluno->status);
		$sqlQuery->set($aluno->senha);
		$sqlQuery->set($aluno->foto);
		$sqlQuery->set($aluno->colaboraRendaFamiliar);

		$id = $this->executeInsert($sqlQuery);	
		$aluno->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Aluno aluno
 	 */
	public function update($aluno){
		$campos = "";
        
        
		 if(!empty($aluno->nome)) $campos .=' nome = ?,';
		 if(!empty($aluno->endereco)) $campos .=' endereco = ?,';
		 if(!empty($aluno->numero)) $campos .=' numero = ?,';
		 if(!empty($aluno->bairro)) $campos .=' bairro = ?,';
		 if(!empty($aluno->cidade)) $campos .=' cidade = ?,';
		 if(!empty($aluno->nacionalidade)) $campos .=' nacionalidade = ?,';
		 if(!empty($aluno->cep)) $campos .=' cep = ?,';
		 if(!empty($aluno->uf)) $campos .=' uf = ?,';
		 if(!empty($aluno->local)) $campos .=' local = ?,';
		 if(!empty($aluno->complemento)) $campos .=' complemento = ?,';
		 if(!empty($aluno->inep)) $campos .=' inep = ?,';
		 if(!empty($aluno->ni)) $campos .=' nis = ?,';
		 if(!empty($aluno->telefone)) $campos .=' telefone = ?,';
		 if(!empty($aluno->celular)) $campos .=' celular = ?,';
		 if(!empty($aluno->email)) $campos .=' email = ?,';
		 if(!empty($aluno->peso)) $campos .=' peso = ?,';
		 if(!empty($aluno->altura)) $campos .=' altura = ?,';
		 if(!empty($aluno->raca)) $campos .=' raca = ?,';
		 if(!empty($aluno->tipoDefic)) $campos .=' tipo_defic = ?,';
		 if(!empty($aluno->tipoTranspEscolar)) $campos .=' tipo_transp_escolar = ?,';
		 if(!empty($aluno->idEducCenso)) $campos .=' id_educ_censo = ?,';
		 if(!empty($aluno->tipoUsoInternet)) $campos .=' tipo_uso_internet = ?,';
		 if(!empty($aluno->sexo)) $campos .=' sexo = ?,';
		 if(!empty($aluno->regNascimento)) $campos .=' reg_nascimento = ?,';
		 if(!empty($aluno->regLivroNum)) $campos .=' reg_livro_num = ?,';
		 if(!empty($aluno->regFolhaNum)) $campos .=' reg_folha_num = ?,';
		 if(!empty($aluno->regComarca)) $campos .=' reg_comarca = ?,';
		 if(!empty($aluno->rg)) $campos .=' rg = ?,';
		 if(!empty($aluno->rgOrgao)) $campos .=' rg_orgao = ?,';
		 if(!empty($aluno->rgDataExpedicao)) $campos .=' rg_data_expedicao = ?,';
		 if(!empty($aluno->titulo)) $campos .=' titulo = ?,';
		 if(!empty($aluno->tituloZona)) $campos .=' titulo_zona = ?,';
		 if(!empty($aluno->tituloSecao)) $campos .=' titulo_secao = ?,';
		 if(!empty($aluno->reservista)) $campos .=' reservista = ?,';
		 if(!empty($aluno->reservistaSerie)) $campos .=' reservista_serie = ?,';
		 if(!empty($aluno->reservistaNumero)) $campos .=' reservista_numero = ?,';
		 if(!empty($aluno->reservistaCategNum)) $campos .=' reservista_categ_num = ?,';
		 if(!empty($aluno->reservistaCsm)) $campos .=' reservista_csm = ?,';
		 if(!empty($aluno->cartProf)) $campos .=' cart_prof = ?,';
		 if(!empty($aluno->grupoSangue)) $campos .=' grupo_sangue = ?,';
		 if(!empty($aluno->grupoSangueRh)) $campos .=' grupo_sangue_rh = ?,';
		 if(!empty($aluno->grupoSangueAlergia)) $campos .=' grupo_sangue_alergia = ?,';
		 if(!empty($aluno->grupoSangueDiabetico)) $campos .=' grupo_sangue_diabetico = ?,';
		 if(!empty($aluno->outraDoenca)) $campos .=' outra_doenca = ?,';
		 if(!empty($aluno->familiaComposta)) $campos .=' familia_composta = ?,';
		 if(!empty($aluno->estadoCivil)) $campos .=' estado_civil = ?,';
		 if(!empty($aluno->usaOculo)) $campos .=' usa_oculos = ?,';
		 if(!empty($aluno->destro)) $campos .=' destro = ?,';
		 if(!empty($aluno->convenio)) $campos .=' convenio = ?,';
		 if(!empty($aluno->nomePai)) $campos .=' nome_pai = ?,';
		 if(!empty($aluno->paiVivo)) $campos .=' pai_vivo = ?,';
		 if(!empty($aluno->paiNacionalidade)) $campos .=' pai_nacionalidade = ?,';
		 if(!empty($aluno->paiNaturalidade)) $campos .=' pai_naturalidade = ?,';
		 if(!empty($aluno->paiNivEscolar)) $campos .=' pai_niv_escolar = ?,';
		 if(!empty($aluno->paiReligiao)) $campos .=' pai_religiao = ?,';
		 if(!empty($aluno->paiProfissao)) $campos .=' pai_profissao = ?,';
		 if(!empty($aluno->paiEnderTrab)) $campos .=' pai_ender_trab = ?,';
		 if(!empty($aluno->paiTelefone)) $campos .=' pai_telefone = ?,';
		 if(!empty($aluno->paiEmail)) $campos .=' pai_email = ?,';
		 if(!empty($aluno->paiTitulo)) $campos .=' pai_titulo = ?,';
		 if(!empty($aluno->paiTituloZona)) $campos .=' pai_titulo_zona = ?,';
		 if(!empty($aluno->paiTituloSecao)) $campos .=' pai_titulo_secao = ?,';
		 if(!empty($aluno->nomeMae)) $campos .=' nome_mae = ?,';
		 if(!empty($aluno->maeViva)) $campos .=' mae_viva = ?,';
		 if(!empty($aluno->maeNacionalidade)) $campos .=' mae_nacionalidade = ?,';
		 if(!empty($aluno->maeNaturalidade)) $campos .=' mae_naturalidade = ?,';
		 if(!empty($aluno->maeNivEscolar)) $campos .=' mae_niv_escolar = ?,';
		 if(!empty($aluno->maeReligiao)) $campos .=' mae_religiao = ?,';
		 if(!empty($aluno->maeProfissao)) $campos .=' mae_profissao = ?,';
		 if(!empty($aluno->maeEnderTrab)) $campos .=' mae_ender_trab = ?,';
		 if(!empty($aluno->maeTelefone)) $campos .=' mae_telefone = ?,';
		 if(!empty($aluno->maeEmail)) $campos .=' mae_email = ?,';
		 if(!empty($aluno->maeTitulo)) $campos .=' mae_titulo = ?,';
		 if(!empty($aluno->maeTituloZona)) $campos .=' mae_titulo_zona = ?,';
		 if(!empty($aluno->maeTituloSecao)) $campos .=' mae_titulo_secao = ?,';
		 if(!empty($aluno->maeNi)) $campos .=' mae_nis = ?,';
		 if(!empty($aluno->paiNi)) $campos .=' pai_nis = ?,';
		 if(!empty($aluno->nomeResponsavel)) $campos .=' nome_responsavel = ?,';
		 if(!empty($aluno->parentescoResponsavel)) $campos .=' parentesco_responsavel = ?,';
		 if(!empty($aluno->nacionalResponsavel)) $campos .=' nacional_responsavel = ?,';
		 if(!empty($aluno->naturalResponsavel)) $campos .=' natural_responsavel = ?,';
		 if(!empty($aluno->nivEscolarResponsavel)) $campos .=' niv_escolar_responsavel = ?,';
		 if(!empty($aluno->religiaoResponsavel)) $campos .=' religiao_responsavel = ?,';
		 if(!empty($aluno->profissaoResponsavel)) $campos .=' profissao_responsavel = ?,';
		 if(!empty($aluno->enderTrabResponsavel)) $campos .=' ender_trab_responsavel = ?,';
		 if(!empty($aluno->telefResponsavel)) $campos .=' telef_responsavel = ?,';
		 if(!empty($aluno->emailResponsavel)) $campos .=' email_responsavel = ?,';
		 if(!empty($aluno->tituloResponsavel)) $campos .=' titulo_responsavel = ?,';
		 if(!empty($aluno->tituloZonaResponsavel)) $campos .=' titulo_zona_responsavel = ?,';
		 if(!empty($aluno->tituloSecaoResponsavel)) $campos .=' titulo_secao_responsavel = ?,';
		 if(!empty($aluno->descriTranspEscolar)) $campos .=' descri_transp_escolar = ?,';
		 if(!empty($aluno->paiUf)) $campos .=' pai_uf = ?,';
		 if(!empty($aluno->maeUf)) $campos .=' mae_uf = ?,';
		 if(!empty($aluno->responsavelUf)) $campos .=' responsavel_uf = ?,';
		 if(!empty($aluno->dataNascimento)) $campos .=' data_nascimento = ?,';
		 if(!empty($aluno->ufRegComarca)) $campos .=' uf_reg_comarca = ?,';
		 if(!empty($aluno->cpfAluno)) $campos .=' cpf_aluno = ?,';
		 if(!empty($aluno->cpfPai)) $campos .=' cpf_pai = ?,';
		 if(!empty($aluno->cpfMae)) $campos .=' cpf_mae = ?,';
		 if(!empty($aluno->cpfResponsavel)) $campos .=' cpf_responsavel = ?,';
		 if(!empty($aluno->codUf)) $campos .=' cod_uf = ?,';
		 if(!empty($aluno->codCidade)) $campos .=' cod_cidade = ?,';
		 if(!empty($aluno->codPai)) $campos .=' cod_pais = ?,';
		 if(!empty($aluno->created)) $campos .=' created = ?,';
		 if(!empty($aluno->status)) $campos .=' status = ?,';
		 if(!empty($aluno->senha)) $campos .=' senha = ?,';
		 if(!empty($aluno->foto)) $campos .=' foto = ?,';
		 if(!empty($aluno->colaboraRendaFamiliar)) $campos .=' colabora_renda_familiar = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE aluno SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($aluno->nome)) 		$sqlQuery->set($aluno->nome);
		 if(!empty($aluno->endereco)) 		$sqlQuery->set($aluno->endereco);
		 if(!empty($aluno->numero)) 		$sqlQuery->set($aluno->numero);
		 if(!empty($aluno->bairro)) 		$sqlQuery->set($aluno->bairro);
		 if(!empty($aluno->cidade)) 		$sqlQuery->set($aluno->cidade);
		 if(!empty($aluno->nacionalidade)) 		$sqlQuery->set($aluno->nacionalidade);
		 if(!empty($aluno->cep)) 		$sqlQuery->set($aluno->cep);
		 if(!empty($aluno->uf)) 		$sqlQuery->set($aluno->uf);
		 if(!empty($aluno->local)) 		$sqlQuery->set($aluno->local);
		 if(!empty($aluno->complemento)) 		$sqlQuery->set($aluno->complemento);
		 if(!empty($aluno->inep)) 		$sqlQuery->set($aluno->inep);
		 if(!empty($aluno->ni)) 		$sqlQuery->set($aluno->ni);
		 if(!empty($aluno->telefone)) 		$sqlQuery->set($aluno->telefone);
		 if(!empty($aluno->celular)) 		$sqlQuery->set($aluno->celular);
		 if(!empty($aluno->email)) 		$sqlQuery->set($aluno->email);
		 if(!empty($aluno->peso)) 		$sqlQuery->set($aluno->peso);
		 if(!empty($aluno->altura)) 		$sqlQuery->set($aluno->altura);
		 if(!empty($aluno->raca)) 		$sqlQuery->set($aluno->raca);
		 if(!empty($aluno->tipoDefic)) 		$sqlQuery->set($aluno->tipoDefic);
		 if(!empty($aluno->tipoTranspEscolar)) 		$sqlQuery->set($aluno->tipoTranspEscolar);
		 if(!empty($aluno->idEducCenso)) 		$sqlQuery->set($aluno->idEducCenso);
		 if(!empty($aluno->tipoUsoInternet)) 		$sqlQuery->set($aluno->tipoUsoInternet);
		 if(!empty($aluno->sexo)) 		$sqlQuery->set($aluno->sexo);
		 if(!empty($aluno->regNascimento)) 		$sqlQuery->set($aluno->regNascimento);
		 if(!empty($aluno->regLivroNum)) 		$sqlQuery->set($aluno->regLivroNum);
		 if(!empty($aluno->regFolhaNum)) 		$sqlQuery->set($aluno->regFolhaNum);
		 if(!empty($aluno->regComarca)) 		$sqlQuery->set($aluno->regComarca);
		 if(!empty($aluno->rg)) 		$sqlQuery->set($aluno->rg);
		 if(!empty($aluno->rgOrgao)) 		$sqlQuery->set($aluno->rgOrgao);
		 if(!empty($aluno->rgDataExpedicao)) 		$sqlQuery->set($aluno->rgDataExpedicao);
		 if(!empty($aluno->titulo)) 		$sqlQuery->set($aluno->titulo);
		 if(!empty($aluno->tituloZona)) 		$sqlQuery->set($aluno->tituloZona);
		 if(!empty($aluno->tituloSecao)) 		$sqlQuery->set($aluno->tituloSecao);
		 if(!empty($aluno->reservista)) 		$sqlQuery->set($aluno->reservista);
		 if(!empty($aluno->reservistaSerie)) 		$sqlQuery->set($aluno->reservistaSerie);
		 if(!empty($aluno->reservistaNumero)) 		$sqlQuery->set($aluno->reservistaNumero);
		 if(!empty($aluno->reservistaCategNum)) 		$sqlQuery->set($aluno->reservistaCategNum);
		 if(!empty($aluno->reservistaCsm)) 		$sqlQuery->set($aluno->reservistaCsm);
		 if(!empty($aluno->cartProf)) 		$sqlQuery->set($aluno->cartProf);
		 if(!empty($aluno->grupoSangue)) 		$sqlQuery->set($aluno->grupoSangue);
		 if(!empty($aluno->grupoSangueRh)) 		$sqlQuery->set($aluno->grupoSangueRh);
		 if(!empty($aluno->grupoSangueAlergia)) 		$sqlQuery->set($aluno->grupoSangueAlergia);
		 if(!empty($aluno->grupoSangueDiabetico)) 		$sqlQuery->set($aluno->grupoSangueDiabetico);
		 if(!empty($aluno->outraDoenca)) 		$sqlQuery->set($aluno->outraDoenca);
		 if(!empty($aluno->familiaComposta)) 		$sqlQuery->set($aluno->familiaComposta);
		 if(!empty($aluno->estadoCivil)) 		$sqlQuery->set($aluno->estadoCivil);
		 if(!empty($aluno->usaOculo)) 		$sqlQuery->set($aluno->usaOculo);
		 if(!empty($aluno->destro)) 		$sqlQuery->set($aluno->destro);
		 if(!empty($aluno->convenio)) 		$sqlQuery->set($aluno->convenio);
		 if(!empty($aluno->nomePai)) 		$sqlQuery->set($aluno->nomePai);
		 if(!empty($aluno->paiVivo)) 		$sqlQuery->set($aluno->paiVivo);
		 if(!empty($aluno->paiNacionalidade)) 		$sqlQuery->set($aluno->paiNacionalidade);
		 if(!empty($aluno->paiNaturalidade)) 		$sqlQuery->set($aluno->paiNaturalidade);
		 if(!empty($aluno->paiNivEscolar)) 		$sqlQuery->set($aluno->paiNivEscolar);
		 if(!empty($aluno->paiReligiao)) 		$sqlQuery->set($aluno->paiReligiao);
		 if(!empty($aluno->paiProfissao)) 		$sqlQuery->set($aluno->paiProfissao);
		 if(!empty($aluno->paiEnderTrab)) 		$sqlQuery->set($aluno->paiEnderTrab);
		 if(!empty($aluno->paiTelefone)) 		$sqlQuery->set($aluno->paiTelefone);
		 if(!empty($aluno->paiEmail)) 		$sqlQuery->set($aluno->paiEmail);
		 if(!empty($aluno->paiTitulo)) 		$sqlQuery->set($aluno->paiTitulo);
		 if(!empty($aluno->paiTituloZona)) 		$sqlQuery->set($aluno->paiTituloZona);
		 if(!empty($aluno->paiTituloSecao)) 		$sqlQuery->set($aluno->paiTituloSecao);
		 if(!empty($aluno->nomeMae)) 		$sqlQuery->set($aluno->nomeMae);
		 if(!empty($aluno->maeViva)) 		$sqlQuery->set($aluno->maeViva);
		 if(!empty($aluno->maeNacionalidade)) 		$sqlQuery->set($aluno->maeNacionalidade);
		 if(!empty($aluno->maeNaturalidade)) 		$sqlQuery->set($aluno->maeNaturalidade);
		 if(!empty($aluno->maeNivEscolar)) 		$sqlQuery->set($aluno->maeNivEscolar);
		 if(!empty($aluno->maeReligiao)) 		$sqlQuery->set($aluno->maeReligiao);
		 if(!empty($aluno->maeProfissao)) 		$sqlQuery->set($aluno->maeProfissao);
		 if(!empty($aluno->maeEnderTrab)) 		$sqlQuery->set($aluno->maeEnderTrab);
		 if(!empty($aluno->maeTelefone)) 		$sqlQuery->set($aluno->maeTelefone);
		 if(!empty($aluno->maeEmail)) 		$sqlQuery->set($aluno->maeEmail);
		 if(!empty($aluno->maeTitulo)) 		$sqlQuery->set($aluno->maeTitulo);
		 if(!empty($aluno->maeTituloZona)) 		$sqlQuery->set($aluno->maeTituloZona);
		 if(!empty($aluno->maeTituloSecao)) 		$sqlQuery->set($aluno->maeTituloSecao);
		 if(!empty($aluno->maeNi)) 		$sqlQuery->set($aluno->maeNi);
		 if(!empty($aluno->paiNi)) 		$sqlQuery->set($aluno->paiNi);
		 if(!empty($aluno->nomeResponsavel)) 		$sqlQuery->set($aluno->nomeResponsavel);
		 if(!empty($aluno->parentescoResponsavel)) 		$sqlQuery->set($aluno->parentescoResponsavel);
		 if(!empty($aluno->nacionalResponsavel)) 		$sqlQuery->set($aluno->nacionalResponsavel);
		 if(!empty($aluno->naturalResponsavel)) 		$sqlQuery->set($aluno->naturalResponsavel);
		 if(!empty($aluno->nivEscolarResponsavel)) 		$sqlQuery->set($aluno->nivEscolarResponsavel);
		 if(!empty($aluno->religiaoResponsavel)) 		$sqlQuery->set($aluno->religiaoResponsavel);
		 if(!empty($aluno->profissaoResponsavel)) 		$sqlQuery->set($aluno->profissaoResponsavel);
		 if(!empty($aluno->enderTrabResponsavel)) 		$sqlQuery->set($aluno->enderTrabResponsavel);
		 if(!empty($aluno->telefResponsavel)) 		$sqlQuery->set($aluno->telefResponsavel);
		 if(!empty($aluno->emailResponsavel)) 		$sqlQuery->set($aluno->emailResponsavel);
		 if(!empty($aluno->tituloResponsavel)) 		$sqlQuery->set($aluno->tituloResponsavel);
		 if(!empty($aluno->tituloZonaResponsavel)) 		$sqlQuery->set($aluno->tituloZonaResponsavel);
		 if(!empty($aluno->tituloSecaoResponsavel)) 		$sqlQuery->set($aluno->tituloSecaoResponsavel);
		 if(!empty($aluno->descriTranspEscolar)) 		$sqlQuery->set($aluno->descriTranspEscolar);
		 if(!empty($aluno->paiUf)) 		$sqlQuery->set($aluno->paiUf);
		 if(!empty($aluno->maeUf)) 		$sqlQuery->set($aluno->maeUf);
		 if(!empty($aluno->responsavelUf)) 		$sqlQuery->set($aluno->responsavelUf);
		 if(!empty($aluno->dataNascimento)) 		$sqlQuery->set($aluno->dataNascimento);
		 if(!empty($aluno->ufRegComarca)) 		$sqlQuery->set($aluno->ufRegComarca);
		 if(!empty($aluno->cpfAluno)) 		$sqlQuery->set($aluno->cpfAluno);
		 if(!empty($aluno->cpfPai)) 		$sqlQuery->set($aluno->cpfPai);
		 if(!empty($aluno->cpfMae)) 		$sqlQuery->set($aluno->cpfMae);
		 if(!empty($aluno->cpfResponsavel)) 		$sqlQuery->set($aluno->cpfResponsavel);
		 if(!empty($aluno->codUf)) 		$sqlQuery->set($aluno->codUf);
		 if(!empty($aluno->codCidade)) 		$sqlQuery->set($aluno->codCidade);
		 if(!empty($aluno->codPai)) 		$sqlQuery->set($aluno->codPai);
		 if(!empty($aluno->created)) 		$sqlQuery->set($aluno->created);
		 if(!empty($aluno->status)) 		$sqlQuery->set($aluno->status);
		 if(!empty($aluno->senha)) 		$sqlQuery->set($aluno->senha);
		 if(!empty($aluno->foto)) 		$sqlQuery->set($aluno->foto);
		 if(!empty($aluno->colaboraRendaFamiliar)) 		$sqlQuery->set($aluno->colaboraRendaFamiliar);

		$sqlQuery->setNumber($aluno->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM aluno';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM aluno WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEndereco($value){
		$sql = 'SELECT * FROM aluno WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumero($value){
		$sql = 'SELECT * FROM aluno WHERE numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBairro($value){
		$sql = 'SELECT * FROM aluno WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCidade($value){
		$sql = 'SELECT * FROM aluno WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNacionalidade($value){
		$sql = 'SELECT * FROM aluno WHERE nacionalidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCep($value){
		$sql = 'SELECT * FROM aluno WHERE cep = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUf($value){
		$sql = 'SELECT * FROM aluno WHERE uf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLocal($value){
		$sql = 'SELECT * FROM aluno WHERE local = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByComplemento($value){
		$sql = 'SELECT * FROM aluno WHERE complemento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByInep($value){
		$sql = 'SELECT * FROM aluno WHERE inep = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNis($value){
		$sql = 'SELECT * FROM aluno WHERE nis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefone($value){
		$sql = 'SELECT * FROM aluno WHERE telefone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCelular($value){
		$sql = 'SELECT * FROM aluno WHERE celular = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM aluno WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPeso($value){
		$sql = 'SELECT * FROM aluno WHERE peso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAltura($value){
		$sql = 'SELECT * FROM aluno WHERE altura = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRaca($value){
		$sql = 'SELECT * FROM aluno WHERE raca = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipoDefic($value){
		$sql = 'SELECT * FROM aluno WHERE tipo_defic = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipoTranspEscolar($value){
		$sql = 'SELECT * FROM aluno WHERE tipo_transp_escolar = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdEducCenso($value){
		$sql = 'SELECT * FROM aluno WHERE id_educ_censo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipoUsoInternet($value){
		$sql = 'SELECT * FROM aluno WHERE tipo_uso_internet = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySexo($value){
		$sql = 'SELECT * FROM aluno WHERE sexo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRegNascimento($value){
		$sql = 'SELECT * FROM aluno WHERE reg_nascimento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRegLivroNum($value){
		$sql = 'SELECT * FROM aluno WHERE reg_livro_num = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRegFolhaNum($value){
		$sql = 'SELECT * FROM aluno WHERE reg_folha_num = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRegComarca($value){
		$sql = 'SELECT * FROM aluno WHERE reg_comarca = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRg($value){
		$sql = 'SELECT * FROM aluno WHERE rg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRgOrgao($value){
		$sql = 'SELECT * FROM aluno WHERE rg_orgao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRgDataExpedicao($value){
		$sql = 'SELECT * FROM aluno WHERE rg_data_expedicao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTitulo($value){
		$sql = 'SELECT * FROM aluno WHERE titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTituloZona($value){
		$sql = 'SELECT * FROM aluno WHERE titulo_zona = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTituloSecao($value){
		$sql = 'SELECT * FROM aluno WHERE titulo_secao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByReservista($value){
		$sql = 'SELECT * FROM aluno WHERE reservista = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByReservistaSerie($value){
		$sql = 'SELECT * FROM aluno WHERE reservista_serie = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByReservistaNumero($value){
		$sql = 'SELECT * FROM aluno WHERE reservista_numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByReservistaCategNum($value){
		$sql = 'SELECT * FROM aluno WHERE reservista_categ_num = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByReservistaCsm($value){
		$sql = 'SELECT * FROM aluno WHERE reservista_csm = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCartProf($value){
		$sql = 'SELECT * FROM aluno WHERE cart_prof = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGrupoSangue($value){
		$sql = 'SELECT * FROM aluno WHERE grupo_sangue = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGrupoSangueRh($value){
		$sql = 'SELECT * FROM aluno WHERE grupo_sangue_rh = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGrupoSangueAlergia($value){
		$sql = 'SELECT * FROM aluno WHERE grupo_sangue_alergia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGrupoSangueDiabetico($value){
		$sql = 'SELECT * FROM aluno WHERE grupo_sangue_diabetico = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOutraDoenca($value){
		$sql = 'SELECT * FROM aluno WHERE outra_doenca = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFamiliaComposta($value){
		$sql = 'SELECT * FROM aluno WHERE familia_composta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstadoCivil($value){
		$sql = 'SELECT * FROM aluno WHERE estado_civil = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUsaOculos($value){
		$sql = 'SELECT * FROM aluno WHERE usa_oculos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDestro($value){
		$sql = 'SELECT * FROM aluno WHERE destro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByConvenio($value){
		$sql = 'SELECT * FROM aluno WHERE convenio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNomePai($value){
		$sql = 'SELECT * FROM aluno WHERE nome_pai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPaiVivo($value){
		$sql = 'SELECT * FROM aluno WHERE pai_vivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPaiNacionalidade($value){
		$sql = 'SELECT * FROM aluno WHERE pai_nacionalidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPaiNaturalidade($value){
		$sql = 'SELECT * FROM aluno WHERE pai_naturalidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPaiNivEscolar($value){
		$sql = 'SELECT * FROM aluno WHERE pai_niv_escolar = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPaiReligiao($value){
		$sql = 'SELECT * FROM aluno WHERE pai_religiao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPaiProfissao($value){
		$sql = 'SELECT * FROM aluno WHERE pai_profissao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPaiEnderTrab($value){
		$sql = 'SELECT * FROM aluno WHERE pai_ender_trab = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPaiTelefone($value){
		$sql = 'SELECT * FROM aluno WHERE pai_telefone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPaiEmail($value){
		$sql = 'SELECT * FROM aluno WHERE pai_email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPaiTitulo($value){
		$sql = 'SELECT * FROM aluno WHERE pai_titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPaiTituloZona($value){
		$sql = 'SELECT * FROM aluno WHERE pai_titulo_zona = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPaiTituloSecao($value){
		$sql = 'SELECT * FROM aluno WHERE pai_titulo_secao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNomeMae($value){
		$sql = 'SELECT * FROM aluno WHERE nome_mae = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMaeViva($value){
		$sql = 'SELECT * FROM aluno WHERE mae_viva = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMaeNacionalidade($value){
		$sql = 'SELECT * FROM aluno WHERE mae_nacionalidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMaeNaturalidade($value){
		$sql = 'SELECT * FROM aluno WHERE mae_naturalidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMaeNivEscolar($value){
		$sql = 'SELECT * FROM aluno WHERE mae_niv_escolar = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMaeReligiao($value){
		$sql = 'SELECT * FROM aluno WHERE mae_religiao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMaeProfissao($value){
		$sql = 'SELECT * FROM aluno WHERE mae_profissao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMaeEnderTrab($value){
		$sql = 'SELECT * FROM aluno WHERE mae_ender_trab = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMaeTelefone($value){
		$sql = 'SELECT * FROM aluno WHERE mae_telefone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMaeEmail($value){
		$sql = 'SELECT * FROM aluno WHERE mae_email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMaeTitulo($value){
		$sql = 'SELECT * FROM aluno WHERE mae_titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMaeTituloZona($value){
		$sql = 'SELECT * FROM aluno WHERE mae_titulo_zona = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMaeTituloSecao($value){
		$sql = 'SELECT * FROM aluno WHERE mae_titulo_secao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMaeNis($value){
		$sql = 'SELECT * FROM aluno WHERE mae_nis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPaiNis($value){
		$sql = 'SELECT * FROM aluno WHERE pai_nis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNomeResponsavel($value){
		$sql = 'SELECT * FROM aluno WHERE nome_responsavel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByParentescoResponsavel($value){
		$sql = 'SELECT * FROM aluno WHERE parentesco_responsavel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNacionalResponsavel($value){
		$sql = 'SELECT * FROM aluno WHERE nacional_responsavel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNaturalResponsavel($value){
		$sql = 'SELECT * FROM aluno WHERE natural_responsavel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNivEscolarResponsavel($value){
		$sql = 'SELECT * FROM aluno WHERE niv_escolar_responsavel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByReligiaoResponsavel($value){
		$sql = 'SELECT * FROM aluno WHERE religiao_responsavel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProfissaoResponsavel($value){
		$sql = 'SELECT * FROM aluno WHERE profissao_responsavel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEnderTrabResponsavel($value){
		$sql = 'SELECT * FROM aluno WHERE ender_trab_responsavel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefResponsavel($value){
		$sql = 'SELECT * FROM aluno WHERE telef_responsavel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmailResponsavel($value){
		$sql = 'SELECT * FROM aluno WHERE email_responsavel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTituloResponsavel($value){
		$sql = 'SELECT * FROM aluno WHERE titulo_responsavel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTituloZonaResponsavel($value){
		$sql = 'SELECT * FROM aluno WHERE titulo_zona_responsavel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTituloSecaoResponsavel($value){
		$sql = 'SELECT * FROM aluno WHERE titulo_secao_responsavel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescriTranspEscolar($value){
		$sql = 'SELECT * FROM aluno WHERE descri_transp_escolar = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPaiUf($value){
		$sql = 'SELECT * FROM aluno WHERE pai_uf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMaeUf($value){
		$sql = 'SELECT * FROM aluno WHERE mae_uf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByResponsavelUf($value){
		$sql = 'SELECT * FROM aluno WHERE responsavel_uf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataNascimento($value){
		$sql = 'SELECT * FROM aluno WHERE data_nascimento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUfRegComarca($value){
		$sql = 'SELECT * FROM aluno WHERE uf_reg_comarca = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCpfAluno($value){
		$sql = 'SELECT * FROM aluno WHERE cpf_aluno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCpfPai($value){
		$sql = 'SELECT * FROM aluno WHERE cpf_pai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCpfMae($value){
		$sql = 'SELECT * FROM aluno WHERE cpf_mae = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCpfResponsavel($value){
		$sql = 'SELECT * FROM aluno WHERE cpf_responsavel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodUf($value){
		$sql = 'SELECT * FROM aluno WHERE cod_uf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodCidade($value){
		$sql = 'SELECT * FROM aluno WHERE cod_cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodPais($value){
		$sql = 'SELECT * FROM aluno WHERE cod_pais = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM aluno WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM aluno WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySenha($value){
		$sql = 'SELECT * FROM aluno WHERE senha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFoto($value){
		$sql = 'SELECT * FROM aluno WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByColaboraRendaFamiliar($value){
		$sql = 'SELECT * FROM aluno WHERE colabora_renda_familiar = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNome($value){
		$sql = 'DELETE FROM aluno WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEndereco($value){
		$sql = 'DELETE FROM aluno WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumero($value){
		$sql = 'DELETE FROM aluno WHERE numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBairro($value){
		$sql = 'DELETE FROM aluno WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCidade($value){
		$sql = 'DELETE FROM aluno WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNacionalidade($value){
		$sql = 'DELETE FROM aluno WHERE nacionalidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCep($value){
		$sql = 'DELETE FROM aluno WHERE cep = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUf($value){
		$sql = 'DELETE FROM aluno WHERE uf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLocal($value){
		$sql = 'DELETE FROM aluno WHERE local = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByComplemento($value){
		$sql = 'DELETE FROM aluno WHERE complemento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByInep($value){
		$sql = 'DELETE FROM aluno WHERE inep = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNis($value){
		$sql = 'DELETE FROM aluno WHERE nis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefone($value){
		$sql = 'DELETE FROM aluno WHERE telefone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCelular($value){
		$sql = 'DELETE FROM aluno WHERE celular = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM aluno WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPeso($value){
		$sql = 'DELETE FROM aluno WHERE peso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAltura($value){
		$sql = 'DELETE FROM aluno WHERE altura = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRaca($value){
		$sql = 'DELETE FROM aluno WHERE raca = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipoDefic($value){
		$sql = 'DELETE FROM aluno WHERE tipo_defic = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipoTranspEscolar($value){
		$sql = 'DELETE FROM aluno WHERE tipo_transp_escolar = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdEducCenso($value){
		$sql = 'DELETE FROM aluno WHERE id_educ_censo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipoUsoInternet($value){
		$sql = 'DELETE FROM aluno WHERE tipo_uso_internet = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySexo($value){
		$sql = 'DELETE FROM aluno WHERE sexo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRegNascimento($value){
		$sql = 'DELETE FROM aluno WHERE reg_nascimento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRegLivroNum($value){
		$sql = 'DELETE FROM aluno WHERE reg_livro_num = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRegFolhaNum($value){
		$sql = 'DELETE FROM aluno WHERE reg_folha_num = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRegComarca($value){
		$sql = 'DELETE FROM aluno WHERE reg_comarca = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRg($value){
		$sql = 'DELETE FROM aluno WHERE rg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRgOrgao($value){
		$sql = 'DELETE FROM aluno WHERE rg_orgao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRgDataExpedicao($value){
		$sql = 'DELETE FROM aluno WHERE rg_data_expedicao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTitulo($value){
		$sql = 'DELETE FROM aluno WHERE titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTituloZona($value){
		$sql = 'DELETE FROM aluno WHERE titulo_zona = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTituloSecao($value){
		$sql = 'DELETE FROM aluno WHERE titulo_secao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByReservista($value){
		$sql = 'DELETE FROM aluno WHERE reservista = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByReservistaSerie($value){
		$sql = 'DELETE FROM aluno WHERE reservista_serie = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByReservistaNumero($value){
		$sql = 'DELETE FROM aluno WHERE reservista_numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByReservistaCategNum($value){
		$sql = 'DELETE FROM aluno WHERE reservista_categ_num = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByReservistaCsm($value){
		$sql = 'DELETE FROM aluno WHERE reservista_csm = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCartProf($value){
		$sql = 'DELETE FROM aluno WHERE cart_prof = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGrupoSangue($value){
		$sql = 'DELETE FROM aluno WHERE grupo_sangue = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGrupoSangueRh($value){
		$sql = 'DELETE FROM aluno WHERE grupo_sangue_rh = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGrupoSangueAlergia($value){
		$sql = 'DELETE FROM aluno WHERE grupo_sangue_alergia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGrupoSangueDiabetico($value){
		$sql = 'DELETE FROM aluno WHERE grupo_sangue_diabetico = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOutraDoenca($value){
		$sql = 'DELETE FROM aluno WHERE outra_doenca = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFamiliaComposta($value){
		$sql = 'DELETE FROM aluno WHERE familia_composta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstadoCivil($value){
		$sql = 'DELETE FROM aluno WHERE estado_civil = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUsaOculos($value){
		$sql = 'DELETE FROM aluno WHERE usa_oculos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDestro($value){
		$sql = 'DELETE FROM aluno WHERE destro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByConvenio($value){
		$sql = 'DELETE FROM aluno WHERE convenio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNomePai($value){
		$sql = 'DELETE FROM aluno WHERE nome_pai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPaiVivo($value){
		$sql = 'DELETE FROM aluno WHERE pai_vivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPaiNacionalidade($value){
		$sql = 'DELETE FROM aluno WHERE pai_nacionalidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPaiNaturalidade($value){
		$sql = 'DELETE FROM aluno WHERE pai_naturalidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPaiNivEscolar($value){
		$sql = 'DELETE FROM aluno WHERE pai_niv_escolar = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPaiReligiao($value){
		$sql = 'DELETE FROM aluno WHERE pai_religiao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPaiProfissao($value){
		$sql = 'DELETE FROM aluno WHERE pai_profissao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPaiEnderTrab($value){
		$sql = 'DELETE FROM aluno WHERE pai_ender_trab = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPaiTelefone($value){
		$sql = 'DELETE FROM aluno WHERE pai_telefone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPaiEmail($value){
		$sql = 'DELETE FROM aluno WHERE pai_email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPaiTitulo($value){
		$sql = 'DELETE FROM aluno WHERE pai_titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPaiTituloZona($value){
		$sql = 'DELETE FROM aluno WHERE pai_titulo_zona = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPaiTituloSecao($value){
		$sql = 'DELETE FROM aluno WHERE pai_titulo_secao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNomeMae($value){
		$sql = 'DELETE FROM aluno WHERE nome_mae = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMaeViva($value){
		$sql = 'DELETE FROM aluno WHERE mae_viva = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMaeNacionalidade($value){
		$sql = 'DELETE FROM aluno WHERE mae_nacionalidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMaeNaturalidade($value){
		$sql = 'DELETE FROM aluno WHERE mae_naturalidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMaeNivEscolar($value){
		$sql = 'DELETE FROM aluno WHERE mae_niv_escolar = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMaeReligiao($value){
		$sql = 'DELETE FROM aluno WHERE mae_religiao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMaeProfissao($value){
		$sql = 'DELETE FROM aluno WHERE mae_profissao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMaeEnderTrab($value){
		$sql = 'DELETE FROM aluno WHERE mae_ender_trab = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMaeTelefone($value){
		$sql = 'DELETE FROM aluno WHERE mae_telefone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMaeEmail($value){
		$sql = 'DELETE FROM aluno WHERE mae_email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMaeTitulo($value){
		$sql = 'DELETE FROM aluno WHERE mae_titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMaeTituloZona($value){
		$sql = 'DELETE FROM aluno WHERE mae_titulo_zona = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMaeTituloSecao($value){
		$sql = 'DELETE FROM aluno WHERE mae_titulo_secao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMaeNis($value){
		$sql = 'DELETE FROM aluno WHERE mae_nis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPaiNis($value){
		$sql = 'DELETE FROM aluno WHERE pai_nis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNomeResponsavel($value){
		$sql = 'DELETE FROM aluno WHERE nome_responsavel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByParentescoResponsavel($value){
		$sql = 'DELETE FROM aluno WHERE parentesco_responsavel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNacionalResponsavel($value){
		$sql = 'DELETE FROM aluno WHERE nacional_responsavel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNaturalResponsavel($value){
		$sql = 'DELETE FROM aluno WHERE natural_responsavel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNivEscolarResponsavel($value){
		$sql = 'DELETE FROM aluno WHERE niv_escolar_responsavel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByReligiaoResponsavel($value){
		$sql = 'DELETE FROM aluno WHERE religiao_responsavel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProfissaoResponsavel($value){
		$sql = 'DELETE FROM aluno WHERE profissao_responsavel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEnderTrabResponsavel($value){
		$sql = 'DELETE FROM aluno WHERE ender_trab_responsavel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefResponsavel($value){
		$sql = 'DELETE FROM aluno WHERE telef_responsavel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmailResponsavel($value){
		$sql = 'DELETE FROM aluno WHERE email_responsavel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTituloResponsavel($value){
		$sql = 'DELETE FROM aluno WHERE titulo_responsavel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTituloZonaResponsavel($value){
		$sql = 'DELETE FROM aluno WHERE titulo_zona_responsavel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTituloSecaoResponsavel($value){
		$sql = 'DELETE FROM aluno WHERE titulo_secao_responsavel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescriTranspEscolar($value){
		$sql = 'DELETE FROM aluno WHERE descri_transp_escolar = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPaiUf($value){
		$sql = 'DELETE FROM aluno WHERE pai_uf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMaeUf($value){
		$sql = 'DELETE FROM aluno WHERE mae_uf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByResponsavelUf($value){
		$sql = 'DELETE FROM aluno WHERE responsavel_uf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataNascimento($value){
		$sql = 'DELETE FROM aluno WHERE data_nascimento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUfRegComarca($value){
		$sql = 'DELETE FROM aluno WHERE uf_reg_comarca = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCpfAluno($value){
		$sql = 'DELETE FROM aluno WHERE cpf_aluno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCpfPai($value){
		$sql = 'DELETE FROM aluno WHERE cpf_pai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCpfMae($value){
		$sql = 'DELETE FROM aluno WHERE cpf_mae = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCpfResponsavel($value){
		$sql = 'DELETE FROM aluno WHERE cpf_responsavel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodUf($value){
		$sql = 'DELETE FROM aluno WHERE cod_uf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodCidade($value){
		$sql = 'DELETE FROM aluno WHERE cod_cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodPais($value){
		$sql = 'DELETE FROM aluno WHERE cod_pais = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM aluno WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM aluno WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySenha($value){
		$sql = 'DELETE FROM aluno WHERE senha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFoto($value){
		$sql = 'DELETE FROM aluno WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByColaboraRendaFamiliar($value){
		$sql = 'DELETE FROM aluno WHERE colabora_renda_familiar = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Aluno 
	 */
	protected function readRow($row){
		$aluno = new Aluno();
		
		$aluno->id = $row['id'];
		$aluno->nome = $row['nome'];
		$aluno->endereco = $row['endereco'];
		$aluno->numero = $row['numero'];
		$aluno->bairro = $row['bairro'];
		$aluno->cidade = $row['cidade'];
		$aluno->nacionalidade = $row['nacionalidade'];
		$aluno->cep = $row['cep'];
		$aluno->uf = $row['uf'];
		$aluno->local = $row['local'];
		$aluno->complemento = $row['complemento'];
		$aluno->inep = $row['inep'];
		$aluno->ni = $row['nis'];
		$aluno->telefone = $row['telefone'];
		$aluno->celular = $row['celular'];
		$aluno->email = $row['email'];
		$aluno->peso = $row['peso'];
		$aluno->altura = $row['altura'];
		$aluno->raca = $row['raca'];
		$aluno->tipoDefic = $row['tipo_defic'];
		$aluno->tipoTranspEscolar = $row['tipo_transp_escolar'];
		$aluno->idEducCenso = $row['id_educ_censo'];
		$aluno->tipoUsoInternet = $row['tipo_uso_internet'];
		$aluno->sexo = $row['sexo'];
		$aluno->regNascimento = $row['reg_nascimento'];
		$aluno->regLivroNum = $row['reg_livro_num'];
		$aluno->regFolhaNum = $row['reg_folha_num'];
		$aluno->regComarca = $row['reg_comarca'];
		$aluno->rg = $row['rg'];
		$aluno->rgOrgao = $row['rg_orgao'];
		$aluno->rgDataExpedicao = $row['rg_data_expedicao'];
		$aluno->titulo = $row['titulo'];
		$aluno->tituloZona = $row['titulo_zona'];
		$aluno->tituloSecao = $row['titulo_secao'];
		$aluno->reservista = $row['reservista'];
		$aluno->reservistaSerie = $row['reservista_serie'];
		$aluno->reservistaNumero = $row['reservista_numero'];
		$aluno->reservistaCategNum = $row['reservista_categ_num'];
		$aluno->reservistaCsm = $row['reservista_csm'];
		$aluno->cartProf = $row['cart_prof'];
		$aluno->grupoSangue = $row['grupo_sangue'];
		$aluno->grupoSangueRh = $row['grupo_sangue_rh'];
		$aluno->grupoSangueAlergia = $row['grupo_sangue_alergia'];
		$aluno->grupoSangueDiabetico = $row['grupo_sangue_diabetico'];
		$aluno->outraDoenca = $row['outra_doenca'];
		$aluno->familiaComposta = $row['familia_composta'];
		$aluno->estadoCivil = $row['estado_civil'];
		$aluno->usaOculo = $row['usa_oculos'];
		$aluno->destro = $row['destro'];
		$aluno->convenio = $row['convenio'];
		$aluno->nomePai = $row['nome_pai'];
		$aluno->paiVivo = $row['pai_vivo'];
		$aluno->paiNacionalidade = $row['pai_nacionalidade'];
		$aluno->paiNaturalidade = $row['pai_naturalidade'];
		$aluno->paiNivEscolar = $row['pai_niv_escolar'];
		$aluno->paiReligiao = $row['pai_religiao'];
		$aluno->paiProfissao = $row['pai_profissao'];
		$aluno->paiEnderTrab = $row['pai_ender_trab'];
		$aluno->paiTelefone = $row['pai_telefone'];
		$aluno->paiEmail = $row['pai_email'];
		$aluno->paiTitulo = $row['pai_titulo'];
		$aluno->paiTituloZona = $row['pai_titulo_zona'];
		$aluno->paiTituloSecao = $row['pai_titulo_secao'];
		$aluno->nomeMae = $row['nome_mae'];
		$aluno->maeViva = $row['mae_viva'];
		$aluno->maeNacionalidade = $row['mae_nacionalidade'];
		$aluno->maeNaturalidade = $row['mae_naturalidade'];
		$aluno->maeNivEscolar = $row['mae_niv_escolar'];
		$aluno->maeReligiao = $row['mae_religiao'];
		$aluno->maeProfissao = $row['mae_profissao'];
		$aluno->maeEnderTrab = $row['mae_ender_trab'];
		$aluno->maeTelefone = $row['mae_telefone'];
		$aluno->maeEmail = $row['mae_email'];
		$aluno->maeTitulo = $row['mae_titulo'];
		$aluno->maeTituloZona = $row['mae_titulo_zona'];
		$aluno->maeTituloSecao = $row['mae_titulo_secao'];
		$aluno->maeNi = $row['mae_nis'];
		$aluno->paiNi = $row['pai_nis'];
		$aluno->nomeResponsavel = $row['nome_responsavel'];
		$aluno->parentescoResponsavel = $row['parentesco_responsavel'];
		$aluno->nacionalResponsavel = $row['nacional_responsavel'];
		$aluno->naturalResponsavel = $row['natural_responsavel'];
		$aluno->nivEscolarResponsavel = $row['niv_escolar_responsavel'];
		$aluno->religiaoResponsavel = $row['religiao_responsavel'];
		$aluno->profissaoResponsavel = $row['profissao_responsavel'];
		$aluno->enderTrabResponsavel = $row['ender_trab_responsavel'];
		$aluno->telefResponsavel = $row['telef_responsavel'];
		$aluno->emailResponsavel = $row['email_responsavel'];
		$aluno->tituloResponsavel = $row['titulo_responsavel'];
		$aluno->tituloZonaResponsavel = $row['titulo_zona_responsavel'];
		$aluno->tituloSecaoResponsavel = $row['titulo_secao_responsavel'];
		$aluno->descriTranspEscolar = $row['descri_transp_escolar'];
		$aluno->paiUf = $row['pai_uf'];
		$aluno->maeUf = $row['mae_uf'];
		$aluno->responsavelUf = $row['responsavel_uf'];
		$aluno->dataNascimento = $row['data_nascimento'];
		$aluno->ufRegComarca = $row['uf_reg_comarca'];
		$aluno->cpfAluno = $row['cpf_aluno'];
		$aluno->cpfPai = $row['cpf_pai'];
		$aluno->cpfMae = $row['cpf_mae'];
		$aluno->cpfResponsavel = $row['cpf_responsavel'];
		$aluno->codUf = $row['cod_uf'];
		$aluno->codCidade = $row['cod_cidade'];
		$aluno->codPai = $row['cod_pais'];
		$aluno->created = $row['created'];
		$aluno->status = $row['status'];
		$aluno->senha = $row['senha'];
		$aluno->foto = $row['foto'];
		$aluno->colaboraRendaFamiliar = $row['colabora_renda_familiar'];

		return $aluno;
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
	 * @return Aluno 
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