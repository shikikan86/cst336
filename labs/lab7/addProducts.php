<?php

session_start();



?>

<!DOCTYPE html>
<html>
    <head>
        <title> Add New Product </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    </head>
    <body>
        <h1>Add New Product</h1>
       Enter Product Name: <input type = "text" id = "productName" size = "50"> <br>
       Enter Product Description: <textarea id = "productDescription" cols = "50" rows = "3"></textarea><br>
       Enter Product Image: <input type = "text" id = "productImage"><br>
       Enter Product Price: <input type = "text" id = "productPrice"><br>
       Category: <select id = "catId">
           <option>Select One</option>
       </select>
       <br>
       <button id = "submitButton">Add Product</button>
       
       <br><br>
       
       <span id = "totalProducts"></span>
    </body>
    <script>
    /* global $ */
        $.ajax({
                type: "GET",
                url: "../lab6/api/getCategories.php",
                dataType: "json",
                success: function(data, status) {
                    data.forEach(function(key) {
                        $("#catId").append("<option value=" + key["catId"] + ">" + key["catName"] + "</option>");
                    });
                }
            }); //ajax
            
            $("#submitButton").on("click", function(){
               $.ajax({
                type: "GET",
                url: "api/addProductAPI.php",
                dataType: "json",
                data : {"productName": $("#productName").val(),
                    "productDescription": $("#productDescription").val(),
                    "productImage": $("#productImage").val(),
                    "productPrice" : $("#productPrice").val(),
                    "catId" : $("#catId").val(),
                },
                success: function(data, status) {
                    $("#totalProducts").html("Total Products: " + data.totalproducts);
                }
            }); //ajax 
            });
    </script>
</html>