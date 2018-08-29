<?php
session_start();

include("mysql_connect.php");
$rows = array();

//$postcode = "3000";
$postcode = $_SESSION['postcode_place'];
$category = $_SESSION['category_place'];
$suburb = $_SESSION['suburb_place'];

$keyword = "";
if($keyword != ""){
    $sql = "SELECT category,place_name,address,coordinates FROM place where post_code like '%$keyword%'";

// check if the input has been passed successfully
//if($postcode != "" || $category != "" ){
//
//
//    // sql query for the map markers
//    $sql = "SELECT category,place_name,address,coordinates FROM place where post_code like '%$postcode%'";// and category like '%$category'";


    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0) {
        // output data

        while($record = mysqli_fetch_assoc($result)) {
            $rows[] = $record;
            //echo json_encode ($record);


        }

        echo (json_encode ($rows));  // pass data to javascript for map markers
}
}
    else {
        //echo "no result";
        $sql = "SELECT * FROM place";
        $result = mysqli_query($conn, $sql);


        if (mysqli_num_rows($result) > 0) {
            // output data
            while ($record = mysqli_fetch_assoc($result)) {
                $rows[] = $record;

                //echo json_encode ($record);
            }

            echo json_encode($rows);  // pass data to javascript for map markers
        }
}

//else{
//    echo "post fails";
//}

mysqli_close($conn);


