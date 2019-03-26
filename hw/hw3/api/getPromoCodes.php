<?php

    $codes = array();
    
    $codes["promo"] = "halfOff";
    $codes["discount"] = 50;
    $codes["description"] = "Order is half off!";
    
    $codesArray = array();
    array_push($codesArray, $codes);
    
    $codes["promo"] = "FreeP!zza";
    $codes["discount"] = 1;
    $codes["description"] = "Order is on us this time!";
    array_push($codesArray, $codes);
    
    $codes["promo"] = "3meatlover0";
    $codes["discount"] = .30;
    $codes["description"] = "30% off of Meat Lover's pizza!";
    array_push($codesArray, $codes);
    
    $codes["promo"] = "10offPepperoni";
    $codes["discount"] = .10;
    $codes["description"] = "10% off a pepperoni pizza!";
    array_push($codesArray, $codes);
    
    $codes["promo"] = "CheapWings";
    $codes["discount"] = .20;
    $codes["description"] = "20% off of chicken wings!";
    array_push($codesArray, $codes);
    
    $codes["promo"] = "None";
    $codes["discount"] = 0;
    $codes["description"] = "Sorry, there are no promo codes available for today :(";
    array_push($codesArray, $codes);
    
    echo json_encode($codesArray[rand(0,5)]);
    
    
?>