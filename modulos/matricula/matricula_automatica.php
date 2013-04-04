<?php
    include("includes.php");
    import("Aluno");

    $idade = 18;
    $quantidade_matricular = 10;
    $ano_letivo_id =3;
    $escola_id = 195;
    $turma_id = 20;
    $filtro = array(
        "ano_letivo_id"=>$ano_letivo_id,
        "idade"=>$idade,
        "limit"=>$quantidade_matricular
    );

$alunos = DAOFactory::getAlunoDAO()->getAlunosIdadeNaoMatriculados($filtro);

//echo "<pre>";
foreach($alunos as $aluno){

  //  print_r($aluno);

    $matricula = new Matricula();
    $matricula->matricula = "20130".$turma_id."0".$aluno["id"];
    $matricula->alunoId = $aluno["id"];
    $matricula->turmaId = $turma_id;
    $matricula->dataMatricula = date('Y-m-d');
   // DAOFactory::getMatriculaDAO()->insert($matricula);
    echo $matricula->matricula."-matriculado!<br>";
}

?>
