<?php
include "mysql_connect.php";

if(isset($_POST["action"]))
{
    $query = "
		SELECT * FROM places WHERE place_name!='' ";

    if(isset($_POST["query"]) && !empty($_POST["query"]))
    {
        $search = mysqli_real_escape_string($connect, $_POST["query"]);
        $query .= "
		 AND postcode LIKE '%".$search."%'  ";
    }

    if(isset($_POST["category"]) && $_POST["category"] != 'All Categories'&& !empty($_POST["category"]) )
    {
        $search_text = "'" . implode("', '", $_POST["category"]) . "'";
//        print_r($_POST["category"]);
//        echo $search_text;

        $countCat= strlen($search_text);
//        echo $countCat;
        if($countCat <= 3)
        {
            $query .= " AND category NOT IN (".$search_text.")
            ";
        }
        //        print_r($search_text);

        else{
            $query .= " AND category IN (".$search_text.")
            ";
        }
    }

    if (isset($_POST["disabled_access"])) {
        $query .= "
		 AND disabled_access='Y' ";
    }

    if (isset($_POST["toilet"])) {
        $query .= "
		 AND toilet='Y' ";
    }

    if (isset($_POST["fencing"])) {
        $query .= "
		 AND fencing='Y' ";
    }

    if (isset($_POST["slides"])) {
        $query .= "
		 AND slides='Y' ";
    }

    if (isset($_POST["rockers"])) {
        $query .= "
		 AND rockers='Y' ";
    }

    if (isset($_POST["climbers"])) {
        $query .= "
		 AND climbers='Y' ";
    }

    if (isset($_POST["see_saws"])) {
        $query .= "
		 AND see_saws='Y' ";
    }

    if (isset($_POST["swings"])) {
        $query .= "
		 AND swings='Y' ";
    }

    if (isset($_POST["liberty_swings"])) {
        $query .= "
		 AND liberty_swings='Y' ";
    }

    if (isset($_POST["play_structure"])) {
        $query .= "
		 AND play_structure='Y' ";
    }

    if (isset($_POST["chinup_bar"])) {
        $query .= "
		 AND chinup_bar='Y' ";
    }

    if (isset($_POST["bells_chimes"])) {
        $query .= "
		 AND bells_chimes='Y' ";
    }

    if (isset($_POST["shade"])) {
        $query .= "
		 AND shade='Y' ";
    }

    $output = '';
//    echo $query;
    $result = mysqli_query($connect, $query);

    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            $orderPict = $row['ID'];
            $placeName = $row['place_name'];
            $output .='
                                <!-- listing-item -->
                             <div class="listing-item list-layout">
                                <article class="geodir-category-listing fl-wrap">
                                <a href=detail_place.php?place='.urlencode($placeName).'>
                                  <div class="geodir-category-img">
                                    <img src=picture/it2/Explore/'.$orderPict.'.jpeg>
                                    <div class="overlay"></div>
                                    </div>
                                    </a>
                                       <div class="geodir-category-content fl-wrap">
                                         <a class="listing-geodir-category">'. $row['category'] .'</a>
                                          <h3><a href=detail_place.php?place='.urlencode($placeName).' > '. $row['place_name'].' </a></h3>
  
                                          <p>'. $row['description'].'</p>
                                          <div class="geodir-category-options fl-wrap">
                                          
                                      
                      
                                            <div class="geodir-category-location"><a  href="#0" class="map-item"><i class="fa fa-map-marker" aria-hidden="true"></i>'. $row['address'].'</a></div>
                                          </div>
                                       </div>
                                   </article>
                               </div>
                               <!-- listing-item end-->';
        }
        echo $output;
    }
    else{
        echo'<p></p>';
        echo'<p></p>';
        echo'<p></p>';
        echo'<p></p>';
        echo'<p></p>';
        echo '<p> We apologize, there is no data found for your selection </p>';
    }

}
/* close connection */
$connect->close();
?>