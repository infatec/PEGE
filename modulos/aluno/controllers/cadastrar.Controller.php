<?php
	 
    if($_SESSION["permissao_temp"]<2)
	{
		$_SESSION["msg_index"] = 'Lamentamos mas voc&ecirc; n&atilde;o tem permiss&atilde;o para acessar essa &aacute;rea.';
		redireciona("index.php");  
		exit;
	}     
    if($_POST["acao"])
    {
        $not_validacao=array('id','cep','inep','foto','nis','rg_data_expedicao','celular','local','complemento','email','peso','altura','raca','tipo_defic','tipo_transp_escolar','tipo_uso_internet','sexo','reg_nascimento','reg_livro_num','reg_folha_num','reg_comarca','rg','rg_orgao','titulo','titulo_zona','titulo_secao','reservista','reservista_serie','reservista_numero','reservista_categ_num','reservista_csm','cart_prof','grupo_sangue','grupo_sangue_rh','grupo_sangue_alergia','grupo_sangue_diabetico','outra_doenca','familia_composta','estado_civil','usa_oculos','destro','convenio','nome_pai','pai_vivo','pai_nacionalidade','pai_naturalidade','pai_niv_escolar','pai_religiao','pai_profissao','pai_ender_trab','pai_telefone','pai_email','pai_titulo','pai_titulo_zona','pai_titulo_secao','nome_mae','mae_viva','mae_nacionalidade','mae_naturalidade','mae_niv_escolar','mae_religiao','mae_profissao','mae_ender_trab','mae_telefone','mae_email','mae_titulo','mae_titulo_zona','mae_titulo_secao','mae_nis','pai_nis','nome_responsavel','parentesco_responsavel','nacional_responsavel','natural_responsavel','niv_escolar_responsavel','religiao_responsavel','profissao_responsavel','ender_trab_responsavel','telef_responsavel','email_responsavel','titulo_responsavel','titulo_zona_responsavel','titulo_secao_responsavel','descri_transp_escolar','pai_uf','mae_uf','responsavel_uf','uf_reg_comarca','cpf_aluno','cpf_pai','cpf_mae','cpf_responsavel');//AQUI VOU COLOCAR OS CAMPOS QUE NÃO PRECISAM SER VALIDADOS
        #### faço a validação #####
        foreach($_POST as $name=>$value)
        {
            if(empty($value) and !in_array($name,$not_validacao))
            {
                $erro[$name] = "input_erro";
                $msg_erro .= "Preencha o campo : ".$name."<br>";    
            }            
        } 
        ################

        $verifica_exis = DAOFactory::getAlunoDAO()->queryAll("*","where nome = '".$_POST["nome"]."' and data_nascimento = '".geradatamy($_POST['data_nascimento'])."'");
        if($verifica_exis){
            $erro["existe"] = true;
            $msg_erro .= "Esse aluno já está cadastrado.";
        }

        $aluno = new Aluno();
        
		$aluno->nome = $_POST['nome'];
		$aluno->endereco = $_POST['endereco'];
		$aluno->numero = $_POST['numero'];
		$aluno->bairro = $_POST['bairro'];
		$aluno->cidade = $_POST['cidade'];
		$aluno->nacionalidade = $_POST['nacionalidade'];
		$aluno->cep = $_POST['cep'];
		$aluno->uf = $_POST['uf'];
		$aluno->local = $_POST['local'];
		$aluno->complemento = $_POST['complemento'];
		$aluno->inep = $_POST['inep'];
		$aluno->ni = $_POST['nis'];
		$aluno->telefone = $_POST['telefone'];
		$aluno->celular = $_POST['celular'];
		$aluno->email = $_POST['email'];
		$aluno->peso = $_POST['peso'];
		$aluno->altura = $_POST['altura'];
		$aluno->raca = $_POST['raca'];
		$aluno->tipoDefic = $_POST['tipo_defic'];
		$aluno->tipoTranspEscolar = $_POST['tipo_transp_escolar'];
		$aluno->tipoUsoInternet = $_POST['tipo_uso_internet'];
		$aluno->sexo = $_POST['sexo'];
		$aluno->regNascimento = $_POST['reg_nascimento'];
		$aluno->regLivroNum = $_POST['reg_livro_num'];
		$aluno->regFolhaNum = $_POST['reg_folha_num'];
		$aluno->regComarca = $_POST['reg_comarca'];
		$aluno->rg = $_POST['rg'];
		$aluno->rgOrgao = $_POST['rg_orgao'];
		$aluno->rgDataExpedicao = $_POST['rg_data_expedicao'];
		$aluno->titulo = $_POST['titulo'];
		$aluno->tituloZona = $_POST['titulo_zona'];
		$aluno->tituloSecao = $_POST['titulo_secao'];
		$aluno->reservista = $_POST['reservista'];
		$aluno->reservistaSerie = $_POST['reservista_serie'];
		$aluno->reservistaNumero = $_POST['reservista_numero'];
		$aluno->reservistaCategNum = $_POST['reservista_categ_num'];
		$aluno->reservistaCsm = $_POST['reservista_csm'];
		$aluno->cartProf = $_POST['cart_prof'];
		$aluno->grupoSangue = $_POST['grupo_sangue'];
		$aluno->grupoSangueRh = $_POST['grupo_sangue_rh'];
		$aluno->grupoSangueAlergia = $_POST['grupo_sangue_alergia'];
		$aluno->grupoSangueDiabetico = $_POST['grupo_sangue_diabetico'];
		$aluno->outraDoenca = $_POST['outra_doenca'];
		$aluno->familiaComposta = $_POST['familia_composta'];
		$aluno->estadoCivil = $_POST['estado_civil'];
		$aluno->usaOculo = $_POST['usa_oculos'];
		$aluno->destro = $_POST['destro'];
		$aluno->convenio = $_POST['convenio'];
		$aluno->nomePai = $_POST['nome_pai'];
		$aluno->paiVivo = $_POST['pai_vivo'];
		$aluno->paiNacionalidade = $_POST['pai_nacionalidade'];
		$aluno->paiNaturalidade = $_POST['pai_naturalidade'];
		$aluno->paiNivEscolar = $_POST['pai_niv_escolar'];
		$aluno->paiReligiao = $_POST['pai_religiao'];
		$aluno->paiProfissao = $_POST['pai_profissao'];
		$aluno->paiEnderTrab = $_POST['pai_ender_trab'];
		$aluno->paiTelefone = $_POST['pai_telefone'];
		$aluno->paiEmail = $_POST['pai_email'];
		$aluno->paiTitulo = $_POST['pai_titulo'];
		$aluno->paiTituloZona = $_POST['pai_titulo_zona'];
		$aluno->paiTituloSecao = $_POST['pai_titulo_secao'];
		$aluno->nomeMae = $_POST['nome_mae'];
		$aluno->maeViva = $_POST['mae_viva'];
		$aluno->maeNacionalidade = $_POST['mae_nacionalidade'];
		$aluno->maeNaturalidade = $_POST['mae_naturalidade'];
		$aluno->maeNivEscolar = $_POST['mae_niv_escolar'];
		$aluno->maeReligiao = $_POST['mae_religiao'];
		$aluno->maeProfissao = $_POST['mae_profissao'];
		$aluno->maeEnderTrab = $_POST['mae_ender_trab'];
		$aluno->maeTelefone = $_POST['mae_telefone'];
		$aluno->maeEmail = $_POST['mae_email'];
		$aluno->maeTitulo = $_POST['mae_titulo'];
		$aluno->maeTituloZona = $_POST['mae_titulo_zona'];
		$aluno->maeTituloSecao = $_POST['mae_titulo_secao'];
		$aluno->maeNi = $_POST['mae_nis'];
		$aluno->paiNi = $_POST['pai_nis'];
		$aluno->nomeResponsavel = $_POST['nome_responsavel'];
		$aluno->parentescoResponsavel = $_POST['parentesco_responsavel'];
		$aluno->nacionalResponsavel = $_POST['nacional_responsavel'];
		$aluno->naturalResponsavel = $_POST['natural_responsavel'];
		$aluno->nivEscolarResponsavel = $_POST['niv_escolar_responsavel'];
		$aluno->religiaoResponsavel = $_POST['religiao_responsavel'];
		$aluno->profissaoResponsavel = $_POST['profissao_responsavel'];
		$aluno->enderTrabResponsavel = $_POST['ender_trab_responsavel'];
		$aluno->telefResponsavel = $_POST['telef_responsavel'];
		$aluno->emailResponsavel = $_POST['email_responsavel'];
		$aluno->tituloResponsavel = $_POST['titulo_responsavel'];
		$aluno->tituloZonaResponsavel = $_POST['titulo_zona_responsavel'];
		$aluno->tituloSecaoResponsavel = $_POST['titulo_secao_responsavel'];
		$aluno->descriTranspEscolar = $_POST['descri_transp_escolar'];
		$aluno->paiUf = $_POST['pai_uf'];
		$aluno->maeUf = $_POST['mae_uf'];
		$aluno->responsavelUf = $_POST['responsavel_uf'];
		$aluno->dataNascimento = geradatamy($_POST['data_nascimento']);
		$aluno->ufRegComarca = $_POST['uf_reg_comarca'];
		$aluno->cpfAluno = $_POST['cpf_aluno'];
		$aluno->cpfPai = $_POST['cpf_pai'];
		$aluno->cpfMae = $_POST['cpf_mae'];
		$aluno->cpfResponsavel = $_POST['cpf_responsavel'];
        $aluno->colaboraRendaFamiliar = $_POST['colabora_renda_familiar'];

        if(empty($erro))
        {
            $aluno->senha= geraSenha($_POST['senha']);
            if(!empty($_POST['foto']))
            {
                $nome_foto = geraFotoBase64($_POST['foto'],"alunos");
                $aluno->foto = $nome_foto;
            }
            $aluno->created=date('Y-m-d H:i:s');
            $aluno->status=1;
            DAOFactory::getAlunoDAO()->insert($aluno);
            $aluno=NULL;
            $_SESSION["msg_index"] = "Salvo com sucesso.";
            redireciona("index.php");
        }    
    }
?>