<?php
session_start();
include "mysql_connect.php";
//$postcode;
//$suburb;
/*
    keyword_main represents the input value passed from homepage,
    keyword represents the input value passed from activity page
    option represents the category value in activity page
*/
$keyword_main = "";
$keyword_suburb = "";
$keyword = "";
$disorder="";
$option = "";
$search_text="";
$query = "
		SELECT * FROM activity WHERE activity_title !='' ";

//textbox input for postcode at listing activity page
if (isset($_POST['userinput_activity']) && !empty($_POST["userinput_activity"])){
    $keyword = $_POST['userinput_activity'];
    $query .= " AND (post_code like '%$keyword%'or suburb like '%$keyword%')";
    //echo "+++++++++++++++++++++++";
    //echo $keyword;

}

//this for money input
if (isset($_POST['value'])){
    $option = $_POST['value'];
}

if(isset($_POST["disorder"]) && $_POST["disorder"] != 'All Disorder'&& !empty($_POST["disorder"]) ){
    $disorder = $_POST["disorder"];
    if (strpos($disorder, 'ASD') !== false) {
        $query .= " AND asd='Y' ";
    }
    else if (strpos($disorder, 'CDD') !== false) {
        $query .= " AND odd='Y' ";
    }
    else if (strpos($disorder, 'CD') !== false) {
        $query .= " AND cd='Y' ";
    }
    else if (strpos($disorder, 'ADHD') !== false) {
        $query .= " AND adhd='Y' ";
    }
}

/*
    to check if user input any value on listing_activity page, if true,
    the keyword_main will be set to empty to avoid the influence from homepage
*/


if (isset($_SESSION['userinput']) || isset($_SESSION['inputDisorder'])){
    $keyword_main = $_SESSION['userinput'];
    if( strpos($keyword_main, ",") !== false ) {
        $keyword_suburb = explode(", ",$keyword_main)[0]; //suburb
        $keyword_main = explode(", ",$keyword_main)[1]; //postcode

    }
    if ($keyword != "" || $option != 'All Budget Ranges') {
        $keyword_main="";
        unset($_SESSION["userinput"]);
    }

    //echo "keyword main2 is: ". $keyword_main."<br>";
    $query .= " and (post_code like '%$keyword_main%' or suburb like '%$keyword_main%')";

    $search_text = $_SESSION['inputDisorder'];
    if (strpos($search_text, 'ASD') !== false) {
        $query .= " AND asd='Y' ";
    }
    else if (strpos($search_text, 'CDD') !== false) {
        $query .= " AND odd='Y' ";
    }
    else if (strpos($search_text, 'CD') !== false) {
        $query .= " AND cd='Y' ";
    }
    else if (strpos($search_text, 'ADHD') !== false) {
        $query .= " AND adhd='Y' ";
    }

    if($disorder != ""){
        unset($_SESSION["inputDisorder"]);
    }

    session_destroy();
}

//if(isset($_POST["postcode"], $_POST["suburb"]))
//{
//
//    if($_POST["postcode"] !== 'none' && $_POST["suburb"] !== 'none')
//    {
//        $postcode = $_POST["postcode"];
//        $suburb = $_POST["suburb"];
//        $query = "
//		SELECT * FROM activity WHERE post_code='$postcode' AND suburb='$suburb'";
//
//        $output = '';
//        $result = mysqli_query($connect, $query);
//    }
//}
//if(isset($_POST["action"]))
//{
if(isset($_POST["query"]) && !empty($_POST["query"]))
{
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
    $query .= "
		 AND post_code LIKE '%".$search."%'  ";
}
//    if($_POST["postcode"] !== 'none' && $_POST["suburb"] !== 'none')
//    {
//        $postcode = $_POST["postcode"];
//        $suburb = $_POST["suburb"];
//        $query .= "
//		 AND post_code='$postcode' AND suburb='$suburb'";
//    }
if(isset($_POST["value"]) && $_POST["value"] != 'All Budget Ranges'&& !empty($_POST["value"]) ){
    $search_text = $_POST["value"];

    //print_r($_POST["category"]);
//        echo $search_text;
    if (strpos($search_text, 'Free') !== false) {
        $query .= " AND fee='Free'";
    }
    else if (strpos($search_text, 'less than $20') !== false) {
        $query .= " AND fee_fix <= 20";
    }
    else if (strpos($search_text, '$20-$50') !== false) {
        $query .= " AND fee_fix > 20 AND fee_fix <= 50";
    }
    else if (strpos($search_text, '50-$100') !== false) {
        $query .= " AND fee_fix > 50 AND fee_fix <= 100";
    }
    else if (strpos($search_text, 'more than $100') !== false) {
        $query .= " AND fee_fix > 100";
    }
}

if (isset($_POST["check_p"])) {
    $query .= " AND parent='Y' ";
}
if (isset($_POST["check_c"])) {
    $query .= " AND child='Y' ";
}
$query .= " ORDER BY date_format ASC";
$output = '';
echo $query;
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
    $index = 0;
    while($row = mysqli_fetch_array($result))
    {
        $actName = $row['activity_title'];
        $orderPict = $row['id'];
        $description = $row['description'] . ' ' . $actName;
        $string = strip_tags($description);
        if (strlen($string) > 180) {

            // truncate string
            $stringCut = substr($string, 0, 180);
            $endPoint = strrpos($stringCut, ' ');

            //if the string doesn't contain any space then it will cut without word basis.
            $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
            $string .= '... <a href=detail_act.php?event='.urlencode($actName).' >Read More</a>';
        }
        ///$actName = str_replace("'"," ",$row['activity_title']);

        $output .='
                               <!-- listing-item -->
                            <div class="listing-item list-layout">
                                <article class="geodir-category-listing fl-wrap">
                                <a href=detail_act.php?event='.urlencode($actName).'>
                                    <div class="geodir-category-img">
                                        <img src=picture/it3/act/Small/'.$orderPict.'.jpeg>
                                        <div class="overlay"></div>
                                        <div class="list-post-counter"><span>'.$row['date'].'</span><i class="fa fa-calendar"></i></div>
                                    </div>
                                </a>
                                <div class="geodir-category-content fl-wrap" >                                     
                                    <a class="listing-geodir-category">'. $row['fee'].'</a>
                                      <h3><a href=detail_act.php?event='.urlencode($actName).' > '. $row['activity_title'].' </a></h3>
                               
                                                    <p id="map-item'.$index.'">'. $string.'</p>
                                                    <div class="geodir-category-options fl-wrap">
                                                      <div class="geodir-category-location"><a  href="#'.$index.'" class="map-item" ><i class="fa fa-map-marker" aria-hidden="true"></i>'. $row['address'].'</a></div>
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

    if(isset($_POST["disorder"])){
        $search_text = $_POST["disorder"];

        if (strpos($search_text, 'ASD') !== false) {
            $search_text = "Autism Spectrum Disorder (ASD)";
        }
        else if (strpos($search_text, 'CDD') !== false) {
            $search_text = "Oppositional Defiant Disorder (ODD)";
        }
        else if (strpos($search_text, 'CD') !== false) {
            $search_text = "Conduct Disorder (CD)";
        }
        else if (strpos($search_text, 'ADHD') !== false) {
            $search_text = "Attention Deficit Hyperactivity Disorder(ADHD)";
        }
    }


    if (isset($_SESSION['inputDisorder'])){
        $search_text = $_SESSION['inputDisorder'];

        if (strpos($search_text, 'ASD') !== false) {
            $search_text = "Autism Spectrum Disorder (ASD)";
        }
        else if (strpos($search_text, 'CDD') !== false) {
            $search_text = "Oppositional Defiant Disorder (ODD)";
        }
        else if (strpos($search_text, 'CD') !== false) {
            $search_text = "Conduct Disorder (CD)";
        }
        else if (strpos($search_text, 'ADHD') !== false) {
            $search_text = "Attention Deficit Hyperactivity Disorder (ADHD)";
        }
        //session_destroy();
    }


    echo'<p></p>';
    echo'<p></p>';
    echo'<p></p>';
    echo'<p></p>';
    echo'<p></p>';
    echo '<p> We apologize, there is no data found for your selection </p>';
    echo '<p> Below is the results for activity related to <span>"'.$search_text.'"</span></p>';

    $query = "
		SELECT * FROM activity WHERE activity_title !='' ";


    $result = mysqli_query($connect, $query);

    $index = 0;
    while($row = mysqli_fetch_array($result))
    {
        $actName = $row['activity_title'];
        $orderPict = $row['id'];
        $description = $row['description'] . ' ' . $actName;
        $string = strip_tags($description);
        if (strlen($string) > 180) {

            // truncate string
            $stringCut = substr($string, 0, 180);
            $endPoint = strrpos($stringCut, ' ');

            //if the string doesn't contain any space then it will cut without word basis.
            $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
            $string .= '... <a href=detail_act.php?event='.urlencode($actName).' >Read More</a>';
        }
        ///$actName = str_replace("'"," ",$row['activity_title']);

        $output .='
                               <!-- listing-item -->
                            <div class="listing-item list-layout">
                                <article class="geodir-category-listing fl-wrap">
                                <a href=detail_act.php?event='.urlencode($actName).'>
                                    <div class="geodir-category-img">
                                        <img src=picture/it3/act/Small/'.$orderPict.'.jpeg>
                                        <div class="overlay"></div>
                                        <div class="list-post-counter"><span>'.$row['date'].'</span><i class="fa fa-calendar"></i></div>
                                    </div>
                                </a>
                                <div class="geodir-category-content fl-wrap" >                                     
                                    <a class="listing-geodir-category">'. $row['fee'].'</a>
                                      <h3><a href=detail_act.php?event='.urlencode($actName).' > '. $row['activity_title'].' </a></h3>
                               
                                                    <p id="map-item'.$index.'">'. $string.'</p>
                                                    <div class="geodir-category-options fl-wrap">
                                                      <div class="geodir-category-location"><a  href="#'.$index.'" class="map-item" ><i class="fa fa-map-marker" aria-hidden="true"></i>'. $row['address'].'</a></div>
                                                    </div>
                                            </div>
                                 </article>
                             </div>
                             
                               <!-- listing-item end-->';
        $index++;
    }
    echo $output;
}
//}
/* close connection */
$connect->close();
?>