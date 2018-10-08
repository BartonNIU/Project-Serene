<?php
session_start();

include("mysql_connect.php");
$rows = array();

//$postcode = "";
//$suburb = "";
$keyword = "";
$option = "'" . implode("', '", array('Park','Garden','Farm','Venue','Reserve','Sports Center')) . "'";
//echo $option;

if (isset($_SESSION["category"]) and $_SESSION["category"] != ""){
    //$option = "'" . implode("', '", $_SESSION["category"]) . "'";
    $option = "'" .$_SESSION["category"]. "'";
    //echo gettype($option);

}
if (isset($_POST['userinput_place'])){
    $keyword = $_POST['userinput_place'];
}
if (isset($_POST['category'])){
    //$option = $_POST['category'];
    //$option=implode("','",$_POST['category']);
    $option = "'" . implode("', '", $_POST["category"]) . "'";

}


    // sql query for the map markers
    $sql = "SELECT * FROM explore where (post_code like '%$keyword%' or suburb like '%$keyword%')  and category in ($option) "; //and description like '%$keyword%'

    if(isset($_POST["check_disable"])){
        $sql .= " and disabled_access='Y'";
    }
    if(isset($_POST["check_fencing"])){
        $sql .= " and fencing='Y'";
    }
    if(isset($_POST["check_toilet"])){
        $sql .= " and public_toilet='Y'";
    }
    if(isset($_POST["check_slide"])){
        $sql .= " and slides='Y'";
    }
    if(isset($_POST["check_play"])){
        $sql .= " and play_structure='Y'";
    }
    if(isset($_POST["check_liberty"])){
        $sql .= " and liberty_swings='Y'";
    }
    if(isset($_POST["check_chinup"])){
        $sql .= " and chinup_bar='Y'";
    }
    if(isset($_POST["check_bell"])){
        $sql .= " and bells_chimes='Y'";
    }
    if(isset($_POST["check_rocker"])){
        $sql .= " and rockers='Y'";
    }
    if(isset($_POST["check_climber"])){
        $sql .= " and climbers='Y'";
    }
    if(isset($_POST["check_saw"])){
        $sql .= " and see_saws='Y'";
    }
    if(isset($_POST["check_swing"])){
        $sql .= " and swings='Y'";
    }
    if(isset($_POST["check_shade"])){
        $sql .= " and shade='Y'";
    }
    if(isset($_POST["check_bus_stops"])){
        $sql .= " and bus_stops='Y'";
    }
    if(isset($_POST["check_trains_stops"])){
        $sql .= " and trains_stops='Y'";
    }


    $result = mysqli_query($connect, $sql);


    if (mysqli_num_rows($result) > 0) {
        // output data

        while($record = mysqli_fetch_assoc($result)) {
            $rows[] = $record;
            //echo json_encode ($record);
        }

    }
    else {
//        $postcode = array();// $keyword;
//        for ($i = -10; $i<=10; $i++){
//            $newPostcode = (int)$keyword + $i;
//            array_push($postcode,$newPostcode);
//        }
//        $postcodeList = "'" . implode("', '", $postcode) . "'";
//        //echo "postcodeList is :".$postcodeList;
//        $keyword = "";  // to avoid the influence from userinput postcode
        $sql = "SELECT * FROM explore where category in ($option)";
        //$sql .= " where post_code in ($postcodeList)";
        $result = mysqli_query($connect, $sql);
        while($record = mysqli_fetch_assoc($result)) {
                $rows[] = $record;
                //echo json_encode ($record);
        }
        //$rows = [["categoty" => "","place_name" => "","address" => "Melbourne","coordinates" => "{lat: -37.8136, lng: 144.9621}"]];
        //$rows = [];
        //echo "query no result";
    }

echo json_encode($rows);  // pass data to javascript for map markers
mysqli_close($connect);


