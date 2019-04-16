<?php

/*$host = "localhost";
$dbname = "ottermart";
$username = "root";
$password = "";*/

 include '../../../inc/dbConnection.php';
$dbConn = getDatabaseConnection("ottermart");

//Connecting to database
//$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

//Error Handling
$dbConn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM om_product ORDER BY productPrice LIMIT 15";
$stmt = $dbConn -> prepare($sql);  //$connection MUST be previously initialized
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple

//print_r($records);

echo json_encode($records);

?>