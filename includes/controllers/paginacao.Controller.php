<?php
	$paginacao = new Paginacao($linhas_pagina,$n_,$tr);
    $link = $paginacao->getPaginacaoURL($parametros_url);
?>