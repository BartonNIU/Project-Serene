<?php
include "mysql_connect.php";
if(isset($_POST["query"]))
{
    $output = '';
    $query = "SELECT * FROM address WHERE postnsuburb LIKE '%".$_POST["query"]."%'";
    $result = mysqli_query($connect, $query);
    $output = '<ul class="list-unstyled">';
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            $output .= '<li>'.$row["postnsuburb"].'</li>';
        }
    }
    else
    {
        $output .= '<li>Postcode/Suburb Not Found</li>';
    }
    $output .= '</ul>';
    echo $output;
}
?>