<?php include "includes/header.php"; ?>
            <!--  wrapper  -->
            <div id="wrapper">
                <!-- Content-->
                <div class="content">
                    <!--section -->
                    <section class="scroll-con-sec hero-section" data-scrollax-parent="true" id="sec1">
                        <div class="bg"  data-bg="picture/homepage.gif" data-scrollax="properties: { translateY: '200px' }"></div>
                        <div class="overlay"></div>
                        <div class="hero-section-wrap fl-wrap">
                            <div class="container">
                                <div class="intro-item fl-wrap">
                                    <h2>Find activities and play areas</h2>
                                    <h3>In and around Melbourne</h3>
                                </div>

                                <?php
/*                                    if(isset($_POST['submit'])){
                                        $postcode=$_POST['postcode'];
                                        $suburb=$_POST['suburb'];
                                    }
                                */?>

                                <form method="post" action="listing_act.php">
                                <div class="main-search-input-wrap">
                                    <div class="main-search-input fl-wrap">
                                        <div class="main-search-input-item">
                                           <input id="postcode" name="postcode" type="text" placeholder="Put your postcode here"/>
                                       </div>
                                        <div class="main-search-input-item location" id="autocomplete-container">
                                            <input type="text" placeholder="Suburb" id="suburb" name="suburb"/>
                                        </div>
                                        <button type="submit" class="main-search-button" name="submit" ">Search</button>
                                    </div>
                                </div>

                                </form>
                            </div>


                        </div>
                        <div class="bubble-bg"> </div>
                        <div class="header-sec-link">
                            <div class="container"><a href="#sec3" class="custom-scroll-link">Find More</a></div>
                        </div>
                    </section>
                    <!-- section end -->


                    <!--section -->
                    <section class="gray-section" id="sec3">
                        <div class="container">
                            <div class="section-title">
                                <h2>Upcoming Free Activities</h2>
                                <div class="section-subtitle">Best Listings</div>
                                <span class="section-separator"></span>
                                <p>Browse through some of the upcoming free activities for you and your child</p>
                            </div>
                        </div>
                        <!-- carousel -->
                        <div class="list-carousel fl-wrap card-listing ">
                            <!--listing-carousel-->
                            <div class="listing-carousel  fl-wrap ">
                                <?php
                                error_reporting(E_ALL & ~E_NOTICE);

                                // Random Image function
                                function random_image($directory)
                                {
                                    $leading = substr($directory, 0, 1);
                                    $trailing = substr($directory, -1, 1);

                                    if($leading == '/')
                                    {
                                        $directory = substr($directory, 1);
                                    }
                                    if($trailing != '/')
                                    {
                                        $directory = $directory . '/';
                                    }

                                    if(empty($directory) or !is_dir($directory))
                                    {
                                        die('Directory: ' . $directory . ' not found.');
                                    }

                                    $files = scandir($directory, 1);

                                    $make_array = array();

                                    foreach($files AS $id => $file)
                                    {
                                        $info = pathinfo($directory . $file);

                                        $image_extensions = array('jpg', 'jpeg', 'gif', 'png', 'ico');
                                        if(!in_array($info['extension'], $image_extensions))
                                        {
                                            unset($file);
                                        }
                                        else
                                        {
                                            $file = str_replace(' ', '%20', $file);
                                            $temp = array($id => $file);
                                            array_push($make_array, $temp);
                                        }
                                    }

                                    if(sizeof($make_array) == 0)
                                    {
                                        die('No images in ' . $directory . ' Directory');
                                    }

                                    $total = count($make_array) - 1;

                                    $random_image = rand(0, $total);
                                    return $directory . $make_array[$random_image][$random_image];

                                }

                                $mysqli = new mysqli("localhost","root","monash123","fit5120");

                                /* check connection */
                                if (mysqli_connect_errno()){
                                    printf("Connect failed: %s\n", mysqli_connect_error());
                                    exit();
                                }
                                $query = $mysqli->query("Select * from activity WHERE fee='Free'");

                                while($row = $query->fetch_array()) {
                                    echo '<!--slick-slide-item-->';
                                    echo '<div class="slick-slide-item">';
                                    echo '<!-- listing-item -->';
                                    echo '<div class="listing-item">';
                                    echo '<article class="geodir-category-listing fl-wrap">';
                                    echo '<div class="geodir-category-img">';
/*                                    echo '<img src="<?php=$randomImage;?>" alt="">';*/
                                    echo "<img src=" . random_image('picture/Activities') . " />";
                                    echo '<div class="overlay"></div>';
//                                echo '<div class="list-post-counter"><span>4</span><i class="fa fa-heart"></i></div>';
                                    echo '</div>';
                                    echo '<div class="geodir-category-content fl-wrap">';
//                                echo '<a class="listing-geodir-category" href="listing.html"> Activity </a>';
                                    echo '<a class="listing-geodir-category"> Activity </a>';
//                                echo '<div class="listing-avatar"><a href="author-single.html"><img src="images/avatar/1.jpg" alt=""></a>';
//                                echo '<span class="avatar-tooltip">Added By  <strong>Lisa Smith</strong></span>';
//                                echo '</div>';
//                                    echo '<h3><a href="listing-single.html">'. $row['Article Title']. '</a></h3>';
                                    echo '<h3>'. $row['activity_title']. '</h3>';
                                    echo '<p>'. $row['description']. ' </p>';
                                    echo '<div class="geodir-category-options fl-wrap">';
//                                echo '<div class="listing-rating card-popup-rainingvis" data-starrating2="5">';
//                                echo '<span>(7 reviews)</span>';
//                                echo '</div>';
                                    echo '<div class="geodir-category-location"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> '. $row['address']. '</a></div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</article>';
                                    echo '</div>';
                                    echo '<!-- listing-item end-->';
                                    echo '</div>';
                                    echo '<!--slick-slide-item end-->';
                                }

                                /* close connection */
                                $mysqli->close();

                                ?>


                                <!--                                <!--slick-slide-item-->
                                <!--                                <div class="slick-slide-item">-->
                                <!--                                    <!-- listing-item -->
                                <!--                                    <div class="listing-item">-->
                                <!--                                        <article class="geodir-category-listing fl-wrap">-->
                                <!--                                            <div class="geodir-category-img">-->
                                <!--                                                <img src="images/all/1.jpg" alt="">-->
                                <!--                                                <div class="overlay"></div>-->
                                <!--                                                <div class="list-post-counter"><span>4</span><i class="fa fa-heart"></i></div>-->
                                <!--                                            </div>-->
                                <!--                                            <div class="geodir-category-content fl-wrap">-->
                                <!--                                                <a class="listing-geodir-category" href="listing.html">Retail</a>-->
                                <!--                                                <div class="listing-avatar"><a href="author-single.html"><img src="images/avatar/1.jpg" alt=""></a>-->
                                <!--                                                    <span class="avatar-tooltip">Added By  <strong>Lisa Smith</strong></span>-->
                                <!--                                                </div>-->
                                <!--                                                <h3><a href="listing-single.html">Event in City Mol</a></h3>-->
                                <!--                                                <p>Sed interdum metus at nisi tempor laoreet.  </p>-->
                                <!--                                                <div class="geodir-category-options fl-wrap">-->
                                <!--                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5">-->
                                <!--                                                        <span>(7 reviews)</span>-->
                                <!--                                                    </div>-->
                                <!--                                                    <div class="geodir-category-location"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> 27th Brooklyn New York, NY 10065</a></div>-->
                                <!--                                                </div>-->
                                <!--                                            </div>-->
                                <!--                                        </article>-->
                                <!--                                    </div>-->
                                <!--                                    <!-- listing-item end-->
                                <!--                                </div>-->
                                <!--                                <!--slick-slide-item end-->
                                <!---->
                                <!---->
                                <!---->
                                <!---->
                                <!--                                <!--slick-slide-item-->
                                <!--                                <div class="slick-slide-item">-->
                                <!--                                    <!-- listing-item -->
                                <!--                                    <div class="listing-item">-->
                                <!--                                        <article class="geodir-category-listing fl-wrap">-->
                                <!--                                            <div class="geodir-category-img">-->
                                <!--                                                <img src="images/all/1.jpg" alt="">-->
                                <!--                                                <div class="overlay"></div>-->
                                <!--                                                <div class="list-post-counter"><span>15</span><i class="fa fa-heart"></i></div>-->
                                <!--                                            </div>-->
                                <!--                                            <div class="geodir-category-content fl-wrap">-->
                                <!--                                                <a class="listing-geodir-category" href="listing.html">Event</a>-->
                                <!--                                                <div class="listing-avatar"><a href="author-single.html"><img src="images/avatar/1.jpg" alt=""></a>-->
                                <!--                                                    <span class="avatar-tooltip">Added By  <strong>Mark Rose</strong></span>-->
                                <!--                                                </div>-->
                                <!--                                                <h3><a href="listing-single.html">Cafe "Lollipop"</a></h3>-->
                                <!--                                                <p>Morbi suscipit erat in diam bibendum rutrum in nisl.</p>-->
                                <!--                                                <div class="geodir-category-options fl-wrap">-->
                                <!--                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="4">-->
                                <!--                                                        <span>(17 reviews)</span>-->
                                <!--                                                    </div>-->
                                <!--                                                    <div class="geodir-category-location"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> 27th Brooklyn New York, NY 10065</a></div>-->
                                <!--                                                </div>-->
                                <!--                                            </div>-->
                                <!--                                        </article>-->
                                <!--                                    </div>-->
                                <!--                                    <!-- listing-item end-->
                                <!--                                </div>-->
                                <!--                                <!--slick-slide-item end-->
                                <!--                                <!--slick-slide-item-->
                                <!--                                <div class="slick-slide-item">-->
                                <!--                                    <!-- listing-item -->
                                <!--                                    <div class="listing-item">-->
                                <!--                                        <article class="geodir-category-listing fl-wrap">-->
                                <!--                                            <div class="geodir-category-img">-->
                                <!--                                                <img src="images/all/1.jpg" alt="">-->
                                <!--                                                <div class="overlay"></div>-->
                                <!--                                                <div class="list-post-counter"><span>13</span><i class="fa fa-heart"></i></div>-->
                                <!--                                            </div>-->
                                <!--                                            <div class="geodir-category-content fl-wrap">-->
                                <!--                                                <a class="listing-geodir-category" href="listing.html">Gym </a>-->
                                <!--                                                <div class="listing-avatar"><a href="author-single.html"><img src="images/avatar/1.jpg" alt=""></a>-->
                                <!--                                                    <span class="avatar-tooltip">Added By  <strong>Nasty Wood</strong></span>-->
                                <!--                                                </div>-->
                                <!--                                                <h3><a href="listing-single.html">Gym In Brooklyn</a></h3>-->
                                <!--                                                <p>Morbiaccumsan ipsum velit tincidunt . </p>-->
                                <!--                                                <div class="geodir-category-options fl-wrap">-->
                                <!--                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="3">-->
                                <!--                                                        <span>(16 reviews)</span>-->
                                <!--                                                    </div>-->
                                <!--                                                    <div class="geodir-category-location"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> 27th Brooklyn New York, NY 10065</a></div>-->
                                <!--                                                </div>-->
                                <!--                                            </div>-->
                                <!--                                        </article>-->
                                <!--                                    </div>-->
                                <!--                                    <!-- listing-item end-->
                                <!--                                </div>-->
                                <!--                                <!--slick-slide-item end-->
                                <!--                                <!--slick-slide-item-->
                                <!--                                <div class="slick-slide-item">-->
                                <!--                                    <!-- listing-item -->
                                <!--                                    <div class="listing-item">-->
                                <!--                                        <article class="geodir-category-listing fl-wrap">-->
                                <!--                                            <div class="geodir-category-img">-->
                                <!--                                                <img src="images/all/1.jpg" alt="">-->
                                <!--                                                <div class="overlay"></div>-->
                                <!--                                                <div class="list-post-counter"><span>3</span><i class="fa fa-heart"></i></div>-->
                                <!--                                            </div>-->
                                <!--                                            <div class="geodir-category-content fl-wrap">-->
                                <!--                                                <a class="listing-geodir-category" href="listing.html">Shops</a>-->
                                <!--                                                <div class="listing-avatar"><a href="author-single.html"><img src="images/avatar/1.jpg" alt=""></a>-->
                                <!--                                                    <span class="avatar-tooltip">Added By  <strong>Nasty Wood</strong></span>-->
                                <!--                                                </div>-->
                                <!--                                                <h3><a href="listing-single.html">Shop in Boutique Zone</a></h3>-->
                                <!--                                                <p>Morbiaccumsan ipsum velit tincidunt . </p>-->
                                <!--                                                <div class="geodir-category-options fl-wrap">-->
                                <!--                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="4">-->
                                <!--                                                        <span>(6 reviews)</span>-->
                                <!--                                                    </div>-->
                                <!--                                                    <div class="geodir-category-location"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> 27th Brooklyn New York, NY 10065</a></div>-->
                                <!--                                                </div>-->
                                <!--                                            </div>-->
                                <!--                                        </article>-->
                                <!--                                    </div>-->
                                <!--                                    <!-- listing-item end-->
                                <!--                                </div>-->
                                <!--                                <!--slick-slide-item end-->
                                <!--                                <!--slick-slide-item-->
                                <!--                                <div class="slick-slide-item">-->
                                <!--                                    <!-- listing-item -->
                                <!--                                    <div class="listing-item">-->
                                <!--                                        <article class="geodir-category-listing fl-wrap">-->
                                <!--                                            <div class="geodir-category-img">-->
                                <!--                                                <img src="images/all/1.jpg" alt="">-->
                                <!--                                                <div class="overlay"></div>-->
                                <!--                                                <div class="list-post-counter"><span>35</span><i class="fa fa-heart"></i></div>-->
                                <!--                                            </div>-->
                                <!--                                            <div class="geodir-category-content fl-wrap">-->
                                <!--                                                <a class="listing-geodir-category" href="listing.html">Cars</a>-->
                                <!--                                                <div class="listing-avatar"><a href="author-single.html"><img src="images/avatar/1.jpg" alt=""></a>-->
                                <!--                                                    <span class="avatar-tooltip">Added By  <strong>Kliff Antony</strong></span>-->
                                <!--                                                </div>-->
                                <!--                                                <h3><a href="listing-single.html">Best deal For the Cars</a></h3>-->
                                <!--                                                <p>Lorem ipsum gravida nibh vel velit.</p>-->
                                <!--                                                <div class="geodir-category-options fl-wrap">-->
                                <!--                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5">-->
                                <!--                                                        <span>(11 reviews)</span>-->
                                <!--                                                    </div>-->
                                <!--                                                    <div class="geodir-category-location"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> 27th Brooklyn New York, NY 10065</a></div>-->
                                <!--                                                </div>-->
                                <!--                                            </div>-->
                                <!--                                        </article>-->
                                <!--                                    </div>-->
                                <!--                                    <!-- listing-item end-->
                                <!--                                </div>-->
                                <!--                                <!--slick-slide-item end-->
                                <!--                                <!--slick-slide-item-->
                                <!--                                <div class="slick-slide-item">-->
                                <!--                                    <!-- listing-item -->
                                <!--                                    <div class="listing-item">-->
                                <!--                                        <article class="geodir-category-listing fl-wrap">-->
                                <!--                                            <div class="geodir-category-img">-->
                                <!--                                                <img src="images/all/1.jpg" alt="">-->
                                <!--                                                <div class="overlay"></div>-->
                                <!--                                                <div class="list-post-counter"><span>553</span><i class="fa fa-heart"></i></div>-->
                                <!--                                            </div>-->
                                <!--                                            <div class="geodir-category-content fl-wrap">-->
                                <!--                                                <a class="listing-geodir-category" href="listing.html">Restourants</a>-->
                                <!--                                                <div class="listing-avatar"><a href="author-single.html"><img src="images/avatar/1.jpg" alt=""></a>-->
                                <!--                                                    <span class="avatar-tooltip">Added By  <strong>Adam Koncy</strong></span>-->
                                <!--                                                </div>-->
                                <!--                                                <h3><a href="listing-single.html">Luxury Restourant</a></h3>-->
                                <!--                                                <p>Sed non neque elit. Sed ut imperdie.</p>-->
                                <!--                                                <div class="geodir-category-options fl-wrap">-->
                                <!--                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5">-->
                                <!--                                                        <span>(7 reviews)</span>-->
                                <!--                                                    </div>-->
                                <!--                                                    <div class="geodir-category-location"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> 27th Brooklyn New York, NY 10065</a></div>-->
                                <!--                                                </div>-->
                                <!--                                            </div>-->
                                <!--                                        </article>-->
                                <!--                                    </div>-->
                                <!-- listing-item end-->
                                <!--                                </div>
                                                                <!--slick-slide-item end-->
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
                                <h2>Featured Categories</h2>
                                <div class="section-subtitle">Catalog of Categories</div>
                                <span class="section-separator"></span>
                                <p>Explore some of the best recreational facilities and play areas in Melbourne</p>
                            </div>
                            <?php
                            $mysqli = new mysqli("localhost","root","monash123","fit5120");

                            /* check connection */
                            if (mysqli_connect_errno()){
                                printf("Connect failed: %s\n", mysqli_connect_error());
                                exit();
                            }

                            $result_garden = $mysqli->query("SELECT * from place WHERE category='Garden'");
                            $row_cnt_garden = $result_garden ->num_rows;

                            $result_indoor = $mysqli->query("SELECT * from place WHERE category='Indoor Facility'");
                            $row_cnt_indoor = $result_indoor ->num_rows; //4

                            $result_outdoor = $mysqli->query("SELECT * from place WHERE category='Outdoor Venue'");
                            $row_cnt_outdoor = $result_outdoor ->num_rows; //3

                            $result_park = $mysqli->query("SELECT * from place WHERE category='Park'");
                            $row_cnt_park = $result_park ->num_rows; //23

                            $result_reserve = $mysqli->query("SELECT * from place WHERE category='Reserve'");
                            $row_cnt_reserve = $result_reserve ->num_rows; //4

                            $result_sport = $mysqli->query("SELECT * from place WHERE category='Sports Center'");
                            $row_cnt_sport = $result_sport ->num_rows; //15

                            $garden = "Garden";
                            $park = "Park";
                            $outdoor = "Outdoor Venue";
                            $indoor = "Indoor Facility";
                            $reserve = "Reserve";
                            $sport = "Sports Center";


                            echo "<!-- portfolio start -->\n";
                            echo "                            <div class=\"gallery-items fl-wrap mr-bot spad\">\n";
                            echo "                                <!-- gallery-item-->\n";
                            echo "                                <div class=\"gallery-item\">\n";
                            echo "                                    <div class=\"grid-item-holder\">\n";
                            echo "                                        <div class=\"listing-item-grid\">\n";
                            echo "                                            <img  src=\"picture/Gardens/garden.jpeg\"   alt=\"\">\n";
                            echo "                                            <div class=\"listing-counter\"><span>".$row_cnt_garden."</span> Locations</div>\n";
                            echo "                                            <div class=\"listing-item-cat\">\n";
//                            echo "                                                <h3><a href=\"listing.html\">Garden</a></h3>\n";
                            echo                                               "<h3><a href=listing.php?category=",urlencode($garden),">Garden</a></h3>\n";
                            echo "                                                <p>Explore Melbourne's finest gardens</p>\n";
                            echo "                                            </div>\n";
                            echo "                                        </div>\n";
                            echo "                                    </div>\n";
                            echo "                                </div>\n";
                            echo "                                <!-- gallery-item end-->\n";
                            echo "                                <!-- gallery-item-->\n";
                            echo "                                <div class=\"gallery-item gallery-item-second\">\n";
                            echo "                                    <div class=\"grid-item-holder\">\n";
                            echo "                                        <div class=\"listing-item-grid\">\n";
                            echo "                                            <img  src=\"picture/Outdoor/outdoor1.jpeg\"   alt=\"\">\n";
                            echo "                                            <div class=\"listing-counter\"><span>".$row_cnt_outdoor."</span> Locations</div>\n";
                            echo "                                            <div class=\"listing-item-cat\">\n";
                            echo                                                "<h3><a href=listing.php?category=",urlencode($outdoor),">Outdoor Venue</a></h3>\n";
                            echo "                                                <p>Look for activities in open areas and venues across Melbourne</p>\n";
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
                            echo "                                            <div class=\"listing-counter\"><span>".$row_cnt_indoor."</span> Locations</div>\n";
                            echo "                                            <div class=\"listing-item-cat\">\n";
                            echo "                                                <h3><a href=listing.php?category=",urlencode($indoor),">Indoor Facility</a></h3>\n";
                            echo "                                                <p>Locate facilities that offer indoor play and sport activities</p>\n";
                            echo "                                            </div>\n";
                            echo "                                        </div>\n";
                            echo "                                    </div>\n";
                            echo "                                </div>\n";
                            echo "                                <!-- gallery-item end-->\n";
                            echo "                                <!-- gallery-item-->\n";
                            echo "                                <div class=\"gallery-item\">\n";
                            echo "                                    <div class=\"grid-item-holder\">\n";
                            echo "                                        <div class=\"listing-item-grid\">\n";
                            echo "                                            <img  src=\"picture/Parks/park.jpeg\"   alt=\"\">\n";
                            echo "                                            <div class=\"listing-counter\"><span>".$row_cnt_park."</span> Locations</div>\n";
                            echo "                                            <div class=\"listing-item-cat\">\n";
                            echo "                                                <h3><a href=listing.php?category=",urlencode($park),">Park</a></h3>\n";
                            echo "                                                <p>Spend time in some of the tranquil locations in and around Melbourne</p>\n";
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
                            echo "                                            <div class=\"listing-counter\"><span>".$row_cnt_reserve."</span> Locations</div>\n";
                            echo "                                            <div class=\"listing-item-cat\">\n";
                            echo "                                                <h3><a href=listing.php?category=",urlencode($reserve),">Reserve</a></h3>\n";
                            echo "                                                <p>Visit some of the historical locations across Victoria</p>\n";
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
                            echo "                                            <div class=\"listing-counter\"><span>".$row_cnt_sport."</span> Locations</div>\n";
                            echo "                                            <div class=\"listing-item-cat\">\n";
                            echo "                                                <h3><a href=listing.php?category=",urlencode($sport),">Sport Center</a></h3>\n";
                            echo "                                                <p>Melbourne is home to some of the best sports facilities</p>\n";
                            echo "                                            </div>\n";
                            echo "                                        </div>\n";
                            echo "                                    </div>\n";
                            echo "                                </div>\n";
                            echo "                                <!-- gallery-item end-->\n";
                            echo "                            </div>\n";
                            echo "                            <!-- portfolio end -->";



                            /* close connection */
                            $mysqli->close();

                            ?>





<!--                            <!-- portfolio start -->
<!--                            <div class="gallery-items fl-wrap mr-bot spad">-->
<!--                                <!-- gallery-item-->
<!--                                <div class="gallery-item">-->
<!--                                    <div class="grid-item-holder">-->
<!--                                        <div class="listing-item-grid">-->
<!--                                            <img  src="images/all/1.jpg"   alt="">-->
<!--                                            <div class="listing-counter"><span>10 </span> Locations</div>-->
<!--                                            <div class="listing-item-cat">-->
<!--                                                <h3><a href="listing.html">Garden</a></h3>-->
<!--                                                <p>Constant care and attention to the patients makes good record</p>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <!-- gallery-item end-->
<!--                                <!-- gallery-item-->
<!--                                <div class="gallery-item gallery-item-second">-->
<!--                                    <div class="grid-item-holder">-->
<!--                                        <div class="listing-item-grid">-->
<!--                                            <img  src="images/bg/1.jpg"   alt="">-->
<!--                                            <div class="listing-counter"><span>6 </span> Locations</div>-->
<!--                                            <div class="listing-item-cat">-->
<!--                                                <h3><a href="listing.html">Outdoor Venue</a></h3>-->
<!--                                                <p>Constant care and attention to the patients makes good record</p>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <!-- gallery-item end-->
<!--                                <!-- gallery-item-->
<!--                                <div class="gallery-item">-->
<!--                                    <div class="grid-item-holder">-->
<!--                                        <div class="listing-item-grid">-->
<!--                                            <img  src="images/all/1.jpg"   alt="">-->
<!--                                            <div class="listing-counter"><span>21 </span> Locations</div>-->
<!--                                            <div class="listing-item-cat">-->
<!--                                                <h3><a href="listing.html">Indoor Facility</a></h3>-->
<!--                                                <p>Constant care and attention to the patients makes good record</p>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <!-- gallery-item end-->
<!--                                <!-- gallery-item-->
<!--                                <div class="gallery-item">-->
<!--                                    <div class="grid-item-holder">-->
<!--                                        <div class="listing-item-grid">-->
<!--                                            <img  src="images/all/1.jpg"   alt="">-->
<!--                                            <div class="listing-counter"><span>15 </span> Locations</div>-->
<!--                                            <div class="listing-item-cat">-->
<!--                                                <h3><a href="listing.html">Park</a></h3>-->
<!--                                                <p>Constant care and attention to the patients makes good record</p>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <!-- gallery-item end-->
<!--                                <!-- gallery-item-->
<!--                                <div class="gallery-item">-->
<!--                                    <div class="grid-item-holder">-->
<!--                                        <div class="listing-item-grid">-->
<!--                                            <img  src="images/all/1.jpg"   alt="">-->
<!--                                            <div class="listing-counter"><span>7 </span> Locations</div>-->
<!--                                            <div class="listing-item-cat">-->
<!--                                                <h3><a href="listing.html">Reserve</a></h3>-->
<!--                                                <p>Constant care and attention to the patients makes good record</p>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <!-- gallery-item end-->
<!--                                <!-- gallery-item-->
<!--                                <div class="gallery-item">-->
<!--                                    <div class="grid-item-holder">-->
<!--                                        <div class="listing-item-grid">-->
<!--                                            <img  src="images/all/1.jpg"   alt="">-->
<!--                                            <div class="listing-counter"><span>15 </span> Locations</div>-->
<!--                                            <div class="listing-item-cat">-->
<!--                                                <h3><a href="listing.html">Sport Center</a></h3>-->
<!--                                                <p>Constant care and attention to the patients makes good record</p>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <!-- gallery-item end-->
<!--                            </div>-->
                            <!-- portfolio end -->
<!--                            <a href="listing.html" class="btn  big-btn circle-btn dec-btn  color-bg flat-btn">View All<i class="fa fa-eye"></i></a>-->
                        </div>
                    </section>
                    <!-- section end -->


                    <!--section -->
<!--                    <section class="color-bg">-->
<!--                        <div class="shapes-bg-big"></div>-->
<!--                        <div class="container">-->
<!--                            <div class="row">-->
<!--                                <div class="col-md-6">-->
<!--                                    <div class="images-collage fl-wrap">-->
<!--                                        <div class="images-collage-title">City<span>Book</span></div>-->
<!--                                        <div class="images-collage-main images-collage-item"><img src="images/avatar/1.jpg" alt=""></div>-->
<!--                                        <div class="images-collage-other images-collage-item" data-position-left="23" data-position-top="10" data-zindex="2"><img src="images/avatar/1.jpg" alt=""></div>-->
<!--                                        <div class="images-collage-other images-collage-item" data-position-left="62" data-position-top="54" data-zindex="5"><img src="images/avatar/1.jpg" alt=""></div>-->
<!--                                        <div class="images-collage-other images-collage-item anim-col" data-position-left="18" data-position-top="70" data-zindex="11"><img src="images/avatar/1.jpg" alt=""></div>-->
<!--                                        <div class="images-collage-other images-collage-item" data-position-left="37" data-position-top="90" data-zindex="1"><img src="images/avatar/1.jpg" alt=""></div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-6">-->
<!--                                    <div class="color-bg-text">-->
<!--                                        <h3>Join our online community</h3>-->
<!--                                        <p>In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. Lorem ipsum dolor sit amet, conse ctetuer adipiscing elit, sed diam nonu mmy nibh euismod tincidunt ut laoreet dolore magna aliquam erat.</p>-->
<!--                                        <a href="#" class="color-bg-link modal-open">Sign In Now</a>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </section>-->
                    <!--section   end -->
                    <!--section -->
                    <section>
                        <div class="container">
                            <div class="section-title">
                                <h2>What is SERENE?</h2>
                                <div class="section-subtitle">Discover Us </div>
                                <span class="section-separator"></span>
                                <p>We help you to find and locate activitites specially catered towards children with behavioural issues</p>
                            </div>
                            <!--process-wrap  -->
                            <div class="process-wrap fl-wrap">
                                <ul>
                                    <li>
                                        <div class="process-item">
                                            <span class="process-count">01 . </span>
                                            <div class="time-line-icon"><i class="fa fa-map-o"></i></div>
                                            <h4> Find an Activity</h4>
                                            <p>Serene offers you and your children activities that promote their behaviour through intellectual and physical activities</p>
                                        </div>
                                        <span class="pr-dec"></span>
                                    </li>
                                    <li>
                                        <div class="process-item">
                                            <span class="process-count">02 .</span>
                                            <div class="time-line-icon"><i class="fa fa-envelope-open-o"></i></div>
                                            <h4> Locate Facilities </h4>
                                            <p>You can look for free to access playgrounds, parks, gardens and sport centres that may offer activities catered to children</p>
                                        </div>
                                        <span class="pr-dec"></span>
                                    </li>
                                    <li>
                                        <div class="process-item">
                                            <span class="process-count">03 .</span>
                                            <div class="time-line-icon"><i class="fa fa-hand-peace-o"></i></div>
                                            <h4>For parents</h4>
                                            <p>Look up activitites specially catered to parents with special needs children, that help you understand their behavious and provide you with skills to calm them</p>
                                        </div>
                                    </li>
                                </ul>
                                <div class="process-end"><i class="fa fa-check"></i></div>
                            </div>
                            <!--process-wrap   end-->
                        </div>
                    </section>
<!--                    <section class="parallax-section" data-scrollax-parent="true">-->
<!--                        <div class="bg"  data-bg="images/bg/1.jpg" data-scrollax="properties: { translateY: '100px' }"></div>-->
<!--                        <div class="overlay co lor-overlay"></div>-->
<!--                        <!--container-->
<!--                        <div class="container">-->
<!--                            <div class="intro-item fl-wrap">-->
<!--                                <h2>Visit the Best Places In Your City</h2>-->
<!--                                <h3>Find great places , hotels , restourants , shops.</h3>-->
<!--<!--                                <a class="trs-btn" href="#">Add Listing + </a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </section>-->
                    <!-- section end -->
                    <!--section -->
<!--                    <section>-->
<!--                        <div class="container">-->
<!--                            <div class="section-title">-->
<!--                                <h2> Pricing Tables</h2>-->
<!--                                <div class="section-subtitle">cost of our services</div>-->
<!--                                <span class="section-separator"></span>-->
<!--                                <p>Explore some of the best tips from around the city from our partners and friends.</p>-->
<!--                            </div>-->
<!--                            <div class="pricing-wrap fl-wrap">-->
<!--                                <!-- price-item-->
<!--                                <div class="price-item">-->
<!--                                    <div class="price-head op1">-->
<!--                                        <h3>Basic</h3>-->
<!--                                    </div>-->
<!--                                    <div class="price-content fl-wrap">-->
<!--                                        <div class="price-num fl-wrap">-->
<!--                                            <span class="curen">$</span>-->
<!--                                            <span class="price-num-item">49</span>-->
<!--                                            <div class="price-num-desc">Per month</div>-->
<!--                                        </div>-->
<!--                                        <div class="price-desc fl-wrap">-->
<!--                                            <ul>-->
<!--                                                <li>One Listing</li>-->
<!--                                                <li>90 Days Availability</li>-->
<!--                                                <li>Non-Featured</li>-->
<!--                                                <li>Limited Support</li>-->
<!--                                            </ul>-->
<!--                                            <a href="#" class="price-link">Choose Basic</a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <!-- price-item end-->
<!--                                <!-- price-item-->
<!--                                <div class="price-item best-price">-->
<!--                                    <div class="price-head op2">-->
<!--                                        <h3>Extended</h3>-->
<!--                                    </div>-->
<!--                                    <div class="price-content fl-wrap">-->
<!--                                        <div class="price-num fl-wrap">-->
<!--                                            <span class="curen">$</span>-->
<!--                                            <span class="price-num-item">99</span>-->
<!--                                            <div class="price-num-desc">Per month</div>-->
<!--                                        </div>-->
<!--                                        <div class="price-desc fl-wrap">-->
<!--                                            <ul>-->
<!--                                                <li>Ten Listings</li>-->
<!--                                                <li>Lifetime Availability</li>-->
<!--                                                <li>Featured In Search Results</li>-->
<!--                                                <li>24/7 Support</li>-->
<!--                                            </ul>-->
<!--                                            <a href="#" class="price-link">Choose Extended</a>-->
<!--                                            <div class="recomm-price">-->
<!--                                                <i class="fa fa-check"></i>-->
<!--                                                <span class="clearfix"></span>-->
<!--                                                Recommended-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <!-- price-item end-->
<!--                                <!-- price-item-->
<!--                                <div class="price-item">-->
<!--                                    <div class="price-head">-->
<!--                                        <h3>Professional</h3>-->
<!--                                    </div>-->
<!--                                    <div class="price-content fl-wrap">-->
<!--                                        <div class="price-num fl-wrap">-->
<!--                                            <span class="curen">$</span>-->
<!--                                            <span class="price-num-item">149</span>-->
<!--                                            <div class="price-num-desc">Per month</div>-->
<!--                                        </div>-->
<!--                                        <div class="price-desc fl-wrap">-->
<!--                                            <ul>-->
<!--                                                <li>Unlimited Listings</li>-->
<!--                                                <li>Lifetime Availability</li>-->
<!--                                                <li>Featured In Search Results</li>-->
<!--                                                <li>24/7 Support</li>-->
<!--                                            </ul>-->
<!--                                            <a href="#" class="price-link">Choose Professional</a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <!-- price-item end-->
<!--                            </div>-->
<!--                            <!-- about-wrap end  -->
<!--                        </div>-->
<!--                    </section>-->
                    <!-- section end -->
                    <!--section -->
<!--                    <section class="color-bg">-->
<!--                        <div class="shapes-bg-big"></div>-->
<!--                        <div class="container">-->
<!--                            <div class=" single-facts fl-wrap">-->
<!--                                <!-- inline-facts -->
<!--                                <div class="inline-facts-wrap">-->
<!--                                    <div class="inline-facts">-->
<!--                                        <div class="milestone-counter">-->
<!--                                            <div class="stats animaper">-->
<!--                                                <div class="num" data-content="0" data-num="254">154</div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <h6>New Visiters Every Week</h6>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <!-- inline-facts end -->
<!--                                <!-- inline-facts  -->
<!--                                <div class="inline-facts-wrap">-->
<!--                                    <div class="inline-facts">-->
<!--                                        <div class="milestone-counter">-->
<!--                                            <div class="stats animaper">-->
<!--                                                <div class="num" data-content="0" data-num="12168">12168</div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <h6>Happy customers every year</h6>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <!-- inline-facts end -->
<!--                                <!-- inline-facts  -->
<!--                                <div class="inline-facts-wrap">-->
<!--                                    <div class="inline-facts">-->
<!--                                        <div class="milestone-counter">-->
<!--                                            <div class="stats animaper">-->
<!--                                                <div class="num" data-content="0" data-num="172">172</div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <h6>Won Awards</h6>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <!-- inline-facts end -->
<!--                                <!-- inline-facts  -->
<!--                                <div class="inline-facts-wrap">-->
<!--                                    <div class="inline-facts">-->
<!--                                        <div class="milestone-counter">-->
<!--                                            <div class="stats animaper">-->
<!--                                                <div class="num" data-content="0" data-num="732">732</div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <h6>New Listing Every Week</h6>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <!-- inline-facts end -->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </section>-->
                    <!-- section end -->
                    <!--section -->
<!--                    <section>-->
<!--                        <div class="container">-->
<!--                            <div class="section-title">-->
<!--                                <h2>Testimonials</h2>-->
<!--                                <div class="section-subtitle">Clients Reviews</div>-->
<!--                                <span class="section-separator"></span>-->
<!--                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar.</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <!-- testimonials-carousel -->
<!--                        <div class="carousel fl-wrap">-->
<!--                            <!--testimonials-carousel-->
<!--                            <div class="testimonials-carousel single-carousel fl-wrap">-->
<!--                                <!--slick-slide-item-->
<!--                                <div class="slick-slide-item">-->
<!--                                    <div class="testimonilas-text">-->
<!--                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"> </div>-->
<!--                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi arch itecto beatae vitae dicta sunt explicabo. </p>-->
<!--                                    </div>-->
<!--                                    <div class="testimonilas-avatar-item">-->
<!--                                        <div class="testimonilas-avatar"><img src="images/avatar/1.jpg" alt=""></div>-->
<!--                                        <h4>Lisa Noory</h4>-->
<!--                                        <span>Restaurant Owner</span>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <!--slick-slide-item end-->
<!--                                <!--slick-slide-item-->
<!--                                <div class="slick-slide-item">-->
<!--                                    <div class="testimonilas-text">-->
<!--                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="4"> </div>-->
<!--                                        <p>Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</p>-->
<!--                                    </div>-->
<!--                                    <div class="testimonilas-avatar-item">-->
<!--                                        <div class="testimonilas-avatar"><img src="images/avatar/1.jpg" alt=""></div>-->
<!--                                        <h4>Antony Moore</h4>-->
<!--                                        <span>Restaurant Owner</span>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <!--slick-slide-item end-->
<!--                                <!--slick-slide-item-->
<!--                                <div class="slick-slide-item">-->
<!--                                    <div class="testimonilas-text">-->
<!--                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"> </div>-->
<!--                                        <p>Feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te odio dignissim qui blandit praesent.</p>-->
<!--                                    </div>-->
<!--                                    <div class="testimonilas-avatar-item">-->
<!--                                        <div class="testimonilas-avatar"><img src="images/avatar/1.jpg" alt=""></div>-->
<!--                                        <h4>Austin Harisson</h4>-->
<!--                                        <span>Restaurant Owner</span>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <!--slick-slide-item end-->
<!--                                <!--slick-slide-item-->
<!--                                <div class="slick-slide-item">-->
<!--                                    <div class="testimonilas-text">-->
<!--                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="4"> </div>-->
<!--                                        <p>Qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram seacula quarta decima et quinta decima.</p>-->
<!--                                    </div>-->
<!--                                    <div class="testimonilas-avatar-item">-->
<!--                                        <div class="testimonilas-avatar"><img src="images/avatar/1.jpg" alt=""></div>-->
<!--                                        <h4>Garry Colonsi</h4>-->
<!--                                        <span>Restaurant Owner</span>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <!--slick-slide-item end-->
<!--                            </div>-->
<!--                            <!--testimonials-carousel end-->
<!--                            <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>-->
<!--                            <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>-->
<!--                        </div>-->
<!--                        <!-- carousel end-->
<!--                    </section>-->
                    <!-- section end -->
                    <!--section -->
<!--                    <section class="gray-section">-->
<!--                        <div class="container">-->
<!--                            <div class="fl-wrap spons-list">-->
<!--                                <ul class="client-carousel">-->
<!--                                    <li><a href="#" target="_blank"><img src="images/clients/1.png" alt=""></a></li>-->
<!--                                    <li><a href="#" target="_blank"><img src="images/clients/1.png" alt=""></a></li>-->
<!--                                    <li><a href="#" target="_blank"><img src="images/clients/1.png" alt=""></a></li>-->
<!--                                    <li><a href="#" target="_blank"><img src="images/clients/1.png" alt=""></a></li>-->
<!--                                    <li><a href="#" target="_blank"><img src="images/clients/1.png" alt=""></a></li>-->
<!--                                    <li><a href="#" target="_blank"><img src="images/clients/1.png" alt=""></a></li>-->
<!--                                </ul>-->
<!--                                <div class="sp-cont sp-cont-prev"><i class="fa fa-angle-left"></i></div>-->
<!--                                <div class="sp-cont sp-cont-next"><i class="fa fa-angle-right"></i></div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </section>-->
                    <!-- section end -->
                    <!--section -->
<!--                    <section>-->
<!--                        <div class="container">-->
<!--                            <div class="section-title">-->
<!--                                <h2>Tips & Articles</h2>-->
<!--                                <div class="section-subtitle">From the blog.</div>-->
<!--                                <span class="section-separator"></span>-->
<!--                                <p>Browse the latest articles from our blog.</p>-->
<!--                            </div>-->
<!--                            <div class="row home-posts">-->
<!--                                <div class="col-md-4">-->
<!--                                    <article class="card-post">-->
<!--                                        <div class="card-post-img fl-wrap">-->
<!--                                            <a href="blog-single.html"><img src="images/all/1.jpg"   alt=""></a>-->
<!--                                        </div>-->
<!--                                        <div class="card-post-content fl-wrap">-->
<!--                                            <h3><a href="blog-single.html">Gallery Post</a></h3>-->
<!--                                            <p>In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. </p>-->
<!--                                            <div class="post-author"><a href="#"><img src="images/avatar/1.jpg" alt=""><span>By , Alisa Noory</span></a></div>-->
<!--                                            <div class="post-opt">-->
<!--                                                <ul>-->
<!--                                                    <li><i class="fa fa-calendar-check-o"></i> <span>25 April 2018</span></li>-->
<!--                                                    <li><i class="fa fa-eye"></i> <span>264</span></li>-->
<!--                                                    <li><i class="fa fa-tags"></i> <a href="#">Photography</a>  </li>-->
<!--                                                </ul>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </article>-->
<!--                                </div>-->
<!--                                <div class="col-md-4">-->
<!--                                    <article class="card-post">-->
<!--                                        <div class="card-post-img fl-wrap">-->
<!--                                            <a href="blog-single.html"><img  src="images/all/1.jpg"   alt=""></a>-->
<!--                                        </div>-->
<!--                                        <div class="card-post-content fl-wrap">-->
<!--                                            <h3><a href="blog-single.html">Video and gallery post</a></h3>-->
<!--                                            <p>In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. </p>-->
<!--                                            <div class="post-author"><a href="#"><img src="images/avatar/1.jpg" alt=""><span>By , Mery Lynn</span></a></div>-->
<!--                                            <div class="post-opt">-->
<!--                                                <ul>-->
<!--                                                    <li><i class="fa fa-calendar-check-o"></i> <span>25 April 2018</span></li>-->
<!--                                                    <li><i class="fa fa-eye"></i> <span>264</span></li>-->
<!--                                                    <li><i class="fa fa-tags"></i> <a href="#">Design</a>  </li>-->
<!--                                                </ul>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </article>-->
<!--                                </div>-->
<!--                                <div class="col-md-4">-->
<!--                                    <article class="card-post">-->
<!--                                        <div class="card-post-img fl-wrap">-->
<!--                                            <a href="blog-single.html"><img  src="images/all/1.jpg"   alt=""></a>-->
<!--                                        </div>-->
<!--                                        <div class="card-post-content fl-wrap">-->
<!--                                            <h3><a href="blog-single.html">Post Article</a></h3>-->
<!--                                            <p>In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. </p>-->
<!--                                            <div class="post-author"><a href="#"><img src="images/avatar/1.jpg" alt=""><span>By , Garry Dee</span></a></div>-->
<!--                                            <div class="post-opt">-->
<!--                                                <ul>-->
<!--                                                    <li><i class="fa fa-calendar-check-o"></i> <span>25 April 2018</span></li>-->
<!--                                                    <li><i class="fa fa-eye"></i> <span>264</span></li>-->
<!--                                                    <li><i class="fa fa-tags"></i> <a href="#">Stories</a>  </li>-->
<!--                                                </ul>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </article>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <a href="blog.html" class="btn  big-btn circle-btn  dec-btn color-bg flat-btn">Read All<i class="fa fa-eye"></i></a>-->
<!--                        </div>-->
<!--                    </section>-->
                    <!-- section end -->
                    <!--section -->
                    <section class="gradient-bg">
                        <div class="cirle-bg">
                            <div class="bg" data-bg="images/bg/circle.png"></div>
                        </div>
                        <div class="container">
                            <div class="join-wrap fl-wrap">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h3>Do You Have Questions ?</h3>
                                        <p>If you have any questions or if you have feedback with regards to our website, please email us at info@serene.tk</p>
                                    </div>
<!--                                    <div class="col-md-4"><a href="contacts.html" class="join-wrap-btn">Get In Touch <i class="fa fa-envelope-o"></i></a></div>-->
                                </div>
                            </div>
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
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwJSRi0zFjDemECmFl9JtRj1FY7TiTRRo&libraries=places&callback=initAutocomplete"></script>
    </body>
</html>

