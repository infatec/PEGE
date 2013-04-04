<?php
	 
    if($_SESSION["permissao_temp"]<2)
	{
		$_SESSION["msg_index"] = 'Lamentamos mas voc&ecirc; n&atilde;o tem permiss&atilde;o para acessar essa &aacute;rea.';
		redireciona("index.php");  
		exit;
	} 
   
    $id=(int)$_GET["id"];   
    if($_POST["acao"])
    {
        $not_validacao=array('id','distrito','cnpj','cod_escola','status_funcionamento','zona','status_censo','telefone','email','latitude',
            'longitude','cod_estado','cod_cidade','ddd','pred_pesq','cod_seec_a','cod_seec_b','total_salas_aula','total_salas_levantada',
            'docencia','promocao_acesso_informacao','apoio_educacional','alimentacao','saude_e_higiene','promocao_convivencia',
            'suporte_pedagogico_docencia','administracao','nome_diretor','manutencao_conservacao_seguranca','configuracao_id'
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
        ##################

        $id=(int)$_POST["id"];
        $escola = new Escola();
        $escola->id=$id;
        
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

        $configuracao_id=(int)$_POST["configuracao_id"];


        $configuracao_escola = new ConfiguracaoEscola();
        $configuracao_escola->id = $configuracao_id;
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
        $configuracao_escola->docencia = $_POST['docencia']? "S" : "N" ;
        $configuracao_escola->promocaoAcessoInformacao = $_POST['promocao_acesso_informacao']? "S" : "N" ;
        $configuracao_escola->apoioEducacional = $_POST['apoio_educacional']? "S" : "N" ;
        $configuracao_escola->alimentacao = $_POST['alimentacao']? "S" : "N" ;
        $configuracao_escola->saudeEHigiene = $_POST['saude_e_higiene']? "S" : "N" ;
        $configuracao_escola->promocaoConvivencia = $_POST['promocao_convivencia']? "S" : "N" ;
        $configuracao_escola->suportePedagogicoDocencia = $_POST['suporte_pedagogico_docencia']? "S" : "N" ;
        $configuracao_escola->administracao = $_POST['administracao']? "S" : "N" ;
        $configuracao_escola->manutencaoConservacaoSeguranca = $_POST['manutencao_conservacao_seguranca']? "S" : "N" ;
        $configuracao_escola->assentamento = $_POST['assentamento']? "S" : "N" ;
 
               
        if(empty($erro))
        {
            DAOFactory::getEscolaDAO()->update($escola);
            DAOFactory::getConfiguracaoEscolaDAO()->update($configuracao_escola);
            $escola=NULL;
            $_SESSION["msg_index"] = "Alteração realizada com sucesso.";
            
            redireciona("index.php");
        }    
    }
    else if (!empty($id))
	{
	   $escola = DAOFactory::getEscolaDAO()->load($id);
       $configuracao_escola_busca = DAOFactory::getConfiguracaoEscolaDAO()->queryByEscolaId($escola->id);
       $configuracao_escola = $configuracao_escola_busca[0];
        $configuracao_id= $configuracao_escola->id;
    }
	else
	{
		$_SESSION["msg_index"] = 'Esse registro n&atilde;o existe';
		redireciona("index.php");
	}
        
?>