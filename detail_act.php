<?php include "includes/header.php"?>
<?php include "mysql_connect.php";?>
<?php
$eventCatch = $_GET['event'];
if($eventCatch != "")
{
    $eventName = $eventCatch;
    //echo $eventName;
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
            $query = $connect->query("Select * from activity WHERE activity_title='$eventName'");
            $fee ="";
            while($row = $query -> fetch_array())
            {
                $orderPict = $row['id'];
                $fee = $row['fee'];
                echo ' <div class="bg par-elem"  data-bg="picture/it2/Activities/'.$orderPict.'.jpeg" data-scrollax="properties: { translateY: "30%"}"> ';
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
                        <!--                            <li><a href="#sec3">Video </a></li>-->
                    </ul>
                </nav>
                <!--                    <a href="#" class="save-btn"> <i class="fa fa-heart"></i> Save </a>-->
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
                            echo'<div class="breadcrumbs gradient-bg  fl-wrap"><a href="index.php">Home</a><a href="listing_act.php">Activities</a><span>'.$eventName.'</span></div>';
                            ?>

                            <!-- list-single-header -->
                            <div class="list-single-header list-single-header-inside fl-wrap">
                                <div class="container">
                                    <div class="list-single-header-item">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <?php
                                                echo '<h2>'.$eventName.'</h2>';
                                                echo '</div>';
                                                echo '<div class="col-md-4">';
                                                    echo '<div class="fl-wrap list-single-header-column">';
                                                            echo '<span class="viewed-counter"><i class="fa fa-money"></i>Fee: '.$fee.'</span>';
                                                    echo '</div>';
                                                echo '</div>';

                                                ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- list-single-header end -->
                            <div class="list-single-facts fl-wrap gradient-bg">
                            </div>

                            <div class="list-single-main-item fl-wrap">
                                <div class="list-single-main-item-title fl-wrap">
                                    <?php
                                    $query = $connect->query("Select * from activity WHERE activity_title='$eventName'");
                                    while($row = $query -> fetch_array())
                                    {
                                        echo' <h3>About '.$eventName.' </h3>';
                                        echo'</div>';
                                        echo '<p>'.$row['description'].'</p>';
                                        //                                 echo '<a href="#" class="btn transparent-btn float-btn">Visit Website <i class="fa fa-angle-right"></i></a>';
                                        echo'<span class="fw-separator"></span>';
                                        echo'<div class="list-single-main-item-title fl-wrap">';
                                        echo '<h3>Audience</h3>';
                                        echo '</div>';
                                        echo '<div class="listing-features fl-wrap" id="sec3">';
                                        echo '<ul>';
                                        if($row['parent'] === 'Y')
                                        {
                                            echo '<li><img src="picture/icon2/father-lifting-his-baby.png" height="15%" width="15%">   Parent</li>';
                                        }
                                        if($row['child'] === 'Y')
                                        {
                                            echo '<li><img src="picture/icon2/children.png" height="15%" width="15%">  Children </li>';
                                        }
                                    }
                                    ?>
                                    </ul>
                                </div>
                            </div>
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
                                    <h3><i class="fa fa-clock-o"> </i>  Event's Date : </h3>
                                </div>
                                <div class="box-widget opening-hours">
                                    <div class="box-widget-content">
                                        <?php
                                        $query = $connect->query("Select * from activity WHERE activity_title='$eventName'");
                                        $date ="";
                                        $timeStart = "";
                                        $timeEnd = "";
                                        $location = "";
                                        while($row = $query -> fetch_array())
                                        {
//                                                    echo '<span class="current-status"><i class="fa fa-clock-o"></i> Daily Schedule</span>';
                                            echo '<ul>';
                                            $date = $row['date_format'];
                                            $timeStart = $row['time_start'];
                                            $timeEnd = $row['time_end'];
                                            $location = $row['address'];
                                            echo '<li><span class="opening-hours-day">Date </span><span class="opening-hours-time">'.$row['date'].'</span></li>';
                                            echo '<li><span class="opening-hours-day">Time </span><span class="opening-hours-time">'.$row['time'].'</span></li>';
                                            echo '<button class="btn color-bg flat-btn" onclick="popUpCal();">+  Add Event to Your Google Calender</button>';
                                            echo '</ul>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="box-widget-item fl-wrap">
                                <div class="box-widget-item-header">
                                    <h3>Weather in City : </h3>
                                </div>
                                <?php
                                $query = $connect->query("Select * from activity WHERE activity_title='$eventName'");
                                while($row = $query -> fetch_array()){
                                    echo '<div id="weather-widget" class="gradient-bg" data-city="'.$row['suburb'].'" data-country="AU"></div>';
                                }
                                ?>

                            </div>
                            <!--box-widget-item end -->
                            <!--box-widget-item -->
                            <div class="box-widget-item fl-wrap">
                                <div class="box-widget-item-header">
                                    <h3>Location: </h3>
                                </div>
                                <div class="box-widget">
                                    <div class="map-container">
                                        <?php
                                        $query = $connect->query("Select * from activity WHERE activity_title='$eventName'");
                                        while($row = $query -> fetch_array()){
                                            echo '<div id="singleMap" data-latitude="'.$row['lat_coordinates'].'" data-longitude="'.$row['lng_coordinates'].'" data-mapTitle="Our Location"></div>';
//                                                 <div id="singleMap" data-latitude="40.7427837" data-longitude="-73.11445617675781" data-mapTitle="Our Location"></div>
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
                    </div>
                </div>
                <!--box-widget-wrap end -->
            </div>
    </div>
    </section>
    <!--  section  end-->
    <div class="limit-box fl-wrap"></div>
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
    function popUpCal()
    {
        var eventName = "";
            eventName = <?php echo json_encode($eventName, JSON_HEX_TAG); ?>;
        var result2 = eventName.replace(/ /g, "\+");
        var result =
            eventName.
            split(" ").
            join("+");
        var date = "";
            date = <?php echo json_encode($date, JSON_HEX_TAG); ?>;
        var timeStart = "";
            timeStart = <?php echo json_encode($timeStart, JSON_HEX_TAG); ?>;
        var timeEnd = "";
            timeEnd = <?php echo json_encode($timeEnd, JSON_HEX_TAG); ?>;
        var location = "";
            location = <?php echo json_encode($location, JSON_HEX_TAG); ?>;

        var detail = "";
            detail = "For more activities please go to: https://serene.tk/listing_act.php";

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


        var checkDateFormat = date.charAt(0);
        var url = "https://www.google.com/calendar/render?action=TEMPLATE&text="+ eventName +"&dates="+date+"T"+timeStart+"/"+date+"T"+timeEnd+"&details="+detail+"&location="+location+"&ctz=AET&sf=true&output=xml";

        if(checkDateFormat != "2")
        {
            var url = "https://www.google.com/calendar/render?action=TEMPLATE&text="+ eventName +"&dates="+today+"T"+timeStart+"/"+today+"T"+timeEnd+"&details="+detail+"&location="+location+"&ctz=AET&sf=true&output=xml";
        }


        var width = parseInt((screen.availWidth/2));
        var height = parseInt((screen.availHeight/1.5));
        var left = parseInt((screen.availWidth/4) - (width/4));
        var top = parseInt((screen.availHeight/3) - (height/3));
        var windowFeatures = "width=" + width + ",height=" + height +
            ",status,resizable,left=" + left + ",top=" + top +
            "screenX=" + left + ",screenY=" + top + ",scrollbars=yes";

        window.open(url, "subWind", windowFeatures, "POS");
    }

    function openLink()
    {
        window.open('https://www.google.com/calendar/render?action=TEMPLATE&text=Your+Event+Name&dates=20180927T144000/20180927T221500&details=For+details,+link+here:+http://www.example.com&location=Waldorf+Astoria,+301+Park+Ave+,+New+York,+NY+10022&ctz=AET&sf=true&output=xml','1429893142534','width=' + (parseInt(window.innerWidth) * 0.5) + ',height=' + (parseInt(window.innerHeight) * .5) + ',toolbar=0,menubar=0,location=0,status=0,resizable=yes,scrollbars=yes,left=0,top=0');
        return false;
    }
</script>


</body>
</html>