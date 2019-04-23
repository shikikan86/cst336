<?php

    include '../../../inc/dbConnection.php';
    $conn = getDatabaseConnection("weather");
    
    $arr = array();

    $arr[":location"] = $_GET["location"];
    $arr[":weather"] = $_GET["weather"];
    $arr[":temp"] = $_GET["temp"];
    $arr[":humidity"] = $_GET["humidity"];
    $arr[":wind"] = $_GET["wind"];
    $arr[":direction"] = $_GET["direction"];
    
    $sql = "INSERT INTO weather_report ( `location`, `weather`, `temp`, `humidity`, `wind`, `direction` ) VALUES ( :location, :weather, :temp, :humidity,
:wind, :direction )";

    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);
    $records = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($records);

?>