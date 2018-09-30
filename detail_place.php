<?php
$homeActive = "";
$actActive = "";
$expActive = "";
$faqActive = "";
?>
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
            $query = $connect->query("Select * from explore WHERE place_name='$placeName'");
            while($row = $query -> fetch_array())
            {
                $orderPict = $row['id'];
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
                                                echo '</div>';
                                                echo '<div class="col-md-4">';
                                                echo '<div class="share-holder hid-share">';
                                                echo '<div class="showshare"><span>Share </span><i class="fa fa-share"></i></div>';
                                                echo '<div class="share-container  isShare"></div>';
                                                echo '</div>';
                                                echo '</div>';
                                                ?>

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
                                    $query = $connect->query("Select * from explore WHERE place_name='$placeName'");
                                    while($row = $query -> fetch_array())
                                    {
                                        echo' <h3>About '.$placeName.' </h3>';
                                        echo'</div>';
                                        echo '<p>'.$row['description'].'</p>';
                                        echo'<span class="fw-separator"></span>';
                                        echo'<div class="list-single-main-item-title fl-wrap">';
                                        echo '<h3>General Amenities</h3>';
                                        echo '</div>';
                                        echo '<div class="listing-features fl-wrap" id="sec3">';
                                        echo '<ul>';

                                        if($row['slides'] === 'Y')
                                        {
                                            echo '<li><img src="picture/icon2/slide.png" height="10%" width="10%">  Slides </li>';
                                        }

                                        if($row['public_toilet'] === 'Y')
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

                                        if($row['play_structure'] === 'Y')
                                        {
                                            echo '<li><img src="picture/icon2/playground.png" height="10%" width="10%">   Play Structure</li>';
                                        }
                                        if($row['chinup_bar'] === 'Y')
                                        {
                                            echo '<li><img src="picture/icon2/clamber.png" height="10%" width="10%">   Chinup Bar</li>';
                                        }
                                        if($row['bus_stops'] === 'Y')
                                        {
                                            echo '<li><img src="picture/icon2/bus.png" height="10%" width="10%">   Bus Access</li>';
                                        }
                                        if($row['trains_stops'] === 'Y')
                                        {
                                            echo '<li><img src="picture/icon2/train.png" height="10%" width="10%">  Train Access</li>';
                                        }



                                        echo '</ul>';
                                        echo'<span class="fw-separator"></span>';
                                        echo'<div class="list-single-main-item-title fl-wrap">';
                                        echo '<h3>Special Amenities</h3>';
                                        echo '</div>';

                                        echo '<ul>';
                                        $swing = "The Liberty Swing is a world-first Australian innovation – a swing that allows children in wheelchairs the opportunity to experience the joy of having a swing in the park. It is the only swing of its type that is fully lockable and allows a maximum swing height – that is, really swinging, not just rocking back and forth.";
                                        $windChime = "The facility has access to sensory equipment such as windchimes, musical sidewalks, bells and other sounds to aid the visually impaired";
                                        $fencing = "Fencing around a park could either be metallic or wooden. They are a key aspect of landscaping and essential for barricading and safety";
                                        $disable = "Access to these facilities may be wheelchair-accessible toilets, lift buttons within reach, tactile and audible lift signals for people with vision impairments";

                                        if($row['disabled_access'] === 'Y')
                                        {
                                            echo '<li data-toggle="tooltip" data-placement="top" title="Access to these facilities may be wheelchair-accessible toilets, lift buttons within reach, tactile and audible lift signals for people with vision impairments"><img src="picture/icon2/disable.png" height="10%" width="10%">   Disabled Access</li>';
                                        }
                                        if($row['bells_chimes'] === 'Y')
                                        {
                                            echo '<li data-toggle="tooltip" data-placement="top" title="The facility has access to sensory equipment such as windchimes, musical sidewalks, bells and other sounds to aid the visually impaired"><img src="picture/icon2/alarm.png" height="10%" width="10%">   Wind Chimes</li>';
                                        }
                                        if($row['liberty_swings'] === 'Y')
                                        {
                                            echo '<li  data-toggle="tooltip" data-placement="top" title="The Liberty Swing is a world-first Australian innovation – a swing that allows children in wheelchairs the opportunity to experience the joy of having a swing in the park. It is the only swing of its type that is fully lockable and allows a maximum swing height – that is, really swinging, not just rocking back and forth."><img src="picture/icon2/swing.png" height="10%" width="10%">   Liberty Swings</li>';
                                        }
                                        if($row['fencing'] === 'Y')
                                        {
                                            echo '<li data-toggle="tooltip" data-placement="top" title="Fencing around a park could either be metallic or wooden. They are a key aspect of landscaping and essential for barricading and safety"><img src="picture/icon2/fence.png" height="10%" width="10%">   Fencing</li>';
                                        }

                                        echo '</ul>';

                                    }


                                    ?>



                                </div>
                            </div>

                            <!-- list-single-main-item-->
                            <!-- list-single-main-item end -->
                            <!-- Map and Direction-->
                            <div class="list-single-main-item fl-wrap">
                                <div class="list-single-main-item-title fl-wrap">
                                    <h3>Location: </h3>
                                    <br>
                                    <div class="map-container">
                                <?php
                                $query = $connect->query("Select * from explore WHERE place_name='$placeName'");
                                $lat='';
                                $long='';
                                $location = '';
                                while($row = $query -> fetch_array()){
                                    $lat = $row['lat_coordinates'];
                                    $long = $row['lng_coordinates'];
                                    $location = $row['address'];
                                    echo '<div id="singleMap" data-latitude="'.$row['lat_coordinates'].'" data-longitude="'.$row['lng_coordinates'].'" data-mapTitle="Our Location"></div>';
                                    echo '</div>';
                                    echo '<div class="list-author-widget-contacts list-item-widget-contacts">';
                                    echo '<ul>';
//                                        echo '<li><span><i class="fa fa-map-marker"></i> Address :</span> <a href="https://www.google.com/maps?saddr=My+Location&daddr='.$lat.','.$long.'">'.$row['address'].'</a></li>';
                                    echo '<li><span><p><i class="fa fa-map-marker"></i> Address : </span>'.$row['address'].'</p></li>';
                                    echo '<button class="btn fs-map-btn  color-bg flat-btn" onclick="openLocation()">Directions <i class="fa fa-location-arrow" aria-hidden="true"></i></button>';


                                    echo '</div>';
                                }
                                ?>
                                </div>
                                </div>
                                <!-- End Map and Direction-->


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
                                        $query = $connect->query("Select * from explore WHERE place_name='$placeName'");
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
                                            echo '<button class="btn color-bg flat-btn" onclick="popUpCal();">+  Add Visit Plan to Your Google Calender</button>';
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
                                $query = $connect->query("Select * from explore WHERE place_name='$placeName'");
                                while($row = $query -> fetch_array()){
                                    echo '<div id="weather-widget" class="gradient-bg" data-city="'.$row['suburb'].'" data-country="AU"></div>';
                                }
                                ?>

                            </div>
                            <!--box-widget-item end -->
                            <!--box-widget-item -->
<!--                            <div class="box-widget-item fl-wrap">-->
<!--                                <div class="box-widget-item-header">-->
<!--                                    <h3>Location / Contacts : </h3>-->
<!--                                </div>-->
<!--                                <div class="box-widget">-->
<!--                                    <div class="map-container">-->
<!--                                        --><?php
//                                        $query = $connect->query("Select * from explore WHERE place_name='$placeName'");
//                                        while($row = $query -> fetch_array()){
//                                            echo '<div id="singleMap" data-latitude="'.$row['lat_coordinates'].'" data-longitude="'.$row['lng_coordinates'].'" data-mapTitle="Our Location"></div>';
//                                            echo '</div>';
//                                            echo '<div class="box-widget-content">';
//                                            echo '<div class="list-author-widget-contacts list-item-widget-contacts">';
//                                            echo '<ul>';
//                                            echo '<li><span><i class="fa fa-map-marker"></i> Address :</span> <a href="#">'.$row['address'].'</a></li>';
//                                        }
//                                        ?>
<!--                                        </ul>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
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
<script type="text/javascript" src="js/maps.js"></script>
<script>
    function openLocation()
    {
        var lat = "";
        var long = "";
        lat = <?php echo json_encode($lat, JSON_HEX_TAG); ?>;
        long = <?php echo json_encode($long, JSON_HEX_TAG); ?>;

        var width = parseInt((screen.availWidth/1.5));
        var height = parseInt((screen.availHeight/2));
        var left = parseInt((screen.availWidth/2) - (width/2));
        var top = parseInt((screen.availHeight/2) - (height/2));
        var windowFeatures = "width=" + width + ",height=" + height +
            ",status,resizable,left=" + left + ",top=" + top +
            "screenX=" + left + ",screenY=" + top + ",scrollbars=yes";


        var url = "https://www.google.com/maps?saddr=My+Location&daddr="+ lat +","+ long;
        window.open(url,'Event Direction', windowFeatures);
        return false;
    }

    function popUpCal()
    {
        var eventName = "";
        eventName = <?php echo json_encode($placeName, JSON_HEX_TAG); ?>;
        var location = "";
        location = <?php echo json_encode($location, JSON_HEX_TAG); ?>;

        var detail = "";
        detail = "Visiting " + eventName +". For more exploration please go to: https://serene.tk/listing.php";

        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();

        if(dd<10) {
            dd = '0'+dd
        }

        if(mm<10) {
            mm = '0'+mm
        }


        today = yyyy+mm+dd;


        // var checkDateFormat = date.charAt(0);
        var url = "https://www.google.com/calendar/render?action=TEMPLATE&text="+ eventName +"&details="+detail+"&location="+location+"&ctz=AET&sf=true&output=xml";

        // if(checkDateFormat != "2")
        // {
        //     var url = "https://www.google.com/calendar/render?action=TEMPLATE&text="+ eventName +"&dates="+today+"&details="+detail+"&location="+location+"&ctz=AET&sf=true&output=xml";
        // }


        var width = parseInt((screen.availWidth/2));
        var height = parseInt((screen.availHeight/1.5));
        var left = parseInt((screen.availWidth/4) - (width/4));
        var top = parseInt((screen.availHeight/3) - (height/3));
        var windowFeatures = "width=" + width + ",height=" + height +
            ",status,resizable,left=" + left + ",top=" + top +
            "screenX=" + left + ",screenY=" + top + ",scrollbars=yes";

        window.open(url, "subWind", windowFeatures, "POS");
    }
</script>
</body>
</html>