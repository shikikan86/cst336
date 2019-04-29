<?php

include '../../../inc/dbConnection.php';

$conn = getDatabaseConnection("quiz");

$arr = array();

$arr[":points"] = $_GET["points"];
$arr[":email"] = $_GET["email"];


$sql = "INSERT INTO quiz ( `email`, `score`) VALUES ( :email, :points )";

$stmt = $conn->prepare($sql);
$stmt->execute($arr);
$sql = "SELECT * FROM quiz WHERE 1";
$stmt = $conn->prepare($sql);
$stmt->execute();
$records = $stmt->fetch(PDO::FETCH_ASSOC);
echo json_encode($records);
?>