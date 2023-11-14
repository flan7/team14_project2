<?php
session_start();

if(isset($_POST["username"]) && isset($_POST["password"])){
  $file = file_get_contents('users.txt', FILE_USE_INCLUDE_PATH);
  $username = $_POST["username"];
  $password = $_POST["password"];

  $lines = explode("\n", $file);

  foreach($lines as $line){
    $player = explode(",",$line);

    $stored_name = trim($player[0]);
    $stored_pass = trim($player[1]);

    if($stored_name==$username && $stored_pass==$password){
        $_SESSION["username"] = $username;
        header("location: first_selection.php");
        break;
    }
  }
  header("location: register.php");
}
else {
    header("location: index.html");
}
