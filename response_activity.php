<?php
session_start();


include("mysql_connect.php");
$rows = array();

// check if the input has been passed successfully
$postcode = $_SESSION['postcode_activity'];
$suburb = $_SESSION['suburb_activity'];
$budget = $_SESSION['budget_activity'];

$keyword = "Parent";
//if($keyword != ""){
//    $sql = "SELECT audience,activity_title,address,coordinates FROM activity where audience like '%$keyword%'";

if($postcode != "" || $suburb != "" || $budget != "" ){


    //echo "this keyword is: ".$keyword."<br>";
    // sql query for the map markers


    $sql = "SELECT * FROM activity where post_code like '%$postcode%' or suburb like '%$suburb' and  fee like '%$budget'";
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0) {
        // output data
        while($record = mysqli_fetch_assoc($result)) {
            $rows[]=$record;
            //echo json_encode($record);
        }
        echo json_encode ($rows);  // pass data to javascript for map markers

}
}
    else {
        $ql = "SELECT * FROM activity";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data

            while($record = mysqli_fetch_assoc($result)) {
                $rows[]=$record;
                echo json_encode($record);

            }
            //echo json_encode ($rows);  // pass data to javascript for map markers
   }
}
//}else{
//    echo "post fails";
//}

mysqli_close($conn);


