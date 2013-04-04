<?php
include("includes.php");
include(DOMAIN_PATH."lib/pdf.php");
define('FPDF_FONTPATH',DOMAIN_PATH.'lib/fpdf/font/');
header("Content-type: text/html; charset=ISO-8859-1");
include(DOMAIN_PATH."modulos/escola/controllers/geraRelatorio.Controller.php");
?>