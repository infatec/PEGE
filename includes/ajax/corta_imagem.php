<?php
	$targ_w = $targ_h = 150;
	$jpeg_quality = 100;

	$src = '../../webroot/uploads/'.$_POST["caminho"].'/'.$_POST["imagem"];
	$img_r = imagecreatefromjpeg($src);
	$dst_r = ImageCreateTrueColor( $_POST['w'], $_POST['h'] );

	imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
	$_POST['w'],$_POST['h'],$_POST['w'],$_POST['h']);

	header('Content-type: image/jpeg');
	imagejpeg($dst_r,'../../webroot/uploads/'.$_POST["caminho"].'/'.$_POST["imagem"],$jpeg_quality);
?>