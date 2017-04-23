
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
                            google.charts.load('current', {'packages':['corechart', 'controls']});
                            google.charts.setOnLoadCallback(drawStuff);

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

                                var arr = new Array(13);

                                var dataLines = dataStr.split("\n");
                                for (i = 0; i < 53; i++) {
                                    console.log(dataLines[i]);
                                    if (i > 0) {

                                    }
                                }

                            });

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
                                    ['Michael' , 5],
                                    ['Elisa', 7],
                                    ['Robert', 3],
                                    ['John', 2],
                                    ['Jessica', 6],
                                    ['Aaron', 1],
                                    ['Margareth', 8]
                                ]);

                                dashboard.bind(programmaticSlider, programmaticChart);
                                dashboard.draw(data);

                                programmaticChart.setOption('is3D', true);
                                programmaticChart.draw();
                            }

                        </script>
                    </div>
                    <!-- /dashboard -->

                    <!-- dashboard div -->
                    <div id="programmatic_dashboard_div" style="border: 2px solid #ccc">
                        <table class="columns">
                            <tr>
                                <td>
                                    <div id="programmatic_control_div" style="padding-left: 8em; min-width: 400px"></div>
                                    <script type="text/javascript">
                                        function changeRange() {
                                            programmaticSlider.setState({'lowValue': 2, 'highValue': 5});
                                            programmaticSlider.draw();
                                        }
                                    </script>
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
