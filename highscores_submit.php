<?php session_start();
  $newline = "\n".$_SESSION["final_score"].",".$_SESSION["username"];
  file_put_contents('highscores.txt', $newline, FILE_APPEND | LOCK_EX);

  //redirect page depending on output
  header("location: highscores.php");

header("location: index.html");
?>
