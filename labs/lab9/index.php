<?php


 if (!empty($_FILES)) {

    //print_r($_FILES);
    
   // echo "Image size: " . $_FILES['myFile']['size'];
    
    if($_FILES['myFile']['size'] > 1024000){
        echo "File size is too large";
    }
    
    else{
        move_uploaded_file( $_FILES['myFile']['tmp_name'], "gallery/" . $_FILES['myFile']['name']);
        $_CHECK = 1;
    }
    
    

}


    function displayImagesUploaded() {

        $images = scandir("gallery"); //returns all file names within a folder
        
        //print_r($images);
        
        for ($i = 2; $i < count($images); $i++) {
            
            echo "<a href = 'gallery/$images[$i]' width='500' ><img src = 'gallery/$images[$i]' width='100'></a>";
            
        }//for
    
    }//function
    
    


?>


<!DOCTYPE html>
<html>
    <head>
        <title> Lab 9: File Upload </title>
        <style>
            
            img { padding: 10px; }
            
        
            
            h1{
                padding:20px;
                background-color: orange;
            }
            
            
        </style>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <script>
            
            
        </script>

        
    </head>
    <body>
        
        <center>
        <h1>Image Uploader</h1><br>
        
        
        <form  method="POST" enctype="multipart/form-data">
        
            <input type="file" name="myFile" /> <br><br>
            <button id = "upload"> Upload File! </button>
            
        </form>

        <hr>
        
        
        <h3> Images uploaded: </h3>
        
        <?= displayImagesUploaded() ?>
        
        
        <?php
        
        
        //$conn = dbConnection();
        
        ?>
        
        <br><br>
        <img src = "img/buddy_verified.png" width = "150">
        
        </center>
    </body>
</html>