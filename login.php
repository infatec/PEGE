<?php
    include("config/appConfig.php");
    include(DOMAIN_PATH."functions/funcoes.inc.php");
    include(DOMAIN_PATH."lib/Model.php");

    #### CONTROLLER  #########
    if($_POST["login"])
    {
        include(DOMAIN_PATH."models/include_conexao.php");
        
        require_once(DOMAIN_PATH.'models/class/dao/UsuariosDAO.class.php');
        require_once(DOMAIN_PATH.'models/class/dto/Usuario.class.php');
        require_once(DOMAIN_PATH.'models/class/mysql/UsuariosDAO.class.php');
        require_once(DOMAIN_PATH.'models/class/mysql/ext/UsuariosExtDAO.class.php'); 
        $login = $_POST["login"]; 
        $senha = $_POST["senha"]; 
        $senha_cript = geraSenha($senha,$login);
        if(DAOFactory::getUsuariosDAO()->logar($login,$senha_cript)){
            redireciona("index.php");
        }
        else $erro = '<p class="normal_text" style="background-color:#FF5959 !important; font-weight:bold;">Usuário ou senha inválidos, por favor tente novamente.</p>';
    }
    ###################
    
    ##### VIEW  ###############
      
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$config["tituloPagina"]?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="webroot/css/bootstrap.min.css" />
<link rel="stylesheet" href="webroot/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="webroot/css/maruti-login.css" />


</head>

<body>
    <div id="loginbox">
        <form id="loginform" class="form-vertical" action="" method="post" onSubmit="return validar(this)">

            <div class="control-group normal_text"> <h3><img src="titulo2.png" alt="Logo" /></h3></div>

            <?=$erro?>

            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on"><i class="icon-user"></i></span><input type="text" id="usuario" name="login" class="" placeholder="Usuário" />
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on"><i class="icon-lock"></i></span><input id="senha" name="senha" type="password" placeholder="Senha" />
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <img src="logo-pequena.png" alt="Logo" />
                <span class="pull-right" style="margin-top:17px;"><input type="submit" class="btn btn-success" value="Logar" style="height:28px;width:80px;"  /></span>
            </div>
        </form>

    </div>

    <script src="webroot/js/jquery.min.js"></script>
    <script src="webroot/js/maruti.login.js"></script>

</body>

</html>
