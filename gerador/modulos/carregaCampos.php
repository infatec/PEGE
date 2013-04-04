<?

//NO CARREGA CAMPOS IREI RETORNAR OS CAMPOS
/*

DA TABELA SELECIONADA , SENDO QUE VAI
TER UM CHECK BOX E UM TEXT 
E UM INPUT HIDDEN COM OS SEGUINTES DADOS

TIPO|TAMANHO


-O CHECK BOX VAI TER NAME

CAMPOS_FORM[] 
CAMPOS_PRINC[]
CAMPOS_VIS[]
CAMPOS_FILT[]
CAMPO_NOT[] - AQUI VAI DIZER OS CAMPOS QUE NÃO VAI VALIDAR

-OS INPUT TEXT VAI TER NAME

{CAMPO}_FORM_TEXT 

-OS INPUT HIDDEN VAI TER NAME

{CAMPO}_FORM_HIDDEN

-OS INPUT HIDDEN VAI TER NAME

{CAMPO}_FORM_FK

SENDO QUE O {CAMPO}_FORM_TEXT VAI CONTER O NOME DO CAMPO QUE O USUÁRIO VAI VISUALIZAR
E O {CAMPO}_FORM_HIDDEN VAI CONTER OS DADOS DO CAMPO SEPARADOS PELO | tipo|tamanho


SE O CAMPO TIVER _ID VIA GERAR UM SELECT PARA ESCOLHER ENTRE CHAVE COM SELECT OU COM MASTER BUSCA 


*/
    session_start();
    include("../../config/appConfig.php");
    include(DOMAIN_PATH."functions/funcoes.inc.php");
    include(DOMAIN_PATH."functions/datas.inc.php");
    include(DOMAIN_PATH."models/include_conexao.php");
    include(DOMAIN_PATH."lib/Model.php");
    require_once(DOMAIN_PATH.'models/class/dao/TabelasDAO.class.php');
    require_once(DOMAIN_PATH.'models/class/dto/Tabela.class.php');
    require_once(DOMAIN_PATH.'models/class/mysql/TabelasDAO.class.php');
    require_once(DOMAIN_PATH.'models/class/mysql/ext/TabelasExtDAO.class.php'); 
    
    function getFields($table){
    	$sql = 'DESC '.$table;
    	return QueryExecutor::execute(new SqlQuery($sql));
    }
    $tabela = $_GET["nome_tabela"];
    $tipo=$_GET["tipo"];   
    $rs = getFields($tabela);
    //print_r($rs);
    $texto="";  
    $texto= '<table width="100%" id="tablesorter-demo" cellspacing="1" cellpadding="0" class="tablesorter" >
            				<thead>
            					<tr>
            						<th width="20%">Campos</th> 
            	                    <th width="30%">Descricao Campos</th> 
            	                    <th width="20%">Validar</th> 
            	                    <th width="30%">Select</th>
            					</tr>
            				</thead>'; 
    foreach($rs as $dados)//PERCORRE OS CAMPOS DA TABELA
    {
        //$dados[0] - campo ,$dados[1]- tipo(tamanho),
        $ar_dados1 = explode("(",$dados[1]);
        $campo = $dados[0];
        $tipo_campo = $ar_dados1[0];
        $tamanho_campo = $ar_dados1[1];
        
        if(trim($campo)!="id" and trim($campo)!="status" and trim($campo)!="created")
        {
            $texto .='<tr>';
            $texto.="<td align='left'>
                         <input type='checkbox' name='campos_".$tipo."[]' value='".$campo."'> ".$campo."
                     </td>";
                     
            if($tipo=="form")  
                $texto.="
                     <td align='left'>     
                         <input type='text' size='40' name='".$campo."_".$tipo."_text'>
                          <input type='hidden' value='".$tipo_campo."|".$tamanho_campo."' name='".$campo."_".$tipo."_hidden'>
                     </td>    
                         ";
            else $texto.='<td> - </td>';
            
            if($tipo=="form") 
                $texto .="<td align='left'>
                         <input type='checkbox' name='campos_not[]' value='".$campo."'> Nao validar?
                        </td> 
                         ";
            else $texto.='<td> - </td>';
            
            if(substr(trim($campo),-3)=="_id" and $tipo=="form")
            {
                $texto.="<td align='left'>
                            <select name='".$campo."_".$tipo."_select'>
                                <option value='cs'>Com select</option>
                                <option value='cm'>Com master de busca</option>
                            </select> / Campo FK:<input type='text' size='40' name='".$campo."_".$tipo."_campofk'>
                         </td>   
                            ";    
            }
            else $texto.='<td> - </td>';
                
                     
           // echo substr(trim($dados[3]),-3)."<br>";
            $texto .='</tr>';                
        
        } 
            
    }
    $texto .="</table>";
    echo $texto;

?>