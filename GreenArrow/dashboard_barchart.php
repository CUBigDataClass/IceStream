
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

                                // draw bar chart
                                google.charts.load('current', {packages: ['corechart', 'bar']});
                                google.charts.setOnLoadCallback(drawMaterial);

                                function drawMaterial() {
                                    var data = google.visualization.arrayToDataTable([
                                        ['City', '2010 Population', '2000 Population'],
                                        ['New York City, NY', 8175000, 8008000],
                                        ['Los Angeles, CA', 3792000, 3694000],
                                        ['Chicago, IL', 2695000, 2896000],
                                        ['Houston, TX', 2099000, 1953000],
                                        ['Philadelphia, PA', 1526000, 1517000]
                                    ]);

                                    var materialOptions = {
                                        chart: {
                                            title: 'Population of Largest U.S. Cities'
                                        },
                                        hAxis: {
                                            title: 'Total Population',
                                            minValue: 0,
                                        },
                                        vAxis: {
                                            title: 'City'
                                        },
                                        bars: 'horizontal'
                                    };
                                    var materialChart = new google.charts.Bar(document.getElementById('bar_chart_div'));
                                    google.charts.Bar(document.getElementById('bar_chart_div'));
                                    materialChart.draw(data, materialOptions);
                                }
                                // end of drawing bar chart

                            });

                        </script>
                    </div>
                    <!-- /dashboard -->

                    <div id="barchart_material" style="width: 900px; height: 500px;"></div>

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
