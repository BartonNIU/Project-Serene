<?php include "includes/header.php"; ?>
<?php error_reporting (E_ALL ^ E_NOTICE); ?>
            <!-- wrapper -->	
            <div id="wrapper">
                <div class="content">
                    <!-- Map -->
                    <div class="map-container column-map right-pos-map">
                        <div id="map-main"></div>
                        <ul class="mapnavigation">
                            <li><a href="#" class="prevmap-nav">Prev</a></li>
                            <li><a href="#" class="nextmap-nav">Next</a></li>
                        </ul>
                    </div>
                    <!-- Map end -->          
                    <!--col-list-wrap -->   
                    <div class="col-list-wrap left-list">
                        <div class="listsearch-options fl-wrap" id="lisfw" >
                            <div class="container">
                                <div class="listsearch-header fl-wrap">
                                    <?php
                                    if($_POST['value'] != "") {
                                        echo '<h3>Results For : <span>'.$_POST['value'].'</span></h3>';
                                    }
                                    elseif ($_POST['value'] == ""){
                                        echo '<h3>Results For: All Budget Ranges</span></h3>';
                                    }
                                    ?>
                                    <div class="listing-view-layout">
                                        <ul>
                                            <li><a class="grid active" href="#"><i class="fa fa-th-large"></i></a></li>
                                            <li><a class="list" href="#"><i class="fa fa-list-ul"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <form action="listing_act.php" method="post">
                                <!-- listsearch-input-wrap  -->  
                                <div class="listsearch-input-wrap fl-wrap">
                                    <div class="listsearch-input-item">
                                        <i class="mbri-key single-i"></i>
                                        <input type="text" name="postcode" placeholder="Postcode?" value=""/>
                                    </div>
<!--                                    <div class="listsearch-input-item">-->
<!--                                        <select data-placeholder="Location" class="chosen-select" >-->
<!--                                            <option>All Locations</option>-->
<!--                                            <option>Bronx</option>-->
<!--                                            <option>Brooklyn</option>-->
<!--                                            <option>Manhattan</option>-->
<!--                                            <option>Queens</option>-->
<!--                                            <option>Staten Island</option>-->
<!--                                        </select>-->
<!--                                    </div>-->

                                    <div class="listsearch-input-item">
                                        <select name="value" data-placeholder="All Range Budgets" class="chosen-select" id="value">
                                            <option value="All Budget Ranges">All Budget Ranges</option>
                                            <option value="Free">Free</option>
                                            <option value="less than $20">less than $20</option>
                                            <option value="$20-$50">$20-$50</option>
                                            <option value="$50-$100">$50-$100</option>
                                            <option value="more than $100">more than $100</option>
                                        </select>
                                    </div>

<!--                                    <div class="listsearch-input-text" id="autocomplete-container">-->
<!--                                        <label><i class="mbri-map-pin"></i> Enter Addres </label>-->
<!--                                        <input type="text" placeholder="Destination , Area , Street" id="autocomplete-input" class="qodef-archive-places-search" value=""/>-->
<!--                                        <a  href="#"  class="loc-act qodef-archive-current-location"><i class="fa fa-dot-circle-o"></i></a>-->
<!--                                    </div>-->
                                    <!-- hidden-listing-filter -->
<!--                                    <div class="hidden-listing-filter fl-wrap">-->
<!--                                        <div class="distance-input fl-wrap">-->
<!--                                            <div class="distance-title"> Radius around selected destination <span></span> km</div>-->
<!--                                            <div class="distance-radius-wrap fl-wrap">-->
<!--                                                <input class="distance-radius rangeslider--horizontal" type="range" min="1" max="100" step="1" value="1" data-title="Radius around selected destination">-->
<!--                                            </div>-->
<!--                                        </div>-->
                                        <!-- Checkboxes -->
<!--                                        <div class=" fl-wrap filter-tags">-->
<!--                                            <h4>Filter by Tags</h4>-->
<!--                                            <input id="check-aa" type="checkbox" name="check">-->
<!--                                            <label for="check-aa">Elevator in building</label>-->
<!--                                            <input id="check-b" type="checkbox" name="check">-->
<!--                                            <label for="check-b">Friendly workspace</label>-->
<!--                                            <input id="check-c" type="checkbox" name="check">-->
<!--                                            <label for="check-c">Instant Book</label>-->
<!--                                            <input id="check-d" type="checkbox" name="check">-->
<!--                                            <label for="check-d">Wireless Internet</label>-->
<!--                                        </div>-->
<!--                                    </div>-->
                                    <!-- hidden-listing-filter end -->
                                    <br/><br/><br/><br/>

                                     <button type="submit" class="button fs-map-btn" >Update</button>

<!--                                    <div class="more-filter-option">More Filters <span></span></div>-->
                                </div>
                                </form>
                                <!-- listsearch-input-wrap end -->
                            </div>
                        </div>
                        <!-- list-main-wrap-->
                        <div class="list-main-wrap fl-wrap card-listing">
                            <a class="custom-scroll-link back-to-filters btf-l" href="#lisfw"><i class="fa fa-angle-double-up"></i><span>Back to Filters</span></a> 
                            <div class="container">

                       <?php error_reporting (E_ALL ^ E_NOTICE); ?>
                       <?php



                       $postcode=$_POST['postcode'];
                       $suburb=$_POST['suburb'];

                       if(preg_match('(drop|DROP|Drop|Delete|delete|Delete|table|Table|TABLE|set|Set|SET)', $suburb) === 1) { }

                       $mysqli = new mysqli("localhost","root","","csv_db");

                       /* check connection */
                       if (mysqli_connect_errno()){
                           printf("Connect failed: %s\n", mysqli_connect_error());
                           exit();
                       }

                       if($postcode == "") {
                           if (($_POST['value']) == 'Free') {
                               $query = $mysqli->query("Select * from activity_list WHERE Fee='Free'");
                           } elseif (($_POST['value']) == 'less than $20') {
                               $query = $mysqli->query("Select * from activity_list WHERE Fee_Fix <= 20");
                           } elseif (($_POST['value']) == '$20-$50') {
                               $query = $mysqli->query("Select * from activity_list WHERE Fee_Fix > 20 AND Fee_Fix <= 50");
                           } elseif (($_POST['value']) == '$50-$100') {
                               $query = $mysqli->query("Select * from activity_list WHERE Fee_Fix > 50 AND Fee_Fix <= 100");
                           } elseif (($_POST['value']) == 'more than $100') {
                               $query = $mysqli->query("Select * from activity_list WHERE Fee_Fix > 100");
                           }
                           else {
                               $query = $mysqli->query("Select * from activity_list");
                           }
                       }

                        elseif($postcode != ""){
                            if (($_POST['value']) == 'Free') {
                                $query = $mysqli->query("Select * from activity_list WHERE Fee='Free' AND postcode='$postcode'");
                            } elseif (($_POST['value']) == 'less than $20') {
                                $query = $mysqli->query("Select * from activity_list WHERE Fee_Fix <= 20 AND postcode='$postcode'");
                            } elseif (($_POST['value']) == '$20-$50') {
                                $query = $mysqli->query("Select * from activity_list WHERE Fee_Fix > 20 AND Fee_Fix <= 50 AND postcode='$postcode'");
                            } elseif (($_POST['value']) == '$50-$100') {
                                $query = $mysqli->query("Select * from activity_list WHERE Fee_Fix > 50 AND Fee_Fix <= 100 AND postcode='$postcode'");
                            } elseif (($_POST['value']) == 'more than $100') {
                                $query = $mysqli->query("Select * from activity_list WHERE Fee_Fix > 100 AND postcode='$postcode'");
                            }
                            else {
                                $query = $mysqli->query("Select * from activity_list WHERE postcode='$postcode'");
                            }
                        }

                       else{
                           $query = $mysqli->query("Select * from activity_list");
                       }


                       $row_cnt = $query ->num_rows;
                       if( $row_cnt == 0){
                           echo '<p> We apologize, there is no data found for your selection </p>';
                       }

                       else {
                           while ($row = $query->fetch_array()) {
                               //<!-- listing-item -->
                               echo '<div class="listing-item">';
                               echo '<article class="geodir-category-listing fl-wrap">';
                               echo '<div class="geodir-category-img">';
                               echo '<img src="images/all/1.jpg" alt="">';
                               echo '<div class="overlay"></div>';
//                                      echo      '<div class="list-post-counter"><span>1523</span><i class="fa fa-heart"></i></div>';
                               echo '</div>';
                               echo '<div class="geodir-category-content fl-wrap">';
//                                        echo '<a class="listing-geodir-category" href="listing.html"> Activity </a>';
                               echo '<a class="listing-geodir-category"> Activity </a>';
//                                         echo   '<div class="listing-avatar"><a href="author-single.html"><img src="images/avatar/1.jpg" alt=""></a>';
//                                          echo      '<span class="avatar-tooltip">Added By  <strong>Mark Rose</strong></span>';
//                                          echo  '</div>';
                               echo '<h3><a href="listing-single.html">' . $row['Article Title'] . '</a></h3>';
                               echo '<p>Fee:' . $row['Fee'] . '</p>';
                               echo '<p> postcode:'. $row['postcode']. ' </p>';
                               echo '<p>Morbi suscipit erat in diam bibendum rutrum in nisl. Aliquam et purus ante. alnfanlaflnnlflnaknlaknlalknaklnaklnafkn another line another line la alalallala</p>';
                               echo '<div class="geodir-category-options fl-wrap">';
//                                           echo     '<div class="listing-rating card-popup-rainingvis" data-starrating2="4">';
//                                            echo       ' <span>(17 reviews)</span>';
//                                            echo    '</div>';
                               echo '<div class="geodir-category-location"><a  href="#0" class="map-item"><i class="fa fa-map-marker" aria-hidden="true"></i>' . $row['Location'] . '</a></div>';
                               echo '</div>';
                               echo '</div>';
                               echo '</article>';
                               echo '</div>';
                               // <!-- listing-item end-->
                           }
                       }

                       /* close connection */
                       $mysqli->close();
                       ?>
                            </div>
                            <a class="load-more-button" href="#">Load more <i class="fa fa-circle-o-notch"></i> </a>  
                        </div>
                        <!-- list-main-wrap end-->
                    </div>
                    <!--col-list-wrap -->  
                    <div class="limit-box fl-wrap"></div>
                    <!--section -->  
<!--                    <section class="gradient-bg">-->
<!--                        <div class="cirle-bg">-->
<!--                            <div class="bg" data-bg="images/bg/circle.png"></div>-->
<!--                        </div>-->
<!--                        <div class="container">-->
<!--                            <div class="join-wrap fl-wrap">-->
<!--                                <div class="row">-->
<!--                                    <div class="col-md-8">-->
<!--                                        <h3>Join our online community</h3>-->
<!--                                        <p>Grow your marketing and be happy with your online business</p>-->
<!--                                    </div>-->
<!--                                    <div class="col-md-4"><a href="#" class="join-wrap-btn modal-open">Sign Up <i class="fa fa-sign-in"></i></a></div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </section>-->
                    <!--section end -->  
                </div>
                <!--content end -->   
            </div>
            <!-- wrapper end -->
            <!--footer -->
            <?php include "includes/footer.php"; ?>
            <!--footer end  -->
            <!--register form -->
            <?php include "includes/registerform.php"; ?>
            <!--register form end -->
        </div>
        <!-- Main end -->
        <!--=============== scripts  ===============-->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=YOURAPIKEYHERE&libraries=places&callback=initAutocomplete"></script>
        <script type="text/javascript" src="js/map_infobox.js"></script>
        <script type="text/javascript" src="js/markerclusterer.js"></script>  
        <script type="text/javascript" src="js/maps.js"></script>
    </body>
</html>