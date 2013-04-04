<?php

include("includes_ajax.php");

import("Aluno");

parse_str($_POST["dados_form"],$dados_aluno);

//print_r($dados_aluno);

if($dados_aluno["acao"])
{
    $not_validacao=array('id','cep','senha','inep','foto','nis','rg_data_expedicao','celular','local','complemento','email','peso','altura','raca','tipo_defic','tipo_transp_escolar','tipo_uso_internet','sexo','reg_nascimento','reg_livro_num','reg_folha_num','reg_comarca','rg','rg_orgao','titulo','titulo_zona','titulo_secao','reservista','reservista_serie','reservista_numero','reservista_categ_num','reservista_csm','cart_prof','grupo_sangue','grupo_sangue_rh','grupo_sangue_alergia','grupo_sangue_diabetico','outra_doenca','familia_composta','estado_civil','usa_oculos','destro','convenio','nome_pai','pai_vivo','pai_nacionalidade','pai_naturalidade','pai_niv_escolar','pai_religiao','pai_profissao','pai_ender_trab','pai_telefone','pai_email','pai_titulo','pai_titulo_zona','pai_titulo_secao','nome_mae','mae_viva','mae_nacionalidade','mae_naturalidade','mae_niv_escolar','mae_religiao','mae_profissao','mae_ender_trab','mae_telefone','mae_email','mae_titulo','mae_titulo_zona','mae_titulo_secao','mae_nis','pai_nis','nome_responsavel','parentesco_responsavel','nacional_responsavel','natural_responsavel','niv_escolar_responsavel','religiao_responsavel','profissao_responsavel','ender_trab_responsavel','telef_responsavel','email_responsavel','titulo_responsavel','titulo_zona_responsavel','titulo_secao_responsavel','descri_transp_escolar','pai_uf','mae_uf','responsavel_uf','uf_reg_comarca','cpf_aluno','cpf_pai','cpf_mae','cpf_responsavel');//AQUI VOU COLOCAR OS CAMPOS QUE NÃO PRECISAM SER VALIDADOS
    #### faço a validação #####
    foreach($dados_aluno as $name=>$value)
    {
        if(empty($value) and !in_array($name,$not_validacao))
        {
            $erro[$name] = "input_erro";
            $msg_erro .= "Preencha o campo : ".$name."<br>";
        }
    }
    ################
    if(!$dados_aluno["id"]){
        $verifica_exis = DAOFactory::getAlunoDAO()->queryAll("*","where nome = '".$dados_aluno["nome"]."' and data_nascimento = '".geradatamy($dados_aluno['data_nascimento'])."'");
        if($verifica_exis){
            $erro["existe"] = true;
            $msg_erro .= "Esse aluno já está cadastrado.";
        }
    }

    $aluno = new Aluno();
    if($dados_aluno["id"]) $aluno->id=$dados_aluno["id"];
    $aluno->nome = $dados_aluno['nome'];
    $aluno->endereco = $dados_aluno['endereco'];
    $aluno->numero = $dados_aluno['numero'];
    $aluno->bairro = $dados_aluno['bairro'];
    $aluno->cidade = $dados_aluno['cidade'];
    $aluno->nacionalidade = $dados_aluno['nacionalidade'];
    $aluno->cep = $dados_aluno['cep'];
    $aluno->uf = $dados_aluno['uf'];
    $aluno->local = $dados_aluno['local'];
    $aluno->complemento = $dados_aluno['complemento'];
    $aluno->inep = $dados_aluno['inep'];
    $aluno->ni = $dados_aluno['nis'];
    $aluno->telefone = $dados_aluno['telefone'];
    $aluno->celular = $dados_aluno['celular'];
    $aluno->email = $dados_aluno['email'];
    $aluno->peso = $dados_aluno['peso'];
    $aluno->altura = $dados_aluno['altura'];
    $aluno->raca = $dados_aluno['raca'];
    $aluno->tipoDefic = $dados_aluno['tipo_defic'];
    $aluno->tipoTranspEscolar = $dados_aluno['tipo_transp_escolar'];
    $aluno->tipoUsoInternet = $dados_aluno['tipo_uso_internet'];
    $aluno->sexo = $dados_aluno['sexo'];
    $aluno->regNascimento = $dados_aluno['reg_nascimento'];
    $aluno->regLivroNum = $dados_aluno['reg_livro_num'];
    $aluno->regFolhaNum = $dados_aluno['reg_folha_num'];
    $aluno->regComarca = $dados_aluno['reg_comarca'];
    $aluno->rg = $dados_aluno['rg'];
    $aluno->rgOrgao = $dados_aluno['rg_orgao'];
    $aluno->rgDataExpedicao = $dados_aluno['rg_data_expedicao'];
    $aluno->titulo = $dados_aluno['titulo'];
    $aluno->tituloZona = $dados_aluno['titulo_zona'];
    $aluno->tituloSecao = $dados_aluno['titulo_secao'];
    $aluno->reservista = $dados_aluno['reservista'];
    $aluno->reservistaSerie = $dados_aluno['reservista_serie'];
    $aluno->reservistaNumero = $dados_aluno['reservista_numero'];
    $aluno->reservistaCategNum = $dados_aluno['reservista_categ_num'];
    $aluno->reservistaCsm = $dados_aluno['reservista_csm'];
    $aluno->cartProf = $dados_aluno['cart_prof'];
    $aluno->grupoSangue = $dados_aluno['grupo_sangue'];
    $aluno->grupoSangueRh = $dados_aluno['grupo_sangue_rh'];
    $aluno->grupoSangueAlergia = $dados_aluno['grupo_sangue_alergia'];
    $aluno->grupoSangueDiabetico = $dados_aluno['grupo_sangue_diabetico'];
    $aluno->outraDoenca = $dados_aluno['outra_doenca'];
    $aluno->familiaComposta = $dados_aluno['familia_composta'];
    $aluno->estadoCivil = $dados_aluno['estado_civil'];
    $aluno->usaOculo = $dados_aluno['usa_oculos'];
    $aluno->destro = $dados_aluno['destro'];
    $aluno->convenio = $dados_aluno['convenio'];
    $aluno->nomePai = $dados_aluno['nome_pai'];
    $aluno->paiVivo = $dados_aluno['pai_vivo'];
    $aluno->paiNacionalidade = $dados_aluno['pai_nacionalidade'];
    $aluno->paiNaturalidade = $dados_aluno['pai_naturalidade'];
    $aluno->paiNivEscolar = $dados_aluno['pai_niv_escolar'];
    $aluno->paiReligiao = $dados_aluno['pai_religiao'];
    $aluno->paiProfissao = $dados_aluno['pai_profissao'];
    $aluno->paiEnderTrab = $dados_aluno['pai_ender_trab'];
    $aluno->paiTelefone = $dados_aluno['pai_telefone'];
    $aluno->paiEmail = $dados_aluno['pai_email'];
    $aluno->paiTitulo = $dados_aluno['pai_titulo'];
    $aluno->paiTituloZona = $dados_aluno['pai_titulo_zona'];
    $aluno->paiTituloSecao = $dados_aluno['pai_titulo_secao'];
    $aluno->nomeMae = $dados_aluno['nome_mae'];
    $aluno->maeViva = $dados_aluno['mae_viva'];
    $aluno->maeNacionalidade = $dados_aluno['mae_nacionalidade'];
    $aluno->maeNaturalidade = $dados_aluno['mae_naturalidade'];
    $aluno->maeNivEscolar = $dados_aluno['mae_niv_escolar'];
    $aluno->maeReligiao = $dados_aluno['mae_religiao'];
    $aluno->maeProfissao = $dados_aluno['mae_profissao'];
    $aluno->maeEnderTrab = $dados_aluno['mae_ender_trab'];
    $aluno->maeTelefone = $dados_aluno['mae_telefone'];
    $aluno->maeEmail = $dados_aluno['mae_email'];
    $aluno->maeTitulo = $dados_aluno['mae_titulo'];
    $aluno->maeTituloZona = $dados_aluno['mae_titulo_zona'];
    $aluno->maeTituloSecao = $dados_aluno['mae_titulo_secao'];
    $aluno->maeNi = $dados_aluno['mae_nis'];
    $aluno->paiNi = $dados_aluno['pai_nis'];
    $aluno->nomeResponsavel = $dados_aluno['nome_responsavel'];
    $aluno->parentescoResponsavel = $dados_aluno['parentesco_responsavel'];
    $aluno->nacionalResponsavel = $dados_aluno['nacional_responsavel'];
    $aluno->naturalResponsavel = $dados_aluno['natural_responsavel'];
    $aluno->nivEscolarResponsavel = $dados_aluno['niv_escolar_responsavel'];
    $aluno->religiaoResponsavel = $dados_aluno['religiao_responsavel'];
    $aluno->profissaoResponsavel = $dados_aluno['profissao_responsavel'];
    $aluno->enderTrabResponsavel = $dados_aluno['ender_trab_responsavel'];
    $aluno->telefResponsavel = $dados_aluno['telef_responsavel'];
    $aluno->emailResponsavel = $dados_aluno['email_responsavel'];
    $aluno->tituloResponsavel = $dados_aluno['titulo_responsavel'];
    $aluno->tituloZonaResponsavel = $dados_aluno['titulo_zona_responsavel'];
    $aluno->tituloSecaoResponsavel = $dados_aluno['titulo_secao_responsavel'];
    $aluno->descriTranspEscolar = $dados_aluno['descri_transp_escolar'];
    $aluno->paiUf = $dados_aluno['pai_uf'];
    $aluno->maeUf = $dados_aluno['mae_uf'];
    $aluno->responsavelUf = $dados_aluno['responsavel_uf'];
    $aluno->dataNascimento = geradatamy($dados_aluno['data_nascimento']);
    $aluno->ufRegComarca = $dados_aluno['uf_reg_comarca'];
    $aluno->cpfAluno = $dados_aluno['cpf_aluno'];
    $aluno->cpfPai = $dados_aluno['cpf_pai'];
    $aluno->cpfMae = $dados_aluno['cpf_mae'];
    $aluno->cpfResponsavel = $dados_aluno['cpf_responsavel'];
    $aluno->colaboraRendaFamiliar = $_POST['colabora_renda_familiar'];

    if(empty($erro))
    {
        if(!$dados_aluno["id"]){
            $aluno->senha= geraSenha($dados_aluno['senha']);
            if(!empty($dados_aluno['foto']))
            {
                $nome_foto = geraFotoBase64($dados_aluno['foto'],"alunos");
                $aluno->foto = $nome_foto;
            }
            $aluno->created=date('Y-m-d H:i:s');
            $aluno->status=1;
            DAOFactory::getAlunoDAO()->insert($aluno);
        }else{
            if(!empty($dados_aluno['senha'])) $aluno->senha= geraSenha($dados_aluno['senha']);
            if(!empty($dados_aluno['foto']))
            {
                if(file_exists(DOMAIN_PATH."fotos/alunos/".$dados_aluno["foto_salva"])){
                    unlink(DOMAIN_PATH."fotos/alunos/".$dados_aluno["foto_salva"]);
                }

                $nome_foto = geraFotoBase64($dados_aluno['foto'],"alunos");
                $aluno->foto = $nome_foto;
            }

            DAOFactory::getAlunoDAO()->update($aluno);
        }

        $aluno=NULL;
        echo json_encode(array("erro"=>0));
    }else{
        echo json_encode(array("erro"=>1,"mensagem_erro"=>"<p> <strong>".$msg_erro."</strong></p>"));
    }
}
?>