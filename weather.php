<?php
/*2158177 is Melbourne CBD ID
lat : -37.813999
lon : 144.963318*/

$url = "http://api.openweathermap.org/data/2.5/forecast?id=2158177&lang=en&units=metric&APPID=d74d65a8edf96d7294bbb5f5809e3232";

$contents = file_get_contents($url);
$climates=json_decode($contents);

