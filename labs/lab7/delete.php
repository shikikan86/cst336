<?php

session_start();

if(!isset($_SESSION['adminName'])){
    exit;
}

include '../../inc/dbConnection.php';

$conn = getDatabaseConnection("ottermart");

$sql = "DELETE FROM `om_product` WHERE `om_product`.`productId` = " . $_POST['productId'];

$stmt = $conn->prepare($sql);
$stmt->execute();

//echo $sql;

header("Location: admin.php");

?>