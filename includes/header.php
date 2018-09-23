<?php session_start()?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <!--=============== basic  ===============-->
    <meta charset="UTF-8">
    <title>Serene</title>
    <meta name="viewport" content="width=device-width, initial-scale=1s.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="index, follow"/>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <!--=============== css  ===============-->
    <link type="text/css" rel="stylesheet" href="css/reset.css">
    <link type="text/css" rel="stylesheet" href="css/plugins.css">
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <link type="text/css" rel="stylesheet" href="css/color.css">
    <!--For Live Search-->
    <!--    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />-->
    <!--For Checkbox Filter-->
    <!--    <link rel="stylesheet" href="css/bootstrap.min.css">-->
    <link href = "css/jquery-ui.css" rel = "stylesheet">
    <!--=============== favicons ===============-->
    <link rel="shortcut icon" href="images/flogo.ico">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--=============== scripts ===============-->
    <!--For Live Search-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!--For Checkbox Filter-->
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!--=============== css  ===============-->
    <!--For Multiselect Drop down Filter-->
    <link href="css/bootstrap-select.min.css" rel="stylesheet" />
    <script src="js/bootstrap-select.min.js"></script>
    <!--For AutoComplete-->



    <style>
        ul.selected
        {
            background-color:#ffffff;
            background-blend-mode: multiply;
            cursor:pointer;
        }
        li{
            padding:7px;
        }

        div.scroller {
            overflow-y: auto;
            overflow-x:hidden;
            padding: 5px;
            height: 100vh;
        }
    </style>

</head>
<body>
<!--loader-->
<div class="loader-wrap">
    <div class="pin"></div>
    <div class="pulse"></div>
</div>
<!--loader end-->
<!-- Main  -->
<div id="main">
    <!-- header-->
    <header class="main-header dark-header fs-header sticky">
        <div class="header-inner">
            <div class="logo-holder">
                <a href="index.php"><img src="images/logo5.png" alt=""></a>
            </div>
            <!-- nav-button-wrap-->
            <div class="nav-button-wrap color-bg">
                <div class="nav-button">
                    <span></span><span></span><span></span>
                </div>
            </div>
            <!-- nav-button-wrap end-->
            <!--  navigation -->
            <div class="nav-holder main-menu">
                <nav>
                    <ul>
                        <li>
                            <a href="index.php">Home </a>
                            <!--second level -->
                            <!--second level end-->
                        </li>
                        <li>
                            <a href="listing_act.php">Activities</a>

                            <!--second level -->
                            <!--second level end-->
                        </li>
                        <li>
                            <a href="listing.php">Explore</a>

                        </li>
                        <li>
                            <a href="FAQ.php">FAQ </a>
                            <!--second level -->
                            <!--second level end-->
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- navigation  end -->
        </div>
    </header>
    <!--  header end -->

