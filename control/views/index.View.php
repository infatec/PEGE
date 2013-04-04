<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html> <!--<![endif]-->
<head>
    <title>Painel de Controle - PEGE</title>

    <?php include("includes/header.php");?>
    <script type="text/javascript" src="theme/scripts/index.js"></script>

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
    <li>Principal</li>
</ul>
<div class="separator"></div>

<div class="heading-buttons">
    <h3 class="glyphicons display"><i></i> Dados Gerais</h3>
    <!--<div class="buttons pull-right">
        <a href="" class="btn btn-default btn-icon glyphicons edit"><i></i> Edit</a>
    </div>-->
    <div class="clearfix" style="clear: both;"></div>
</div>
<div class="separator"></div>

<div class="menubar">

    <ul>
        <li><a href="javascript:;">Escola Selecionada: </a></li>
        <li><a href="javascript:;" id="escola_selecionada">Nenhuma</a></li>
    </ul>

</div>

<div class="innerLR">
    <div class="row-fluid">
        <!--<div class="span4">
            <div class="widget widget-4">
                <div class="widget-head">
                    <h4 class="heading">Activity</h4>
                    <a href="" class="details pull-right">view all</a>
                </div>
                <div class="widget-body list">
                    <ul>
                        <li>
                            <span>Sales today</span>
                            <span class="count">&euro;5,900</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>-->
        <div class="span8">
            <div class="row-fluid">

                <div class="span4">
                    <a href="" class="widget-stats">
                        <span class="glyphicons user_add"><i></i></span>
                        <span class="txt"><strong>273</strong>Professores</span>
                        <div class="clearfix"></div>
                    </a>
                </div>

                <div class="span4">
                    <a href="" class="widget-stats">
                        <span class="glyphicons user_add"><i></i></span>
                        <span class="txt"><strong>17</strong>Turmas</span>
                        <div class="clearfix"></div>
                    </a>
                </div>
                <div class="span4">
                    <a href="" class="widget-stats">
                        <span class="glyphicons user_add"><i></i></span>
                        <span class="txt"><strong>35000</strong>Alunos</span>
                        <div class="clearfix"></div>
                    </a>
                </div>
                <div class="span4">
                    <a href="" class="widget-stats">
                        <span class="glyphicons user_add"><i></i></span>
                        <span class="txt"><strong>6000</strong>Servidores</span>
                        <div class="clearfix"></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="separator bottom"></div>

<span id="conteudo_meio">
    <div class="innerLR">
        <div class="row-fluid">
            <div class="span6">
                <div class="widget widget-4">
                    <div class="widget-head">
                        <h4 class="heading">Indice de repetência</h4>
                    </div>
                    <div class="widget-body">
                        <div id="pie" style="height: 220px;"></div>
                    </div>
                </div>
            </div>
            <div class="span6">
                <div class="widget widget-4">
                    <div class="widget-head">
                        <h4 class="heading">Indice de distorção idade-série</h4>
                    </div>
                    <div class="widget-body">
                        <div id="pie2" style="height: 220px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--
    <div class="innerLR">
        <div class="row-fluid">
            <div class="span6">
                <div class="widget widget-4">
                    <div class="widget-head">
                        <h4 class="heading">Taxa de evasão escolar</h4>
                    </div>
                    <div class="widget-body">
                        <div id="pie" style="height: 220px;"></div>
                    </div>
                </div>
            </div>

            <div class="span6">
                <div class="widget widget-4">
                    <div class="widget-head">
                        <h4 class="heading">Movimento Bimestral</h4>
                    </div>
                    <div class="widget-body">
                        <div id="pie2" style="height: 220px;"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>-->

    <div class="innerLR">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget widget-4">
                    <div class="widget-head">
                        <h4 class="heading">Taxa de evasão escolar</h4>
                    </div>
                    <div class="widget-body">
                        <div id="chart_donut" style="height: 250px;"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="innerLR">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget widget-4">
                    <div class="widget-head">
                        <h4 class="heading">Movimento Bimestral</h4>
                    </div>
                    <div class="widget-body">
                        <div id="chart_donut2" style="height: 250px;"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</span>
<!-- End Content -->
</div>
<!-- End Wrapper -->
</div>

</div>


<script>
var charts =
{
    // init all charts
    init: function()
    {
        // mark weekends on the website traffic main graph
        this.website_traffic_graph.options.markings = this.utility.weekendAreas;

        // init website traffic main graph
        this.website_traffic_graph.init();

        // init website traffic toolbar
        this.utility.website_traffic_toolbar();

        // init website traffic overview graph
        this.website_traffic_overview.init();

        // connect website traffic graphs
        this.utility.website_traffic_connect();

        // init traffic sources pie
        this.traffic_sources_pie.init();

        // init donut chart
        this.chart_donut.init();

        this.chart_donut2.init();
    },

    // utility class
    utility:
    {
        chartColors: [ "#37a6cd", "#444", "#777", "#999", "#DDD", "#EEE" ],
        chartBackgroundColors: ["#fff", "#fff"],

        applyStyle: function(that)
        {
            that.options.colors = charts.utility.chartColors;
            that.options.grid.backgroundColor = { colors: charts.utility.chartBackgroundColors };
            that.options.grid.borderColor = charts.utility.chartColors[0];
            that.options.grid.color = charts.utility.chartColors[0];
        },

        // connect website_traffic_graph with website_traffic_overview
        website_traffic_connect: function()
        {


        },

        website_traffic_toolbar: function()
        {
            // clear selection button
            $("#websiteTrafficClear").click(function()
            {
                charts.utility.website_traffic_clear();
            });


        },

        // clear selection on website traffic charts
        website_traffic_clear: function()
        {
            // disable clear button
            $('#websiteTrafficClear').prop('disabled', true);



            // clear selection on website traffic overview chart
            charts.website_traffic_overview.plot.clearSelection();
        },

        // helper for returning the weekends in a period
        weekendAreas: function(axes)
        {
            var markings = [];
            var d = new Date(axes.xaxis.min);
            // go to the first Saturday
            d.setUTCDate(d.getUTCDate() - ((d.getUTCDay() + 1) % 7))
            d.setUTCSeconds(0);
            d.setUTCMinutes(0);
            d.setUTCHours(0);
            var i = d.getTime();
            do {
                // when we don't set yaxis, the rectangle automatically
                // extends to infinity upwards and downwards
                markings.push({ xaxis: { from: i, to: i + 2 * 24 * 60 * 60 * 1000 } });
                i += 7 * 24 * 60 * 60 * 1000;
            } while (i < axes.xaxis.max);

            return markings;
        },

        // generate random number for charts
        randNum: function()
        {
            return (Math.floor( Math.random()* (1+40-20) ) ) + 20;
        }
    },

    // main website traffic chart
    website_traffic_graph:
    {
        // data
        d1: [[1360627200000, 2284],[1360713600000, 2392],[1360800000000, 3122],[1360886400000, 3422],[1360972800000, 2840],[1361059200000, 3361],[1361145600000, 2023],[1361232000000, 3601],[1361318400000, 2249],[1361404800000, 3958],[1361491200000, 3169],[1361577600000, 2638],[1361664000000, 3580],[1361750400000, 2388],[1361836800000, 3494],[1361923200000, 2934],[1362009600000, 2723],[1362096000000, 3243],[1362182400000, 3513],[1362268800000, 2599],[1362355200000, 2114],[1362441600000, 2360],[1362528000000, 3101],[1362614400000, 3411],[1362700800000, 2922],[1362787200000, 3740],[1362873600000, 3526],[1362960000000, 3290],[1363046400000, 3786],[1363132800000, 3846]],
        d2: [[1360627200000, 491],[1360713600000, 632],[1360800000000, 523],[1360886400000, 621],[1360972800000, 462],[1361059200000, 690],[1361145600000, 568],[1361232000000, 472],[1361318400000, 630],[1361404800000, 681],[1361491200000, 576],[1361577600000, 652],[1361664000000, 487],[1361750400000, 575],[1361836800000, 603],[1361923200000, 433],[1362009600000, 684],[1362096000000, 610],[1362182400000, 536],[1362268800000, 463],[1362355200000, 629],[1362441600000, 531],[1362528000000, 440],[1362614400000, 488],[1362700800000, 426],[1362787200000, 659],[1362873600000, 581],[1362960000000, 689],[1363046400000, 595],[1363132800000, 599]],

        // will hold the chart object
        plot: null,

        // chart options
        options:
        {
            xaxis: { mode: "time", tickLength: 5 },
            selection: { mode: "x" },
            grid: {
                markingsColor: "rgba(0,0,0, 0.02)",
                backgroundColor : { },
                borderColor : "#f1f1f1",
                borderWidth: 0,
                color : "#DA4C4C",
                hoverable : true,
                clickable: true
            },
            series : {
                lines : {
                    show : true,
                    fill: true
                },
                points : {
                    show : true
                }
            },
            colors: [],
            tooltip: true,
            tooltipOpts: {
                content: "%x: <strong>%y %s</strong>",
                dateFormat: "%y-%0m-%0d",
                shifts: {
                    x: 10,
                    y: 20
                },
                defaultTheme: false
            },
            legend: {
                show: true,
                noColumns: 2
            }
        },

        // initialize
        init: function()
        {
            // apply styling
            charts.utility.applyStyle(this);

            // first correct the timestamps - they are recorded as the daily
            // midnights in UTC+0100, but Flot always displays dates in UTC
            // so we have to add one hour to hit the midnights in the plot
            for (var i = 0; i < this.d1.length; ++i)
            {
                this.d1[i][0] += 60 * 60 * 1000;
                this.d2[i][0] += 60 * 60 * 1000;
            }


        }
    },

    // donut chart
    chart_donut:
    {
        // chart data
        data: [
            { label: "4º ano",  data: 10 },
            { label: "5º ano",  data: 15 },
            { label: "6º ano",  data: 15 },
            { label: "7º ano",  data: 20 },
            { label: "8º ano",  data: 30 },
            { label: "9º ano",  data: 10 }
        ],

        // will hold the chart object
        plot: null,

        // chart options
        options:
        {
            series: {
                pie: {
                    show: true,
                    innerRadius: 0.4,
                    highlight: {
                        opacity: 0.1
                    },
                    radius: 1,
                    stroke: {
                        color: '#fff',
                        width: 8
                    },
                    startAngle: 2,
                    combine: {
                        color: '#EEE',
                        threshold: 0.05
                    },
                    label: {
                        show: true,
                        radius: 1,
                        formatter: function(label, series){
                            return '<div class="label label-inverse">'+label+'&nbsp;'+Math.round(series.percent)+'%</div>';
                        }
                    }
                },
                grow: {	active: false}
            },
            legend:{show:false},
            grid: {
                hoverable: true,
                clickable: true,
                backgroundColor : { }
            },
            colors: [],
            tooltip: true,
            tooltipOpts: {
                content: "%s : %y.1"+"%",
                shifts: {
                    x: -30,
                    y: -50
                },
                defaultTheme: false
            }
        },

        // initialize
        init: function()
        {
            // apply styling
            charts.utility.applyStyle(this);

            this.plot = $.plot($("#chart_donut"), this.data, this.options);
        }
    },

    chart_donut2:
    {
        // chart data
        data: [
            { label: "Cursando Normalmente",  data: 48 },
            { label: "Desistentes",  data: 12 },
            { label: "Evadidos",  data: 20 },
            { label: "Transferidos",  data: 20 }
        ],

        // will hold the chart object
        plot: null,

        // chart options
        options:
        {
            series: {
                pie: {
                    show: true,
                    innerRadius: 0.4,
                    highlight: {
                        opacity: 0.1
                    },
                    radius: 1,
                    stroke: {
                        color: '#fff',
                        width: 8
                    },
                    startAngle: 2,
                    combine: {
                        color: '#EEE',
                        threshold: 0.05
                    },
                    label: {
                        show: true,
                        radius: 1,
                        formatter: function(label, series){
                            return '<div class="label label-inverse">'+label+'&nbsp;'+Math.round(series.percent)+'%</div>';
                        }
                    }
                },
                grow: {	active: false}
            },
            legend:{show:false},
            grid: {
                hoverable: true,
                clickable: true,
                backgroundColor : { }
            },
            colors: [],
            tooltip: true,
            tooltipOpts: {
                content: "%s : %y.1"+"%",
                shifts: {
                    x: -30,
                    y: -50
                },
                defaultTheme: false
            }
        },

        // initialize
        init: function()
        {
            // apply styling
            charts.utility.applyStyle(this);

            this.plot = $.plot($("#chart_donut2"), this.data, this.options);
        }
    },


    // website traffic overview chart
    website_traffic_overview:
    {
        // data
        d1: [[1360627200000, 2284],[1360713600000, 2392],[1360800000000, 3122],[1360886400000, 3422],[1360972800000, 2840],[1361059200000, 3361],[1361145600000, 2023],[1361232000000, 3601],[1361318400000, 2249],[1361404800000, 3958],[1361491200000, 3169],[1361577600000, 2638],[1361664000000, 3580],[1361750400000, 2388],[1361836800000, 3494],[1361923200000, 2934],[1362009600000, 2723],[1362096000000, 3243],[1362182400000, 3513],[1362268800000, 2599],[1362355200000, 2114],[1362441600000, 2360],[1362528000000, 3101],[1362614400000, 3411],[1362700800000, 2922],[1362787200000, 3740],[1362873600000, 3526],[1362960000000, 3290],[1363046400000, 3786],[1363132800000, 3846]],
        d2: [[1360627200000, 491],[1360713600000, 632],[1360800000000, 523],[1360886400000, 621],[1360972800000, 462],[1361059200000, 690],[1361145600000, 568],[1361232000000, 472],[1361318400000, 630],[1361404800000, 681],[1361491200000, 576],[1361577600000, 652],[1361664000000, 487],[1361750400000, 575],[1361836800000, 603],[1361923200000, 433],[1362009600000, 684],[1362096000000, 610],[1362182400000, 536],[1362268800000, 463],[1362355200000, 629],[1362441600000, 531],[1362528000000, 440],[1362614400000, 488],[1362700800000, 426],[1362787200000, 659],[1362873600000, 581],[1362960000000, 689],[1363046400000, 595],[1363132800000, 599]],

        // will hold the chart object
        plot: null,

        // chart options
        options:
        {
            series: {
                /*
                        bars: {
                            show: true,
                            lineWidth: 35,
                            align: "left"
                        },
                        */
                lines: { show: true, lineWidth: 1, fill: true },
                shadowSize: 0
            },
            xaxis: { ticks: [], mode: "time" },
            yaxis: { ticks: [], min: 0, autoscaleMargin: 0.1 },
            selection: { mode: "x" },
            grid: {
                borderColor : "#DA4C4C",
                borderWidth: 0,
                minBorderMargin: 0,
                axisMargin: 0,
                labelMargin: 0,
                margin: 0,
                backgroundColor : {}
            },
            colors: [],
            legend: {
                show: false
            }
        },

        // initialize
        init: function()
        {
            // apply styling
            charts.utility.applyStyle(this);

            // first correct the timestamps - they are recorded as the daily
            // midnights in UTC+0100, but Flot always displays dates in UTC
            // so we have to add one hour to hit the midnights in the plot
            for (var i = 0; i < this.d1.length; ++i)
            {
                this.d1[i][0] += 60 * 60 * 1000;
                this.d2[i][0] += 60 * 60 * 1000;
            }


        }
    },

    traffic_sources_pie:
    {
        // data
        data: [
            { label: "5º ano",  data: 15 },
            { label: "6º ano",  data: 35 },
            { label: "7º ano",  data: 10 },
            { label: "8º ano",  data: 20 },
            { label: "9º ano",  data: 20 }
        ],

        data2: [
            { label: "5º ano",  data: 25 },
            { label: "6º ano",  data: 25 },
            { label: "7º ano",  data: 30 },
            { label: "8º ano",  data: 10 },
            { label: "9º ano",  data: 10 }
        ],

        // chart object
        plot: null,
        plot2: null,

        // chart options
        options: {
            series: {
                pie: {
                    show: true,
                    redraw: true,
                    radius: 1,
                    tilt: 0.6,
                    label: {
                        show: true,
                        radius: 1,
                        formatter: function(label, series){
                            return '<div style="font-size:8pt;text-align:center;padding:5px;color:#fff;">'+Math.round(series.percent)+'%</div>';
                        },
                        background: { opacity: 0.8 }
                    }
                }
            },
            legend: {
                show: true
            },
            colors: [],
            grid: { hoverable: true },
            tooltip: true,
            tooltipOpts: {
                content: "<strong>%y% %s</strong>",
                dateFormat: "%y-%0m-%0d",
                shifts: {
                    x: 10,
                    y: 20
                },
                defaultTheme: false
            }
        },

        // initialize
        init: function()
        {
            // apply styling
            charts.utility.applyStyle(this);

            this.plot = $.plot($("#pie"), this.data, this.options);
            this.plot2 = $.plot($("#pie2"), this.data2, this.options);
        }
    },

    // traffic sources dataTables
    // we are now using Google Charts instead of Flot
    traffic_sources_dataTables:
    {
        // tables data
        data:
        {
            tableSources:
            {
                data: null,
                init: function()
                {
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Source');
                    data.addColumn('string', 'Medium');
                    data.addColumn('number', 'Visits');
                    data.addColumn('number', 'Pg.Views');
                    data.addColumn('string', 'avg.time');

                    data.addRows(7);
                    data.setCell(0, 0, 'google', null, {'style': 'text-align: center;'});
                    data.setCell(0, 1, 'organic', null, {'style': 'text-align: center;'});
                    data.setCell(0, 2, 89, null, {'style': 'text-align: center;'});
                    data.setCell(0, 3, 299, null, {'style': 'text-align: center;'});
                    data.setCell(0, 4, '00:01:48', null, {'style': 'text-align: center;'});
                    data.setCell(1, 0, '(direct)', null, {'style': 'text-align: center;'});
                    data.setCell(1, 1, '(none)', null, {'style': 'text-align: center;'});
                    data.setCell(1, 2, 14, null, {'style': 'text-align: center;'});
                    data.setCell(1, 3, 34, null, {'style': 'text-align: center;'});
                    data.setCell(1, 4, '00:03:15', null, {'style': 'text-align: center;'});
                    data.setCell(2, 0, 'yahoo', null, {'style': 'text-align: center;'});
                    data.setCell(2, 1, 'organic', null, {'style': 'text-align: center;'});
                    data.setCell(2, 2, 3, null, {'style': 'text-align: center;'});
                    data.setCell(2, 3, 3, null, {'style': 'text-align: center;'});
                    data.setCell(2, 4, '00:00:00', null, {'style': 'text-align: center;'});
                    data.setCell(3, 0, 'ask', null, {'style': 'text-align: center;'});
                    data.setCell(3, 1, 'organic', null, {'style': 'text-align: center;'});
                    data.setCell(3, 2, 1, null, {'style': 'text-align: center;'});
                    data.setCell(3, 3, 3, null, {'style': 'text-align: center;'});
                    data.setCell(3, 4, '00:01:34', null, {'style': 'text-align: center;'});
                    data.setCell(4, 0, 'bing', null, {'style': 'text-align: center;'});
                    data.setCell(4, 1, 'organic', null, {'style': 'text-align: center;'});
                    data.setCell(4, 2, 1, null, {'style': 'text-align: center;'});
                    data.setCell(4, 3, 1, null, {'style': 'text-align: center;'});
                    data.setCell(4, 4, '00:00:00', null, {'style': 'text-align: center;'});
                    data.setCell(5, 0, 'conduit', null, {'style': 'text-align: center;'});
                    data.setCell(5, 1, 'organic', null, {'style': 'text-align: center;'});
                    data.setCell(5, 2, 1, null, {'style': 'text-align: center;'});
                    data.setCell(5, 3, 1, null, {'style': 'text-align: center;'});
                    data.setCell(5, 4, '00:00:00', null, {'style': 'text-align: center;'});
                    data.setCell(6, 0, 'google', null, {'style': 'text-align: center;'});
                    data.setCell(6, 1, 'cpc', null, {'style': 'text-align: center;'});
                    data.setCell(6, 2, 1, null, {'style': 'text-align: center;'});
                    data.setCell(6, 3, 1, null, {'style': 'text-align: center;'});
                    data.setCell(6, 4, '00:00:00', null, {'style': 'text-align: center;'});

                    this.data = data;
                    return data;
                }
            },
            tableReffering:
            {
                data: null,
                init: function()
                {
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Source');
                    data.addColumn('number', 'Pg.Views');
                    data.addColumn('string', 'avg.time');
                    data.addColumn('string', 'Exits');

                    data.addRows(6);
                    data.setCell(0, 0, 'google.ro');
                    data.setCell(0, 1, 14, null, {'style': 'text-align: center;'});
                    data.setCell(0, 2, '00:05:51', null, {'style': 'text-align: center;'});
                    data.setCell(0, 3, '3', null, {'style': 'text-align: center;'});
                    data.setCell(1, 0, 'search.sweetim.com');
                    data.setCell(1, 1, 5, null, {'style': 'text-align: center;'});
                    data.setCell(1, 2, '00:03:29', null, {'style': 'text-align: center;'});
                    data.setCell(1, 3, '1', null, {'style': 'text-align: center;'});
                    data.setCell(2, 0, 'start.funmoods.com');
                    data.setCell(2, 1, 5, null, {'style': 'text-align: center;'});
                    data.setCell(2, 2, '00:01:02', null, {'style': 'text-align: center;'});
                    data.setCell(2, 3, '1', null, {'style': 'text-align: center;'});
                    data.setCell(3, 0, 'google.md');
                    data.setCell(3, 1, 2, null, {'style': 'text-align: center;'});
                    data.setCell(3, 2, '00:03:56', null, {'style': 'text-align: center;'});
                    data.setCell(3, 3, '1', null, {'style': 'text-align: center;'});
                    data.setCell(4, 0, 'searchmobileonline.com');
                    data.setCell(4, 1, 2, null, {'style': 'text-align: center;'});
                    data.setCell(4, 2, '00:02:21', null, {'style': 'text-align: center;'});
                    data.setCell(4, 3, '1', null, {'style': 'text-align: center;'});
                    data.setCell(5, 0, 'google.com');
                    data.setCell(5, 1, 1, null, {'style': 'text-align: center;'});
                    data.setCell(5, 2, '00:00:00', null, {'style': 'text-align: center;'});
                    data.setCell(5, 3, '1', null, {'style': 'text-align: center;'});

                    this.data = data;
                    return data;
                }
            }
        },

        // chart
        chart:
        {
            tableSources: null,
            tableReffering: null
        },

        // options
        options:
        {
            tableSources:
            {
                page: 'enable',
                pageSize: 6,
                allowHtml: true,
                cssClassNames: {
                    headerRow: 'tableHeaderRow',
                    tableRow: 'tableRow',
                    selectedTableRow: 'selectedTableRow',
                    hoverTableRow: 'hoverTableRow'
                },
                width: '100%',
                alternatingRowStyle: false,
                pagingSymbols: { prev: '<span class="btn btn-inverse">prev</btn>', next: '<span class="btn btn-inverse">next</span>' }
            },

            tableReffering:
            {
                page: 'enable',
                pageSize: 6,
                allowHtml: true,
                cssClassNames: {
                    headerRow: 'tableHeaderRow',
                    tableRow: 'tableRow',
                    selectedTableRow: 'selectedTableRow',
                    hoverTableRow: 'hoverTableRow'
                },
                width: '100%',
                alternatingRowStyle: false,
                pagingSymbols: { prev: '<span class="btn btn-inverse">prev</btn>', next: '<span class="btn btn-inverse">next</span>' }
            }
        },

        // initialize
        init: function()
        {
            // data
            charts.traffic_sources_dataTables.data.tableSources.init();
            charts.traffic_sources_dataTables.data.tableReffering.init();

            // charts
            charts.traffic_sources_dataTables.drawTableSources();
            charts.traffic_sources_dataTables.drawTableReffering();
        },

        // draw Traffic Sources Table
        drawTableSources: function()
        {
            this.chart.tableSources = new google.visualization.Table(document.getElementById('dataTableSources'));
            this.chart.tableSources.draw(this.data.tableSources.data, this.options.tableSources);
        },

        // draw Refferals Table
        drawTableReffering: function()
        {
            this.chart.tableReffering = new google.visualization.Table(document.getElementById('dataTableReffering'));
            this.chart.tableReffering.draw(this.data.tableReffering.data, this.options.tableReffering);
        }
    }
};

$(function()
{
    // initialize charts
    charts.init();
});
</script>



<script>
    //Load the Visualization API and the piechart package.
    google.load('visualization', '1.0', {'packages':['table', 'corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(charts.traffic_sources_dataTables.init);
</script>

</body>
</html>