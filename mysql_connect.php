<?php
$host = "localhost";
$user = "nrh";//"root";
$password = "666";//"monash123";
$db = "fit5120";


// create connection
$connect = mysqli_connect($host, $user, $password, $db);

/* check connection */
if (mysqli_connect_errno()){
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>
