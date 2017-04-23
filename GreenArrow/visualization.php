
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

                    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
                    <!-- dashboard - start -->
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

                    <!-- dashboard -->
                    <div id="calendar">
                        <!--Load the AJAX API-->
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">

                            // Load the Visualization API and the controls package.
                            google.charts.load('current', {'packages':['corechart', 'controls']});

                            // Set a callback to run when the Google Visualization API is loaded.
                            google.charts.setOnLoadCallback(drawDashboard);

                            // Callback that creates and populates a data table,
                            // instantiates a dashboard, a range slider and a pie chart,
                            // passes in the data and draws it.
                            function drawDashboard() {

                                // Create our data table.
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

                                // Create a dashboard.
                                var dashboard = new google.visualization.Dashboard(
                                    document.getElementById('dashboard_div'));

                                // Create a range slider, passing some options
                                var donutRangeSlider = new google.visualization.ControlWrapper({
                                    'controlType': 'NumberRangeFilter',
                                    'containerId': 'filter_div',
                                    'options': {
                                        'filterColumnLabel': 'Donuts eaten'
                                    }
                                });

                                // Create a pie chart, passing some options
                                var pieChart = new google.visualization.ChartWrapper({
                                    'chartType': 'PieChart',
                                    'containerId': 'chart_div',
                                    'options': {
                                        'width': 300,
                                        'height': 300,
                                        'pieSliceText': 'value',
                                        'legend': 'right'
                                    }
                                });

                                // Establish dependencies, declaring that 'filter' drives 'pieChart',
                                // so that the pie chart will only display entries that are let through
                                // given the chosen slider range.
                                dashboard.bind(donutRangeSlider, pieChart);

                                // Draw the dashboard.
                                dashboard.draw(data);
                            }
                        </script>
                    </div>
                    <div id="dashboard_div">
                        <!--Divs that will hold each control and chart-->
                        <div id="filter_div"></div>
                        <div id="chart_div"></div>
                    </div>
                    <!-- /dashboard -->

                    <script>
                        // Some raw data (not necessarily accurate)
                        var rowData1 = [['Month', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua  Guinea',
                            'Rwanda', 'Average'],
                            ['2004/05', 165, 938, 522, 998, 450, 114.6],
                            ['2005/06', 135, 1120, 599, 1268, 288, 382],
                            ['2006/07', 157, 1167, 587, 807, 397, 623],
                            ['2007/08', 139, 1110, 615, 968, 215, 409.4],
                            ['2008/09', 136, 691, 629, 1026, 366, 569.6]];
                        var rowData2 = [['Month', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua  Guinea',
                            'Rwanda', 'Average'],
                            ['2004/05', 122, 638, 722, 998, 450, 614.6],
                            ['2005/06', 100, 1120, 899, 1268, 288, 682],
                            ['2006/07', 183, 167, 487, 207, 397, 623],
                            ['2007/08', 200, 510, 315, 1068, 215, 609.4],
                            ['2008/09', 123, 491, 829, 826, 366, 569.6]];

                        // Create and populate the data tables.
                        var data = [];
                        data[0] = google.visualization.arrayToDataTable(rowData1);
                        data[1] = google.visualization.arrayToDataTable(rowData2);

                        var options = {
                            width: 400,
                            height: 240,
                            vAxis: {title: "Cups"},
                            hAxis: {title: "Month"},
                            seriesType: "bars",
                            series: {5: {type: "line"}},
                            animation:{
                                duration: 1000,
                                easing: 'out'
                            },
                        };
                        var current = 0;
                        // Create and draw the visualization.
                        var chart = new google.visualization.ComboChart(document.getElementById('visualization'));
                        var button = document.getElementById('b1');
                        function drawChart() {
                            // Disabling the button while the chart is drawing.
                            button.disabled = true;
                            google.visualization.events.addListener(chart, 'ready',
                                function() {
                                    button.disabled = false;
                                    button.value = 'Switch to ' + (current ? 'Tea' : 'Coffee');
                                });
                            options['title'] = 'Monthly ' + (current ? 'Coffee' : 'Tea') + ' Production by Country';

                            chart.draw(data[current], options);
                        }
                        drawChart();

                        button.onclick = function() {
                            current = 1 - current;
                            drawChart();
                        }
                    </script>
                    <div id = "visualization"></div>

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
