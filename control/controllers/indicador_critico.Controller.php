<?php

$opcao_indicador_critico= "active";

$escolas = DAOFactory::getEscolaDAO()->queryAll("*","where inep is not null and inep<>'' order by nome asc");

?>