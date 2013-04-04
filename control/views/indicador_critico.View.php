<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html> <!--<![endif]-->
<head>
    <title>Painel de Controle - PEGE</title>

    <?php include("includes/header.php");?>

</head>
<body>

<!-- Start Content -->
<div class="container-fluid fixed">

    <div class="navbar main">
        <?php include("includes/topo.php");?>
    </div>

    <div id="wrapper">
        <div id="menu" class="hidden-phone">
            <?php include("includes/menu.php");?>
        </div>
        <div id="content">
            <ul class="breadcrumb">
                <li><a href="index.php" class="glyphicons home"><i></i>PEGE</a></li>
                <li class="divider"></li>
                <li>Indicador Critíco</li>
            </ul>
            <div class="separator"></div>

            <div class="heading-buttons">
                <h3 class="glyphicons show_thumbnails"><i></i> Indicador Crítico</h3>

                <div class="clearfix" style="clear: both;"></div>
            </div>
            <div class="separator"></div>

            <div class="menubar" style="height: 10px;">

            </div>


            <div class="innerLR">

                <div class="widget widget-gray widget-body-white">
                    <div class="widget-head"><h4 class="heading">Legenda</h4></div>
                    <div class="widget-body" style="padding: 10px 0;">
                        <table class="table table-condensed" style="width: 307px;">

                            <tbody>
                            <tr>
                                <td class="center"><img src="bola_1.png" width="20" height="20"> </td>
                                <td>Bom</td>

                                <td class="center"><img src="bola_2.png" width="20" height="20"> </td>
                                <td>Avaliar</td>

                                <td class="center"><img src="bola_3.png" width="20" height="20"> </td>
                                <td>Crítico</td>
                            </tr>
                            <tr>
                                <td colspan="6"></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>

                    <div class="widget-body" style="padding: 5px 0;">
                        <table class="table table-condensed" style="width: 550px;">

                            <tbody>
                            <tr>
                                <td class="center"><b>IR -</b></td>
                                <td>Indice de Repetência</td>

                                <td class="center"><b>DIS -</b></td>
                                <td>Distorção idade-ano</td>

                                <td class="center"><b>EE -</b></td>
                                <td>Evasão Escolar</td>
                            </tr>
                            <tr>
                                <td colspan="6"></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="innerLR">
                <div class="widget widget-gray widget-body-white">
                    <div class="widget-head">
                        <h4 class="heading">Escolas</h4>
                    </div>
                    <div class="widget-body" style="padding: 10px 0;">
                        <table class="dynamicTable table table-striped table-bordered table-primary table-condensed">
                            <thead>
                            <tr>
                                <th style="width: 350px;">Escola</th>
                                <th style="width: 80px;">Inep</th>
                                <th  style="width: 20px;">IR</th>
                                <th  style="width: 20px;"> DIS</th>
                                <th  style="width: 20px;">EE</th>
                            </tr>
                            </thead>

                            <tbody>
                            <? foreach($escolas as $escola): ?>
                                <tr class="gradeC">
                                    <td><?=$escola->nome?></td>
                                    <td><?=$escola->inep?></td>
                                    <td><img src="bola_<?=rand(1,3)?>.png" width="20" height="20"> </td>
                                    <td class="center"><img src="bola_<?=rand(1,3)?>.png" width="20" height="20"> </td>
                                    <td class="center"><img src="bola_<?=rand(1,3)?>.png" width="20" height="20"> </td>
                                </tr>
                            <? endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="separator bottom"></div>

            <!-- End Content -->
        </div>
        <!-- End Wrapper -->
    </div>

</div>


</body>
</html>