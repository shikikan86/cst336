<?php
session_start();

//print_r($_POST);

include '../../inc/dbConnection.php';

$conn = getDatabaseConnection("ottermart");

$username = $_POST['username'];
$password = sha1($_POST['password']);

$sql = "SELECT * FROM om_admin WHERE username = :username AND password = :password";

$namedParameters = array();
$namedParameters['username'] = $username;
$namedParameters['password'] = $password;

$stmt = $conn -> prepare($sql);  //$connection MUST be previously initialized
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple

if (empty($record)){
    echo "Username or Password are incorrect!";
}
else{
    //echo $record['firstName'] . " " . $record['lastName'];
    header('location: admin.php');
    
    $_SESSION['adminName'] = $record['firstName'] . " " . $record['lastName'];
}

//print_r($record);

?>