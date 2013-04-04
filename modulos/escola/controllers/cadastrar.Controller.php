<?php
	 
    if($_SESSION["permissao_temp"]<2)
	{
		$_SESSION["msg_index"] = 'Lamentamos mas voc&ecirc; n&atilde;o tem permiss&atilde;o para acessar essa &aacute;rea.';
		redireciona("index.php");  
		exit;
	}     
    if($_POST["acao"])
    {
        $not_validacao=array('id','distrito','cnpj','cod_escola','status_funcionamento','zona','status_censo','telefone','email','latitude',
                                'longitude','cod_estado','cod_cidade','ddd','pred_pesq','cod_seec_a','cod_seec_b','total_salas_aula','total_salas_levantada',
                                'docencia','promocao_acesso_informacao','apoio_educacional','alimentacao','saude_e_higiene','promocao_convivencia',
                                'suporte_pedagogico_docencia','nome_diretor','administracao','manutencao_conservacao_seguranca','configuracao_id'
                             );//AQUI VOU COLOCAR OS CAMPOS QUE NÃO PRECISAM SER VALIDADOS
        #### faço a validação #####
        foreach($_POST as $name=>$value)
        {
            if(empty($value) and !in_array($name,$not_validacao))
            {
                $erro[$name] = "input_erro";
                $msg_erro .= "Preencha o campo : ".$name."<br>";    
            }            
        }

        ## VERIFICANDO SE ESSA ESCOLA JA FOI CADASTRADA ###########

        $escola_veri = DAOFactory::getEscolaDAO()->queryByInep($_POST['inep']);
        if($escola_veri){
            $erro = 1;
            $msg_erro .= "Já existe uma escola cadastrada com esse inep.";
        }

        #######

        ################

        $escola = new Escola();
        
		$escola->nome = $_POST['nome'];
		$escola->endereco = $_POST['endereco'];
		$escola->numero = $_POST['numero'];
		$escola->bairro = $_POST['bairro'];
		$escola->cidade = $_POST['cidade'];
		$escola->uf = $_POST['uf'];
		$escola->cep = $_POST['cep'];
		$escola->inep = $_POST['inep'];
		$escola->cnpj = $_POST['cnpj'];
		$escola->codEscola = $_POST['cod_escola'];
		$escola->depAdministrativo = $_POST['dep_administrativo'];
		$escola->statusFuncionamento = $_POST['status_funcionamento'];
		$escola->zona = $_POST['zona'];
		$escola->statusCenso = $_POST['status_censo'];
		$escola->telefone = $_POST['telefone'];
		$escola->email = $_POST['email'];
		$escola->latitude = $_POST['latitude'];
		$escola->longitude = $_POST['longitude'];
		$escola->codEstado = $_POST['cod_estado'];
		$escola->codCidade = $_POST['cod_cidade'];
		$escola->ddd = $_POST['ddd'];
        $escola->distrito= $_POST['distrito'];
        $escola->nomeDiretor= $_POST['nome_diretor'];

        $configuracao_escola = new ConfiguracaoEscola();

        $configuracao_escola->predPesq = $_POST['pred_pesq'];
        $configuracao_escola->statusCodificacao = $_POST['status_codificacao'];
        $configuracao_escola->codSeecA = $_POST['cod_seec_a'];
        $configuracao_escola->codSeecB = $_POST['cod_seec_b'];
        $configuracao_escola->dependenciaAdministrativa = $_POST['dependencia_administrativa'];
        $configuracao_escola->naturezaOcupacao = $_POST['natureza_ocupacao'];
        $configuracao_escola->naturezaOcupacaoPredrio = $_POST['natureza_ocupacao_predrio'];
        $configuracao_escola->entidadeProprietariaMovel = $_POST['entidade_proprietaria_movel'];
        $configuracao_escola->totalSalasAula = $_POST['total_salas_aula'];
        $configuracao_escola->totalSalasLevantada = $_POST['total_salas_levantada'];
        $configuracao_escola->unidadeExecutora = $_POST['unidade_executora'];
        $configuracao_escola->statusFuncionamento = $_POST['status_funcionamento'];
        $configuracao_escola->situacaoCenso = $_POST['situacao_censo'];
        $configuracao_escola->identificacaoOutrasAtividadesPredio = $_POST['identificacao_outras_atividades_predio'];
        $configuracao_escola->docencia = $_POST['docencia'];
        $configuracao_escola->promocaoAcessoInformacao = $_POST['promocao_acesso_informacao'];
        $configuracao_escola->apoioEducacional = $_POST['apoio_educacional'];
        $configuracao_escola->alimentacao = $_POST['alimentacao'];
        $configuracao_escola->saudeEHigiene = $_POST['saude_e_higiene'];
        $configuracao_escola->promocaoConvivencia = $_POST['promocao_convivencia'];
        $configuracao_escola->suportePedagogicoDocencia = $_POST['suporte_pedagogico_docencia'];
        $configuracao_escola->administracao = $_POST['administracao'];
        $configuracao_escola->manutencaoConservacaoSeguranca = $_POST['manutencao_conservacao_seguranca'];
        $configuracao_escola->assentamento = $_POST['assentamento'];

        if(empty($erro))
        {
            $escola->created=date('Y-m-d H:i:s');
            $escola->status=1;
            $escola_id = DAOFactory::getEscolaDAO()->insert($escola);

            $configuracao_escola->escolaId = $escola_id;
            $configuracao_escola->created=date('Y-m-d H:i:s');
            $configuracao_escola->status=1;
            DAOFactory::getConfiguracaoEscolaDAO()->insert($configuracao_escola);


            $escola=NULL;
            $_SESSION["msg_index"] = "Salvo com sucesso.";
            redireciona("index.php");
        }    
    }
?>