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
        $not_validacao=array('email','numero','local','telefone','cep','senha','rg','orgao_emissor','estado_emissor','pis_pasep','titulo_eleitor_numero','zona','secao',
            'municipio_titulo','numero_certidao_nascimento','livro','certidao_fl','cartorio','nome_mae','nome_pai','nome_conjuge','certidao_casamento_numero','livro_casamento',
            'cartorio_casamento','qual_escolaridade','formacao','nome_outro_orgao','tipo_recebimento_outro_orgao','foto','foto_salva','periodo','senha',
            'carteira_trab','carteira_serie');//AQUI VOU COLOCAR OS CAMPOS QUE NÃO PRECISAM SER VALIDADOS
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
        $servidor = new Servidor();
        $servidor->id=$id;
        
		$servidor->nome = $_POST['nome'];
		$servidor->cpf = $_POST['cpf'];
		$servidor->inep = $_POST['inep'];
		$servidor->email = $_POST['email'];
		$servidor->endereco = $_POST['endereco'];
		$servidor->numero = $_POST['numero'];
		$servidor->bairro = $_POST['bairro'];
		$servidor->cidade = $_POST['cidade'];
		$servidor->uf = $_POST['uf'];
		$servidor->local = $_POST['local'];
		$servidor->nivEscola = $_POST['niv_escola'];
		$servidor->formacao = $_POST['formacao'];
		$servidor->celular = $_POST['celular'];
		$servidor->telefone = $_POST['telefone'];
		$servidor->cep = $_POST['cep'];
        $servidor->rg =$_POST['rg'];
        $servidor->orgaoEmissor =$_POST['orgao_emissor'];
        $servidor->estadoEmissor =$_POST['estado_emissor'];
        $servidor->pisPasep =$_POST['pis_pasep'];
        $servidor->tituloEleitorNumero =$_POST['titulo_eleitor_numero'];
        $servidor->zona =$_POST['zona'];
        $servidor->secao =$_POST['secao'];
        $servidor->municipioTitulo =$_POST['municipio_titulo'];
        $servidor->numeroCertidaoNascimento =$_POST['numero_certidao_nascimento'];
        $servidor->livro =$_POST['livro'];
        $servidor->certidaoFl =$_POST['certidao_fl'];
        $servidor->cartorio =$_POST['cartorio'];
        $servidor->nomePai =$_POST['nome_pai'];
        $servidor->nomeMae =$_POST['nome_mae'];
        $servidor->nomeConjuge =$_POST['nome_conjuge'];
        $servidor->certidaoCasamentoNumero =$_POST['certidao_casamento_numero'];
        $servidor->livroCasamento = $_POST['livro_casamento'];
        $servidor->disposicaoOutroOrgao = $_POST['disposicao_outro_orgao'];
        $servidor->nomeOutroOrgao = $_POST['nome_outro_orgao'];
        $servidor->periodo =$_POST['periodo'];
        $servidor->tipoRecebimentoOutroOrgao =$_POST['tipo_recebimento_outro_orgao'];
        $servidor->professor = $_POST['professor'] ? "S" : "N" ;
        $servidor->dependente =$_POST['qtd_dependente'] ? "S" : "N";
        $servidor->qtd_dependente =$_POST['qtd_dependente'];
        $servidor->qualEscolaridade =$_POST['qual_escolaridade'];
        $servidor->certidaoFlCasamento = $_POST['certidao_fl_casamento'];
        $servidor->cartorioCasamento = $_POST['cartorio_casamento'];
        $servidor->carteiraTrab = $_POST['carteira_trab'];
        $servidor->carteiraSerie = $_POST['carteira_serie'];
        $servidor->funcaoPrincipal = $_POST['funcao_principal'];

        if(is_array($_POST["escola"])){

            $escolas_selecionadas = array();
            foreach($_POST["escola"] as $escola_sel){
                $escola_obj = DAOFactory::getEscolaDAO()->load($escola_sel);
                $escolas_selecionadas[]= array(
                    "escola_id"=>$escola_sel,
                    "inep"=>$escola_obj->inep,
                    "nome_escola"=>$escola_obj->nome
                );
                $cargos_mec_id[$escola_sel] = $_POST["cargos_mec_id"][$escola_sel];
                $funcoes_mec_id[$escola_sel] =  $_POST["funcoes_mec_id"][$escola_sel];
                $data_admissao[$escola_sel] = geradatamy($_POST["data_admissao"][$escola_sel]);
                $num_decreto[$escola_sel] = $_POST["num_decreto"][$escola_sel];
                $data_entrada_exercicio[$escola_sel] = geradatamy($_POST["data_entrada_exercicio"][$escola_sel]);
                $matricula[$escola_sel] = $_POST["matricula"][$escola_sel];
                $vinculo[$escola_sel] = $_POST["vinculo"][$escola_sel];

            }

        }
 
               
        if(empty($erro))
        {
            if($_POST["senha"]) $servidor->senha = geraSenha($_POST["senha"]);

            if(!empty($_POST['foto']))
            {
                if(file_exists("../../fotos/servidores/".$_POST["foto_salva"]) and !empty($_POST["foto_salva"])){
                    unlink("../../fotos/servidores/".$_POST["foto_salva"]);
                }

                $nome_foto = geraFotoBase64($_POST['foto'],"servidores");
                $servidor->foto = $nome_foto;
            }

            $servidor_id = $id;
            DAOFactory::getServidorDAO()->update($servidor);

            DAOFactory::getServidorEscolaDAO()->deleteByServidorId($servidor_id);
            DAOFactory::getServidorCargoEscolaDAO()->deleteByServidorId($servidor_id);
            DAOFactory::getServidorFuncaoEscolaDAO()->deleteByServidorId($servidor_id);

            if(is_array($_POST["escola"])){

                foreach($_POST["escola"] as $escola_sel){

                    $escola_servidor = new ServidorEscola();
                    $escola_servidor->escolaId = $escola_sel;
                    $escola_servidor->servidorId = $servidor_id;
                    DAOFactory::getServidorEscolaDAO()->insert($escola_servidor);

                    $servidor_cargo = new ServidorCargoEscola();
                    $servidor_cargo->escolaId = $escola_sel;
                    $servidor_cargo->servidorId = $servidor_id;
                    $servidor_cargo->cargosMecId = $_POST["cargos_mec_id"][$escola_sel];
                    $servidor_cargo->dataAdmissao = geradatamy($_POST["data_admissao"][$escola_sel]);
                    $servidor_cargo->numDecreto = $_POST["num_decreto"][$escola_sel];
                    $servidor_cargo->dataEntradaExercicio = geradatamy($_POST["data_entrada_exercicio"][$escola_sel]);
                    $servidor_cargo->matricula = $_POST["matricula"][$escola_sel];
                    $servidor_cargo->vinculo = $_POST["vinculo"][$escola_sel];
                    DAOFactory::getServidorCargoEscolaDAO()->insert($servidor_cargo);

                }

                if(is_array($_POST["funcoes_mec_id"])){

                    foreach($_POST["funcoes_mec_id"] as $escola_id=>$funcao_mec_id){
                        if(!$funcao_mec_id) continue;
                        $servidor_funcao = new ServidorFuncaoEscola();
                        $servidor_funcao->escolaId=$escola_id;
                        $servidor_funcao->servidorId = $servidor_id;
                        $servidor_funcao->funcoesMecId = $funcao_mec_id;
                        DAOFactory::getServidorFuncaoEscolaDAO()->insert($servidor_funcao);
                    }
                }

            }

            $servidor=NULL;
            $_SESSION["msg_index"] = "Alteração realizada com sucesso.";
            
            redireciona("index.php");
        }    
    }
    else if (!empty($id))
	{
	   $servidor = DAOFactory::getServidorDAO()->load($id);

        $escolas_servidor = DAOFactory::getServidorEscolaDAO()->queryByServidorId($id);

        $escolas_selecionadas = array();
        foreach($escolas_servidor as $escola_sel){
            $escola_obj = DAOFactory::getEscolaDAO()->load($escola_sel->escolaId);
            $escolas_selecionadas[]= array(
                "escola_id"=>$escola_sel->escolaId,
                "inep"=>$escola_obj->inep,
                "nome_escola"=>$escola_obj->nome
            );
        }
        $cargos_servidor = DAOFactory::getServidorCargoEscolaDAO()->queryByServidorId($id);
        $cargos_mec_id=array();
        foreach($cargos_servidor as $cargo_servidor){
            $cargos_mec_id[$cargo_servidor->escolaId] =  $cargo_servidor->cargosMecId;
            $data_admissao[$cargo_servidor->escolaId] = $cargo_servidor->dataAdmissao;
            $num_decreto[$cargo_servidor->escolaId] = $cargo_servidor->numDecreto;
            $data_entrada_exercicio[$cargo_servidor->escolaId] = $cargo_servidor->dataEntradaExercicio;
            $matricula[$cargo_servidor->escolaId] = $cargo_servidor->matricula;
            $vinculo[$cargo_servidor->escolaId] = $cargo_servidor->vinculo;
        }

        $funcoes_servidor = DAOFactory::getServidorFuncaoEscolaDAO()->queryByServidorId($id);
        $funcoes_mec_id=array();
        foreach($funcoes_servidor as $funcao_servidor){
            $funcoes_mec_id[$funcao_servidor->escolaId] =  $funcao_servidor->funcoesMecId;
        }

	}
	else
	{
		$_SESSION["msg_index"] = 'Esse registro n&atilde;o existe';
		redireciona("index.php");
	}
        
?>