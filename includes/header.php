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
        /*ul{*/
        /*background-color:#ffffff;*/
        /*cursor:pointer;*/
        /*}*/
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
            <div class="header-search vis-header-search">
                <!--                <div class="header-search-input-item">-->
                <!--                    <input type="text" placeholder="Keywords" value=""/>-->
                <!--                </div>-->
                <div class="header-search-select-item">
                    <!--                    <select data-placeholder="All Categories" class="chosen-select" >-->
                    <!--                        <option>All Categories</option>-->
                    <!--                        <option>Shops</option>-->
                    <!--                        <option>Hotels</option>-->
                    <!--                        <option>Restaurants</option>-->
                    <!--                        <option>Fitness</option>-->
                    <!--                        <option>Events</option>-->
                    <!--                    </select>-->
                </div>
                <!--                <button class="header-search-button" onclick="window.location.href='listing.html'">Search</button>-->
            </div>
            <!--            <div class="show-search-button"><i class="fa fa-search"></i> <span>Search</span></div>-->
            <!--            <a href="dashboard-add-listing.html" class="add-list">Add Listing <span><i class="fa fa-plus"></i></span></a>-->
            <!--            <div class="show-reg-form modal-open"><i class="fa fa-sign-in"></i>Sign In</div>-->
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
                            <!--                            <a href="#" class="act-link">Home <i class="fa fa-caret-down"></i></a>-->
                            <a href="index.php">Home </a>
                            <!--second level -->
                            <!--                            <ul>-->
                            <!--                                <li><a href="index.php">Parallax Image</a></li>-->
                            <!--                                <li><a href="index2.html">Video</a></li>-->
                            <!--                                <li><a href="index3.html">Map</a></li>-->
                            <!--                                <li><a href="index4.html">Slideshow</a></li>-->
                            <!--                                <li><a href="index5.html">Slider</a></li>-->
                            <!--                                <li><a href="index6.html">Fullscreen Slider</a></li>-->
                            <!--                            </ul>-->
                            <!--second level end-->
                        </li>
                        <li>
                            <!--                            <a href="#">Listings <i class="fa fa-caret-down"></i></a>-->
                            <a href="listing_act.php">Activities</a>

                            <!--second level -->
                            <!--                            <ul>-->
                            <!--                                <li><a href="listing.php">Column map</a></li>-->
                            <!--                                <li><a href="listing2.html">Column map 2</a></li>-->
                            <!--                                <li><a href="listing3.html">Fullwidth Map</a></li>-->
                            <!--                                <li><a href="listing4.html">Fullwidth Map 2</a></li>-->
                            <!--                                <li><a href="listing5.html">Without Map</a></li>-->
                            <!--                                <li><a href="listing6.html">Without Map 2</a></li>-->
                            <!--                                <li>-->
                            <!--                                    <a href="#">Single <i class="fa fa-caret-down"></i></a>-->
                            <!--                                    <!--third  level  -->
                            <!--                                    <ul>-->
                            <!--                                        <li><a href="listing-single.html">Style 1</a></li>-->
                            <!--                                        <li><a href="listing-single2.html">Style 2</a></li>-->
                            <!--                                        <li><a href="listing-single3.html">Style 3</a></li>-->
                            <!--                                        <li><a href="listing-single4.html">Style 4</a></li>-->
                            <!--                                    </ul>-->
                            <!--                                    <!--third  level end-->
                            <!--                                </li>-->
                            <!--                            </ul>-->
                            <!--second level end-->
                        </li>
                        <li>
                            <!--                            <a href="blog.html">Activities</a>-->
                            <a href="listing.php">Places</a>

                        </li>
                        <li>
                            <!--                            <a href="#">Pages <i class="fa fa-caret-down"></i></a>-->
                            <!--                            <a href="#">Contact Us </a>-->
                            <!--second level -->
                            <!--                            <ul>-->
                            <!--                                <li><a href="about.html">About</a></li>-->
                            <!--                                <li><a href="contacts.html">Contacts</a></li>-->
                            <!--                                <li><a href="author-single.html">User single</a></li>-->
                            <!--                                <li><a href="how-itworks.html">How it Works</a></li>-->
                            <!--                                <li><a href="pricing-tables.html">Pricing</a></li>-->
                            <!--                                <li><a href="dashboard-myprofile.html">User Dasboard</a></li>-->
                            <!--                                <li><a href="blog-single.html">Blog Single</a></li>-->
                            <!--                                <li><a href="dashboard-add-listing.html">Add Listing</a></li>-->
                            <!--                                <li><a href="404.html">404</a></li>-->
                            <!--                                <li><a href="coming-soon.html">Coming Soon</a></li>-->
                            <!--                                <li><a href="header2.html">Header 2</a></li>-->
                            <!--                                <li><a href="footer-fixed.html">Footer Fixed</a></li>-->
                            <!--                            </ul>-->
                            <!--second level end-->
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- navigation  end -->
        </div>
    </header>
    <!--  header end -->

