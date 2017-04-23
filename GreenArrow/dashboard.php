
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

                    <!-- calendar -->
                    <div id="calendar">
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                                google.charts.load("current", {packages:["calendar"]});
                                google.charts.setOnLoadCallback(drawChart);

                                function drawChart() {
                                    var dataTable = new google.visualization.DataTable();
                                    dataTable.addColumn({ type: 'date', id: 'Date' });
                                    dataTable.addColumn({ type: 'number', id: 'Crime Number' });
                                    dataTable.addRows([
                                        [ new Date(2012, 3, 13), 37032 ],
                                        [ new Date(2012, 3, 14), 38024 ],
                                        [ new Date(2012, 3, 15), 38024 ],
                                        [ new Date(2012, 3, 16), -38108 ],
                                        [ new Date(2012, 3, 17), 38229 ],
                                        // Many rows omitted for brevity.
                                        [ new Date(2013, 9, 4), 38177 ],
                                        [ new Date(2013, 9, 5), 24560 ],
                                        [ new Date(2013, 9, 12), 15000 ],
                                        [ new Date(2013, 9, 13), 38029 ],
                                        [ new Date(2013, 9, 19), 38823 ],
                                        [ new Date(2013, 9, 23), 38345 ],
                                        [ new Date(2013, 9, 24), 38436 ],
                                        [ new Date(2013, 9, 30), 38447 ]
                                    ]);

                                    var chart = new google.visualization.Calendar(document.getElementById('calendar_basic'));

                                    var options = {
                                        title: "Crime Number",
                                        height: 500,
                                        calendar: { cellSize: 20 },

                                    };

                                    chart.draw(dataTable, options);
                                }
                        </script>
                    </div>
                    <!-- /calendar -->
                    <div id="calendar_basic" style="width: 1200px; height: 350px;"></div>
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
