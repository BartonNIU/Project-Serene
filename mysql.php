<?php
$servername = "localhost";
$username = "nrh";
$password = "666";
$dbname = "fit5120";

// create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM location";
$result = mysqli_query($conn, $sql);
$rows = array();
//$i = 0;

if (mysqli_num_rows($result) > 0) {
    // output data
    while($record = mysqli_fetch_assoc($result)) {
//        $id = $row["id"];
//        $name = $row["name"];
//        $location = $row["location"];
//        echo $id.$name,$location;
        $rows[]=$record;
        //$i++;

        //echo $row;
        //echo json_encode ($record);
    }
    echo json_encode ($rows);
} else {
    echo "no result";
}

//var_dump ($rows);
mysqli_close($conn);
?>