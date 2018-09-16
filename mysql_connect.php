<?php
//This is the php file to conncet mysql

$host = "localhost";
$user = "nrh";//"root";  //
$password = "666";//"monash123";//
$db = "CSV_DB";

//$user = "root";
//$password = "monash123";
//$db = "iteration2";


// create connection
$connect = mysqli_connect($host, $user, $password, $db);

/* check connection */
if (mysqli_connect_errno()){
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
//else{
//    echo "success";
//}
?>
