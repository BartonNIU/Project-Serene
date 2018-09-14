<?php
session_start();


include("mysql_connect.php");
//$rows = array();

$postcode = "";
$suburb = "";
$keyword = "";
$option = "";

//if (isset($_SESSION['postcode'])){
//    $postcode = $_SESSION['postcode'];
//}
//if (isset($_SESSION['suburb'])){
//    $suburb = $_SESSION['suburb'];
//}

//if (isset($_SESSION['keyword_activity'])){
//    $keyword = $_SESSION['keyword_activity'];
//}
//if (isset($_SESSION['option_activity'])){
//    $option = $_SESSION['option_activity'];
//}

if (isset($_POST['postcode'])){
    $keyword = $_POST['postcode'];
}
if (isset($_POST['value'])){
    $option = $_POST['value'];
}

// check if the input has been passed successfully

//if($postcode != "" || $suburb != "" || $option != "" ){

   //echo "this keyword is: ".$keyword."<br>".$suburb."<br>".$option."<br>".$postcode;
//     sql query for the map markers
function queryResult($conn, $sql){
    $result = mysqli_query($conn, $sql);
    $rows = array();

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
    echo json_encode ($rows);
}

if ($option == "Free"){
    $sql = "SELECT * FROM  activity where (post_code like '%$postcode%' or suburb like '%$suburb%')and post_code like '%$keyword%'and fee like '%$option%'";
    queryResult($conn, $sql);

}elseif ($option == "less than $20"){
    $sql = "SELECT * FROM  activity where (post_code like '%$postcode%' or suburb like '%$suburb%')and description like '%$keyword%'and fee_fix <=20";// like '%$option%'";
    queryResult($conn, $sql);


}elseif($option == "$20-$50"){
    $sql = "SELECT * FROM  activity where (post_code like '%$postcode%' or suburb like '%$suburb%')and description like '%$keyword%'and fee_fix >20 and fee_fix <=50";// like '%$option%'";
    queryResult($conn, $sql);


}elseif($option == "$50-$100"){
    $sql = "SELECT * FROM  activity where (post_code like '%$postcode%' or suburb like '%$suburb%')and description like '%$keyword%'and fee_fix > 50 and fee_fix <=100";// like '%$option%'";
    queryResult($conn, $sql);

}elseif($option == "more than $100"){
    $sql = "SELECT * FROM  activity where (post_code like '%$postcode%' or suburb like '%$suburb%')and description like '%$keyword%'and fee_fix > 100";// like '%$option%'";
    queryResult($conn, $sql);

}else{
    $sql = "SELECT * FROM  activity where post_code like '%$keyword%' or suburb like '%$keyword%'"; //and description like '%$keyword%'";
    queryResult($conn, $sql);

}


//echo json_encode ($rows);  // pass data to javascript for map markers
mysqli_close($conn);


