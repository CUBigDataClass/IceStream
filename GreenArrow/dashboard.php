
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

    <script src="./js/hashmap.js"></script>
    <script src="./js/jquery.csv-0.71.js"></script>
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
                    <div id="calendar">
                        <script type="text/javascript">
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
                                        'filterColumnLabel': 'Donuts eaten',
                                        'ui': {'labelStacking': 'vertical'}
                                    }
                                });

                                var data = $.csv.toObjects('./dataset/table_5_crime_in_the_united_states_by_state_2015.csv');
                                console.log(data);

                                var programmaticChart  = new google.visualization.ChartWrapper({
                                    'chartType': 'PieChart',
                                    'containerId': 'programmatic_chart_div',
                                    'options': {
                                        'width': 600,
                                        'height': 400,
                                        'legend': 'none',
                                        'chartArea': {'left': 15, 'top': 15, 'right': 0, 'bottom': 0},
                                        'pieSliceText': 'value'
                                    }
                                });

                                var data = google.visualization.arrayToDataTable([
                                    ['Name', 'Donuts eaten'],
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

                                changeRange = function() {
                                    programmaticSlider.setState({'lowValue': 2, 'highValue': 5});
                                    programmaticSlider.draw();
                                };

                                programmaticChart.setOption('is3D', true);
                                programmaticChart.draw();
                            }

                        </script>
                    </div>
                    <!-- /dashboard -->

                    <!-- dashboard div -->
                    <div id="programmatic_dashboard_div" style="border: 1px solid #ccc">
                        <table class="columns">
                            <tr>
                                <td>
                                    <div id="programmatic_control_div" style="padding-left: 2em; min-width: 250px"></div>
                                    <div>
<!--                                        <button style="margin: 1em 1em 1em 2em" onclick="changeRange();">-->
<!--                                            Select range [2, 5]-->
<!--                                        </button><br />-->
                                    </div>
                                    <script type="text/javascript">
                                        function changeRange() {
                                            programmaticSlider.setState({'lowValue': 2, 'highValue': 5});
                                            programmaticSlider.draw();
                                        }

                                        function changeOptions() {
                                            programmaticChart.setOption('is3D', true);
                                            programmaticChart.draw();
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
