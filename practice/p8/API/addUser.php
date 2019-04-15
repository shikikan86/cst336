<?php
    include '../../../inc/dbConnecton.php';
    $conn = getDatabaseConnection("newsletter");
    
    $arr = array();
    
    $arr[":id"] = $_GET["id"];
    $arr[":name"] = $_GET["name"];
    $arr[":major"] = $_GET["major"];
    $arr[":email"] = $_GET["email"];
    $arr[":zip"] = $_GET["zip"];
    
    $sql = "INSERT INTO users (`id`, `name`, `major`, `email`, `zip`)
            VALUES (:id, :name, :major, :email, :zip";
            
            $stmt = $conn->prepare($sql);
    $stmt->execute($arr);
    $sql ="SELECT COUNT(1) totalusers FROM users";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($records);
 
?>