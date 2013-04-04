<?php

if(isset($_SESSION["msg_index"]))
{
    $msg_index = $_SESSION["msg_index"];
    unset($_SESSION["msg_index"]);
}

$tirar_incluir=1;
?>