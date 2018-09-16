<?php
include "mysql_connect.php";
                    // Random Image function
                    include "randomImage.php";

if(isset($_POST["action"]))
{
    $query = "
		SELECT * FROM activity WHERE activity_title !='' ";

    if(isset($_POST["query"]) && !empty($_POST["query"]))
    {
        $search = mysqli_real_escape_string($connect, $_POST["query"]);
        $query .= "
		 AND post_code LIKE '%".$search."%'  ";
    }

    if(isset($_POST["category"]) && $_POST["category"] != 'All Categories'&& !empty($_POST["category"]) ){
            $search_text = $_POST["category"];

            //print_r($_POST["category"]);
            echo $search_text;

            if (strpos($search_text, 'Free') !== false) {
            $query .= "AND fee='Free'";
        }
        else if (strpos($search_text, 'less than $20') !== false) {
            $query .= "AND fee_fix <= 20";
        }
        else if (strpos($search_text, '$20-$50') !== false) {
            $query .= "AND fee_fix > 20 AND fee_fix <= 50";
        }
        else if (strpos($search_text, '50-$100') !== false) {
            $query .= "AND fee_fix > 50 AND fee_fix <= 100";
        }
        else if (strpos($search_text, 'more than $100') !== false) {
            $query .= "AND fee_fix > 100";
        }
     }

    if (isset($_POST["Parent"])) {
        $query .= "
		 AND parent='Y' ";
    }

    if (isset($_POST["Children"])) {
        $query .= "
		 AND child='Y' ";
    }

    $output = '';
    echo $query;
    $result = mysqli_query($connect, $query);

    if(mysqli_num_rows($result) > 0)
    {
        $index = 0;
        while($row = mysqli_fetch_array($result))
        {
            $actName = $row['activity_title'];
            $output .='
                                <!-- listing-item -->
                            <div class="listing-item list-layout">
                                <article class="geodir-category-listing fl-wrap">
                                    <div class="geodir-category-img">
                                        <img src=' . random_image('picture/Activities') . ' >
                                        <div class="overlay"></div>
                                        </div>
                                            <div class="geodir-category-content fl-wrap">                                     
                                                <a class="listing-geodir-category">Activity</a>
                                                    <h3><a href=detail_act.php?event='.urlencode($actName).' > '. $row['activity_title'].' </a></h3>
                                                    <h6> Fee: '. $row['fee']. ' </h6>
                                                    <p> postcode:'. $row['post_code'].' </p>
                                                    <p> audience:'. $row['audience'].' </p>
                                                    <p>'. $row['description'].'</p>
                                                    <div class="geodir-category-options fl-wrap">
                                                      <div class="geodir-category-location"><a  href="#'.$index.'" class="map-item"><i class="fa fa-map-marker" aria-hidden="true"></i>'. $row['address'].'</a></div>
                                                    </div>
                                            </div>
                                 </article>
                             </div>
                               <!-- listing-item end-->';
            $index++;
        }
        echo $output;
    }

    else{
        echo '<h4> We apologize, there is no data found for your selection </h4>';
    }
}

//                    $postcode=$_POST['postcode'];
//                    $suburb=$_POST['suburb'];
//
//
//
//                    if($postcode == "" && $suburb == "") {
//                        if (($_POST['value']) == 'Free') {
//                            $query = $mysqli->query("Select * from activity_list WHERE fee='Free'");
//                        } elseif (($_POST['value']) == 'less than $20') {
//                            $query = $mysqli->query("Select * from activity_list WHERE fee_fix <= 20");
//                        } elseif (($_POST['value']) == '$20-$50') {
//                            $query = $mysqli->query("Select * from activity_list WHERE fee_fix > 20 AND fee_fix <= 50");
//                        } elseif (($_POST['value']) == '$50-$100') {
//                            $query = $mysqli->query("Select * from activity_list WHERE fee_fix > 50 AND fee_fix <= 100");
//                        } elseif (($_POST['value']) == 'more than $100') {
//                            $query = $mysqli->query("Select * from activity_list WHERE fee_fix > 100");
//                        }
//                        else {
//                            $query = $mysqli->query("Select * from activity_list");
//                        }
//                    }
//
//                    elseif($postcode != "" && $suburb == ""){
//                        if (($_POST['value']) == 'Free') {
//                            $query = $mysqli->query("Select * from activity_list WHERE fee='Free' AND postcode='$postcode'");
//                        } elseif (($_POST['value']) == 'less than $20') {
//                            $query = $mysqli->query("Select * from activity_list WHERE fee_fix <= 20 AND postcode='$postcode'");
//                        } elseif (($_POST['value']) == '$20-$50') {
//                            $query = $mysqli->query("Select * from activity_list WHERE fee_fix > 20 AND fee_fix <= 50 AND postcode='$postcode'");
//                        } elseif (($_POST['value']) == '$50-$100') {
//                            $query = $mysqli->query("Select * from activity_list WHERE fee_fix > 50 AND fee_fix <= 100 AND postcode='$postcode'");
//                        } elseif (($_POST['value']) == 'more than $100') {
//                            $query = $mysqli->query("Select * from activity_list WHERE fee_fix > 100 AND postcode='$postcode'");
//                        }
//                        else {
//                            $query = $mysqli->query("Select * from activity_list WHERE postcode='$postcode'");
//                        }
//                    }
//
//                    elseif($postcode == "" && $suburb != ""){
//                        if (($_POST['value']) == 'Free') {
//                            $query = $mysqli->query("Select * from activity_list WHERE fee='Free' AND suburb='$suburb'");
//                        } elseif (($_POST['value']) == 'less than $20') {
//                            $query = $mysqli->query("Select * from activity_list WHERE fee_fix <= 20 AND suburb='$suburb'");
//                        } elseif (($_POST['value']) == '$20-$50') {
//                            $query = $mysqli->query("Select * from activity_list WHERE fee_fix > 20 AND fee_fix <= 50 AND suburb='$suburb'");
//                        } elseif (($_POST['value']) == '$50-$100') {
//                            $query = $mysqli->query("Select * from activity_list WHERE fee_fix > 50 AND fee_fix <= 100 AND suburb='$suburb'");
//                        } elseif (($_POST['value']) == 'more than $100') {
//                            $query = $mysqli->query("Select * from activity_list WHERE fee_fix > 100 AND suburb='$suburb'");
//                        }
//                        else {
//                            $query = $mysqli->query("Select * from activity_list WHERE suburb='$suburb'");
//                        }
//                    }
//
//                    elseif($postcode != "" && $suburb != ""){
//                        if (($_POST['value']) == 'Free') {
//                            $query = $mysqli->query("Select * from activity_list WHERE fee='Free' AND suburb='$suburb' AND postcode='$postcode'");
//                        } elseif (($_POST['value']) == 'less than $20') {
//                            $query = $mysqli->query("Select * from activity_list WHERE fee_fix <= 20 AND suburb='$suburb' AND postcode='$postcode'");
//                        } elseif (($_POST['value']) == '$20-$50') {
//                            $query = $mysqli->query("Select * from activity_list WHERE fee_fix > 20 AND fee_fix <= 50 AND suburb='$suburb' AND postcode='$postcode'");
//                        } elseif (($_POST['value']) == '$50-$100') {
//                            $query = $mysqli->query("Select * from activity_list WHERE fee_fix > 50 AND fee_fix <= 100 AND suburb='$suburb' AND postcode='$postcode'");
//                        } elseif (($_POST['value']) == 'more than $100') {
//                            $query = $mysqli->query("Select * from activity_list WHERE fee_fix > 100 AND suburb='$suburb' AND postcode='$postcode'");
//                        }
//                        else {
//                            $query = $mysqli->query("Select * from activity_list WHERE suburb='$suburb' AND post_code='$postcode'");
//                        }
//                    }
//
//                    else{
//                        $query = $mysqli->query("Select * from activity_list");
//                    }
//
//                    $row_cnt = $query ->num_rows;
//                    if( $row_cnt == 0){
//                        echo '<p> We apologize, there is no data found for your selection </p>';
//                    }
//
//                    while($row = $query -> fetch_array())
//                    {
//                        //<!-- listing-item -->
//                        echo  '<div class="listing-item list-layout">';
//                        echo    '<article class="geodir-category-listing fl-wrap">';
//                        echo      '<div class="geodir-category-img">';
//                        echo "<img src=" . random_image('picture/Activities') . " />";
//                        echo       '<div class="overlay"></div>';
////                                      echo      '<div class="list-post-counter"><span>1523</span><i class="fa fa-heart"></i></div>';
//                        echo  '</div>';
//                        echo '<div class="geodir-category-content fl-wrap">';
////                                        echo '<a class="listing-geodir-category" href="listing.html">'. $row['Category'] . '</a>';
//                        echo '<a class="listing-geodir-category">Activity</a>';
////                                         echo   '<div class="listing-avatar"><a href="author-single.html"><img src="images/avatar/1.jpg" alt=""></a>';
////                                          echo      '<span class="avatar-tooltip">Added By  <strong>Mark Rose</strong></span>';
////                                          echo  '</div>';
////                                    echo '<h3><a href="listing-single.html">'. $row['place_name']. '</a></h3>';
//                        echo '<h3>'. $row['activity_title']. '</h3>';
//                        echo '<h6> Fee: '. $row['fee']. ' </h6>';
//                        echo '<p> Postcode:'. $row['postcode']. ' </p>';
//                        echo  '<p>'. $row['description']. '</p>';
//                        echo  '<div class="geodir-category-options fl-wrap">';
////                                           echo     '<div class="listing-rating card-popup-rainingvis" data-starrating2="4">';
////                                            echo       ' <span>(17 reviews)</span>';
////                                            echo    '</div>';
//                        echo '<div class="geodir-category-location"><a  href="#'.$row['ID'] .'" class="map-item"><i class="fa fa-map-marker" aria-hidden="true"></i>'. $row['address'].'</a></div>';
//                        echo '</div>';
//                        echo '</div>';
//                        echo '</article>';
//                        echo '</div>';
//                        // <!-- listing-item end-->
//                    }



                    /* close connection */
                    $connect->close();
                    ?>


