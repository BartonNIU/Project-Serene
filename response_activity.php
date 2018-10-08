<?php
session_start();


include("mysql_connect.php");
//$rows = array();


$keyword_main = "";
$keyword = "";
$budget = "";
$disorder="";
$disorderInput="";
$check_p = "";
$check_c = "";


$sql = "SELECT * FROM  activity where  suburb like '%%'";


if (isset($_POST['userinput_activity'])){
    $keyword = $_POST['userinput_activity'];
    $sql .= " and (post_code like '%$keyword%'or suburb like '%$keyword%')";
}

if (isset($_POST['value'])){
    $budget = $_POST['value'];
}
if (isset($_POST['check_p'])){
    $sql .= "and parent = 'Y'";
    //$check_p = $_POST['check_p'];
}
if (isset($_POST['check_c'])){
    $sql .= "and child = 'Y'";
    //$check_c = $_POST['check_c'];
}

if (isset($_POST['disorder'])){
    $disorder = $_POST['disorder'];
    //echo $disorder;
    if ($disorder == "All Disorder"){

    }
    if ($disorder == "ASD"){ //strpos($disorder, 'ASD') !== false) {
        $sql .= " AND asd='Y' ";
    }
    if (strpos($disorder, 'CDD') !== false) {
        $sql .= " AND odd='Y' ";
    }
    if ($disorder == "CD"){//(strpos($disorder, 'CD') !== false) {
        $sql .= " AND cd='Y' ";
    }
    if ($disorder == "ADHD"){//(strpos($disorder, 'ADHD') !== false) {
        $sql .= " AND adhd='Y' ";
    }

    //$sql .= " and disorder like '%$disorder%'";
}


if (isset($_SESSION['userinput']) || isset($_SESSION['inputDisorder'])){
    $keyword_main = $_SESSION['userinput'];
    if( strpos($keyword_main, ",") !== false ) {
        $keyword_main = explode(",",$keyword_main)[1];
        //echo "keyword is:".$keyword_main;
    }
    if ($keyword != "" || $option !="") {
        $keyword_main="";
        unset($_SESSION["userinput"]);
    }
    $sql .= " and (post_code like '%$keyword_main%' or suburb like '%$keyword_main%')";

    $disorderInput = $_SESSION['inputDisorder'];
    if (strpos($disorderInput, 'ASD') !== false) {
        $sql .= " AND asd='Y' ";
    }
    else if (strpos($disorderInput, 'CDD') !== false) {
        $sql .= " AND odd='Y' ";
    }
    else if (strpos($disorderInput, 'CD') !== false) {
        $sql .= " AND cd='Y' ";
    }
    else if (strpos($disorderInput, 'ADHD') !== false) {
        $sql .= " AND adhd='Y' ";
    }

    if($disorder != ""){
        unset($_SESSION["inputDisorder"]);
    }
    //session_destroy();
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
//if ($keyword != "" or $budget != "") {
//    $keyword_main = "";   // to avoid the influence from the index page input
    if ($budget == "All Budget Ranges"){
        //$sql = "SELECT * FROM  activity where (post_code like '%$keyword_main%' or suburb like '%$keyword_main%')and (post_code like '%$keyword%'or suburb like '%$keyword%')and (audience like '%$check_p%' and audience like '%$check_c%')";
        //queryResult($connect, $sql);
        //$sql .= "";

    }
    if ($budget == "Free") {
//        $sql = "SELECT * FROM  activity where (post_code like '%$keyword_main%' or suburb like '%$keyword_main%')and (post_code like '%$keyword%'or suburb like '%$keyword%')and fee like '%$budget%' and ( audience like '%$check_p%'and audience like '%$check_c%')";
//        queryResult($connect, $sql);
        $sql .= " and fee = 'Free'";

    }
    if ($budget == "less than $20") {
//        $sql = "SELECT * FROM  activity where (post_code like '%$keyword_main%' or suburb like '%$keyword_main%')and (post_code like '%$keyword%'or suburb like '%$keyword%')and fee_fix <=20 and ( audience like '%$check_p%'and audience like '%$check_c%')";// like '%$budget%'";
//        queryResult($connect, $sql);
        $sql .= " and fee_fix  <= 20";

    }
    if ($budget == "$20-$50") {
//        $sql = "SELECT * FROM  activity where (post_code like '%$keyword_main%' or suburb like '%$keyword_main%')and (post_code like '%$keyword%'or suburb like '%$keyword%')and fee_fix >20 and fee_fix <=50 and ( audience like '%$check_p%'and audience like '%$check_c%')";// like '%$budget%'";
//        queryResult($connect, $sql);
        $sql .= " and fee_fix  > 20 and fee_fix <= 50";


    }
    if ($budget == "$50-$100") {
//        $sql = "SELECT * FROM  activity where (post_code like '%$keyword_main%' or suburb like '%$keyword_main%')and (post_code like '%$keyword%'or suburb like '%$keyword%') and fee_fix > 50 and fee_fix <=100 and (audience like '%$check_p%'and audience like '%$check_c%')";// like '%$budget%'";
//        queryResult($connect, $sql);
        $sql .= " and fee_fix  > 50 and fee_fix <= 100";
    }
    if ($budget == "more than $100") {
//        $sql = "SELECT * FROM  activity where (post_code like '%$keyword_main%' or suburb like '%$keyword_main%')and (post_code like '%$keyword%'or suburb like '%$keyword%') and fee_fix > 100 and (audience like '%$check_p%'and audience like '%$check_c%')";// like '%$budget%'";
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
$sql .= " ORDER BY date_format ASC";
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

    $sql = "SELECT * FROM activity where suburb like '%%'";
    if (isset($_POST['disorder'])) {
        if ($disorder == "ASD") { //strpos($disorder, 'ASD') !== false) {
            $sql .= " AND asd='Y' ";
        }
        if (strpos($disorder, 'CDD') !== false) {
            $sql .= " AND odd='Y' ";
        }
        if ($disorder == "CD") {//(strpos($disorder, 'CD') !== false) {
            $sql .= " AND cd='Y' ";
        }
        if ($disorder == "ADHD") {//(strpos($disorder, 'ADHD') !== false) {
            $sql .= " AND adhd='Y' ";
        }
    }
//    else {
//        if (strpos($disorderInput, 'ASD') !== false) {
//            $sql .= " AND asd='Y' ";
//        }
//        if (strpos($disorderInput, 'CDD') !== false) {
//            $sql .= " AND odd='Y' ";
//        }
//        if (strpos($disorderInput, 'CD') !== false) {
//            $sql .= " AND cd='Y' ";
//        }
//        if (strpos($disorderInput, 'ADHD') !== false) {
//            $sql .= " AND adhd='Y' ";
//        }
//    }
    $result = mysqli_query($connect, $sql);
    while($record = mysqli_fetch_assoc($result)) {
        $rows[] = $record;
        //echo json_encode ($record);
    }
    //$rows = [["audience" => "","activity_title" => "","address" => "Melbourne","coordinates" => "{lat: -37.8136, lng: 144.9621}"]];
   // $rows = [];

    //echo "query no result";
}
echo json_encode ($rows);  //pass data to javascript for map markers

//echo json_encode ($rows);
mysqli_close($connect);


