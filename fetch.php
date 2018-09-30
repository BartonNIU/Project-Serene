<?php
session_start();
include "mysql_connect.php";

$query = "
		SELECT * FROM explore WHERE place_name!='' ";

if (isset($_SESSION["category"])){
    $keyword_main = $_SESSION['category'];

        $query .= " AND category LIKE '%".$keyword_main."%'
            ";

    session_destroy();
}


if(isset($_POST["action"]))
{
//    $query = "
//		SELECT * FROM explore WHERE place_name!='' ";

    if(isset($_POST["query"]) && !empty($_POST["query"]))
    {
        $search = mysqli_real_escape_string($connect, $_POST["query"]);
        $query .= "
		 AND post_code LIKE '%".$search."%'  ";
    }


    if(isset($_POST["category"]) && $_POST["category"] != '*'&& !empty($_POST["category"]) )
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

    if (isset($_POST["bus_stops"])) {
        $query .= "
		 AND bus_stops='Y' ";
    }

    if (isset($_POST["trains_stops"])) {
        $query .= "
		 AND trains_stops='Y' ";
    }

    if (isset($_POST["disabled_access"])) {
        $query .= "
		 AND disabled_access='Y' ";
    }

    if (isset($_POST["toilet"])) {
        $query .= "
		 AND public_toilet='Y' ";
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
    echo $query;
    $result = mysqli_query($connect, $query);

    if(mysqli_num_rows($result) > 0)
    {
        $index =0;
        while($row = mysqli_fetch_array($result))
        {
            $orderPict = $row['id'];
            $placeName = $row['place_name'];

            $description = $row['description'] . ' ' . $placeName;
            $string = strip_tags($description);
            if (strlen($string) > 200) {

                // truncate string
                $stringCut = substr($string, 0, 200);
                $endPoint = strrpos($stringCut, ' ');

                //if the string doesn't contain any space then it will cut without word basis.
                $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
                $string .= '... <a href=detail_place.php?place='.urlencode($placeName).' >Read More</a>';
            }

            $output .='
                                <!-- listing-item -->
                             <div class="listing-item list-layout">
                                <article class="geodir-category-listing fl-wrap">
                                <a href=detail_place.php?place='.urlencode($placeName).'>
                                  <div class="geodir-category-img">
                                    <img src=picture/it3/exp/Small/'.$orderPict.'.jpeg>
                                    <div class="overlay"></div>
                                    </div>
                                    </a>
                                       <div class="geodir-category-content fl-wrap">
                                         <a class="listing-geodir-category">'. $row['category'] .'</a>
                                          <h3><a href=detail_place.php?place='.urlencode($placeName).' > '. $row['place_name'].' </a></h3>
  
                                          <p>'. $string.'</p>
                                          <div class="geodir-category-options fl-wrap">
                                          
                                      
                      
                                            <div class="geodir-category-location"><a  href="#'.$index.'" class="map-item" id="map-item'.$index.'"><i class="fa fa-map-marker" aria-hidden="true"></i>'. $row['address'].'</a></div>
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