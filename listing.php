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
                    <div class="listsearch-header fl-wrap" id="cat">
                        <!--Showing List Result Title-->
                        <?php
                        if($_POST['category'] != "") {
                            echo "gsgs";
                            echo '<h3>List For : <span>'.$_POST['category'].'</span></h3>';
                        }
                        elseif ($_POST['category'] == ""){
                            echo '<h3>Explore Parks and Amenities</span></h3>';
                        }
                        ?>
                        <!--End of Showing List Result Title-->

                        <div class="listing-view-layout">
                            <ul>
                                <!--                                            <li><a class="grid active" href="#"><i class="fa fa-th-large"></i></a></li>-->
                                <!--                                            <li><a class="list" href="#"><i class="fa fa-list-ul"></i></a></li>-->
                            </ul>
                        </div>
                    </div>

                    <!-- listsearch-input-wrap  -->
                    <!-- Insert Postcode  -->
                    <div class="listsearch-input-wrap fl-wrap">
                        <div class="listsearch-input-item">
                            <i class="mbri-key single-i"></i>
                            <input type="text" name="postcode" placeholder="Search By Postcode" value="" id="search_text" />
                        </div>

                        <!-- Select Category  -->
                        <div class="listsearch-input-item">
                            <select multiple="multiple" name="value" data-placeholder="Categories" class="chosen-select" id="value" >
                                <!--                                            <option value="*">All Categories</option>-->
                                <option value="Garden">Garden</option>
                                <option value="Indoor Facility">Indoor Facility</option>
                                <option value="Outdoor Venue">Outdoor Venue</option>
                                <option value="Park">Park</option>
                                <option value="Reserve">Reserve</option>
                                <option value="Sports Center">Sports Center</option>
                            </select>
                            <input type="hidden" name="hidden_category" id="hidden_category" />
                        </div>
                        <?php

                        $catCatch = $_GET['category'];
                        if($catCatch != "")
                        {
                            $_POST['value'] = $catCatch;
                        }
                        else {
                            $catCatch = '';
                        }
                        echo $catCatch;
                        ?>

                        <!-- hidden-listing-filter -->
                        <div class="hidden-listing-filter fl-wrap">
                            <!-- Checkboxes Filter-->
                            <div class=" fl-wrap filter-tags">
                                <h4>Filter by Amenities</h4>
                                <ul>
                                    <li>
                                        <input id="disabled_access" type="checkbox" name="check" class="common_selector disabled_access" value="disabled_access">
                                        <label for="disabled_access">Disabled Access</label>

                                        <input id="slides" type="checkbox" name="check" class="common_selector slides" value="slides">
                                        <label for="slides">Slides</label>

                                        <input id="fencing" type="checkbox" name="check" class="common_selector fencing" value="fencing">
                                        <label for="fencing">Fencing</label>


                                        <input id="toilet" type="checkbox" name="check" class="common_selector toilet" value="toilet">
                                        <label for="toilet">Public Toilet</label>
                                    </li>
                                    <br><br><br><br>
                                    <li>
                                        <input id="rockers" type="checkbox" name="check" class="common_selector rockers" value="rockers">
                                        <label for="rockers">Rockers</label>
                                        <input id="climbers" type="checkbox" name="check" class="common_selector climbers" value="climbers">
                                        <label for="climbers">Climbers</label>
                                        <input id="see_saws" type="checkbox" name="check" class="common_selector see_saws" value="see_saws">
                                        <label for="see_saws">See Saws</label>
                                        <input id="swings" type="checkbox" name="check" class="common_selector swings" value="swings">
                                        <label for="swings">Swings</label>
                                        <input id="shade" type="checkbox" name="check" class="common_selector shade" value="shade">
                                        <label for="shade">Shade</label>
                                    </li>
                                    <br><br>
                                    <li>
                                        <input id="liberty_swings" type="checkbox" name="check" class="common_selector liberty_swings" value="liberty_swings">
                                        <label for="liberty_swings">Liberty Swings</label>
                                        <input id="play_structure" type="checkbox" name="check" class="common_selector play_structure" value="play_structure">
                                        <label for="play_structure">Play Structure</label>
                                        <input id="chinup_bar" type="checkbox" name="check" class="common_selector chinup_bar" value="chinup_bar">
                                        <label for="chinup_bar">Chinup Bars</label>
                                        <input id="bells_chimes" type="checkbox" name="check" class="common_selector bells_chimes" value="bells_chimes">
                                        <label for="bells_chimes">Bells Chimes</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- hidden-listing-filter end -->
                        <br/><br/><br/><br/>
                        <!--                                    <button name="submit" type="submit" class="button fs-map-btn">Update</button>-->
                        <div class="more-filter-option">More Filters <span></span></div>
                    </div>
                    </form>
                    <!-- listsearch-input-wrap end -->
                </div>
            </div>
            <!-- list-main-wrap-->
            <div class="list-main-wrap fl-wrap card-listing scroller">
                <!--                            <a class="custom-scroll-link back-to-filters btf-l" href="#lisfw"><i class="fa fa-angle-double-up"></i><span>Back to Filters</span></a> -->
                <div id="result" class="container">
                    <!--                                <div class="scroller">-->
                    <div class="row filter_data ">
                        <!--Result from database will be here-->
                        <!--                                </div>-->
                    </div>
                </div>
            </div>
            <!-- list-main-wrap end-->
        </div>
        <!--col-list-wrap -->
        <div class="limit-box fl-wrap"></div>
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6uvEZqkQXhf_Ai-vj50Phw-zMEaw7zLo"></script>
<script type="text/javascript" src="js/map_infobox.js"></script>
<script type="text/javascript" src="js/markerclusterer.js"></script>
<script type="text/javascript" src="js/maps.js"></script>
<style>
    #loading
    {
        text-align:center;
        background: url('loader.gif') no-repeat center;
        height: 150px;
    }
</style>
<script>
    $(document).ready(function()
    {
        filter_data();
        // function filter_data()
        function filter_data(query)
        {
            $('.filter_data').html('<div id="loading" style="" ></div>');
            var action = 'fetch';
            var disabled_access = get_filter('disabled_access');
            var toilet = get_filter('toilet');
            var fencing = get_filter('fencing');
            var slides = get_filter('slides');
            var rockers = get_filter('rockers');
            var climbers = get_filter('climbers');
            var see_saws = get_filter('see_saws');
            var swings = get_filter('swings');
            var liberty_swings = get_filter('liberty_swings');
            var play_structure = get_filter('play_structure');
            var chinup_bar = get_filter('chinup_bar');
            var bells_chimes = get_filter('bells_chimes');
            var shade = get_filter('shade');

            var category = $('#value').val();


            var cat = [];
            var catchCat ='';

            catchCat  = <?php echo json_encode($catCatch, JSON_HEX_TAG); ?>;


            if (!category)
            {
                if (catchCat != '') {
                    cat.push(catchCat);
                    category = cat;
                }

            }

            else
            if (category.length > 0){
                const catchCat = '';
                category = $('#value').val();
            }

            $.ajax({
                url:"fetch.php",
                method:"POST",
                data:{action:action, query:query, disabled_access:disabled_access, toilet:toilet, fencing:fencing,
                    slides:slides, category:category, rockers:rockers,climbers:climbers, see_saws:see_saws,
                    swings:swings,liberty_swings:liberty_swings,play_structure:play_structure,
                    chinup_bar:chinup_bar, bells_chimes:bells_chimes, shade:shade},
                success:function(data){
                    $('.filter_data').html(data);
                }
            });

        }

        function get_filter(class_name){
            var filter = [];
            $('.'+class_name+':checked').each(function(){
                filter.push($(this).val());
            });
            return filter;
        }

        $('.common_selector').click(function(){
            filter_data();
        });

        $('#search_text').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
                filter_data(search);
            }
            else
            {
                filter_data();
            }
        });

        //multi select drop down list
        $('#value').change(function(){
            $('#hidden_category').val($('#value').val());
            var category = [];
            category = $('#hidden_category').val();

            filter_data();
        });
    });
</script>


</body>
</html>

