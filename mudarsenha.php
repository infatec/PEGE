<? session_start();
	include("config/appConfig.php");
    include(DOMAIN_PATH."functions/funcoes.inc.php");
    include(DOMAIN_PATH."lib/Model.php");
    include(DOMAIN_PATH."models/include_conexao.php");
        
    require_once(DOMAIN_PATH.'models/class/dao/UsuariosDAO.class.php');
    require_once(DOMAIN_PATH.'models/class/dto/Usuario.class.php');
    require_once(DOMAIN_PATH.'models/class/mysql/UsuariosDAO.class.php');
    require_once(DOMAIN_PATH.'models/class/mysql/ext/UsuariosExtDAO.class.php'); 
	//$conn->debug = true;
	verifica ("login.php");


    $id = $_SESSION["idusuario_mvf_g"];
	$login = $_SESSION["loginusuario_mvf_g"];
	$msgErro = "É necessário preencher o campo: ";
	if ($_POST['acao']=='cadastrar')
	{	
		$senhac = trim($_POST['senhac']);
			if (empty($senhac)) $erro = $msgErro.'Confirmar senha';
		$senha = trim($_POST['senha']);
				if (empty($senha)) $erro = $msgErro.'Senha ';
		$atual = trim($_POST['atual']);
				if (empty($atual)) $erro = $msgErro.'Atual ';
		
		if ($senhac<>$senha) $erro = 'As senhas digitadas não são iguais!!';
		
		if (empty($erro))
		{
			$atualCript = geraSenha($atual, $login);
			
            $usuarios = DAOFactory::getUsuariosDAO()->queryAll("*","where id = $id and senha='$atualCript'");
            $usuario = $usuarios[0];
			if($usuario)
			{
				$login = $usuario->login;
				$novasenha = geraSenha($senha, $login);
				
                $usuario->id = $id;
                $usuario->senha = $novasenha;
                DAOFactory::getUsuariosDAO()->update($usuario);
				
                header("Location: mudarsenha.php?m=1");
			}
			else 
			{
				$erro = 'A senha atual está errada.';
			}
		}
	}	
	
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Mudar senha</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="estilo.css" rel="stylesheet" type="text/css">
<script src="webroot/js/jquery.js"></script>
<script src="webroot/js/jquery.pstrength-min.1.2.js"></script>
<script type="text/javascript">
$(function() {
    $('.password').pstrength();
});
</script>
<style type="text/css">
<!--
body {
	background-color: #EFEFEF;
}
-->
</style>
</head>

<body>
<form name="cadastro" action="mudarsenha.php" method="post">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr> 
                  <td colspan="3" valign="top"> 
                    <? if ($_GET['m']=='1')
{?>
                    <div align="center" class="text_bold_azul">
                      <b>Senha atualizada com sucesso.</b>
                    </div> 
                      <?
}
else { ?>
                      <input name="acao" type="hidden" value="cadastrar">
                    
                    <table width="100%" height="100" border="0" cellpadding="4" cellspacing="1">
                      <tr> 
                        <td height="7" colspan="2" class="text_bold_vermelho"><b><? echo $erro?></b></td>
                      </tr>
                      <tr> 
                        <td width="26%" class="text_padrao"><strong>Atual:</strong></td>
                        <td width="74%"><input name="atual" type="password" id="atual" size="20" maxlength="20"> 
                        </td>
                      </tr>
					  <tr> 
                        <td width="26%" class="text_padrao"><strong>Nova:</strong></td>
                        <td width="74%"><input name="senha" type="password" class="password" id="senha" size="20" maxlength="20"> 
                        </td>
                      </tr>
                      <tr> 
                        <td width="26%" class="text_padrao"><strong>Confirme:</strong></td>
                        <td width="74%"><input name="senhac" type="password" class="password" id="senhac" size="20" maxlength="20"> 
                        </td>
                      </tr>
                      <tr> 
                        <td width="26%" class="text_padrao">&nbsp;</td>
                        <td width="74%">
                        <input name="Enviar" type="submit" class="botao_branco" id="Enviar" value="Enviar" > 
                        </td>
                      </tr>
                    </table>
					
<? }?>					
					
                </td>
              </tr>
            </table>
</form>
</body>
</html>
