<?php
$homeActive = "act-link";
$actActive = "";
$expActive = "";
$faqActive = "";
?>
<?php include "includes/header.php"; ?>
<?php include "mysql_connect.php"; ?>
<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<!--  wrapper  -->
<div id="wrapper">
    <!-- Content-->
    <div class="content">
        <!--section -->
        <section class="scroll-con-sec hero-section" data-scrollax-parent="true" id="sec1">
            <div class="media-container video-parallax" data-scrollax="properties: { translateY: '200px' }">
                <div class="bg mob-bg" style="background-image: url(images/bg/1.jpg)"></div>
                <div class="video-container">
                    <video playsinline autoplay loop muted autobuffer class="bgvid">
                        <source src="video/covervideo.mp4" type="video/mp4">
<!--                        <source src="video/covervideo1.webm" type="video/webm">-->
                    </video>
<!--                    <iframe width="1920" height="1024" src="https://www.youtube.com/embed/p66tof5hBPs?loop=1&autoplay=1">-->
<!--                    </iframe>-->
                </div>

            </div>
            <div class="overlay"></div>
            <div class="hero-section-wrap fl-wrap">
                <div class="container">
                    <div class="intro-item fl-wrap">
                        <h2>Do you have child with a behavioural disorder? </h2>
                        <h3>Benefiting the child and nurture the relationship</h3>
                    </div>
                    <form method="post" action="listing_act.php">
                        <div class="main-search-input-wrap">
                            <div class="main-search-input fl-wrap">
                                <div class="main-search-input-item">
                                    <input id="postcode" name="postcode" type="text" placeholder="Search by Postcode Or Suburb"/>
                                    <div id="postcodeList"></div>
                                </div>
                                <div class="main-search-input-item">
                                    <select name="disorderInput" data-placeholder="All Behavioral Disorder Types" class="chosen-select" id="disorderInput" >
                                        <option value="All Disorder">All Behavioral Disorders</option>
                                        <option value="ASD">Autism Spectrum Disorder (ASD)</option>
                                        <option value="CDD">Oppositional Defiant Disorder (ODD)</option>
                                        <option value="CD">Conduct Disorder (CD)</option>
                                        <option value="ADHD">Attention Deficit Hyperactivity Disorder(ADHD)</option>
                                    </select>
                                </div>
                                <button type="submit" class="main-search-button" name="submit" ">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="bubble-bg"> </div>
            <div class="header-sec-link">
                <div class="container"><a href="#sec4" class="custom-scroll-link">Find More</a></div>
            </div>
        </section>
        <!-- section end -->

<!--        <a href="FAQ.php">-->
        <section class="color-bg" id="sec4">

            <div class="shapes-bg-big"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images-collage fl-wrap">
                            <div class="images-collage-title"><span>SERENE</span></div>
                            <div class="images-collage-main images-collage-item"><img src="picture/faq/2.jpg" alt=""></div>
                            <div class="images-collage-other images-collage-item" data-position-left="23" data-position-top="10" data-zindex="2"><img src="picture/home/1.jpeg" alt=""></div>
                            <div class="images-collage-other images-collage-item" data-position-left="62" data-position-top="54" data-zindex="5"><img src="picture/home/3.jpeg" alt=""></div>
                            <div class="images-collage-other images-collage-item anim-col" data-position-left="18" data-position-top="70" data-zindex="11"><img src="picture/home/4.jpeg" alt=""></div>
                            <div class="images-collage-other images-collage-item" data-position-left="37" data-position-top="90" data-zindex="1"><img src="picture/Activities/a.jpeg" alt=""></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="color-bg-text">
                            <h3>What Is SERENE?</h3>
                            <p>SERENE helps low income single parent families with behavioral issues children, by locating affordable activities that benefit children with Oppositional Defiant Disorders (ODD), Attention Deficit Hyperactivity Disorder (ADHD), Conduct Disorder (CD) and Autism Spectrum Disorders (ASD). It also helps parents to identify and locate parks and facilities that provide amenities and features built to help children with behavioral problems.</p>
                            <!--                                        <a href="#" class="color-bg-link modal-open">Sign In Now</a>-->
                        </div>
                    </div>
                </div>
            </div>

        </section>
<!--        </a>-->

        <!--section -->
        <section>
            <div class="container">
                <div class="section-title">
                    <h2>How it WORKS?</h2>
                    <span class="section-separator"></span>
                    <p>We help you to find and locate activities specifically catered towards children with behavioural issues</p>
                </div>
                <!--process-wrap  -->
                <div class="process-wrap fl-wrap">
                    <ul>
                        <li>
                            <a href=listing_act.php>
                                <div class="process-item">

                                    <span class="process-count">01 . </span>
                                    <div class="time-line-icon"><i class="fa fa-map-o"></i></div>
                                    <h4> Find an Activity</h4>
                                    <p>Serene offers you and your children activities in Melbourne that promote their behaviour through intellectual and physical activities</p>
                                </div>
                            </a>
                            <span class="pr-dec"></span>
                        </li>
                        <li>
                            <a href=listing.php>
                                <div class="process-item">
                                    <span class="process-count">02 .</span>
                                    <div class="time-line-icon"><i class="fa fa-map-marker"></i></div>
                                    <h4> Locate Facilities </h4>
                                    <p>You can look for free to access playgrounds, parks, gardens and sport centres that may offer activities catered to children</p>
                                </div>
                            </a>
                            <span class="pr-dec"></span>
                        </li>
                        <li>
                            <a href=FAQ.php>
                                <div class="process-item">
                                    <span class="process-count">03 .</span>
                                    <div class="time-line-icon"><i class="fa fa-heart-o"></i></div>
                                    <h4>For Parents</h4>
                                    <p>Look up activities specially catered to parents with special needs children, that help you understand their behavious and provide you with skills to calm them</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <!--process-wrap   end-->
            </div>
        </section>

        <!--section -->
        <section class="gray-section" id="sec3">
            <div class="container">
                <div class="section-title">
                    <h2>Upcoming Free Activities For Behavioral Children</h2>
                    <div class="section-subtitle"></div>
                    <span class="section-separator"></span>
                    <p>Browse through some of the upcoming free activities that can benefit the behavioural development of your child <br> and activities that help you to encourage positive behaviour in your child</p>
                </div>
            </div>
            <!-- carousel -->
            <div class="list-carousel fl-wrap card-listing ">
                <!--listing-carousel-->
                <div class="listing-carousel  fl-wrap ">
                    <?php
                    //Free Activity
                    $query = $connect->query("Select * from activity WHERE Fee='Free' ORDER BY date_format ASC;");
                    while($row = $query->fetch_array())
                    {
                        $orderPict = $row['id'];
                        $actName = $row['activity_title'];
                        $description = $row['description'] . ' ' . $actName;
                        $string = strip_tags($description);
                        if (strlen($string) > 100) {

                            // truncate string
                            $stringCut = substr($string, 0, 100);
                            $endPoint = strrpos($stringCut, ' ');

                            //if the string doesn't contain any space then it will cut without word basis.
                            $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
                            $string .= '... <a href=detail_act.php?event='.urlencode($actName).' >Read More</a>';
                        }

                        echo '<!--slick-slide-item-->';
                        echo '<div class="slick-slide-item">';
                        echo '<!-- listing-item -->';
                        echo '<div class="listing-item">';
                        echo '<article class="geodir-category-listing fl-wrap">';
                        echo '<a href=detail_act.php?event=',urlencode($actName),'>';
                        echo '<div class="geodir-category-img">';
                        echo '<img src=picture/it3/act/Small/'.$orderPict.'.jpeg>';
                        echo '<div class="overlay"></div>';
                        echo '</div>';
                        echo '</a>';
                        echo '<div class="list-post-counter"><span>'.$row['date'].'</span><i class="fa fa-calendar"></i></div>';
                        echo '<div class="geodir-category-content fl-wrap">';
                        echo '<a class="listing-geodir-category" href="listing_act.php">'. $row['fee']. '</a>';
                        echo '<h3><a href=detail_act.php?event=',urlencode($actName),'>'. $row['activity_title']. '</a></h3>';
                        echo '<p>'.$string.' </p>';
                        echo '<div class="geodir-category-options fl-wrap">';
                        echo '<div class="geodir-category-location"><a><i class="fa fa-map-marker" aria-hidden="true"></i> '. $row['suburb'].'</a></div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</article>';
                        echo '</div>';
                        echo '<!-- listing-item end-->';
                        echo '</div>';
                        echo '<!--slick-slide-item end-->';
                    }

                    ?>
                </div>
                <!--listing-carousel end-->
                <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
            </div>
            <!--  carousel end-->
        </section>
        <!-- section end -->
        <!--section -->
        <section id="sec2">
            <div class="container">
                <div class="section-title">
                    <h2>Explore Parks and Recreational Facilities in Melbourne</h2>
                    <div class="section-subtitle"></div>
                    <span class="section-separator"></span>
                    <p>Discover Melbourne's finest parks and recreational facilities that provide amenities <br>specifically designed for children with behavioural issues</p>
                </div>

                <!--Category Listing-->
                <?php
                $result_garden = $connect->query("SELECT * from explore WHERE category='Garden'");
                $row_cnt_garden = $result_garden ->num_rows;

                $result_venue = $connect->query("SELECT * from explore WHERE category='Venue'");
                $row_cnt_venue = $result_venue ->num_rows; //4

                $result_farm = $connect->query("SELECT * from explore WHERE category='Farm'");
                $row_cnt_farm = $result_farm ->num_rows; //3

                $result_park = $connect->query("SELECT * from explore WHERE category='Park'");
                $row_cnt_park = $result_park ->num_rows; //23

                $result_reserve = $connect->query("SELECT * from explore WHERE category='Reserve'");
                $row_cnt_reserve = $result_reserve ->num_rows; //4

                $result_sport = $connect->query("SELECT * from explore WHERE category='Sports Center'");
                $row_cnt_sport = $result_sport ->num_rows; //15

                $garden = "Garden";
                $park = "Park";
                $farm = "Farm";
                $venue = "Venue";
                $reserve = "Reserve";
                $sport = "Sports Center";

                echo "<!-- portfolio start -->\n";
                echo '<a href=detail_act.php>';
                echo "                            <div class=\"gallery-items fl-wrap mr-bot spad\">\n";
                echo "                                <!-- gallery-item-->\n";

                echo "                                <div class=\"gallery-item\">\n";
                echo '<a href=detail_act.php>';
                echo "                                    <div class=\"grid-item-holder\">\n";

                echo "                                        <div class=\"listing-item-grid\">\n";

                echo "                                            <img  src=\"picture/Gardens/garden.jpeg\"   alt=\"\">\n";
                echo "</a>";
                echo "                                            <div class=\"listing-counter\"><a href=listing.php?category=",urlencode($garden),"><span>".$row_cnt_garden."</span> Locations </a></div>\n";
                echo "                                            <div class=\"listing-item-cat\">\n";
                echo                                               "<h3><a href=listing.php?category=",urlencode($garden),">Garden</h3>\n";
                echo "                                                <p>Explore Melbourne's finest gardens</p></a>\n";
                echo "                                            </div>\n";
                echo "                                        </div>\n";

                echo "                                    </div>\n";
                echo "                                </div>\n";

                echo "                                <!-- gallery-item end-->\n";

                echo "                                <!-- gallery-item-->\n";
                echo "                                <div class=\"gallery-item gallery-item-second\">\n";
                echo "                                    <div class=\"grid-item-holder\">\n";
                echo "                                        <div class=\"listing-item-grid\">\n";
                echo "                                            <img  src=\"picture/Parks/park.jpeg\"   alt=\"\">\n";
                echo "                                            <div class=\"listing-counter\"><a href=listing.php?category=",urlencode($park),"><span>".$row_cnt_park."</span> Locations</a></div>\n";
                echo "                                            <div class=\"listing-item-cat\">\n";
                echo "                                                <h3><a href=listing.php?category=",urlencode($park),">Park</h3>\n";
                echo "                                                <p>Spend time in some of the tranquil locations in Melbourne</p></a>\n";
                echo "                                            </div>\n";
                echo "                                        </div>\n";
                echo "                                    </div>\n";
                echo "                                </div>\n";
                echo "                                <!-- gallery-item end-->\n";
                echo "                                <!-- gallery-item-->\n";
                echo "                                <div class=\"gallery-item\">\n";
                echo "                                    <div class=\"grid-item-holder\">\n";
                echo "                                        <div class=\"listing-item-grid\">\n";
                echo "                                            <img src=\"picture/Indoor/indoor.jpeg\"   alt=\"\">\n";
                echo "                                            <div class=\"listing-counter\"><a href=listing.php?category=",urlencode($venue),"><span>".$row_cnt_venue."</span> Locations</a></div>\n";
                echo "                                            <div class=\"listing-item-cat\">\n";
                echo "                                                <h3><a href=listing.php?category=",urlencode($venue),">Venue</h3>\n";
                echo "                                                <p>Locate venue that offer facilities and sport activities</p></a>\n";
                echo "                                            </div>\n";
                echo "                                        </div>\n";
                echo "                                    </div>\n";
                echo "                                </div>\n";
                echo "                                <!-- gallery-item end-->\n";
                echo "                                <!-- gallery-item-->\n";
                echo "                                <div class=\"gallery-item\">\n";
                echo "                                    <div class=\"grid-item-holder\">\n";
                echo "                                        <div class=\"listing-item-grid\">\n";
                echo "                                            <img  src=\"picture/it3/45.jpeg\"   alt=\"\">\n";
                echo "                                            <div class=\"listing-counter\"><a href=listing.php?category=",urlencode($farm),"><span>".$row_cnt_farm."</span> Locations</a></div>\n";
                echo "                                            <div class=\"listing-item-cat\">\n";
                echo                                                "<h3><a href=listing.php?category=",urlencode($farm),">Farm</h3>\n";
                echo "                                                <p>--------------------------------</p></a>\n";
                echo "                                            </div>\n";
                echo "                                        </div>\n";
                echo "                                    </div>\n";
                echo "                                </div>\n";
                echo "                                <!-- gallery-item end-->\n";
                echo "                                <!-- gallery-item-->\n";
                echo "                                <div class=\"gallery-item\">\n";
                echo "                                    <div class=\"grid-item-holder\">\n";
                echo "                                        <div class=\"listing-item-grid\">\n";
                echo "                                            <img  src=\"picture/Reserves/reserve.jpeg\"   alt=\"\">\n";
                echo "                                            <div class=\"listing-counter\"><a href=listing.php?category=",urlencode($reserve),"><span>".$row_cnt_reserve."</span> Locations</a></div>\n";
                echo "                                            <div class=\"listing-item-cat\">\n";
                echo "                                                <h3><a href=listing.php?category=",urlencode($reserve),">Reserve</h3>\n";
                echo "                                                <p>Visit some of the historical locations across Victoria</p></a>\n";
                echo "                                            </div>\n";
                echo "                                        </div>\n";
                echo "                                    </div>\n";
                echo "                                </div>\n";
                echo "                                <!-- gallery-item end-->\n";
                echo "                                <!-- gallery-item-->\n";
                echo "                                <div class=\"gallery-item\">\n";
                echo "                                    <div class=\"grid-item-holder\">\n";
                echo "                                        <div class=\"listing-item-grid\">\n";
                echo "                                            <img  src=\"picture/Sport Centers/sport.jpeg\"   alt=\"\">\n";
                echo "                                            <div class=\"listing-counter\"><a href=listing.php?category=",urlencode($sport),"><span>".$row_cnt_sport."</span> Locations</a></div>\n";
                echo "                                            <div class=\"listing-item-cat\">\n";
                echo "                                                <h3><a href=listing.php?category=",urlencode($sport),">Sport Center</h3>\n";
                echo "                                                <p>Melbourne is home to some of the best sports facilities</p></a>\n";
                echo "                                            </div>\n";
                echo "                                        </div>\n";
                echo "                                    </div>\n";
                echo "                                </div>\n";
                echo "                                <!-- gallery-item end-->\n";
                echo "                            </div>\n";
                echo "                            <!-- portfolio end -->";
                /* close connection */
                $connect->close();

                ?>
            </div>
        </section>
        <!-- section end -->


    </div>
    <!-- Content end -->
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

<!--The script below for password when access our website-->
<script>

//     var password = "whitecaps";
//     var passwd = document.cookie;
//     var psw = "";
//     if (passwd.indexOf(";")> -1){
//         psw = passwd.split(";")[1].split("=")[1];
//     }
//
//     alert(passwd);
//
//     // Repeatedly prompt for user password until success:
//     (function promptPass() {
//         if(psw !== password){
//             psw = prompt("Please Enter your Password");
//             document.cookie = "pass =" + psw;
//         }
//
//
//         while (psw !== password) {
//             alert("Incorrect Password");
//             return promptPass();
//         }
//
//     }());

</script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/plugins.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6uvEZqkQXhf_Ai-vj50Phw-zMEaw7zLo"></script>
<script type="text/javascript" src="complete.js"></script>
</body>
</html>
