<?php include "includes/header.php"; ?>
<?php include "mysql_connect.php"; ?>
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
                        $postAndSuburb = mysqli_real_escape_string($connect, $_POST['postcode']);
                        echo $postAndSuburb;
                        $query = "SELECT * FROM address WHERE postnsuburb ='$postAndSuburb' ";
                        $output = '';
                        $postcode = 'none';
                        $suburb = 'none';
                        $result = mysqli_query($connect, $query);


                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result)) {
                                $postcode=$row['postcode'];
                                $suburb=$row['suburb'];
                            }
                        }
                        ?>

                        <?php
                        if($_POST['value'] != "") {
                            echo '<h3>Results For : <span>'.$_POST['value'].'</span></h3>';
                        }
                        elseif ($_POST['value'] == ""){
                            echo '<h3>Activities For Behavioral Issues Children</span></h3>';
                        }
                        ?>


                        <div class="listing-view-layout">
                            <ul>
                                <!--                                <li><a class="grid active" href="#"><i class="fa fa-th-large"></i></a></li>-->
                                <!--                                <li><a class="list" href="#"><i class="fa fa-list-ul"></i></a></li>-->
                            </ul>
                        </div>
                    </div>

                    <form  id = "pageinput">
                        <!-- listsearch-input-wrap  -->
                        <div class="listsearch-input-wrap fl-wrap">
                            <div class="listsearch-input-item">
                                <i class="mbri-key single-i"></i>
                                <input type="text" name="userinput_activity" placeholder="Search by Postcode" value="" id="search_text" onchange="ajaxSearch_activity()"/>
                            </div>
                            <div class="listsearch-input-item">
                                <select name="value" data-placeholder="All Range Budgets" class="chosen-select" id="value" onchange="ajaxSearch_activity()">
                                    <option value="All Budget Ranges">All Budget Ranges</option>
                                    <option value="Free">Free</option>
                                    <option value="less than $20">less than $20</option>
                                    <option value="$20-$50">$20-$50</option>
                                    <option value="$50-$100">$50-$100</option>
                                    <option value="more than $100">more than $100</option>
                                </select>
                                <input type="hidden" name="hidden_category" id="hidden_category" />
                            </div>

                            <!-- hidden-listing-filter -->
                            <div class="hidden-listing-filter fl-wrap">
                                <!-- Checkboxes Filter -->
                                <div class=" fl-wrap filter-tags">
                                    <h4>Filter by Target Audience</h4>
                                    <input id="Parent" type="checkbox" name="check_p" class="common_selector Parent" value="Parent" onchange="ajaxSearch_activity()">
                                    <label for="Parent">Parent</label>
                                    <input id="Children" type="checkbox" name="check_c" class="common_selector Children" value="Children" onchange="ajaxSearch_activity()">
                                    <label for="Children">Children</label>
                                </div>
                            </div>
                            <button type ="button" class="button fs-map-btn">Update</button>
                            <!-- hidden-listing-filter end -->
                            <br/><br/><br/><br/>


                            <div class="more-filter-option">More Filters <span></span></div>
                        </div>
                    </form>
                    <!-- listsearch-input-wrap end -->
                </div>
            </div>
            <!-- list-main-wrap-->
            <div class="list-main-wrap fl-wrap card-listing scroller">
                <!--                <a class="custom-scroll-link back-to-filters btf-l" href="#lisfw"><i class="fa fa-angle-double-up"></i><span>Back to Filters</span></a>-->
                <div class="container">
                    <div class="row filter_data ">
                        <!--Result from database will be here-->
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
<?php
// pass data to response_activity.php for map searching
$_SESSION['userinput'] = $_POST['postcode'];
//$_SESSION['suburb_activity'] = $_POST['suburb'];
//$_SESSION['budget_activity'] = $_POST['value'];
?>
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
<!--		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6uvEZqkQXhf_Ai-vj50Phw-zMEaw7zLo&libraries=places&callback=initAutocomplete"></script>-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6uvEZqkQXhf_Ai-vj50Phw-zMEaw7zLo"></script>
<script type="text/javascript" src="js/map_infobox.js"></script>
<script type="text/javascript" src="js/markerclusterer.js"></script>
<script type="text/javascript" src="js/maps_activity.js"></script>

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
        function filter_data(query)
        {
            $('.filter_data').html('<div id="loading" style="" ></div>');
            var action = 'fetch_act';
            var Parent = get_filter('Parent');
            var Children = get_filter('Children');
            var category = $('#value').val();
            var lengthParent = Parent.length;
            var lenthChildren = Children.length;

            var postcode  = '';
            postcode = <?php echo json_encode($postcode, JSON_HEX_TAG); ?>;
            var suburb = '';
            suburb = <?php echo json_encode($suburb, JSON_HEX_TAG); ?>;
            // document.getElementById("demo").innerHTML = 'query:' + query;
            // document.getElementById("demo").innerHTML = 'parent:' + Parent.length;
            // if(query!='' || Parent !== [] || Children !== [] || category !='')
            if( category!=='All Budget Ranges' || lengthParent != 0 || lenthChildren != 0 ||query != undefined)
            {
                postcode = 'none';
                suburb = 'none';
            }

            $.ajax({
                url:"fetch_act.php",
                method:"POST",
                data:{action:action, query:query, Parent:Parent, Children:Children, category:category, postcode:postcode, suburb:suburb},
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
            var category = $('#hidden_category').val();

            filter_data();
        });

    });


</script>

</body>
</html>
