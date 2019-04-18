<?php

session_start();


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login Screen </title>
        <link rel="stylesheet" href="css/styles.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    </head>
    <body>
        <h1 id = "text">Admin Login</h1><br>
        
        <form method = "POST" action = "loginProcess.php" id = "login">
            
            Username: <input type="text" name="username" id = "username"/><br><br>
            Password: <input type="password" name="password" id = "password"/><br><br>
            
            
            <input type = "submit" value = "Login!">
            
        </form>
        
        <br><center><?=$_SESSION['error']?></center>

    </body>
</html>