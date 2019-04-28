<?php

    // receives these parameters: action, url, keyword

    include '../../../inc/dbConnection.php';

    // to get the 2 extra points in the hands on portion of the final exam
    // 1. add favorites to database
    // 2. remove favorites from database
    // 3. display the keyword list from database (use DISTINCT)

    $conn = getDatabaseConnection("c9");
    
    $action = $_GET["action"];
    $arr = array();

  switch ($action) {
        
        case "add":    $arr[":imageURL"] = $_GET["imageURL"];
            $arr[":keyword"] = $_GET["keyword"];
            $sql = "INSERT INTO lab8_pixabay (`imageURL`, `keyword`) 
                    VALUES (:imageURL, :keyword)";
            
                       break;
        case "delete":  $arr[":imageURL"] = $_GET["imageURL"];
            $sql = "DELETE FROM lab8_pixabay WHERE imageURL = :imageURL";

                        break;
        case "keyword": //displays list of unique keywords (hint: use DISTINCT)
                        $sql = "SELECT DISTINCT(keyword) FROM lab8_pixabay WHERE 1";
                        break;
        case "favorites": //display favorite images based on the keyword 
                       $arr[":keyword"] = $_GET["keyword"];
                        $sql = "SELECT imageURL FROM lab8_pixabay WHERE keyword = :keyword";
                        break;
                        
    }//switch


    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);
    
    //fetching records when using SELECT
    if ( $action == "keyword" || $action == "favorites") {
     
         $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
         
         echo json_encode($records);
    }

?>