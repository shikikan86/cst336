<?php

$host = "localhost";
$dbname = "midterm_practice";
$username = "root";
$password = "";

//Connecting to database
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

//Error Handling
$dbConn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM mp_product ORDER BY RAND() LIMIT 1";
$stmt = $dbConn -> prepare($sql);  //$connection MUST be previously initialized
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple

//print_r($records);

echo json_encode($records);

?>