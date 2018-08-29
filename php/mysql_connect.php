<?php
$servername = "localhost";
$username = "nrh";//"root";
$password = "666";//"monash123";
$dbname = "fit5120";

// create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//else{
//    echo "mysql connect sucessfully!"."<br>";
//}
?>