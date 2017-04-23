
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Green Arrow - Crime Data Streaming</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- menu icon -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="./js/jquery.csv.js"></script>
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <link href="http://code.jquery.com/ui/1.9.0/themes/cupertino/jquery-ui.css" rel="stylesheet" />
    <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
    <script></script>
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</head>

<body>

<div id="wrapper">

    <!-- Sidebar -->
    <?php
        include './php/navbar/sidebar.php';
    ?>
    <!-- /#sidebar-wrapper -->

    <!-- #navbar wrapper -->
    <?php
        include './php/navbar/topnavbar.php';
    ?>
    <!-- /#navbar wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">

            <div id="title" align="center">
                <h3>Crime in the United States
                    <span class="label label-default">by State, 2015</span>
                </h3>
                <a href="https://ucr.fbi.gov/crime-in-the-u.s/2015/crime-in-the-u.s.-2015/tables/table-5"> Data Source </a>
                <br/><br/><br/>
            </div>

            <div class="row">
                <div class="col-lg-12">

                    <!-- dashboard -->
                    <div id="dashboard" align="center">
                        <script type="text/javascript">

                            jQuery.get('dataset/table_5_crime_in_the_united_states_by_state_2015.csv', function(data) {
                                dataStr = new String(data);

                                // save all data into "arr"
                                var arr = new Array(53);
                                var dataLines = dataStr.split("\n");
                                for (i = 0; i < 53; i++) {
                                    arr[i] = dataLines[i].split(",");
                                }

                                // draw google chart
                                google.charts.load('current', {'packages':['corechart', 'controls']});
                                google.charts.setOnLoadCallback(drawStuff);

                                function drawStuff() {

                                    var dashboard = new google.visualization.Dashboard(
                                        document.getElementById('programmatic_dashboard_div'));
                                    var dashboard1 = new google.visualization.Dashboard(
                                        document.getElementById('programmatic_dashboard_div1'));

                                    // We omit "var" so that programmaticSlider is visible to changeRange.
                                    var programmaticSlider = new google.visualization.ControlWrapper({
                                        'controlType': 'NumberRangeFilter',
                                        'containerId': 'programmatic_control_div',
                                        'options': {
                                            'filterColumnLabel': 'Polulation',
                                            'ui': {'labelStacking': 'vertical'}
                                        }
                                    });
                                    var programmaticSlider1 = new google.visualization.ControlWrapper({
                                        'controlType': 'NumberRangeFilter',
                                        'containerId': 'programmatic_control_div1',
                                        'options': {
                                            'filterColumnLabel': 'ViolentCrime1',
                                            'ui': {'labelStacking': 'vertical'}
                                        }
                                    });

                                    var programmaticChart  = new google.visualization.ChartWrapper({
                                        'chartType': 'PieChart',
                                        'containerId': 'programmatic_chart_div',
                                        'options': {
                                            'width': 600,
                                            'height': 600,
                                            'legend': 'none',
                                            'is3D': true,
                                            'chartArea': {'left': 15, 'top': 15, 'right': 15, 'bottom': 0},
                                            'pieSliceText': 'value',
                                            'animation':{
                                                'duration': 1000,
                                                'easing': 'out'
                                            }
                                        }
                                    });
                                    var programmaticChart1  = new google.visualization.ChartWrapper({
                                        'chartType': 'PieChart',
                                        'containerId': 'programmatic_chart_div1',
                                        'options': {
                                            'width': 600,
                                            'height': 600,
                                            'legend': 'none',
                                            'is3D': true,
                                            'chartArea': {'left': 15, 'top': 15, 'right': 15, 'bottom': 0},
                                            'pieSliceText': 'value',
                                            'animation':{
                                                'duration': 1000,
                                                'easing': 'out'
                                            }
                                        }
                                    });

                                    // Some raw data (not necessarily accurate)
                                    var data0 = [['Name', 'Polulation'],
                                        [arr[1][0], parseInt(arr[1][1])],
                                        [arr[2][0], parseInt(arr[2][1])],
                                        [arr[3][0], parseInt(arr[3][1])],
                                        [arr[4][0], parseInt(arr[4][1])],
                                        [arr[5][0], parseInt(arr[5][1])],
                                        [arr[6][0], parseInt(arr[6][1])],
                                        [arr[7][0], parseInt(arr[7][1])],
                                        [arr[8][0], parseInt(arr[8][1])],
                                        [arr[9][0], parseInt(arr[9][1])],
                                        [arr[10][0], parseInt(arr[10][1])],
                                        [arr[11][0], parseInt(arr[11][1])],
                                        [arr[12][0], parseInt(arr[12][1])],
                                        [arr[13][0], parseInt(arr[13][1])],
                                        [arr[14][0], parseInt(arr[14][1])],
                                        [arr[15][0], parseInt(arr[15][1])],
                                        [arr[16][0], parseInt(arr[16][1])],
                                        [arr[17][0], parseInt(arr[17][1])],
                                        [arr[18][0], parseInt(arr[18][1])],
                                        [arr[19][0], parseInt(arr[19][1])],
                                        [arr[20][0], parseInt(arr[20][1])],
                                        [arr[21][0], parseInt(arr[21][1])],
                                        [arr[22][0], parseInt(arr[22][1])],
                                        [arr[23][0], parseInt(arr[23][1])],
                                        [arr[24][0], parseInt(arr[24][1])],
                                        [arr[25][0], parseInt(arr[25][1])],
                                        [arr[26][0], parseInt(arr[26][1])],
                                        [arr[27][0], parseInt(arr[27][1])],
                                        [arr[28][0], parseInt(arr[28][1])],
                                        [arr[29][0], parseInt(arr[29][1])],
                                        [arr[30][0], parseInt(arr[30][1])],
                                        [arr[31][0], parseInt(arr[31][1])],
                                        [arr[32][0], parseInt(arr[32][1])],
                                        [arr[33][0], parseInt(arr[33][1])],
                                        [arr[34][0], parseInt(arr[34][1])],
                                        [arr[35][0], parseInt(arr[35][1])],
                                        [arr[36][0], parseInt(arr[36][1])],
                                        [arr[37][0], parseInt(arr[37][1])],
                                        [arr[38][0], parseInt(arr[38][1])],
                                        [arr[39][0], parseInt(arr[39][1])],
                                        [arr[40][0], parseInt(arr[40][1])],
                                        [arr[41][0], parseInt(arr[41][1])],
                                        [arr[42][0], parseInt(arr[42][1])],
                                        [arr[43][0], parseInt(arr[43][1])],
                                        [arr[44][0], parseInt(arr[44][1])],
                                        [arr[45][0], parseInt(arr[45][1])],
                                        [arr[46][0], parseInt(arr[46][1])],
                                        [arr[47][0], parseInt(arr[47][1])],
                                        [arr[48][0], parseInt(arr[48][1])],
                                        [arr[49][0], parseInt(arr[49][1])],
                                        [arr[50][0], parseInt(arr[50][1])],
                                        [arr[51][0], parseInt(arr[51][1])],
                                        [arr[52][0], parseInt(arr[52][1])]
                                    ];
                                    var data1 = [['Name', 'ViolentCrime1'],
                                        [arr[1][0], parseInt(arr[1][2])],
                                        [arr[2][0], parseInt(arr[2][2])],
                                        [arr[3][0], parseInt(arr[3][2])],
                                        [arr[4][0], parseInt(arr[4][2])],
                                        [arr[5][0], parseInt(arr[5][2])],
                                        [arr[6][0], parseInt(arr[6][2])],
                                        [arr[7][0], parseInt(arr[7][2])],
                                        [arr[8][0], parseInt(arr[8][2])],
                                        [arr[9][0], parseInt(arr[9][2])],
                                        [arr[10][0], parseInt(arr[10][2])],
                                        [arr[11][0], parseInt(arr[11][2])],
                                        [arr[12][0], parseInt(arr[12][2])],
                                        [arr[13][0], parseInt(arr[13][2])],
                                        [arr[14][0], parseInt(arr[14][2])],
                                        [arr[15][0], parseInt(arr[15][2])],
                                        [arr[16][0], parseInt(arr[16][2])],
                                        [arr[17][0], parseInt(arr[17][2])],
                                        [arr[18][0], parseInt(arr[18][2])],
                                        [arr[19][0], parseInt(arr[19][2])],
                                        [arr[20][0], parseInt(arr[20][2])],
                                        [arr[21][0], parseInt(arr[21][2])],
                                        [arr[22][0], parseInt(arr[22][2])],
                                        [arr[23][0], parseInt(arr[23][2])],
                                        [arr[24][0], parseInt(arr[24][2])],
                                        [arr[25][0], parseInt(arr[25][2])],
                                        [arr[26][0], parseInt(arr[26][2])],
                                        [arr[27][0], parseInt(arr[27][2])],
                                        [arr[28][0], parseInt(arr[28][2])],
                                        [arr[29][0], parseInt(arr[29][2])],
                                        [arr[30][0], parseInt(arr[30][2])],
                                        [arr[31][0], parseInt(arr[31][2])],
                                        [arr[32][0], parseInt(arr[32][2])],
                                        [arr[33][0], parseInt(arr[33][2])],
                                        [arr[34][0], parseInt(arr[34][2])],
                                        [arr[35][0], parseInt(arr[35][2])],
                                        [arr[36][0], parseInt(arr[36][2])],
                                        [arr[37][0], parseInt(arr[37][2])],
                                        [arr[38][0], parseInt(arr[38][2])],
                                        [arr[39][0], parseInt(arr[39][2])],
                                        [arr[40][0], parseInt(arr[40][2])],
                                        [arr[41][0], parseInt(arr[41][2])],
                                        [arr[42][0], parseInt(arr[42][2])],
                                        [arr[43][0], parseInt(arr[43][2])],
                                        [arr[44][0], parseInt(arr[44][2])],
                                        [arr[45][0], parseInt(arr[45][2])],
                                        [arr[46][0], parseInt(arr[46][2])],
                                        [arr[47][0], parseInt(arr[47][2])],
                                        [arr[48][0], parseInt(arr[48][2])],
                                        [arr[49][0], parseInt(arr[49][2])],
                                        [arr[50][0], parseInt(arr[50][2])],
                                        [arr[51][0], parseInt(arr[51][2])],
                                        [arr[52][0], parseInt(arr[52][2])]
                                    ];

                                    // Create and populate the data tables.
                                    var data = [];
                                    data[0] = google.visualization.arrayToDataTable(data0);
                                    data[1] = google.visualization.arrayToDataTable(data1);

                                    var options = {
                                        animation:{
                                            duration: 1000,
                                            easing: 'out'
                                        },
                                    };

                                    dashboard.bind(programmaticSlider, programmaticChart);
                                    dashboard.draw(data[0], options);
                                    dashboard1.bind(programmaticSlider1, programmaticChart1);
                                    dashboard1.draw(data[1], options);

                                    programmaticChart.draw();
                                    programmaticChart1.draw();
                                    // end of drawing pie chart

                                    // draw bar chart
                                    google.charts.load('current', {packages: ['corechart', 'bar']});
                                    google.charts.setOnLoadCallback(drawMaterial);

                                    function drawMaterial() {
                                        var data = google.visualization.arrayToDataTable([
                                            ['State', 'ViolentCrime1' ,'MurderAndNonnegligentManslaughter', 'Rape1', 'Rape2', 'Robbery', 'AggravatedAssault', 'PropertyCrime', 'Burglary', 'Larceny-theft', 'MotorVehicleTheft'],
                                            [arr[1][0], parseFloat(arr[1][2]), parseInt(arr[1][3]), parseInt(arr[1][4]), parseInt(arr[1][5]), parseInt(arr[1][6]), parseInt(arr[1][7]), parseInt(arr[1][8]), parseInt(arr[1][9]), parseInt(arr[1][10]), parseInt(arr[1][11])],
                                            [arr[2][0], parseFloat(arr[2][2]), parseInt(arr[2][3]), parseInt(arr[1][4]), parseInt(arr[1][5]), parseInt(arr[1][6]), parseInt(arr[1][7]), parseInt(arr[1][8]), parseInt(arr[1][9]), parseInt(arr[1][10]), parseInt(arr[1][11])],

                                        ]);

                                        var materialOptions = {
                                            chart: {
                                                title: 'Crime in the United States by State, 2015'
                                            },
                                            vAxis: {
                                                title: 'ViolentCrime1'
                                            },
                                            vAxis: {
                                                title: 'MurderAndNonnegligentManslaughter'
                                            },
                                            vAxis: {
                                                title: 'Rape1'
                                            },
                                            vAxis: {
                                                title: 'Rape2'
                                            },
                                            vAxis: {
                                                title: 'Robbery'
                                            },
                                            vAxis: {
                                                title: 'AggravatedAssault'
                                            },
                                            vAxis: {
                                                title: 'PropertyCrime'
                                            },
                                            vAxis: {
                                                title: 'Burglary'
                                            },
                                            vAxis: {
                                                title: 'Larceny-theft'
                                            },
                                            vAxis: {
                                                title: 'MotorVehicleTheft'
                                            },
                                            bars: 'horizontal',
                                            animation:{
                                                duration: 10000,
                                                easing: 'out'
                                            }
                                        };
                                        var materialChart = new google.charts.Bar(document.getElementById('bar_chart_div'));
                                        google.charts.Bar(document.getElementById('bar_chart_div'));
                                        materialChart.draw(data, materialOptions);
                                    }
                                    // end of drawing bar chart

                                    // draw bubble chart
                                    google.charts.setOnLoadCallback(drawChart);
                                    function drawChart() {
                                        var data = google.visualization.arrayToDataTable([
                                            ['State', 'Population', 'CrimeRate', 'ViolentCrime'],
                                            [arr[1][0], parseInt(arr[1][1]), parseFloat(arr[1][12]), parseInt(arr[1][2])],
                                            [arr[2][0], parseInt(arr[2][1]), parseFloat(arr[2][12]), parseInt(arr[2][2])],
                                            [arr[3][0], parseInt(arr[3][1]), parseFloat(arr[3][12]), parseInt(arr[3][2])],
                                            [arr[4][0], parseInt(arr[4][1]), parseFloat(arr[4][12]), parseInt(arr[4][2])],
                                            [arr[5][0], parseInt(arr[5][1]), parseFloat(arr[5][12]), parseInt(arr[5][2])],
                                            [arr[6][0], parseInt(arr[6][1]), parseFloat(arr[6][12]), parseInt(arr[6][2])],
                                            [arr[7][0], parseInt(arr[7][1]), parseFloat(arr[7][12]), parseInt(arr[7][2])],
                                            [arr[8][0], parseInt(arr[8][1]), parseFloat(arr[8][12]), parseInt(arr[8][2])],
                                            [arr[9][0], parseInt(arr[9][1]), parseFloat(arr[9][12]), parseInt(arr[9][2])],
                                            [arr[10][0], parseInt(arr[10][1]), parseFloat(arr[10][12]), parseInt(arr[10][2])],
                                            [arr[11][0], parseInt(arr[11][1]), parseFloat(arr[11][12]), parseInt(arr[11][2])],
                                            [arr[12][0], parseInt(arr[12][1]), parseFloat(arr[12][12]), parseInt(arr[12][2])],
                                            [arr[13][0], parseInt(arr[13][1]), parseFloat(arr[13][12]), parseInt(arr[13][2])],
                                            [arr[14][0], parseInt(arr[14][1]), parseFloat(arr[14][12]), parseInt(arr[14][2])],
                                            [arr[15][0], parseInt(arr[15][1]), parseFloat(arr[15][12]), parseInt(arr[15][2])],
                                            [arr[16][0], parseInt(arr[16][1]), parseFloat(arr[16][12]), parseInt(arr[16][2])],
                                            [arr[17][0], parseInt(arr[17][1]), parseFloat(arr[17][12]), parseInt(arr[17][2])],
                                            [arr[18][0], parseInt(arr[18][1]), parseFloat(arr[18][12]), parseInt(arr[18][2])],
                                            [arr[19][0], parseInt(arr[19][1]), parseFloat(arr[19][12]), parseInt(arr[19][2])],
                                            [arr[20][0], parseInt(arr[20][1]), parseFloat(arr[20][12]), parseInt(arr[20][2])],
                                            [arr[21][0], parseInt(arr[21][1]), parseFloat(arr[21][12]), parseInt(arr[21][2])],
                                            [arr[22][0], parseInt(arr[22][1]), parseFloat(arr[22][12]), parseInt(arr[22][2])],
                                            [arr[23][0], parseInt(arr[23][1]), parseFloat(arr[23][12]), parseInt(arr[23][2])],
                                            [arr[24][0], parseInt(arr[24][1]), parseFloat(arr[24][12]), parseInt(arr[24][2])],
                                            [arr[25][0], parseInt(arr[25][1]), parseFloat(arr[25][12]), parseInt(arr[25][2])],
                                            [arr[26][0], parseInt(arr[26][1]), parseFloat(arr[26][12]), parseInt(arr[26][2])],
                                            [arr[27][0], parseInt(arr[27][1]), parseFloat(arr[27][12]), parseInt(arr[27][2])],
                                            [arr[28][0], parseInt(arr[28][1]), parseFloat(arr[28][12]), parseInt(arr[28][2])],
                                            [arr[29][0], parseInt(arr[29][1]), parseFloat(arr[29][12]), parseInt(arr[29][2])],
                                            [arr[30][0], parseInt(arr[30][1]), parseFloat(arr[30][12]), parseInt(arr[30][2])],
                                            [arr[31][0], parseInt(arr[31][1]), parseFloat(arr[31][12]), parseInt(arr[31][2])],
                                            [arr[32][0], parseInt(arr[32][1]), parseFloat(arr[32][12]), parseInt(arr[32][2])],
                                            [arr[33][0], parseInt(arr[33][1]), parseFloat(arr[33][12]), parseInt(arr[33][2])],
                                            [arr[34][0], parseInt(arr[34][1]), parseFloat(arr[34][12]), parseInt(arr[34][2])],
                                            [arr[35][0], parseInt(arr[35][1]), parseFloat(arr[35][12]), parseInt(arr[35][2])],
                                            [arr[36][0], parseInt(arr[36][1]), parseFloat(arr[36][12]), parseInt(arr[36][2])],
                                            [arr[37][0], parseInt(arr[37][1]), parseFloat(arr[37][12]), parseInt(arr[37][2])],
                                            [arr[38][0], parseInt(arr[38][1]), parseFloat(arr[38][12]), parseInt(arr[38][2])],
                                            [arr[39][0], parseInt(arr[39][1]), parseFloat(arr[39][12]), parseInt(arr[39][2])],
                                            [arr[40][0], parseInt(arr[40][1]), parseFloat(arr[40][12]), parseInt(arr[40][2])],
                                            [arr[41][0], parseInt(arr[41][1]), parseFloat(arr[41][12]), parseInt(arr[41][2])],
                                            [arr[42][0], parseInt(arr[42][1]), parseFloat(arr[42][12]), parseInt(arr[42][2])],
                                            [arr[43][0], parseInt(arr[43][1]), parseFloat(arr[43][12]), parseInt(arr[43][2])],
                                            [arr[44][0], parseInt(arr[44][1]), parseFloat(arr[44][12]), parseInt(arr[44][2])],
                                            [arr[45][0], parseInt(arr[45][1]), parseFloat(arr[45][12]), parseInt(arr[45][2])],
                                            [arr[46][0], parseInt(arr[46][1]), parseFloat(arr[46][12]), parseInt(arr[46][2])],
                                            [arr[47][0], parseInt(arr[47][1]), parseFloat(arr[47][12]), parseInt(arr[47][2])],
                                            [arr[48][0], parseInt(arr[48][1]), parseFloat(arr[48][12]), parseInt(arr[48][2])],
                                            [arr[49][0], parseInt(arr[49][1]), parseFloat(arr[49][12]), parseInt(arr[49][2])],
                                            [arr[50][0], parseInt(arr[50][1]), parseFloat(arr[50][12]), parseInt(arr[50][2])],
                                            [arr[51][0], parseInt(arr[51][1]), parseFloat(arr[51][12]), parseInt(arr[51][2])],
                                            [arr[52][0], parseInt(arr[52][1]), parseFloat(arr[52][12]), parseInt(arr[52][2])],
                                        ]);

                                        var options = {
                                            colorAxis: {colors: ['white', 'green']}
                                        };

                                        var chart = new google.visualization.BubbleChart(document.getElementById('bubble_chart_div'));
                                        chart.draw(data, options);
                                    }
                                    // end of drawing bubble chart
                                }
                                // end of drawing google chart

                            });

                        </script>
                    </div>
                    <!-- /dashboard -->

                    <!-- dashboard div -->
                    <div id="dashboard">
                        <table>
                            <tr>
                                <td><div id="programmatic_control_div" align="center" style="min-width: 400px"></div></td>
                                <td><div id="programmatic_control_div1" align="center" style="min-width: 400px"></div></td>
                            </tr>
                            <tr>
                                <td><div id="programmatic_chart_div" align="center" ></div></td>
                                <td><div id="programmatic_chart_div1" align="center" ></div></td>
                            </tr>
                        </table>
                    </div>
                    <!-- /dashboard div -->

                    <div id="bar_chart_div"  align="center" style="width: 1400px; height: 300px;"></div>
                    <div id="bubble_chart_div" align="center" style="width: 1200px; height: 1200px;"></div>

                </div>
            </div>
        </div>
        <!-- #scrollUp -->
        <div id="scrollUp" align="center">
            <br/><br/>
            <a href="#top"><button id="top" class="btn btn-success">Back to top</button></a>
        </div>
        <!-- /#scrollUp -->
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

<!-- scroll up Script -->
<script>
    $("a[href='#top']").click(function() {
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });
</script>

</body>

</html>
