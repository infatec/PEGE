<!-- Meta -->
<meta charset="iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">

<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />

<!-- Bootstrap Extended -->
<link href="bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
<link href="bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap-responsive.min.css" rel="stylesheet">
<link href="bootstrap/extend/bootstrap-wysihtml5/css/bootstrap-wysihtml5-0.0.2.css" rel="stylesheet">

<!-- Select2 -->
<link rel="stylesheet" href="theme/scripts/select2/select2.css"/>

<!-- Notyfy -->
<link rel="stylesheet" href="theme/scripts/notyfy/jquery.notyfy.css"/>
<link rel="stylesheet" href="theme/scripts/notyfy/themes/default.css"/>

<!-- JQueryUI v1.9.2 -->
<link rel="stylesheet" href="theme/scripts/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.min.css" />

<!-- Glyphicons -->
<link rel="stylesheet" href="theme/css/glyphicons.css" />

<!-- Bootstrap Extended -->
<link rel="stylesheet" href="bootstrap/extend/bootstrap-select/bootstrap-select.css" />
<link rel="stylesheet" href="bootstrap/extend/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />

<!-- Uniform -->
<link rel="stylesheet" media="screen" href="theme/scripts/pixelmatrix-uniform/css/uniform.default.css" />

<!-- JQuery v1.8.2 -->
<script src="theme/scripts/jquery-1.8.2.min.js"></script>

<!-- Modernizr -->
<script src="theme/scripts/modernizr.custom.76094.js"></script>

<!-- MiniColors -->
<link rel="stylesheet" media="screen" href="theme/scripts/jquery-miniColors/jquery.miniColors.css" />

<!-- Theme -->
<link rel="stylesheet" href="theme/css/style.min.css?1363272390" />

<!-- LESS 2 CSS -->
<script src="theme/scripts/less-1.3.3.min.js"></script>


<!--[if IE]><script type="text/javascript" src="theme/scripts/excanvas/excanvas.js"></script><![endif]-->
<!--[if lt IE 8]><script type="text/javascript" src="theme/scripts/json2.js"></script><![endif]-->


<!-- JQueryUI v1.9.2 -->
<script src="theme/scripts/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script>

<!-- JQueryUI Touch Punch -->
<!-- small hack that enables the use of touch events on sites using the jQuery UI user interface library -->
<script src="theme/scripts/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- MiniColors -->
<script src="theme/scripts/jquery-miniColors/jquery.miniColors.js"></script>

<!-- Select2 -->
<script src="theme/scripts/select2/select2.js"></script>

<script src="theme/scripts/jquery.cookie.js"></script>
<script src="theme/scripts/themer.js"></script>

<!-- Notyfy -->
<script type="text/javascript" src="theme/scripts/notyfy/jquery.notyfy.js"></script>


<script type="text/javascript" src="https://www.google.com/jsapi"></script>


<!-- Sparkline -->
<script src="theme/scripts/jquery.sparkline.js" type="text/javascript"></script>


<script type="text/javascript">
    function genSparklines()
    {
        if ($('.sparkline').length)
        {
            $.each($('.sparkline'), function(k,v)
            {
                var data = [[1, 3+charts.utility.randNum()], [2, 5+charts.utility.randNum()], [3, 8+charts.utility.randNum()], [4, 11+charts.utility.randNum()],[5, 14+charts.utility.randNum()],[6, 17+charts.utility.randNum()],[7, 20+charts.utility.randNum()], [8, 15+charts.utility.randNum()], [9, 18+charts.utility.randNum()], [10, 22+charts.utility.randNum()]];
                $(v).sparkline(data,
                        {
                            width: 100,
                            height: 28,
                            lineColor: themerPrimaryColor,
                            fillColor: '#fafafa',
                            spotColor: '#467e8c',
                            maxSpotColor: '#9FC569',
                            minSpotColor: '#ED7A53',
                            spotRadius: 3,
                            lineWidth: 2
                        });
            });
        }
    }
    $(function()
    {
        $( "#suggest_escola" ).autocomplete({
            source: "ajax/suggest_escola.php",
            minLength: 2,
            select: function( event, ui ) {
                $(this).attr('cod_escola',ui.item.id);
                $("#cod_escola").val(ui.item.id);
                $("#escola_selecionada").text(ui.item.label);

            }
        });

        $('#suggest_escola').blur(function(){
            if($(this).attr('cod_escola') && !$(this).val())
                $(this).attr('cod_escola','');

            if(!$(this).attr('cod_escola'))
                $(this).val('');

        });

        genSparklines();
    });
</script>

<!--  Flot (Charts) JS -->
<script src="theme/scripts/flot/jquery.flot.js" type="text/javascript"></script>
<script src="theme/scripts/flot/jquery.flot.pie.js" type="text/javascript"></script>
<script src="theme/scripts/flot/jquery.flot.tooltip.js" type="text/javascript"></script>
<script src="theme/scripts/flot/jquery.flot.selection.js"></script>
<script src="theme/scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
<script src="theme/scripts/flot/jquery.flot.orderBars.js" type="text/javascript"></script>


<!-- Resize Script -->
<script src="theme/scripts/jquery.ba-resize.js"></script>

<!-- Uniform -->
<script src="theme/scripts/pixelmatrix-uniform/jquery.uniform.min.js"></script>

<!-- Bootstrap Script -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- Bootstrap Extended -->
<script src="bootstrap/extend/bootstrap-select/bootstrap-select.js"></script>
<script src="bootstrap/extend/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
<script src="bootstrap/extend/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js"></script>
<script src="bootstrap/extend/jasny-bootstrap/js/jasny-bootstrap.min.js" type="text/javascript"></script>
<script src="bootstrap/extend/jasny-bootstrap/js/bootstrap-fileupload.js" type="text/javascript"></script>
<script src="bootstrap/extend/bootbox.js" type="text/javascript"></script>
<script src="bootstrap/extend/bootstrap-wysihtml5/js/wysihtml5-0.3.0_rc2.min.js" type="text/javascript"></script>
<script src="bootstrap/extend/bootstrap-wysihtml5/js/bootstrap-wysihtml5-0.0.2.js" type="text/javascript"></script>

<!-- Custom Onload Script -->
<script src="theme/scripts/load.js"></script>
<script src="../webroot/js/funcoes.js"></script>
<script src="../webroot/js/jquery.blockUI.js"></script>

<!-- DataTables -->
<script src="theme/scripts/DataTables/media/js/jquery.dataTables.js"></script>
<script src="theme/scripts/DataTables/media/js/DT_bootstrap.js"></script>

<!-- DataTables -->
<link rel="stylesheet" media="screen" href="theme/scripts/DataTables/media/css/DT_bootstrap.css" />


<!-- Themer -->
<script>
    var themerPrimaryColor = '#DA4C4C';
</script>
