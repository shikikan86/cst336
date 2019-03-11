<?php
    $codes = array();
    
    $codes["promo"] = "getFifty";
    $codes["discount"] = 50;
    
    $codesArray = array();
    array_push($codesArray, $codes);
    
    $codes["promo"] = "halfPrice";
    $codes["discount"] = 50;
    array_push($codesArray, $codes);
    
    $codes["promo"] = "sand30";
    $codes["discount"] = 30;
    array_push($codesArray, $codes);
    
    $codes["promo"] = "spring30";
    $codes["discount"] = 30;
    array_push($codesArray, $codes);
    
    $codes["promo"] = "beach";
    $codes["discount"] = 20;
    array_push($codesArray, $codes);
    
    $codes["promo"] = "sunny";
    $codes["discount"] = 20;
    array_push($codesArray, $codes);
    
    echo json_encode($codesArray[rand(0,5)]);
    
    
?>