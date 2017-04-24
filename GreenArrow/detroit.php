
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
            <div id="title" align="center">
                <h3>Crime in Detroit
                    <span class="label label-default">2009 to present</span>
                </h3>
                <a href="https://data.detroitmi.gov/Public-Safety/DPD-All-Crime-Incidents-2009-Present-Data-Lens-Pro/bzdg-syqn"> Data Source </a>
                <!-- http://us-city.census.okfn.org/dataset/crime-stats -->
                <br/><br/>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- button for map -->
                    <div id="buttonDiv" align="center">
                        <button id="addCluster" class="btn btn-success">Add Cluster</button>
                        <br/><br/>
                    </div>
                    <!-- /button for map -->

                    <!-- google maps - start -->
                    <div id="googlemaps">
                        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
                        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
                        <script src="js/plugins.js"></script>
                        <script src="js/main.js"></script>

                        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
                        <script>
                            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
                                function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
                                e=o.createElement(i);r=o.getElementsByTagName(i)[0];
                                e.src='https://www.google-analytics.com/analytics.js';
                                r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
                            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
                        </script>
                        <!-- Read Chicago.json -->
                        <p id="key" hidden>This paragraph should be hidden.</p>
                        <div id="mapVisualization">

                            <div id="map" style="width:100%;height:650px"></div>
                            <script>

                                function myMap() {
                                    jQuery.get('dataset/Detroit.txt', function(txt) {
                                        //$('#output').text(txt);
                                        dataFile = new String(txt);

                                        // construct map
                                        var mapCanvas = document.getElementById("map");
                                        //var myCenter = new google.maps.LatLng(51.508742,-0.120850);
                                        var pinColor = "33cc66";
                                        var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor,
                                            new google.maps.Size(70, 70),
                                            new google.maps.Point(0,0),
                                            new google.maps.Point(10, 34));
                                        var myCenter = new google.maps.LatLng(42.381543,-83.0787427); // center of detroit
                                        var mapOptions = {center: myCenter, zoom: 10};
                                        var map = new google.maps.Map(mapCanvas,mapOptions);
                                        var markers = new Array();
                                        // end of constructing map

                                        // for (i = 0; i < dataFile.length;) {
                                        // alert(dataFile.length)
                                        var marker_i = 0;
                                        for (i = 0; i < 700000;) {
                                            var coordinates_i = dataFile.indexOf("coordinates", i);
                                            var end_of_longitude_i = dataFile.indexOf(",", coordinates_i);
                                            var end_of_latitude_i = dataFile.indexOf("]", end_of_longitude_i);
                                            var longitude = dataFile.substring(coordinates_i + 14, end_of_longitude_i);
                                            var latitude = dataFile.substring(end_of_longitude_i + 1, end_of_latitude_i);

                                            // add markers into markers array
                                            var myLocation = new google.maps.LatLng(latitude, longitude);
                                            var marker = new google.maps.Marker({
                                                position: myLocation,
                                                animation: google.maps.Animation.DROP,
                                                icon: pinImage
                                            });
                                            markers.push(marker);
                                            addMarkerWithTimeout(map, marker, marker_i++ * 400);
                                            i = end_of_latitude_i + 1;
                                        }

                                        var markerCluster = null;
                                        var addClusterButton = document.getElementById("addCluster");
                                        addClusterButton.onclick = function() {
                                            if (markerCluster == null) markerCluster = new MarkerClusterer(map, markers,
                                                {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
                                        }

                                    });

                                }

                                // display marker in every ? timeout
                                function addMarkerWithTimeout(map, marker, timeout) {
                                    window.setTimeout(function() {
                                        marker.setMap(map);
                                    }, timeout);
                                }

                            </script>

                            <!-- google map cluster -->
                            <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>

                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7-cOqjBfEy-8bQi_8LenoAv8TyGalyNw&callback=myMap"></script>
                            <!--<script src=googleLink></script>-->
                        </div> <!-- end of <div id="mapVisualization"> -->
                    </div> <!-- end of <div id="googlemaps"> -->
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
