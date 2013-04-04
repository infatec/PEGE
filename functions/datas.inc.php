<?
#############    datas   ################
function sql_to_datetime($data) {
    $data = explode(" ",$data);
    return implode("/",array_reverse(explode("-",$data[0])))." - ".$data[1];
}
function data_valida($date)
{
	if(!empty($date))
	{
		$data = explode("/",$date);
		return checkdate( $data[1], $data[0], $data[2]);
	}
	return false;
}
function isValidDateTime($dateTime)
{
	if (preg_match("/^(\d{2})-(\d{2})-(\d{4}) ([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/", $dateTime, $matches)) {
		if (checkdate($matches[2], $matches[3], $matches[1])) {
			return true;
		}
	}

	return false;
}

function somaDias($data,$dias,$tipo,$separador)
{
	$ano = substr($data, 0, 4);
	$mes = substr($data, 5, 2);
	$dia = substr($data, 8, 2);
	$hora = substr($data, 11, 8);
	$dia_previsto = $dia + $dias;
	if ($tipo==1) $data_prevista = date("d".$separador."m".$separador."Y", mktime(0, 0, 0, $mes ,$dia_previsto, $ano));
	else if ($tipo==2) $data_prevista = date("Y".$separador."m".$separador."d", mktime(0, 0, 0, $mes ,$dia_previsto, $ano));
	return $data_prevista.' '.$hora;
}
//data com formato dd/mm/aaaa
function somaMes($data,$meses_somar)
{
    $data=explode("/",$data);
    $dia = $data[0];
    $mes = $data[1];
    $ano = $data[2];
    $dataFinal = mktime(0, 0, 0, $mes+$meses_somar, $dia, $ano);
    $dataFormatada = date('d/m/Y',$dataFinal);
    return $dataFormatada;
}
function somaDiasBanco($data,$dias,$tipo,$separador)
{
    $data=explode("-",$data);
	$ano = $data[0];
	$mes = $data[1];
	$dia = $data[2];
	$hora = substr($data, 11, 8);
	$dia_previsto = $dia + $dias;
	if ($tipo==1) $data_prevista = date("d".$separador."m".$separador."Y", mktime(0, 0, 0, $mes ,$dia_previsto, $ano));
	else if ($tipo==2) $data_prevista = date("Y".$separador."m".$separador."d", mktime(0, 0, 0, $mes ,$dia_previsto, $ano));
	return $data_prevista.' '.$hora;
}
function somaMesBanco($data,$meses_somar)
{
    $data=explode("-",$data);
	$dia = $data[2];
    $mes = $data[1];
    $ano = $data[0];
    $dataFinal = mktime(0, 0, 0, $mes+$meses_somar, $dia, $ano);
    $dataFormatada = date('Y-m-d',$dataFinal);
    return $dataFormatada;
}
function subtraiDatasBanco($data_i,$data_f){
    //Datas no formato mm/dd/aaaa
    $datainicio=strtotime($data_i);
    $datafim  =strtotime($data_f);
    $intervalo=($datafim-$datainicio)/86400; //transformaчуo do timestamp em dias
    return (int)$intervalo;
    
}
function somaDiasBancoSemHora($data,$dias,$tipo,$separador)
{
	$data=explode("-",$data);
	$ano = $data[0];
	$mes = $data[1];
	$dia = $data[2];
	$dia_previsto = $dia + $dias;
	if ($tipo==1) $data_prevista = date("d".$separador."m".$separador."Y", mktime(0, 0, 0, $mes ,$dia_previsto, $ano));
	else if ($tipo==2) $data_prevista = date("Y".$separador."m".$separador."d", mktime(0, 0, 0, $mes ,$dia_previsto, $ano));
	return $data_prevista;
}

	
function dataBrasileira() 
{ 
	// Gerando o array com nome dos dias da semana
	$diaSemana = array("Domingo", "Segunda-feira", "Terчa-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sсbado"); 
	// Gerando array com o nome dos meses      
	$mes = array(1=>"janeiro", "fevereiro", "marчo", "abril", "maio", "junho", "julho", "agosto", "setembro", "outubro", "novembro", "dezembro"); 
	// Retorno da funуo
	return $diaSemana[gmdate("w")] . ", " . gmdate("d") . " de " . $mes[gmdate("n")] . " de " . gmdate("Y"); 
}
 function dataHoraBrasileira() 
{ 
	// Gerando o array com nome dos dias da semana
	$diaSemana = array("Domingo", "Segunda-feira", "Terчa-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sсbado"); 
	// Gerando array com o nome dos meses      
	$mes = array(1=>"janeiro", "fevereiro", "marчo", "abril", "maio", "junho", "julho", "agosto", "setembro", "outubro", "novembro", "dezembro"); 
	// Retorno da funуo
	return $diaSemana[gmdate("w")] . ", " . gmdate("d/m/Y h:i"); 
}

 function dataHora() 
{ 
	// Gerando o array com nome dos dias da semana
	$diaSemana = array("Domingo", "Segunda-feira", "Terчa-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sсbado"); 
	// Gerando array com o nome dos meses      
	$mes = array(1=>"janeiro", "fevereiro", "marчo", "abril", "maio", "junho", "julho", "agosto", "setembro", "outubro", "novembro", "dezembro"); 
	// Retorno da funуo
	return gmdate("d/m/Y h:i"); 
}

 function diasemana($data) 
 {
	$ano =  substr("$data", 0, 4);
	$mes =  substr("$data", 5, -3);
	$dia =  substr("$data", 8, 9);

	$diasemana = date("w", mktime(0,0,0,$mes,$dia,$ano) );

	switch($diasemana) {
		case"0": $diasemana = "Domingo";       break;
		case"1": $diasemana = "Segunda-Feira"; break;
		case"2": $diasemana = "Terчa-Feira";   break;
		case"3": $diasemana = "Quarta-Feira";  break;
		case"4": $diasemana = "Quinta-Feira";  break;
		case"5": $diasemana = "Sexta-Feira";   break;
		case"6": $diasemana = "Sсbado";        break;
	}

	echo "$diasemana";
	//Exemplo de uso
//diasemana("2007-07-13");	
}
//Converte a data mySQL(yyyy-mm-dd h:m:s) para o padrуo BR(dd-mm-yyyy)
function geradatabr($data) {
        $tirahora = substr($data,0,-9);
        list ($ano,$mes,$dia) = split ('[-]', $tirahora);
        $databr = "$dia/$mes/$ano";
    return $databr;
}
//Converte a data mySQL(yyyy-mm-dd) para o padrуo BR(dd/mm/yyyy)
function geradatabr1($data) {
    $data = trim($data);
    if(!$data) return "";
        list ($ano,$mes,$dia) = split ('[-]', $data);
        $databr = "$dia/$mes/$ano";
    return $databr;
}
//Converte a data mySQL(yyyy-mm-dd) para o padrуo BR(mm-yyyy)
function geradatabr2($data) {
        list ($ano,$mes,$dia) = split ('[-]', $data);
        $databr = "$mes-$ano";
    return $databr;
}
//Converte a data mySQL(yyyy-mm-dd) para o padrуo BR(dd-mm-yyyy)
function geradatabr3($data) {
        list ($ano,$mes,$dia) = split ('[-]', $data);
        $databr = "$dia-$mes-$ano";
    return $databr;
}
//Converte a data mySQL(yyyy-mm-dd) para o padrуo BR(dd-mm)
function geradatabr4($data) {
        list ($ano,$mes,$dia) = split ('[-]', $data);
        $databr = "$dia-$mes";
    return $databr;
}
//Converte a data mySQL(yyyy-mm-dd h:m:s) para o padrуo BR(dd-mm-yyyy  as h:m:s)
function geradatahorabr($data) {
        $hora = substr($data,11);
        list ($G,$m,$s) = split ('[:]', $data);
        $tirahora = substr($data,0,-9);
        list ($ano,$mes,$dia) = split ('[-]', $tirahora);
        $databr = "$dia-$mes-$ano"." рs "."$hora";
    return $databr;
}
//Converte a data mySQL(yyyy-mm-dd h:m:s) para o padrуo BR(dd-mm-yyyy h:m:s)
function geradatahorabr1($data) {
        $hora = substr($data,11);
        list ($G,$m,$s) = split ('[:]', $data);
        $tirahora = substr($data,0,-9);
        list ($ano,$mes,$dia) = split ('[-]', $tirahora);
        $databr = "$dia-$mes-$ano $hora";
    return $databr;
}
//Converte a data mySQL(yyyy-mm-dd h:m:s) para o padrуo BR(dd-mm)
function geradatahorabr2($data) {
        $hora = substr($data,11);
        list ($G,$m,$s) = split ('[:]', $data);
        $tirahora = substr($data,0,-9);
        list ($ano,$mes,$dia) = split ('[-]', $tirahora);
        $databr = "$dia.$mes";
    return $databr;
}
//Converte a data BR(dd/mm/yyyy) para o padrуo mySQL(yyyy-mm-dd).
function geradatamy($data) {
    if(empty($data)) return NULL;
        list ($dia,$mes,$ano) = split ('[/]',$data);
        $datamy = "$ano-$mes-$dia";
    return $datamy;
}

//Converte a data BR(dd-mm-yyyy) para o padrуo mySQL(yyyy-mm-dd 00:00:00).
function geradatamyc($data) {
    $hora = date ("G:i:s");
        list ($dia,$mes,$ano) = split ('[-]',$data);
        $datamy = "$ano-$mes-$dia"." ".$hora;
    return $datamy;
}
//Pega a hora em um campo datatime da base de dados ou variсvel e retorna h:m:s.
function pegahora($hora){
        $hora = substr($hora,11);
        list ($h,$m,$s) = split ('[:]', $hora);
        $hora = "$h".":"."$m".":"."$s";
    return $hora;
}
    
###################################
?>