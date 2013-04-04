<?php
include("../ajax/includes_ajax.php");

import("Turma");
import("Aluno");
import("NivelEnsinoMec");
import("Ano");
import("AnoLetivo");

$escola_id = $_GET["escola_id"];
$ano_letivo_id =$_GET["ano_letivo_id"];

$escola = DAOFactory::getEscolaDAO()->load($escola_id);
$ano_letivo = DAOFactory::getAnoLetivoDAO()->load($ano_letivo_id);


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>PEGE - Programa estatistico e Gestor Escolar</title>
<link href="stilo/folha.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="topo">
	<div id="foto"><img src="images/img_escola.JPG" width="70" height="70"></div>
    <div id="titulo">
    <strong>Estado do PI<br>
     Secretaria Municipal <br> 
     Secretaria Municipal de Educação
  </strong></div>                 
</div>
	<hr /> 
    	<div id="tituloTabela"><p><strong>Movimento Bimestral</strong></p></div>
        <div align="center"><p id="campos1">
        Escola:<span style="text-decoration: underline;"><?=$escola->nome?></span> Turno: Manhã <br />
        Endereço:<span style="text-decoration: underline;"><?=$escola->endereco?></span><br />
        Bimestre:<span style="text-decoration: underline;">1</span>Ano: <span style="text-decoration: underline;"><?=$ano_letivo->identificacao?> </span>Dias Letivos<span style="text-decoration: underline;">200 </span>
        Nmero de salas de aula no prédio: <span style="text-decoration: underline;">20</span>Salas Ociosas: <span style="text-decoration: underline;">3</span>
        </p></div>
        
        <div id="tabela" align="center">
        	<table class="tabela">
        	<tr>
            <th rowspan="4" width="200px">Especificação</th>
            <th rowspan="3" colspan="2" width="20px">Creche</th>
            <th colspan="4" >Ens. Infantil</th>
            <th colspan="10" >Ens. Fundamental I</th>
            <th rowspan="3" rowspan="2"colspan="2">Total</th>
            <th rowspan="4" width="70px" >TOTAL GERAL</th>
            </tr>
            
            <tr>
            <th colspan="4">Pré-Escolar</th>
            <th colspan="2" rowspan="2" >1°</th>
            <th colspan="2" rowspan="2">2°</th>
            <th colspan="2" rowspan="2">3°</th>
            <th colspan="2" rowspan="2">4°</th>
            <th colspan="2" rowspan="2">5°</th>
            </tr>
            
            <tr>
            <th colspan="2">1° Pré</th>
            <th colspan="2">2° Pré </th>
            </tr>
            
            <tr>
            <th>M</th>
            <th>F</th>
            <th>M</th>
            <th>F</th>
            <th>M</th>
            <th>F</th>
            <th>M</th>
            <th>F</th>
            <th>M</th>
            <th>F</th>
            <th>M</th>
            <th>F</th>
            <th>M</th>
            <th>F</th>
            <th>M</th>
            <th>F</th>
            <th>M</th>
            <th>F</th>
            </tr>
            
            <tr>
            <td><strong>Matricula Inicial</strong></td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>1000000</td>
            
             <tr>
            <td><strong>Pós Matricula</strong></td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>1000000</td>
            
             <tr>
            <td><strong>Matricula Atual</strong></td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>1000000</td>
            
             <tr>
            <td><strong>Matricula Final</strong></td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>1000000</td>
            
             <tr>
            <td><strong>Alunos Desistentes</strong></td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>1000000</td>
            
             <tr>
            <td><strong>Alunos Evadidos</strong></td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>1000000</td>
            
             <tr>
            <td><strong>Transferências recebidas</strong></td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>1000000</td>
            
             <tr>
            <td><strong>transferências expedidas</strong></td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>1000000</td>
             <tr>
            <td><strong>Número de Turmas</strong></td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>1000000</td>
            </tr>
            
  
            <!-- TABELA VERSO --->
         	<tr>
            <th rowspan="3" width="200px">Especificação</th>
            <th colspan="16" >Ens. Fundamental II</th>
            <th rowspan="2" colspan="2">Total</th>
            <th rowspan="3" >TOTAL GERAL</th>
            </tr>
            
           <tr>
           <th colspan="4" >6°</th>
           <th colspan="4" >7°</th>
           <th colspan="4" >8°</th>
           <th colspan="4" >9°</th>
           </tr>
            
          <tr>
          <th colspan="2">M</th>
          <th colspan="2">F</th>
          <th colspan="2">M</th>
          <th colspan="2">F</th>
          <th colspan="2">M</th>
          <th colspan="2">F</th>
          <th colspan="2">M</th>
          <th colspan="2">F</th>
          <th >M</th>
          <th >F</th>
		           
          </tr>
          
          <tr>
          <td><strong>Matricula Inicial</strong></td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td>10</td>
          <td>10</td>
          <td>10000</td>
          </tr>
           <tr>
          <td><strong>Pós Matricula</strong></td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td>10</td>
          <td>10</td>
          <td>10000</td>
          </tr>
          
           <tr>
          <td><strong>Matricula Atual</strong></td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td>10</td>
          <td>10</td>
          <td>10000</td>
          </tr>
          
           <tr>
          <td><strong>Matricula Final</strong></td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td>10</td>
          <td>10</td>
          <td>10000</td>
          </tr>
          
           <tr>
          <td><strong>Alunos Desistentes</strong></td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td>10</td>
          <td>10</td>
          <td>10000</td>
          </tr>
          
           <tr>
          <td><strong>Alunos Evadidos</strong></td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td>10</td>
          <td>10</td>
          <td>10000</td>
          </tr>
          
           <tr>
          <td><strong>Transferências recebidas</strong></td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td>10</td>
          <td>10</td>
          <td>10000</td>
          </tr>
          
          <tr>
          <td><strong>Transferências expedidas</strong></td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td colspan="2">10</td>
          <td>10</td>
          <td>10</td>
          <td>10000</td>
          </tr>
         
         <tr>
         <td><strong>Número de Turmas</strong></td>
         <td colspan="4">10</td>
         <td colspan="4">10</td>
         <td colspan="4">10</td>
         <td colspan="4">10</td>
         <td>10</td>
         <td>10</td>
         <td>1000</td>
         
         </tr>
            
            
            
        
        	</table>
        </div>
</body>
</html>