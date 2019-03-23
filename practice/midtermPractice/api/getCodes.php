<?php

include '../../../inc/dbConnection.php';

$conn = getDatabaseConnection("midterm_practice");

$guess = $_GET['guess'];

$namedParameters = array();

//This query works BUT it allows SQL INJECTION (because it's using single quotes)
//$sql = "SELECT * FROM `om_product` WHERE productName LIKE '%$product%'";

$sql = "SELECT * FROM mp_codes WHERE 1"; //Retrieves ALL records

if (!empty($guess)) { //user entered a product keyword
    $sql .=  " AND promoCode LIKE :guess";
    $namedParameters[":guess"] = "%$guess%";
}



$stmt = $conn -> prepare($sql);  //$connection MUST be previously initialized
$stmt->execute($namedParameters);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple

//print_r($records); //debugging    

echo json_encode($records);

?>