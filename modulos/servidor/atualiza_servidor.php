<?php

include("includes.php");


$servidores = DAOFactory::getServidorDAO()->queryAll("*","where");

?>