<?php
include("includes_ajax.php");

import("Turma");

$escola_id = (int)$_POST["escola_id"];
$turma_id = (int)$_POST["turma_id"];

$disciplinas = DAOFactory::getTurmaDAO()->getDisciplinasTurma($escola_id,$turma_id);

?>

<select id="turma_disciplina_id" name="turma_disciplina_id" onclick="getNotas(this.value)">
    <option></option>
    <? foreach($disciplinas as $disciplina): ?>
        <option value="<?=$disciplina["turma_disciplina_id"]?>"><?=$disciplina["nome"]?></option>
    <? endforeach; ?>
</select>