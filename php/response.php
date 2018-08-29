<?php
session_start();


include("mysql_connect.php");
$rows = array();
//$_SESSION['postcode'] = "park";
// check if the input has been passed successfully
//if($_SESSION['postcode'] != "" || $_SESSION['location'] != "" ){

    //$keyword = $_SESSION['location'];

$keyword = "park";
if($keyword != ""){
    //echo "this keyword is: ".$keyword."<br>";
    // sql query for the map markers
    $sql = "SELECT PlaceName FROM Place where PlaceName like '%$keyword%'";
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0) {
        // output data
//        while($record = mysqli_fetch_assoc($result)) {
//            $rows[]=$record;
            //$json = mysqli_fetch_all ($result, MYSQLI_ASSOC);
       while( $record = mysqli_fetch_array($result,MYSQLI_ASSOC)){
           $rows[]=$record;
           //echo json_encode($record);
       }
            //echo json_encode($json );
            //echo json_encode($record);


        echo json_encode ($rows);  // pass data to javascript for map markers

}
    else {
        echo "no result";
   }
}else{
    echo "post fails";
}

mysqli_close($conn);


