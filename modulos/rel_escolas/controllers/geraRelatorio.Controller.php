<?php
set_time_limit(1000);

$campo = $_POST["campo"];
$valor = $_POST["valor"];
$operador = $_POST["operador"];
$campos_aparecer = $_POST["campos_aparecer"];
$campos_count = $_POST["campos_count"];

$qtd_campos = count($campo);

$criterio="";
for($i=0;$i<$qtd_campos;$i++){
    if(empty($valor[$i])) continue;

    $criterio.=" ".$operador[$i]." ".$campo[$i]."  like '%".$valor[$i]."%' ";
}

$escolas = DAOFactory::getEscolaDAO()->getEscolasByParametro($criterio);

$pdf = new PDFLista("L","cm","A4");
$pdf->titulo1 = "Prefeitura Municipal de Caxias-MA";
$pdf->titulo2 = "Secretaria Municipal de Educação";
$pdf->titulo_relatorio = "Relatório de Escolas";
$pdf->campos = array("ID","Nome","Inep","Bairro","Endereço","CEP");

if(!is_array($campos_aparecer)) $campos_aparecer=array();
$campos_bd = array();
foreach($campos_aparecer as $campo_aparecer){
    list ($label_campo, $campo_bd) = explode("|", $campo_aparecer);
    array_push($pdf->campos, $label_campo);
    $campos_bd[] = $campo_bd;
}

if(!is_array($campos_count)) $campos_count=array();
$campos_bd_count = array();
foreach($campos_count as $campo_count){
    list ($label_campo, $campo_bd) = explode("|", $campo_count);
    array_push($pdf->campos, $label_campo);
    $campos_bd_count[] = $campo_bd;
}

$pdf->Open();
$pdf->SetTitle("relatório");
$pdf->SetSubject("relatório");
$pdf->setdrawcolor(192,192,192);
$pdf->SetWidths(array(1.5,4,1.5,2,4,1.6,1.8,2,2,2.1,1.6,1.4,1.5,1.5,1.5,1.5,1.8,2.0));
$pdf->SetAligns(array('C','C','C','C','C','C','C','C','C','C','C','C','C','C','C','C','C','C'));

$pdf->SetFont('times','',6);

$pdf->AddPage();
foreach($escolas as $escola){

    $pdf->SetFont('times','',6);

    $conteudo = array($escola["id"],$escola["nome"],$escola["inep"],$escola["bairro"],$escola["endereco"],$escola["cep"]);

    foreach($campos_bd as $campo_bd){
        if($escola[$campo_bd]=="S" or $escola[$campo_bd]=="N") $escola[$campo_bd] = $escola[$campo_bd]=="S" ? "Sim" : "Não" ;
        array_push($conteudo, $escola[$campo_bd]);
    }
    foreach($campos_bd_count as $campo_bd_count){

        switch($campo_bd_count){
            case "AM":
                $valor_count = DAOFactory::getEscolaDAO()->getCountAlunosMatriculados($escola["escola_id"]);
                break;
            case "QT":
                $valor_count = DAOFactory::getEscolaDAO()->getCountTurmas($escola["escola_id"]);
                break;
            case "QP":
                $valor_count = DAOFactory::getEscolaDAO()->getCountProfessores($escola["escola_id"]);
                break;
            case "QS":
                $valor_count = DAOFactory::getEscolaDAO()->getCountServidores($escola["escola_id"]);
                break;
        };

        array_push($conteudo,$valor_count);
    }

    $pdf->row($conteudo);
}

$pdf->Output("relatorio","I");

?>
