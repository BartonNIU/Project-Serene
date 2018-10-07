<?php
$homeActive = "";
$actActive = "";
$expActive = "";
$faqActive = "";
?>
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
            $date = "";
            $host = "";
            $ticket = "";
            $aboutHost = "";
            while($row = $query -> fetch_array())
            {
                $date = $row['date_format'];
                $orderPict = $row['id'];
                $fee = $row['fee'];
                $host = $row['organiser'];
                $ticket = $row['ticket'];
                $aboutHost = $row['about_organiser'];
                echo ' <div class="bg par-elem"  data-bg="picture/it3/act/Large/'.$orderPict.'.jpeg" data-scrollax="properties: { translateY: "30%"}"> ';
                echo'</div>';
            }
            $yyyy = substr($date,0,4);
            $mm = substr($date,4,2);
            $dd = substr($date,6,2);
            $date2 = "$mm/$dd/$yyyy";
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
                        <li><a class="act-scrlink" href="#sec1">Event</a></li>
                        <li><a href="#sec2">About</a></li>
                        <li><a href="#sec3">Disorders Info </a></li>
                        <li><a href="#sec4">Directions </a></li>
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
                            echo'<div class="breadcrumbs gradient-bg  fl-wrap"><a href="index.php">Home ></a><a href="listing_act.php"> Activities ></a><span> '.$eventName.'</span></div>';
                            ?>

                            <!-- list-single-header -->
                            <div class="list-single-header list-single-header-inside fl-wrap">
                                <div class="container">
                                    <div class="list-single-header-item">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <?php
//                                                echo $date2;
//                                                echo '---------------';
//                                                echo "year: $yyyy" ;
//                                                echo "month: $mm" ;
//                                                echo "day : $dd" ;
                                                echo '<h2>'.$eventName.'</h2>';
                                                echo '</div>';
                                                echo '<div class="col-md-4">';
                                                    echo '<div class="fl-wrap list-single-header-column">';
                                                            echo '<span class="viewed-counter"><i class="fa fa-money"></i>Fee: '.$fee.'</span>';
                                                    echo '</div>';
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

                                <div class="box-widget-item fl-wrap">
                                    <div class="box-widget-item-header">
                                        <br><br>
                                        <h3>Activity Will Begin In : </h3>
                                    </div>
                                    <?php
                                   echo' <div class="box-widget counter-widget gradient-bg" data-countDate='. $date2.'>';
                                    ?>
                                        <div class="countdown fl-wrap">
                                            <div class="countdown-item">
                                                <span class="days rot">00</span>
                                                <p>days</p>
                                            </div>
                                            <div class="countdown-item">
                                                <span class="hours rot">00</span>
                                                <p>hours </p>
                                            </div>
                                            <div class="countdown-item no-dec">
                                                <span class="minutes rot2">00</span>
                                                <p>minutes </p>
                                            </div>
                                            <div class="countdown-item-seconds">
                                                <span class="seconds rot2">00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <div class="list-single-main-item fl-wrap">

                                    <?php
                                    $query = $connect->query("Select * from activity WHERE activity_title='$eventName'");
                                    while($row = $query -> fetch_array())
                                    {



                                        echo '<div class="list-single-main-item-title fl-wrap">';
                                        echo' <h3>About '.$eventName.' </h3>';
                                        echo'</div>';
//                                        echo'<h2>Organized by: '.$host.' </h2>';
                                        echo '<p class="justy-select">'.$row['description'].'</p>';
                                        echo '<a href="javascript:ticket();" class="btn transparent-btn float-btn" >TICKETS <i class="fa fa-angle-right"></i></a>';
                                        echo'<span class="fw-separator"></span>';


                                        echo'<div class="list-single-main-item-title fl-wrap">';
                                        echo '<h3>Who Benefits The Most</h3>';

                                        echo '</div>';
                                        echo '<div class="listing-features fl-wrap" id="sec3">';
                                        echo '<ul>';

                                        if($row['odd'] === 'Y')
                                        {
                                            echo '<li data-toggle="tooltip" data-placement="top" title="Oppositional Defiant Disorder"><img src="picture/icon2/child.png" height="15%" width="15%">  ODD Children </li>';
                                        }
                                        if($row['cd'] === 'Y')
                                        {
                                            echo '<li data-toggle="tooltip" data-placement="top" title="Conduct Disorder"><img src="picture/icon2/child.png" height="15%" width="15%" >  CD Children </li>';
                                        }
                                        if($row['adhd'] === 'Y')
                                        {
                                            echo '<li data-toggle="tooltip" data-placement="top" title="Attention Deficit Hyperactivity Disorder"><img src="picture/icon2/child.png" height="15%" width="15%">   ADHD Children  </li>';
                                        }
                                        if($row['asd'] === 'Y')
                                        {
                                            echo '<li data-toggle="tooltip" data-placement="top" title="Autism Spectrum Disorder"><img src="picture/icon2/child.png" height="15%" width="15%">   ASD Children </li>';
                                        }


                                        echo '</ul>';
                                        echo'<span class="fw-separator"></span>';
                                        echo'<div class="list-single-main-item-title fl-wrap">';
                                        echo '<h3>Audience</h3>';

                                        echo '</div>';

                                        echo '<ul>';

                                        if($row['parent'] === 'Y')
                                        {
                                            echo '<li><img src="picture/icon2/father-lifting-his-baby.png" height="15%" width="15%">   Parent</li>';
                                        }
                                        if($row['child'] === 'Y')
                                        {
                                            echo '<li><img src="picture/icon2/children.png" height="15%" width="15%">  Children </li>';
                                        }
                                        echo '</ul>';

//                                        echo'<span class="fw-separator"></span>';
//
//                                        echo '<div class="list-single-main-item-title fl-wrap">';
//                                        echo' <h3>About '.$eventName.' </h3>';
//                                        echo'</div>';
//                                        echo'<h4>Organized by: '.$host.' </h4>';
                                    }
                                    ?>

                                </div>
                            </div>

                        <!-- list-single-main-item end -->
                        <div class="accordion" id="sec3">
                            <a class="toggle act-accordion" href="#"> TYPES OF BEHAVIOURAL DISORDERS IN CHILDREN (ODD, CD, ADHD, ASD)   <i class="fa fa-angle-down"></i></a>
                            <div class="accordion-inner ">
                                <p class="title"><img src="picture/icon2/child.png" height="5%" width="5%"> Oppositional Defiant Disorder (ODD) </p>
                                <h3 class="justy"> Oppositional defiant disorder (ODD) is a childhood behavioral problem characterized by constant disobedience and hostility. ODD behaviors usually surface when the child is at primary school, but the disorder can be found in children as young as three years of age.</h3>
                                <h3 class="justy">Around one in ten children under the age of 12 years are thought to have ODD, with boys outnumbering girls by two to one.
                                    Some of the typical behaviours of a child with ODD include:
                                    <br><br>
                                    • Easily angered, annoyed or irritated
                                    <br>
                                    • Frequent temper tantrums
                                    <br>
                                    • Argues frequently with adults, such as parents
                                    <br>
                                    • Refuses to obey rules
                                    <br>
                                    • Seems to deliberately try to annoy or aggravate others
                                    <br>
                                    • Low self-esteem
                                    <br>
                                    • Low frustration threshold
                                    <br>
                                    • Seeks to blame others for any misfortunes or misdeeds
                                </h3>
                                <span class="fw-separator"></span>
                                <p class="title"><img src="picture/icon2/child.png" height="5%" width="5%"> Conduct Disorder (CD) </p>
                                <h3 class="justy">Children with conduct disorder (CD) are often judged as ‘bad kids’ because of their delinquent behaviour and refusal to accept rules. Around five per cent of 10 year olds are thought to have CD, with boys outnumbering girls by four to one. Around one-third of children with CD also have attention deficit hyperactivity disorder (ADHD).

                                    Some of the typical behaviours of a child with CD may include:
                                    <br><br>
                                    • Frequent refusal to obey parents or other authority figures
                                    <br>
                                    • Repeated truancy
                                    <br>
                                    • Tendency to use drugs, including cigarettes and alcohol, at a very early age
                                    <br>
                                    • Lack of empathy for others
                                    <br>
                                    • Being aggressive to animals and other people or showing sadistic behaviours including bullying
                                    <br>
                                    • Keenness to start physical fights
                                    <br>
                                    • Using weapons in physical fights
                                    <br>
                                    • Frequent lying
                                    <br>
                                    • Criminal behaviour such as stealing, lighting fires, breaking into houses and vandalism
                                    <br>
                                    • A tendency to run away from home
                                    <br>
                                    • Suicidal tendencies – although these are more rare</h3>

                                <span class="fw-separator"></span>
                                <p class="title"><img src="picture/icon2/child.png" height="5%" width="5%"> Attention Deficit Hyperactivity Disorder (ADHD) </p>
                                <h3 class="justy">Around two to five per cent of children are thought to have attention deficit hyperactivity disorder (ADHD), with boys outnumbering girls by three to one. The characteristics of ADHD can include:
                                    <br><br>
                                    • Inattention – difficulty concentrating, forgetting instructions, moving from one task to another without completing anything.
                                    <br>
                                    • Impulsivity – talking over the top of others, having a ‘short fuse’, being accident-prone.
                                    <br>
                                    • Overactivity – constant restlessness and fidgeting.</h3>

                                <span class="fw-separator"></span>

                                <p class="title"><img src="picture/icon2/child.png" height="5%" width="5%"> Autism Spectrum Disorder (ASD) </p>
                                <h3 class="justy">Autism Spectrum Disorder (ASD) is a condition that affects a person’s ability to interact with the world around them.
                                    ASD has wide-ranging levels of severity and varying characteristics. No two people on the autism spectrum are alike.
                                    ASD is a neuro-developmental disability thought to have neurological or genetic causes (or both).
                                    However, the cause is not yet fully understood and there is no cure.
                                    A person on the autism spectrum has difficulties in some areas of their development, but other skills may develop typically.
                                    The characteristics of ASD can include:

                                    <br><br>
                                    •	Language – absent, delayed or abnormal developmental patterns <br>
                                    •	Tantrums – can be a way to express extreme confusion, stress, anxiety, anger and frustration when unable to express their emotions in another way <br>
                                    •	Body Movements – stereotypical behaviour, such as flapping and toe walking, and other behaviours that may cause self-injury, such as hand biting <br>
                                    •	Sensory Processing Differences – difficulties processing certain sounds, colours, tastes, smells and textures.
                                </h3>
                                <span class="fw-separator"></span>
                                <h2>Source: https://www.betterhealth.vic.gov.au/health/healthyliving/behavioural-disorders-in-children </h2>
                            </div>
                            <a class="toggle" href="#"> REPORT OF STATISTICS  <i class="fa fa-angle-down"></i></a>
                            <div class="accordion-inner">
                                <p class="title">-- Second Australian Child and Adolescent Survey of Mental Health and Wellbeing Highlights --</p>
                                <h3 class="justy">The second national child and adolescent
                                    survey was a household survey of parents
                                    and carers of 4-17 year-olds in the general
                                    population and 11-17 year-olds
                                    themselves. There are 6,310 families who participated in the survey.  Below is the survey results: </h3>
                                <p></p><p></p><p></p>
                                <div  id="chartContainer" style="height: 400px; width: 90%; zoom:0.75; "></div>
                                <p></p><p></p><p></p>
                                <div id="chartContainer1" style="height: 400px; width: 90%; zoom:0.75; "></div>
                                <p></p><p></p><p></p>
                                <div id="chartContainer2" style="height: 400px; width: 90%; zoom:0.75; "></div>
                                <p></p><p></p><p></p>
                                <div id="chartContainer3" style="height: 400px; width: 90%; zoom:0.75; "></div>
                                <p></p><p></p><p></p>
                                <div id="chartContainer4" style="height: 400px; width: 90%; zoom:0.75; "></div>
                                <p></p><p></p><p></p>
                                <div id="chartContainer5" style="height: 400px; width: 90%; zoom:0.75; "></div>
                                <span class="fw-separator"></span>
                                <h2>Source: https://www.health.gov.au/internet/main/publishing.nsf/Content/9DA8CA21306FE6EDCA257E2700016945/%24File/child2.pdf</h2>
                            </div>
<!--                            <a class="toggle" href="#"> Details option 3  <i class="fa fa-angle-down"></i></a>-->
<!--                            <div class="accordion-inner">-->
<!--                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</p>-->
<!--                            </div>-->
                        </div>
                        <!-- list-single-main-item -->


                        <!-- Map and Direction-->
                                <div class="list-single-main-item fl-wrap" id="sec4">
                                    <div class="list-single-main-item-title fl-wrap">
                                    <h3>Location: </h3>
                                        <br>
                                        <div class="map-container">
                                    <?php
                                    $query = $connect->query("Select * from activity WHERE activity_title='$eventName'");
                                    $lat='';
                                    $long='';
                                    while($row = $query -> fetch_array()){
                                        $lat = $row['lat_coordinates'];
                                        $long = $row['lng_coordinates'];
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
                                    <h3><i class="fa fa-clock-o"> </i>  Activity's Schedule : </h3>
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
                                            $start = $row['start'] ;
                                            $end = $row['end'];
                                            $eventTime = "$start - $end";
                                            echo '<li><span class="opening-hours-day">Date </span><span class="opening-hours-time">'.$row['date'].'</span></li>';
                                            echo '<li><span class="opening-hours-day">Time </span><span class="opening-hours-time">'.$eventTime.'</span></li>';
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


                            <!--box-widget-item -->
                            <div class="box-widget-item fl-wrap">
                                <div class="box-widget-item-header">
                                    <h3>Organized by : </h3>
                                </div>
                                <div class="box-widget list-author-widget">
                                    <div class="list-author-widget-header shapes-bg-small  color-bg fl-wrap">
                                        <span class="list-author-widget-link"><p class="selected"><?php echo $host ?></p></span>
                                        <img src="picture/icon2/host.png" alt="">
                                    </div>
                                    <div class="box-widget-content">
                                        <div class="list-author-widget-text">
                                            <div class="list-author-widget-contacts">

                                                    <p class="center-select"><?php echo $aboutHost ?></p>
<!--                                                    <li><span><i class="fa fa-envelope-o"></i> Mail :</span> <a href="#">AlisaNoory@domain.com</a></li>-->
<!--                                                    <li><span><i class="fa fa-globe"></i> Website :</span> <a href="#">themeforest.net</a></li>-->

                                            </div>
<!--                                            <a href="author-single.html" class="btn transparent-btn">View Profile <i class="fa fa-eye"></i></a>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--box-widget-item end -->
                            <div id="result2" style="height: 260px; width: 500px; padding-bottom: 40px; display: table;"></div>


                            <!--box-widget-item end -->
                            <!--box-widget-item -->
<!--                            <div class="box-widget-item fl-wrap">-->
<!--                                <div class="box-widget-item-header">-->
<!--                                    <h3>Location: </h3>-->
<!--                                </div>-->
<!--                                <div class="box-widget">-->
<!--                                    <div class="map-container">-->
<!--                                        --><?php
//                                        $query = $connect->query("Select * from activity WHERE activity_title='$eventName'");
//                                        while($row = $query -> fetch_array()){
//                                            echo '<div id="singleMap" data-latitude="'.$row['lat_coordinates'].'" data-longitude="'.$row['lng_coordinates'].'" data-mapTitle="Our Location"></div>';
////                                                 <div id="singleMap" data-latitude="40.7427837" data-longitude="-73.11445617675781" data-mapTitle="Our Location"></div>
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
<?php //include "includes/registerform.php"; ?>
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
<script type="text/javascript" src="js/canvasjs.min.js"></script>
<script type="text/javascript" src="graph.js"></script>

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

    function ticket()
    {
        var ticket = "";
            ticket = <?php echo json_encode($ticket, JSON_HEX_TAG); ?>;
        var width = parseInt((screen.availWidth/1.5));
        var height = parseInt((screen.availHeight/2));
        var left = parseInt((screen.availWidth/2) - (width/2));
        var top = parseInt((screen.availHeight/2) - (height/2));
        var windowFeatures = "width=" + width + ",height=" + height +
            ",status,resizable,left=" + left + ",top=" + top +
            "screenX=" + left + ",screenY=" + top + ",scrollbars=yes";

        var url = ticket;
        window.open(url,'Ticket', windowFeatures);
        return false;
    }

</script>


</body>
</html>