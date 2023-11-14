<?php
if(isset($_POST["username"]) && isset($_POST["password"])){
  $newline = "\n".$_POST["username"].",".$_POST["password"];
  file_put_contents('users.txt', $newline, FILE_APPEND | LOCK_EX);

  //set username for gameplay and high score
  $_SESSION["username"] = $_POST["username"];

  //redirect page depending on output
  header("location: login.php");
} 

header("location: index.html");
?>
