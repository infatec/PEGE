<?php  include("../../config/appConfig.php"); ?>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
    <link href="<?=URL.'/webroot/css/'?>estilo.css" rel="stylesheet" type="text/css">
    <script src="<?=URL.'/webroot/js/'?>funcoes.js"></script>
    <script src="<?=URL.'/webroot/js/'?>jquery.js"></script>


</head>

<body>
<script language="JavaScript" type="text/javascript">

// Version check for the Flash Player that has the ability to start Player Product Install (6.0r65)
var hasProductInstall = DetectFlashVer(6, 0, 65);

// Version check based upon the values defined in globals
var hasRequestedVersion = DetectFlashVer(requiredMajorVersion, requiredMinorVersion, requiredRevision);

if ( hasProductInstall && !hasRequestedVersion ) {
	// DO NOT MODIFY THE FOLLOWING FOUR LINES
	// Location visited after installation is complete if installation is required
	var MMPlayerType = (isIE == true) ? "ActiveX" : "PlugIn";
	var MMredirectURL = window.location;
    document.title = document.title.slice(0, 47) + " - Flash Player Installation";
    var MMdoctitle = document.title;

	AC_FL_RunContent(
		"src", "playerProductInstall",
		"FlashVars", "MMredirectURL="+MMredirectURL+'&MMplayerType='+MMPlayerType+'&MMdoctitle='+MMdoctitle+"",
		"width", "700",
		"height", "400",
		"align", "middle",
		"id", "main",
		"quality", "high",
		"bgcolor", "#f6f6f6",
		"name", "main",
		"allowScriptAccess","sameDomain",
		"type", "application/x-shockwave-flash",
		"pluginspage", "http://www.adobe.com/go/getflashplayer"
	);
} else if (hasRequestedVersion) {
	// if we've detected an acceptable version
	// embed the Flash Content SWF when all tests are passed
	AC_FL_RunContent(
			"src", "webcam/bin-debug/main",
			"width", "700",
			"height", "400",
			"align", "middle",
			"id", "main",
			"quality", "high",
			"bgcolor", "#f6f6f6",
			"name", "main",
			"allowScriptAccess","sameDomain",
			"type", "application/x-shockwave-flash",
			"pluginspage", "http://www.adobe.com/go/getflashplayer"
	);
  } else {  // flash is too old or we can't detect the plugin
    var alternateContent = 'Alternate HTML content should be placed here. '
  	+ 'This content requires the Adobe Flash Player. '
   	+ '<a href=http://www.adobe.com/go/getflash/>Get Flash</a>';
    document.write(alternateContent);  // insert non-flash content
  }

function carregaFoto(valor)
{
    alert(valor);
	//parent.carregaBase64(valor);
}

  
</script>
<table>
	
    
    <tr>
        <td>
      <object height="400" width="700" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" style="width: 710px; height: 400px;">
<param value="webcam/bin-debug/webcam.swf" name="src"/>
<embed height="400" width="700" src="webcam/bin-debug/webcam.swf" type="application/x-shockwave-flash" style="width: 710px; height: 400px;"/>
</object>    
        </td>
    
    </tr>
    <tr>
    <td><input type="button" class="botao_branco" onClick="sair()" value="Sair"></td>
    </tr>
  
    
</table>

</body>
</html>
