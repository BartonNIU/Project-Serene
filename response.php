<?php
session_start();

include("mysql_connect.php");
$rows = array();

//$postcode = "";
//$suburb = "";
$keyword = "";
$option = "";

//if (isset($_SESSION['postcode'])){
//    $postcode = $_SESSION['postcode'];
//}

if (isset($_POST['userinput_place'])){
    $keyword = $_POST['userinput_place'];
}
if (isset($_POST['value'])){
    $option = $_POST['value'];
}






//echo "
//<script>
/*   var test = '<?php echo $keyword ?>';*/
//    console.log('option value is: ',test);
//</script>";



//if($keyword != ""){
//   $sql = "SELECT * FROM place where option like '%$keyword%'";
//

// check if the input has been passed successfully
//if($postcode != "" || $option != "" ){


    // sql query for the map markers
    $sql = "SELECT * FROM place where (post_code like '%$keyword%' or suburb like '%$keyword%')  and category like '%$option%'"; //and description like '%$keyword%'
    $result = mysqli_query($connect, $sql);


    if (mysqli_num_rows($result) > 0) {
        // output data

        while($record = mysqli_fetch_assoc($result)) {
            $rows[] = $record;
            //echo json_encode ($record);
        }

    }
    else {
        $rows = ["categoty" => "","place_name" => "","address" => "Melbourne","coordinates" => "{lat: -37.8136, lng: 144.9621}"];
        //echo "query no result";
    }
//}
//else{
//
//        $sql = "SELECT * FROM place";
//        $result = mysqli_query($connect, $sql);
//
//
//        if (mysqli_num_rows($result) > 0) {
//            // output data
//            while ($record = mysqli_fetch_assoc($result)) {
//                $rows[] = $record;
//
//                //echo json_encode ($record);
//            }
//
//
//        }
//        else {
//            echo "no result";
//}}

//else{
//    echo "post fails";
//}
echo json_encode($rows);  // pass data to javascript for map markers
mysqli_close($connect);


