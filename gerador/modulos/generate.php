<?php
	session_start();
    set_time_limit(1000);
    include("../../config/appConfig.php");
    require_once('Template.php');
    include(DOMAIN_PATH."functions/funcoes.inc.php");
    include(DOMAIN_PATH."functions/datas.inc.php");
    include(DOMAIN_PATH."models/include_conexao.php");
    include(DOMAIN_PATH."lib/Model.php");
    require_once(DOMAIN_PATH.'models/class/dao/TabelasDAO.class.php');
    require_once(DOMAIN_PATH.'models/class/dto/Tabela.class.php');
    require_once(DOMAIN_PATH.'models/class/mysql/TabelasDAO.class.php');
    require_once(DOMAIN_PATH.'models/class/mysql/ext/TabelasExtDAO.class.php');
    
    function getClazzName($tableName){
    	$tableName = strtoupper($tableName[0]).substr($tableName,1);
    	for($i=0;$i<strlen($tableName);$i++){
    		if($tableName[$i]=='_'){
    			$tableName = substr($tableName, 0, $i).strtoupper($tableName[$i+1]).substr($tableName, $i+2);
    		}
    	}
    	return $tableName;
    }
    
    function getDTOName($tableName){
    	$name = getClazzName($tableName);
    	if($name[strlen($name)-1]=='s'){
    		$name = substr($name, 0, strlen($name)-1);
    	}
    	return $name;
    }
    
    function getVarName($tableName){
    	$tableName = strtolower($tableName[0]).substr($tableName,1);
    	for($i=0;$i<strlen($tableName);$i++){
    		if($tableName[$i]=='_'){
    			$tableName = substr($tableName, 0, $i).strtoupper($tableName[$i+1]).substr($tableName, $i+2);
    		}
    	}
    	if($tableName[strlen($tableName)-1]=='s' and trim($tableName)!="status"){
    		$tableName = substr($tableName, 0, strlen($tableName)-1);
    	}
    	return $tableName;
    }
    
    $tabela     = $_POST["nome_tabela"];
    $nome_opcao = $_POST["nome_opcao"];
    $menu_id    = $_POST["menu_id"];
    $tabela_id  = $_POST["tabela_id"];
    $tabela_id_existe  = $_POST["tabela_id_existe"];       
    $modulo_limp= $_POST["modulo_limpo"];
    
    //CAMPOS PARA GERAÇÃO 
    $campos_form  = $_POST["campos_form"];
    $campos_princ = $_POST["campos_princ"];
    $campos_vis   = $_POST["campos_vis"];
    $campos_filt  = $_POST["campos_filt"];
    $campos_not   = $_POST["campos_not"];
    #################
    
    //print_r($campos_form);
    //print_r($campos_princ);
    
    ###### VOU INSERIR O REGISTRO NA TABELA TABELAS #########
    if(empty($tabela_id_existe))
    {
        if(empty($tabela_id)) $tabela_id=0;
        $obj_tabela = new Tabela();
        $obj_tabela->tabelaId = $tabela_id;
        $obj_tabela->menuId = $menu_id;
        $obj_tabela->nome = $nome_opcao;
        $obj_tabela->status = 1;
        $obj_tabela->pasta = $tabela;
        DAOFactory::getTabelasDAO()->insert($obj_tabela);
        $obj_tabela_inserida = DAOFactory::getTabelasDAO()->queryAll("*","WHERE nome='".$nome_opcao."' AND pasta='".$tabela."'");
        $chave_tabela = $obj_tabela_inserida[0]->id;
    }
    else
    {
        $chave_tabela = $tabela_id_existe;
    }
    
    ######################
    
    ##### CRIO AS PASTAS PARA COLOCAR OS ARQUIVOS####
    
    @mkdir("../../modulos/".$tabela."");
	@mkdir("../../modulos/".$tabela."/controllers");
    @mkdir("../../modulos/".$tabela."/views");
    
    #####################
    
    ##### VOU GERAR OS ARQUIVOS QUE FICARÃO NA RAIZ DA PASTA DENTRO DO MODULO ####
    
    $clazzName = getClazzName($tabela);
    
    
    $str  = "\n";
	$str .= "\trequire_once(DOMAIN_PATH.'models/class/dao/".$clazzName."DAO.class.php');\n";
	$str .= "\trequire_once(DOMAIN_PATH.'models/class/dto/".getDTOName($clazzName).".class.php');\n";
	$str .= "\trequire_once(DOMAIN_PATH.'models/class/mysql/".$clazzName."DAO.class.php');\n";
	$str .= "\trequire_once(DOMAIN_PATH.'models/class/mysql/ext/".$clazzName."ExtDAO.class.php');\n";
    
    
    ####### includes.php #########
    
    
    
    ### raiz.php #########
    
    $template = new Template('templates/includes.tpl');
    $template->set('pagina',"index");
	$template->set('models', $str);
    $template->set('table_name', $tabela);
	$template->write('../../modulos/'.$tabela.'/includes.php');
    $template = NULL;
   
    
    $template = new Template('templates/raiz.tpl');
    $template->set('pagina',"index");
	$template->set('models', $str);
    $template->set('table_name', $tabela);
	$template->write('../../modulos/'.$tabela.'/index.php');
    $template = NULL;
    
    ####
if(!$modulo_limp)
{   
    $template = new Template('templates/raiz.tpl');
    $template->set('pagina',"cadastrar");
	$template->set('models', $str);
    $template->set('table_name', $tabela);
	$template->write('../../modulos/'.$tabela.'/cadastrar.php');
    $template = NULL;    
    
    $template = new Template('templates/raiz.tpl');
    $template->set('pagina',"remover");
	$template->set('models', $str);
    $template->set('table_name', $tabela);
	$template->write('../../modulos/'.$tabela.'/remover.php');
    $template = NULL;    
    
    $template = new Template('templates/raiz.tpl');
    $template->set('pagina',"visualizar");
	$template->set('models', $str);
    $template->set('table_name', $tabela);
	$template->write('../../modulos/'.$tabela.'/visualizar.php');
    $template = NULL;
   
    $template = new Template('templates/raiz.tpl');
    $template->set('pagina',"atualizar");
	$template->set('models', $str);
    $template->set('table_name', $tabela);
	$template->write('../../modulos/'.$tabela.'/atualizar.php');
    $template = NULL;
   
    $srt="";
}    
    ##############
    
    ########### default.Controller.php ################
    
    $str ="\n";    
    $template = new Template('templates/default.Controller.tpl');
    $template->set('clazzName', $clazzName);
     $template->set('chave_tabela', $chave_tabela);
	$template->write('../../modulos/'.$tabela.'/controllers/default.Controller.php');
    $template = NULL;
   
    $srt="";
    
    #############################
    
    ########### index.Controller.php ################
    
    $str ="\n";    
    $template = new Template('templates/index.Controller.tpl');
    $template->set('clazzName', $clazzName);
    $template->set('table_name', $tabela);
	$template->write('../../modulos/'.$tabela.'/controllers/index.Controller.php');
    $template = NULL;
   
    $srt="";
    
    #############################
  
if(!$modulo_limp)
{ 
    
    ########### remover.Controller.php ################
    
    $str ="\n";    
    $template = new Template('templates/remover.Controller.tpl');
    $template->set('clazzName', $clazzName);
    $template->set('table_name', $tabela);
	$template->write('../../modulos/'.$tabela.'/controllers/remover.Controller.php');
    $template = NULL;
   
    $srt="";
    
    #############################
    
    ########### visualizar.Controller.php ################
    
    $str ="\n";    
    $template = new Template('templates/visualizar.Controller.tpl');
    $template->set('clazzName', $clazzName);
    $template->set('table_name', $tabela);
	$template->write('../../modulos/'.$tabela.'/controllers/visualizar.Controller.php');
    $template = NULL;
   
    $srt="";
    
    #############################
    
    
    
    ########### cadastrar.Controller.php ################
    
    $str ="\n";    
    $template = new Template('templates/cadastrar.Controller.tpl');
    $template->set('clazzName', $clazzName);
    $template->set('table_name', $tabela);
    
    $variaveis ="\n";
    $variaveis_not ="";
    foreach($campos_form as $dados)//PERCORRO OS CAMPOS QUE IRÃO FICAR NO FORMULARIO 
    {
        $variaveis .="\t\t\$".$tabela."->".getVarName($dados)." = \$_POST['".$dados."'];\n";    
    }
    foreach($campos_not as $dados)//PERCORRO OS CAMPOS QUE NÃO IRÃO SER VALIDADOS
    {
        $variaveis_not .="'".$dados."',";    
    }
    $variaveis_not = substr($variaveis_not,0,-1);
    
    $template->set('campos', $variaveis);
    $template->set('campos_not', $variaveis_not);
    
	$template->write('../../modulos/'.$tabela.'/controllers/cadastrar.Controller.php');
    $template = NULL;
   
    $srt="";
    #############################
    
    
    ########### atualizar.Controller.php ################
    
    $str ="\n";    
    $template = new Template('templates/atualizar.Controller.tpl');
    $template->set('clazzName', $clazzName);
    $template->set('table_name', $tabela);
    
    $variaveis ="\n";
    $variaveis_not ="";
    foreach($campos_form as $dados)//PERCORRO OS CAMPOS QUE IRÃO FICAR NO FORMULARIO 
    {
        $variaveis .="\t\t\$".$tabela."->".getVarName($dados)." = \$_POST['".$dados."'];\n";    
    }
    foreach($campos_not as $dados)//PERCORRO OS CAMPOS QUE NÃO IRÃO SER VALIDADOS
    {
        $variaveis_not .="'".$dados."',";    
    }
    $variaveis_not = substr($variaveis_not,0,-1);
    
    $template->set('campos', $variaveis);
    $template->set('campos_not', $variaveis_not);
    
	$template->write('../../modulos/'.$tabela.'/controllers/atualizar.Controller.php');
    $template = NULL;
   
    $srt="";
    #############################
}    
    ######################## index.view.php ########################
    $str ="\n";  
    $campos_descricao = "\n";
    $campos_fk ="\n";
    $campos_registros ="\n";
    $campos_filtro ="\n";
      
    $template = new Template('templates/index.View.tpl');
    $template->set('clazzName', $clazzName);
    $template->set('table_name', $tabela);

if(!$modulo_limp)
{ 
    
    foreach($campos_princ as $dados)//PERCORRO OS CAMPOS DESCRITIVOS QUE IRÃO FICAR NA PRINCIPAL
    {
        $campos_descricao .="\t\t<th>".$_POST[$dados."_form_text"]."</th>\n";  
        
        if(substr(trim($dados),-3)!="_id")
        
            $campos_registros .="\t\t\t\t\t\t\t\t\t\t\t\t<td class='text_padrao'><?=\$obj->".getVarName($dados)."?></td>\n"; 
        
        else
        {
            $campos_fk .="\t\t\t\t\t\t$".substr(trim($dados),0,-3)." = DAOFactory::get".$clazzName."DAO()->toString('".substr(trim($dados),0,-3)."','".$_POST[$dados."_form_campofk"]."',\$obj->".getVarName($dados).");";
            $campos_registros .="\t\t\t\t\t\t<td class='text_padrao'><?=$".substr(trim($dados),0,-3)."?></td>\n"; 
        } 
    }
    foreach($campos_filt as $dados)
    {
       $campos_filtro.="\t\t\t\t<option value='".$dados."' <? if(trim(\$campo)==trim(\$campo_sel)) echo'selected';?>>".$_POST[$dados."_form_text"]."</option>\n";
    }
}    
        
    $template->set('campos_descricao', $campos_descricao);
    $template->set('campos_fk', $campos_fk);
    $template->set('campos_registros', $campos_registros);
    $template->set('campos_filtro', $campos_filtro); 
    
	$template->write('../../modulos/'.$tabela.'/views/index.View.php');
    $template = NULL;
   
    $srt="";
    #############################################
if(!$modulo_limp)
{     
    ######################## r-campos.view.php ########################
      
    $campos_formulario = "\n";
    
    foreach($campos_form as $dados)
    {
        $campo_hidden = explode("|",$_POST[$dados."_form_hidden"]);
        $tipo_campo_form = $campo_hidden[0] ;
        $tamanho_campo_form = substr(trim($campo_hidden[1]),0,-1) ;
        if(substr(trim($dados),-3)!="_id")
            $campos_formulario.="<tr>
                                    <td height='36' align='right' class='text_bold_preto'>".$_POST[$dados."_form_text"]."</td>
                                    <td class='text_padrao'>
                                        <input name='".$dados."' type='text' class='<?=\$erro['".$dados."']?>' id='".$dados."' value='<?=stripslashes($".$tabela."->".getVarName($dados).")?>'  size='".$tamanho_campo_form."' maxlength='".$tamanho_campo_form."' />

                                    </td>
                                </tr>\n";
        else//AQUI ENTRA SE FOR CHAVE ESTRANGEIRA
        {
           $tipo_select= $_POST[$dados."_form_select"]; 
           if($tipo_select=="cs")//CASO FOR USAR O SELECT 
           {
                $campos_formulario.="<tr>
                                    <td height='36' align='right' class='text_bold_preto'>".$_POST[$dados."_form_text"]."</td>
                                    <td class='text_padrao'>
                                    <?
                                    \$dados = array('primary_key' => 'id', 
                            						'nome' => '".$_POST[$dados."_form_campofk"]."', 
                            						'tabela' => '".substr(trim($dados),0,-3)."', 
                            						'condicao' => ' order by ".$_POST[$dados."_form_campofk"]." asc', 
                            						'nome_input' => '".$dados."', 
                            						'id' => '".$dados."', 
                            						'class' => \$erro[\"".$dados."\"], 
                            						'value' => $".$tabela."->".getVarName($dados).");	
                            						
                                    DAOFactory::get".$clazzName."DAO()->geraSelect(\$dados);
                                    ?>
                                    </td>
                                </tr>\n"; 
           }
           else//CASO USE O MASTER DE BUSCA
           {
                $campos_formulario.="<tr>
                                    <td height='36' align='right' class='text_bold_preto'>".$_POST[$dados."_form_text"]."</td>
                                    <td class='text_padrao'>
                                        <input type=\"text\" id=\"".substr(trim($dados),0,-3)."_nome\" value=\"<?=DAOFactory::get".$clazzName."DAO()->toString(\"".substr(trim($dados),0,-3)."\",\"".$_POST[$dados."_form_campofk"]."\",$".$tabela."->".getVarName($dados).")?>\" disabled=\"disabled\" size=\"50\" /> 
                                        <input type=\"hidden\" value=\"<?=$".$tabela."->".getVarName($dados)."?>\" name=\"".$dados."\" id=\"".$dados."\"/>
                                        <a href=\"../../includes/busca_registro.php?modulo=".substr(trim($dados),0,-3)."&tabela=".substr(trim($dados),0,-3)."&campo=".$_POST[$dados."_form_campofk"]."&height=520&width=560&keepThis=true&TB_iframe=true\" title=\"Busca Registro\" class=\"thickbox\"><img src=\"../../webroot/img_sistema/icon_visualizar.gif\" border=\"0\"></a>
                                    </td>
                                </tr>\n"; 
           }
        }
    }
      
    $template = new Template('templates/r-campos.View.tpl');
    $template->set('campos_formulario', $campos_formulario);
    $template->write('../../modulos/'.$tabela.'/views/r-campos.View.php');
    $template = NULL;
    
    ###########
    ######################## CADASTRAR.VIEW.PHP ##################33
    
    $template = new Template('templates/cadastrar.View.tpl');
    $template->set('table_name', $tabela);
    $template->write('../../modulos/'.$tabela.'/views/cadastrar.View.php');
    $template = NULL;
    
    ##################
    
    ######################## ATUALIZAR.VIEW.PHP ##################33
    
    $template = new Template('templates/atualizar.View.tpl');
    $template->set('table_name', $tabela);
    $template->write('../../modulos/'.$tabela.'/views/atualizar.View.php');
    $template = NULL;
    
    ##################
    
     ######################## REMOVER.VIEW.PHP ##################33
    
    $template = new Template('templates/remover.View.tpl');
    $template->set('clazzName', $clazzName);
    $template->set('table_name', $tabela); 
    $template->write('../../modulos/'.$tabela.'/views/remover.View.php');
    $template = NULL;
    
    ##################
   
     ######################## VISUALIZAR.VIEW.PHP ##################33
    $campos_formulario = "\n";
    
    foreach($campos_form as $dados)
    {
        $campo_hidden = explode("|",$_POST[$dados."_form_hidden"]);
        $tipo_campo_form = $campo_hidden[0] ;
        $tamanho_campo_form = $campo_hidden[1] ;
        if(substr(trim($dados),-3)!="_id")
            $campos_formulario.="<tr>
                                    <td height='36' align='right' class='text_bold_preto'>".$_POST[$dados."_form_text"].":</td>
                                    <td class='text_padrao'>
                                        <?=stripslashes($".$tabela."->".getVarName($dados).")?>
                                    </td>
                                </tr>\n";
        else//AQUI ENTRA SE FOR CHAVE ESTRANGEIRA
        {
            $campos_formulario.="<tr>
                                <td height='36' align='right' class='text_bold_preto'>".$_POST[$dados."_form_text"]."</td>
                                <td class='text_padrao'>
                                    <?=DAOFactory::get".$clazzName."DAO()->toString(\"".substr(trim($dados),0,-3)."\",\"".$_POST[$dados."_form_campofk"]."\",$".$tabela."->".getVarName($dados).")?>
                                </td>
                            </tr>\n"; 
          
        }
    }
    
    $template = new Template('templates/visualizar.View.tpl');
    $template->set('clazzName', $clazzName);
    $template->set('table_name', $tabela); 
    $template->set('campos_formulario', $campos_formulario);
    $template->write('../../modulos/'.$tabela.'/views/visualizar.View.php');
    $template = NULL;
}    
    ##################
    
    echo "gerou";
?>