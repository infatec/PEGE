<?php
set_time_limit(10000);

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

$alunos = DAOFactory::getAlunoDAO()->getAlunosFiltro($criterio);


$pdf = new PDFLista("L","cm","A4");
$pdf->titulo1 = "Prefeitura Municipal de Caxias-MA";
$pdf->titulo2 = "Secretaria Municipal de Educação";
$pdf->titulo_relatorio = "Relatório de Alunos";
$pdf->campos = array("ID","Nome","Idade","Sexo","Inep","endereco","bairro","CEP");

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
$pdf->SetWidths(array(1.5,4,1.1,1.1,2,4,4,1.5,2,2.1,1.6,1.4,1.5,1.5,1.5,1.5,1.8,2.0));
$pdf->SetAligns(array('C','C','C','C','C','C','C','C','C','C','C','C','C','C','C','C','C','C'));

$pdf->SetFont('times','',6);

$pdf->AddPage();
foreach($alunos as $aluno){

    $pdf->SetFont('times','',6);

    $conteudo = array($aluno["id"],$aluno["nome"],$aluno["idade"],$aluno["sexo"],$aluno["inep"],$aluno["endereco"],$aluno["bairro"],$aluno["cep"]);

    foreach($campos_bd as $campo_bd){
        if($aluno[$campo_bd]=="S" or $aluno[$campo_bd]=="N") $aluno[$campo_bd] = $aluno[$campo_bd]=="S" ? "Sim" : "Não" ;
        array_push($conteudo, $aluno[$campo_bd]);
    }

    $pdf->row($conteudo);
}

$pdf->Output("relatorio","I");

?>
