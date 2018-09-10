<?php
include "mysql_connect.php";

// Random Image function
function random_image($directory)
{
    $leading = substr($directory, 0, 1);
    $trailing = substr($directory, -1, 1);

    if($leading == '/')
    {
        $directory = substr($directory, 1);
    }
    if($trailing != '/')
    {
        $directory = $directory . '/';
    }

    if(empty($directory) or !is_dir($directory))
    {
        die('Directory: ' . $directory . ' not found.');
    }

    $files = scandir($directory, 1);

    $make_array = array();

    foreach($files AS $id => $file)
    {
        $info = pathinfo($directory . $file);

        $image_extensions = array('jpg', 'jpeg', 'gif', 'png', 'ico');
        if(!in_array($info['extension'], $image_extensions))
        {
            unset($file);
        }
        else
        {
            $file = str_replace(' ', '%20', $file);
            $temp = array($id => $file);
            array_push($make_array, $temp);
        }
    }

    if(sizeof($make_array) == 0)
    {
        die('No images in ' . $directory . ' Directory');
    }

    $total = count($make_array) - 1;

    $random_image = rand(0, $total);
    return $directory . $make_array[$random_image][$random_image];

}

if(isset($_POST["action"]))
{
    $query = "
		SELECT * FROM places WHERE place_name!='' ";

    if(isset($_POST["query"]) && !empty($_POST["query"]))
    {
        $search = mysqli_real_escape_string($connect, $_POST["query"]);
        $query .= "
		 AND postcode LIKE '%".$search."%'  ";
    }

    if(isset($_POST["category"]) && $_POST["category"] != 'All Categories'&& !empty($_POST["category"]) ){
        $search_text = "'" . implode("', '", $_POST["category"]) . "'";
//        print_r($search_text);
        $query .= " AND category IN (".$search_text.")
        ";
    }

    if (isset($_POST["disabled_access"])) {
        $query .= "
		 AND disabled_access='Y' ";
    }

    if (isset($_POST["toilet"])) {
        $query .= "
		 AND toilet='Y' ";
    }

    if (isset($_POST["fencing"])) {
        $query .= "
		 AND fencing='Y' ";
    }

    if (isset($_POST["slides"])) {
        $query .= "
		 AND slides='Y' ";
    }


    $output = '';
    echo $query;
    $result = mysqli_query($connect, $query);

    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            $placeName = $row['place_name'];
            $output .='
                                <!-- listing-item -->
                             <div class="listing-item list-layout">
                                <article class="geodir-category-listing fl-wrap">
                                  <div class="geodir-category-img">
                                    <img src=' . random_image('picture/Activities') . '>
                                    <div class="overlay"></div>
                                    </div>
                                       <div class="geodir-category-content fl-wrap">
                                         <a class="listing-geodir-category">'. $row['category'] .'</a>
                                          <h3><a href=detail_place.php?place='.urlencode($placeName).' > '. $row['place_name'].' </a></h3>
                                          <p> postcode:'. $row['postcode'].' </p>
                                          <p>'. $row['description'].'</p>
                                          <div class="geodir-category-options fl-wrap">
                                            <div class="geodir-category-location"><a  href="#0" class="map-item"><i class="fa fa-map-marker" aria-hidden="true"></i>'. $row['suburb'].'</a></div>
                                          </div>
                                       </div>
                                   </article>
                               </div>
                               <!-- listing-item end-->';
        }
        echo $output;
    }
    else{
        echo '<p> We apologize, there is no data found for your selection </p>';
    }


}

/* close connection */
$connect->close();
?>