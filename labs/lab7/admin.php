<?php

session_start();

if(!isset($_SESSION['adminName'])){
    header('location: login.html');
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Ottermart - Admin Section </title>
        
        <link rel="stylesheet" href="css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>
        /* global $ */
        $(document).ready(function() {

            $.ajax({
                type: "GET",
                url: "../lab6/api/getProducts.php",
                dataType: "json",
                success: function(data, status) {
                    data.forEach(function(product) {
                        $("#products").append("<div class='row'>" +
                            "<div class='col1'>" + 
                            "[<a href='update.php?productId="+product.productId+"'> Update </a>]" +
                            "[<a href='delete.php'> Delete </a>]" +
                            product.productName + "</div>" +
                            "<div class='col2'>" + "$" + product.productPrice + "</div>" +
                            "</div>");
                    });
                },
                complete: function(data, status) { //optional, used for debugging purposes
                    //alert(status);
                }

            }); //ajax 

            $("#searchForm").on("click", function() {
                $.ajax({
                    type: "GET",
                    url: "api/getSearchResult.php",
                    dataType: "json",
                    data: {
                        "product": $("[name=product]").val(),
                        "description": $("[name=description]").val(),
                        'category': $("[name=category]").val(),
                        "priceFrom": $("[name=priceFrom]").val(),
                        "priceTo": $("[name=priceTo]").val(),
                        "orderBy": $("[name=orderBy]:checked").val(),
                    },
                    success: function(data, status) {
                        $("#products").html("<h3> Products Found: </h3>");
                        data.forEach(function(key) {
                            $("#products").append("<a href='#' class = 'historyLink' id = '" + key['productId'] + "'>History </a>");
                            $("#products").append(key['productName'] + " " + key['productDescription'] + " $" + key['productPrice'] + "<br>");
                        });
                    }
                }); //ajax
            }); //end search form

            $(document).on("click", ".historyLink", function() {
                $("#purchaseHistoryModal").modal("show");
                $.ajax({
                    type: "GET",
                    url: "api/getPurchaseHistory.php",
                    dataType: "json",
                    data: { "productId": $(this).attr("id") },
                    success: function(data, status) {
                        if (data.length != 0) {
                            $("#history").html("");
                            $("#history").append(data[0]['productName'] + "<br />");
                            $("#history").append("<img src = '" + data[0]['productImage'] + "'width = '200' /> <br />");
                            data.forEach(function(key) {
                                $("#history").append("Purchase Date: " + key['purchaseDate'] + "<br />");
                                $("#history").append("Unit Price: " + key['unitPrice'] + "<br />");
                                $("#history").append("Quantity: " + key['quantity'] + "<br />");
                            });
                        }
                        else {
                            $("#history").html("No purchase history for this item.");
                        }
                    }
                }); //ajax
            });
        });
    </script>

    <style>
        .row {
            display: flex;
        }

        .col1 {
            width: 250px;
        }
    </style>
    </head>
    <body>
        
        <h1>Ottermart - Admin Section</h1>
        
        Welcome <?=$_SESSION['adminName']?>
        
        <br><hr><br>
        
        <div id = "products">
            
        </div>
        
        <form action="addProducts.php">
            <button>Add New Product</button>
        </form>
        
        <form action="logout.php">
            <button>Logout</button>
        </form>

    </body>
</html>