<!DOCTYPE html>
<html>
    <head>
        <title> Update Product </title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        
        <script>
            
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
            
            
             $.ajax({
                type: "GET",
                url: "api/getProductInfo.php",
                dataType: "json",
                data:{"productId": <?=$_GET['productId']?>},
                success: function(data, status) {
                    $("#productName").val(data["productName"]);
                    $("#productDescription").val(data["productDescription"]);
                    $("#productPrice").val(data["productPrice"]);
                    $("#productImage").val(data["productImage"]);
                    $("#catId").val(data.catID).change();
                }
            }); //ajax
            
            $(document).ready(function(){
                $("#submitButton").on("click", function(){
                    alert("hello"); 
                });    
            });
            
            
        </script>
        
    </head>
    <body>
        <h1>Update Product</h1> <br>
        
        Enter Product Name: <input type = "text" id = "productName" size = "50"> <br>
       Enter Product Description: <textarea id = "productDescription" cols = "50" rows = "3"></textarea><br>
       Enter Product Image: <input type = "text" id = "productImage"><br>
       Enter Product Price: <input type = "text" id = "productPrice"><br>
       Category: <select id = "catId">
           <option>Select One</option>
       </select>
       <br>
       <button id="submitButton">Update Product</button>
       

    </body>
</html>