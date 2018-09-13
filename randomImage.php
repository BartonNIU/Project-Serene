<?php
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
?>