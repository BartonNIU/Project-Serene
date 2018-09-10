<?php
$host = "localhost";
$user = "root";//"root";
$password = "";//"monash123";
$db = "csv_db";


// create connection
$connect = mysqli_connect($host, $user, $password, $db);

/* check connection */
if (mysqli_connect_errno()){
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>
