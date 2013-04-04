<?php
	 
    if($_SESSION["permissao_temp"]<2)
	{
		$_SESSION["msg_index"] = 'Lamentamos mas voc&ecirc; n&atilde;o tem permiss&atilde;o para acessar essa &aacute;rea.';
		redireciona("index.php");  
		exit;
	}     
    if($_POST["acao"])
    {
        $not_validacao=array('id',);//AQUI VOU COLOCAR OS CAMPOS QUE N�O PRECISAM SER VALIDADOS
        #### fa�o a valida��o #####
        foreach($_POST as $name=>$value)
        {
            if(empty($value) and !in_array($name,$not_validacao))
            {
                $erro[$name] = "input_erro";
                $msg_erro .= "Preencha o campo : ".$name."<br>";    
            }            
        } 
        ################
        $configuracao_escola = new ConfiguracaoEscola();
        
		$configuracao_escola->escolaId = $_POST['escola_id'];
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

        if(empty($erro))
        {
            $configuracao_escola->created=date('Y-m-d H:i:s');
            $configuracao_escola->status=1;
            DAOFactory::getConfiguracaoEscolaDAO()->insert($configuracao_escola);
            $configuracao_escola=NULL;
            $_SESSION["msg_index"] = "Salvo com sucesso.";
            redireciona("index.php");
        }    
    }
?>