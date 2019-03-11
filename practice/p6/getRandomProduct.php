
<?php
    //1
    $items = array();
    $items["product"] = "Microfiber Beach Towel";
    $items["price"] = 40;
    $items["qty"] = 2;
    
    $iArray = array();
    array_push($iArray, $items);
    //2
    $items["product"] = "Flip-flop Sandals";
    $items["price"] = 30;
    $items["qty"] = 5;
    
    array_push($iArray, $items);
    //3
    $items["product"] = "Sunscreen 80SPF";
    $items["price"] = 25;
    $items["qty"] = 3;
    
    array_push($iArray, $items);
    //4
    $items["product"] = "Plastic Flying Disc";
    $items["price"] = 15;
    $items["qty"] = 4;
    
    array_push($iArray, $items);
    
    //5
    $items["product"] = "Beach Umbrella";
    $items["price"] = 75;
    $items["qty"] = 1;
    
    array_push($iArray, $items);
    
    echo json_encode($iArray[rand(0,4)]);

?>