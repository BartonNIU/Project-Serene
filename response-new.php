<?php
session_start();


include("mysql_connect.php");
$rows = array();
//$keyword = "Park";
// check if the input has been passed successfully
$postcode = $_SESSION['postcode_place'];
$category = $_SESSION['category_place'];
$suburb = $_SESSION['suburb_place'];

if($postcode != "" || $category != "" ) {
//    if($keyword != ""){

    //echo "this keyword is: ".$keyword."<br>";
    // sql query for the map markers
    $sql = "SELECT * FROM places where post_code like '%$postcode%' and category like '%$category'";
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0) {
        // output data
        while ($record = mysqli_fetch_assoc($result)) {
            $rows[] = $record;

        }
        echo json_encode($rows);  // pass data to javascript for map markers

    } else {
        //echo "no result";
        $sql = "SELECT * FROM places ";
        $result = mysqli_query($conn, $sql);


        if (mysqli_num_rows($result) > 0) {
            // output data
            while ($record = mysqli_fetch_assoc($result)) {
                $rows[] = $record;

            }
            echo json_encode($rows);  // pass data to javascript for map markers

        }
    }
}
else{
    echo "post fails";
}

mysqli_close($conn);


