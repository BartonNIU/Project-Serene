<?php include "includes\header.php"?>
<?php include "mysql_connect.php";?>
<?php
$placeCatch = $_GET['place'];
if($placeCatch != "")
{
    $placeName = $placeCatch;
}
?>
<!--  header end -->
<!-- wrapper -->
<div id="wrapper">
    <!--  content-->
    <div class="content">
        <!--  section  -->
        <section class="parallax-section single-par list-single-section" data-scrollax-parent="true" id="sec1">
            <?php
            $query = $connect->query("Select * from places WHERE place_name='$placeName'");
            while($row = $query -> fetch_array())
            {
                $orderPict = $row['ID'];
                echo ' <div class="bg par-elem"  data-bg="picture/it2/Explore/'.$orderPict.'.jpeg" data-scrollax="properties: { translateY: "30%"}"> ';
                echo'</div>';
            }
            ?>
            <div class="list-single-header absolute-header fl-wrap">
                <div class="container">
                    <div class="list-single-header-item">
                        <div class="list-single-header-item-opt fl-wrap">
                            <div class="list-single-header-cat fl-wrap">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="list-single-header-contacts fl-wrap">
                                    <ul>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="fl-wrap list-single-header-column">
                                    <div class="share-holder hid-share">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--  section end -->

        <div class="scroll-nav-wrapper fl-wrap">
            <div class="container">
                <nav class="scroll-nav scroll-init">
                    <ul>
                        <li><a class="act-scrlink" href="#sec1">Gallery</a></li>
                        <li><a href="#sec2">Details</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <!--  section   -->
        <section class="gray-section no-top-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <!-- list-single-main-wrapper -->
                        <div class="list-single-main-wrapper fl-wrap" id="sec2">
                            <?php
                            echo'<div class="breadcrumbs gradient-bg  fl-wrap"><a href="index.php">Home</a><a href="listing.php">Explore</a><span>'.$placeName.'</span></div>';
                            ?>

                            <!-- list-single-header -->
                            <div class="list-single-header list-single-header-inside fl-wrap">
                                <div class="container">
                                    <div class="list-single-header-item">
                                        <div class="row">
                                            <div class="col-md-8">

                                                <?php
                                                echo '<h2>'.$placeName.'</h2>';
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- list-single-header end -->
                            <div class="list-single-facts fl-wrap gradient-bg">
                                <!-- inline-facts -->
                                <!-- inline-facts end -->
                            </div>

                            <div class="list-single-main-item fl-wrap">
                                <div class="list-single-main-item-title fl-wrap">
                                    <?php
                                    $query = $connect->query("Select * from places WHERE place_name='$placeName'");
                                    while($row = $query -> fetch_array())
                                    {
                                        echo' <h3>About '.$placeName.' </h3>';
                                        echo'</div>';
                                        echo '<p>'.$row['description'].'</p>';
                                        echo'<span class="fw-separator"></span>';
                                        echo'<div class="list-single-main-item-title fl-wrap">';
                                        echo '<h3>Amenities</h3>';
                                        echo '</div>';
                                        echo '<div class="listing-features fl-wrap" id="sec3">';
                                        echo '<ul>';
                                        if($row['disabled_access'] === 'Y')
                                        {
                                            echo '<li><img src="picture/icon2/disable.png" height="10%" width="10%">   Disabled Access</li>';
                                        }
                                        if($row['slides'] === 'Y')
                                        {
                                            echo '<li><img src="picture/icon2/slide.png" height="10%" width="10%">  Slides </li>';
                                        }
                                        if($row['fencing'] === 'Y')
                                        {
                                            echo '<li><img src="picture/icon2/fence.png" height="10%" width="10%">   Fencing</li>';
                                        }
                                        if($row['toilet'] === 'Y')
                                        {
                                            echo '<li><img src="picture/icon2/toilet.png" height="10%" width="10%">   Public Toilet</li>';
                                        }
                                        if($row['rockers'] === 'Y')
                                        {
                                            echo '<li><img src="picture/icon2/horse-rocker.png" height="10%" width="10%">    Rockers</li>';
                                        }
                                        if($row['climbers'] === 'Y')
                                        {
                                            echo '<li><img src="picture/icon2/climber.png" height="10%" width="10%">   Climbers</li>';
                                        }
                                        if($row['see_saws'] === 'Y')
                                        {
                                            echo '<li><img src="picture/icon2/seesaw.png" height="10%" width="10%">   See Saws</li>';
                                        }
                                        if($row['swings'] === 'Y')
                                        {
                                            echo '<li><img src="picture/icon2/swings.png" height="10%" width="10%">   Swings</li>';
                                        }
                                        if($row['shade'] === 'Y')
                                        {
                                            echo '<li><img src="picture/icon2/umbrella.png" height="10%" width="10%">   Shade</li>';
                                        }
                                        if($row['liberty_swings'] === 'Y')
                                        {
                                            echo '<li><img src="picture/icon2/swing.png" height="10%" width="10%">   Liberty Swings</li>';
                                        }
                                        if($row['play_structure'] === 'Y')
                                        {
                                            echo '<li><img src="picture/icon2/playground.png" height="10%" width="10%">   Play Structure</li>';
                                        }
                                        if($row['chinup_bar'] === 'Y')
                                        {
                                            echo '<li><img src="picture/icon2/clamber.png" height="10%" width="10%">   Chinup Bar</li>';
                                        }
                                        if($row['bells_chimes'] === 'Y')
                                        {
                                            echo '<li><img src="picture/icon2/alarm.png" height="10%" width="10%">   Bells Chimes</li>';
                                        }
                                    }
                                    ?>

                                    </ul>
                                </div>
                            </div>

                            <!-- list-single-main-item-->
                            <!-- list-single-main-item end -->
                            <div class="accordion">
                            </div>
                        </div>
                    </div>
                    <!--box-widget-wrap -->
                    <div class="col-md-4">
                        <div class="box-widget-wrap">
                            <!--box-widget-item -->
                            <div class="box-widget-item fl-wrap">
                                <div class="box-widget-item-header">
                                    <h3><i class="fa fa-clock-o"> </i>  Opening Hours : </h3>
                                </div>
                                <div class="box-widget opening-hours">
                                    <div class="box-widget-content">
                                        <?php
                                        $query = $connect->query("Select * from places WHERE place_name='$placeName'");
                                        while($row = $query -> fetch_array())
                                        {
                                            echo '<ul>';
                                            echo '<li><span class="opening-hours-day">Monday </span><span class="opening-hours-time">'.$row['Monday'].'</span></li>';
                                            echo '<li><span class="opening-hours-day">Tuesday </span><span class="opening-hours-time">'.$row['Tuesday'].'</span></li>';
                                            echo '<li><span class="opening-hours-day">Wednesday </span><span class="opening-hours-time">'.$row['Wednesday'].'</span></li>';
                                            echo '<li><span class="opening-hours-day">Thursday </span><span class="opening-hours-time">'.$row['Thursday'].'</span></li>';
                                            echo '<li><span class="opening-hours-day">Friday </span><span class="opening-hours-time">'.$row['Friday'].'</span></li>';
                                            echo '<li><span class="opening-hours-day">Saturday </span><span class="opening-hours-time">'.$row['Saturday'].'</span></li>';
                                            echo '<li><span class="opening-hours-day">Sunday </span><span class="opening-hours-time">'.$row['Sunday'].'</span></li>';
                                            echo '</ul>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!--box-widget-item end -->
                            <!--box-widget-item -->
                            <!--box-widget-item end -->
                            <!--box-widget-item -->
                            <div class="box-widget-item fl-wrap">
                                <div class="box-widget-item-header">
                                    <h3>Weather in City : </h3>
                                </div>
                                <?php
                                $query = $connect->query("Select * from places WHERE place_name='$placeName'");
                                while($row = $query -> fetch_array()){
                                    echo '<div id="weather-widget" class="gradient-bg" data-city="'.$row['suburb'].'" data-country="AU"></div>';
                                }
                                ?>

                            </div>
                            <!--box-widget-item end -->
                            <!--box-widget-item -->
                            <div class="box-widget-item fl-wrap">
                                <div class="box-widget-item-header">
                                    <h3>Location / Contacts : </h3>
                                </div>
                                <div class="box-widget">
                                    <div class="map-container">
                                        <?php
                                        $query = $connect->query("Select * from places WHERE place_name='$placeName'");
                                        while($row = $query -> fetch_array()){
                                            echo '<div id="singleMap" data-latitude="'.$row['lat_coordinates'].'" data-longitude="'.$row['lng_coordinates'].'" data-mapTitle="Our Location"></div>';
                                            echo '</div>';
                                            echo '<div class="box-widget-content">';
                                            echo '<div class="list-author-widget-contacts list-item-widget-contacts">';
                                            echo '<ul>';
                                            echo '<li><span><i class="fa fa-map-marker"></i> Address :</span> <a href="#">'.$row['address'].'</a></li>';
                                        }
                                        ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--box-widget-item end -->
                        <!--box-widget-item -->
                        <!--box-widget-item end -->
                    </div>
                </div>
                <!--box-widget-wrap end -->
            </div>
    </div>
    </section>
    <!--  section  end-->
    <div class="limit-box fl-wrap"></div>
    <!--  section   -->
    <!--  section  end-->
</div>
<!--  content  end-->
</div>
<!-- wrapper end -->
<!--footer -->
<?php include "includes/footer.php"; ?>
<!--footer end  -->
<!--register form -->
<?php include "includes/registerform.php"; ?>
<!--register form end -->
<a class="to-top"><i class="fa fa-angle-up"></i></a>
</div>
<!-- Main end -->
<!--=============== scripts  ===============-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/plugins.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6uvEZqkQXhf_Ai-vj50Phw-zMEaw7zLo"></script>
<script type="text/javascript" src="js/map_infobox.js"></script>
<script type="text/javascript" src="js/markerclusterer.js"></script>
<script type="text/javascript" src="js/maps_activity.js"></script>
</body>
</html>