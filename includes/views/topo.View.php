<meta http-equiv="Cache-Control" content="No-Cache">
<meta http-equiv="Pragma"        content="No-Cache">
<meta http-equiv="Expires"       content="0"> 

<link href="<?=URL.'/webroot/css/'?>thickbox.css" rel="stylesheet" type="text/css">
<script src="<?=URL.'/webroot/js/'?>thickbox-compressed.js"></script>

<script type="text/javascript" src="<?=URL.'/webroot/js/'?>jquery.blockUI.js"></script>

<link href="<?=URL.'/webroot/css/'?>jquery.toastmessage.css" rel="stylesheet">
<script type="text/javascript" src="<?=URL.'/webroot/js/'?>jquery.toastmessage.js"></script>

<script src="<?=URL.'/webroot/js/'?>jquery.maskedinput.min.js"></script>

<link href="<?=URL.'/webroot/css/'?>jquery-ui-1.10.1.custom.css" rel="stylesheet">
<script src="<?=URL.'/webroot/js/'?>jquery-ui-1.8.7.custom.min.js"></script>


<link href="<?=URL.'/webroot/css/'?>multi-select.css" rel="stylesheet" type="text/css">
<script src="<?=URL.'/webroot/js/'?>jquery.multi-select.js" type="text/javascript"></script>
<script src="<?=URL.'/webroot/js/'?>jquery.quicksearch.js" type="text/javascript"></script>

<link href="<?=URL.'/webroot/js/'?>kendo/styles/kendo.common.min.css" rel="stylesheet" />
<link href="<?=URL.'/webroot/js/'?>kendo/styles/kendo.default.min.css" rel="stylesheet" />

<?
if($estaNaRaiz) $js_menu ="jqueryslidemenu_raiz.js";
else $js_menu ="jqueryslidemenu.js";
?>

<link href="<?=URL.'/webroot/css/'?>jqueryslidemenu.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=URL.'/webroot/js/'?><?=$js_menu?>"></script>


<? if(!$tirar_topo):?>    
    <div id="mainTop">
        <img src="<?=URL.'/'?>webroot/img_sistema/logo_login.png" style="float: left;margin-top:5px"/>
        
        <div id="profile_info">
            <ul>
                <li class="sair"><a href="<?=URL.'/'?>login.php" class="endturn"></a></li>
                <li class="imagem">
                <a href="<?=URL.'/'?>modulos/historico_acesso"><img src="<?=URL.'/'?>webroot/img_sistema/avatar.png"/></a>
                </li>
                <!--<li class="empresa" style="color: white;"><b>Escola: Escola Municipal do estado</b></li>-->
                <li>Usuário: <span class="usuario"><?=$_SESSION["nomeusuario_mvf_g"]?></span></li>
                <!--<li class="alterarsenha"><a  href="<?=URL.'/'?>parametro.php?keepThis=true&TB_iframe=true&height=220&width=480" title="Parâmetros do sistema" class="thickbox">Parâmetros do Sistema</a></li>-->
                <li class="alterarsenha"><a  href="<?=URL.'/'?>mudarsenha.php?keepThis=true&TB_iframe=true&height=250&width=300" title="Alterar senha" class="thickbox">Alterar Senha</a></li>
                <li class="databrasileira"><?=dataBrasileira()?></li>
            </ul>            
        </div>
    </div>
    
    <div id="myslidemenu" class="jqueryslidemenu" >
      <?=$menu?>
      <br style="clear: left" />
    </div>
<? endif; ?>

<div id="splash" style="display: none;">
    <img src="<?=URL.'/'?>webroot/img_sistema/loading.gif" alt="Por favor, aguarde..." />
    <h1 style="background: none; color: #fff;">Processando</h1>
    <p>Por favor, aguarde...</p>
</div>

<script>
    $(document).ready(function()
    {
        $('input[type="text"]').addClass('k-textbox');
        //$('select').addClass('select_form');
        $('input[type="button"]').addClass('bt');
        $('input[type="submit"]').addClass('bt');
        $('button').addClass('bt');

        $(".data").mask("99/99/9999");
        $(".telefone").mask("(99)9999-9999");
        $(".cpf").mask("999.999.999-99");
        $(".cep").mask("99999-999");
        $(".hora").mask("99:99");

        $( ".datepicker" ).datepicker({
            dateFormat: 'dd/mm/yy',
            dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
            dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
            dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
            nextText: 'Próximo',
            prevText: 'Anterior'
        });


    });
    //messages para o sistema

    //$().toastmessage('showNoticeToast', 'some message here');
    //$().toastmessage('showSuccessToast', "some message here");
    //$().toastmessage('showWarningToast', "some message here");
    //$().toastmessage('showErrorToast', "some message here");
</script>
