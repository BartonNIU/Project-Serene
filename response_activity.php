<?php
session_start();


include("mysql_connect.php");
//$rows = array();


$keyword_main = "";
$keyword = "";
$option = "";
$check_p = "";
$check_c = "";


$sql = "SELECT * FROM  activity where  suburb like '%%'";


if (isset($_POST['userinput_activity'])){
    $keyword = $_POST['userinput_activity'];
    $sql .= " and (post_code like '%$keyword%'or suburb like '%$keyword%')";
}


if (isset($_POST['value'])){
    $option = $_POST['value'];
}
if (isset($_POST['check_p'])){
    $sql .= "and parent = 'Y'";
    //$check_p = $_POST['check_p'];
}
if (isset($_POST['check_c'])){
    $sql .= "and child = 'Y'";
    //$check_c = $_POST['check_c'];
}

if (isset($_SESSION['userinput'])){
    $keyword_main = $_SESSION['userinput'];
    if( strpos($keyword_main, ",") !== false ) {
        $keyword_main = explode(",",$keyword_main)[0];
        //echo "keyword is:".$keyword_main;
    }
    if ($keyword != "" or $option != "") {
        $keyword_main="";
    }
    $sql .= " and (post_code like '%$keyword_main%' or suburb like '%$keyword_main%')";
}
//$sql = "SELECT * FROM  activity where (post_code like '%$keyword_main%' or suburb like '%$keyword_main%')";

// check if the input has been passed successfully
//echo "keywordmain value is: ".$keyword_main."<br>";



//     sql query for the map markers
//function queryResult($connect, $sql){
//    $result = mysqli_query($connect, $sql);
//    $rows = array();
//
//    if (mysqli_num_rows($result) > 0) {
//        // output data
//        while($record = mysqli_fetch_assoc($result)) {
//
//            $rows[]=$record;
//            //echo json_encode($record);
//        }
//    }
//    else {
//        $rows = ["audience" => "","activity_title" => "","address" => "Melbourne","coordinates" => "{lat: -37.8136, lng: 144.9621}"];
//        //echo "query no result";
//    }
//    echo json_encode ($rows);  //pass data to javascript for map markers
//}


// check if the userinput on the listing page exist or not
//if ($keyword != "" or $option != "") {
//    $keyword_main = "";   // to avoid the influence from the index page input
    if ($option == "All Budget Ranges"){
        //$sql = "SELECT * FROM  activity where (post_code like '%$keyword_main%' or suburb like '%$keyword_main%')and (post_code like '%$keyword%'or suburb like '%$keyword%')and (audience like '%$check_p%' and audience like '%$check_c%')";
        //queryResult($connect, $sql);
        //$sql .= "";

    }
    if ($option == "Free") {
//        $sql = "SELECT * FROM  activity where (post_code like '%$keyword_main%' or suburb like '%$keyword_main%')and (post_code like '%$keyword%'or suburb like '%$keyword%')and fee like '%$option%' and ( audience like '%$check_p%'and audience like '%$check_c%')";
//        queryResult($connect, $sql);
        $sql .= " and fee = 'Free'";

    }
    if ($option == "less than $20") {
//        $sql = "SELECT * FROM  activity where (post_code like '%$keyword_main%' or suburb like '%$keyword_main%')and (post_code like '%$keyword%'or suburb like '%$keyword%')and fee_fix <=20 and ( audience like '%$check_p%'and audience like '%$check_c%')";// like '%$option%'";
//        queryResult($connect, $sql);
        $sql .= " and fee_fix  <= 20";

    }
    if ($option == "$20-$50") {
//        $sql = "SELECT * FROM  activity where (post_code like '%$keyword_main%' or suburb like '%$keyword_main%')and (post_code like '%$keyword%'or suburb like '%$keyword%')and fee_fix >20 and fee_fix <=50 and ( audience like '%$check_p%'and audience like '%$check_c%')";// like '%$option%'";
//        queryResult($connect, $sql);
        $sql .= " and fee_fix  > 20 and fee_fix <= 50";


    }
    if ($option == "$50-$100") {
//        $sql = "SELECT * FROM  activity where (post_code like '%$keyword_main%' or suburb like '%$keyword_main%')and (post_code like '%$keyword%'or suburb like '%$keyword%') and fee_fix > 50 and fee_fix <=100 and (audience like '%$check_p%'and audience like '%$check_c%')";// like '%$option%'";
//        queryResult($connect, $sql);
        $sql .= " and fee_fix  > 50 and fee_fix <= 100";
    }
    if ($option == "more than $100") {
//        $sql = "SELECT * FROM  activity where (post_code like '%$keyword_main%' or suburb like '%$keyword_main%')and (post_code like '%$keyword%'or suburb like '%$keyword%') and fee_fix > 100 and (audience like '%$check_p%'and audience like '%$check_c%')";// like '%$option%'";
//        queryResult($connect, $sql);
        $sql .= " and fee_fix  > 100";

    }



//    else {
//        $sql = "SELECT * FROM  activity where (post_code like '%$keyword_main%' or suburb like '%$keyword_main%')and (post_code like '%$keyword%'or suburb like '%$keyword%') and (audience like '%$check_p%'and audience like '%$check_c%')"; //and description like '%$keyword%'";
//        queryResult($connect, $sql);
//    }
//}
//else{
//    $sql = "SELECT * FROM  activity where (post_code like '%$keyword_main%' or suburb like '%$keyword_main%')and (audience like '%$check_p%'and audience like '%$check_c%')"; //and description like '%$keyword%'";
//    queryResult($connect, $sql);
//}
$result = mysqli_query($connect, $sql);
$rows = array();

if (mysqli_num_rows($result) > 0) {
    // output data
    while($record = mysqli_fetch_assoc($result)) {

        $rows[]=$record;
        //echo json_encode($record);
    }
}
else {
    //$rows = ["audience" => "","activity_title" => "","address" => "Melbourne","coordinates" => "{lat: -37.8136, lng: 144.9621}"];
    $rows = [["audience" => "","activity_title" => "","address" => "Melbourne","coordinates" => "{lat: -37.8136, lng: 144.9621}"]];

    //echo "query no result";
}
echo json_encode ($rows);  //pass data to javascript for map markers

//echo json_encode ($rows);
mysqli_close($connect);


