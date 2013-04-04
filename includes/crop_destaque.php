<?php

/**
 * Jcrop image cropping plugin for jQuery
 * Example cropping script
 * @copyright 2008 Kelly Hallman
 * More info: http://deepliquid.com/content/Jcrop_Implementation_Theory.html
 */

// If not a POST request, display page below:

?><html>
	<head>

	    <script src="../webroot/js/jquery.js"></script>
		<script src="../webroot/js/jquery.Jcrop.js"></script>
		<link rel="stylesheet" href="../webroot/css/jquery.Jcrop.css" type="text/css" />
		<link rel="stylesheet" href="../webroot/css/demos.css" type="text/css" />

		<script language="Javascript">

			$(function(){
                
				$('#cropbox').Jcrop({
				    setSelect:   [ 0, 0, <?=$_GET["w"]?>, <?=$_GET["h"]?> ],
					onSelect: updateCoords,
                    allowResize: true,
            		sideHandles:		false,
				});
			});

			function updateCoords(c)
			{
				$('#x').val(c.x);
				$('#y').val(c.y);
				$('#w').val(c.w);
				$('#h').val(c.h);
			};

			function checkCoords(formulario)
			{
			 
				if (parseInt($('#w').val())){
				    $.ajax({
            		   type: "POST",
            		   url: "ajax/corta_imagem.php",
            		   data: $(formulario).serialize(),
                       success: function(data){	
                       // alert(msg);
            		        alert("Imagem cortada com sucesso.");
                            window.close();       
                        }
            		   
            		 });
				   // return true;  
                    
                    
				} 
				//alert('Por favor selecione a região de corte.');
				return false;
			};

		</script>

	</head>

	<body>

	<div id="outer">
	<div class="jcExample">
	<div class="article">

		<h1>Corte da imagem de destaque</h1>

		<!-- This is the image we're attaching Jcrop to -->
		<img src="../webroot/uploads/<?=$_GET["caminho"]?>/<?=$_GET["imagem"]?>" id="cropbox" />

		<!-- This is the form that our event handler fills -->
		<form action="crop_destaque.php" method="post" onSubmit="return checkCoords(this);">
			<input type="hidden" id="x" name="x" />
			<input type="hidden" id="y" name="y" />
	
    
    <input type="hidden" id="w" name="w" />
	<input type="hidden" id="h" name="h" />
    <input type="hidden" name="imagem" value="<?=$_GET["imagem"]?>" />
    <input type="hidden" name="caminho" value="<?=$_GET["caminho"]?>" />
			<input type="submit" value="CORTAR REGIÃO SELECIONADA" />
            <input type="button" value="FECHAR JANELA" onclick="window.close();" />
		</form>

	</div>
	</div>
	</div>
	</body>

</html>