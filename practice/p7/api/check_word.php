<?php
//Used to check the letter the user inputed in the form, and if the letter is in the word
//Should return an array of booleans as the api
include 'dbConnection.php';
$conn = getDatabaseConnection("hangman");

//$word = $_GET[""];
$wid1 = intval($_GET['wordId']);


$sql = "SELECT word"

?>