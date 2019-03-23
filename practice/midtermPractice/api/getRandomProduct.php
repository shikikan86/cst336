<?php
    include '../../../inc/dbConnection.php';
    $conn = getDatabaseConnection("midterm_practice");
    $sql = "SELECT * FROM mp_product ORDER BY RAND() LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($records);
?>