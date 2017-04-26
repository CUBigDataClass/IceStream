<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <!-- source: https://vida.io/gists/qPjGZMi5dCiPrR8zD
    https://gist.github.com/dnprock/5215cc464cfb9affd283 -->
    <style>

        body {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            position: relative;
        }

        /* stylesheet for your custom graph */

        .categories {
            fill: none;
            stroke: #fff;
            stroke-linejoin: round;
        }

        .categories-choropleth {
            fill: #ccc;
        }

        #tooltip-container {
            position: absolute;
            background-color: #fff;
            color: #000;
            padding: 10px;
            border: 1px solid;
            display: none;
        }

        #canvas svg {
            border: 0px;
        }

        .tooltip_key {
            font-weight: bold;
        }

        .tooltip_value {
            margin-left: 20px;
            float: right;
        }

        .x-axis {
            fill: #000;
        }

        .chart {
            background: #fff;
            margin: 5px;
        }

        .chart .category-bar {
            stroke: white;
            fill: steelblue;
        }

        .chart .score {
            fill: white;
        }

        .chart text.name {
            fill: #000;
        }

        .chart line {
            stroke: #c1c1c1;
        }

        .chart .rule {
            fill: #000;
        }

        .main-category-text {
            fill: #FF4A4A;
        }

        .main-category-bar {
            stroke: #FF4A4A;
            stroke-width: 2px;
        }

    </style>
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

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- social icon -->
    <link rel="stylesheet" href="https://github.com/lipis/bootstrap-social/blob/gh-pages/bootstrap-social.css">

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

    <!-- profile page -->
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <div class="container">
        <br/><br/>
        <div class="row">
            <h1>
                <p align="center" data-toggle="tooltip" title="Wanna eat ice cream?">IceStream</p>
            </h1>
        </div>
        <div class="row" align="center">
            <div class="col-sm-4">
                <div class="card">
                    <canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
                    <div align="center" class="avatar">
                        <p align="center" data-toggle="tooltip" title="Would you">
                            <img src="./img/Chih-Wei.jpg" class="img-circle" width="180" height="180"/>
                        </p>
                    </div>
                    <div align="center" class="content">
                        <p>Chih-Wei Lin</p>
                    </div>
                    <div align="center" class="avatar">
                        <img src="./img/icecream1.png" class="img-responsive" width="80" height="80"/>
                    </div>
                    <br/>
                    <div align="center">
                        <a href="https://github.com/chihweil5"><button type="button" class="btn btn-default" >Contact</button></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
                    <div align="center" class="avatar">
                        <p align="center" data-toggle="tooltip" title="like">
                            <img src="./img/Bryan.jpg" class="img-circle" width="180" height="180"/>
                        </p>
                    </div>
                    <div align="center" class="content">
                        <p>Bryan Bo Cao (leader)</p>
                    </div>
                    <div align="center" class="avatar">
                        <img src="./img/icecream2.png" class="img-responsive" width="80" height="80"/>
                    </div>
                    <br/>
                    <div align="center">
                        <a href="https://github.com/BryanBo-Cao"><button type="button" class="btn btn-success">Contact</button></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
                    <div align="center" class="avatar">
                        <p align="center" data-toggle="tooltip" title="to">
                            <img src="./img/Peilun.jpg" class="img-circle" width="180" height="180"/>
                        </p>
                    </div>
                    <div align="center" class="content">
                        <p>Peilun Zhang</p>
                    </div>
                    <div align="center" class="avatar">
                        <img src="./img/icecream3.png" class="img-responsive" width="80" height="80"/>
                    </div>
                    <br/>
                    <div align="center">
                        <a href="https://github.com/Pezhin"><button type="button" class="btn btn-primary">Contact</button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="card">
                    <canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
                    <div align="center" class="avatar">
                        <p align="center" data-toggle="tooltip" title="eat">
                            <img src="./img/Yanli.jpg" class="img-circle" width="180" height="180"/>
                        </p>
                    </div>
                    <div align="center" class="content">
                        <p>Yan Li</p>
                    </div>
                    <div align="center" class="avatar">
                        <img src="./img/icecream4.png" class="img-responsive" width="80" height="80"/>
                    </div>
                    <br/>
                    <div align="center">
                        <a href="https://github.com/YanLi26"><button type="button" class="btn btn-info">Contact</button></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="card">
                    <canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
                    <div align="center" class="avatar">
                        <p align="center" data-toggle="tooltip" title="ice cream?">
                            <img src="./img/Yichen.jpg" class="img-circle" width="180" height="180"/>
                        </p>
                    </div>
                    <div align="center" class="content">
                        <p>Yi-Chen Kuo</p>
                    </div>
                    <div align="center" class="avatar">
                        <img src="./img/icecream5.png" class="img-responsive" width="80" height="80"/>
                    </div>
                    <br/>
                    <div align="center">
                        <a href="https://github.com/emiliemili0208"><button type="button" class="btn btn-danger">Contact</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /profile page -->

    <br/>
    <br/>
    <?php
    include './php/copyrightFooter.php';
    ?>
</div>
<!-- #page-content-wrapper -->

</div>
<!-- /#wrapper -->


<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

<!-- scroll up Script -->
<script>
    $("a[href='#top']").click(function () {
        $("html, body").animate({scrollTop: 0}, "slow");
        return false;
    });
</script>

</body>

</html>



