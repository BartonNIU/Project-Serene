<?php
include "mysql_connect.php";

$postcode;
$suburb;
if(isset($_POST["postcode"], $_POST["suburb"]))
{

    if($_POST["postcode"] !== 'none' && $_POST["suburb"] !== 'none')
    {
        $postcode = $_POST["postcode"];
        $suburb = $_POST["suburb"];
        $query = "
		SELECT * FROM activity WHERE post_code='$postcode' AND suburb='$suburb'";

        $output = '';
        $result = mysqli_query($connect, $query);
    }
}


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

    if($_POST["postcode"] !== 'none' && $_POST["suburb"] !== 'none')
    {
        $postcode = $_POST["postcode"];
        $suburb = $_POST["suburb"];
        $query .= "
		 AND post_code='$postcode' AND suburb='$suburb'";
    }


    if(isset($_POST["category"]) && $_POST["category"] != 'All Categories'&& !empty($_POST["category"]) ){
        $search_text = $_POST["category"];

        //print_r($_POST["category"]);
//        echo $search_text;

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
//    echo $query;
    $result = mysqli_query($connect, $query);


    if(mysqli_num_rows($result) > 0)
    {
        $index = 0;
        while($row = mysqli_fetch_array($result))
        {
            $orderPict = $row['id'];
            ///$actName = str_replace("'"," ",$row['activity_title']);
            $actName = $row['activity_title'];
            $output .='
                                <!-- listing-item -->
                            <div class="listing-item list-layout">
                                <article class="geodir-category-listing fl-wrap">
                                <a href=detail_act.php?event='.urlencode($actName).'>
                                    <div class="geodir-category-img">
                                        <img src=picture/it2/Activities/'.$orderPict.'.jpeg>
                                        <div class="overlay"></div>
                                        </div>
                                        </a>
                                            <div class="geodir-category-content fl-wrap">                                     
                                                <a class="listing-geodir-category">'. $row['fee'].'</a>
                                                    <h3><a href=detail_act.php?event='.urlencode($actName).' > '. $row['activity_title'].' </a></h3>
                                              
                                            
                                                    <p>'. $row['description'].'</p>
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