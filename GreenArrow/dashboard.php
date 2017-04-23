
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
    <script src="http://jquery-csv.googlecode.com/git/src/jquery.csv.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

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
            <div class="row">
                <div class="col-lg-12">

                    <!-- dashboard - start -->
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

                    <!-- dashboard -->
                    <div id="dashboard" align="center">
                        <script type="text/javascript">


                            jQuery.get('dataset/table_5_crime_in_the_united_states_by_state_2015.csv', function(data) {
                                dataStr = new String(data);
//                                var State = new Array();
//                                var Poplulation = new Array();
//                                var ViolentCrime1 = new Array();
//                                var MurderAndNonnegligentManslaughter = new Array();
//                                var Rape2 = new Array();
//                                var Rape3 = new Array();
//                                var Robbery = new Array();
//                                var AggravatedAssault = new Array();
//                                var PropertyCrime = new Array();
//                                var Burglary = new Array();
//                                var Larceny = new Array();
//                                var MotorVehicleTheft = new Array();
//                                var ViolentCrimeRate = new Array();

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

                                    // We omit "var" so that programmaticSlider is visible to changeRange.
                                    var programmaticSlider = new google.visualization.ControlWrapper({
                                        'controlType': 'NumberRangeFilter',
                                        'containerId': 'programmatic_control_div',
                                        'options': {
                                            'filterColumnLabel': 'Polulation',
                                            'ui': {'labelStacking': 'vertical'}
                                        }
                                    });

                                    var programmaticChart  = new google.visualization.ChartWrapper({
                                        'chartType': 'PieChart',
                                        'containerId': 'programmatic_chart_div',
                                        'options': {
                                            'width': 900,
                                            'height': 550,
                                            'legend': 'none',
                                            'chartArea': {'left': 15, 'top': 15, 'right': 15, 'bottom': 0},
                                            'pieSliceText': 'value'
                                        }
                                    });

                                    var data = google.visualization.arrayToDataTable([
                                        ['Name', 'Polulation'],
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
                                        [arr[52][0], parseInt(arr[52][1])],
                                    ]);

                                    dashboard.bind(programmaticSlider, programmaticChart);
                                    dashboard.draw(data);

                                    programmaticChart.setOption('is3D', true);
                                    programmaticChart.draw();
                                }
                                // end of drawing google chart

                            });

                        </script>
                    </div>
                    <!-- /dashboard -->

                    <!-- dashboard div -->
                    <div id="programmatic_dashboard_div" style="border: 2px solid #ccc">
                        <table class="columns">
                            <tr>
                                <td>
                                    <div id="programmatic_control_div" style="padding-left: 8em; min-width: 400px"></div>
                                </td>
                                <td>
                                    <div id="programmatic_chart_div"></div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- /dashboard div -->
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

</body>

</html>
