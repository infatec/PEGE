<?PHP 
$rp = 15;

$page = 1;
$rp = 10;
$start = (($page-1) * $rp);
$limit = "LIMIT $start, $rp";

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" );
header("Cache-Control: no-cache, must-revalidate" );
header("Pragma: no-cache" );
header("Content-type: text/xml");
$xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
$xml .= "<rows>";
$xml .= "<page>$page</page>";
$xml .= "<total>$total</total>";

//while ($row = mysql_fetch_array($result)) {
$xml .= "<row id='1'>";
$xml .= "<cell><![CDATA[5]]></cell>";
$xml .= "<cell><![CDATA[BRUGUELO]]></cell>";
$xml .= "<cell><![CDATA[Júnior]]></cell>";
$xml .= "</row>";
//}

$xml .= "</rows>";
echo $xml;
?>  
