<?php

//https://pixabay.com/api/?key=5589438-47a0bca778bf23fc2e8c5bf3e&image_type=photo&orientation=horizontal&safesearch=true&per_page=100
//http://api.openweathermap.org/data/2.5/weather?q=London,uk&APPID=a20e0cb604a3c6986c44cf369276263c

$search = $_GET['search'];

$curl = curl_init();
      curl_setopt_array($curl, array(
      CURLOPT_URL => "http://api.openweathermap.org/data/2.5/weather?q=$search&APPID=a20e0cb604a3c6986c44cf369276263c",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
      "cache-control: no-cache"
      ),
   ));

$jsonData = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

echo $jsonData;


?>