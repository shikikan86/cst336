<?php

include '../../../inc/dbConnection.php';
$conn = getDatabaseConnection("weather");

$sql = "SELECT COUNT(1) totalreports FROM weather_report";
$stmt = $conn->prepare($sql);
$stmt->execute();
$records = $stmt->fetch(PDO::FETCH_ASSOC);
echo json_encode($records);

?>