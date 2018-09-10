<?php
session_start();


include("mysql_connect.php");
$rows = array();

$postcode = "";
$suburb = "";
$keyword = "";
$option = "";

if (isset($_SESSION['postcode'])){
    $postcode = $_SESSION['postcode'];
}
if (isset($_SESSION['suburb'])){
    $suburb = $_SESSION['suburb'];
}
if (isset($_SESSION['keyword_activity'])){
    $keyword = $_SESSION['keyword_activity'];
}
if (isset($_SESSION['option_activity'])){
    $option = $_SESSION['option_activity'];
}

// check if the input has been passed successfully


//$keyword = "Parent";
//if($keyword != ""){
//    $sql = "SELECT audience,activity_title,address,coordinates FROM activity where audience like '%$keyword%'";

//if($postcode != "" || $suburb != "" || $option != "" ){


   //echo "this keyword is: ".$keyword."<br>".$suburb."<br>".$option."<br>".$postcode;
//     sql query for the map markers

if ($option == "Free"){
    $sql = "SELECT * FROM  activity where (post_code like '%$postcode%' or suburb like '%$suburb%')and description like '%$keyword%'and fee like '%$option%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data
        while($record = mysqli_fetch_assoc($result)) {

            $rows[]=$record;
            //echo json_encode($record);
        }
    }
    else {
        $rows = ["audience" => "","activity_title" => "","address" => "Melbourne","coordinates" => "{lat: -37.8136, lng: 144.9621}"];
        //echo "query no result";
    }
}elseif ($option == "less than $20"){
    $sql = "SELECT * FROM  activity where (post_code like '%$postcode%' or suburb like '%$suburb%')and description like '%$keyword%'and fee_fix > 0 and fee_fix <=20";// like '%$option%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data
        while($record = mysqli_fetch_assoc($result)) {

            $rows[]=$record;
            //echo json_encode($record);
        }
    }
    else {
        $rows = ["audience" => "","activity_title" => "","address" => "Melbourne","coordinates" => "{lat: -37.8136, lng: 144.9621}"];
        //echo "query no result";
    }

}elseif($option == "$20-$50"){
    $sql = "SELECT * FROM  activity where (post_code like '%$postcode%' or suburb like '%$suburb%')and description like '%$keyword%'and fee_fix >20 and fee_fix <=50";// like '%$option%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data
        while($record = mysqli_fetch_assoc($result)) {

            $rows[]=$record;
            //echo json_encode($record);
        }
    }
    else {
        $rows = ["audience" => "","activity_title" => "","address" => "Melbourne","coordinates" => "{lat: -37.8136, lng: 144.9621}"];
        //echo "query no result";
    }


}elseif($option == "$50-$100"){
    $sql = "SELECT * FROM  activity where (post_code like '%$postcode%' or suburb like '%$suburb%')and description like '%$keyword%'and fee_fix > 50 and fee_fix <=100";// like '%$option%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data
        while($record = mysqli_fetch_assoc($result)) {

            $rows[]=$record;
            //echo json_encode($record);
        }
    }
    else {
        $rows = ["audience" => "","activity_title" => "","address" => "Melbourne","coordinates" => "{lat: -37.8136, lng: 144.9621}"];
        //echo "query no result";
    }

}elseif($option == "more than $100"){
    $sql = "SELECT * FROM  activity where (post_code like '%$postcode%' or suburb like '%$suburb%')and description like '%$keyword%'and fee_fix > 100";// like '%$option%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data
        while($record = mysqli_fetch_assoc($result)) {

            $rows[]=$record;
            //echo json_encode($record);
        }
    }
    else {
        $rows = ["audience" => "","activity_title" => "","address" => "Melbourne","coordinates" => "{lat: -37.8136, lng: 144.9621}"];
        //echo "query no result";
    }

}else{
    $sql = "SELECT * FROM  activity where post_code like '%$postcode%' and suburb like '%$suburb%'"; //and description like '%$keyword%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data
        while($record = mysqli_fetch_assoc($result)) {

            $rows[]=$record;
            //echo json_encode($record);
        }
    }
    else {
        $rows = ["audience" => "","activity_title" => "","address" => "Melbourne","coordinates" => "{lat: -37.8136, lng: 144.9621}"];
        //echo "query no result";
    }

}


echo json_encode ($rows);  // pass data to javascript for map markers
mysqli_close($conn);


