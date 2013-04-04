<?php
/**
 * Classe operadora da tabela 'servidor'. banco msSql.
 *
 * @author:frame arser
 * @date: 2013-03-28 00:37
 */
class ServidorDAO extends Model implements ServidorI{

	/**
	 * Retorna o dominio do objeto pela chave primaria
	 *
	 * @param String $id primary key
	 * @return Servidor 
	 */
	public function load($id){
		$sql = 'SELECT * FROM servidor WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Retorna todos os registros da tabela
     * @param String $campos="*" , String $criterio=""
	 * @return Servidor      
	 */
	public function queryAll($campos="*",$criterio=""){
		$sql = 'SELECT '.$campos.' FROM servidor '.$criterio.'';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
    /**
	 * Retorna a quantidade de registros da tabela
     * @param String $criterio=""
	 * @return qtd
	 */
    public function count($criterio=""){
		$sql = 'SELECT COUNT(id) AS qtd FROM servidor '.$criterio.'';
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
		$sql = 'SELECT * FROM servidor ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Deleta registro da tabela
 	 * @param servidor primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM servidor WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Inseri registro na tabela
 	 *
 	 * @param Servidor servidor
 	 */
	public function insert($servidor){
		$sql = 'INSERT INTO servidor (nome, cpf, inep, email, senha, endereco, numero, bairro, cidade, uf, local, niv_escola, formacao, celular, telefone, cep, created, status, rg, orgao_emissor, estado_emissor, pis_pasep, titulo_eleitor_numero, zona, secao, municipio_titulo, numero_certidao_nascimento, livro, certidao_fl, cartorio, nome_pai, nome_mae, nome_conjuge, certidao_casamento_numero, livro_casamento, disposicao_outro_orgao, nome_outro_orgao, periodo, tipo_recebimento_outro_orgao, foto, professor, qual_escolaridade, certidao_fl_casamento, cartorio_casamento, carteira_trab, carteira_serie, data_nascimento, funcao_principal) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($servidor->nome);
		$sqlQuery->set($servidor->cpf);
		$sqlQuery->set($servidor->inep);
		$sqlQuery->set($servidor->email);
		$sqlQuery->set($servidor->senha);
		$sqlQuery->set($servidor->endereco);
		$sqlQuery->set($servidor->numero);
		$sqlQuery->set($servidor->bairro);
		$sqlQuery->set($servidor->cidade);
		$sqlQuery->set($servidor->uf);
		$sqlQuery->set($servidor->local);
		$sqlQuery->set($servidor->nivEscola);
		$sqlQuery->set($servidor->formacao);
		$sqlQuery->set($servidor->celular);
		$sqlQuery->set($servidor->telefone);
		$sqlQuery->set($servidor->cep);
		$sqlQuery->set($servidor->created);
		$sqlQuery->set($servidor->status);
		$sqlQuery->set($servidor->rg);
		$sqlQuery->set($servidor->orgaoEmissor);
		$sqlQuery->set($servidor->estadoEmissor);
		$sqlQuery->set($servidor->pisPasep);
		$sqlQuery->set($servidor->tituloEleitorNumero);
		$sqlQuery->set($servidor->zona);
		$sqlQuery->set($servidor->secao);
		$sqlQuery->set($servidor->municipioTitulo);
		$sqlQuery->set($servidor->numeroCertidaoNascimento);
		$sqlQuery->set($servidor->livro);
		$sqlQuery->set($servidor->certidaoFl);
		$sqlQuery->set($servidor->cartorio);
		$sqlQuery->set($servidor->nomePai);
		$sqlQuery->set($servidor->nomeMae);
		$sqlQuery->set($servidor->nomeConjuge);
		$sqlQuery->set($servidor->certidaoCasamentoNumero);
		$sqlQuery->set($servidor->livroCasamento);
		$sqlQuery->set($servidor->disposicaoOutroOrgao);
		$sqlQuery->set($servidor->nomeOutroOrgao);
		$sqlQuery->set($servidor->periodo);
		$sqlQuery->set($servidor->tipoRecebimentoOutroOrgao);
		$sqlQuery->set($servidor->foto);
		$sqlQuery->set($servidor->professor);
		$sqlQuery->set($servidor->qualEscolaridade);
		$sqlQuery->set($servidor->certidaoFlCasamento);
		$sqlQuery->set($servidor->cartorioCasamento);
		$sqlQuery->set($servidor->carteiraTrab);
		$sqlQuery->set($servidor->carteiraSerie);
		$sqlQuery->set($servidor->dataNascimento);
		$sqlQuery->set($servidor->funcaoPrincipal);

		$id = $this->executeInsert($sqlQuery);	
		$servidor->id = $id;
		return $id;
	}
	
	/**
 	 * Update no registro da tabela
 	 *
 	 * @param Servidor servidor
 	 */
	public function update($servidor){
		$campos = "";
        
        
		 if(!empty($servidor->nome)) $campos .=' nome = ?,';
		 if(!empty($servidor->cpf)) $campos .=' cpf = ?,';
		 if(!empty($servidor->inep)) $campos .=' inep = ?,';
		 if(!empty($servidor->email)) $campos .=' email = ?,';
		 if(!empty($servidor->senha)) $campos .=' senha = ?,';
		 if(!empty($servidor->endereco)) $campos .=' endereco = ?,';
		 if(!empty($servidor->numero)) $campos .=' numero = ?,';
		 if(!empty($servidor->bairro)) $campos .=' bairro = ?,';
		 if(!empty($servidor->cidade)) $campos .=' cidade = ?,';
		 if(!empty($servidor->uf)) $campos .=' uf = ?,';
		 if(!empty($servidor->local)) $campos .=' local = ?,';
		 if(!empty($servidor->nivEscola)) $campos .=' niv_escola = ?,';
		 if(!empty($servidor->formacao)) $campos .=' formacao = ?,';
		 if(!empty($servidor->celular)) $campos .=' celular = ?,';
		 if(!empty($servidor->telefone)) $campos .=' telefone = ?,';
		 if(!empty($servidor->cep)) $campos .=' cep = ?,';
		 if(!empty($servidor->created)) $campos .=' created = ?,';
		 if(!empty($servidor->status)) $campos .=' status = ?,';
		 if(!empty($servidor->rg)) $campos .=' rg = ?,';
		 if(!empty($servidor->orgaoEmissor)) $campos .=' orgao_emissor = ?,';
		 if(!empty($servidor->estadoEmissor)) $campos .=' estado_emissor = ?,';
		 if(!empty($servidor->pisPasep)) $campos .=' pis_pasep = ?,';
		 if(!empty($servidor->tituloEleitorNumero)) $campos .=' titulo_eleitor_numero = ?,';
		 if(!empty($servidor->zona)) $campos .=' zona = ?,';
		 if(!empty($servidor->secao)) $campos .=' secao = ?,';
		 if(!empty($servidor->municipioTitulo)) $campos .=' municipio_titulo = ?,';
		 if(!empty($servidor->numeroCertidaoNascimento)) $campos .=' numero_certidao_nascimento = ?,';
		 if(!empty($servidor->livro)) $campos .=' livro = ?,';
		 if(!empty($servidor->certidaoFl)) $campos .=' certidao_fl = ?,';
		 if(!empty($servidor->cartorio)) $campos .=' cartorio = ?,';
		 if(!empty($servidor->nomePai)) $campos .=' nome_pai = ?,';
		 if(!empty($servidor->nomeMae)) $campos .=' nome_mae = ?,';
		 if(!empty($servidor->nomeConjuge)) $campos .=' nome_conjuge = ?,';
		 if(!empty($servidor->certidaoCasamentoNumero)) $campos .=' certidao_casamento_numero = ?,';
		 if(!empty($servidor->livroCasamento)) $campos .=' livro_casamento = ?,';
		 if(!empty($servidor->disposicaoOutroOrgao)) $campos .=' disposicao_outro_orgao = ?,';
		 if(!empty($servidor->nomeOutroOrgao)) $campos .=' nome_outro_orgao = ?,';
		 if(!empty($servidor->periodo)) $campos .=' periodo = ?,';
		 if(!empty($servidor->tipoRecebimentoOutroOrgao)) $campos .=' tipo_recebimento_outro_orgao = ?,';
		 if(!empty($servidor->foto)) $campos .=' foto = ?,';
		 if(!empty($servidor->professor)) $campos .=' professor = ?,';
		 if(!empty($servidor->qualEscolaridade)) $campos .=' qual_escolaridade = ?,';
		 if(!empty($servidor->certidaoFlCasamento)) $campos .=' certidao_fl_casamento = ?,';
		 if(!empty($servidor->cartorioCasamento)) $campos .=' cartorio_casamento = ?,';
		 if(!empty($servidor->carteiraTrab)) $campos .=' carteira_trab = ?,';
		 if(!empty($servidor->carteiraSerie)) $campos .=' carteira_serie = ?,';
		 if(!empty($servidor->dataNascimento)) $campos .=' data_nascimento = ?,';
		 if(!empty($servidor->funcaoPrincipal)) $campos .=' funcao_principal = ?,';

        
        $campos = substr($campos,0,-1);
        
        $sql = 'UPDATE servidor SET '.$campos.' WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		 if(!empty($servidor->nome)) 		$sqlQuery->set($servidor->nome);
		 if(!empty($servidor->cpf)) 		$sqlQuery->set($servidor->cpf);
		 if(!empty($servidor->inep)) 		$sqlQuery->set($servidor->inep);
		 if(!empty($servidor->email)) 		$sqlQuery->set($servidor->email);
		 if(!empty($servidor->senha)) 		$sqlQuery->set($servidor->senha);
		 if(!empty($servidor->endereco)) 		$sqlQuery->set($servidor->endereco);
		 if(!empty($servidor->numero)) 		$sqlQuery->set($servidor->numero);
		 if(!empty($servidor->bairro)) 		$sqlQuery->set($servidor->bairro);
		 if(!empty($servidor->cidade)) 		$sqlQuery->set($servidor->cidade);
		 if(!empty($servidor->uf)) 		$sqlQuery->set($servidor->uf);
		 if(!empty($servidor->local)) 		$sqlQuery->set($servidor->local);
		 if(!empty($servidor->nivEscola)) 		$sqlQuery->set($servidor->nivEscola);
		 if(!empty($servidor->formacao)) 		$sqlQuery->set($servidor->formacao);
		 if(!empty($servidor->celular)) 		$sqlQuery->set($servidor->celular);
		 if(!empty($servidor->telefone)) 		$sqlQuery->set($servidor->telefone);
		 if(!empty($servidor->cep)) 		$sqlQuery->set($servidor->cep);
		 if(!empty($servidor->created)) 		$sqlQuery->set($servidor->created);
		 if(!empty($servidor->status)) 		$sqlQuery->set($servidor->status);
		 if(!empty($servidor->rg)) 		$sqlQuery->set($servidor->rg);
		 if(!empty($servidor->orgaoEmissor)) 		$sqlQuery->set($servidor->orgaoEmissor);
		 if(!empty($servidor->estadoEmissor)) 		$sqlQuery->set($servidor->estadoEmissor);
		 if(!empty($servidor->pisPasep)) 		$sqlQuery->set($servidor->pisPasep);
		 if(!empty($servidor->tituloEleitorNumero)) 		$sqlQuery->set($servidor->tituloEleitorNumero);
		 if(!empty($servidor->zona)) 		$sqlQuery->set($servidor->zona);
		 if(!empty($servidor->secao)) 		$sqlQuery->set($servidor->secao);
		 if(!empty($servidor->municipioTitulo)) 		$sqlQuery->set($servidor->municipioTitulo);
		 if(!empty($servidor->numeroCertidaoNascimento)) 		$sqlQuery->set($servidor->numeroCertidaoNascimento);
		 if(!empty($servidor->livro)) 		$sqlQuery->set($servidor->livro);
		 if(!empty($servidor->certidaoFl)) 		$sqlQuery->set($servidor->certidaoFl);
		 if(!empty($servidor->cartorio)) 		$sqlQuery->set($servidor->cartorio);
		 if(!empty($servidor->nomePai)) 		$sqlQuery->set($servidor->nomePai);
		 if(!empty($servidor->nomeMae)) 		$sqlQuery->set($servidor->nomeMae);
		 if(!empty($servidor->nomeConjuge)) 		$sqlQuery->set($servidor->nomeConjuge);
		 if(!empty($servidor->certidaoCasamentoNumero)) 		$sqlQuery->set($servidor->certidaoCasamentoNumero);
		 if(!empty($servidor->livroCasamento)) 		$sqlQuery->set($servidor->livroCasamento);
		 if(!empty($servidor->disposicaoOutroOrgao)) 		$sqlQuery->set($servidor->disposicaoOutroOrgao);
		 if(!empty($servidor->nomeOutroOrgao)) 		$sqlQuery->set($servidor->nomeOutroOrgao);
		 if(!empty($servidor->periodo)) 		$sqlQuery->set($servidor->periodo);
		 if(!empty($servidor->tipoRecebimentoOutroOrgao)) 		$sqlQuery->set($servidor->tipoRecebimentoOutroOrgao);
		 if(!empty($servidor->foto)) 		$sqlQuery->set($servidor->foto);
		 if(!empty($servidor->professor)) 		$sqlQuery->set($servidor->professor);
		 if(!empty($servidor->qualEscolaridade)) 		$sqlQuery->set($servidor->qualEscolaridade);
		 if(!empty($servidor->certidaoFlCasamento)) 		$sqlQuery->set($servidor->certidaoFlCasamento);
		 if(!empty($servidor->cartorioCasamento)) 		$sqlQuery->set($servidor->cartorioCasamento);
		 if(!empty($servidor->carteiraTrab)) 		$sqlQuery->set($servidor->carteiraTrab);
		 if(!empty($servidor->carteiraSerie)) 		$sqlQuery->set($servidor->carteiraSerie);
		 if(!empty($servidor->dataNascimento)) 		$sqlQuery->set($servidor->dataNascimento);
		 if(!empty($servidor->funcaoPrincipal)) 		$sqlQuery->set($servidor->funcaoPrincipal);

		$sqlQuery->setNumber($servidor->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Deleta todos os campos
 	 */
	public function clean(){
		$sql = 'DELETE FROM servidor';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM servidor WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCpf($value){
		$sql = 'SELECT * FROM servidor WHERE cpf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByInep($value){
		$sql = 'SELECT * FROM servidor WHERE inep = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM servidor WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySenha($value){
		$sql = 'SELECT * FROM servidor WHERE senha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEndereco($value){
		$sql = 'SELECT * FROM servidor WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumero($value){
		$sql = 'SELECT * FROM servidor WHERE numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBairro($value){
		$sql = 'SELECT * FROM servidor WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCidade($value){
		$sql = 'SELECT * FROM servidor WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUf($value){
		$sql = 'SELECT * FROM servidor WHERE uf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLocal($value){
		$sql = 'SELECT * FROM servidor WHERE local = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNivEscola($value){
		$sql = 'SELECT * FROM servidor WHERE niv_escola = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFormacao($value){
		$sql = 'SELECT * FROM servidor WHERE formacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCelular($value){
		$sql = 'SELECT * FROM servidor WHERE celular = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefone($value){
		$sql = 'SELECT * FROM servidor WHERE telefone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCep($value){
		$sql = 'SELECT * FROM servidor WHERE cep = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreated($value){
		$sql = 'SELECT * FROM servidor WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM servidor WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRg($value){
		$sql = 'SELECT * FROM servidor WHERE rg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOrgaoEmissor($value){
		$sql = 'SELECT * FROM servidor WHERE orgao_emissor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstadoEmissor($value){
		$sql = 'SELECT * FROM servidor WHERE estado_emissor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPisPasep($value){
		$sql = 'SELECT * FROM servidor WHERE pis_pasep = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTituloEleitorNumero($value){
		$sql = 'SELECT * FROM servidor WHERE titulo_eleitor_numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByZona($value){
		$sql = 'SELECT * FROM servidor WHERE zona = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySecao($value){
		$sql = 'SELECT * FROM servidor WHERE secao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMunicipioTitulo($value){
		$sql = 'SELECT * FROM servidor WHERE municipio_titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumeroCertidaoNascimento($value){
		$sql = 'SELECT * FROM servidor WHERE numero_certidao_nascimento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLivro($value){
		$sql = 'SELECT * FROM servidor WHERE livro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCertidaoFl($value){
		$sql = 'SELECT * FROM servidor WHERE certidao_fl = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCartorio($value){
		$sql = 'SELECT * FROM servidor WHERE cartorio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNomePai($value){
		$sql = 'SELECT * FROM servidor WHERE nome_pai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNomeMae($value){
		$sql = 'SELECT * FROM servidor WHERE nome_mae = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNomeConjuge($value){
		$sql = 'SELECT * FROM servidor WHERE nome_conjuge = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCertidaoCasamentoNumero($value){
		$sql = 'SELECT * FROM servidor WHERE certidao_casamento_numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLivroCasamento($value){
		$sql = 'SELECT * FROM servidor WHERE livro_casamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDisposicaoOutroOrgao($value){
		$sql = 'SELECT * FROM servidor WHERE disposicao_outro_orgao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNomeOutroOrgao($value){
		$sql = 'SELECT * FROM servidor WHERE nome_outro_orgao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPeriodo($value){
		$sql = 'SELECT * FROM servidor WHERE periodo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipoRecebimentoOutroOrgao($value){
		$sql = 'SELECT * FROM servidor WHERE tipo_recebimento_outro_orgao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFoto($value){
		$sql = 'SELECT * FROM servidor WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProfessor($value){
		$sql = 'SELECT * FROM servidor WHERE professor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByQualEscolaridade($value){
		$sql = 'SELECT * FROM servidor WHERE qual_escolaridade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCertidaoFlCasamento($value){
		$sql = 'SELECT * FROM servidor WHERE certidao_fl_casamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCartorioCasamento($value){
		$sql = 'SELECT * FROM servidor WHERE cartorio_casamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCarteiraTrab($value){
		$sql = 'SELECT * FROM servidor WHERE carteira_trab = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCarteiraSerie($value){
		$sql = 'SELECT * FROM servidor WHERE carteira_serie = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataNascimento($value){
		$sql = 'SELECT * FROM servidor WHERE data_nascimento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFuncaoPrincipal($value){
		$sql = 'SELECT * FROM servidor WHERE funcao_principal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNome($value){
		$sql = 'DELETE FROM servidor WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCpf($value){
		$sql = 'DELETE FROM servidor WHERE cpf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByInep($value){
		$sql = 'DELETE FROM servidor WHERE inep = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM servidor WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySenha($value){
		$sql = 'DELETE FROM servidor WHERE senha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEndereco($value){
		$sql = 'DELETE FROM servidor WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumero($value){
		$sql = 'DELETE FROM servidor WHERE numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBairro($value){
		$sql = 'DELETE FROM servidor WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCidade($value){
		$sql = 'DELETE FROM servidor WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUf($value){
		$sql = 'DELETE FROM servidor WHERE uf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLocal($value){
		$sql = 'DELETE FROM servidor WHERE local = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNivEscola($value){
		$sql = 'DELETE FROM servidor WHERE niv_escola = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFormacao($value){
		$sql = 'DELETE FROM servidor WHERE formacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCelular($value){
		$sql = 'DELETE FROM servidor WHERE celular = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefone($value){
		$sql = 'DELETE FROM servidor WHERE telefone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCep($value){
		$sql = 'DELETE FROM servidor WHERE cep = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreated($value){
		$sql = 'DELETE FROM servidor WHERE created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM servidor WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRg($value){
		$sql = 'DELETE FROM servidor WHERE rg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOrgaoEmissor($value){
		$sql = 'DELETE FROM servidor WHERE orgao_emissor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstadoEmissor($value){
		$sql = 'DELETE FROM servidor WHERE estado_emissor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPisPasep($value){
		$sql = 'DELETE FROM servidor WHERE pis_pasep = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTituloEleitorNumero($value){
		$sql = 'DELETE FROM servidor WHERE titulo_eleitor_numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByZona($value){
		$sql = 'DELETE FROM servidor WHERE zona = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySecao($value){
		$sql = 'DELETE FROM servidor WHERE secao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMunicipioTitulo($value){
		$sql = 'DELETE FROM servidor WHERE municipio_titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumeroCertidaoNascimento($value){
		$sql = 'DELETE FROM servidor WHERE numero_certidao_nascimento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLivro($value){
		$sql = 'DELETE FROM servidor WHERE livro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCertidaoFl($value){
		$sql = 'DELETE FROM servidor WHERE certidao_fl = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCartorio($value){
		$sql = 'DELETE FROM servidor WHERE cartorio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNomePai($value){
		$sql = 'DELETE FROM servidor WHERE nome_pai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNomeMae($value){
		$sql = 'DELETE FROM servidor WHERE nome_mae = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNomeConjuge($value){
		$sql = 'DELETE FROM servidor WHERE nome_conjuge = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCertidaoCasamentoNumero($value){
		$sql = 'DELETE FROM servidor WHERE certidao_casamento_numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLivroCasamento($value){
		$sql = 'DELETE FROM servidor WHERE livro_casamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDisposicaoOutroOrgao($value){
		$sql = 'DELETE FROM servidor WHERE disposicao_outro_orgao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNomeOutroOrgao($value){
		$sql = 'DELETE FROM servidor WHERE nome_outro_orgao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPeriodo($value){
		$sql = 'DELETE FROM servidor WHERE periodo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipoRecebimentoOutroOrgao($value){
		$sql = 'DELETE FROM servidor WHERE tipo_recebimento_outro_orgao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFoto($value){
		$sql = 'DELETE FROM servidor WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProfessor($value){
		$sql = 'DELETE FROM servidor WHERE professor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByQualEscolaridade($value){
		$sql = 'DELETE FROM servidor WHERE qual_escolaridade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCertidaoFlCasamento($value){
		$sql = 'DELETE FROM servidor WHERE certidao_fl_casamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCartorioCasamento($value){
		$sql = 'DELETE FROM servidor WHERE cartorio_casamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCarteiraTrab($value){
		$sql = 'DELETE FROM servidor WHERE carteira_trab = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCarteiraSerie($value){
		$sql = 'DELETE FROM servidor WHERE carteira_serie = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataNascimento($value){
		$sql = 'DELETE FROM servidor WHERE data_nascimento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFuncaoPrincipal($value){
		$sql = 'DELETE FROM servidor WHERE funcao_principal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Ler um registro
	 *
	 * @return Servidor 
	 */
	protected function readRow($row){
		$servidor = new Servidor();
		
		$servidor->id = $row['id'];
		$servidor->nome = $row['nome'];
		$servidor->cpf = $row['cpf'];
		$servidor->inep = $row['inep'];
		$servidor->email = $row['email'];
		$servidor->senha = $row['senha'];
		$servidor->endereco = $row['endereco'];
		$servidor->numero = $row['numero'];
		$servidor->bairro = $row['bairro'];
		$servidor->cidade = $row['cidade'];
		$servidor->uf = $row['uf'];
		$servidor->local = $row['local'];
		$servidor->nivEscola = $row['niv_escola'];
		$servidor->formacao = $row['formacao'];
		$servidor->celular = $row['celular'];
		$servidor->telefone = $row['telefone'];
		$servidor->cep = $row['cep'];
		$servidor->created = $row['created'];
		$servidor->status = $row['status'];
		$servidor->rg = $row['rg'];
		$servidor->orgaoEmissor = $row['orgao_emissor'];
		$servidor->estadoEmissor = $row['estado_emissor'];
		$servidor->pisPasep = $row['pis_pasep'];
		$servidor->tituloEleitorNumero = $row['titulo_eleitor_numero'];
		$servidor->zona = $row['zona'];
		$servidor->secao = $row['secao'];
		$servidor->municipioTitulo = $row['municipio_titulo'];
		$servidor->numeroCertidaoNascimento = $row['numero_certidao_nascimento'];
		$servidor->livro = $row['livro'];
		$servidor->certidaoFl = $row['certidao_fl'];
		$servidor->cartorio = $row['cartorio'];
		$servidor->nomePai = $row['nome_pai'];
		$servidor->nomeMae = $row['nome_mae'];
		$servidor->nomeConjuge = $row['nome_conjuge'];
		$servidor->certidaoCasamentoNumero = $row['certidao_casamento_numero'];
		$servidor->livroCasamento = $row['livro_casamento'];
		$servidor->disposicaoOutroOrgao = $row['disposicao_outro_orgao'];
		$servidor->nomeOutroOrgao = $row['nome_outro_orgao'];
		$servidor->periodo = $row['periodo'];
		$servidor->tipoRecebimentoOutroOrgao = $row['tipo_recebimento_outro_orgao'];
		$servidor->foto = $row['foto'];
		$servidor->professor = $row['professor'];
		$servidor->qualEscolaridade = $row['qual_escolaridade'];
		$servidor->certidaoFlCasamento = $row['certidao_fl_casamento'];
		$servidor->cartorioCasamento = $row['cartorio_casamento'];
		$servidor->carteiraTrab = $row['carteira_trab'];
		$servidor->carteiraSerie = $row['carteira_serie'];
		$servidor->dataNascimento = $row['data_nascimento'];
		$servidor->funcaoPrincipal = $row['funcao_principal'];

		return $servidor;
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
	 * @return Servidor 
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